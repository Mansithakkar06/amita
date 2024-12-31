<?php
session_start();
require('database_conn.php');
$uid = $_SESSION['uname'];
$sql_id = "select * from user where username = '$uid'";
$res_id = mysqli_query($conn, $sql_id);
$row_id = mysqli_fetch_assoc($res_id);
$user_id = $row_id['iduser'];

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $sql_remove = "delete from cart where product_idproduct = '$remove_id' and user_iduser = '$user_id'";
    $sql_res = mysqli_query($conn, $sql_remove);
    header('location:cart.php');
}
?>