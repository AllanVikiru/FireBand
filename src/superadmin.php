<?php
require 'includes/_global/config.php';
require 'includes/_superadmin/config.php';
require 'includes/_global/views/head_start.php';
//require 'app/index.php';

//    DataTables Plugin CSS 
$cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css');

require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';
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
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">User ID</th>
                        <th style="width: 25%;">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Role</th>
                        <th class="text-center" style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="font-w600">Justin Hunt</td>
                        <td class="d-none d-sm-table-cell">customer1@example.com</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-primary">Firefighter</span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-secondary " data-toggle="modal" data-target="#modal-user-info" title="Details">
                                <i class="fa fa-info"></i>&ensp;Details
                            </button>
                            &emsp;
                            <button type="button" class="btn btn-sm btn-secondary " title="Delete">
                                <i class="fa fa-user-times"></i>&ensp;Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- END Page Content -->
    <?php
    require 'includes/_superadmin/modals/new_user.php';
    require 'includes/_superadmin/modals/user_info.php';
    require 'includes/_superadmin/modals/my_info.php';
    require 'includes/_global/views/page_end.php';
    require 'includes/_global/views/footer_start.php';

    //DataTables JS Plugins for Commander Dashboard
    $cb->get_js('js/plugins/datatables/jquery.dataTables.min.js');
    $cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js');
    $cb->get_js('js/pages/be_tables_datatables.min.js');

    $cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js');

    $cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js');

    //<!-- Page JS Code -->
    $cb->get_js('js/pages/be_forms_wizard.min.js');
    $cb->get_js('js/pages/be_forms_plugins.min.js');
    require 'includes/_global/views/footer_end.php';
    ?>

    <script>
        jQuery(function() {
            Codebase.helpers(['datepicker', 'masked-inputs']);
        });
    </script>