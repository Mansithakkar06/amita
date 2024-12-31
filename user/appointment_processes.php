<?php
session_start();
require('database_conn.php');
$date="";
$id=0;
$edit_state=false;
$unm = $_SESSION["uname"];
$sql1="select iduser from user where username = '$unm'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$uid=$row1[0];

if(isset($_POST["save"]))
{
    $curr_date=date("Y-m-d");
    $date=$_POST['date'];
    $time=$_POST['timeslot'];
    if($date>$curr_date){
        
    $sql="insert into appointment (date,status,user_iduser,time) values('$date','0','$uid','$time')";
    if(mysqli_query($conn,$sql))
    {        
        // $_SESSION['message']="data added successfully";
        header("location:appointment.php");   
    }
}
    else
    {
        $_SESSION['message']="Invalid date";
        header("location:appointment.php");   
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $date=$_POST['date'];
    $time=$_POST['timeslot'];
    if(mysqli_query($conn,"update appointment set date='$date',time='$time' where idappointment='$id'"))
    {
        // $_SESSION['message']="data updated successfully";
        header("location:appointment.php");
    }
    else{
        $_SESSION['message']="error";
        header("location:appointment.php");   
        mysqli_close($conn); 
    }
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from appointment where idappointment='$id'");
    // $_SESSION['message']="data deleted successfully";
    header("location:appointment.php");
}
?>