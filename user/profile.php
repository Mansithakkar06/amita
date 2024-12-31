<?php
require('database_conn.php');
session_start();

if($_SESSION['uname'] == NULL)
{
   header("location:../login.php");
}
//$uid=$_SESSION['uname'];

if(isset($_SESSION['uname']))
{
   $uid=$_SESSION['uname'];
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
      <title>Profile Page</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/profile_css.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
	
   </head>

   <body class="sub_page">
       <div class="container h-100" >
          <div class="row h-100 align-items-center justify-content-center">

             <div class="main">
               <div class="info">
                <?php

                    $sql="select * from user where username='$uid'";   
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($result);
                    if($row>0)
                    {
                      @$fetch = mysqli_fetch_assoc($result);
                    }
                    if(@$fetch['image'] == '')
                    {
                       echo '<img src="avtar-img/default-avatar.png" class="prof rounded-circle img-fluid" />';
                    }
                    else
                    {
                      echo '<img src="uploaded_img/'.$fetch['image'].'" class="prof rounded-circle img-fluid" />';
                    }
                ?>
                   <!-- <img src="http://i63.tinypic.com/2m6vae8.jpg" class="prof rounded-circle img-fluid" />  -->
                  <h1><?php echo $_SESSION['uname'] ?></h1>
                  <hr>
               </div>

               <div class="body">
                 <button class="btn-updateprof" value="update profile"><a class="nav-link" href="update_profile.php?update=1">Update Profile</a></button>
                 <button class="btn-updateprof" value="update profile"><a class="nav-link" href="orders.php">Orders</a></button><br>
                 <button class="btn-logout" value="Logout"><a class="nav-link" href="../logout.php">Logout</a></button>
                 <button class="btn-logout" value="Logout"><a class="nav-link" href="index.php">Back</a></button>
               </div>
      
             </div>
          </div>
        </div>
      
   </body>
</html>