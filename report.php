<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;

use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);
$id = Session::get('id');

$logout_url = AUTH_LOGOUT;

if (Session::get('role') != 2) {
    header("Location: .$logout_url.");
    exit;
}

require GLOBAL_VIEW_CONFIG;
require REPORT_VIEW_CONFIG;

require GLOBAL_VIEW_HEADER_START;
require GLOBAL_VIEW_HEADER_END;
require GLOBAL_VIEW_PAGE_START;
?>

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('<?= $cb->assets_folder; ?>/media/photos/fire-truck.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" id="username"></h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp" id="email"></h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<?php
//Start Page Content
require REPORT_VIEW_CONTENT;
//END Page Content

require GLOBAL_VIEW_PAGE_END;
require GLOBAL_VIEW_FOOTER_START;

//Page App Code
$cb->get_app_js('_commander/thingspeak/report.js?v='.filemtime('src/app/v1/_commander/thingspeak/report.js'));

//Page JS Plugins
$cb->get_asset_js('js/plugins/jquery-validation/jquery.validate.min.js');

//Page JS Code 
$cb->get_asset_js('_es6/pages/auth_redirect.js'); //logout redirect
$cb->get_asset_js('js/pages/db_forms.min.js'); //forms validation

require GLOBAL_VIEW_FOOTER_END;
?>