<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once "db.php";
 $sales_id=$_GET['sid'];
 echo $sales_id;

 /*$sql="select user_iduser from sales where idsales = '$sales_id'";
 $res=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($res);
 $id=$row['user_iduser'];
 echo $id;*/

 $sql="select * from user where iduser in (select user_iduser from sales where idsales = '$sales_id')";
 $res=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($res);
 $email=$row['email'];
$s="update sales set status='1' where idsales=$sales_id";
$r=mysqli_query($conn,$s);
    $emailCheckQuery = "select * from user where email='$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);
    if(mysqli_num_rows($emailCheckResult) > 0)
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
            $mail->Subject = 'Product Delievery';
            $mail->Body    = '<b>Your product will be Delievered Soon!</b>';
            if($mail->send())
            {
                echo "<script>alert('Email Send Successfully!');</script>";
                header("location:sales_index.php");
            }
      }
      else
      {
        echo "<script>alert('Error! We can't find user with that email address');</script>";
      }                   
 
?>