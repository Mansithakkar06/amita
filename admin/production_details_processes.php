<?php
include_once "db.php";
$raw_material="";
$raw_material_qty_used="";
$proid="";
$id=0;
$edit_state=false;
if(isset($_POST['save']))
{
    $proid=$_POST['pid'];   
    $raw_material_qty_used=$_POST['raw_material_qty_used'];
    $raw_material=$_POST['dropdown'];
    $sql="insert into production_details values('$raw_material','$proid','$raw_material_qty_used')";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:production_details_index.php"); 
    }
    else
    {
        $_SESSION['message']="please try with another production id!!!";
        header("location:production_index.php"); 
        mysqli_close($conn);
    }
    $sql1="update raw_material set qoh=qoh-$raw_material_qty_used";
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data added successfully";
        header("location:production_details_index.php"); 
    }
    else
    {
        echo mysqli_error($conn);
        mysqli_close($conn);
    }  
}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $raw_material_qty_used=$_POST['raw_material_qty_used'];
    $raw_material=$_POST['dropdown'];

    if(mysqli_query($conn,"update production_details set raw_material_idraw_material='$raw_material',raw_material_qty_used='$raw_material_qty_used' where production_idproduction='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:production_details_index.php");
    }
    else
    {
        $_SESSION['message']="please try with another production id!!!";
        header("location:production_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from production_details where production_idproduction='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:production_details_index.php");

}


   
?>