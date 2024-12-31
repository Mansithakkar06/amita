<?php
   $showAlert=false;
   $showError=false;
   $showEmailError=false;
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
	  require('database_conn.php');
	  $fname=$_POST['fname'];
	  $uname=$_POST['uname'];
	  $pass=$_POST['password'];
	  $cpass=$_POST['cpassword'];
	  $email=$_POST['email'];
	  $num=$_POST['number'];
	  $add=$_POST['address'];
	  $gen=$_POST['gender'];
	  $area=$_POST['area'];
	  $que=$_POST['question'];
	  $ans=$_POST['answer'];
      
      $exists=false;
      /****For Image Profile**** */         
        $img=$_FILES['image']['name'];
        $img_size=$_FILES['image']['size'];
        $img_tmp_name=$_FILES['image']['tmp_name'];
        $img_folder='uploaded_img./'.$img;    
    
      $existSql="select * from user where email='$email'";
	  $result=mysqli_query($conn,$existSql);
	  $numEmailRows=mysqli_num_rows($result);
      /*********For username unique */
	  $existSql="select * from user where username='$uname'";
	  $result=mysqli_query($conn,$existSql);
	  $numExistRows=mysqli_num_rows($result);
	  if($numExistRows>0)
	  {
		  $showError="Username Already Exist";
        // echo "<script>alert('Useranme already exists');</script>";
	  }
      elseif($numEmailRows>0)
      {
        $showEmailError="Email Already Exist";
        //echo "<script>alert('Email already exists');</script>";
      }
      
	  else
	  {
          if($img_size > 2000000)
          {
            $showError="image size is too large!";
          }
         
             if(($pass==$cpass)&&$exists==false)
            {
               $hash = password_hash($cpass, PASSWORD_DEFAULT);
               $sql="insert into user(name,email,phone_no,address,gender,username,password,seq_que,seq_ans,isAdmin,image,area_idarea) 
                     values('$fname','$email','$num','$add','$gen','$uname','$hash','$que','$ans','0','$img','$area')";
               $result=mysqli_query($conn,$sql);
               if($result)
               {
                 move_uploaded_file($img_tmp_name,$img_folder);
                 $showAlert=true;
                 header("location:login.php");
               }
             }
             else
             {
                $showError="Passwrods do not match";
             }
         }
      
    }
?>

<!DOCTYPE html>
<html>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

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
    <title>Registration Form</title>
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
                        <h3>Sign Up for Your New Account</h3>
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
                  <strong>Success!</strong> You account is now created and you can login
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
    <section class="why_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="full">
                        <form name="form" enctype="multipart/form-data" action="registration.php" method="post">
                            <fieldset>
                                <input type="text" placeholder="Enter your full name" id="name" name="fname" required />
                                <input type="text" placeholder="Enter your username" id="uname" name="uname" required />
                                <input type="password" placeholder="Enter your Password" id="password" name="password"
                                    required />
                                <input type="password" placeholder="Confirm your Password" id="cpassword"
                                    name="cpassword" required />
                                <input type="email" placeholder="Enter your email" id="email" name="email" required />
                                <input type="text" placeholder="Enter your phone number" id="number" name="number"
                                    required />
                                <textarea placeholder="Enter your address" name="address" required></textarea>
                                <select name="gender" required>
                                    <option value="" selected hidden>Select Your Gender...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>

                               
                                <select name="city">
                                    <option value="" selected hidden>Select Your City...</option>
                                    <?php
                                          require('database_conn.php');
                                          $sql = "select * from city"; 
                                          $result = mysqli_query($conn,$sql);
                                          while($row = mysqli_fetch_assoc($result)){
                                             echo "<option value='".$row['idcity']."'>".$row['name']."</option>";
                                          }
                                    ?>
                                </select>
                       
                                <select name="area">
                                    <option value="" selected hidden>Your Area...</option>
                                </select>                              

                                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" />
                                <input type="text" placeholder="Enter Security Question" name="question" required />
                                <input type="text" placeholder="Enter Security Answer" name="answer" required />
                                
                                <center>
                                    <h6 class="frmtxt">The Password and Confirmation Password must match.</h6>
                                </center>
                                <input type="submit" name="submit" value="Register" onfocus="register_func()" /><br />
								<center><h6 class="frmtxt">Already have a account?<a href="login.php">Login Here!</a></h6></center>
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
    <script>
    $("select[name='city']").change(function() {
        var cityID = $(this).val();
        if (cityID) {
            $.ajax({
                url: "getarea.php",
                dataType: 'Json',
                data: {
                    'id': cityID,
                },
                success: function(data) {
                    $('select[name="area"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="area"]').append('<option value="' + key + '">' +
                            value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="area"]').empty();
        }
    });
    </script>
</body>
</html>