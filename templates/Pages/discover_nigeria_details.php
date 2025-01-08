<?php 
   use Cake\I18n\Time;
?>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item text-center">
                        <h2>Explore Nigeria</h2>
                        <p>Home . Discover Nigeria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?= $this->Flash->render() ?>
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="<?= $this->Url->build($post->image_url); ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>Second divided from form fish beast made every of seas
                            all gathered us saying he our
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="far fa-user"></i><?= $post->user->lastname.' '.$post->user->firstname; ?></a></li>
                            <li>
                                <a href="#"><i class="far fa-clock"></i> 
                                    <?php
                                            $now = new Time($post->created);
                                            echo $now->timeAgoInWords(
                                                ['format' => 'd', 'end' => '+1 year']
                                            );
                                            // On Nov 10th, 2011 this would display: 2 months, 2 weeks, 6 days ago
                                    ?>
                                </a>
                            </li>
                            <?php if(isset($Auth) && ($Auth['id'] == $post->user_id)):?>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?= $post->id?>"><i class="far fa-edit"></i> 
                                        Edit Story
                                    </a>
                                </li>
                                <li>
                                <i class="far fa-trash-alt"></i>
                                    <?= $this->Form->postLink(__('Delete Story'), ['controller' => 'posts', 'action' => 'delete_my_story', $post->id], ['confirm' => __('Are you sure you want to delete story?', $post->id)]) ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <p>
                            <?= $post->content; ?>
                        </p>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter<?= $post->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Story</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?= $this->Form->create($post, ['url' => '/posts/edit-story', 'enctype'=>'multipart/form-data']) ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <?= $this->Form->control('id', ['class'=>'form-control', 'placeholder'=>'Enter title', 'required']);?>
                                        <?= $this->Form->control('title', ['class'=>'form-control', 'placeholder'=>'Enter title', 'required']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('image_url', ['class'=>'form-control', 'type'=>'file', 'placeholder'=>'Enter title']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('content', ['class'=>'form-control', 'placeholder'=>'Enter title', 'required', 'type'=>'textarea']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('is_published');?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button(__('Post Story'), ["class"=>"btn btn-primary"]) ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
                <div id="disqus_thread"></div>
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://explore-nigeria.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                type="submit">Search</button>
                        </form>
                    </aside>


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <?php //debug($posts); ?>
                        <?php foreach($posts as $eachPost):?>
                            <div class="media post_item">
                                <img src="<?= $eachPost->image_url; ?>" alt="post" style = 'width: 80px; height: 80px'>
                                <div class="media-body">
                                    <a href="<?= $this->Url->build('/pages/discover-nigeria-details/'.$eachPost->id.'/'.$eachPost->slug); ?>">
                                        <h3>
                                            <?=  $out = strlen(htmlspecialchars($eachPost->title)) > 25 ? substr(htmlspecialchars($eachPost->title),0,25)."..." : htmlspecialchars($eachPost->title);  ?>
                                        </h3>
                                    </a>
                                    <p><?= date('M d, Y', strtotime($eachPost->created));?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>



                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->