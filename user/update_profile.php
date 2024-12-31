<?php
require('database_conn.php');
session_start();
if($_SESSION['uname'] == NULL)
{
   header("location:../login.php");
}


 //if(isset($_POST['update_profile']))
  if(isset($_POST['update_profile']))
  {
   echo "this is dumb";
    $update_uname=$_POST['username'];
    $update_email=$_POST['email'];
    $update_number=$_POST['number'];

    $update_img = $_FILES['update_img']['name'];
    $update_img_size =$_FILES['update_img']['size'];
    $update_img_tmp_name =$_FILES['update_img']['tmp_name'];
    $update_img_folder = 'uploaded_img/'.$update_img;

    
      $sql="update user set email='$update_email', phone_no='$update_number', image='$update_img' where username='$_SESSION[uname]'";
      $result=mysqli_query($conn,$sql);
      move_uploaded_file($update_img_tmp_name,$update_img_folder);  
      if($update_img_size > 2000000)
       {
          echo "<script>alert('Image is too large');</script>";
       }
       if($result)
       {
         echo "<script>alert('profile updated...!');</script>";
          header("location:profile.php");
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
      <title>Update Profile Page</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/profile_css.css" rel="stylesheet" />
      <!-- responsive style -->
      <!-- <link href="css/responsive.css" rel="stylesheet" /> -->
	
   </head>
  

    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
      <form action="update_profile.php" method="post" enctype="multipart/form-data">
         <div class="up_main">
            <div class="up_info">
            <?php

                    $sql="select * from user where username='$_SESSION[uname]'";   
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($result);
                    if($row>0)
                    {
                      $fetch = mysqli_fetch_assoc($result);
                    }
                    if($fetch['image'] == '')
                    {
                       echo '<img src="avtar-img/default-avatar.png" class="prof rounded-circle img-fluid" />';
                    }
                    else
                    {
                      echo '<img src="uploaded_img/'.$fetch['image'].'" class="prof rounded-circle img-fluid" />';
                    }
            ?>
              <h1><?php echo $fetch['username'] ?></h1>
              <hr>
            </div>
            <div class="body">
             <form method="post" action="update_profile.php">
                 <input type="text" placeholder="Enter your username" id="name" name="username" disabled value="<?php echo $fetch['username'] ?>" required />
                 <input type="email" placeholder="Enter your email" id="email" name="email" value="<?php echo $fetch['email'] ?>" required />
                 <input type="file" name="update_img" accept="image/jpg, image/jpeg, image/png"  />
                 <input type="text" placeholder="Enter your phone number" id="number" name="number" value="<?php echo $fetch['phone_no'] ?>" required />
                 <!-- <button class="btn" value="update profile" name="update_profile">Update Profile</button> 
                 <button class="btn" value="go back"><a class="nav-link" href="profile.php">Go Back</a></button>  -->
                  <input type="submit" value="update profile" name="update_profile" class="btn">
                 <!-- <a href="update_profile.php" class="delete-btn">Update Profile</a>  -->
               </form>
                 <center><p class="p1">To See Your Profile<a href="profile.php"> See Here!</a></p></center>
                 <center><p class="p1">Change Password<a href="change_password.php"> Click Here!</a></p></center>
            </div>  
               
         </div>
         </form> 
      </div>
    </div> 

    
<body>
</html>
