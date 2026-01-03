<?php
include("connect.php");

$code=$_POST['code'];
// Query to fetch active coupons
$query = "SELECT * FROM tbl_coupon WHERE c_code=$code";
$res = mysqli_query($conn, $query);

// Check if the query was successful
if (!$res) {
    // If the query fails, return an error response
    $arr = array("status" => false, "message" => "Query failed: " . mysqli_error($conn));
    echo json_encode($arr);
    exit;
}

// Initialize an array to hold coupon data
$coupon_data = array();

// Fetch all rows from the result set
$row = mysqli_fetch_assoc($res) ;


// If no coupons were found

    $arr = array("status" => true, "message" => "success", "coupon_data" => $row);


// Output the result as JSON
echo json_encode($arr);
?>
