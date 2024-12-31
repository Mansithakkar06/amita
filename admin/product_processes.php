<?php
include_once "db.php";
$name="";
$price="";
$description="";
$qoh="";
$brand="";
$sub_category="";
$offer="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $qoh=$_POST['qoh'];
    $brand=$_POST['dropdown_brand'];
    $sub_category=$_POST['dropdown_sc'];
    $offer=$_POST['dropdown_offer'];
    
    $sql="insert into product (name,price,description,qoh,brand_idbrand,sub_category_idsub_category,offer_idoffer) values('$name','$price','$description','$qoh','$brand','$sub_category','$offer')";
    
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:product_index.php");
        
    }
    else
    {
        $_SESSION['message']="error";
        header("location:product_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $qoh=$_POST['qoh'];
    $brand=$_POST['dropdown_brand'];
    $sub_category=$_POST['dropdown_sc'];
    $offer=$_POST['dropdown_offer'];

    if(mysqli_query($conn,"update product set name='$name',price='$price',description='$description',qoh='$qoh',brand_idbrand='$brand',sub_category_idsub_category='$sub_category',offer_idoffer='$offer' where idproduct='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:product_index.php");
    }
    else
    {
        $_SESSION['message']="error";
        header("location:product_index.php");
        mysqli_close($conn);
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from product where idproduct='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:product_index.php");

}
?>