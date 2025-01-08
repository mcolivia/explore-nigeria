
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Explore Nigeria</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Load all CSS files here -->
    
    <?= $this->Html->css([
            'bootstrap.min', 
            'animate', 
            'owl.carousel.min',
            'themify-icons',
            'flaticon',
            '/fontawesome/css/all.min',
            'magnific-popup',
            'gijgo.min',
            'nice-select',
            'slick',
            'style'

        ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!--::header part start::-->
    <?= $this->element("header") ?> 
    <!-- Header part end-->

    <?= $this->fetch('content');?>

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-5">
                    <div class="single-footer-widget">
                        <h4>Discover Destination</h4>
                        <ul>
                            <li><a href="#">Lagos, NGN</a></li>
                            <li><a href="#">Abuja, NGN</a></li>
                            <li><a href="#">Calabar, NGN</a></li>
                            <li><a href="#">Sapele, Delta</a></li>
                            <li><a href="#">Obudu, Cross River</a></li>
                            <li><a href="#">Omu, Epe</a></li>
                            <li><a href="#">Yankari, Kano</a></li>
                            <li><a href="#">Yankari, Kano</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="single-footer-widget">
                        <h4>Subscribe Newsletter</h4>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase"> <i class="far fa-paper-plane"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                        <p>Subscribe our newsletter to get update news and offers</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="single-footer-widget footer_icon">
                        <h4>Contact Us</h4>
                        <p>10 Ford Drive, Lekki Lagos, Nigeria. 
                                +44 773 368 6186</p>
                        <span>hello@discovernigeria.co.ng</span>
                        <div class="social-icons">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter-alt"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                            <a href="#"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->


    <?= $this->Html->script([
                'jquery-1.12.1.min', 
                'popper.min', 
                'bootstrap.min',
                'jquery.magnific-popup',
                'owl.carousel.min',
                'masonry.pkgd',
                'jquery.nice-select.min',
                'gijgo.min',
                'jquery.ajaxchimp.min',
                'jquery.form',
                'jquery.validate.min.js',
                'mail-script',
                'contact',
                'custom'
            ]) 
    ?>

    
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Create A Story</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= $this->Form->create($formPost, ['url' => '/posts/create-story', 'enctype'=>'multipart/form-data']) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <?= $this->Form->control('title', ['class'=>'form-control', 'placeholder'=>'Enter title', 'required']);?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('image_url', ['class'=>'form-control', 'type'=>'file', 'placeholder'=>'Enter title', 'required']);?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('content', ['class'=>'form-control', 'placeholder'=>'Enter title', 'required', 'type'=>'textarea']);?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('is_published');?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->button(__('Post Story'), ["class"=>"btn btn-primary"]) ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <script>
        $('#password, #confirm-password').on('keyup', function () {
        if ($('#password').val() == $('#confirm-password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
        
</body>

</html>