<?php
include_once "db.php";
$name="";
$email="";
$phone="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    
    //$sql="insert into area (name,pincode,city_idcity) values('$name','$pincode','$city')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:user_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:user_index.php"); 
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    if(mysqli_query($conn,"update user set isAdmin='1' where iduser='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:user_index.php");
    }
    else{
        $_SESSION['message']="error!!!!";
        header("location:user_index.php"); 
        mysqli_close($conn);

    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from area where idarea='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:user_index.php");
}
?>