<?php
while (!file_exists('config'))
    chdir('..');
require_once 'config/routes.php';
require_once AUTOLOAD_URL;


use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);

$logout_url = AUTH_LOGOUT;

if (Session::get('role') != 1) {
    header("Location: $logout_url");
    exit;
}

require GLOBAL_VIEW_CONFIG;
require SUPERADMIN_VIEW_CONFIG;
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
            <h3 class="block-title">All Users</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- <div id="users-table"></div> -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="users-dt">
                <thead>
                    <tr>
                        <th style="width: 25%;">Full Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Role</th>
                        <th class="text-center" style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody id="users-table"></tbody>
            </table>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php
require SUPERADMIN_NEW_USER_MODAL;
require SUPERADMIN_USER_INFO_MODAL;
require SUPERADMIN_MY_INFO_MODAL;
require SUPERADMIN_THINGSPEAK_INFO_MODAL;
require GLOBAL_PASSWORD_RESET_MODAL;
require GLOBAL_VIEW_PAGE_END;
require GLOBAL_VIEW_FOOTER_START;

//Page App Code 
$cb->get_app_js('app.js');
$cb->get_app_js('pw_reset.js');
$cb->get_app_js('_superadmin/users/create.js');
$cb->get_app_js('_superadmin/users/read_all.js');
$cb->get_app_js('_superadmin/users/read_one.js');
$cb->get_app_js('_superadmin/users/update.js');
$cb->get_app_js('_superadmin/users/delete.js');
$cb->get_app_js('_superadmin/thingspeak/update.js');

//Page JS Plugins
$cb->get_asset_js('js/plugins/jquery-validation/jquery.validate.min.js');

// Page JS Code 
$cb->get_asset_js('_es6/pages/auth_redirect.js'); //logout redirect
$cb->get_asset_js('js/pages/db_forms.min.js'); //forms validation

require GLOBAL_VIEW_FOOTER_END;
?>