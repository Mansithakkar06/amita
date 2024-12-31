<?php
include_once "db.php";
$qty="";
$reason="";
$prid="";
$rawid="";
$id=0;
$edit_state=false;
if(isset($_POST['save']))
{
    $qty=$_POST['qty'];   
    $reason=$_POST['reason'];
    $rawid=$_POST['dropdown'];
    $prid=$_POST['prid'];
	$pid=$_POST['pid'];
    if($qty>0)
    {
    $sql="insert into purchase_return_details values('$rawid','$prid','$qty','$reason')";
    if(mysqli_query($conn,$sql))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_return_details_index.php?prid=$prid"); 
    }
}
    else
    {
        $_SESSION['message']="please try with another purchase id";
        header("location:purchase_return_index.php"); 
        //mysqli_close($conn);
        die();
    }
    $sql1="update raw_material set qoh=qoh-$qty where idraw_material='$rawid'";
    if(mysqli_query($conn,$sql1))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_return_details_index.php?prid=$prid"); 
    }
    else
    {
        echo mysqli_error($conn);
        mysqli_close($conn);
    }
	$sql2="update purchase_details set qty=qty-$qty where raw_material_idraw_material='$rawid' and purchase_idpurchase='$pid'";
    if(mysqli_query($conn,$sql2))
    {
        $_SESSION['message']="data added successfully";
        header("location:purchase_return_details_index.php?prid=$prid"); 
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
    $qty=$_POST['qty'];
    $reason=$_POST['reason'];
    $rawid=$_POST['dropdown'];

    if(mysqli_query($conn,"update purchase_return_details set qty='$qty',reason='$reason',raw_material_idraw_material='$rawid' where purchase_return_idpurchase_return='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:purchase_return_details_index.php?prid=$id");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:purchase_return_details_index.php?prid=$id");
    }

}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from purchase_return_details where purchase_return_idpurchase_return='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:purchase_return_details_index.php?prid=$id");
}
?>