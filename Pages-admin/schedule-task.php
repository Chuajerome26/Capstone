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
<style type="text/css">
.Scheduling .section-title .title-text {
    margin-bottom: 50px;
}

.Scheduling .tab-area .nav-tabs {
    border-bottom: inherit;
}

.Scheduling .tab-area .nav {
    border-bottom: inherit;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: 80px;
}

.Scheduling .tab-area .nav-item {
    margin-bottom: 75px;
}
.Scheduling .tab-area .nav-item .nav-link {
    text-align: center;
    font-size: 22px;
    color: #333;
    font-weight: 600;
    border-radius: inherit;
    border: inherit;
    padding: 0px;
    text-transform: capitalize !important;
}
.Scheduling .tab-area .nav-item .nav-link.active {
    color: #4125dd;
    background-color: transparent;
}

.Scheduling .tab-area .tab-content .table {
    margin-bottom: 0;
    width: 80%;
}
.Scheduling .tab-area .tab-content .table thead td,
.Scheduling .tab-area .tab-content .table thead th {
    border-bottom-width: 1px;
    font-size: 20px;
    font-weight: 600;
    color: #252525;
}
.Scheduling .tab-area .tab-content .table td,
.Scheduling .tab-area .tab-content .table th {
    border: 1px solid #b7b7b7;
    padding-left: 30px;
}
.Scheduling .tab-area .tab-content .table tbody th .heading,
.Scheduling .tab-area .tab-content .table tbody td .heading {
    font-size: 16px;
    text-transform: capitalize;
    margin-bottom: 16px;
    font-weight: 500;
    color: #252525;
    margin-bottom: 6px;
}
.Scheduling .tab-area .tab-content .table tbody th span,
.Scheduling .tab-area .tab-content .table tbody td span {
    color: #4125dd;
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}
.Scheduling .tab-area .tab-content .table tbody th span.date,
.Scheduling .tab-area .tab-content .table tbody td span.date {
    color: #656565;
    font-size: 14px;
    font-weight: 500;
    margin-top: 15px;
}
.event-schedule-area .tab-area .tab-content .table tbody th p {
    font-size: 14px;
    margin: 0;
    font-weight: normal;
}

.Scheduling .section-title .title-text h2 {
    margin: 0px 0 15px;
}

.Scheduling1 ul.custom-tab {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 30px;
}
.Scheduling1 ul.custom-tab li {
    margin-right: 70px;
    position: relative;
}
.Scheduling1 ul.custom-tab li a {
    color: #252525;
    font-size: 25px;
    line-height: 25px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 35px 0;
    position: relative;
}
.Scheduling1 ul.custom-tab li a:hover:before {
    width: 100%;
}
.Scheduling1 ul.custom-tab li a:before {
    position: absolute;
    left: 0;
    bottom: 0;
    content: "";
    background: #4125dd;
    width: 0;
    height: 2px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 ul.custom-tab li a.active {
    color: #4125dd;
}

.Scheduling1 .primary-btn {
    margin-top: 40px;
}

.Scheduling1 .tab-content .table {
    -webkit-box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 0;
}
.Scheduling1 .tab-content .table thead {
    background-color: #007bff;
    color: #fff;
    font-size: 20px;
}
.Scheduling1 .tab-content .table thead tr th {
    padding: 20px;
    border: 0;
}
.Scheduling1 .tab-content .table tbody {
    background: #fff;
}
.Scheduling1 .tab-content .table tbody tr.inner-box {
    border-bottom: 1px solid #dee2e6;
}
.Scheduling1 .tab-content .table tbody tr th {
    border: 0;
    padding: 30px 20px;
    vertical-align: middle;
}
.Scheduling1 .tab-content .table tbody tr th .event-date {
    color: #252525;
    text-align: center;
}
.Scheduling1 .tab-content .table tbody tr th .event-date span {
    font-size: 50px;
    line-height: 50px;
    font-weight: normal;
}
.Scheduling1 .tab-content .table tbody tr td {
    padding: 30px 20px;
    vertical-align: middle;
}
.Scheduling1 .tab-content .table tbody tr td .r-no span {
    color: #252525;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap h3 a {
    font-size: 20px;
    line-height: 20px;
    color: #cf057c;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap h3 a:hover {
    color: #4125dd;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories a {
    color: #252525;
    font-size: 16px;
    margin-left: 10px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .categories a:before {
    content: "\f07b";
    font-family: fontawesome;
    padding-right: 5px;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .time span {
    color: #252525;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a {
    color: #4125dd;
    font-size: 16px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a:hover {
    color: #4125dd;
}
.Scheduling1 .tab-content .table tbody tr td .event-wrap .organizers a:before {
    content: "\f007";
    font-family: fontawesome;
    padding-right: 5px;
}
.Scheduling1 .tab-content .table tbody tr td .primary-btn {
    margin-top: 0;
    text-align: center;
}
.Scheduling1 .tab-content .table tbody tr td .event-img img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}

    </style>

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="admin-application.php">
                    <!-- SCHO APP -->
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                 </svg>
                 <span class ="ml-2">Schedule Interview</span>
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

            <li class="nav-item active">
                <a class="nav-link" href="schedule-task.php">
                    <!-- Schedule Int ICON -->
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
                        <p class="h3 mb-0 font-weight-bold text-gray-800">Schedule Interview</p>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Schedule Interview</h6>
                                </div>
                                <div class="card-body">
                                <div class="event-schedule-area-two bg-color pad100">
                                    <div class="container">
                                    <div class="row">
                                    <div class="col-lg-12">
                                    <div class="section-title text-center">
                                    <div class="title-text">
                                    <h2>Schedule Task</h2>
                                    </div>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setScheduleModal">Set Date Schedule</button>
                                    </p>
                                    </div>
                                    </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade active show" id="home" role="tabpanel">
                                                <div class="table-responsive">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">Date</th>
                                                        <th scope="col">Profile</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th class="text-center" scope="col">Add to Records</th>
                                                    </tr>
                                                </thead>
                                                <?php 
                                                    $sched = $admin->getSchedule();
                                                    foreach($sched as $po){
                                                        $id = $po['scholar_id'];
                                                        $info = $admin->getApplicantById($id);

                                                        $date = $po['date'];
                                                        // Convert the input date to a Unix timestamp
                                                        $timestamp = strtotime($date);

                                                        // Convert the Unix timestamp to a text date
                                                        $textDate = date("F j, Y", $timestamp);
                                                ?>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row"><div class="event-date"><?php echo $textDate; ?></th>
                                                    <td><div class="event-img"><img src="C:\Users\marti\Downloads\noprofilepic.jpg" alt /></div></td>
                                                    <td><div class="event-wrap">
                                                            <h3><a href="#"><?php echo $info[0]['f_name']." ".$info[0]['l_name'] ?></a></h3>
                                                            <div class="time">
                                                                <span><?php echo $po['time_start']." - ". $po['time_end'] ?></span>
                                                            </div>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="r-no">
                                                            <span><?php echo $po['venue'];?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div class="primary-btn">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rateModal<?php echo $po['id'];?>">Rate</button>
                                                    </div>
                                                    </td>
                                                    </tr>

                                                    </tbody>
                                                    <?php } ?>
                                                    </table>
                                    </div>
                                    </div>
                                    </div>

                                    </div>
                                    </div>

                                    </div>

                                    </div>
                                    </div>
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
    <!-- Add Interview Modal-->
    <!-- Logout Modal-->
    <div class="modal fade" id="setScheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Schedule</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="../functions/setInterviewSchedule.php">
                    <!-- Select Applicant -->
                    <div class="form-group">
                        <label for="applicantSelect">Select Applicant:</label>
                        <select class="form-control" id="applicantSelect" name="scholar">
                        <?php 
                            $applicants = $admin->getApplicants();
                            foreach($applicants as $s){
                        ?>
                            <option value="<?php echo $s['scholar_id'] ?>"><?php echo $s['f_name']." ".$s['l_name'] ?></option>
                            
                            <!-- Add more options as needed -->
                        <?php } ?>
                        </select>
                        
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label for="eventDate">Event Date:</label>
                        <input type="date" class="form-control" id="eventDate" name="date">
                    </div>

                    <!-- Session -->
                    <div class="form-group">
                        <label for="sessionSelect">Time Start:</label>
                        <input type="time" class="form-control" name="time_start">
                    </div>

                    <div class="form-group">
                        <label for="sessionSelect">Time End:</label>
                        <input type="time" class="form-control" name="time_end">
                    </div>

                    <!-- Venue -->
                    <div class="form-group">
                        <label for="venueInput">Venue:</label>
                        <input type="text" class="form-control" id="venueInput" name="venue">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" aria-hidden="true">
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
<?php
$sched = $admin->getSchedule();
foreach($sched as $ss){ 
?>
    <div class="modal" id="rateModal<?php echo $ss['id'];?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ratings</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="../functions/rate.php">
          <div class="form-group">
            <label for="data">Rate:</label>
            <input type="text" class="form-control" id="rate" name="rate">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $ss['id']; ?>">
          </div>
        
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

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

    function closeModal(modalId) {
        // Find the modal element by its id
        var modal = document.getElementById(modalId);

        // Use the Bootstrap modal method to hide the modal
        $(modal).modal('hide');
    }
    

</script>
</body>

</html>