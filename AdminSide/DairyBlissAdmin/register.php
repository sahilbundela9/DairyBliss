<?php
    include("connect.php");
    include("header.php");
    if(isset($_POST["btnsub"]))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $role=$_POST['role'];
        $que=$_POST['que'];
        $ans=$_POST['ans'];
        $q=mysqli_query($conn,"insert into tbl_admin values('','$username','$password','$email','$mobile','$role','$que','$ans')");
        if($q)
        {
            echo "<script>alert('Register')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    }    
?>



<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

    
<!-- Mirrored from mannatthemes.com/approx/default/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2024 05:24:45 GMT -->
<head>
        

        <meta charset="utf-8" />
                <title>Register | DairyBliss - Admin</title>
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
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Create an account</h4>   
                                        <p class="fw-medium mb-0" style="color: white;">Enter your detail to Create your account today.</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-4" method="post">            
                                        <div class="form-group mb-2">
                                            
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">                               
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            
                                            <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-2">
                                                                                      
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                                                                       
                                            <input type="password" class="form-control" name="password" id="Confirmpassword" placeholder="Enter Confirm password">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            
                                            <input type="text" class="form-control" id="mobileNo" name="mobile" placeholder="Enter Mobile Number">                               
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
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-3">
                                            <div class="col-12">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                    <label class="form-check-label" for="customSwitchSuccess">By registering you agree to the Approx <a href="#" class="text-primary">Terms of Use</a></label>
                                                </div>
                                            </div><!--end col--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <input class="btn btn-primary" name="btnsub" type="submit">Sign Up <i class="fas fa-sign-in-alt ms-1"></i></input>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <div class="text-center">
                                        <p class="text-muted">Already have an account ?  <a href="login.php" class="text-primary ms-2">Sign in</a></p>
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

<!-- Mirrored from mannatthemes.com/approx/default/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2024 05:24:45 GMT -->
</html>