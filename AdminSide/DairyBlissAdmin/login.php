<?php 
    session_start();
    include("connect.php");
    if(isset($_POST['btnsub']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $q=mysqli_query($conn,"select * from tbl_admin where username='$username' and password='$password'");
        $cnt=mysqli_num_rows($q);
        $row=mysqli_fetch_array( $q );
        if($cnt>=1)
        {
            $_SESSION['x']=$row['username'];
            echo "<script>window.location.href='dashboard.php';</script>";
        }
        else
        {
            echo "<script>alert('Password Or Username Does Not Match')</script>";
        }

    }



?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

    
<!-- Mirrored from mannatthemes.com/approx/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2024 05:24:10 GMT -->
<head>
        

        <meta charset="utf-8" />
                <title>Login | DairyBliss - Admin Side</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="assets/images/rlogo.png">

       
         <!-- App css -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
         <style>
        #bg
        {
            background-color:rgb(53, 53, 53);
        }

    </style>

    </head>
    

    
    <!-- Top Bar Start -->
    <body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box rounded-top" id="bg">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/rlogo.png" height="80" alt="logo" class="auth-logo rounded-circle">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Let's Get Started DairyBliss</h4>   
                                        <p class="fw-medium mb-0" style="color: white;">Sign in to continue to DairyBliss.</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0" id="back">                                    
                                    <form class="my-4" method="post">            
                                        <div class="form-group mb-2">
                                        <label class="form-label" for="Email">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>                                            
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">                            
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                    <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-sm-6 text-end">
                                                <a href="forgetpass.php" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                            </div><!--end col--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <input class="btn btn-primary" type="submit" name="btnsub">Sign In <i class="fas fa-sign-in-alt ms-1"></i></input>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-md bg-blue-subtle text-blue rounded-circle me-2">
                                            <i class="fab fa-facebook align-self-center"></i>
                                        </a>
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-md bg-info-subtle text-info rounded-circle me-2">
                                            <i class="fab fa-twitter align-self-center"></i>
                                        </a>
                                        <a href="#" class="d-flex justify-content-center align-items-center thumb-md bg-danger-subtle text-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
                                        </a>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->                                        
    </div><!-- container -->
    </body>
    <!--end body-->

<!-- Mirrored from mannatthemes.com/approx/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2024 05:24:10 GMT -->
</html>