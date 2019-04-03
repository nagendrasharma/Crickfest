<?php
session_start();
include('con1.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Crickfest</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/img1.jpg">

        <!-- Icons css -->
        <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/dripicons/webfont/webfont.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <!-- build:css -->
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- endbuild -->

    </head>

    <body class="bg-account-pages">

        <!-- Login -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <!-- Logo box-->
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.php" class="text-success">
                                                <span><img src="assets\images\img.jpg" alt="" height="100px" width="160px" ></span>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                        <form  method="post">
                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="font-weight-medium">Email address</label>
                                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                            </div>

                                            <div class="form-group mb-3">
                                                <a href="forget_password.php" class="text-muted float-right"><small>Forgot your password?</small></a>
                                                <label for="password" class="font-weight-medium">Password</label>
                                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="checkbox checkbox-info">
                                                    <input id="remember" type="checkbox">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row text-center">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-success waves-effect waves-light" type="submit" name="save">Sign In</button>
                                                </div>
                                            </div>
                                        </form> <!-- end form -->

                                                                            </div> <!-- end account-content -->

                                </div> <!-- end account-box -->
                            </div>
                            <!-- end account-page-->
                        </div>
                        <!-- end wrapper-page -->

                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- END HOME -->    


        <!-- jQuery  -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php
if(isset($_POST['save'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
   
    $check_login=$mysqli->prepare("SELECT user_id FROM user_master WHERE email=? AND password=?");
    $check_login->bind_param("ss",$email,$password);
    $check_login->execute();
    $check_login->store_result();
    echo $check_login_count=$check_login->num_rows;
    if($check_login_count<=0){
        ?>
        <script type="text/javascript">
            alert('Please Check Your Email Or Password');
        </script>
        <?php
    }else{
        $check_login->bind_result($user_id);
        $check_login->fetch();
        $_SESSION['user_id']=$user_id;
        ?>
        <script type="text/javascript">
            alert('Login Successfully');
            window.location.href="dashboard.php";
        </script>
        <?php
    }
}
?>
