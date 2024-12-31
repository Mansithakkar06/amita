<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$showAlert = false;
$showError = false;
require('database_conn.php');
if (isset($_POST['forgot_pass'])) {
   $email = $_POST['email'];
   $emailCheckQuery = "select * from user where email='$email'";
   $emailCheckResult = mysqli_query($conn, $emailCheckQuery);
   if (mysqli_num_rows($emailCheckResult) > 0) {
      $message = '<div>
                  <p><b>Hello!</b></p>
                  <p>You are recieving this email because we recieved a password reset request for your account.</p><br>
                  <p><button class="btn btn-success nav-link" style="padding:10px;background-color: #0ecc39;border: none;"><a style="text-decoration:none;font-size:16px;color: black;" href="http://localhost/amita/password_reset.php?secret=' . base64_encode($email) . '">Reset Password</a></button></p><br>
                  <p>If you did not request a password reset, no further action is required.</p>
               </div>';


      require 'Email/vendor/autoload.php';
      $mail = new PHPMailer(true);

      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com;';
      $mail->SMTPAuth = true;
      $mail->Username = 'denypatel677@gmail.com';
      $mail->Password = 'icgyyfrqhjrtteqd';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('denypatel677@gmail.com', 'Deny Patel');
      $mail->addAddress($email);

      $mail->isHTML(true);
      $mail->Subject = 'Reset Password';
      $mail->Body = $message;
      if ($mail->send()) {
         $showAlert = true;
      }
   } else {
      $showError = "We can't find user with that email address";
   }

}
?>

<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/favicon.png" type="">
   <title>Forgot Password Form</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
   <!-- inner page section -->
   <section class="inner_page_head">
      <div class="container_fuild">
         <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <h3>Forgot Your Password?</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!----Alert Message Show in Bootstrap---->
   <?php
   if ($showAlert) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> We have e-mailed your password reset link!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
   }
   if ($showError) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> ' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
   }
   ?>
   <!-- end inner page section -->
   <!-- why section -->
   <section class="why_section layout_padding">
      <div class="container">

         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full">
                  <form action="forgot_password.php" method="post">
                     <fieldset>
                        <input type="email" placeholder="Enter Your Email" id="email" name="email" required />
                        <center>
                           <h6 class="frmtxt">Enter your Email to receive your password. </h6>
                        </center>
                        <input type="submit" value="Submit" name="forgot_pass" onfocus="forgot()" /><br />

                     </fieldset>
                  </form>
                  <form action="login.php">
                     <input type="submit" value="Back" name="forgot_pass" />
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end why section -->

   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <!-- Javascript File -->
   <script src="js/javascript.js"></script>
   <script>
      function forgot() {
         const email = document.getElementById("email").value;
         const email_regex = /(^\w.*@\w+\.\w)/;
         if (email == "") {
            alert('Please enter your email!');
            document.getElementById("email").focus();
            return false;
         }
         if (!email_regex.test(email)) {
            alert('Please Enter valid email address');
            document.getElementById("email").focus();
            return true;
         }
      }
   </script>
</body>

</html>