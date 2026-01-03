<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" conntent="IE=edge">
    <meta name="viewport" conntent="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" conntent="">
    <meta name="author" conntent="">

    <title>DairyBliss</title>
    <link rel="shortcut icon" href="assets/images/rlogo.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  include('connect.php');
  include('header.php');
  ?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
                <!-- Begin Page conntent -->
                

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 2.5rem; font-weight: bold; color: #343a40; border-bottom: 4px solid #4e73df; padding-bottom: 5px;">
        Dashboard
    </h1>
</div>


                    <!-- conntent Row -->
                    <div class="row">

                        <!-- Total Category Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
    <a href="category.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right, #4e73df, #1cc88a); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            Category
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_category";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>



                        <!-- Total banner Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
    <a href="banner.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right,rgb(10, 213, 108),rgb(148, 200, 28)); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            Banner
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_banner";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>


                        <!-- user Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
    <a href="user.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right,rgb(184, 223, 78), #1cc88a); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            User
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_user";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>


                       
                       
                         <!--Coupon Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
    <a href="coupon.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right,rgb(224, 39, 39), #1cc88a); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            Coupon
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_coupon";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>




                         <!-- Product Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
    <a href="product.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right,rgb(223, 78, 201),rgb(188, 200, 28)); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            Product
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_product";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>



                         <!-- Order Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
    <a href="order.php" style="text-decoration: none;">
        <div class="card shadow h-100 py-2" style="background: linear-gradient(to right,rgb(223, 78, 93),rgb(143, 200, 28)); color: white; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                            Order
                        </div>
                        <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                            <p>
                                <?php
                                $sql = "SELECT * FROM tbl_order";
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>




                         
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card shadow h-100 py-2" style="background: linear-gradient(to right, #f6c23e,rgb(244, 114, 0));">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-uppercase mb-2" style="font-size: 1.7rem; color: black;">
                        Revenue
                    </div>
                    <div class="h5 mb-0 font-weight-bold" style="font-size: 1.7rem; color: black;">
                        <?php
                        // Check database connection
                        if (!$conn) {
                            die("Database connection failed: " . mysqli_connect_error());
                        }

                        // SQL Query to fetch total revenue
                        $sql = "SELECT SUM(tot_amount) AS tot_amount FROM tbl_order WHERE status != 0";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query executed successfully
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $total_revenue = $row['tot_amount'] ?? 0;
                            echo "₹" . number_format($total_revenue, 2);
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            



    <?php
     
    // Run the query and handle errors
    $q = mysqli_query($conn, "SELECT * FROM tbl_order ORDER BY id ASC LIMIT 5");

    if (!$q) {
        die("Query Failed: " . mysqli_error($conn));  // Display MySQL error if query fails
    }
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 95%;""> <!-- Adjust width as needed -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Recent Orders</h4>
            <a href="order.php" class="btn btn-primary">View All Orders</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Payment Mode</th>
                            <th>Address</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($q)) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['pname']) . "</td>";
                            echo "<td><img src='./images/" . htmlspecialchars($row['pic1']) . "' alt='Image' width='50'></td>";
                            echo "<td>₹" . htmlspecialchars($row['amount']) . "</td>";
                            echo "<td>₹" . htmlspecialchars($row['tot_amount']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['c_discount']) . "%</td>";
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
            Showing the latest 5 orders
        </div>
    </div>
</div>





    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


    </div>
    </div>

</body>

</html>