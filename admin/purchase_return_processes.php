<?php
include_once "db.php";
$date="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $date=$_POST['date'];
    
    $sql="insert into purchase_return(date,purchase_idpurchase) values ('$date','$_POST[dropdown_p]')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_return_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:purchase_return_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    $purchase=$_POST['dropdown_p'];

    if(mysqli_query($conn,"update purchase_return set date='$date',purchase_idpurchase='$purchase' where idpurchase_return='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:purchase_return_index.php");
    }
    else
    {
        $_SESSION['message']="erorr!!!";
        header("location:purchase_return_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from purchase_return where idpurchase_return='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:purchase_return_index.php");

}
?>