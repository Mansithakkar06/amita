<?php
      $showError=false; 
      $showAlert=false; 

      if($_SERVER["REQUEST_METHOD"]=="POST")
      {          
        include('database_conn.php');
        session_start();
        $uid=$_SESSION['uname'];

        $op=$_POST['opassword'];
        $np=$_POST['npassword'];
        $cp=$_POST['cpassword'];

        $existsql="select * from user where username='$uid'";   
        $result=mysqli_query($conn,$existsql);
        $numExistRows=mysqli_num_rows($result);
   
        $hash_cp = password_hash($cp, PASSWORD_DEFAULT);
        $hash_np = password_hash($np, PASSWORD_DEFAULT);

        while($row=mysqli_fetch_assoc($result))
        {      
          if(password_verify($op,$row['password']))
          {
               $query="update user set password='$hash_cp' where username='$uid'";  
               $run=mysqli_query($conn,$query);
               if($run)
               {
                 $showAlert=true;
               } 
          }
          else
          {
             $showError="Old Password is Invalid...";
          }
        }
      }
      
   
       /*if($np == $cp)
       {
           $sql="select * from user where password='$op'";
           $que=mysqli_query($conn,$sql);
           $res=mysqli_num_rows($que);
           if($res>0)
           {
             $query="update user set password='$np' where username='$uid'";  
             $run=mysqli_query($conn,$query);
             if($run)
             {
                $showAlert=true;
             }
             else
             {
               $showError="chnaging Failed...";
             }
           }       
           else
           {
             $showError="Old Password is Invalid...";
           }        
       }
       else
       {
          $showError="New Password and Confirm Must be Identical...";
       }*/
            
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
      <title>Change Password Form</title>
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
                     <h3>Change Your Password</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php
		if($showAlert)
		{
		  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Password Changed Successfully
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
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="change_password.php" method="post">
                        <fieldset>
                        <input type="password" placeholder="Old Password" id="password" name="opassword" required />
						      <input type="password" placeholder="New Password" id="npassword" name="npassword" required />
						      <input type="password" placeholder="Confirm New Password" id="cpassword" name="cpassword" required />
						      <center><h6 class="frmtxt">The Confirm New Password must match the New Password entry.</h6></center>
                        <input type="submit" name="submit" value="Change Password" onfocus="change_pass()" />
                        </fieldset>
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
   </body>
</html>