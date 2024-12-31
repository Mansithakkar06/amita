<?php
include_once "db.php";
$name="";
$email="";
$phone_no="";
$address="";
$company="";
$id=0;
$edit_state=false;
if(isset($_POST["save"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
    $address=$_POST['address'];
    $company=$_POST['dropdown_company'];
    
    $sql="insert into supplier(name,email,phone_no,address,company_information_idcompany_information	
    ) values ('$name','$email','$phone_no','$address','$company')";
    
    if(mysqli_query($conn,$sql))
    {
        echo '<script>alert("data added successfully")</script';
        header("location:supplier_index.php");
        
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:supplier_index.php");
        mysqli_close($conn);
    }

}
if(isset($_POST["update"]))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
    $address=$_POST['address'];
    $company=$_POST['dropdown_company'];
    
    if(mysqli_query($conn,"update supplier set name='$name',email='$email',phone_no='$phone_no',address='$address',company_information_idcompany_information='$company' where idsupplier='$id'"))
    {
        $_SESSION['message']="data updated successfully";
        header("location:supplier_index.php");
    }
    else
    {
        $_SESSION['message']="error!!!";
        header("location:supplier_index.php");
    }
    
}
if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn,"delete from supplier where idsupplier='$id'");
    $_SESSION['message']="data deleted successfully";
    header("location:supplier_index.php");

}
?>