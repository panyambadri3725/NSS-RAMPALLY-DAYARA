<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$mail = new PHPMailer(true);

try {                 
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'sguidesigner@gmail.com';                  
    $mail->Password   = 'itjsrpuegtaesjzj';                          
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   

    $mail->setFrom('sguidesigner@gmail.com', 'SmartMailer');
    $mail->addAddress($email);    
   
    $content="Message: ".$message;

    $mail->isHTML(true);                                 
    $mail->Subject = $subject;
    $mail->Body    = $content;

    $mail->send();
    $email=null;
    $subject=null;
    $message=null;
    //echo 'Message has been sent';
    //echo '<script>alert("Email Send Successfully To Developer");</script>';
    // echo '<script type="text/javascript">s_alert();</script>';
    $_SESSION['mail_status']=TRUE;

    
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // echo '<script type="text/javascript">e_alert();</script>';
    $_SESSION['mail_status']=FALSE;
}
header("Location: contact.php");
exit();


?>