<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public $mail;
    //private $logo_url = '../images/logo.png';

    public function sendMail($sendAddress, $subject, $body, $altBody)
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->SMTPDebug = 0;    //disable SMTP debugging.                           
            $this->mail->isSMTP();            //Set PHPMailer to use SMTP.                        
            $this->mail->Host = "smtp.gmail.com";  //Set SMTP host name  
            $this->mail->SMTPAuth = true;         //Set this to true if SMTP host requires authentication to send email   
            //Provide username and password     
            $this->mail->Username = "avdev2021@gmail.com";
            $this->mail->Password = "mlrrufkcdwawfgpx";
            $this->mail->SMTPSecure = "tls";   //If SMTP requires TLS encryption then set it
            //Set TCP port to connect to
            $this->mail->Port = 587;

            $this->mail->From = "noreply@fireband.com";
            $this->mail->FromName = "Fireband App";

            $this->mail->addAddress($sendAddress);
            //$this->mail->addEmbeddedImage($this->logo_url, 'logo'); //Filename is optional

            $this->mail->isHTML(true);

            $this->mail->Subject = $subject;
            $this->mail->Body =  $body;
            $this->mail->AltBody = $altBody;

            $this->mail->send();
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("An error occurred. Try again later.");';
            echo 'console.log(' . $this->mail->ErrorInfo . ');';
            echo '</script>';
        }
    }
}
