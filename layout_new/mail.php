<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




function sendEmail($emailto, $code, $type)
{
    $mail = new PHPMailer(true);
    $email_id = 'naqabahtracking@gmail.com';

    //Server settings
    //$mail->SMTPDebug = 2;                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $email_id;                     //SMTP username
    $mail->Password   = 'dcemncuvpniertpb';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have 

    //Recipients
    $mail->setFrom($email_id, 'Naqabah Tracking System');
    //$mail->addAddress('waqas.ninetytwo@gmail.com', 'Hi Waqas Naqabah');       //Add a recipient
    $mail->addAddress($emailto);                             //Name is optional
    $mail->addReplyTo($email_id, 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    
    //Content
    $mail->isHTML(true);                                                        //Set email format to HTML
    
    if($type == 'emailVerification'){
        $mail->Subject = 'Verify your email';
        $mail->Body    = 'Click the link to verify your email for Naqabah Tracking System <a href="'.SITE_URL.'activation.php?activation='.$code.'&email='.$emailto.'" target="_blank"><b>Click here</b></a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }else{
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'Click the link to reset your password for Naqabah Tracking System <a href="'.SITE_URL.'login-forget.php?passcode='.$code.'&email='.$emailto.'" target="_blank"><b>Click here</b></a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }
    
    $mail->send();

    return true;
}
//sendEmail('waqas.ninetytwo@gmail.com', 'sd354f6s5d4f6sd4fs6d4f', 'emailVerification');
?>