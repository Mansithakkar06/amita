<?php
include_once "db.php";
$qty="";
$reason="";
$srid="";
$proid="";
$id=0;
$edit_state=false;
if(isset($_POST['save']))
{
    $qty=$_POST['qty'];   
    $reason=$_POST['reason'];
    $proid=$_POST['dropdown'];
    $srid=$_POST['srid'];
    $sql="insert into sales_return_details values('$proid','$srid','$qty','$reason')";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_return_details_index.php"); 
    }
    else
    {
        $_SESSION['message']="please try with another sales id!!!";
        header("location:sales_return_index.php"); 
        mysqli_close($conn);
    }
    $sql1="update product set qoh=qoh+$qty";
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_return_details_index.php"); 
    }
    else
    {
        $_SESSION['message']="please try with another sales id!!!";
        header("location:sales_return_index.php"); 
        mysqli_close($conn);
    }
        
}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $qty=$_POST['qty'];
    $reason=$_POST['reason'];
    $proid=$_POST['dropdown'];

    if(mysqli_query($conn,"update sales_return_details set qty='$qty',reason='$reason',product_idproduct='$proid' where sales_return_idsales_return='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:sales_return_details_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_return_details_index.php");
    }
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from sales_return_details where sales_return_idsales_return='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:sales_return_details_index.php");

}


   
?>