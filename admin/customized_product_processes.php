<?php
include_once "db.php";
$name="";
$height="";
$width="";
$design="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $height=$_POST['height'];
    $width=$_POST['width'];
    $design=$_POST['design'];
    $aid = $_POST['aid'];
    $sql="insert into customized_product (name,height,width,design,appointment_idappointment) values('$name','$height','$width','$design','$aid')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:customized_product_index.php?aid=$aid");
        
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:customized_product_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $height=$_POST['height'];
    $width=$_POST['width'];
    $design=$_POST['design'];
    $aid = $_POST['aid'];
    if(mysqli_query($conn,"update customized_product set name='$name',height='$height',width='$width',design='$design' where idcustomized_product='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:customized_product_index.php?aid=$aid");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:customied_product_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $aid = $_GET['aid'];
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from customized_product where idcustomized_product='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:customized_product_index.php?aid=$aid");
}
?>