<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/fire-emergency.jpg');">
    <div class="row mx-0 bg-pulse-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h2 font-w600 text-white mb-5">
                    FireBand - Firefighter Health and Safety is Our Priority
                </p>
                <p class="font-size-h6 text-white-op">
                    <?=$cb->name?> v <?=$cb->version?> &copy; <span class="js-year-copy"></span>
                </p>
                <p class="font-italic text-white-op">
                    Image Source: <a class="text-white-op" href="https://www.pexels.com/@tony-pham-1748559">Tony Pham</a> from Pexels
                </p>
            </div>
            
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="javascript:void(0)"><?=$cb->logo?></a></span>
                    <h1 class="h3 font-w700 mt-30 mb-10">Create New Account</h1>
                    <h2 class="h5 font-w400 text-muted mb-0 font-italic">Fill in the form below</h2>
                </div>
                <!-- END Header -->

                <!-- Sign Up Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-register px-30" action="commander.php" method="post">
                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="reg-firstname" name="reg-firstname">
                                <label for="reg-firstname">First Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="reg-lastname" name="reg-lastname">
                                <label for="reg-lastname">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="email" class="form-control" id="reg-email" name="reg-email">
                                <label for="reg-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="reg-password" name="reg-password">
                                <label for="reg-password">Password</label> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="reg-password-confirm" name="reg-password-confirm">
                                <label for="reg-password-confirm">Password Confirmation</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="reg-terms" name="reg-terms">
                                <label class="custom-control-label" for="reg-terms">I agree to Terms &amp; Conditions</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="reg-privacy" name="reg-privacy">
                                <label class="custom-control-label" for="reg-privacy">I agree to the Privacy Policy</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-success" id="register">
                            <i class="fa fa-user-plus mr-10"></i> Create Account
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" data-toggle="modal" data-target="#modal-terms">
                                <i class="fa fa-book text-muted mr-5"></i> Read Terms and Conditions
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" data-toggle="modal" data-target="#modal-privacy">
                                <i class="fa fa-certificate text-muted mr-5"></i> Read Privacy Policy
                            </a>
                        </div>
                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login.php">
                            <i class="si si-login text-muted mr-5"></i> Sign In
                        </a>
                    </div>
                </form>
                <!-- END Sign Up Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php 
require 'inc/_global/modals/privacy.php';
require 'inc/_global/modals/terms.php';
require 'inc/_global/views/page_end.php'; 
require 'inc/_global/views/footer_start.php'; 

//Page JS Plugins 
$cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); 

// Page JS Code 
$cb->get_js('js/pages/auth_register.min.js'); 

?>