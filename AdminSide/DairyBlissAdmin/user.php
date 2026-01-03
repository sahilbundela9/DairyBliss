<?php
    include('header.php');
    include('connect.php');
?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-- DataTables Bootstrap 5 Styling -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 2.5rem; font-weight: bold; color: #343a40; border-bottom: 4px solid #4e73df; padding-bottom: 5px;">
        User
    </h1>
</div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="add_user.php" class="btn btn-primary">Add User</a>
                </div>
                <div class="card-body">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM tbl_user");
                    ?>

                    <div class="table-responsive">
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Email ID</th>
                                    <th>Mobile No</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($q)) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "<td>
                                                <a href='user_edit.php?x=$row[0]' class='btn btn-warning btn-sm'>Update</a>
                                                <a href='user_delete.php?x=$row[0]' class='btn btn-danger btn-sm'>Delete</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "order": [[0, 'asc']],  // Sorting by User ID (first column)
            "pageLength": 5,  // Set number of rows per page
            "responsive": true  // Makes the table responsive on smaller screens
        });
    });
</script>
