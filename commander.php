<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;

use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);

$logout_url = AUTH_LOGOUT;

if (Session::get('role') != 2) {
    header("Location: $logout_url");
    exit;
}

require GLOBAL_VIEW_CONFIG;
require COMMANDER_VIEW_CONFIG;
require GLOBAL_VIEW_HEADER_START;
require GLOBAL_VIEW_HEADER_END;
require GLOBAL_VIEW_PAGE_START;
?>
<div id="page-loader" class="show"></div>
<!-- Page Content -->
<div class="content">
    <!-- <div id="app"></div> -->
    <div class="block">
        <div class="block-header block-header-default bg-primary-lighter">
            <h3 class="block-title">Registered Firefighters</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div id="ff-table"></div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php
require GLOBAL_PASSWORD_RESET_MODAL;
require COMMANDER_FIREFIGHTER_INFO_MODAL;
require COMMANDER_MY_INFO_MODAL;
require GLOBAL_VIEW_PAGE_END;
require GLOBAL_VIEW_FOOTER_START;

// Page App Code 
$cb->get_app_js('app.js?v='.filemtime('src/app/v1/app.js'));
$cb->get_app_js('vo2_calculator.js?v='.filemtime('src/app/v1/vo2_calculator.js'));
$cb->get_app_js('pw_reset.js?v='.filemtime('src/app/v1/pw_reset.js'));
$cb->get_app_js('_commander/profile/read_one.js?v='.filemtime('src/app/v1/_commander/profile/read_one.js'));
$cb->get_app_js('_commander/profile/update.js?v='.filemtime('src/app/v1/_commander/profile/update.js'));
$cb->get_app_js('_commander/thingspeak/read_one.js?v='.filemtime('src/app/v1/_commander/thingspeak/read_one.js'));
$cb->get_app_js('_commander/users/read_all.js?v='.filemtime('src/app/v1/_commander/users/read_all.js'));
$cb->get_app_js('_commander/users/read_one.js?v='.filemtime('src/app/v1/_commander/users/read_one.js'));
$cb->get_app_js('_commander/users/update.js?v='.filemtime('src/app/v1/_commander/users/update.js'));
$cb->get_app_js('_commander/vo2max/read_one.js?v='.filemtime('src/app/v1/_commander/vo2max/read_one.js'));
$cb->get_app_js('_commander/vo2max/update.js?v='.filemtime('src/app/v1/_commander/vo2max/update.js'));

//Page JS Plugins
$cb->get_asset_js('js/plugins/jquery-validation/jquery.validate.min.js');
$cb->get_asset_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');
$cb->get_asset_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js');

//Page JS Code  
$cb->get_asset_js('_es6/pages/auth_redirect.js'); //logout redirect
$cb->get_asset_js('js/pages/db_forms.min.js'); //forms validation

?>
<script>
    jQuery(function() {
        Codebase.helpers(['datepicker']);
    });
</script>

<?php require GLOBAL_VIEW_FOOTER_END; ?>