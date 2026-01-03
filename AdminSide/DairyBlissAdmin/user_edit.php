<?php
    include('header.php');
    include('connect.php');

    $id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnup'])) {
        $uname= $_POST['txtuname'];
        $email= $_POST['txtemail'];
        $mobno= $_POST['txtmob'];
        $pass= $_POST['txtpass'];
        $address= $_POST['txtadd'];
        $pincode= $_POST['txtpin'];
        $q = mysqli_query($conn, "UPDATE tbl_user SET username='$uname', email='$email', phone='$mobno', password='$pass', address='$address', pincode='$pincode', status='' WHERE id='$id'");

        if ($q) {
            echo "<script>alert('Updated')
            window.location.href='user.php';</script>";
        } else {
            echo "<script>alert('Not Updated')</script>";
        }
    }
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <br><h2 class="mb-4">Update User</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-group">
                    <label for="txtuname">Enter User Name:</label>
                    <input type="text" class="form-control" name="txtuname" id="txtuname" value="<?php echo $row['username']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a User Name.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtemail">Enter Email:</label>
                    <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php echo $row['email']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Email.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtmob">Enter Mobile No:</label>
                    <input type="text" class="form-control" name="txtmob" id="txtmob" value="<?php echo $row['phone']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Mobile No.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtpass">Enter Password:</label>
                    <input type="password" class="form-control" name="txtpass" id="txtpass" value="<?php echo $row['password']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Password.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtadd">Enter Address:</label>
                    <input type="text" class="form-control" name="txtadd" id="txtadd" value="<?php echo $row['address']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Address.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtpin">Enter Pincode:</label>
                    <input type="text" class="form-control" name="txtpin" id="txtpin" value="<?php echo $row['pincode']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a Pincode.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="btnup">Update</button>
            </form>
    </div>
</div>


