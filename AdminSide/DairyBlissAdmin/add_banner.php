<?php
include('header.php');
include('connect.php');

if (isset($_POST['btnadd'])) {
    $bpic = $_FILES['bpic']['name'];
    $status= $_POST['status'];
    $dst = './images/' . $bpic;
    $st=1;

    if(strcasecmp($status,"on")==0){
            $st=1;
    }else{
        $st=0;
    }
    $q = mysqli_query($conn, "INSERT INTO tbl_banner VALUES('', '$bpic',$st)");

    if ($q) {
        move_uploaded_file($_FILES['bpic']['tmp_name'], $dst);
        echo "<script>alert('Inserted');
        window.location.href='banner.php';</script>";
    } else {
        echo "<script>alert('Not Inserted')</script>";
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
            <br><h2 class="mb-4">Add Banner</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="bpic">Enter Banner Image:</label><br><br>
                    <input type="file" class="form-control-file" name="bpic" id="bpic" required><br><br>
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

                <button type="submit" class="btn btn-primary" name="btnadd">Add Banner</button>
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>


