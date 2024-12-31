<?php
session_start();
require('database_conn.php');
if($_POST['total']>1000)
{
    header("payment.php");
}
$unm = $_SESSION["uname"];
$sql1="select iduser from user where username = '$unm'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$uid=$row1[0];

$date=date("Y-m-d");
$sql="insert into sales (date,user_iduser) values ('$date','$uid')";
$res=mysqli_query($conn,$sql);

$sql1="select max(idsales) from sales";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$sid=$row1[0];

$total=0;
$sql_pro="select * from product where idproduct in (select product_idproduct from cart where user_iduser = '$uid')";
$res_pro=mysqli_query($conn,$sql_pro);
while($row_pro=mysqli_fetch_assoc($res_pro))
{
    $price=$row_pro['price'];
    $proid=$row_pro['idproduct'];
    // echo $price;
    $sql="select * from cart where user_iduser = $uid and product_idproduct = $proid";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $qty=$row['qty'];
    // echo $qty;
    $amount=$price*$qty;
    // echo $amount;
    $total=$total+$amount;
    
    $sql2="insert into sales_details values($proid,$sid,$qty,$amount])";
    $res2=mysqli_query($conn,$sql2);
}

?>


<form class="form-inline" action="" method="POST">
    <input type="hidden" name="sid" value="<?php echo $sid; ?>"><br>
    <input type="hidden" name="amount" value="<?php echo $total; ?>"><br> 
    <input type="submit" value="Pay Now" name="submit" /><br/>                 
</form>
