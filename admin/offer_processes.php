<?php
include_once "db.php";
$sdate="";
$edate="";
$discount="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];
    $discount=$_POST['discount'];
    $dt=date('Y-m-d');
    if($sdate>$dt && $edate>$sdate)
    {
    $sql="insert into offer (start_date,end_date,discount) values('$sdate','$edate','$discount')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:offer_index.php");   
    }
}
    else
    {
        $_SESSION['message']="Invalid Date";
        header("location:offer_index.php");   
        mysqli_close($conn);
    }


}
if(isset($_POST["update"]))
{
    $id = $_POST['id'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];
    $discount=$_POST['discount'];
    
    if(mysqli_query($conn,"update offer set start_date='$sdate',end_date='$edate',discount='$discount' where idoffer='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:offer_index.php");
    }
    else{
        $_SESSION['message']="error";
        header("location:offer_index.php");   
        mysqli_close($conn); 
    }
   
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from offer where idoffer='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:offer_index.php");

}
?>