<?php

///biblio de fonctions utiles

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../src/Exception.php';
require_once '../src/PHPMailer.php';
require_once '../src/SMTP.php';



///envoi de mail

function sendRequestInscription(){

    $mail = new PHPMailer();
    try {
        //Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host= 'mail.gandi.net';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username='inukshuk@nanookpandora.com';
        $mail->Password='inukshuk!';
                          //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('inukshuk@nanookpandora.com', 'Mailer');
        $mail->addAddress('olivier.stierer@gmail.com', 'Olivier');     //Add a recipient
       
    
      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Salut Raton';
        $mail->Body    = 'Vous êtes une saucisse chere amie !';
    
        $mail->send();


    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




}