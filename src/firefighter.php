<?php
require_once '../vendor/autoload.php';

use Delight\Cookie\Session;
Session::start('Lax');
Session::regenerate(true);

if (Session::get('role') != 3){
    header("Location: ../src/auth/logout.php");
    exit;
}

require 'includes/_global/config.php';
require 'includes/_firefighter/config.php';
require 'includes/_global/views/head_start.php';

// Bootstrap Datepicker CSS
$cb->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');

require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';
?>
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('<?= $cb->assets_folder; ?>/media/photos/fire-reel.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp"><?=Session::get('username')?></h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp"> Email Address: <?=Session::get('email')?></h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<?php require 'includes/_report/views/content.php'; ?>
<!-- END Page Content -->
<?php
require 'includes/_global/modals/pw_reset.php';
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';
?>

<script language="JavaScript" type="text/javascript" src="app/app.js?v=<?= filemtime('app/app.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/vo2_calculator.js?v=<?= filemtime('app/vo2_calculator.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/pw_reset.js?v=<?= filemtime('app/pw_reset.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/user/read_one.js?v=<?= filemtime('app/_firefighter/user/read_one.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/user/update.js?v=<?= filemtime('app/_firefighter/user/update.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/profile/read_one.js?v=<?= filemtime('app/_firefighter/profile/read_one.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/profile/update.js?v=<?= filemtime('app/_firefighter/profile/update.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/vo2max/read_one.js?v=<?= filemtime('app/_firefighter/vo2max/read_one.js') ?>"></script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/vo2max/update.js?v=<?= filemtime('app/_firefighter/vo2max/update.js') ?>"></script>
<script language="JavaScript" type="text/javascript"> var id = <?= Session::get('id')?> </script>
<script language="JavaScript" type="text/javascript" src="app/_firefighter/thingspeak/report.js?v=<?= filemtime('app/_firefighter/thingspeak/report.js') ?>"></script>
<?php
//Page JS Plugins
$cb->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');
?>

<script>
    jQuery(function() {
        Codebase.helpers(['datepicker']);
    });
</script>

<?php require 'includes/_global/views/footer_end.php'; ?>