<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception ; 


$old_path = $_SERVER['HTTP_REFERER'] ; 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["name"]) && isset($_POST["message"])){

        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $subject = "email from";
        $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
        
        try {
            require "mailer/autoload.php";
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug    = SMTP::DEBUG_SERVER ;
            $mail->isSMTP();
            $mail->Host         = "smtp.gmail.com";
            $mail->SMTPAuth     = true ;
            $mail->Username     = "glamorshop0@gmail.com";  
            $mail->Password     = 'znrialyysowisexb';  
            $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;  
            $mail->Port         = 465 ;  
            // $mail->Enc
            
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            
            $mail->setFrom("yosry@yossry.com", $name); 
            $mail->addAddress("yabo22050@gmail.com", "yabo22050");
            $mail->Subject = $subject ;
            $mail->Body = "الرقم المكون من 10 ارقام هو: $message"; 
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send(); 
            
            echo "SUCCESS"; 
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        
        
    }else{
        echo "ERROR"; 
        exit();
    }
}else{
    echo "ERROR"; 
    exit();
}