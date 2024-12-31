<?php
include_once "db.php";
$date="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $date=$_POST['date'];
    
    $sql="insert into sales_return(date,sales_idsales) values ('$date','$_POST[dropdown]')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_return_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_return_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    $sales=$_POST['dropdown'];
    if(mysqli_query($conn,"update sales_return set date='$date',sales_idsales='$sales' where idsales_return='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:sales_return_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_return_index.php");
    }
   
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from sales_return where sales_idsales='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:sales_return_index.php");

}
?>