<?php
require('database_conn.php');
include "appointment_processes.php";
if ($_SESSION['uname'] == NULL) {
   header("location:../login.php");
}
if (isset($_GET['edit'])) {
   $id = $_GET['edit'];
   $edit_state = true;
   $record = mysqli_query($conn, "select * from appointment where idappointment=$id");
   $data = mysqli_fetch_array($record);
   $name = $data['date'];
}
?>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/favicon.png" type="">
   <title>Appointment</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="css/responsive.css" rel="stylesheet" />
   <!---for inner dropdown CDNS  -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
   <link href="js/bootstrap.js" />
   <link href="js/custom.js" />
   <link href="js/javascript.js" />
   <link href="js/jquery-3.4.1.min.js" />
   <link href="js/popper.min.js" />
   <style>
      <?php include 'style.css'; ?>
   </style>

   <title>Appointment</title>
   <script>

      function getDate() {
         var givenDate = Date.parse(document.myForm.inputDate.value);
         if (!givenDate.isNaN) {

            // set hours, minutes, seconds, milisecconds to zero for a comparison
            // on date only
            givenDate = new Date(givenDate).setHours(0, 0, 0, 0);
            var todaysDate = new Date().setHours(0, 0, 0, 0);

            if (givenDate >= todaysDate) {
               //alert("Great! You\'re starting on a future date or today!");
               // result.innerHTML = 'Great! You\'re starting on a future date or today!';
               // result.style.color = 'green';
            } else {
               alert("Please choose a future date.");
               // result.innerHTML = "Please choose a future date.";
               // result.style.color = 'red';
            }
         }
      }


      function myfunc() {
         return confirm("are you sure you want to delete this record?");
      }
   </script>
</head>

<body class="app">
   <!---start header--->
   <header class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php"><img width="200" height="60px" style="margin-left:-70px;"
                  src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Categories </a>
                     <ul class="dropdown-menu">
                        <?php
                        $sql = "select * from category";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                           $catid = $row['idcategory'];
                           echo '<li><a class="dropdown-item" href="product_list.php?catid=' . $catid . '">' . $row['name'] . ' &raquo; </a>
                                           <ul class="submenu dropdown-menu"';
                           $sql1 = "select * from sub_category where category_idcategory='$catid'";
                           $res1 = mysqli_query($conn, $sql1);
                           while ($row1 = mysqli_fetch_assoc($res1)) {
                              $subcat_id = $row1['idsub_category'];
                              echo '<li><a class="dropdown-item" href="product_list.php?subcat_id=' . $subcat_id . '">' . $row1['name'] . '</a></li>';
                           }
                           echo '</ul>
                                     </li>';
                        }
                        ?>
                     </ul>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="appointment.php">Appointment</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="inq.php">Inquiry</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about_us.php">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="cart.php">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                           xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                           style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                           <g>
                              <g>
                                 <path
                                    d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path
                                    d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                              </g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                           <g>
                           </g>
                        </svg>
                     </a>
                  </li>
                  <li class="nav-item">
                           <a class="nav-link" style="margin-left: -31px;margin-top: -14px;" href=""><?php
                           $s="select iduser from user where username='$_SESSION[uname]'";
                           $rs=mysqli_query($conn,$s);
                           $uid=mysqli_fetch_array($rs)[0];
                           $sql6="select count(*) from cart where user_iduser='$uid'";
                           $rs1=mysqli_query($conn,$sql6);
                           $count=mysqli_fetch_array($rs1)[0];
                           echo $count;
                           ?>
                           </a>
                        </li>
                  <form class="form-inline" method="GET" action="product_list.php">
                     <div class="my-2 my-sm-0 nav_search-btn">
                        <input type="search" id="form1" name="search_data" placeholder="Search" class="form-control"
                           style="width:150px;" />
                     </div>
                     <button type="submit" name="search_data_product" value="search" class="btn btn-dark">
                        <i class="fa fa-search" aria-hidden="true"></i>
                     </button>
                  </form>

                  <?php
                  if (isset($_SESSION['loggedin'])) {
                     echo '<li class="nav-item">
                          <p class="my-0 mx-2"><a class="nav-link" href="profile.php">Welcome ' . $_SESSION['uname'] . '</a></p>
                       </li>
                       <li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_logout-btn" value="Logout"><a class="nav-link" href="..\logout.php">Logout</a></button>
                       </li>
                       </form>';
                  } else {
                     echo '<li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Signup"><a class="nav-link" href="registration.php">Signup</a></button>
                        </li>
						<li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Login"><a class="nav-link" href="login.php">Login</a></button>
                        </li>';
                  }

                  echo '</ul>
                  </div>
               </nav>';
                  ?>
            </div>
   </header>
   <!-- end header section -->
   <center>
      <h1 class="header">Appointment</h1>
      <?php if (isset($_SESSION['message'])): ?>
         <div class="message">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
         </div>
      <?php endif ?>
      
      <form class="form1" name="myForm" id="myForm" action="Appointment_processes.php" method="POST">
         <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
         <b>Select Date For Appointment:</b>
         <input type="date" name="date" class="mt-0 pt-0" placeholder="date(YYYY-MM-DD)" id="inputDate" name="inputDate"
            onchange="getDate()" value="<?php echo $date; ?>" required><br>
            <b>Select Time slot:</b>
            <select name="timeslot" class="select" required>
               <option value="10:00-12:00">10:00-12:00</option>
               <option value="16:00-18:00">16:00-18:00</option>
               <option value="18:00-20:00">18:00-20:00</option>
            </select>
         <?php if ($edit_state == false): ?>
            <button class="btn1" type="submit" name="save">Save</button>
         <?php else: ?>
            <button class="btn1" type="submit" name="update">U pdate</button>
         <?php endif ?>
         <!-- <div id="result"></div>  -->
      </form>
      <p id="result"></p>
      <div class="tablefixhead">
         <table>
            <thead>
               <tr>
                  <th>Sr No</th>
                  <th>Date</th>
                  <th>Time slot</th>
                  
                  <th>Status</th>
                  
                  <th colspan="2">Action</th>
               </tr>
            </thead>
            <?php
            $result = mysqli_query($conn, "select * from appointment where user_iduser = '$uid'");
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
               <tbody>
                  <tr>
                     <td>
                        <?php echo $i; ?>
                     </td>
                     <td>
                        <?php echo $row["date"]; ?>
                     </td>
                     <td>
                        <?php echo $row["time"]; ?>
                     </td>
                     
                     <td>
                        <?php 
                        if($row["status"]==0)
                        echo "Pending"; 
                        else
                        echo "Done";
                        ?>
                     </td>
                     
                     <td><a href="appointment.php?edit=<?php echo $row["idappointment"]; ?>" class="edit_btn">Edit
                        </a></td>
                     <!-- <td><a href="appointment_processes.php?delete=<?php //echo $row["idappointment"]; ?>" class="del_btn"
                           onclick="return myfunc()">delete </a></td> -->
                  </tr>
               </tbody>
               <?php
               $i++;
            }
            ?>

         </table>
      </div>

   </center>
   <footer class="footer_section">
      <div class="container">
         <div class="row">
            <div class="col-md-4 footer-col">
               <div class="footer_contact">
                  <h4>
                     Reach at..
                  </h4>
                  <div class="contact_link_box">
                     <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                           Location
                        </span>
                     </a>
                     <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                           Call +91 96245 73883
                        </span>
                     </a>
                     <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                           amitafurnishing@gmail.com
                        </span>
                     </a>
                  </div>
               </div>
            </div>
            <!-- <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div> -->
         </div>
      </div>
   </footer>
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