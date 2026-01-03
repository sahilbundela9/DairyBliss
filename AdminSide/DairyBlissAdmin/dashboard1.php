<?php
    session_start();
    include("header.php");
    include("connect.php");
    
?>

<style>
    
    h4 {
        margin: 20;
        font-size: 20px;
        font-weight: bold;
    }

    p {
        font-size: 25px;
        font-weight: bold;
        margin: 5px 0;
    }
    .box1
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to left ,#D1F6FF ,#6BADCE);
    }
    .box2
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to left ,#F9E699 ,#FA9C1B);
    }
    .box3
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to right ,#CCB5FB ,#C4D8F3);
    }
    .box4
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to right ,#a8ff78 ,#78ffd6);
    }
    .box5
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to right ,#636363 ,#a2ab58);
    }
    .box6
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to right ,#ad5389 ,white);
    }
    .box7
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to left ,#a8c0ff ,#3f2b96);
    }
    .box8
    {
        width: 100%; /* Take full width inside col-md-3 */
        height: 130px;
        margin: 10px 0;
        display: flex;
        flex-direction: column;
        justify-conntent: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background:linear-gradient(to left ,#3a1c71 ,#d76d77,#ffaf7b);
    }

</style>

<body>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h4 class="mb-4 mt-2">
   Dashboard
</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box1">
                            <h4>Category</h4>
                            <p>
                                <?php
                                $q = mysqli_query($conn, "SELECT * FROM tbl_category");
                                $row = mysqli_num_rows($q);
                                echo $row;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box2">
                            <h4>Banner</h4>
                            <p>
                                <?php
                                $q1 = mysqli_query($conn, "SELECT * FROM tbl_banner");
                                $rowb = mysqli_num_rows($q1);
                                echo $rowb;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box3">
                            <h4>Products</h4>
                            <p>
                                <?php
                                $q1 = mysqli_query($conn, "SELECT * FROM tbl_product");
                                $rowb = mysqli_num_rows($q1);
                                echo $rowb;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box4">
                            <h4>Order</h4>
                            <p>
                                <?php
                                $q2 = mysqli_query($conn, "SELECT * FROM tbl_order");
                                $rowo = mysqli_num_rows($q2);
                                echo $rowo;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box5">
                            <h4>Users</h4>
                            <p>
                                <?php
                                $q = mysqli_query($conn, "SELECT * FROM tbl_user");
                                $row = mysqli_num_rows($q);
                                echo $row;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box7">
                            <h4>Coupon</h4>
                            <p>
                                <?php
                                $q1 = mysqli_query($conn, "SELECT * FROM tbl_coupon");
                                $rowb = mysqli_num_rows($q1);
                                echo $rowb;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box8">
                            <h4>Total Revenue</h4>
                            <p>
                                <?php
                                $q2 = mysqli_query($conn, "SELECT * FROM tbl_order");
                                $rowo = mysqli_num_rows($q2);
                                echo $rowo;
                                ?>
                            </p>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End page-conntent -->
        </div> <!-- End page-wrapper -->
    </div> <!-- End conntainer -->

<?php
include("footer.php");
?>
