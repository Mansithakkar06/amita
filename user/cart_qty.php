<?php
include_once "database_conn.php";
$total=0;
$sub=0;
$i=0;
$result=array();

$qty = $_GET['qty'];
$pid = $_GET['pid'];
$uid = $_GET['uid'];
$sql3="select * from product where idproduct=$pid";
$res3=mysqli_query($conn,$sql3);
$row4=mysqli_fetch_assoc($res3);
if($row4['qoh']>=$qty && $qty>0)
{
$sql="update cart set qty='$qty' where user_iduser='$uid' and product_idproduct='$pid'";
if(mysqli_query($conn,$sql))
{
	$sql="select * from cart where user_iduser='$uid'";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($res))
	{
		$p=$row['product_idproduct'];
		$q=$row['qty'];
	
		$sql1="select * from product where idproduct='$p'";
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($res1);
		
		$price=$row1['price'];
		$offid=$row1['offer_idoffer'];
        $sql1 = "select * from offer where idoffer=$offid";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $dis = $row1['discount'];
        $op = $price * $dis / 100;
        $dprice = $price - $op;
    
		$total=$total+$q*$dprice;
		$sub=$q*$dprice;
		
		$result["$i"]=number_format($sub,2);		
		$i++;
	}
}	
	$total=number_format($total,2);
	$result["$i"]=$total;
	echo json_encode($result);
}
?>