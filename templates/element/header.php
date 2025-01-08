<header class="main_menu">
    <div class="sub_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6">
                    <div class="sub_menu_right_content">
                        <span>Top destinations</span>
                        <a href="#">Lagos</a>
                        <a href="#">Abuja</a>
                        <a href="#">Calabar</a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6">
                    <div class="sub_menu_social_icon">
                        <a href="#"><i class="flaticon-facebook"></i></a>
                        <a href="#"><i class="flaticon-twitter"></i></a>
                        <a href="#"><i class="flaticon-skype"></i></a>
                        <a href="#"><i class="flaticon-instagram"></i></a>
                        <span><i class="flaticon-phone-call"></i>+880 356 257 142</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu_iner">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-12">
                    <?php //debug($Auth);?>
                    <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                        <a class="navbar-brand" href="<?= $this->Url->build('/'); ?>"><b>Explore Nigeria</b></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $this->Url->build('/'); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $this->Url->build('/pages/about-nigeria'); ?>">About Nigeria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $this->Url->build('/'); ?>">Discover Nigeria</a>
                                </li>
                                <?php if(isset($Auth) and ($Auth['is_admin'] == 0)):?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $this->Url->build('/users/my-stories'); ?>">My Stories</a>
                                    </li>
                                <?php elseif(isset($Auth) and ($Auth['is_admin'] == 1)): ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Administrator
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <a class="dropdown-item" href="<?= $this->Url->build('/users/my-stories'); ?>">Manage Stories</a>
                                            <a class="dropdown-item" href="<?= $this->Url->build('/users/index'); ?>">Manage Story Tellers</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="blog.html">Blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="top_place.html">top place</a>
                                        <a class="dropdown-item" href="tour_details.html">tour details</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li> -->
                            </ul>
                        </div>

                        <?php if(isset($Auth) and !empty($Auth)):?>
                            <a href="#" class="btn_1 d-none d-lg-block"  data-toggle="modal" data-target=".bd-example-modal-lg">Create Story</a> &nbsp;
                            <a href="<?= $this->Url->build('/users/logout'); ?>" class="btn_1 d-none d-lg-block">Logout</a>
                        <?php else:?>
                            <a href="<?= $this->Url->build('/users/login'); ?>" class="btn_1 d-none d-lg-block">Login</a> &nbsp;
                            <a href="<?= $this->Url->build('/users/register'); ?>" class="btn_1 d-none d-lg-block">Register</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>