<?php 
include('con1.php');
include('session.php');
$match_id=$_GET['match_id'];
$check_match=$mysqli->prepare("SELECT Match_Status,Opponent_1_score,Opponent_2_score FROM match_master WHERE Match_id=?");
$check_match->bind_param("i",$match_id);
$check_match->execute();
$check_match->store_result();
$check_match_count=$check_match->num_rows;
if($check_match_count<=0){
?>
<script type="text/javascript">
alert('No Record');
</script>
<?php
}else{
$check_match->bind_result($Match_Status,$Opponent_1_score,$Opponent_2_score);
$check_match->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Crickfest | Update Matches</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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

            <!-- Navigation Bar-->
           

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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Crickfest</a></li>
                                
                                <li class="breadcrumb-item active">Matches</li>
                            </ol>
                            <h4 class="page-title">Update Matches</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
							 <!--  <div class="card-title"><a href="create_player.php"><button>Create player</button></a></div>-->
                                <div class="card-box">
                                   <!-- <h4 class="header-title">Default Example</h4>-->
                                   

								   <form method="post" >

                                    <div class="form-group">
                                        <label>Match Status</label>
                                         <select class="form-control" name="match_status">
                                                <option value="" >Select</option>
                                                <option value="opponent_1_batting" <?php if($Match_Status=='opponent_1_batting'){ echo "selected";}?>>Opponent_1_Batting</option>
                                                <option value="opponent_2_batting"
                                                <?php if($Match_Status=='opponent_2_batting'){ echo "selected";}?>>Opponent_2_Batting</option>
                                                <option value="won_by_opponent1"
                                                <?php if($Match_Status=='won_by_opponent1'){ echo "selected";}?>>Won_By_Opponent1</option>
                                                <option value="won_by_opponent2"
                                                <?php if($Match_Status=='won_by_opponent2'){ echo "selected";}?>>Won_By_Opponent2</option>
                                                <option value="drawn"
                                                <?php if($Match_Status=='drawn'){ echo "selected";}?>>Drawn</option>
                                                <option value="cancelled"
                                                <?php if($Match_Status=='cancelled'){ echo "selected";}?>>Cancelled</option>
                                            </select>
                                       </div>

                                        <div class="form-group">
                                        <label>Opponent 1 Score</label>
                                         <input type="text" class="form-control" name="opponent_1_score" placeholder="Enter Opponent 1 Score" value="<?php echo $Opponent_1_score;?>">   
                                       </div>

    								   <div class="form-group">
                                        <label>Opponent 2 Score</label>
                                         <input type="text" class="form-control" name="opponent_2_score" placeholder="Enter Opponent 2 Score" value="<?php echo $Opponent_2_score;?>">   
                                       </div>
                                       
    								    <div class="form-group">
    								   <input type="submit" value="Update" name="save"/>
    								   </div>
								   </form>
        
                                </div> <!-- end card-box -->

                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                         <!-- end row -->

                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
            </div>
            <!-- End Page Content-->

<?php include('footer.php');?>
            <!-- Footer -->
            
            <!-- End Footer -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- End #wrapper -->

        <!-- jQuery  -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>

        <!-- Datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
        <!-- Key Tables -->
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <!-- Selection table -->
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>
<?php
if(isset($_POST['save'])){
    $Match_id=$_GET['match_id'];
    $Match_Status=$_POST['match_status'];
    $Opponent_1_score=$_POST['opponent_1_score'];
    $Opponent_2_score=$_POST['opponent_2_score'];
    $updatetime=date("Y-m-d H:i:s");
    $update_profile=$mysqli->prepare("UPDATE match_master SET Match_Status=?,Opponent_1_score=?,Opponent_2_score=?,updatetime=? WHERE Match_id=?");
    $update_profile->bind_param("ssssi",$Match_Status,$Opponent_1_score,$Opponent_2_score,$updatetime,$Match_id);
    $update_profile->execute();
    $update_profile_count=$update_profile->num_rows;
    if($update_profile_count<=0){
        ?>
        <script type="text/javascript">
            alert('Match Updated Successfully');
            window.location.href="update_match.php?match_id=<?php echo $Match_id;?>";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert('Match Updated Unsuccessfully');
            
        </script>
        <?php
    }
}
?>