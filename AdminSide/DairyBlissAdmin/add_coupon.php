<?php
include('header.php');
include('connect.php');

if (isset($_POST['btnadd'])) {
    $ctitle = $_POST['txtctitle'];
    $ccode = $_POST['txtccode'];
    $cdesc = $_POST['txtcdesc'];
    $cdiscount = $_POST['txtcdiscount'];
    $cmaxamt = $_POST['txtcmaxamt'];
    $cpic = $_FILES['cpic']['name'];
    $dst = './images/' . $cpic;
    $q = mysqli_query($conn, "INSERT INTO tbl_coupon VALUES('', '$ctitle', '$ccode', '$cdesc', '$cdiscount', '$cmaxamt','$cpic')");

    if ($q) {
        move_uploaded_file($_FILES['cpic']['tmp_name'], $dst);
        echo "<script>alert('Inserted');
        window.location.href='coupon.php';</script>";
    } else {
        echo "<script>alert('Not Inserted')</script>";
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Add Coupon</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="txtctitle">Enter Coupon Title:</label>
                    <input type="text" class="form-control" name="txtctitle" id="txtctitle" required>
                    <div class="invalid-feedback">
                        Please enter a Coupon Title.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtccode">Enter Coupon Code:</label>
                    <input type="text" class="form-control" name="txtccode" id="txtccode" required>
                    <div class="invalid-feedback">
                        Please enter a Coupon Code.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcdesc">Enter Coupon Description:</label>
                    <input type="text" class="form-control" name="txtcdesc" id="txtcdesc" required>
                    <div class="invalid-feedback">
                        Please enter a Coupon Description.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcdiscount">Enter Coupon Discount:</label>
                    <input type="text" class="form-control" name="txtcdiscount" id="txtcdiscount" required>
                    <div class="invalid-feedback">
                        Please enter a Coupon Discount.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtcmaxamt">Enter Coupon Max Amount:</label>
                    <input type="text" class="form-control" name="txtcmaxamt" id="txtcmaxamt" required>
                    <div class="invalid-feedback">
                        Please enter a Coupon Max Amouunt.
                    </div>
                </div>
                <div class="form-group">
                    <label for="cpic">Enter Coupon Image:</label><br><br>
                    <input type="file" class="form-control-file" name="cpic" id="cpic" required><br><br>
                    <div class="invalid-feedback">
                        Please upload an image for the Coupon.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="btnadd">Add Coupon</button>
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
