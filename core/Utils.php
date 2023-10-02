<?php

///biblio de fonctions utiles

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../src/Exception.php';
require_once '../src/PHPMailer.php';
require_once '../src/SMTP.php';



///envoi de mail

function sendRequestInscription(string $email, string $message,$token){

    $mail = new PHPMailer();

    $lien="<a href='localhost/mvc2/confirmation/".$token."'>confirmer</a>";//put uniqid as token in url => update user table adding token 

    $content ='Gloire aux oursons ! '.$email.' souhaite faire partie de la famille. Voici son message : '.$message.'. Le lien pour validation : '.$lien;

    try {
        

        $mail->SMTPDebug = 2;                     
        $mail->isSMTP();                                           
        $mail->Host= 'mail.gandi.net';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username='inukshuk@nanookpandora.com';
        $mail->Password='inukshuk!';
        $mail->Port       = 587;                                    
        

        $mail->setFrom('inukshukRequest@inukshuk.com', 'Inukshuk');
        $mail->addAddress('inukshuk@nanookpandora.com', 'Olivier');     
       
    
      
        // mail Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Demande d\'inscription';
        $mail->Body    = $content;
    
        $mail->send();


    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




}

function sendConfirmationInscription(string $email){

    $mail = new PHPMailer();


    $content ='Bonjour ! Votre demande d\'inscription a bien été prise en compte. Rendez-vous sur http://nanookpandora.com/inukshuk';

    try {
        

        $mail->SMTPDebug = 2;                     
        $mail->isSMTP();                                           
        $mail->Host= 'mail.gandi.net';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username='inukshuk@nanookpandora.com';
        $mail->Password='inukshuk!';
        $mail->Port= 587;                                    
        

        $mail->setFrom('inukshuk@nanookpandora.com', 'Inukshuk');
        $mail->addAddress($email);     
       
    
      
        // mail Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Confirmation de votre demande d\'inscription.';
        $mail->Body    = $content;
    
        $mail->send();
        return TRUE;

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




}