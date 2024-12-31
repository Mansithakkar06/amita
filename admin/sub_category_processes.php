<?php
include_once "db.php";
$name="";
$category="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $category=$_POST['dropdown'];
    
    $sql="insert into sub_category (name,category_idcategory) values('$name','$category')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:sub_category_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sub_category_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $category=$_POST['dropdown'];
    if(mysqli_query($conn,"update sub_category set name='$name',category_idcategory='$category' where idsub_category='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:sub_category_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:sub_category_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from sub_category where idsub_category='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:sub_category_index.php");

}
?>