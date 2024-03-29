<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);


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
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets1/css/1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

    <style>
  .table {
    border: none; /* Remove border from the table */
  }

  .table th,
  .table td {
    border: none; /* Remove border from table cells */
  }
  .text-camel-case::first-letter {
        text-transform: uppercase; /* Convert the first letter of each word to uppercase */
    }
       /* Custom CSS to remove spacing between Splide slides */
       .splide__list {
            margin-right: 0; /* Remove right margin */
            padding-right: 0; /* Remove right padding */
        }
        .splide__slide {
            margin-right: 0; /* Remove right margin */
            padding-right: 0; /* Remove right padding */
        }
</style>
</head>

<div class="loader"></div>

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

            <?php if($_SESSION["user_type"] == 3):?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-account.php">
                    <!-- SCHO TAB ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                    </svg>
                <span class ="ml-2">Admin Accounts</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-viewlogs.php">
                    <!-- LOGS TAB ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                        <path d="M5 0h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v1h8V2a1 1 0 0 0-1-1H5zm0 2h6v1H5V3zm0 2h6v1H5V5zm8 7H3v1h10v-1zM3 9h10v1H3V9zm10-2H3v1h10V7z"/>
                    </svg>
                    <span class="ml-2">Admin logs</span>
                </a>
            </li>
            <?php endif; ?>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin_info[0]['l_name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../Scholar_files/<?php echo $admin_info[0]['pic']; ?>">
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


                <div class="hstack gap-3">
                <div class="p-2"><p class="h3 mb-0 font-weight-bold text-gray-800">Suggested Applicants</p></div>
                <div class="p-2 ms-auto">
                    <form action="../functions/download-applicant.php" method="post">
                        <button type="submit" class=" btn  btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> 
                            <div class="d-none d-sm-inline-block">Generate Report</div>
                        </button>
                    </form>
                </div>

                </div>
                    
                        
                       
                    

                                
                    <div class="container-fluid ">
    <div class="row no-gutters">
    <div class="col-sm-12">
        <div class="splide">
       
            <div class="splide__track">
                <div class="splide__list">
                    <?php
                    $applicantsData1 = $admin->getApplicants();
                    foreach($applicantsData1 as $applicant) {
                        $income = $applicant['father_income'] + $applicant['mother_income'];
                        $appliGrade = $admin->getGrade($applicant['id']);
                        $pic = $admin->getApplicants2x2($applicant['id']);
                        $prediction = $admin->predictAcceptanceOfApplicant($appliGrade[0]['average'], $income);

                        if($prediction <= 100 && $prediction >= 75) {
                    ?>
                    <div class="col-sm-4 splide__slide p-0 px-3 d-flex justify-content-center align-items-center">
                        <div class="card shadow ">
                            <div class="hstack gap-2">
                                
                            <img src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>" alt="Profile Picture" class="img-thumbnail rounded-circle ms-4" style="width: 60px; height: 60px;">
                           
                            <div class="p-2 ms-2s">
                                    <div class="text-camel-case" style="text-transform: lowercase;"><?php echo $applicant['f_name']; ?></div>
                                    <div class="text-muted"><small>Age: <?php echo $applicant['age']; ?></small></div>
                                    <div class="text-muted"><small>Percentage: <?php echo $prediction; ?></small></div>
                                </div>
                                <div class="p-2 ms-auto d-grid gap-2">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $applicant["id"];?>">Details</button>
                                    <form method="post" action="../functions/scholar-accept.php">
                                        <button class="btn btn-primary" type="submit" name="accept">Accept</button>
                                        <input type="hidden" name="acceptId" value="<?php echo $applicant['id']?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } else {
                            // If the prediction is not in the specified range, you can add an alternative action here
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-12 mb-4 p-2">
                            <div class="card shadow mb-4 ">
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
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["id"];?>"><i class="fa-solid fa-circle-info"></i></button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["id"];?>"><i class="fa-solid fa-file"></i></button>
                                             </td>
                                                <td class="d-flex gap-1" style="white-space: nowrap;">
                                                    <form method="post" action="../functions/scholar-accept.php">
                                                        <input class="btn btn-primary " type="submit" name="accept" value="Accept"><input type="hidden" name="acceptId" value="<?php echo $s['id']?>">
                                                    </form>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal<?php echo $s["id"];?>">Decline</button>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $s["id"];?>"><i class="fa-solid fa-comment text-white"></i></button>

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



        
<!-- Initialize Splide slider -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            perPage: 3,
            pagination: false,
            breakpoints: {
                992: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                }
            }
        }).mount();
    });
</script>
                    
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
  <div class="modal-dialog" style="max-width:8000px;">
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
foreach($applicantss as $z) {
    $id = $z["id"];
?>

<div class="modal fade" id="remarks<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="remarksTitle<?php echo $z["id"];?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksTitle<?php echo $z["id"];?>">Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-3 text-dark">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-11">
                            <?php 
                            $getRemarks = $admin->getRemarks($id);
                            if($getRemarks):
                                foreach($getRemarks as $pogi):
                                    if($pogi['remarks'] == 0){
                                        $remarks123 = 'Evaluate By';
                                    }else if($pogi['remarks'] == 1){
                                        $remarks123 = 'Schedule Interview for Initial - Evaluation Completed By';
                                    }else if($pogi['remarks'] == 2){
                                        $remarks123 = 'Schedule Interview for Final - Interview Completed By';
                                    }else if($pogi['remarks'] == 3){
                                        $remarks123 = 'Accepted By';
                                    }else if($pogi['remarks'] == 5){
                                        $remarks123 = 'Declined By';
                                    }
                            ?>
                            <div class="d-flex flex-row align-items-start mb-4">
                                <img class="img-thumbnail rounded-circle shadow border me-3" src="../images/logo.jpg" alt="avatar" width="50" height="55" />
                                <div class="card w-100 shadow">
                                    <div class="card-body p-4">
                                        <div class="">
                                            <h5><?php echo $remarks123;?> Admin</h5>
                                            <p class="small"><?php echo date('M d, Y', strtotime($pogi["date"])); ?></p>
                                            <p><?php echo nl2br($pogi["remarks_mess"]);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="alert alert-primary" role="alert">No Remarks</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarksSend<?php echo $z["id"];?>" onclick="modal(<?php echo $z['id']; ?>)">Give Remarks</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


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
        <label for="floatingTextarea">Comments</label>
            <textarea class="form-control" name="remarks" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          
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
        $pic1=$admin->getApplicants2x2($a['id']);
?>
<div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="row g-0 p-2">

                <div class="col-md-12 ">
                    
                    <div class="card shadow">

                        <div class="card-header">
                            <strong>Personal Information</strong>
                        </div>
                        <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                        <div class="d-flex justify-content-center">
                        <img src="../Scholar_files/<?php echo $pic1[0]['file_name'];?>" alt="Profile Picture" class="img-thumbnail rounded-circle shadow" width="150" height="150">
                        </div>

                    <h5 class="text-center mt-4"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></h5>
                        <div class="text-center text-muted"><?php echo $a["email"];?></div>
                        <div class="text-center text-muted"><?php echo $a['mobile_number'];?></div>
                        <div class="text-center text-muted"><?php echo $a["nick_name"];?></div>
                        <div class="text-center">
                        <a href="<?php echo $a["fb_link"];?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook text-primary fs-6 mt-1"></i> Facebook Link
                        </a>
                        </div>
                </div>

                      
                                <div class="col-md-8 d-flex justify-content-center align-items-center ">
                        <div class= "g-1 border-0">
                            <div class="row ">
                                
                            <div class="col-12 ">
                                <div class="row">
                                    <dt class="col-sm-3">Address:</dt>
                                    <dd class="col-sm-9"><?php echo $a['address'];?></dd>
                                </div>
                            </div>

                                
                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Date of Birth:</dt>
                                    <dd class="col-sm-6"><?php echo $a['date_of_birth'];?></dd>

                                    <dt class="col-sm-6 ">Birth Place:</dt>
                                    <dd class="col-sm-6"><?php echo $a['b_place'];?></dd>

                                    <dt class="col-sm-6 ">Citizenship:</dt>
                                    <dd class="col-sm-6"><?php echo $a['citizenship'];?></dd>

                                    <dt class="col-sm-6 ">Religion:</dt>
                                    <dd class="col-sm-6"><?php echo $a['religion'];?></dd>

                                    <dt class="col-sm-6 ">Province:</dt>
                                    <dd class="col-sm-6"><?php echo $a['province'];?></dd>        
                                </div>
                            </div>

                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Gender:</dt>
                                    <dd class="col-sm-6"><?php echo $a['gender'];?></dd>
                                    
                                    <dt class="col-sm-6 ">Civil Status:</dt>
                                    <dd class="col-sm-6"><?php echo $a['c_status'];?></dd>

                                    <dt class="col-sm-6 ">Age:</dt>
                                    <dd class="col-sm-6"><?php echo $a['age'];?></dd>
                                
                                    <dt class="col-sm-6 ">Height & Weight: </dt>
                                    <dd class="col-sm-6"><?php echo $a['height'];?> | <?php echo $a['weight'];?></dd>

                                    <dt class="col-sm-6 ">Medical Condition: </dt>
                                    <dd class="col-sm-6"><?php echo $a['med_condition'];?></dd>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <dt class="col-sm-3">Skills:</dt>
                                    <dd class="col-sm-9"><?php echo $a['skills'];?></dd>
                                </div>
                            </div>

                            </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


            <div class="col-md-12 mt-3 ">
            <div class="card border shadow">
            <div class="card-header">
                            <strong>Family Information</strong>
                        </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <h6>Father Details</h6>

                        <dl class="row">
                            <dt class="col-sm-5 ">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_name"];?></dd>


                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_occupation"];?></dd>

                            <dt class="col-sm-5">Monthly Income:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_income"];?></dd>

                            <dt class="col-sm-5">Age:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_age"];?></dd>

                            
                            <dt class="col-sm-5">Educational Attained:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_attained"];?></dd>
                        </dl>
                    </div>

                    <div class="col-md-6">
                        <dl class="row">
                        <h6 >Mother Details</h6>
                            <dt class="col-sm-5">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_name"];?></dd>


                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_occupation"];?></dd>

                            <dt class="col-sm-5">Monthly Income:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_income"];?></dd>

                            <dt class="col-sm-5">Age:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_age"];?></dd>

                            
                            <dt class="col-sm-5">Educational Attained:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_attained"];?></dd>
                        </dl>
                        </div>
                </div>

                <div class="col-md-12 border mt-3 mb-3"></div>

                <div class="row">
                    <div class="col-md-12">
                        <dl class="row">
                        <h6 >Guardian Details</h6>
                        <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian"];?></dd>


                            <dt class="col-sm-3">Contact No.:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian_contact"];?></dd>

                            <dt class="col-sm-3">Emergency Contact:</dt>
                            <dd class="col-sm-9"><?php echo $a["emergency_contact"];?></dd>

                            <dt class="col-sm-3">Relationship:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian_rs"];?></dd>

            
                        </dl> 
                        
            
                    </div>

                    <div class="col-md-12 border mt-3 mb-3"></div>  
                    <div class="col-md-12   " >
                        <h6>Sibling Details</h6>
                        <div class="table-responsive">
                        <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Occupation</th>
                                <th>Civil Status</th>
                                <th>Religion</th>
                                <th>Educational Attainment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sibling = $admin->getAllSibling($a['id']);
                                    foreach($sibling as $sb){
                                ?>
                                <tr>
                                    <td><?php echo $sb['name']; ?></th>
                                    <td><?php echo $sb['age']; ?></td>
                                    <td><?php echo $sb['occupation']; ?></td>
                                    <td><?php echo $sb['civil_status']; ?></td>
                                    <td><?php echo $sb['religion']; ?></td>
                                    <td><?php echo $sb['educational_attained']; ?></td>
                                </tr>
                                <?php }?>
                                
                                </tr>
                                
                                </tr>
                            </tbody>
                            </table>
    </div>
                    </div>
                </div>
    </div>
            </div>
        </div>

            <div class="col-md-6 mt-3 ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Academic Information</strong>
                        </div>

                <dl class="row ms-3">
                <h6 class="mt-3">Elementary School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3">
                <h6 >Junior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3" >
                <h6 >Senior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3">
                <h6 >College School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_achievements"];?></dd>
                        </dl>
                </div>

                    <div class="card-body">
                    </div>
                </div>


                <div class="col-md-6 mt-3 ">
                <div class="card border shadow" style="min-height: 635px;">
                <div class="card-header">
                            <strong>Incoming Freshment</strong>
                        </div>

                            <dl class="row mt-3 ms-3" >

                            <dt class="col-sm-12 ">Did you apply for / are you a recipient of another scholarship?:</dt>
                            <dd class="col-sm-12 mb-3"><?php echo $a["other_scho"];?></dd>

                            <?php if($a["other_scho"] == "yes"): ?>
                                <dt class="col-sm-12 ">Type:</dt>
                                <dd class="col-sm-12 mb-4 "><?php echo $a["other_scho_type"];?></dd>

                                <dt class="col-sm-12 ">Coverage</dt>
                                <dd class="col-sm-12 mb-4"><?php echo $a["other_scho_coverage"];?></dd>

                                <dt class="col-sm-12 ">Status:</dt>
                                <dd class="col-sm-12 mb-4"><?php echo $a["other_scho_status"];?></dd>
                            <?php else: endif;?>

                            <dt class="col-sm-12 ">How did you learn about CCMFI Schoolarship?</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["q1"];?></dd>

                            <dt class="col-sm-12 ">Why are you applying for this scholarship</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["q2"];?></dd>

                            <dt class="col-sm-12 ">Will you pursue your studies event without this scholarship?</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["apply_scho"];?></dd>

                            <dt class="col-sm-12">Explain your Answer:</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["apply_scho_explain"];?></dd>
            
                            </dl> 





            <div>
            </div>
    </div>

    
    </div>
    <div class="col-md-12  ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Grade Information</strong>
                        </div>
                        <div class="table-responsive">
                <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th >Subject</th>
                                <th>Unit</th>
                                <th>Grade</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php $gradeInfo = $admin->getAllGrade($a['id']);
                                    foreach($gradeInfo as $gi){
                                ?>
                                <tr>
                                <td><?php echo $gi['subject']; ?></th>
                                <td><?php echo $gi['unit']; ?></td>
                                <td><?php echo $gi['grade']; ?></td>
                                </tr>
                                <?php }?>
                                </tr>
                            </tbody>
                            </table>
                                    </div>

                </div>
            </div>

            <div class="col-md-12 mt-2 ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>School Choices Information</strong>
                        </div>
                        <div class="table-responsive">
                 <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th >School Name</th>
                                <th>Course/Degree Major</th>
                                <th>Entrance Exam Taken?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $choice = $admin->getAllChoice($a['id']);
                                    foreach($choice as $ce){
                                ?>
                                <tr>
                                <td><?php echo $ce['univ']; ?></th>
                                <td><?php echo $ce['course']; ?></td>
                                <td><?php echo $ce['entrance_exam']; ?>, <?php echo $ce['exam_taken']; ?></td>
                                </tr>
                                <?php }?>
                                
                                </tr>
                            </tbody>
                            </table>
                                    </div>
                </div>
            </div>

  </div>
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
        $appliFiles = $admin->getApplicantsFiles($b['id']);
?>
<div class="modal fade" id="filesModal<?php echo $b["id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" >
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
                <?php foreach($appliFiles as $files){
                    ?>
                <tr>
                    <td><?php echo $files['requirement_name']; ?></td>
                    <td><a href="../Scholar_files/<?php echo $files["file_name"]?>" target="_blank"><?php echo $files["file_name"]?></a></td>
                    <?php if($files["status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" id="<?php echo $files['id'];?>" value="1" onchange="toggleInput(this, '<?php echo $files['id'];?>_remarks')"></td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2" disabled></td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" required></td>
                    <?php elseif($files["status"] == 1): ?>
                        <td align="center">Done</td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2"></td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" disabled></td>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" disabled></td>
                    <?php endif; ?>
                        <td><input type="hidden" name="file_id" value="<?php echo $files['id']; ?>">
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
    <script src="../assets1/js/1.js"></script>       
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>    
    <script>
        function toggleInput(checkbox, inputId) {
            var inputField = document.getElementById(inputId);
            inputField.disabled = checkbox.checked;
            if (checkbox.checked) {
                inputField.removeAttribute("required"); // Remove the 'required' attribute when checkbox is checked
                inputField.value = ""; // Clear the input field when checkbox is checked
            } else {
                inputField.setAttribute("required", true); // Add the 'required' attribute back when checkbox is unchecked
            }
        }
    </script>
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

    // $(document).ready(function() {
    //     $('#applicant1').DataTable();

    //     $('#applicant1').parent().parent().css('overflow', 'auto');
    //     $('#applicant1').parent().parent().css('max-height', '500px');
    // });

    // $(document).ready(function() {
    //     $('#applicant-modal-remarks').DataTable();

    //     $('#applicant-modal-remarks').parent().parent().css('overflow', 'auto');
    //     $('#applicant-modal-remarks').parent().parent().css('max-height', '500px');
    // });
    
    // $(document).ready(function() {
    //     $('#applicant-modal-details').DataTable();
        
    //     $('#applicant-modal-remarks').parent().parent().css('overflow', 'auto');
    //     $('#applicant-modal-remarks').parent().parent().css('max-height', '500px');
    // });

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