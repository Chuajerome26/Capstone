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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 28px; text-shadow: 4px 4px 4px #000;"> CCMFI</div>
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
            <a class="nav-link collapsed" href="admin-scholar.php">
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-announcement.php">
                    <!-- SCHOLAR TAB ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02
                2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06"/>
                </svg>
                    <span class="ml-2">Announcement</span>
                </a>
            </li>

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
                                < class="card-body">
                                    
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
                                                
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                        $applicantsData = $admin->getApplicants();
                                        $num = 1;
                                        foreach($applicantsData as $s){
                                            // $id = $s['id'];
                                            // $rate = $admin->getScheduleById($id);
                                            // if($rate){
                                            //     if($rate['rate'] == 0){
                                            //         $rate1 = 0;
                                            //     }else{
                                            //         $rate1 = $rate['rate']; 
                                            //     }
                                            // }else{
                                            //     $rate1 = 0;
                                            // }
                                            // $percentage = $admin->predictAcceptanceOfApplicant($s['gwa'], $rate1);
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
                                                <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["id"];?>">Details</button></td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["id"];?>">Files</button></td>
                                                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $s["id"];?>">Remarks</button></td>
                                                <td style="white-space: nowrap;">
                                                    <form method="post" action="../functions/scholar-accept.php">
                                                        <input class="btn btn-primary mb-2" type="submit" name="accept" value="Accept"><input type="hidden" name="acceptId" value="<?php echo $s['id']?>">
                                                    </form>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal<?php echo $s["id"];?>">Decline</button>
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
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-15 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Suggested Applicants</h6>
                                </div>
                                <div class="card-body">
                                <div class="container mt-6" style="max-height: 400px; overflow-y: auto;">
                                    <div class="row">
                                        <?php
                                        // Loop to generate 9 cards (3 cards per row, 3 rows)
                                            
                                            ?>
                                            <div class="col-sm-6 col-md-4 col-lg-4" style="margin-top: 20px;">
                                                <div class="card custom-card shadow p-3 mb-5 bg-body-tertiary rounded">
                                                    <div class="card-body d-flex flex-column align-items-center">
                                                        <div class="d-flex justify-content-center">
                                                            <img src="path/to/your/image.jpg" alt="Profile Picture" class="img-thumbnail rounded-circle" width="100" height="100">
                                                        </div>
                                                        <h5 class="card-title mt-3">First Name</h5>
                                                        <p class="card-text">Some quick example text to build on the card.</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-primary">Go somewhere</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        
                                        ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                    </div>
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
<div class="modal fade" id="declineModal<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="declineModal<?php echo $z["id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModal<?php echo $z["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/scholar-decline.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="declineId" value="<?php echo $z['id']?>">
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
    $id = $z["id"];
?>
            <div class="modal fade" id="remarks<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="remarks<?php echo $z["id"];?>l" aria-hidden="true">
            <div class="modal-dialog" style="max-width:600px;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remarks<?php echo $z["id"];?>">Remarks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
                <table id="applicant-modal-remarks" class="table table-striped table-hover">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarksSend<?php echo $z["id"];?>" onclick="modal(<?php echo $z['id']; ?>)">Give Remarks</button>
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
<div class="modal fade" id="remarksSend<?php echo $pogiko["id"];?>" tabindex="-1" aria-labelledby="remarksSend<?php echo $pogiko["id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="remarksSend<?php echo $pogiko["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/remarks.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="scholar_id" value="<?php echo $pogiko['id']?>">
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
        $count = 1;
?>
<div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="applicant-modal-details" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Name</td>
                    <td><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Nick Name</td>
                    <td><?php echo $a['nick_name'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Gender</td>
                    <td><?php echo $a["gender"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Age</td>
                    <td><?php echo $a['age'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Civil Status</td>
                    <td><?php echo $a["c_status"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Religion</td>
                    <td><?php echo $a['religion'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Citizenship</td>
                    <td><?php echo $a["citizenship"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Height</td>
                    <td><?php echo $a['height'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Birthday</td>
                    <td><?php echo $a["date_of_birth"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Weight</td>
                    <td><?php echo $a['weight'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Place of Birth</td>
                    <td><?php echo $a["b_place"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mobile Number</td>
                    <td><?php echo $a['mobile_number'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Email</td>
                    <td><?php echo $a["email"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Address</td>
                    <td><?php echo $a['address'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Province</td>
                    <td><?php echo $a["province"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Medical Condition</td>
                    <td><?php echo $a['med_condition'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Fb Link</td>
                    <td><?php echo $a["fb_link"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Skills</td>
                    <td><?php echo $a['skills'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Father Name</td>
                    <td><?php echo $a["father_name"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Father Age</td>
                    <td><?php echo $a['father_age'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Father Occupation</td>
                    <td><?php echo $a["father_occupation"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Father Income</td>
                    <td><?php echo $a['father_income'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mother Name</td>
                    <td><?php echo $a["mother_name"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mother Age</td>
                    <td><?php echo $a['mother_age'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mother Occupation</td>
                    <td><?php echo $a["mother_occupation"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mother Income</td>
                    <td><?php echo $a['mother_income'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Father Attained</td>
                    <td><?php echo $a["father_attained"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Mother Attained</td>
                    <td><?php echo $a['mother_attained'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Guardian</td>
                    <td><?php echo $a["guardian"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Guardian Contact</td>
                    <td><?php echo $a['guardian_contact'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Emergency Contact</td>
                    <td><?php echo $a["emergency_contact"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Guardian Relationship</td>
                    <td><?php echo $a['guardian_rs'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Elementary School</td>
                    <td><?php echo $a["e_school"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Elementary Average</td>
                    <td><?php echo $a['e_ave'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Elementary Achievements</td>
                    <td><?php echo $a["e_achievements"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Junior High School</td>
                    <td><?php echo $a['jh_school'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Junior High School Average</td>
                    <td><?php echo $a["jh_ave"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Junior High School Achievements</td>
                    <td><?php echo $a['jh_achievements'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Senior High School</td>
                    <td><?php echo $a["sh_school"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Senior High School Average</td>
                    <td><?php echo $a['sh_ave'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Senior High School Achievements</td>
                    <td><?php echo $a["sh_achievements"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Senior High School Course/Strand</td>
                    <td><?php echo $a['sh_course'];?></td>
                </tr>
                <tr>    
                    <td><?php echo $count++; ?></td>
                    <td>College School</td>
                    <td><?php echo $a["c_school"];?></td>
                    </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>College School Average</td>
                    <td><?php echo $a['c_ave'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>College School Achievements</td>
                    <td><?php echo $a["c_achievements"];?></td>
                    </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>College School Course</td>
                    <td><?php echo $a['c_course'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Did you apply for/ are you a recipient of another Scholarship?</td>
                    <td><?php echo $a["other_scho"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Type</td>
                    <td><?php echo $a['other_scho_type'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Coverage</td>
                    <td><?php echo $a["other_scho_coverage"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Status</td>
                    <td><?php echo $a['other_scho_status'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>How did you learn about CCMFI Scholarship?</td>
                    <td><?php echo $a["q1"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Why are you applying for this Scholarship?</td>
                    <td><?php echo $a['q2'];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Will you pursue your studies even without this Scholarship?</td>
                    <td><?php echo $a["apply_scho"];?></td>
                </tr>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>Explanation</td>
                    <td><?php echo $a['apply_scho_explain'];?></td>
                </tr>
            </tbody>
        </table>    
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $count++;} ?>
<!-- Modal end -->
<!-- Modal for Files -->
<?php
$appliData2 = $admin->getApplicants();
    foreach($appliData2 as $b){
        $appliFiles = $admin->getApplicantsFiles($b['id']);
?>
<div class="modal fade" id="filesModal<?php echo $b["id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:900px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["id"];?>">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="applicant-modal-files" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                    <th>First Evaluation</th>
                    <th>Last Evaluation</th>
                    <th>Remarks</th>
                </tr> 
            </thead>
            <form id="formRemarks" method="post" action="../functions/filesRemarks.php">
            <tbody>
                <?php foreach($appliFiles as $files){ ?>
                <tr>
                    <td><?php echo $files['requirement_name'];?></td>
                    <td><a href="../Scholar_files/<?php echo $files["file_name"]?>" target="_blank"><?php echo $files["file_name"]?></a></td>
                    <?php if($files["status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="1"></td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2" disabled></td>
                    <?php elseif($files["status"] == 1): ?>
                        <td align="center">Done</td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2"></td>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td align="center">Done</td>
                    <?php endif; ?>
                    <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks">
                        <input type="hidden" name="file_id" value="<?php echo $files['id']; ?>">
                    </td>

                </tr>
                <?php }?>
            </tbody>
        </table>   
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="scholar_id" value="<?php echo $b['id'] ?>">
        <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
        </form>
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
    }else if(successValue === "UpdatedRemarks"){
        Swal.fire({
            icon:'success',
            title:'Update Remarks!',
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

    $(document).ready(function() {
        $('#applicant1').DataTable();

        $('#applicant1').parent().parent().css('overflow', 'auto');
        $('#applicant1').parent().parent().css('max-height', '500px');
    });

    $(document).ready(function() {
        $('#applicant-modal-remarks').DataTable();

        $('#applicant-modal-remarks').parent().parent().css('overflow', 'auto');
        $('#applicant-modal-remarks').parent().parent().css('max-height', '500px');
    });
    
    $(document).ready(function() {
        $('#applicant-modal-details').DataTable();
        
        $('#applicant-modal-remarks').parent().parent().css('overflow', 'auto');
        $('#applicant-modal-remarks').parent().parent().css('max-height', '500px');
    });

    function modal(id){
        $(document).ready(function() {
        $('#applicant-modal'+id).DataTable();

        $('#applicant-modal'+id).parent().parent().css('overflow', 'auto');
        $('#applicant-modal'+id).parent().parent().css('max-height', '500px');
    });
    }

</script>
</body>

</html>