<?php
include_once "db.php";
$file_path="";
$product="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $file_path=$_POST['file_path'];
    $product=$_POST['dropdown'];
    //$imgfile=$_FILES["image"]["name"];
// get the image extension
    $extension = substr($file_path,strlen($file_path)-4,strlen($file_path));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
    $_SESSION['message']="Invalid format. Only jpg / jpeg/ png /gif format allowed'";
header("location:image_index.php");
}
else
{
//rename the image file
//$imgnewfile=md5($file_path).$extension;
// Code for move image into directory
//move_uploaded_file($_FILES["image"]["tmp_name"],"uploadeddata/".$imgnewfile);
    $sql="insert into image (file_path,product_idproduct) values('$file_path','$product')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:image_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!!";
        header("location:image_index.php"); 
        mysqli_close($conn);
    }
}

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $file_path=$_POST['file_path'];
    $product=$_POST['dropdown'];

    if(mysqli_query($conn,"update image set file_path='$file_path',product_idproduct='$product' where idimage='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:image_index.php");
    }
    else{
        $_SESSION['message']="error!!!!";
        header("location:iamge_index.php"); 
        mysqli_close($conn);

    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from image where idimage='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:image_index.php");

}
?>