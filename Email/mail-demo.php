<?php
  
use Email\PHPMailer\PHPMailer\PHPMailer;
use Email\PHPMailer\PHPMailer\Exception;
  
require 'Email/vendor/autoload.php';
  
$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'denypatel677@gmail.com';                 
    $mail->Password   = 'qcoocwexivgemmti';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('denypatel677@gmail.com', 'Deny Patel');           
    $mail->addAddress('Zaverimaster@gmail.com');
    //$mail->addAddress('radadiyahelly@gmail.com', 'Helly Radadiya');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Hello Pagal';
    $mail->Body    = 'HOW ARE YOU?';
    $mail->AltBody = 'HOW ARE YOU?';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  
?>