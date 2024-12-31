<?php
include_once "db.php";
$date=date("Y-m-d");
$amount="";
$user="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    //$date=$_POST['date'];
    $user=$_POST['dropdown'];
    $sql="insert into sales (date,status,iscancel,user_iduser) values('$date','0','0','$user')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:sales_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    //$date=$_POST['date'];
    $user=$_POST['dropdown'];

    if(mysqli_query($conn,"update sales set date='$date',user_iduser='$user' where idsales='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:sales_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sales_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from sales where idsales='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:sales_index.php");

}
?>