<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/fire-alarm.jpg');">
    <div class="row mx-0 bg-primary-dark-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h2 font-w600 text-white">
                    Thank you for your service!
                </p>
                <p class="font-size-h6 text-white-op">
                    <?=$cb->name?> v <?=$cb->version?> &copy; <span class="js-year-copy"></span>
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
                    <a class="link-effect font-w700" href="javascript:void(0)"><?=$cb->logo?></a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Reset your Account Password</h1>
                    <h2 class="h5 font-italic font-w400 text-muted mb-0">Enter the email address used in registration</h2>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-reset px-30" action="firefighter.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="reset-email" name="reset-email">
                                <label for="reset-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                            <i class="fa fa-asterisk mr-10"></i> Reset Password
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login.php">
                                <i class="fa fa-user text-muted mr-5"></i> Sign In
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/auth_reset.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>