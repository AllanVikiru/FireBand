<?php 

require 'inc/_global/config.php';  

// Codebase - Page specific configuration
$cb->l_header_fixed     = true;
$cb->l_header_style     = 'glass-inverse';
$cb->l_sidebar_inverse  = true;
$cb->l_sidebar_mini     = true;

require 'inc/_global/views/head_start.php'; 
require 'inc/_global/views/head_end.php';
require 'inc/_global/views/page_start.php';


$api_key = '2K2D99IJKQQ9D8CX';
$link='https://thingspeak.com/channels/1259465/charts/1?api_key='. $api_key.'&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&timescale=30&title=Is+the+Device+Worn%3F+%28every+30+seconds%29&type=step';
$spdlink = 'https://thingspeak.com/channels/1259465/charts/7?api_key='. $api_key.'&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Ground+Speed+%28m%2Fs%29&type=spline';
?>

<?php require 'inc/_commander/views/inc_report_header.php'; ?>
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('<?=$cb->assets_folder; ?>/media/photos/fire-truck.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">John Smith</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Firefighter ID: FF-ID 001</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Data Report</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                <i class="si si-printer"></i> Print Report
            </button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                <i class="si si-refresh"></i>
            </button>
        </div>
    </div>
    <div class="content">
        <div class="row invisible" data-toggle="appear">
                <div class="col-xl-6">
                    <p><strong class="font-w700">Age: </strong> <mark>highlight</mark> </p>
                    <p><strong class="font-w700">Gender: </strong> <mark>highlight</mark> </p>
                    <p><strong class="font-w700">Weight: </strong> <mark>highlight</mark> </p>
                    <p><strong class="font-w700">Height: </strong> <mark>highlight</mark> </p>       
                </div>
                <div class="col-xl-6">
                    <p><strong class="font-w700">VO<sub>2</sub> max estimate (One Mile Jog Test): </strong> <mark>highlight</mark> </p>
                    <p><strong class="font-w700">Rating: </strong> <mark>highlight</mark> </p>
                </div>

            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-pulse-lighter">
                        <h3 class="block-title">
                            Current Air Temperature <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?=$spdlink;?>"></iframe>           
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-pulse-lighter">
                        <h3 class="block-title">
                            Current Air Temperature <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?=$link;?>"></iframe>           
                    </div>
                </div>
            </div>
        </div>
        <div class="row invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-pulse-lighter">
                        <h3 class="block-title">
                            Current Air Temperature <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?=$link;?>"></iframe>           
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-pulse-lighter">
                        <h3 class="block-title">
                            Current Air Temperature <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?=$link;?>"></iframe>           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/chartjs/Chart.bundle.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/be_pages_dashboard.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>