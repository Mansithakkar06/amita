<?php
include_once "db.php";
$name="";
$qoh="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $qoh=$_POST['qoh'];
    $price=$_POST['price'];
    $sql="insert into raw_material(name,qoh) values ('$name','$qoh')";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:raw_material_index.php"); 
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:raw_material_index.php"); 
        mysqli_close($conn);
    }
    

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $qoh=$_POST['qoh'];
    
    if(mysqli_query($conn,"update raw_material set name='$name',qoh='$qoh' where idraw_material='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:raw_material_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:raw_material_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from raw_material where idraw_material='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:raw_material_index.php");

}
if(isset($_GET['setprice']))
{
    $rawid=$_GET['setprice'];
    $_SESSION['rid']=$rawid;
    header("location:raw_material_details_index.php");
}
?>