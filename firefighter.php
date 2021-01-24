<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;


use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);

$logout_url = AUTH_LOGOUT;

if (Session::get('role') != 3) {
    header("Location: $logout_url");
    exit;
}

require GLOBAL_VIEW_CONFIG;
require FIREFIGHTER_VIEW_CONFIG;
require GLOBAL_VIEW_HEADER_START;

// Bootstrap Datepicker CSS
$cb->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');

require GLOBAL_VIEW_HEADER_END;
require GLOBAL_VIEW_PAGE_START;
?>
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('<?= $cb->assets_folder; ?>/media/photos/fire-reel.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp"><?= Session::get('username') ?></h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp"> Email Address: <?= Session::get('email') ?></h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<?php
//Start Page Content
require REPORT_VIEW_CONTENT;
//END Page Content
require GLOBAL_PASSWORD_RESET_MODAL;
require GLOBAL_VIEW_PAGE_END;
require GLOBAL_VIEW_FOOTER_START;

// Page App Code 
$cb->get_app_js('app.js?v='.filemtime('src/app/v1/app.js'));
$cb->get_app_js('vo2_calculator.js?v='.filemtime('src/app/v1/vo2_calculator.js'));
$cb->get_app_js('pw_reset.js?v='.filemtime('src/app/v1/pw_reset.js'));
$cb->get_app_js('_firefighter/user/read_one.js?v='.filemtime('src/app/v1/_firefighter/user/read_one.js'));
$cb->get_app_js('_firefighter/user/update.js?v='.filemtime('src/app/v1/_firefighter/user/update.js'));
$cb->get_app_js('_firefighter/profile/read_one.js?v='.filemtime('src/app/v1/_firefighter/profile/read_one.js'));
$cb->get_app_js('_firefighter/profile/update.js?v='.filemtime('src/app/v1/_firefighter/profile/update.js'));
$cb->get_app_js('_firefighter/vo2max/read_one.js?v='.filemtime('src/app/v1/_firefighter/vo2max/read_one.js'));
$cb->get_app_js('_firefighter/vo2max/update.js?v='.filemtime('src/app/v1/_firefighter/vo2max/update.js'));
$cb->get_app_js('_firefighter/thingspeak/report.js?v='.filemtime('src/app/v1/_firefighter/thingspeak/report.js'));

//Page JS Plugins
$cb->get_asset_js('js/plugins/jquery-validation/jquery.validate.min.js');
$cb->get_asset_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');

//Page JS Code 
$cb->get_asset_js('_es6/pages/auth_redirect.js'); //logout redirect
$cb->get_asset_js('js/pages/db_forms.min.js'); //forms validation

?>

<script>
    jQuery(function() {
        Codebase.helpers(['datepicker']);
    });
</script>
<script language="JavaScript" type="text/javascript">
    var id = <?= Session::get('id') ?>
</script>

<?php require GLOBAL_VIEW_FOOTER_END; ?>