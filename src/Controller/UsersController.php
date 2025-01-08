<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Posts');

        $this->viewBuilder()->setLayout("explore-nigeria"); // Loading layout
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        // methods name we can pass here which we want to allow without login
        parent::beforeFilter($event);
        $this->Auth->allow(["login", "register"]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function register(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $postData = $this->request->getData();

            #Has user password here
            $hasher = new DefaultPasswordHasher();
            $postData['password'] = $hasher->hash($postData['password']);
            $postData['is_admin'] = 0;

            $user = $this->Users->patchEntity($user,  $postData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration was successfully done.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Registration was not successfull'));
        }

        $this->set(compact('user'));
    }

    public function login() {
        // checking if user already logged in or not.
        // if logged in the $user_id will have id value of user else
        // empty value
        $user_id = $this->Auth->user("id");

        if (!empty($user_id)) {
            return $this->redirect("/");
        } else {
            // login page
            if ($this->request->is("post")) { // checking request type
            // validate the user from users table
            $userdata = $this->Auth->identify(); // default method of auth component
            if ($userdata) {
                // settings user data
                $this->Auth->setUser($userdata);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error("Invalid login details");
            }
            }
        }
        $user = $this->Users->newEmptyEntity();
        $this->set(compact('user'));

        $this->set("title", "Explore Nigeria | Log In");
    }

    // in src/Controller/UsersController.php
    public function logout()
    {
        $result = $this->Auth->user();
        //debug($result); exit;
        // regardless of POST or GET, redirect if user is logged in
        if (!empty($result)) {
            $this->Auth->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function myStories($id = null){
        $this->loadModel('Posts');

        $this->paginate = [
            'contain' => ['Users'],
        ];
        if($this->Auth->user('is_admin') == 0):
            $posts = $this->paginate($this->Posts, ['conditions' => ['Posts.user_id' => $this->Auth->user('id')], 'order'=>['Posts.created' => 'desc']]);
        elseif($this->Auth->user('is_admin') == 1):
            if($id == null):
                $posts = $this->paginate($this->Posts, ['order'=>['Posts.created' => 'desc']]);
            else:
                $posts = $this->paginate($this->Posts, ['conditions' => ['Posts.user_id' => $id], 'order'=>['Posts.created' => 'desc']]);
            endif;
        endif;
        //debug($posts);

        $this->set(compact('posts'));
    }
}
