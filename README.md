# FireBand Web App
> Description

Client application for FireBand system users. Full description will be published soon. 

> Prerequisites

[PHP 7.3.5+](https://www.php.net/downloads.php)

[Composer 2.0.8+](https://getcomposer.org/download/)

[MySQL 5.0.12+](https://dev.mysql.com/downloads/installer/)

> App Setup

1. First, clone this tree locally and set the credentials as specified below

2. Copy the SQL code in ``` config/fireband.sql``` to your MySQL server. 
    
    NOTE: ensure to <ins>copy</ins> the content, not to import directly. It will cause some constraints to fail. 

3. In ``` config/credentials.php```, set the database and PHPMailer credentials as specified. 
    
    NOTE: For PHPMailer, Gmail SMTP was used, use this [tutorial](https://netcorecloud.com/tutorials/send-an-email-via-gmail-smtp-server-using-php/) to assist in setup, or visit this [website](https://www.sitepoint.com/sending-emails-php-phpmailer/) for a step-by-step tutorial of the alternative i.e. local mail server.

4. Run ```composer install``` at the terminal in which the project folder is situated.

5. Proceed to your browser to the address ```localhost/FireBand``` in which you will be directed to the login page. Some sample user credentials are available in ```config\credentials.txt```.
            