<?php
    include('header.php');
    include('connect.php');
?>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>
            .row {
                justify-content: center;
            }
            body {
                font-family: 'poppins';
            }
        </style>

<div class="page-wrapper">
    <div class="page-content">
    <div class="container ">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 2.5rem; font-weight: bold; color: #343a40; border-bottom: 4px solid #4e73df; padding-bottom: 5px;">
        Category
    </h1>
</div>
        <div class="card">
            <div class="card-body">
                <a href="add_category.php" class="btn btn-primary mb-3">Add Category</a>

                <?php
                    $q = mysqli_query($conn, "SELECT * FROM tbl_category");
                ?>

                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row['cat_name'] . "</td>";
                                    echo "<td><img src='./images/$row[cat_pic]' height='100' width='100' class='img-thumbnail'></td>";
                                    echo "<td>
                                            <a href='cat_edit.php?x=$row[0]' class='btn btn-warning btn-sm'>Update</a>
                                            <a href='cat_delete.php?x=$row[0]' class='btn btn-danger btn-sm'>Delete</a>
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

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "order": [[0, 'asc']],  // Sorting by category ID (first column)
                    "pageLength": 5,  // Set number of rows per page
                    "responsive": true  // Makes the table responsive on smaller screens
                });
            });
        </script>
    </div>
</div>


        </div>


