<?php
include('header.php');
include('connect.php');

$id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_product WHERE pid = $id");
    $row = mysqli_fetch_array($q);

if (isset($_POST['btnup'])) {
    $ptitle = $_POST['txtptitle'];
    $pdesc = $_POST['txtpdesc'];
    $price = $_POST['txtprice'];
    $pdis = $_POST['txtdis'];
    $ppic1 = $_FILES['ppic1']['name'];
    $ppic2 = $_FILES['ppic2']['name'];
    $ppic3 = $_FILES['ppic3']['name'];
    $ppic4 = $_FILES['ppic4']['name'];
    $pslife = $_POST['txtslife'];
    $pbname = $_POST['txtpbname'];
    $pweight = $_POST['txtpweight'];
    $pcate = $_POST['txtpcate'];
    $ppop = $_POST['txtppop'];

    $dst1 = './images/' . $ppic1;
    $dst2 = './images/' . $ppic2;
    $dst3 = './images/' . $ppic3;
    $dst4 = './images/' . $ppic4;



    $q = mysqli_query($conn, "UPDATE tbl_product SET ptitle='$ptitle', pdesc='$pdesc', pprice='$price', pdiscount='$pdis', pic1='$ppic1' , pic2='$ppic2', pic3='$ppic3', pic4='$ppic4', shelflife='$pslife', brandname='$pbname', weight1='$pweight', category='$pcate', popular='$ppop' WHERE pid='$id'");



    if ($q) {

        move_uploaded_file($_FILES['ppic1']['tmp_name'], $dst1);
        move_uploaded_file($_FILES['ppic2']['tmp_name'], $dst2);
        move_uploaded_file($_FILES['ppic3']['tmp_name'], $dst3);
        move_uploaded_file($_FILES['ppic4']['tmp_name'], $dst4);
        echo "<script>alert('Updated')</script>";
        echo "<script>window.location.href='product.php';</script>";
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
<div class="container">

    <br><h2 class="mb-4">Update Product</h2>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtptitle">Product Title:</label>
                <input type="text" class="form-control" name="txtptitle" id="txtptitle" value="<?php echo $row[1]; ?>" >
                <div class="invalid-feedback">Please enter a Product Title.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpdesc">Product Description:</label>
                <input type="text" class="form-control" name="txtpdesc" id="txtpdesc" value="<?php echo $row[2]; ?>" >
                <div class="invalid-feedback">Please enter a Product Description.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtprice">Product Price:</label>
                <input type="text" class="form-control" name="txtprice" id="txtprice" value="<?php echo $row[3]; ?>">
                <div class="invalid-feedback">Please enter a Product Price.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtdis">Product Discount:</label>
                <input type="text" class="form-control" name="txtdis" id="txtdis" value="<?php echo $row[4]; ?>" >
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
                <input type="text" class="form-control" name="txtslife" id="txtslife" value="<?php echo $row[9]; ?>" >
                <div class="invalid-feedback">Please enter a Shelf Life.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpbname">Brand Name:</label>
                <input type="text" class="form-control" name="txtpbname" id="txtpbname" value="<?php echo $row[10]; ?>" >
                <div class="invalid-feedback">Please enter a Brand Name.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtpweight">Product Weight:</label>
                <input type="text" class="form-control" name="txtpweight" id="txtpweight" value="<?php echo $row[11]; ?>" >
                <div class="invalid-feedback">Please enter the Weight.</div>
            </div>

            <div class="col-md-6 form-group">
                <label for="txtpcate">Product Category:</label>
                <input type="text" class="form-control" name="txtpcate" id="txtpcate" value="<?php echo $row[12]; ?>" >
                <div class="invalid-feedback">Please enter a Category.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="txtppop">Product Popularity:</label>
                <input type="text" class="form-control" name="txtppop" id="txtppop" value="<?php echo $row[13]; ?>" >
                <div class="invalid-feedback">Please enter Popularity.</div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary mt-3" value="Update" name="btnup"></input>
    </form>
</div>
</div>
</div>



<?php
include('footer.php');
?>
