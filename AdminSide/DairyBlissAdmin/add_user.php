<?php
include('header.php');
include('connect.php');

if (isset($_POST['btnadd'])) {
    $uname= $_POST['txtuname'];
    $email= $_POST['txtemail'];
    $mobno= $_POST['txtmob'];
    $password= $_POST['txtpass'];
    $address= $_POST['txtadd'];
    $pincode= $_POST['txtpin'];
    $q = mysqli_query($conn, "INSERT INTO tbl_user VALUES('', '$uname','$email','$mobno','$password','$address','$pincode','')");

    if ($q) {
        echo "<script>alert('Inserted');
        window.location.href='user.php';</script>";
    } else {
        echo "<script>alert('Not Inserted')</script>";
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
            <br><h2 class="mb-4">Add User</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-group">
                    <label for="txtuname">Enter User Name:</label>
                    <input type="text" class="form-control" name="txtuname" id="txtuname" required><br>
                    <div class="invalid-feedback">
                        Please enter a User Name.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtemail">Enter Email:</label>
                    <input type="email" class="form-control" name="txtemail" id="txtemail" required><br>
                    <div class="invalid-feedback">
                        Please enter a Email.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtmob">Enter Mobile No:</label>
                    <input type="text" class="form-control" name="txtmob" id="txtmob" required><br>
                    <div class="invalid-feedback">
                        Please enter a Mobile No.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtpass">Enter Password:</label>
                    <input type="password" class="form-control" name="txtpass" id="txtpass" required><br>
                    <div class="invalid-feedback">
                        Please enter a Password.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtadd">Enter Address:</label>
                    <input type="text" class="form-control" name="txtadd" id="txtadd" required><br>
                    <div class="invalid-feedback">
                        Please enter a Address.
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtpin">Enter Pincode:</label>
                    <input type="text" class="form-control" name="txtpin" id="txtpin" required><br>
                    <div class="invalid-feedback">
                        Please enter a Pincode.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="btnadd">Add User</button>
            </form>
        </div>
    </div>
</div>

