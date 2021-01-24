<?php
//autoload
define('AUTOLOAD_URL', 'vendor/autoload.php'); 

//credentials
define('CRED_URL', 'config/credentials.php');

//authentication
define('AUTH_LOGIN', 'src/auth/v1/login.php');
define('AUTH_LOGOUT', 'src/auth/v1/logout.php');
define('AUTH_CONFIRM', 'src/auth/v1/confirm.php');
define('AUTH_RESET', 'src/auth/v1/reset.php');

//mailer 
define('MAILER_URL', 'src/mail/mailer.php');
define('MAILER_LOGO', 'src/assets/media/photos/logo.png');

//database connection 
define('DB_CONNECT_URL', 'src/api/v1/db/connect.php');

//models
define('USER_MODEL_URL', 'src/api/v1/models/user/user.php');
define('PROFILE_MODEL_URL', 'src/api/v1/models/profile/profile.php');
define('ROLE_MODEL_URL', 'src/api/v1/models/role/role.php');
define('SEX_MODEL_URL', 'src/api/v1/models/sex/sex.php');
define('THINGSPEAK_MODEL_URL', 'src/api/v1/models/thingspeak/thingspeak.php');
define('VO2MAX_MODEL_URL', 'src/api/v1/models/vo2max/vo2max.php');

//forms
define('HEALTH_PROFILE_FORM', 'src/includes/_global/forms/health_profile.php');
define('MY_INFO_FORM', 'src/includes/_global/forms/my_info.php');
define('VO2_CALC_FORM', 'src/includes/_global/forms/vo2_calculator.php');

//global views
define('GLOBAL_VIEW_CONFIG', 'src/includes/_global/config.php');
define('GLOBAL_VIEW_HEADER_START', 'src/includes/_global/views/head_start.php');
define('GLOBAL_VIEW_HEADER_END', 'src/includes/_global/views/head_end.php');
define('GLOBAL_VIEW_PAGE_START', 'src/includes/_global/views/page_start.php');
define('GLOBAL_VIEW_PAGE_END', 'src/includes/_global/views/page_end.php');
define('GLOBAL_VIEW_FOOTER_START', 'src/includes/_global/views/footer_start.php');
define('GLOBAL_VIEW_FOOTER_END', 'src/includes/_global/views/footer_end.php');

//global modals
define('GLOBAL_TERMS_MODAL', 'src/includes/_global/modals/terms.php');
define('GLOBAL_PRIVACY_MODAL', 'src/includes/_global/modals/privacy.php');
define('GLOBAL_PASSWORD_RESET_MODAL', 'src/includes/_global/modals/pw_reset.php');

//firefighter views
define('FIREFIGHTER_VIEW_CONFIG', 'src/includes/_firefighter/config.php');

//commander views and modals 
define('COMMANDER_VIEW_CONFIG', 'src/includes/_commander/config.php');
define('COMMANDER_FIREFIGHTER_INFO_MODAL', 'src/includes/_commander/modals/ff_info.php');
define('COMMANDER_MY_INFO_MODAL', 'src/includes/_commander/modals/my_info.php');

//commander report view and content
define('REPORT_VIEW_CONFIG', 'src/includes/_report/config.php');
define('REPORT_VIEW_CONTENT', 'src/includes/_report/views/content.php');

//superadmin views and modals
define('SUPERADMIN_VIEW_CONFIG', 'src/includes/_superadmin/config.php');
define('SUPERADMIN_NEW_USER_MODAL', 'src/includes/_superadmin/modals/new_user.php');
define('SUPERADMIN_USER_INFO_MODAL', 'src/includes/_superadmin/modals/user_info.php');
define('SUPERADMIN_MY_INFO_MODAL', 'src/includes/_superadmin/modals/my_info.php');
define('SUPERADMIN_THINGSPEAK_INFO_MODAL', 'src/includes/_superadmin/modals/ts_info.php');
