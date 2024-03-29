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

    $initialInterview = $admin->getInitialInterviews();
    
    if($initialInterview["hasData"]){
        $initialInterview1 = $initialInterview["data"];
    }else{
        $initialInterview1 = [];
    }

    $finalInterview = $admin->getFinalInterviews();

    if($finalInterview["hasData"]){
        $finalInterview1 = $finalInterview["data"];
    }else{
        $finalInterview1 = [];
    }
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

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets1/css/1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="loader"></div>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <li class="nav-item">
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

            <li class="nav-item active">
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
                        <p class="h3 mb-0 font-weight-bold text-gray-800">Interviews</p>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                
                    <ul class="nav nav-underline">
                    <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#" onclick="showTab('initial-interview')">Initial Interview</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showTab('final-interview')">Final Interview</a>
                    </li>
                
                    </li>
                    </ul>



                    <!-- Content Row -->

                    <div class="row">
    <!-- Area Chart -->
                    <div  id="initial-interview-card" class="col-lg-12 mb-4 mt-3">
                        <div class="card shadow mb-4 ">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Initial Interview</h6>
                            </div>
                            <div class="card-body">
                                <div class="container mt-6" style="max-height: 400px; overflow-y: auto;">
                                    <div class="row">
                                        <?php
                                        // Initialize an array to keep track of displayed dates
                                        $displayedDates = [];

                                    if($initialInterview["hasData"]){
                                        foreach ($initialInterview1 as $it) {
                                            $date = $it['date'];
                                            $dateTime = new DateTime($date);
                                            $formattedDate = $dateTime->format("F j, Y");
                                            // Check if the date has already been displayed
                                            if (!in_array($date, $displayedDates)) {
                                                // Add the date to the list of displayed dates
                                                $displayedDates[] = $date;
                                                ?>
                                                
                                                <div class="col-4">

                                                    <div class="card" style="width: 22rem;">
                                                    <div class="hstack gap-1 d-flex align-items-center ms-4 mt-1">
                                                        <div class="p-1 text-center"><i class="fa-regular fa-calendar-days fs-2"></i></div>
                                                        <div class="ms-2">
                                                            <div ><strong>Wednesday</strong></div> 
                                                            <div><small class="text-muted"><?php echo $formattedDate; ?></small></div>
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="card border mt-2 mb-2"></div>

                                                        <div class="card-body " style="max-height: 200px; overflow-y: auto; min-height: 180px;">


                                                    <div class="scrollable-content">
                                                            <?php
                                                            // Loop to display data entries with the same date within the same card
                                                            foreach ($initialInterview1 as $entry) { 
                                                                if ($entry['date'] == $date) {
                                                                    if($admin->checkIfApplicant($entry['scholar_id'])){
                                                                        $info = $admin->getApplicantById($entry['scholar_id']);
                                                                    ?>
                                                                    <li class="card-text ms-3"><?php echo $info[0]['f_name']." ".$info[0]['l_name']; ?></li>
                                                                    <?php
                                                                    }else{
                                                                        $admin->deleteApplicantInterview($entry['id']);
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                          <!-- Add more content if needed -->
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-light border-0 d-flex gap-1">

                                                <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $it["id"];?>">View</button>
                                                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#editInitialModal<?php echo $it["date"];?>">Edit</button>


                                            </div>
                                            </div>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }else{
                                        ?>
                                        
                                        <div class="alert alert-primary text-center" role="alert">
                                            No Interview for now.
                                            </div>
                                        
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                

                
                    <!-- Area Chart -->
                    <div id="final-interview-card" class="col-lg-12 mb-4 mt-3 " style="display: none;">
                        <div class="card shadow mb-4 ">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Final Interview</h6>
                            </div>
                            <div class="card-body">
                                <div class="container mt-6" style="max-height: 400px; overflow-y: auto;">
                                    <div class="row g-1">
                                    <?php
                                        // Initialize an array to keep track of displayed dates
                                        $displayedDates = [];

                                    if($finalInterview["hasData"]){
                                        foreach ($finalInterview1 as $final) {
                                            $date = $final['date'];
                                            $dateTime = new DateTime($date);
                                            $formattedDate = $dateTime->format("F j, Y");
                                            // Check if the date has already been displayed
                                            if (!in_array($date, $displayedDates)) {
                                                // Add the date to the list of displayed dates
                                                $displayedDates[] = $date;
                                                ?>
                                                
                                                    <div class="col-4">

                                                    <div class="card" style="width: 22rem;">
                                                    <div class="hstack gap-1 d-flex align-items-center ms-4 mt-1">
                                                        <div class="p-1 text-center"><i class="fa-regular fa-calendar-days fs-2"></i></div>
                                                        <div class="ms-2">
                                                            <div ><strong>Wednesday</strong></div> 
                                                            <div><small class="text-muted"><?php echo $formattedDate; ?></small></div>
                                                        </div>
                                                    </div>
                                                         
                                                    <div class="card border mt-2 mb-2"></div>

                                                        <div class="card-body " style="max-height: 200px; overflow-y: auto; min-height: 180px;">

                                                  
                                                    <div class="scrollable-content">

                                                        <?php
                                                            // Loop to display data entries with the same date within the same card
                                                            foreach ($finalInterview1 as $final1) { 
                                                                if ($final1['date'] == $date) {
                                                                    $info = $admin->getApplicantById($final1['scholar_id']);
                                                                    ?>
                                                                    <li class="card-text ms-3"><?php echo $info[0]['f_name']." ".$info[0]['l_name']; ?></li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                        <!-- Add more content if needed -->
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-light border-0">
                                                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#editFinalModal<?php echo $final["date"];?>">Edit</button>
                                                </div>
                                            </div>
                                                    </div>


                                                <?php
                                            }
                                        }
                                    }else{
                                        ?>
                                        <div>
                                        <div class="alert alert-primary" role="alert">
                                            No Interview for now.
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                </div>


                <script>
    function showTab(tabId) {
        // Hide all card containers
        document.getElementById('initial-interview-card').style.display = 'none';
        document.getElementById('final-interview-card').style.display = 'none';
        
        // Show the selected tab's card container
        document.getElementById(tabId + '-card').style.display = 'block';
    }
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
    <!-- Modal For View Details -->
    <?php 
        $displayedDatesforModal = [];
        foreach($initialInterview1 as $a){
            $date1 = $a['date'];
            if (!in_array($date, $displayedDatesforModal)) {
                // Add the date to the list of displayed dates
                $displayedDatesforModal[] = $date;
    ?>
    <div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="applicant-modal<?php echo $a["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Requirements</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php foreach($initialInterview1 as $b){
                                if($b['date'] == $date1){
                                    $info1 = $admin->getApplicantById($b['scholar_id']);
                                    ?>
                        <tr>
                            <td><?php echo $info1[0]['f_name']." ".$info1[0]['l_name'];?></td>
                            <td><?php echo $b['time_start']?> - <?php echo $b['time_end'];?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#questionModal<?php echo $b["id"];?>">Start</button>
                            </td>
                        </tr>
                        <?php }
                    }
                    ?>
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
    <?php }} ?>
    <!-- Modal End -->

    <!-- Modal Start Question -->
    <?php 
    foreach($initialInterview1 as $z){
    ?>
    <div class="modal fade" id="questionModal<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $z["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $z["id"];?>">Questioner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-10px">
                    <div class="col-12">
                        <strong>Instructions: </strong>Rate the applicants on every Question 1 to 10.
                    </div>
                    <div class="col-12">
                        <strong>(1 - lowest, 10 - Highest)</strong>
                    </div>
                </div>
                <table id="applicant-modal<?php echo $z["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>Grade</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <form method="post" action="../functions/interview-grade.php">
                        <tr>
                            <td>Tell us about yourself</td>
                            <td><input class="form-control" type="text" name="q1" required></td>
                        </tr>
                        <tr>
                            <td>Tell us about your Greatest Strength</td>
                            <td><input class="form-control" type="text" name="q2" required></td>
                        </tr>
                        <tr>
                            <td>Why do you deserve this scholarship ?</td>
                            <td><input class="form-control" type="text" name="q3" required></td>
                        </tr>
                        <tr>
                            <td>Why did you choose this scholarship ?</td>
                            <td><input class="form-control" type="text" name="q4" required></td>
                        </tr>
                        <tr>
                            <td>Imagine yourself Five years Form now ?</td>
                            <td><input class="form-control" type="text" name="q5" required></td>
                        </tr>
                    </tbody>
                </table>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="id" value="<?php echo $z['id']; ?>">
                <input type="hidden" name="scholar_id" value="<?php echo $z['scholar_id']; ?>">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!-- Modal End -->
    <!-- Modal for Final Interview Edit -->
    <?php 
    foreach($finalInterview1 as $fT){
    ?>
    <div class="modal fade" id="editFinalModal<?php echo $fT["date"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $fT["date"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $fT["id"];?>">Edit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>Interview Form</h2>
                    <form method="post" action="../functions/editFinalInterview.php">
                    <div class="form-group">
                        <label for="interviewDate">Interview Date:</label>
                        <input type="date" class="form-control" id="interviewDate1" name="interviewDate"  min="<?php echo date('Y-m-d'); ?>" value="<?php echo $fT['date']; ?>" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="modeOfTnterview">Mode of Interview:</label>
                        <select class="form-control" id="modeOfTnterview" name="modeOfTnterview" required>
                        <option value="">Select Mode</option>
                        <option value="In-person">Onsite</option>
                        <option value="Phone">Online</option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="additionalInfo">Additional Information:</label>
                        <textarea class="form-control" id="additionalInfo" name="additionalInfo" rows="3"></textarea>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="date" value="<?php echo $fT['date']; ?>">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!-- Modal End -->

    <!-- Modal for Initial Interview Edit -->
    <?php 
    foreach($initialInterview1 as $p){
    ?>
    <div class="modal fade" id="editInitialModal<?php echo $p["date"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $p["date"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $p["date"];?>">Edit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>Interview Form</h2>
                    <form method="post" action="../functions/editInitialInterview.php">
                    <div class="form-group">
                        <label for="interviewDate">Interview Date:</label>
                        <input type="date" class="form-control" id="interviewDate" name="interviewDate"  min="<?php echo date('Y-m-d'); ?>" value="<?php echo $p['date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" id="modeOfTnterview" name="modeOfTnterview" aria-label="Floating label select example" required>
                                <option>Open this select menu</option>
                                <option value="Online">Online</option>
                                <option value="Onsite">Onsite</option>
                            </select>
                            <label for="floatingSelect">Mode of Interview</label>
                        </div>
                    </div>
                    <div id="additionalInput" style="display: none;">
                        <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" id="additionalInput" name="additionalInput" aria-label="Floating label select example">
                                <option>Open this select menu</option>
                                <option value="Meet">Meet</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                            <label for="floatingSelect">Online Platform</label>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="date" value="<?php echo $p['date']; ?>">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!-- Modal End -->
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets1/js/1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script>

        $(document).ready(function() {
        $('#modeOfTnterview').change(function() {
            if ($(this).val() === "Online") {
                $('#additionalInput').show();
            } else {
                $('#additionalInput').hide();
            }
        });
    });
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

    function showAdditionalInput() {
        var modeOfInterview = document.getElementById("modeOfInterview");
        var additionalInput = document.getElementById("additionalInput");

        if (modeOfInterview.value === "Onsite") {
            additionalInput.style.display = "block";
        } else {
            additionalInput.style.display = "none";
        }
    }
</script>
</body>

</html>