<?php
include('header.php');
include('connect.php');

if (isset($_POST['btnadd'])) {
    $cname = $_POST['txtcname'];
    $cpic = $_FILES['cpic']['name'];
    $dst = './images/' . $cpic;
    $q = mysqli_query($conn, "INSERT INTO tbl_category VALUES('', '$cname', '$cpic')");

    if ($q) {
        move_uploaded_file($_FILES['cpic']['tmp_name'], $dst);
        echo "<script>alert('Inserted');
        window.location.href='category.php';</script>";
    } else {
        echo "<script>alert('Not Inserted')</script>";
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Add Category</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="txtcname">Enter Category Name:</label>
                    <input type="text" class="form-control" name="txtcname" id="txtcname" required>
                    <div class="invalid-feedback">
                        Please enter a category name.
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpic">Enter Category Image:</label><br><br>
                    <input type="file" class="form-control-file" name="cpic" id="cpic" required><br><br>
                    <div class="invalid-feedback">
                        Please upload an image for the category.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="btnadd">Add Category</button>
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
