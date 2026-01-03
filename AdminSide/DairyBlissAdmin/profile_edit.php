<?php
    include('header.php');
    include('connect.php');

    $id = $_GET['x'];
    $q = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id = $id");
    $row = mysqli_fetch_array($q);

    if (isset($_POST['btnup'])) {
        $uname= $_POST['txtuname'];
        $pass= $_POST['txtpass'];
        $email= $_POST['txtemail'];
        $mobno= $_POST['txtmob'];
        $address= $_POST['txtadd'];
        $pincode= $_POST['txtpin'];
        $q = mysqli_query($conn, "UPDATE tbl_admin SET username='$uname', email='$email', phone='$mobno', password='$pass', address='$address', pincode='$pincode', status='' WHERE id='$id'");

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
            <br><h2 class="mb-4">Edit Profile</h2>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-group">
                    <label for="txtuname">Enter User Name:</label>
                    <input type="text" class="form-control" name="txtuname" id="txtuname" value="<?php echo $row['username']; ?>" required><br>
                    <div class="invalid-feedback">
                        Please enter a User Name.
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
                
                <div class="form-group mb-2">
                                            <select name="role" id="" class="form-control" >
                                                <option value="" placeholder="" disabled selected>Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Super Admin">Super Admin</option>
                                                </select>
                                            <!-- <input type="text" class="form-control" id="security" name="security" style="height:50px"   placeholder="Security Question">                                -->
                                        </div>
                                        <div class="form-group mb-2">
                                            <select name="que" id="" class="form-control" >
                                                <option value="" placeholder="" disabled selected>Select Question</option>
                                                <option value="What is the name of the first school you attended?">What is the name of the first school?</option>
                                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                                <option value="What is your favorite movie of all time?">What is your favorite movie of all time?</option>
                                                <option value="What is your favorite game of all time?">What is your favorite game of all time?</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="security" name="security" style="height:50px"   placeholder="Security Question">                                -->
                                        </div>
                                        <div class="form-group mb-2">
                                        
                                        <input type="text" class="form-control" id="answer" name="ans" placeholder="Enter answer">                               
                                    </div>
                <button type="submit" class="btn btn-primary" name="btnup">Edit Profile</button>
            </form>
    </div>
</div>
</div>