<?php
require_once '../vendor/autoload.php';
require 'includes/_global/config.php';
require 'includes/_superadmin/config.php';
require 'includes/_global/views/head_start.php';
//require 'app/index.php';

//  DataTables Plugin CSS 
$cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css');

require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';

use Delight\Cookie\Session;

Session::id();
?>

<div id="page-loader" class="show"></div>
<!-- Quick Navigation 4 col-md-4 col-xl-4-->
<div class="bg-body-dark">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <a class="block block-link-pop text-right bg-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-users fa-3x text-primary-light"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="750" data-to="5">5</div>
                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Commanders</div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a class="block block-link-pop text-right bg-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="fa fa-fire fa-3x text-primary-light"></i>
                        </div>
                        <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="750" data-to="45">45</div>
                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Firefighters</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END Quick Navigation -->
<!-- Page Content -->
<div class="content">
    <!-- <div id="app"></div> -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">All Users</h3>
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
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';?>

<!-- bootbox for confirm pop up -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<!-- input mask for phone number -->
<script src="https://jsuites.net/v3/jsuites.js"></script>

<script language="JavaScript" type="text/javascript" src="app/app.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/create.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/read_all.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/read_one.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/update.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_superadmin/users/delete.js"></script>
<?php
//DataTables JS Plugins for Commander Dashboard
$cb->get_js('js/plugins/datatables/jquery.dataTables.min.js');
$cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js');
$cb->get_js('js/pages/be_tables_datatables.min.js');
// todo: form validation $cb->get_js('js/pages/super_validation.min.js');

$cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js');

$cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js');

require 'includes/_global/views/footer_end.php';
?>

<script>
    jQuery(function() {
        Codebase.helpers(['datepicker', 'masked-inputs']);
    });
</script>