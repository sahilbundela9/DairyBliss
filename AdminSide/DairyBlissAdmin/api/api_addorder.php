<?php
include 'connect.php';

$uid=$_POST['uid'];
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$pic1=$_POST['pic1'];
$amount=$_POST['amount'];
$tot_amount=$_POST['tot_amount'];
$c_discount=$_POST['c_discount'];
$date=$_POST['date'];
$time=$_POST['time'];
$status=0;
$c_o=$_POST['c_o'];
$c_code=$_POST['c_code'];
$address=$_POST['address'];
$qty=$_POST['qty'];

$q="SELECT * FROM tbl_order where pid='$pid' AND uid='$uid' AND status=0";
$res=mysqli_query($conn,$q);
if(mysqli_num_rows($res)>0){
    $q1="UPDATE tbl_order SET qty=$qty WHERE pid='$pid' AND uid='$uid' AND status=0";
    $res=mysqli_query($conn,$q1);


}else{
    $query="INSERT INTO `tbl_order` ( `pid`, `uid`, `pname`, `pic1`, `amount`, `tot_amount`, 
    `c_discount`, `date`, `time`, `status`, `c_o`, `c_code`, `address`, `qty`) 
    VALUES ( '$pid', '$uid', '$pname', '$pic1', '$amount', '$tot_amount', '$c_discount',
     '$date', '$time', '$status', '$c_o', '$c_code', '$address', '$qty');";
     $res=mysqli_query($conn,$query);
}

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