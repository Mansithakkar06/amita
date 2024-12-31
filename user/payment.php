<?php
session_start();
require('database_conn.php');
if ($_SESSION['uname'] == NULL) {
  header("location:../login.php");
}

$unm = $_SESSION["uname"];
$sql1 = "select iduser from user where username = '$unm'";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);
$uid = $row1[0];
if (isset($_POST[''])) {

}
// $date = date("Y-m-d");
// $sql = "insert into sales (date,user_iduser) values ('$date','$uid')";
// $res = mysqli_query($conn, $sql);
// $sql1 = "select max(idsales) from sales";
// $res1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch_array($res1);
// $sid = $row1[0];


/*$total = 0;
$sql_pro = "select * from product where idproduct in (select product_idproduct from cart where user_iduser = '$uid')";
$res_pro = mysqli_query($conn, $sql_pro);
while ($row_pro = mysqli_fetch_assoc($res_pro)) {
$price = $row_pro['price'];
$proid = $row_pro['idproduct'];
// echo $price;
$sql = "select * from cart where user_iduser = $uid and product_idproduct = $proid";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$qty = $row['qty'];
// echo $qty;
$amount = $price * $qty;
// echo $amount;
$total = $total + $amount;
$sql2 = "insert into sales_details values($proid,$sid,$qty,$amount])";
$res2 = mysqli_query($conn, $sql2);
}*/
?>

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
  <title>Payment</title>
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
  <script>
	function xtotal()
	{
    var t=document.getElementById("totalcod").value;
    if(t>1000)
    {
      alert("COD is not allowed in order of more than ₹1000")
    }
	}
  </script>
</head>

<body class="sub_page">

  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Payment</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end inner page section -->

  <!-- <section class="why_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full">
                  <form action="https://www.sandbox.paypal.com/cgi-bin/websrc" method="post">
                     <fieldset>
                        <input type="hidden" name="sid" value="<?php echo $sid; ?>"><br>
                        <select name="mode" required>
                           <option value="" selected hidden>Select Payment Mode...</option>
                           <option value="COD">COD</option>
                           <option value="online">online</option>
                        </select>
                        <input type="hidden" placeholder="Amount" name="total" value="<?php echo $total; ?>" required />
                        <input type="text" placeholder="Amount" disabled name="total" value="<?php echo $total; ?>"
                           required />
                        
                           <input type="hidden" name="cd" value=" xclick"> 
                           <input type="hidden" name="business" value="sb-i47qe36362575@business.example.com">
                           <input type="hidden" name="item name" value="Laptop"> 
                           <input type="hidden" name="item number" value="<?php echo $sid; ?>">
                           <input type="hidden" name="amount" value="<?php echo $total; ?>"> 
                           <input type="hidden" name="no_shipping" value="0">
                           <input type="hidden" name=" no note" value="1"> 
                           <input type="hidden" name="currency code" value="INR">
                           <input type="hidden" name="lc" value="AU"> 
                           <input type="hidden" name="rm" value="2">
                           <input type="hidden" name="notify_url" value="payment_process.php">
                           <input type="hidden" name="return" value="orders.php">
                           <input type="submit" value="Pay Now" /><br />
                     </fieldset>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </section> -->

  <div class="section-empty" style="margin-top:80px">
    <div class="container content">
      <div class="row">
        <div class="col-md-7">
          <p class="billing_text">Shipping Address</p>
          <div class="input_form">
            <div class="row">
              <div class="col-md-6">
                <div class="input_box_cart">
                  <input type="" placeholder="Full Name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_box_cart">
                  <input type="" placeholder="Mobile Number" required>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="input_box_cart">
                  <input type="" placeholder="Email Address" required>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="input_box_cart">
                  <textarea rows="4" placeholder="Shipping Address" required></textarea>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="col-md-5">
          <p class="billing_text">Cart</p>
          <div class="yourCart_div">
            <div class="cart_img_content">
              <?php
              $total = 0;
              $sql_pro = "select * from product where idproduct in (select product_idproduct from cart where user_iduser = '$uid')";
              $res_pro = mysqli_query($conn, $sql_pro);

              while ($row_pro = mysqli_fetch_assoc($res_pro)) {
                $price = $row_pro['price'];

                $proid = $row_pro['idproduct'];
                $offid = $row_pro['offer_idoffer'];
                $sql1 = "select * from offer where idoffer=$offid";
                $res1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($res1);
                $dis = $row1['discount'];
                $op = $row_pro['price'] * $dis / 100;
                $disprice = $row_pro['price'] - $op;

                $sql = "select * from cart where product_idproduct='$proid' and user_iduser = '$uid'";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                  $qty = $row['qty'];
                  $amount = $disprice * $qty;
                  $total = $total + $amount;

                  $img_sql = "select file_path from image where product_idproduct = $proid ";
                  $img_res = mysqli_query($conn, $img_sql);
                  $img_row = mysqli_fetch_assoc($img_res);
                  ?>

                  <!-- start -->
                  <div class="food_img_price_des">
                    <div class="cart_food_img">
                      <img src="<?php echo "images/" . $img_row['file_path']; ?>">
                    </div>
                    <div class="food_dec_flex">
                      <p>
                        <?php echo $row_pro['name']; ?>
                      </p>
                      <p><i class="fa fa-inr" aria-hidden="true"></i>
                        <s>
                          <?php echo $row_pro['price']; ?>
                        </s>
                      </p>
                      <p><i class="fa fa-inr" aria-hidden="true"></i>
                        <?php echo $row_pro['price'] - $op; ?> *
                        <?php echo $qty; ?>
                      </p>

                    </div>
                  </div>
                <?php }
              } ?>
              <!-- end -->
              <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/websrc">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sb-zhqtl25067585@business.example.com">
                <input type="hidden" name="item_name" value="<?php echo $_SESSION['uname']; ?>">
                <input type="hidden" name="item_number" value="1">
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <input type="hidden" name="no_shipping" value="5">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="lc" value="AU">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="notify_url" value="http://localhost/amita/user/cod.php">
                <input type="hidden" name="return" value="http://localhost/amita/user/cod.php">
                <button type="submit" class="total_btn_cart text_center_button mt-12px bg_green">
                  Online Payment
                </button>
              </form>
              <form action="payment_process.php" method="post">
                <!-- <input type="hidden" name="sid" value="<?php echo $sid; ?>"> -->
                <input type="hidden" name="total" id="totalcod" value="<?php echo $total; ?>">

                <button type="submit" name="cod" onclick="xtotal()" class="total_btn_cart text_center_button bg_green">
                  COD
                </button>
              </form>
              <form action="cart.php" method="post">
                <a href="cart.php"><button type="button" class="total_btn_cart text_center_button mt-12px">
                    Cancel
                  </button></a>
              </form>
            </div>
          </div>

          <!-- <div class="cart_total">
            <div class="price_total">
              <p>Total</p>
              <p><i class="fa fa-inr" aria-hidden="true"></i> 500</p>
            </div>
            <div class="price_total">
              <p>Shipping</p>
              <p>free</p>
            </div>
          </div> -->
          <button type="button" class="total_btn_cart">
            <span>Total</span>
            <span><i class="fa fa-inr" aria-hidden="true"></i>
              <?php echo $total; ?>
            </span>
          </button>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
    </div>
  </div>



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