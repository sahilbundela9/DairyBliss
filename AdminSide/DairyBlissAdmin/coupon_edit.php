<?php
    include('header.php');
    include('connect.php');

    $id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_coupon WHERE id = $id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnup'])) {
        $ctitle = mysqli_real_escape_string($conn, $_POST['txtctitle']);
        $ccode = mysqli_real_escape_string($conn, $_POST['txtccode']);
        $cdesc = mysqli_real_escape_string($conn, $_POST['txtcdesc']);
        $cdiscount = mysqli_real_escape_string($conn, $_POST['txtcdiscount']);
        $cmaxamt = mysqli_real_escape_string($conn, $_POST['txtcmaxamt']);
        $cpic = $_FILES['cpic']['name'];
        $dst = './images/' . $cpic;
        $q = mysqli_query($conn, "UPDATE tbl_coupon SET c_title='$ctitle', c_code='$ccode', c_desc='$cdesc', c_discount='$cdiscount', c_maxamt='$cmaxamt',c_pic='$cpic' WHERE id='$id'");

        if ($q) {
            move_uploaded_file($_FILES['cpic']['tmp_name'], $dst);
            echo "<script>window.location.href='coupon.php';</script>";
        } else {
            echo "<script>alert('Not Updated')</script>";
        }
    }
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Update Coupon</h2>
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="txtctitle">Enter Coupon Title:</label>
                    <input type="text" class="form-control" name="txtctitle" id="txtctitle" value="<?php echo $row['c_title']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Coupon Title.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtccode">Enter Coupon Code:</label>
                    <input type="text" class="form-control" name="txtccode" id="txtccode" value="<?php echo $row['c_code']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Coupon Code.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcdesc">Enter Coupon Description:</label>
                    <input type="text" class="form-control" name="txtcdesc" id="txtcdesc" value="<?php echo $row['c_desc']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Coupon Description.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcdiscount">Enter Coupon Discount:</label>
                    <input type="text" class="form-control" name="txtcdiscount" id="txtcdiscount" value="<?php echo $row['c_discount']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Coupon Discount.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcmaxamt">Enter Coupon Max Amount:</label>
                    <input type="text" class="form-control" name="txtcmaxamt" id="txtcmaxamt" value="<?php echo $row['c_maxamt']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Coupon Max Amount.
                    </div>
                </div>
                <div class="form-group">
                    <label for="cpic">Enter Coupon Image:</label><br>
                    <input type="file" class="form-control-file" name="cpic" id="cpic" required>
                    <div class="invalid-feedback">
                        Please upload an image for the Coupon.
                    </div>
                </div>

                <br><button type="submit" class="btn btn-primary" name="btnup">Update</button>
            </form>
        </div>
    </div>
</div>


