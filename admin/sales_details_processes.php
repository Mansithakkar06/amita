<?php
include_once "db.php";
$qty="";
$price="";
$proid="";
$sid="";
$id=0;
$edit_state=false;
if(isset($_POST['save']))
{
    $qty=$_POST['qty'];   
    $proid=$_POST['dropdown'];
    $sid=$_POST['sid'];
    $sql="select price from product where idproduct='$proid'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if(!$res)
    {
        echo mysqli_error();
    }
    echo $row[0];
    $price=$row[0]*$qty; 
    $sql1="insert into sales_details values('$proid','$sid','$qty','$price')";
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_details_index.php?sid=$sid"); 
    }
    else
    {
        $_SESSION['message']="please try with another sales id!!";
        header("location:sales_index.php"); 
        mysqli_close($conn);
    }
    $sql2="update product set qoh=qoh-$qty";
    if(mysqli_query($conn,$sql2))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_details_index.php?sid=$sid"); 
    }
    else
    {
        $_SESSION['message']="please try with another sales id!!";
        header("location:sales_index.php"); 
        mysqli_close($conn);
    } 
}
if(isset($_POST["update"]))
{
    $sid=$_POST['sid'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $proid=$_POST['dropdown'];
    $sql="select price from product where idproduct='$proid'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if(!$res)
    {
        echo mysqli_error();
    }
    echo $row[0];
    $price=$row[0]*$qty; 

    if(mysqli_query($conn,"update sales_details set qty='$qty',price='$price',product_idproduct='$proid' where sales_idsales='$sid'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:sales_details_index.php?sid='$sid'");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_details_index.php?sid='$sid'");
    }
    
}
if(isset($_GET['delete']))
{
    $sid=$_GET['delete'];
    mysqli_query($conn,"delete from sales_details where sales_idsales='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:sales_details_index.php?sid='$sid'");

}


   
?>