<?php

include 'connect.php';

// Check if POST variables are set
if(isset($_POST['uid'], $_POST['address'], $_POST['c_code'], $_POST['c_o'], $_POST['c_discount'])) {
    // Get the POST values
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $c_code = mysqli_real_escape_string($conn, $_POST['c_code']);
    $c_o = mysqli_real_escape_string($conn, $_POST['c_o']);
    $c_discount = mysqli_real_escape_string($conn, $_POST['c_discount']);

    $date = date("Y-m-d");
    $time = date("H:i:s");

    // Prepare the SQL query
    $q = "UPDATE tbl_order 
          SET date='$date', time='$time', address='$address', 
              c_code='$c_code', c_o='$c_o', c_discount='$c_discount', 
              status=1 
          WHERE uid='$uid' AND status=0";

    // Execute the query
    if ($res = mysqli_query($conn, $q)) {
        // Query successful
        $response = array(
            "status" => true,
            "message" => "success",
            "order" => null,
        );
    } else {
        // Query failed, capture error
        $response = array(
            "status" => false,
            "message" => "Database error: " . mysqli_error($conn),
            "order" => null,
        );
    }
} else {
    // If POST parameters are missing
    $response = array(
        "status" => false,
        "message" => "Required parameters are missing.",
        "order" => null,
    );
}

// Return response as JSON
echo json_encode($response);

// Close the database connection
$conn->close();

?>
