<?php
include('header.php');
include('footer.php');
include('connect.php');

if (isset($_POST['btnadd'])) {
    $ptitle = $_POST['txtptitle'];
    $pdesc = $_POST['txtpdesc'];
    $price = $_POST['txtprice'];
    $pdis = $_POST['txtdis'];
    $pic1 = $_FILES['ppic1']['name'];
    $pic2 = $_FILES['ppic2']['name'];
    $pic3 = $_FILES['ppic3']['name'];
    $pic4 = $_FILES['ppic4']['name'];
    $pslife = $_POST['txtslife'];
    $pbname = $_POST['txtpbname'];
    $pweight = $_POST['txtpweight'];
    $pcate = $_POST['txtcat'];
    $ppop = $_POST['txtppop'];

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $dst1 = './images/' . $pic1;
    $dst2 = './images/' . $pic2;
    $dst3 = './images/' . $pic3;
    $dst4 = './images/' . $pic4;

    $query = "INSERT INTO tbl_product 
              VALUES ('','$ptitle', '$pdesc', '$price', '$pdis', '$pic1', '$pic2', '$pic3', '$pic4', '$pslife', '$pbname', '$pweight', '$pcate', '$ppop')";

    $q = mysqli_query($conn, $query);

    if ($q) {
        move_uploaded_file($_FILES['ppic1']['tmp_name'], $dst1);
        move_uploaded_file($_FILES['ppic2']['tmp_name'], $dst2);
        move_uploaded_file($_FILES['ppic3']['tmp_name'], $dst3);
        move_uploaded_file($_FILES['ppic4']['tmp_name'], $dst4);
        echo "<script>alert('Inserted'); window.location.href='product.php';</script>";
    } else {
        die("Error inserting record: " . mysqli_error($conn));
    }
}



?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
    <h2 class="mb-4">Add Product</h2>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtptitle">Product Title:</label>
                <input type="text" class="form-control" name="txtptitle" id="txtptitle" required>
                <div class="invalid-feedback">Please enter a Product Title.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpdesc">Product Description:</label>
                <input type="text" class="form-control" name="txtpdesc" id="txtpdesc" required>
                <div class="invalid-feedback">Please enter a Product Description.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtprice">Product Price:</label>
                <input type="text" class="form-control" name="txtprice" id="txtprice" required>
                <div class="invalid-feedback">Please enter a Product Price.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtdis">Product Discount:</label>
                <input type="text" class="form-control" name="txtdis" id="txtdis" required>
                <div class="invalid-feedback">Please enter a Product Discount.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="ppic1">Product Image 1:</label>
                <input type="file" class="form-control-file" name="ppic1" id="ppic1" required>
                <div class="invalid-feedback">Please upload an image.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="ppic2">Product Image 2:</label>
                <input type="file" class="form-control-file" name="ppic2" id="ppic2">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="ppic3">Product Image 3:</label>
                <input type="file" class="form-control-file" name="ppic3" id="ppic3">
            </div>

            <div class="col-md-6 form-group">
                <label for="ppic4">Product Image 4:</label>
                <input type="file" class="form-control-file" name="ppic4" id="ppic4">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtslife">Product Shelf Life:</label>
                <input type="text" class="form-control" name="txtslife" id="txtslife" required>
                <div class="invalid-feedback">Please enter a Shelf Life.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpbname">Brand Name:</label>
                <input type="text" class="form-control" name="txtpbname" id="txtpbname" required>
                <div class="invalid-feedback">Please enter a Brand Name.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtpweight">Product Weight:</label>
                <input type="text" class="form-control" name="txtpweight" id="txtpweight" required>
                <div class="invalid-feedback">Please enter the Weight.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpcate">Product Category:</label>
                <select name="txtcat" id="" class="form-control">
                <?php 
                $q=mysqli_query($conn,"select * from tbl_category");
                while($row=mysqli_fetch_array($q))
                {
                    echo "<option value=$row[1]>$row[1]</option>";
                }
            ?>
                </select>
                <div class="invalid-feedback">Please enter a Category.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtppop">Product Popularity:</label>
                <input type="text" class="form-control" name="txtppop" id="txtppop" required>
                <div class="invalid-feedback">Please enter Popularity.</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="btnadd">Add Product</button>
    </form>
    </div>
    </div>
</div>
