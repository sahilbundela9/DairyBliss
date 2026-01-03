<?php
    include 'connect.php';

    // Check if POST data is received
    if (isset($_POST['uid']) && isset($_POST['id']) && isset($_POST['amount']) && isset($_POST['qty'])) {

        // Get POST parameters
        $uid = $_POST['uid'];
        $id = $_POST['id'];
        $amount = (int) $_POST['amount']; // Ensure amount is an integer
        $qty = (int) $_POST['qty']; // Ensure qty is an integer

        // Calculate total amount
        $tot_amt = $amount * $qty;

        // Use prepared statement to prevent SQL injection
        $query = "UPDATE tbl_order SET qty=?, tot_amount=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $qty, $tot_amt, $id); // Bind parameters: qty, tot_amount, id
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            // Fetch the updated order details
            $order = array();
            $q = "SELECT * FROM tbl_order WHERE uid = ? AND status = 0";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("s", $uid); // Bind user id
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch results into the order array
            while ($row = $result->fetch_assoc()) {
                array_push($order, $row);
            }

            // Send response back to the client
            $response = array(
                "status" => true,
                "message" => "Updated to cart",
                "order" => $order,
            );
        } else {
            $response = array(
                "status" => false,
                "message" => "Failed to update cart",
            );
        }

        // Close the prepared statements and connection
        $stmt->close();
        $conn->close();

        // Return JSON response
        echo json_encode($response);

    } else {
        // If required POST parameters are missing
        $response = array(
            "status" => false,
            "message" => "Missing parameters",
        );
        echo json_encode($response);
    }
?>
