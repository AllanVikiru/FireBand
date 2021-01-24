<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;

require GLOBAL_VIEW_CONFIG;
require GLOBAL_VIEW_HEADER_START;
require GLOBAL_VIEW_HEADER_END;
require GLOBAL_VIEW_PAGE_START;

?>
<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/firefighters.jpg');">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h2 font-w600 text-white mb-5">
                    Firefighter Safety starts with You.
                </p>
                <p class="font-size-h6 text-white-op">
                    <?= $cb->name ?> v <?= $cb->version ?> &copy; <span class="js-year-copy"></span>
                </p>
                <p class="font-italic text-white-op">
                    Image Source: <a class="text-white-op" href="https://www.pexels.com/@pixabay">Pixabay</a> </span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="javascript:void(0)"><?= $cb->logo ?></a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Account</h1>
                    <h2 class="h5 font-w400 font-italic text-muted mb-0">Sign in through the form below</h2>
                </div>
                <!-- END Header -->

                <!-- Login Form -->
                <form class="js-validation-login px-30" action= "src/auth/v1/login.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="email" class="form-control" id="log-email" name="log-email">
                                <label for="log-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="log-password" name="log-password">
                                <label for="log-password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary" name="login" value="login">
                            <i class="si si-login mr-10"></i> Sign In
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="reset.php">
                                <i class="si si-lock-open mr-5"></i> Forgot Password
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
                <!-- END Login Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php
// Page includes
require GLOBAL_PRIVACY_MODAL;
require GLOBAL_TERMS_MODAL;
require GLOBAL_VIEW_PAGE_END;
require GLOBAL_VIEW_FOOTER_START;

// Page JS Plugins
$cb->get_asset_js('js/plugins/jquery-validation/jquery.validate.min.js');

// Page JS Code
$cb->get_asset_js('_es6/pages/auth_redirect.js'); //form redirect
$cb->get_asset_js('js/pages/auth_login.min.js'); //form validation

require GLOBAL_VIEW_FOOTER_END;