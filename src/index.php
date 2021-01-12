<?php
// TODO: DEFINE ROOT DIRECTORY
// define("ROOT", __DIR__ ."/");
// define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
//    ? "http://localhost/your_work_folder/"
//    : "http://your_site_name.com/"
// );
// If you are using query strings to load different pages,
// you can use the following value: basename($_SERVER['REQUEST_URI'])basename($_SERVER['PHP_SELF']);

header('Location: login.php');
die();