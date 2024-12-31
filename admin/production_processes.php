<?php
include_once "db.php";
$qty="";
$date="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $qty=$_POST['qty'];
    $date=$_POST['date'];
    $sql="insert into production(qty,date,product_idproduct) values ('$qty','$date','$_POST[dropdown_p]')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:production_index.php");
        
    }
    else
    {
        $_SESSION['message']="error";
        header("location:production_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $qty=$_POST['qty'];
    $date=$_POST['date'];
    $product=$_POST['dropdown_p'];
    if(mysqli_query($conn,"update production set qty='$qty',date='$date',product_idproduct='$product' where idproduction='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:production_index.php");
    }
    else
    {
        $_SESSION['message']="error";
        header("location:production_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $sql="delete from production where idproduction='$id'";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data deleted successfully";
        header("location:production_index.php");
        
    }
    else
    {
        echo mysqli_error($conn);
        mysqli_close($conn);
    }

}
?>