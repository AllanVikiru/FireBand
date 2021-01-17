<?php
require_once '../vendor/autoload.php';

use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);
require 'includes/_global/config.php';
require 'includes/_commander/config.php';
require 'includes/_global/views/head_start.php';

//require 'app/index.php';
//    DataTables Plugin CSS 
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

require 'includes/_commander/modals/ff_info.php';
require 'includes/_commander/modals/my_info.php';
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';
?>
<script language="JavaScript" type="text/javascript" src="app/app.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_commander/users/read_all.js"></script>
<?php
//DataTables JS Plugins for Commander Dashboard
$cb->get_js('js/plugins/datatables/jquery.dataTables.min.js');
$cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js');
$cb->get_js('js/pages/be_tables_datatables.min.js');

$cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js');

$cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js');

//<!-- Page JS Code -->
$cb->get_js('js/pages/be_forms_wizard.min.js');
$cb->get_js('js/pages/be_forms_plugins.min.js');

?>
<script>
    jQuery(function() {
        Codebase.helpers(['datepicker', 'masked-inputs']);
    });
</script>

<?php require 'includes/_global/views/footer_end.php'; ?>