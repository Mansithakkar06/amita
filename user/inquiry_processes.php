<?php
session_start();
require('database_conn.php');
$description="";
$id="";
$pid = "";
$edit_state=false;
$unm = $_SESSION["uname"];
$sql1="select iduser from user where username = '$unm'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$uid=$row1[0];

if(isset($_POST["save"]))
{
    $description=$_POST['description'];
    $pid=$_POST['dropdown'];
    $id = $_POST['id'];
    $date=date("Y-m-d");
    $sql1="select * from inquiry_details where product_idproduct='$pid' and user_iduser='$uid'";
    $check = mysqli_query($conn,$sql1);
    $s="insert into inquiry(date,user_iduser) values('$date','$uid')";
    $conn->query($s);
    $s1="select max(idinquiry) from inquiry";
    $iid=mysqli_query($conn,$s1);
    $id=mysqli_fetch_array($iid)[0];
    $sql="insert into inquiry_details(product_idproduct,inquiry_idinquiry,description) values('$pid','$id','$description')";
    $count = mysqli_num_rows($check);
    if ($count>0) {
        $_SESSION['message']="error record exists";
        header("location:inquiry.php?id=$id");
        mysqli_close($conn);
    }
    else if(mysqli_query($conn,$sql))
    {
        // $_SESSION['message']="data added successfully";
        header("location:inquiry.php?id=$id");
        
    }
    else
    {
        $_SESSION['message']="error";
        header("location:inquiry.php?id=$id");
        mysqli_close($conn);
     }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $pid=$_POST['dropdown'];
    $description=$_POST['description'];
    
    if(mysqli_query($conn,"update inquiry_details set description='$description' , product_idproduct='$pid' where inquiry_idinquiry='$id'"))
    {
        // $_SESSION['message']="data updated successfully";
        header("location:inquiry.php?id=$id");
    }
    else
    {
        $_SESSION['message']="error";
        header("location:inquiry.php?id=$id");
        mysqli_close($conn);
    }
   
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from inquiry_details where inquiry_idinquiry='$id'");
    // $_SESSION['message']="data deleted successfully";
    header("location:inquiry.php?id=$id");

}
?>