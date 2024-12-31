<?php
include_once "db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$date="";
$userid=$_GET['uid'];
 $userid;

$sql="select date from appointment where user_iduser=$userid";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
 $date=$row[0];
$sql2="select * from user where iduser=$userid";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        echo $email=$row2['email'];
        if(mysqli_num_rows($res2) > 0)
      {
                       
            require 'Email/vendor/autoload.php';
            $mail = new PHPMailer(true);
                 
            $mail->SMTPDebug = 0;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'denypatel677@gmail.com';                 
            $mail->Password   = 'icgyyfrqhjrtteqd';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
                 
            $mail->setFrom('denypatel677@gmail.com', 'Deny Patel');           
            $mail->addAddress($email);
                      
            $mail->isHTML(true);                                  
            $mail->Subject = 'Apointment';
            $mail->Body    = '<B> Your Appointment is booked for the date ' .$date.'</B>';
            if($mail->send())
            {
               header("location:appointment_index.php");
            }
      }
      else
      {
         $showError="We can't find user with that email address";
      } 

?>