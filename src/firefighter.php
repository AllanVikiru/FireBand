<?php
require_once '../vendor/autoload.php';
use Delight\Cookie\Session;
Session::start('Lax');
Session::regenerate(true);
require 'includes/_global/config.php';
require 'includes/_firefighter/config.php';

// Codebase - Page specific configuration
$cb->l_header_fixed     = true;
$cb->l_header_style     = 'glass-inverse';
$cb->l_sidebar_inverse  = true;
$cb->l_sidebar_mini     = true;

require 'includes/_global/views/head_start.php';

// Bootstrap Datepicker CSS
$cb->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');

require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';

$api_key = '2K2D99IJKQQ9D8CX';
$link = 'https://thingspeak.com/channels/1259465/charts/1?api_key=' . $api_key . '&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&timescale=30&title=Is+the+Device+Worn%3F+%28every+30+seconds%29&type=step';
$spdlink = 'https://thingspeak.com/channels/1259465/charts/7?api_key=' . $api_key . '&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Ground+Speed+%28m%2Fs%29&type=spline';

?>
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('<?= $cb->assets_folder; ?>/media/photos/fire-reel.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp"><?=Session::get('username')?></h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp"> User ID: <?=Session::get('id')?></h2>
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
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Heart Rate <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?= $spdlink; ?>"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Air Temperature <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?= $link; ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Relative Humidity <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?= $link; ?>"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Location <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe width="530" height="300" src="<?= $link; ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';
?>
<script language="JavaScript" type="text/javascript" src="app/app.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/user/read_one.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/profile/read_one.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/profile/update.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/vo2max/read_one.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/vo2max/calculate.js"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/vo2max/update.js"></script>

<?php
//Page JS Plugins
// $cb->get_js('js/plugins/chartjs/Chart.bundle.min.js');
$cb->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');
//Page JS Code 
//$cb->get_js('js/pages/be_pages_dashboard.min.js'); 

$cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js');
//$cb->get_js('js/pages/be_forms_plugins.min.js');
?>

<script>
    jQuery(function() {
        Codebase.helpers(['datepicker', 'masked-inputs']);
    });
</script>

<?php require 'includes/_global/views/footer_end.php'; ?>