<?php 
// start session
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 3){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $id = $_SESSION['id'];

    $admin_info = $admin->scholarInfo($id);


} else {
    header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consuelo Chito Madrigal Foundation</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">CCMF</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <!-- DASHBOARD ICON -->
                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                  <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                 </svg>
                    <span class ="ml-2">Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="admin-application.php">
                <!-- SCHO TAB ICON -->
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                 </svg>
                 <span class ="ml-2">Scholars Tab</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="admin-application.php">
                    <!-- SCHO APP -->
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                 </svg>
                 <span class ="ml-2">Scholarship Application</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="renewal.php">
                    <!-- RENEW ICON -->
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                 <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                 <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                </svg>
                <span class ="ml-2">Renewal</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin-funds.php">
                    <!-- FUNDS ICON -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                  </svg>
                 <span class ="ml-2">Funds</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="schedule-task.php">
                    <!-- Sched int ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                     <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                     <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                 <span class="ml-2">Schedule Interview</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle"
                                    src="../Uploads_pic/<?php echo $admin_info[0]['id_pic']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <p class="h3 mb-0 font-weight-bold text-gray-800">Scholar Applicants</p>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-15 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Scholar Applicants</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <table id="applicant" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date Applied</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Details</th>
                                                <th scope="col">Files</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Analysis</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                        $applicantsData = $admin->getApplicants();
                                        $num = 1;
                                        foreach($applicantsData as $s){
                                            $id = $s['scholar_id'];
                                            $rate = $admin->getScheduleById($id);
                                            if($rate){
                                                if($rate['rate'] == 0){
                                                    $rate1 = 0;
                                                }else{
                                                    $rate1 = $rate['rate']; 
                                                }
                                            }else{
                                                $rate1 = 0;
                                            }
                                            $percentage = $admin->predictAcceptanceOfApplicant($s['gwa'], $rate1);
                                            if($s['status'] == 0){
                                                $status = "Pending";
                                            }else{
                                                $status = "Accepted";
                                            }
                                    ?>
                                            <tr>
                                                <th scope="col"><?php echo $num; ?></th>
                                                <td style="white-space: nowrap;"><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                                                <td style="white-space: nowrap;"><?php echo $s["email"];?></td>
                                                <td><?php echo $s["date_apply"];?></td>
                                                <td><?php echo $status;?></td>
                                                <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["scholar_id"];?>">Details</button></td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["scholar_id"];?>">Files</button></td>
                                                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $s["scholar_id"];?>">Remarks</button></td>
                                                <td><div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar bg-success" style="width: <?php echo $percentage;?>%"><?php echo $percentage;?>%</div></div></td>
                                                <td style="white-space: nowrap;">
                                                    <form method="post" action="../functions/scholar-accept.php">
                                                        <input class="btn btn-primary mb-2" type="submit" name="accept" value="Accept"><input type="hidden" name="acceptId" value="<?php echo $s['scholar_id']?>">
                                                    </form>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal<?php echo $s["scholar_id"];?>">Decline</button>

                                                    <!-- <form method="post" action="../functions/scholar-accept.php">
                                                        <input class="btn btn-danger" type="submit" value="decline"><input type="hidden" name="declineId" value="<?php echo $s['scholar_id']?>">
                                                    </form> -->
                                            </td>
                                            </tr>
                                            <?php 
                                        $num++;
                                            } 
                                        ?>
                                        </tbody>
                                    </table>
                                     
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-15 mb-4">

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="admin-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- Modal for Decline -->
<?php
$appliData = $admin->getApplicants();
foreach($appliData as $z){
?>
<div class="modal fade" id="declineModal<?php echo $z["scholar_id"];?>" tabindex="-1" aria-labelledby="declineModal<?php echo $z["scholar_id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModal<?php echo $z["scholar_id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/scholar-decline.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="declineId" value="<?php echo $z['scholar_id']?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

<!-- End -->
<!-- Modal for Remarks -->
<?php
$applicantss = $admin->getApplicants();
foreach($applicantss as $z){
    $id = $z["scholar_id"];
?>
            <div class="modal fade" id="remarks<?php echo $z["scholar_id"];?>" tabindex="-1" aria-labelledby="remarks<?php echo $z["scholar_id"];?>l" aria-hidden="true">
            <div class="modal-dialog" style="max-width:600px;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remarks<?php echo $z["scholar_id"];?>">Remarks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
                <table id="applicant-modal<?php echo $z["scholar_id"]?>" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Remarks</th>
                            </tr> 
                        </thead>
                        <?php 
                            $getRemarks = $admin->getRemarks($id);
                                if($getRemarks):
                                    $number = 1;
                                    foreach($getRemarks as $pogi):
                                        
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $pogi["remarks"];?></td>
                            </tr>
                        </tbody>
                                    <?php $number++; endforeach;?>
                        <?php else: ?>
                            <tbody>
                            <tr>
                                <td colspan="2"><center>No Remarks</center></td>
                            </tr>
                        </tbody>
                        <?php endif;?>
                    </table>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarksSend<?php echo $z["scholar_id"];?>" onclick="modal(<?php echo $z['scholar_id']; ?>)">Give Remarks</button>
                </div>
                </div>
            </div>
            </div>
<!-- End -->
<?php }?>

<?php
$applicantsss = $admin->getApplicants();
$num = 1;
foreach($applicantsss as $pogiko){
?>
<!-- Modal for Remarks Save-->
<div class="modal fade" id="remarksSend<?php echo $pogiko["scholar_id"];?>" tabindex="-1" aria-labelledby="remarksSend<?php echo $pogiko["scholar_id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="remarksSend<?php echo $pogiko["scholar_id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/remarks.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="scholar_id" value="<?php echo $pogiko['scholar_id']?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!-- End -->

<!-- Modal for Details -->

<?php
$appliData1 = $admin->getApplicants();
    foreach($appliData1 as $a){
?>
<div class="modal fade" id="detailsModal<?php echo $a["scholar_id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["scholar_id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="applicant-modal<?php echo $a["scholar_id"]?>" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?php echo $a["f_name"]." ".$a["l_name"];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $a["gender"];?></td>
                </tr>
                <tr>
                    <td>Civil Status</td>
                    <td><?php echo $a["cStatus"];?></td>
                </tr>
                <tr>
                    <td>Citizenship</td>
                    <td><?php echo $a["citizenship"];?></td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><?php echo $a["date_of_birth"];?></td>
                </tr>
                <tr>
                    <td>Place of Birth</td>
                    <td><?php echo $a["birth_place"];?></td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td><?php echo $a["religion"];?></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><?php echo $a["mobile_num"];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $a["email"];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $a["address"];?></td>
                </tr>
                <tr>
                    <td>Total Subject</td>
                    <td><?php echo $a["total_sub"];?></td>
                </tr>
                <tr>
                    <td>Total Units</td>
                    <td><?php echo $a["total_units"];?></td>
                </tr>
                <tr>
                    <td>General Weighted Average</td>
                    <td><?php echo $a["gwa"];?></td>
                </tr>
            </tbody>
        </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Modal end -->
<!-- Modal for Files -->
<?php
$appliData2 = $admin->getApplicants();
    foreach($appliData2 as $b){
?>
<div class="modal fade" id="filesModal<?php echo $b["scholar_id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["scholar_id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["scholar_id"];?>">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="applicant-modal<?php echo $b["scholar_id"]?>" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>Copy of Id</td>
                    <td><a href="../Uploads_pic/<?php echo $b["id_pic"]?>" target="_blank"><?php echo $b["id_pic"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Grades</td>
                    <td><a href="../Uploads_cog/<?php echo $b["copy_grades"]?>" target="_blank"><?php echo $b["copy_grades"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of PSA</td>
                    <td><a href="../Uploads_psa/<?php echo $b["psa"]?>" target="_blank"><?php echo $b["psa"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Good Moral</td>
                    <td><a href="../Uploads_gm/<?php echo $b["good_moral"]?>" target="_blank"><?php echo $b["good_moral"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Enrollment Form</td>
                    <td><a href="../Uploads_ef/<?php echo $b["e_Form"]?>" target="_blank"><?php echo $b["e_Form"]?></a></td>
                </tr>
            </tbody>
        </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Modal end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('status');
    console.log(successValue);

    if(successValue === "success"){
        Swal.fire({
            icon:'success',
            title:'Accepted',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }else if(successValue === "successDecline"){
        Swal.fire({
            icon:'error',
            title:'Declined',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }else if(successValue === "successRemarks"){
        Swal.fire({
            icon:'success',
            title:'Save Remarks Successfully!',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }

    $(document).ready(function() {
        $('#applicant').DataTable();

        $('#applicant').parent().parent().css('overflow', 'auto');
        $('#applicant').parent().parent().css('max-height', '500px');
    });

    function modal(id){
        $(document).ready(function() {
        $('#applicant'+id).DataTable();

        $('#applicant'+id).parent().parent().css('overflow', 'auto');
        $('#applicant'+id).parent().parent().css('max-height', '500px');
    });
    }

</script>
</body>

</html>