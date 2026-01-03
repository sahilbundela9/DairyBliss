<?php
    include('header.php');
    include('connect.php');

    // Check if database connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>

<!-- DataTables Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    .row {
        justify-content: center;
    }
    body {
        font-family: 'Poppins', sans-serif;
    }
    .table img {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 2.5rem; font-weight: bold; color: #343a40; border-bottom: 4px solid #4e73df; padding-bottom: 5px;">
        Order
    </h1>
</div>
            <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="order.php" class="btn btn-primary">Orders</a>
                </div>
                <div class="card-body">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM tbl_order");
                    ?>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                    <th>User ID</th>
                                    <th>Product Name</th>
                                    <th>Product Image1</th>
                                    <th>Amount</th>
                                    <th>Total Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . htmlspecialchars($row['pid']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['uid']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['pname']) . "</td>";
                                        echo "<td><img src='./images/" . htmlspecialchars($row['pic1']) . "' alt='Image'></td>";
                                        echo "<td>₹" . htmlspecialchars($row['amount']) . "</td>";
                                        echo "<td>₹" . htmlspecialchars($row['tot_amount']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['c_o']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['qty']) . "</td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Orders Management
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery 3.6.0 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[0, 'asc']],  
            "pageLength": 5,  
            "responsive": true,  
            "deferRender": true
        });
    });
</script>
