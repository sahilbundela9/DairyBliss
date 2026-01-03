<?php
    include('header.php');
    include('connect.php');

    $id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_category WHERE id = $id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnup'])) {
        $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
        $cat_pic = $_FILES['cat_pic']['name'];
        $dst = './images/' . $cat_pic;
        $q = mysqli_query($conn, "UPDATE tbl_category SET cat_name='$cat_name', cat_pic='$cat_pic' WHERE id='$id'");

        if ($q) {
            move_uploaded_file($_FILES['cat_pic']['tmp_name'], $dst);
            echo "<script>window.location.href='category.php';</script>";
        } else {
            echo "<script>alert('Not Updated')</script>";
        }
    }
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Update Category</h2>
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="txtcname">Enter Category Name:</label>
                    <input type="text" class="form-control" name="cat_name" id="txtcname" value="<?php echo $row['cat_name']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a category name.
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpic">Enter Category Image:</label><br>
                    <input type="file" class="form-control-file" name="cat_pic" id="cpic" required>
                    <div class="invalid-feedback">
                        Please upload an image for the category.
                    </div>
                </div>

                <br><button type="submit" class="btn btn-primary" name="btnup">Update</button>
            </form>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
