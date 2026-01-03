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
        Product
    </h1>
</div>
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="add_product.php" class="btn btn-primary">Add Product</a>
                </div>
                <div class="card-body">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM tbl_product");
                    ?>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Title</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Product Discount</th>
                                    <th>Product Image1</th>
                                    <th>Product Image2</th>
                                    <th>Product Image3</th>
                                    <th>Product Image4</th>
                                    <th>Product ShelfLife</th>
                                    <th>Product BrandName</th>
                                    <th>Product Weight</th>
                                    <th>Product Category</th>
                                    <th>Popular</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . htmlspecialchars($row['ptitle']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['pdesc']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['pprice']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['pdiscount']) . "</td>";
                                        echo "<td><img src='./images/" . htmlspecialchars($row['pic1']) . "' alt='Image'></td>";
                                        echo "<td><img src='./images/" . htmlspecialchars($row['pic2']) . "' alt='Image'></td>";
                                        echo "<td><img src='./images/" . htmlspecialchars($row['pic3']) . "' alt='Image'></td>";
                                        echo "<td><img src='./images/" . htmlspecialchars($row['pic4']) . "' alt='Image'></td>";
                                        echo "<td>" . htmlspecialchars($row['shelflife']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['brandname']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['weight1']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['popular']) . "</td>";
                                        echo "<td>
                                                <a href='product_edit.php?x=" . $row[0] . "' class='btn btn-warning btn-sm'>Update</a>
                                                <a href='product_delete.php?x=" . $row[0] . "' class='btn btn-danger btn-sm'>Delete</a>
                                            </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Products
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
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
