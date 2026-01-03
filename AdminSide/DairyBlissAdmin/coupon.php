<?php
    include('header.php');
    include('connect.php');
?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 2.5rem; font-weight: bold; color: #343a40; border-bottom: 4px solid #4e73df; padding-bottom: 5px;">
        Coupon
    </h1>
</div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="add_coupon.php" class="btn btn-primary">Add Coupon</a>
                </div>
                <div class="card-body">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM tbl_coupon");
                    ?>

                    <div class="table-responsive">
                        <table id="couponTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Coupon ID</th>
                                    <th>Coupon Title</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Description</th>
                                    <th>Coupon Discount</th>
                                    <th>Coupon MaxAmount</th>
                                    <th>Coupon Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['c_title'] . "</td>";
                                        echo "<td>" . $row['c_code'] . "</td>";
                                        echo "<td>" . $row['c_desc'] . "</td>";
                                        echo "<td>" . $row['c_discount'] . "</td>";
                                        echo "<td>" . $row['c_maxamt'] . "</td>";
                                        echo "<td><img src='./images/$row[c_pic]' height='100' width='100'></td>";
                                        echo "<td>
                                                <a href='coupon_edit.php?x=$row[0]' class='btn btn-warning btn-sm'>Update</a>
                                                <a href='coupon_delete.php?x=$row[0]' class='btn btn-danger btn-sm'>Delete</a>
                                              </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery before DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#couponTable').DataTable({
            "order": [[0, 'asc']],  
            "pageLength": 5,  
            "responsive": true,  
            "columnDefs": [
                { "orderable": false, "targets": 7 }  
            ]
        });
    });
</script>
