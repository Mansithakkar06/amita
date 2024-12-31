<?php
include_once "db.php";
$qty="";
$raw_material="";
$id="";
$edit_state=false;
if(isset($_POST['save']))
{
    $id=$_POST['pid'];   
    $qty=$_POST['qty'];
    $raw_material=$_POST['dropdown'];
    $sql="select price from raw_material_details where raw_material_idraw_material='$raw_material'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if(!$res)
    {
        echo mysqli_error();
    }
    echo $row[0];
    $amount=$row[0]*$qty;           
    $sql1="insert into purchase_details values('$id','$raw_material','$qty','$amount')";
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_details_index.php?pid=$id"); 
    }
    else
    {
        $_SESSION['message']="please try with another purchase id!!!";
        header("location:purchase_index.php"); 
        die();
    }
    $sql2="update raw_material set qoh=qoh+$qty where idraw_material='$raw_material'";
    if(mysqli_query($conn,$sql2))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_details_index.php?pid=$id"); 
    }
    else
    {
        echo mysqli_error($conn);
        mysqli_close($conn);
    }
	
        
}
if(isset($_POST["update"]))
{
    $id=$_POST['pid'];
    $qty=$_POST['qty'];
    $raw_material=$_POST['dropdown'];
    $sql="select price from raw_material_details where raw_material_idraw_material='$raw_material'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if(!$res)
    {
        echo mysqli_error($conn);
    }
    echo $row[0];
    
    $amount=$row[0]*$qty;   
    $sql1="update purchase_details set qty='$qty',amount='$amount',raw_material_idraw_material='$raw_material' where purchase_idpurchase='$id'";
 
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data updated successfully";
        header("location:purchase_details_index.php?pid=$id");
    }
    else
    {
        $_SESSION['message']="please try with another purchase id!!!";
       // header("location:purchase_index.php"); 
        die();
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $raw_material=$_GET['rid'];
    mysqli_query($conn,"delete from purchase_details where purchase_idpurchase='$id' and raw_material_idraw_material='$raw_material'");
    $_SESSION['message']="data deleted successfully";
    header("location:purchase_details_index.php?pid=$id");

}


   
?>