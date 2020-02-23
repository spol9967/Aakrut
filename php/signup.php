<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


//OTP genration
// Function to generate OTP 
function generateNumericOTP($n) { 

    $generator = "1357902468"; 
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result; 
} 
$n = 4; 


$mail = new PHPMailer(true);

try {

    $otp = generateNumericOTP($n);

    //store in coockie
    $cookie_name = "otp";
    setcookie($cookie_name, $otp, time() + 20, "/");
    // if(!isset($_COOKIE[$cookie_name])) {
    // echo "Cookie named '" . $cookie_name . "' is not set!";
    // } else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    // echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
    // }

    //Server settings
    $mail->isSMTP();                                      
    $mail->SMTPAuth   = true;                         
    $mail->SMTPSecure = 'ssl';  
    $mail->Host       = 'smtp.gmail.com';              
    $mail->Port       = 465;
    $mail->isHTML(true);
    $mail->Username   = 'teamtech.init@gmail.com';
    $mail->Password   = 'Te@m_w1N';               

    //Recipients
    $mail->setFrom('teamtech.init@gmail.com', 'Mailer');
    $mail->addAddress('spol421@gmail.com', 'spol');     

    // Content
    $mail->Subject = 'Email verification';
    $mail->Body    = 'This mail is genrated for email verification<br> Please enter following OTP for verification<br> <b>'.$otp.'<b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>