<?php
session_start();
require('database_conn.php');
$unm = $_SESSION["uname"];
$sql1 = "select iduser from user where username = '$unm'";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);
$uid = $row1[0];

$date = date("Y-m-d");

$proid=$_POST['pid'];
$salesid=$_POST['sid'];
$quantity=$_POST['qty'];
$rea=$_POST['reason'];
// $proid=9;
// $salesid=4;
// $quantity=1;
// $rea="not ok";

$sql="insert into sales_return (date,sales_idsales) values ('$date','$salesid')";
$res=mysqli_query($conn,$sql);
    $sql2="select max(idsales_return) from sales_return";
    $res2=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_array($res2);
     $srid=$row[0];
    $sql1="insert into sales_return_details (product_idproduct,sales_return_idsales_return,qty,reason) values ('$proid','$srid','$quantity','$rea')";
    if($res1=mysqli_query($conn,$sql1))
    {
        $sql4="select qty from sales_details where product_idproduct = $proid and sales_idsales='$salesid'";
        $res4=mysqli_query($conn,$sql4);
        $rrr=mysqli_fetch_array($res4)[0];
        $q=$rrr-$quantity;
        if($q>0){
        $sql3="update sales_details set qty='$q' where product_idproduct = $proid and sales_idsales='$salesid'";
        $res3=mysqli_query($conn,$sql3);            
    }
    }
    header("location:purchase_return.php");
    

?>