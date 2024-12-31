<?php
include_once "db.php";
$name="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    
    $sql="insert into category (name) values('$name')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:category_index.php");   
    }
    else
    {
        $_SESSION['message']="error";
        header("location:category_index.php");   
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    
    if(mysqli_query($conn,"update category set name='$name' where idcategory='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:category_index.php");
    }
    else{
        $_SESSION['message']="error";
        header("location:category_index.php");   
        mysqli_close($conn); 
    }
   
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from category where idcategory='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:category_index.php");

}
?>