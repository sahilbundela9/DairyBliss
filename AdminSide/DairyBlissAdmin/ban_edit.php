<?php
    include('header.php');
    include('connect.php');

    $id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_banner WHERE id = $id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnup'])) {
        $ban_pic = $_FILES['ban_pic']['name'];
        $status= $_POST['status'];
        $dst = './images/' . $ban_pic;
        $st=1;
        if(strcasecmp($status,"on")==0){
            $st=1;
        }else{
            $st=0;
        }
        $q = mysqli_query($conn, "UPDATE tbl_banner SET pic='$ban_pic', status='$st' WHERE id='$id'");

        if ($q) {
            move_uploaded_file($_FILES['ban_pic']['tmp_name'], $dst);
            echo "<script>window.location.href='banner.php';</script>";
        } else {
            echo "<script>alert('Not Updated')</script>";
        }
    }
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Update Banner</h2>
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="bpic">Enter Banner Image:</label><br>
                    <input type="file" class="form-control-file" name="ban_pic" id="bpic" required>
                    <div class="invalid-feedback">
                        Please upload an image for the Banner.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtstatus">Enter Status:</label>
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                </div>
                </div>

                <br><button type="submit" class="btn btn-primary" name="btnup">Update</button>
            </form>
        </div>
    </div>
</div>


