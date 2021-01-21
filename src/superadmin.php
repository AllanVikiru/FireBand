<?php
require_once '../vendor/autoload.php';
use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);

require 'includes/_global/config.php';
require 'includes/_superadmin/config.php';
require 'includes/_global/views/head_start.php';

//  DataTables Plugin CSS 
$cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css');

require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';
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
            <div id="users-table"></div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php
require 'includes/_superadmin/modals/new_user.php';
require 'includes/_superadmin/modals/user_info.php';
require 'includes/_superadmin/modals/my_info.php';
require 'includes/_superadmin/modals/ts_info.php';
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';?>


<script language="JavaScript" type="text/javascript" src="app/app.js?v=<?= filemtime('app/app.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/create.js?v=<?= filemtime('app/_superadmin/users/create.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/read_all.js?v=<?= filemtime('app/_superadmin/users/read_all.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/read_one.js?v=<?= filemtime('app/_superadmin/users/read_one.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/update.js?v=<?= filemtime('app/_superadmin/users/update.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/delete.js?v=<?= filemtime('app/_superadmin/users/delete.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/thingspeak/create.js?v=<?= filemtime('app/_superadmin/thingspeak/create.js') ?>"></script>
<?php
//DataTables JS Plugins for Commander Dashboard
$cb->get_js('js/plugins/datatables/jquery.dataTables.min.js');
$cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js');
$cb->get_js('js/pages/be_tables_datatables.min.js');
// todo: form validation $cb->get_js('js/pages/super_validation.min.js');


require 'includes/_global/views/footer_end.php';
?>
