<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;
use Cake\Utility\Text;


/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
           // debug($this->request->getData());
            
            $postImage = $this->request->getData()['image_url'];
            $name = $this->request->getData()['image_url']->getClientFileName();
            $type = $this->request->getData()['image_url']->getClientMediaType();
            $getSize = $this->request->getData()['image_url']->getSize();


            $targetPath = WWW_ROOT. 'img'. DS . 'post-image'. DS. $name;
            if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
                if (!empty($name)) {
                    if ($postImage->getSize() > 0 && $postImage->getError() == 0) {
                        $postImage->moveTo($targetPath); 
                        $postData['post_image'] = $name;
                    }
                }
            }
            // $this->request->getData()['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);
            $data =  $this->request->getData();
            $data['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);

            //debug($data);
            //exit;
            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function createStory()
    {
        $loggedInUser = $this->Auth->user();
        //debug($loggedInUser);exit;
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
           // debug($this->request->getData());
            
            $postImage = $this->request->getData()['image_url'];
            $name = $this->request->getData()['image_url']->getClientFileName();
            $type = $this->request->getData()['image_url']->getClientMediaType();
            $getSize = $this->request->getData()['image_url']->getSize();


            $targetPath = WWW_ROOT. 'img'. DS . 'post-image'. DS. $name;
            if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
                if (!empty($name)) {
                    if ($postImage->getSize() > 0 && $postImage->getError() == 0) {
                        $postImage->moveTo($targetPath); 
                        $postData['post_image'] = $name;
                    }
                }
            }
            // $this->request->getData()['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);
            $data =  $this->request->getData();
            $data['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);

            $sluggedTitle = Text::slug($data['title']);
            // trim slug to maximum length defined in schema
            $data['slug'] = substr($sluggedTitle, 0, 250);

            //Add user id to post
            $data['user_id'] = $this->Auth->user('id');

            //debug($data);
            //exit;
            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect('/');
            }
        }
    }

    public function editStory($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data =  $this->request->getData();

            $id = $data['id'];
            $post = $this->Posts->get($id, [
                'contain' => [],
            ]);

            if(!empty($this->request->getData()['image_url']->getClientFileName())):
                $postImage = $this->request->getData()['image_url'];
                $name = $this->request->getData()['image_url']->getClientFileName();
                $type = $this->request->getData()['image_url']->getClientMediaType();
                $getSize = $this->request->getData()['image_url']->getSize();


                $targetPath = WWW_ROOT. 'img'. DS . 'post-image'. DS. $name;
                if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
                    if (!empty($name)) {
                        if ($postImage->getSize() > 0 && $postImage->getError() == 0) {
                            $postImage->moveTo($targetPath); 
                            $postData['post_image'] = $name;
                        }
                    }
                }
                // $this->request->getData()['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);
                $data['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].Router::url('/img/post-image/'.$postData['post_image']);
            else:
                unset($data['image_url']);
            endif;

            $sluggedTitle = Text::slug($data['title']);
            // trim slug to maximum length defined in schema
            $data['slug'] = substr($sluggedTitle, 0, 250);


            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Story has been saved.'));
                return $this->redirect(['controller'=>'pages', 'action' => 'discover-nigeria-details', $post->id, $post->slug]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
    }

    public function deleteMyStory($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('Story has been deleted.'));
        } else {
            $this->Flash->error(__('Story could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'my-stories']);
    }



}
