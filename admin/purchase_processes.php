<?php
include_once "db.php";
$date="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $date=$_POST['date'];
    
    $sql="insert into purchase(date,supplier_idsupplier) values ('$date','$_POST[dropdown]')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:purchase_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    $supplier=$_POST['dropdown'];

   if(mysqli_query($conn,"update purchase set date='$date',supplier_idsupplier='$supplier' where idpurchase='$id'"))
   {
        $_SESSION['message']="data updated successfully";
        header("location:purchase_index.php");
   }
   else
   {
        $_SESSION['message']="error!!";
        header("location:purchase_index.php");
   }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from purchase where idpurchase='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:purchase_index.php");
}
?>