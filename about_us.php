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
      <title>About_Us</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
       <!---for inner dropdown CDNS  -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
      <link href="js/bootstrap.js"/>
      <link href="js/custom.js"/>
      <link href="js/javascript.js"/>
      <link href="js/jquery-3.4.1.min.js"/>
      <link href="js/popper.min.js"/>
      
       <!-- for about us -->
       <link href="css/about_us.css" rel="stylesheet" />
       <script src="https://kit.fontawesome.com/b73881b7c2.js" crossorigin="anonymous"></script>  

   </head>
   <body class="sub_page">
      <div class="hero_area">
            <!-- header section strats -->
            <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img width="200" height="60px" style="margin-left:-70px;" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Categories  </a>
                           <ul class="dropdown-menu">
                           <?php
                             $sql="select * from category";
                             $res=mysqli_query($conn,$sql);
                             while($row=mysqli_fetch_assoc($res))
                             {
                               $catid=$row['idcategory'];
                               echo '<li><a class="dropdown-item" href="product_list.php?catid='.$catid.'">'.$row['name'].' &raquo; </a>
                                           <ul class="submenu dropdown-menu"';
                                    $sql1="select * from sub_category where category_idcategory='$catid'";
                                    $res1=mysqli_query($conn,$sql1);
                                    while($row1=mysqli_fetch_assoc($res1))
                                    {
                                       $subcat_id=$row1['idsub_category'];
                                       echo '<li><a class="dropdown-item" href="product_list.php?subcat_id='.$subcat_id.'">'.$row1['name'].'</a></li>';                                       
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
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
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
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
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
                        <div class="my-2 my-sm-0 nav_search-btn" >
                            <input type="search" id="form1" name="search_data" placeholder="Search" class="form-control" style="width:150px;"/>
                        </div> 
                        <button type="submit" name="search_data_product" value="search" class="btn btn-dark">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button> 
                     </form>             

			   
                     
                       </form><li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Signup"><a class="nav-link" href="registration.php">Signup</a></button>
                        </li>
						<li class="nav-item">
                           <button class="btn my-2 my-sm-0 nav_login-btn" value="Login"><a class="nav-link" href="login.php">Login</a></button>
                        </li></ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      
      <!----About Us Section Start---->
      <div class="section-intro">
    <h2 class="section-intro-title">
        <img src="https://themes.getmotopress.com/luviana/wp-content/themes/luviana/images/header_default.png" alt="">
        About Amita
        <img src="https://themes.getmotopress.com/luviana/wp-content/themes/luviana/images/header_default.png" alt="">

    </h2>
</div>
<div class="container">
    <div id="contact-us">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="contact-info-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-contact-info">
                                    <i class="fas fa-mail-bulk    "></i>
                                    <div class="add">
                                        <h6>Email Us:</h6>
                                            <a href="mailto:hello@arduix.com">amitafurnishing@gmail.com</a>
                                            <!-- <a href="mailto:info@arduix.com">info@ecorik.com</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-contact-info">
                                    <i class="fas fa-phone-volume    "></i>

                                    <h6>Call Us:</h6>
                                    <div class="add">
                                        <a href="tel:+(124)1523-567-9874">Tel. +91 96245 73883</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-contact-info">
                                    <i class="fas fa-map-marker    "></i>
                                    <div class="add">
                                        <h6>Ahmedabad</h6> <a href="#">A-7,Sahaj platinum, Nr.shivshakti School Sneh Plaza, I.O.C Road, Chandkheda, Ahmedabad.</a>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="single-contact-info">
                                    <i class="fas fa-phone    "></i>
                                    <h6>Call Us:</h6>
                                    <div class="add"><a href="tel:+(123)1800-567-8990">Tel. + (123) 1800-567-8990</a>
                                        <a href="tel:+(124)1523-567-9874">Tel. + (124) 1523-567-9874</a></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
<!--             <div class="row mt-2 mt-5">
                <div class="col-lg-5 d-flex">

                    <div role="form" class="wpcf7" id="wpcf7-f90-o1" lang="en-US" dir="ltr">


                        <div class="screen-reader-response" aria-live="polite"></div>
                                            </div>

                </div> -->
                <!-- <div class="col-md-7 my-5 mx-5">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d30740.166784694055!2d73.78698240000001!3d15.6172288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1592393499243!5m2!1sen!2sin"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>



<!--  Optional JavaScript -->
<!--  jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js "
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous ">
</script>
<script src="pluggins/OwlCarousel2-2.3.4/owl.carousel.min.js "></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js "
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous ">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js "
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous ">
</script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
$(document).ready(function() {
    var owl = $('#rooms-carousel.owl-carousel');
    owl.owlCarousel({
        margin: 30,
        loop: true,
        nav: false,
        dots: false,
        center: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    // Go to the next item
    $('.customNextBtn').click(function(e) {
        e.preventDefault();
        owl.trigger('next.owl.carousel', [300]);
        return false;
    })
    // Go to the previous item
    $('.customPrevBtn').click(function(e) {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        e.preventDefault();
        owl.trigger('prev.owl.carousel', [300]);
        return false;
    });


});
</script>
<script>
$(document).ready(function() {
    var owl = $('#properties.owl-carousel');
    owl.owlCarousel({
        margin: 30,
        loop: true,
        nav: false,
        dots: false,
        center: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    // Go to the next item
    $('.customNextBtn').click(function(e) {
        e.preventDefault();
        owl.trigger('next.owl.carousel', [300]);
        return false;
    })
    // Go to the previous item
    $('.customPrevBtn').click(function(e) {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        e.preventDefault();
        owl.trigger('prev.owl.carousel', [300]);
        return false;
    });


});
</script>
<script>
$(document).ready(function() {
    var owl = $('#testimonial-carousel.owl-carousel');
    owl.owlCarousel({
        margin: 30,
        loop: true,

        center: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
    // Go to the next item
    $('.customNextBtn').click(function(e) {
        e.preventDefault();
        owl.trigger('next.owl.carousel', [300]);
        return false;
    })
    // Go to the previous item
    $('.customPrevBtn').click(function(e) {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        e.preventDefault();
        owl.trigger('prev.owl.carousel', [300]);
        return false;
    });
});
</script>
<!-- for full-Width -->
<script>
$(document).ready(function() {
    $('.grid1').masonry({
        itemSelector: '.grid-item1',
        columnWidth: 0,
        isFitWidth: true
    });

});
</script>
<script type="text/javascript">
$(function() {
    $('#datetimepicker1').datetimepicker();
});
</script>

      <!----About Us Section end---->
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
   </body>
</html>