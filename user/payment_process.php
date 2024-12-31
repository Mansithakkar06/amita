<?php
session_start();
require('database_conn.php');
$unm = $_SESSION["uname"];
$sql1 = "select iduser from user where username = '$unm'";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);
$uid = $row1[0];

$date = date("Y-m-d");
$sql = "insert into sales (date,user_iduser) values ('$date','$uid')";
$res = mysqli_query($conn, $sql);
$sql1 = "select max(idsales) from sales";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);
$sid = $row1[0];


$date = date("Y-m-d");

//$sid = $_POST['sid'];
$amount = $_POST['total'];
if($amount>1000)
{
    header("location:payment.php");
}
else{
$sql = "insert into sales_payment (date,status,type,amount,sales_idsales) values('$date','0','COD','$amount','$sid')";

if ($res = mysqli_query($conn, $sql)) {
    $sql2 = "select * from cart where user_iduser='$uid'";
    $res2 = mysqli_query($conn, $sql2);
    while ($r = mysqli_fetch_assoc($res2)) {
         $cartqty=$r['qty'];
        
        $sql4="select * from product where idproduct='$r[product_idproduct]'";
        $res4=mysqli_query($conn,$sql4);
        $row4=mysqli_fetch_assoc($res4);
        $p=$row4['price'];
        $proqty=$row4['qoh'];
        if($cartqty <= $proqty)
        {
        $price=$p*$proqty;
        $sql3 = "insert into sales_details values('$r[product_idproduct]','$sid','$r[qty]','$price')";
        $res3=mysqli_query($conn,$sql3); 
         
        $updated_qty=$proqty-$cartqty;
        $sql5="update product set qoh=$proqty-$cartqty where idproduct='$r[product_idproduct]'";
        $res5=mysqli_query($conn,$sql5);
    }
}

}
$sql2 = "delete from cart where user_iduser='$uid'";
$res2 = mysqli_query($conn, $sql2);
header("location:orders.php");
}
?>