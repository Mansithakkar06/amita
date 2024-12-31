<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  include 'database_conn.php';
  $myusername=$_POST['uname'];
  $mypassword=$_POST['password'];
  
   // $sql="select * from user where username='$myusername' AND password='$mypassword'";
  $sql="select * from user where username='$myusername' and isAdmin='0'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    while($row=mysqli_fetch_assoc($result))
    {
       if(password_verify($mypassword,$row['password']))
       {
         $login=true;
	      session_start();
         $_SESSION['user_id']=$num['iduser'];
	      $_SESSION['loggedin']=true;
	      $_SESSION['uname']=$myusername;
	      header("location:user/index.php");
       }
       else
       {
          $showError="Invalid Credential";
       }
    }
   
  }
  else
  {
    $showError="Invalid Credential";
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
      <title>Login Form</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
	  <!-- Javascript File -->
	  <script src="js/javascript.js"></script>
   </head>
   <body class="sub_page">
   
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Login</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
	       <!----Alert Message Show---->
		<?php
		if($login)
		{
		  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
		}
		if($showError)
		{
		  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$showError.'
				  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
		}
	    ?>
      <section class="why_section layout_padding">
         <div class="container">         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="login.php" method="post">
                        <fieldset>
                           <input type="text" placeholder="Username" name="uname" required />
                           <input type="password" placeholder="Password" name="password" id="myInput" required />
						   <span class="eye" onclick="myFunction()">
						      <i id="hide1" class="fa fa-eye icon"></i>
							  <i id="hide2" class="fa fa-eye-slash icon"></i>
						   </span>
                           <input type="submit" value="Login" /><br/>
                        </fieldset>
                     </form>
					 <center><h6 class="frmtxt">Forgot your password?<a href="forgot_password.php">Click Here!</a></h6></center>
					 <center><h6 class="frmtxt">You don't have any account?<a href="registration.php">Signup Here!</a></h6></center>
               
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
   </body>
</html>