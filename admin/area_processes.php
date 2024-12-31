<?php
include_once "db.php";
$name="";
$pincode="";
$city="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $pincode=$_POST['pincode'];
    $city=$_POST['dropdown'];
    
    $sql="insert into area (name,pincode,city_idcity) values('$name','$pincode','$city')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:area_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:area_index.php"); 
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $pincode=$_POST['pincode'];
    $city=$_POST['dropdown'];

    if(mysqli_query($conn,"update area set name='$name',pincode='$pincode',city_idcity=$city where idarea='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:area_index.php");
    }
    else{
        $_SESSION['message']="error!!!!";
        header("location:area_index.php"); 
        mysqli_close($conn);

    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from area where idarea='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:area_index.php");

}
?>