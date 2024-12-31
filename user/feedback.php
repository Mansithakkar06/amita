<?php
include_once "database_conn.php";
$pid=$_POST['pid'];
$feed = $_POST['feed'];
$uid=$_POST['uid'];
$date = date("Y-m-d");
$select = "select * from feedback where product_idproduct='$pid' and user_iduser='$uid'";
$r=mysqli_query($conn,$select);
$count=mysqli_num_rows($r);
if($count>0)
{
    $sql="update feedback set description='$feed', date='$date' where product_idproduct='$pid' and user_iduser='$uid'";
    $conn->query($sql);
    header("location:product_details.php?pid=$pid");
}
else
{
    $sql="insert into feedback values('$uid','$pid','$feed','$date')";
    mysqli_query($conn,$sql);
    header("location:product_details.php?pid=$pid");
}
?>