<?php require 'includes/_global/config.php'; ?>
<?php require 'includes/_global/views/head_start.php'; ?>
<?php require 'includes/_global/views/head_end.php'; ?>
<?php require 'includes/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/fire-alarm.jpg');">
    <div class="row mx-0 bg-primary-dark-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h2 font-w600 text-white">
                    Thank you for your service!
                </p>
                <p class="font-size-h6 text-white-op">
                    <?= $cb->name ?> v <?= $cb->version ?> &copy; <span class="js-year-copy"></span>
                </p>
                <p class="font-italic text-white-op">
                    Image Source: <a class="text-white-op" href="https://www.pexels.com/@pixabay">Pixabay</a> </span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="javascript:void(0)"><?= $cb->logo ?></a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Reset Account Password</h1>
                    <h2 class="h5 font-italic font-w400 text-muted mb-0">Enter the email address used in registration</h2>
                </div>
                <!-- END Header -->

                <!-- Password Reset Form -->
                <form class="js-validation-reset px-30" action="../src/auth/reset.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="email" class="form-control" id="reset-email" name="reset-email">
                                <label for="reset-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary" value="reset" name="reset">
                            <i class="fa fa-mail-forward mr-10"></i> Send Activation Code
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login.php">
                                <i class="si si-login mr-5"></i> Sign In
                            </a>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" data-toggle="modal" data-target="#modal-terms">
                                <i class="fa fa-book text-muted mr-5"></i> Read Terms and Conditions
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" data-toggle="modal" data-target="#modal-privacy">
                                <i class="fa fa-certificate text-muted mr-5"></i> Read Privacy Policy
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Password Reset Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php
//Page Includes
require 'includes/_global/modals/privacy.php';
require 'includes/_global/modals/terms.php';
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';

//Page JS Plugins 
$cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js');
//Reset Form Validation
$cb->get_js('js/pages/auth_reset.min.js'); 

require 'includes/_global/views/footer_end.php';
?>