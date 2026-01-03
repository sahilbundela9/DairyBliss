<?php
include("connect.php");

$uid=$_POST['uid'];

$query = "SELECT * FROM tbl_order WHERE uid=$uid";
$res = mysqli_query($conn, $query);

// Check if the query was successful
if (!$res) {
    // If the query fails, return an error response
    $arr = array("status" => false, "message" => "Query failed: " . mysqli_error($conn));
    echo json_encode($arr);
    exit;
}

// Initialize an array to hold coupon data

// Fetch all rows from the result set
$order_data=array();

while($row = mysqli_fetch_assoc($res)) {
    array_push($order_data, $row);
}

$row = mysqli_fetch_assoc($res) ;


// If no coupons were found

$arr = array("status" => true, "message" => "success", "order" => $order_data);


// Output the result as JSON
echo json_encode($arr);
?>
