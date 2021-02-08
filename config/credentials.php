<?php
//database connection credentials
$db_servername = "";
$db_port = ""; //e.g 3306 for MySQL
$db_username = "";
$db_password = "";
$db_name = "fireband";

define('SERVER_NAME', $db_servername);
define('SERVER_PORT', $db_port);
define('SERVER_UNAME', $db_username);
define('SERVER_PASSWORD', $db_password);
define('DB_NAME', $db_name);

//phpmailer credentials
$mailer_username = "";
$mailer_password = "";

define('MAILER_UNAME', $mailer_username);
define('MAILER_PASSWORD', $mailer_password);