<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private $mail;
    private $logo_url = '../assets/media/photos/logo.png';

    public function sendMail($sendAddress, $subject, $body, $altBody)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 3;    //Enable SMTP debugging.                           
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
        $this->mail->addEmbeddedImage($this->logo_url, 'logo'); //Filename is optional

        $this->mail->isHTML(true);

        $this->mail->Subject = $subject;
        $this->mail->Body =  $body;
        $this->mail->AltBody = $altBody;

        try {
            echo '<script language="javascript">';
            echo 'console.log('.$this->mail->send().');';
            echo '</script>';
            //echo 'Request has been generated';
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("There is an error with sending the code. Try again later.");';
            echo "location.href='../reset.php';";
            echo 'console.log('.$this->mail->ErrorInfo.');';
            echo '</script>';
            
        }
    }
}
