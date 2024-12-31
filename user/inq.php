<?php
session_start();
require('database_conn.php');
$date = date("Y-m-d");
$unm = $_SESSION["uname"];
$sql1="select iduser from user where username = '$unm'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$uid=$row1[0];

$sql = "insert into inquiry(date,user_iduser) values('$date','$uid')";
mysqli_query($conn,$sql);
$sql = "select max(idinquiry) from inquiry";
$res=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);
$id = $row[0];
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <?php
    header("location:inquiry.php?id=$id");
    ?>
</form>
