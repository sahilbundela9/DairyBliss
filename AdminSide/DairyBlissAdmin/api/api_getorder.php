<?php
include 'connect.php';

$uid=$_POST['uid'];

$order= array();
$q="SELECT * FROM tbl_order where  uid='$uid' AND status=0";

$result=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($result)){
    array_push($order,$row);
}

$response= json_encode([
    "status"=>true,
    "message"=>"added to cart",
    "order"=>$order,
    
]);
echo $response;
$conn->close();



?>