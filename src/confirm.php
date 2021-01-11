<?php
//require '../src/auth/register.php';
require 'includes/_global/config.php';
require 'includes/_global/views/head_start.php';
require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';

?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/fire-emergency.jpg');">
    <div class="row mx-0 bg-pulse-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h2 font-w600 text-white mb-5">
                    FireBand - Firefighter Health and Safety is Our Priority
                </p>
                <p class="font-size-h6 text-white-op">
                    <?= $cb->name ?> v <?= $cb->version ?> &copy; <span class="js-year-copy"></span>
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
                    <a class="link-effect font-w700" href="javascript:void(0)"><?= $cb->logo ?></a></span>
                    <h2 class="h3 font-w700 mt-30 mb-10">Reset Account Password</h2>
                    <h4 class="h5 font-w400 text-muted mb-0 font-italic">Enter the Activation Code sent to your Email and your New Password</h4>
                </div>
                <!-- END Header -->

                <!-- New Password Form -->
                <form class="js-validate-activation-code px-30" action="../src/auth/confirm.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="act-code" name="act-code">
                                <label for="act-code">Activation Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="new-password" name="new-password">
                                <label for="new-password">New Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm">
                                <label for="new-password-confirm">New Password Confirmation</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-success" value="confirm" name="confirm">
                            <i class="fa fa-save mr-10"></i> Reset Password
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="reset.php">
                                <i class="fa fa-angle-double-left mr-5"></i> I didn't get a code
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
                <!-- END New Password Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php
require 'includes/_global/modals/privacy.php';
require 'includes/_global/modals/terms.php';
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';

//Page JS Plugins 
$cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js');

//Confirm Code Form Validation
$cb->get_js('js/pages/auth_confirm.min.js');
?>