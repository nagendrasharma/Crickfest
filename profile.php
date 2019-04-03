<?php 
include('session.php');
include('con1.php');
$user_id=$_SESSION['user_id'];
$check_user_details=$mysqli->prepare("SELECT name,email FROM user_master WHERE user_id=?");
$check_user_details->bind_param("i",$user_id);
$check_user_details->execute();
$check_user_details->store_result();
$check_user_details_count=$check_user_details->num_rows;
if($check_user_details_count<=0){
    ?>
    <script type="text/javascript">
        alert('No Recored');
    </script>
    <?php
}else{
    $check_user_details->bind_result($name,$email);
    $check_user_details->fetch();
}
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
                                
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                            <h4 class="page-title">Profile</h4>
                        </div>
                        <!-- End page title box -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="example-email"  value="<?php echo $name?>" class="form-control" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" id="example-email" value="<?php echo $email?>"  class="form-control" placeholder="Enter Your Email">
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
    $name=$_POST['name'];
    $email=$_POST['email'];
    $updatetime=date("Y-m-d H:i:s");
    $update_profile=$mysqli->prepare("UPDATE user_master SET name=?,email=?,updatetime=? WHERE user_id=?");
    $update_profile->bind_param("sssi",$name,$email,$updatetime,$user_id);
    $update_profile->execute();
    $update_profile_count=$update_profile->num_rows;
    if($update_profile_count<=0){
        ?>
        <script type="text/javascript">
            alert('Profile Update Successfully');
            window.location.href="profile.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert('Profile Updated Unuccessfully');
            
        </script>
        <?php
    }
}
?>