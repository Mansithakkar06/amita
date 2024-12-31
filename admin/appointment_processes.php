<?php
include_once "db.php";
$date="";
$id=0;
$edit_state=false;
$uid ="";
if(isset($_POST["save"]))
{
    $date=$_POST['date'];
    $uid="";
    $sql="insert into appointment (date,status,user_iduser) values('$date','0','$uid')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:appointment_index.php");   
    }
    else
    {
        $_SESSION['message']="error";
        header("location:appointment_index.php");   
        mysqli_close($conn);
    }
}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    
    if(mysqli_query($conn,"update appointment set date='$date' where idappointment='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:appointment_index.php");
    }
    else{
        $_SESSION['message']="error";
        header("location:appointment_index.php");   
        mysqli_close($conn); 
    }
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"update appointment set status='1' where idappointment='$id'");
    $_SESSION['message']="Data Updated successfully";
    header("location:appointment_index.php");
}
?>