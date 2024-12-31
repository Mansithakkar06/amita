<?php
include_once "db.php";
$description="";
$id=0;
$pid = "";
$answer = "";
$edit_state=false;
if(isset($_GET["edit"]) && isset($_GET["id"]))
{
    $pid=$_POST['pid'];
    $id = $_POST['id'];
    $answer = $_POST["answer"];
    echo $answer;
    $sql="update inquiry_details set answer='$answer' where product_idproduct='$pid' and inquiry_idinquiry='$id'";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data updated successfully";
      //  header("location:inquiry_index.php?id=$id");
    }
    else
    {
        $_SESSION['message']="error";
        header("location:inquiry_index.php?id=$id");
        mysqli_close($conn);
     }

}
if(isset($_POST["update"]))
{
    $pid=$_POST['pid'];
    $id = $_POST['id'];
    $answer = $_POST["answer"];
    if(mysqli_query($conn,"update inquiry_details set answer='$answer' where inquiry_idinquiry='$id' and product_idproduct=$pid"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:inquiry_index.php?id=$id");
    }
    else
    {
        $_SESSION['message']="error";
        header("location:inquiry_index.php?id=$id");
        mysqli_close($conn);
    }
   
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from inquiry_details where inquiry_idinquiry='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:inquiry_index.php");

}
?>