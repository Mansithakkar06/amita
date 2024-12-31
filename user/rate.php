<?php
session_start();
require "database_conn.php";
if(isset($_POST['rate']))
{
    $unm = $_SESSION["uname"];
    $sql1="select iduser from user where username = '$unm'";
    $res1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($res1);
    $uid=$row1[0];
       $rating = $_POST["rating"];
       $pid=$_POST['pid'];
       $sql="select * from rating where user_iduser='$uid' and product_idproduct='$pid'";
        $res=$conn->query($sql);
        if(mysqli_num_rows($res)>0)
        {
            $sql="update rating set stars='$rating' where user_iduser='$uid' and product_idproduct='$pid'";
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('$pid','$uid','$rating')";
        }
        if (mysqli_query($conn, $sql))
       {
           echo "New Rate addedddd successfully";
       }
       else
       {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);
       header("location:product_details.php?pid=$pid");
   }
?>