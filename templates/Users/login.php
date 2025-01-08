<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Explore Nigeria</h2>
                            <p>home . login</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="media contact-info">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="contact-title">Login</h2>
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create($user) ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Enter email address', 'required']); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Enter password', 'required']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <?= $this->Form->button(__('Login'), ['class' => 'button button-contactForm btn_1']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-lg-3">
                    <div class="media contact-info">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->