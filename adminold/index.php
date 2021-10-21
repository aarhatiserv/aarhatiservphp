<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('config/config.php');



if (isset($_SESSION['email'])) {
    header("Location: blog.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>FORM</title>
    <!-- style started -->
    <?php include('layout/style.php'); ?>
    <!-- style ends here -->

    <!-- custom css-->
    <link href="<?= $base_url ?>assets\css\index.css" rel="stylesheet">


</head>

<body>
    <div class="container mt-5">

        <!--sign-up-->
        <div class="row justify-content-center">
            <div class="col-md-5  sign-up">
                <div class="panel">
                    <div class="panel-heading">

                        <h3 class="panel-title text-center">SIGN UP</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" id="signup-form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="FullName"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-earphone"></span>
                                    </div>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        placeholder="Mobile Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" class="form-control" id="pass" name="pass"
                                        placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" class="form-control" id="cpasswd" name="cpasswd"
                                        placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="REGISTER" id="signup" class="btn  btn-block" required>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top:1px solid #888; padding-top:15px; font-size:85%">
                                        Already have account!
                                        <a href="#" onclick="$('.sign-up').hide(); $('.sign-in').show()">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--sign-IN-->
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 sign-in ">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center font-weight-bold">SIGN IN</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" id="signin-form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input type="text" class="form-control" id="uemail" name="uemail"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" class="form-control" id="pwd" name="pwd"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label><input type="checkbox" name="remember-me" value=""> Remember me</label>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="LOGIN" id="signin" class="btn  btn-block">
                            </div>
                            <br>

                            <div class="form-group" style="border-top:1px solid #888; padding-top:15px; font-size:85%">
                                <div class="col-md-12 control">
                                    <div class="d-inline">
                                        Don't have an account?
                                        <a href="#" onclick="$('.sign-in').hide(); $('.sign-up').show()">Sign Up</a>
                                        <br>
                                        <a href="#" onclick="$('.sign-in').hide(); $('.forgot-pass').show()">Forgot
                                            Password</a>


                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--RECOVER YOUR PASSWORD-->
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 forgot-pass">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">RECOVER YOUR PASSWORD</h3>

                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" id="forgot-pass-form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon addon-dif-color">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input type="text" class="form-control" id="remail" name="remail"
                                        placeholder="EmailAddress">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="GENERATE NEW PASSWORD" id="reset" name="reset"
                                    class="btn  btn-block">
                            </div>
                            <div style="font-size:80%; padding-top:15px;">
                                <a href="#" onclick="$('.forgot-pass').hide(); $('.sign-in').show()">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- js started -->
    <?php include('layout/scripts.php'); ?>
    <!-- js ends here -->
</body>

</html>