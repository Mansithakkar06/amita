<?php
session_start();
require('database_conn.php');

$s="select iduser from user where username='$_SESSION[uname]'";
$rs=mysqli_query($conn,$s);
$uid=mysqli_fetch_array($rs)[0];
$pid=$_GET['pid'];
$sql="select * from cart where product_idproduct='$pid' and user_iduser='$uid'";
$rs1=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs1)>0)
{
    $row=mysqli_fetch_assoc($rs1);
    $sql2="update cart set qty=$row[qty]+1 where product_idproduct='$pid' and user_iduser='$uid'";
    mysqli_query($conn,$sql2);
    header("location:index.php");
}
else
{
    $sql3="insert into cart values($pid,$uid,'1');";
    mysqli_query($conn,$sql3);
    header("location:index.php");
}
?>