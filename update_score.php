<?php 
include('con1.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Crickfest | Create Matches</title>
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
                                
                                <li class="breadcrumb-item active">Score</li>
                            </ol>
                            <h4 class="page-title">Update Score</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
							 <!--  <div class="card-title"><a href="create_player.php"><button>Create player</button></a></div>-->
                                <div class="card-box">
                                   <!-- <h4 class="header-title">Default Example</h4>-->
                                   

								   <form method="post" >

                                    <div class="form-group">
                                        <label>Opponent 1</label>
                                         <select class="form-control" name="op">
                                                <option value="" >Select</option>
                                                <?php
                                            $create_match=$mysqli->prepare("SELECT `team_id`, `Team_Name` FROM `team_master`");
                                            //$check_team->bind_param("i",$user_id);
                                            $create_match->execute();
                                            $create_match->store_result();
                                            $create_match_count=$create_match->num_rows;
                                            if($create_match_count<=0){
                                            ?>
                                            <script type="text/javascript">
                                            alert('No Recored');
                                            </script>
                                            <?php
                                            }else{
                                            $create_match->bind_result($team_id,$Team_Name);
                                            while($create_match->fetch()){
                                                ?>
                                                <option value="<?php echo $Team_Name;?>"><?php echo $Team_Name; ?></option>
                                                <?php
                                            }
                                            }

                                                ?>
                                            </select>
                                       </div>

                                       <div class="form-group">
                                        <label>Opponent 2</label>
                                         <select class="form-control" name="ot">
                                                <option value="" >Select</option>
                                                <?php
                                            $create_match=$mysqli->prepare("SELECT `team_id`, `Team_Name` FROM `team_master`");
                                            //$check_team->bind_param("i",$user_id);
                                            $create_match->execute();
                                            $create_match->store_result();
                                            $create_match_count=$create_match->num_rows;
                                            if($create_match_count<=0){
                                            ?>
                                            <script type="text/javascript">
                                            alert('No Recored');
                                            </script>
                                            <?php
                                            }else{
                                            $create_match->bind_result($team_id,$Team_Name);
                                            while($create_match->fetch()){
                                                ?>
                                                <option value="<?php echo $Team_Name;?>"><?php echo $Team_Name; ?></option>
                                                <?php
                                            }
                                            }

                                                ?>
                                            </select>
                                       </div>
                                       <div class="form-group">
                                        <label>Score1</label>
                                        <input type="text" class="form-control" name="Score1">
                                       </div>
                                       <div class="form-group">
                                        <label>Score2</label>
                                        <input type="text" class="form-control" name="Score2">
                                        </div>

                                        <div>
                                        <input type="submit" value="Add" name="save"/>
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

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable({
                    keys: true
                });

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'print']
                });

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
    </body>
</html>
<?php
if(isset($_POST['save'])){
    $op=$_POST['op'];
    $ot=$_POST['ot'];
    $Score1=$_POST['Score1'];
    $Score2=$_POST['Score2'];
    
    

    $create_match=$mysqli->prepare("INSERT INTO match_master(Opponent_1,Opponent_2,Score1,Score2) VALUES (?,?,?,?)");
    $create_match->bind_param("sssss",$op,$ot,$Score1,$Score2);
    $create_match->execute();
    $create_match_count=$create_match->num_rows;
    if($create_match_count<=0){
        ?>
        <script type="text/javascript">
            alert('Match Created Sucessfullly');
            window.location.href="create_matches.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert('Match Created Unsucessfully');  
        </script>
        <?php
    }
}
?>