<?php
session_start();
require('database_conn.php');

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
   <title>product Details Page</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <!-- <link href="css/product_details.css" rel="stylesheet" /> -->
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
   <!-- for inner navbar dropdown -->
   <link href="css/dropdown.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
      integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


</head>

<body class="sub_page">
   <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
               <a class="navbar-brand" href="index.html"><img width="200px" height="60px" style="margin-left:-70px;"
                     src="images/logo.png" alt="#" /></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                     <li class="nav-item">
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
                                 echo '<li><a class="dropdown-item" href="#?subcat_id=' . $subcat_id . '">' . $row1['name'] . '</a></li>';
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
                        <a class="nav-link" href="inquiry.php">Inquiry</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="login.php">
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
                     <form class="form-inline" method="GET" action="product_list.php">
                        <div class="my-2 my-sm-0 nav_search-btn">
                           <input type="search" id="form1" name="search_data" placeholder="Search" class="form-control"
                              style="width:150px;" />
                        </div>
                        <button type="submit" name="search_data_product" value="search" class="btn btn-dark">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </form>
                   
                    <li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Signup"><a class="nav-link" href="registration.php">Signup</a></button>
                        </li>
						<li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Login"><a class="nav-link" href="login.php">Login</a></button>
                        </li></ul>
                  </div>
               </nav>
               </div>
      </header>
   </div>
   <!-- end header section -->
   <!-- inner page section -->
   <section class="inner_page_head">
      <div class="container_fuild">
         <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <h3>Product Details</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end inner page section -->

   <!-----Page Start ---->
   <?php
   $pid = $_GET['pid'];

   $sql = "select * from product where idproduct = $pid ";
   $res = mysqli_query($conn, $sql);

   if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_array($res)) {
         $idpro = $row['idproduct'];
         $offid = $row['offer_idoffer'];
         $sql1 = "select * from offer where idoffer=$offid";
         $res1 = mysqli_query($conn, $sql1);
         $row1 = mysqli_fetch_assoc($res1);
         $dis = $row1['discount'];
         $op = $row['price'] * $dis / 100;

         $img_sql = "select file_path from image where product_idproduct = $idpro ";
         $img_res = mysqli_query($conn, $img_sql);
         $img_row = mysqli_fetch_assoc($img_res);
         ?>
         <div class="container my-5">
            <div class="box-dt">
               <div class="row">
                  <div class="col-md-5">
                     <div class="main-img">
                        <img class="img-fluid" src="<?php echo "images/" . $img_row['file_path']; ?>" alt="ProductS"
                           height="700px">
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="main-description px-2">
                        <!-- <div class="category text-bold">
                                    Category: Women
                                </div> -->

                        <div class="product-title text-bold my-3">
                           <?php echo $row['name']; ?>
                        </div>

                        <div class="price-area">
                           <p class="old-price mb-1"><del></del> <span class="old-price-discount text-danger">(
                                 <?php echo $dis; ?>% off)
                              </span></p>
                           <p class="new-price text-bold mb-1"><i class="fa fa-inr" aria-hidden="true"></i>
                              <s>
                                 <?php echo $row['price']; ?>
                              </s>
                           </p>
                           <p class="new-price text-bold mb-1"><i class="fa fa-inr" aria-hidden="true"></i>
                              <?php echo $row['price'] - $op; ?>
                           </p>
                        </div>

                        <div class="buttons d-flex my-3">
                           <!-- <div class="block">
                                        <a href="#" class="shadow btn custom-btn ">Wishlist</a>
                                    </div> -->
                           <div class="block">
                              <button class="shadow btn cus-btn"><a style="color:black;" href="login.php">Add to
                                    cart</a></button>
                           </div>

                           <!-- <div class="block quantity">
                                        <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                                    </div> -->
                        </div>

                     </div>

                     <div class="product-details my-4">
                        <p class="details-title text-color mb-1">Product Details</p>
                        <p class="description">
                           <?php echo $row['description']; ?>
                        </p>
                     </div>

                     <?php
      }
   } ?>


               <div class="row questions bg-light p-3">
                  <div class="col-md-1 icon">
                     <i class="fa-brands fa-rocketchat questions-icon"></i>
                  </div>
                  <div class="col-md-11 text">
                     Have a question about our products at E-Store? Feel free to contact our representatives email.
                  </div>
               </div>

               <div class="delivery my-4">
                  <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-truck"></i></span> <b>Delivery done in 3
                        days from date of purchase</b> </p>
                  <p class="text-secondary">Order now to get this product delivery</p>
               </div>
               <div class="delivery-options my-4">
                  <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-filter"></i></span> <b>Delivery
                        options</b> </p>
                  <p class="text-secondary">View delivery options here</p>
               </div>

            </div>
         </div>
      </div>
   </div>

   <section class="why_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
            <form action="login.php" method="get">
               <div>
                  <h3>Rate Product</h3>
                  <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                  <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
               </div>
               <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
               </div>
               <!-- <span class='result'>0</span> -->
               <input type="hidden" name="rating">
               <input type="submit" name="rate" class="ml-0 mt-2">
         </form>
</div>
<div class="col-mb-6">
         <form action="login.php" method="get">
            <div>
               <h3>Product's Average Rating</h3>
               <input type="hidden" name="pid" value="<?php echo $pid; ?>">
               <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
            </div>
            <?php
               $sql2="select avg(stars) from rating where product_idproduct='$pid'";
               $res2=mysqli_query($conn,$sql2);
               $stars=mysqli_fetch_array($res2)[0];
            ?>
            <div class="rateyo" id="rating1" data-rateyo-rating="<?php echo $stars; ?>" data-rateyo-read-only="true" data-rateyo-num-stars="5" data-rateyo-score="3">
            </div>
           <h3> <span class='result'>(<?php echo number_format($stars,1);?>)</span></h3>
            <input type="hidden" name="rating">
         </form>
      </div>
      </div>

      </div>

   </section>
   <section class="why_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full">
                  <form name="form" enctype="multipart/form-data" action="login.php" method="get">
                     <fieldset>
                        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">

                        <input type="text" placeholder="Enter your feedback" name="feed" />
                     </fieldset>
                     <input type="submit" name="submit" value="Submit your feedback" /><br />
                     <?php
                     $feedsql = "select description,date from feedback where product_idproduct=$pid";
                     $res = mysqli_query($conn, $feedsql);
                     while ($row = mysqli_fetch_assoc($res)) {
                        //          $uid = $_SESSION['user_id'];
                        $qu = "select username from user where iduser in(select user_iduser from feedback where product_idproduct='$pid')";
                        $r = mysqli_query($conn, $qu);
                        $u = mysqli_fetch_array($r);
                        $uname = $u[0];
                        ?>
                        <fieldset>
                           <?php echo $uname; ?>
                           <input type="text" placeholder="Enter your feedback" disabled
                              value="<?php echo $row['description'] ?>" />
                        </fieldset>
                        <?php
                     }
                     ?>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-----Page End----->

   <!-- footer section -->
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
   <!-- footer section -->
   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

   <script>


      $(function () {
         $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
         });
      });
      /* Javascript */
      
$(function () {
 
  $("#rating1").rateYo({
    readOnly: true
  });
});
   </script>
</body>

</html>
<?php
require 'database_conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $rating = $_POST["rating"];

   $sql = "INSERT INTO rating VALUES ('$pid','$_SESSION[user_id]','$rating')";
   if (mysqli_query($conn, $sql)) {
      echo "New Rate addedddd successfully";
   } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   mysqli_close($conn);
}
?>