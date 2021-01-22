<?php
require_once '../vendor/autoload.php';

use Delight\Cookie\Session;

Session::start('Lax');
Session::regenerate(true);
$id = Session::get('id');

require 'includes/_global/config.php';
require 'includes/_report/config.php';

require 'includes/_global/views/head_start.php';
require 'includes/_global/views/head_end.php';
require 'includes/_global/views/page_start.php';
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
<!-- Page Content -->
<?php require 'includes/_report/views/content.php'; ?>
<!-- END Page Content -->
<?php
require 'includes/_global/views/page_end.php';
require 'includes/_global/views/footer_start.php';
?>
<script language="JavaScript" type="text/javascript" src="app/_commander/thingspeak/report.js?v=<?= filemtime('app/_commander/thingspeak/report.js') ?>)"></script>

<?php require 'includes/_global/views/footer_end.php'; ?>