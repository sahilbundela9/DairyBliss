<?php
include "connect.php";

$query="select * from tbl_coupon where status=true";
$res=mysqli_query($conn,$query);


$row=mysqli_fetch_array($res);
$arr=array("status"=>true,"message"=>"success","coupon_data"=>$row);

echo json_encode($arr);
?>