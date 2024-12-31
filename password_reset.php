<?php
require('database_conn.php');
  $showAlert=false;
  $showError=false;
  $showEmailError=false;
  if(isset($_POST['reset_pass']))
  {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cpwd =$_POST['cpassword'];

    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $hash_cpwd = password_hash($cpwd, PASSWORD_DEFAULT);
    
        $rpw_sql = "update user set password='$hash_pwd' where email='$email'";
        $rpw_res = mysqli_query($conn,$rpw_sql);
        if($rpw_res > 0)
        {
           // $showAlert="You password updated successfully!";
           
            header("location:login.php");
        }
        else
        {
            $showError = "Error while updating password.";
        }
    
    // $pwd = md5($_POST['password']);
    // $cpwd = md5($_POST['cpassword']);
    /*if($pwd == $cpwd)
    {
        $rpw_sql = "update user set password='$pwd' where email='$email'";
        $rpw_res = mysqli_query($conn,$rpw_sql);
        if($rpw_res > 0)
        {
            $showAlert="You password updated successfully!";
        }
        else
        {
            $showError = "Error while updating password.";
        }
    }
    else
    {
        $showError="Password and confirm-password do not match";
    }*/
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
      <title>Password Reset Form</title>
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
                     <h3>Password Reset</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!----Alert Message Show in Bootstrap---->
		<?php
		if($showAlert)
		{
		  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> '.$showAlert.'
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
        if($showEmailError)
		{
		  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$showEmailError.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
		}
	    ?>
      <!-- end inner page section -->
      <!-- why section -->
      <?php       
      if(@$_GET['secret'])
      {
        $email=base64_decode($_GET['secret']);
        $sql = "select * from user where email = '$email'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res) > 0)
        {
            ?>
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="password_reset.php" method="post">
                        <fieldset>
                            <input type="hidden" name="email" value="<?php echo $email; ?>" id="email" name="email" >
                           <input type="password" placeholder="Enter your new Password" id="password" name="password" required />
                           <input type="password" placeholder="Confirm your Password" id="cpassword" name="cpassword" required />
                           <input type="submit" value="Submit" onclick="return confirm('Your password updated successfully')" name="reset_pass"/>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php
}
}?>
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
   </body>
</html>