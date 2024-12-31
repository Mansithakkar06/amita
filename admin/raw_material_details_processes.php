<?php
include_once "db.php";
$price="";
$supplier="";
$rawid="";
$id=0;
$edit_state=false;
if(isset($_POST['save']))
{
    $rawid=$_POST['rid'];   
    $price=$_POST['price'];
    $supplier=$_POST['dropdown'];
    $sql="insert into raw_material_details values('$rawid','$supplier','$price')";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:raw_material_details_index.php"); 
    }
    else
    {
        $_SESSION['message']="please try with another raw material id";
        header("location:raw_material_index.php"); 
        mysqli_close($conn);
    }
        
}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $price=$_POST['price'];
    $supplier=$_POST['dropdown'];

    if(mysqli_query($conn,"update raw_material_details set price='$price',supplier_idsupplier='$supplier' where raw_material_idraw_material='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:raw_material_details_index.php");
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
    mysqli_query($conn,"delete from raw_material_details where raw_material_idraw_material='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:raw_material_details_index.php");

}


   
?>