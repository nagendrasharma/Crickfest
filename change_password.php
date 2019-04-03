<?php 
include('session.php');
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
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Icons css -->
        <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/dripicons/webfont/webfont.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <!-- build:css -->
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- endbuild -->

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
<?php 
include('header.php');
include('sidebar.php');
?>
            <!-- Page Content Start -->
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page title box -->
                        <div class="page-title-box">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                            <h4 class="page-title">Change Password</h4>
                        </div>
                        <!-- End page title box -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" id="example-email"  class="form-control" placeholder="Enter Your old password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="new" id="example-email" class="form-control" placeholder="Enter Your New Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="conf" id="example-email" value="" class="form-control"placeholder="Re-Enter Your New Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email"></label>
                                            <div class="col-sm-10">
                                               <button class="btn btn-block btn-success waves-effect waves-light" type="submit" name="save">Update</button>
                                            </div>
                                        </div>
                                        
                                        
                                    </form>
        
                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
            </div>
            <!-- Footer -->
            <?php include('footer.php');?>
        </div>
        <!-- End #wrapper -->
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
    $password=$_POST['password'];
    $new=$_POST['new'];
    $conf=$_POST['conf'];
    if($new==$conf){
        $user_id=$_SESSION['user_id'];
        $check_user_password=$mysqli->prepare("SELECT password FROM user_master WHERE password=? AND user_id=?");
        $check_user_password->bind_param("si",$password,$user_id);
        $check_user_password->execute();
        $check_user_password->store_result();
        $check_user_password_count=$check_user_password->num_rows;
        if($check_user_password_count<=0){
            ?>
            <script type="text/javascript">
                alert('your old password is worng');
            </script>
            <?php
        }else{
            $check_user_password->bind_result($get_password);
            $check_user_password->fetch();
            $updatetime=date("Y-m-d H:i:s");
            $update_password=$mysqli->prepare("UPDATE user_master SET password=?,updatetime=? WHERE user_id=?");
            $update_password->bind_param("ssi",$new,$updatetime,$user_id);
            $update_password->execute();
            $update_password_count=$update_password->num_rows;
            if($update_password_count<=0){
                ?>
                <script type="text/javascript">
                    alert('Password Updated Successfully');
                    window.location.href="change_password.php";
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert('Password Update Unuccessfully');
                </script>
                <?php
            }
        }
    }else{
        ?>
        <script type="text/javascript">
            alert('Please match new password and Confirm password');
        </script>
        <?php
    }
}
?>