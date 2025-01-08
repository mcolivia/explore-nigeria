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
                            <p>Home . My Stories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php if(isset($posts) and !empty($posts)): ?>
                        <?php foreach($posts as $post): ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="<?= $post->image_url; ?>" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3><?= date('d', strtotime($post->created)); ?></h3>
                                        <p><?= date('M', strtotime($post->created)); ?></p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?= $this->Url->build('/pages/discover-nigeria-details/'.$post->id.'/'.$post->slug); ?>">
                                        <h2><?= $post->title; ?></h2>
                                    </a>
                                    <p>
                                        <?=  $out = strlen(htmlspecialchars($post->content)) > 250 ? substr(htmlspecialchars($post->content),0,250)."..." : htmlspecialchars($post->content);  ?>
                                    </p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="far fa-user"></i> <?= $post->user->lastname.' '.$post->user->firstname; ?></a></li>
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
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?= $post->id?>"><i class="far fa-edit"></i> 
                                                Edit Story
                                            </a>
                                        </li>
                                        <li>
                                            <i class="far fa-trash-alt"></i> 
                                            <?= $this->Form->postLink(__('Delete Story'), ['controller' => 'posts', 'action' => 'delete_my_story', $post->id], ['confirm' => __('Are you sure you want to delete story?', $post->id)]) ?>

                                        </li>
                                    </ul>
                                </div>
                            </article>

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
                        <?php endforeach; ?>
                        <?php if(count($posts) > 10): ?>
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    <?php else: ?>
                        <article class="blog_item">
                            <p>No available posts.</p>
                        </article>
                    <?php endif; ?>
                </div>
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