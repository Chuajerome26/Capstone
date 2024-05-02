<?php 
session_start();
if (isset($_SESSION['id']) && $_SESSION['user_type'] === 1) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';

    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);

    $id = $_SESSION['id'];
    $info = $admin->getScholarById($id);
    $pic = $admin->getApplicants2x2($id);
    $renewal_info = $scholar->getRenewalNewInfoById($id);

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
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
    <title>Applicant Requirements</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<!-- Link Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
        crossorigin="anonymous" />

    <style>
        .nav-tabs {
            border: none;
            /* Remove all borders for the navigation tabs */
        }

        .nav-tabs .nav-link {
            color: gray;
        }


        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #0d6efd;
            border-left: none;
            border-right: none;
            border-top: none;
            /* Keep only the border-bottom for the active tab */
            background-color: transparent;
            /* Remove the background color */
            color: black;

        }

          .thumbnail{
            width: 190px;
            height: 180px;
            -o-object-fit: cover;
            object-fit: cover;
        }
    

        a .card:hover {
        transform: scale(1.1); /* Adjust the scale factor as needed */
        transition: transform 0.3s ease;
        transition: box-shadow 0.3s ease; /* Transition effect for smoother animation */
        box-shadow: 4 8px 8px rgba(0, 0, 0, 0.2); /* Initial shadow effect */
    }
    </style>
</head>

<body class="bg-body-tertiary">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column vh-100">

            <!-- Main Content -->
            <div id="content">
          


            <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top mb-2">
                <div class="container">
                <img src="../images/Management1.png" alt="Logo" width="190" height="40" class="d-inline-block align-text-top">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     
                    </ul>
                    <span class="navbar-text">
                   

                    
                    <div class="dropdown">
                    <button class="btn btn-transparents dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-profile rounded-circle me-2"  width="30" height="30" src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>"> <?php echo $info[0]['l_name']; ?>
                    </button>
                    <ul class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        
                    </ul>
                    </div>




                    </span>
                    </div>
                </div>
            </nav>

                <main>

                    <div class="container-fluid  col-11 mt-4">
                    
                            <div class="card shadow">
                                <div class="card-body px-4">
                                            <?php 
                                    $applicants = $admin->getScholarById($id);
                                    
                                    foreach($applicants as $a){

                                    ?>
                            <div class="container-fluid">
                                <div class="hstack gap-3 d-flex flex-column flex-md-row">
                                    <div class="">
                                        <img class="img-fluid shadow-sm thumbnail shadow-sm" src='../Scholar_files/<?php echo $pic[0]['file_name'];?>' alt="">
                                    </div>
                                    <div class="ms-1 ">
                                        <h5 class="card-title fw-bold"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></h5>
                                        <div class="mb-1 ms-1">
                                            <span class='card-text'><i class="fa-solid fa-envelope me-1"></i> <?php echo $a["email"]?></span>;
                                        </div>
                                        <div class="mb-1 ms-1">
                                            <span class="card-text"><i class="fa-solid fa-phone me-2"></i><?php echo $a['mobile_number'];?></span>
                                        </div>
                                        <div class="mb-1 ms-1">
                                            <span class="card-text"><i class="fab fa-facebook me-1"></i> <a href="<?php echo $a["fb_link"];?>" target="_blank"><?php echo $a["fb_link"];?></a>
                                        </div>


                                        <div class="mb-1 ms-1">
                                            <span class="card-text"><i class="fa-solid fa-location-dot me-1"></i> <?php echo $a['present_address'];?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <hr class="d-lg-none"> 
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs" id="myTabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active fw-bold " style="font-size:15px" id="overview-tab" data-bs-toggle="tab" href="#overview">
                                                    
                                                    <span class="d-none d-lg-block">Announcement</span>
                                                        <span class="d-lg-none">Announcement</span>

                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold" style="font-size:15px" id="agenda-tab" data-bs-toggle="tab" href="#agenda">
                                                    <span class="d-none d-lg-block">Personal Information</span>
                                                        <span class="d-lg-none">Personal</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold" style="font-size:15px" id="sponsors-tab" data-bs-toggle="tab" href="#sponsors">
                                                    <span class="d-none d-lg-block">Requirements List</span>
                                                        <span class="d-lg-none">Files</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold" style="font-size:15px" id="renewal-tab" data-bs-toggle="tab" href="#renewal">
                                                    <span class="d-none d-lg-block">Renewal History</span>
                                                        <span class="d-lg-none">Files</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                    </div>


            <div class="tab-content mt-2 mb-4" id="myTabsContent">
                <!-- Overview Tab Content -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <!-- Overview content goes here -->
                    
                    <div class="row g-2">
                    <div class="col-md-8">
                            <div class="card shadow min-vh-100">
                                <div class="card-body px-4">
                                <h6 class="fw-bold mb-1">Announcement</h6>
                                    <hr>


                                            
                                    <div class="card shadow-sm">
                                    <div class="card-body">
                                    <?php
                                    // $date = isset($_GET['date']) ? $_GET['date'] : '';
                                    $announcements= $admin->getAnnouncements();
                                    $count = count($announcements);
                                    if($count != 0){
                                    foreach ($announcements as $b){
                                        $adminInfo = $admin->adminInfo($b['admin_id']);
                            
                                    ?>
                                    <div class="hstack gap-3">
                                        <div class="p-1"> 
                                            <img src="../Scholar_files/<?php echo $adminInfo[0]['pic']; ?>" alt="" style="width: 50px; height: 50px" class="rounded-circle" />
                                        </div>
                                        <div class="p-1">
                                            <div class=""><?php echo $adminInfo[0]['f_name']; ?></div>
                                            <div class="text-muted" style="font-size:12px;"><strong>Date Posted on:</strong> <?= $b['ann_date'] ?> <strong>Time:</strong> <?= $b['ann_time'] ?></div>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                    <?= $b['announcement'] ?>
                                    </div>

                                    <hr>

                                    <?php }
                                    }else{
                                        ?>
                                        <div class="alert alert-primary text-center" role="alert">No Announcements.</div>
                                    <?php
                                    } ?>
                                    </div>
                                    </div>




                                </div>
                            </div>
                    </div>


                    <div class="col-md-4">

                            <div class="row">
                            <div class="col-md-12">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">



                                        <?php
                                            $renewalDates = $scholar->getRenewalDatesForScholar();
                                            $currentDate = date('Y-m-d');
                                            foreach ($renewalDates as $date) {
                                        ?>
                                            <div class="card shadow-sm">
                                                <div class="card-body py-1 px-3 p-0 m-0">
                                                    <div class="hstack gap-3">
                                                        <div class="ms-2 text-center">
                                                            <span class="fw-bold"><?php echo date('d', strtotime($currentDate)); ?></span><br>
                                                            <span class="text-danger fw-bold"><?php echo date('D', strtotime($currentDate)); ?></span>
                                                        </div>
                                                        <div class="ms-2">
                                                            <div class="ms-2 d-flex align-items-center">
                                                                <small class="text-muted">Renewal Dates</small>
                                                            </div>
                                                            <div class="ms-2 d-flex justify-content-center align-items-center">
                                                                <small class="text-muted fw-bold"><?php echo $date['renewal_date_start'] . ' - ' . $date['renewal_date_end']; ?></small>
                                                            </div>
                                                        </div>
                                                        <?php
                                                            $getRef = $scholar->getRenewalDates();
                                                            $ref = $getRef['reference_number'];
                                                            $nonCom = date('Y-m-d', strtotime($date['renewal_date_end'] . ' +3 days'));
                                                            if (($currentDate >= $date['renewal_date_start'] && $currentDate <= $date['renewal_date_end']) || ($nonCom >= $currentDate && $date['renewal_date_end'] <= $currentDate)) {
                                                                // Before displaying the renewal form, check if the scholar has already submitted
                                                                if (!$scholar->hasSubmittedRenewal($id, $ref))  {
                                                        ?>
                                                                <a href="renewal-form.php"><button type="button" class="btn btn-primary">Submit Renewal</button></a>
                                                        <?php
                                                                } else {
                                                        ?>
                                                                    <button type="button" class="btn btn-primary" disabled>Renewal Submitted</button>
                                                        <?php
                                                                }
                                                            } else {
                                                        ?>
                                                                <button type="button" class="btn btn-primary" disabled>Renewal Ended</button>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        </div>
                                    </div>
                            </div>




                            
                            </div>
                           
                    </div>






                    </div>







                </div>





                
                <!-- Agenda Tab Content -->
                <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                    <!-- Agenda content goes here -->
                    <div class="card mb-3 shadow">
                        <div class="card-body">


                        <div class="row mx-2 mt-2" style="font-size: 14px;">
                        <div class="col-12 col-lg-3  d-none d-lg-block  border-0 border-end">
                            <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy ">
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-1"><h6>Personal Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-2"><h6>Family Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-3"><h6>Guardian Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-5"><h6>Academic Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-6"><h6>Income Provider</h6></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 ">
                            <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <h6 id="simple-list-item-1">Personal Information</h6>
                            <hr>

                            <div class="row mt-2 mx-2" style="font-size: 14px;">

                                    <div class="col-md-6 ">
                                                <dl class="row">
                                                
                                                <dt class="col-sm-5">Date of Birth:</dt>
                                                <dd class="col-sm-7"> <?php echo date("F j, Y", strtotime($a["date_of_birth"])); ?></dd>

                                                <dt class="col-sm-5">Place of Birth:</dt>
                                                <dd class="col-sm-7"><?php echo $a['b_place'];?></dd>

                                                <dt class="col-sm-5">Religion:</dt>
                                                <dd class="col-sm-7"><?php echo $a['religion'];?></dd>

                                                <dt class="col-sm-5">Student Type:</dt>
                                                <dd class="col-sm-7"><?php echo $a['studType'];?></dd>

                                                <dt class="col-sm-5">Gender:</dt>
                                                <dd class="col-sm-7"><?php echo $a['gender'];?></dd>

                                                </dl>
                                            </div>



                                            <div class="col-md-6">
                                                <dl class="row">
                                                <dt class="col-sm-5">Civil Status:</dt>
                                                <dd class="col-sm-7"><?php echo $a['c_status'];?></dd>

                                                <dt class="col-sm-5">Height:</dt>
                                                <dd class="col-sm-7"><?php echo $a['height'];?></dd>

                                                <dt class="col-sm-5">Weight:</dt>
                                                <dd class="col-sm-7"><?php echo $a['weight'];?></dd>

                                                <dt class="col-sm-5">Medical Condition:</dt>
                                                <dd class="col-sm-7"><?php echo $a['med_condition'];?></dd>

                                                <dt class="col-sm-5">Scholarship Type:</dt>
                                                <dd class="col-sm-7">
                                                <?php
                                                if($a['scholar_type'] == 3){
                                                    $type = 'Academic Rank 1';
                                                }
                                                else if($a['scholar_type'] == 2){
                                                    $type = 'Academic Rank 2';
                                                }
                                                else if($a['scholar_type'] == 1){
                                                    $type = 'Economic Scholarship';
                                                }
                                                echo $type;
                                                ?></dd>
                                                </dl>
                                            </div>


                                            </div>

                            <h6 id="simple-list-item-2">Family Information</h6>
                            <hr>

                            <div class="row mt-2 mx-2" style="font-size: 14px;">

                            <div class="col-md-6 ">
                            <dl class="row">
                            <p class="mb-3 fw-bold">Father Information</p> 

                            <dt class="col-sm-5 ">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_name"];?></dd>


                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_occupation"];?></dd>
                            
                            <dt class="col-sm-5">Educational Attainment:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_attain"];?></dd>

                                                            
                            </dl>
                            </div>



                            <div class="col-md-6">
                            <dl class="row">
                            <p class="mb-3 fw-bold">Mother Information</p> 

                            <dt class="col-sm-5">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_name"];?></dd>


                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_occupation"];?></dd>

                            <dt class="col-sm-5">Educational Attainment:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_attain"];?></dd>
                            
                            </dl>
                            </div>


                            </div>
                            <h6 id="simple-list-item-3">Guardian Information</h6>
                            <hr>

                            <div class="col-md-12" style="font-size: 14px;">
                                    <dl class="row ms-2">
                                       
                                        <dt class="col-sm-5">Name:</dt>
                                        <dd class="col-sm-7"><?php echo $a["guardian"];?></dd>

                                        <dt class="col-sm-5">Emergency Contact:</dt>
                                        <dd class="col-sm-7"><?php echo $a["emergency_contact"];?></dd>

                                        <dt class="col-sm-5">Relationship:</dt>
                                        <dd class="col-sm-7"><?php echo $a["guardian_rs"];?></dd>
                                                    
                                        </dl>
                                        
                                    </div>
                                        

                            <h6 id="simple-list-item-5">Academic Information</h6>
                            <hr>
                        
                        <dl class="row ms-3" >
                        <?php if($a['studType'] == 'Senior High Graduate'):?>
                            <h6 >Senior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_achievements"];?></dd>
                            <?php else: endif;?>
                        </dl>


                        <dl class="row ms-3">
                            <?php if($a['studType'] == 'College'):?>
                            <h6 >College School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_achievements"];?></dd>
                            <?php else: endif;?>
                        </dl>


                            <h6 id="simple-list-item-6">Income Provider</h6>
                            <hr>
                            <dl class="row ms-3">
                            <?php $earner = $admin->getAllEarner($a['scholar_id']);
                                    foreach($earner as $er){
                                ?>
                            <dt class="col-sm-5">Name:</dt>
                            <dd class="col-sm-7"><?php echo $er['earner_name']; ?></dd>

                            <dt class="col-sm-5">Income:</dt>
                            <dd class="col-sm-7"><?php echo $er['earner_income']; ?></dd>

                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7 mb-4"><?php echo $er['earner_occupation']; ?></dd>
                                
                            <dt class="col-sm-5">Company:</dt>
                            <dd class="col-sm-7"><?php echo $er['earner_company']; ?></dd>
                            <?php }?>
                        </dl>

                            
                            </div>
                        </div>
                        </div>
      
                            




                        </div>
                    </div>


                </div>
                <!-- Sponsors Tab Content -->
                <div class="tab-pane fade" id="sponsors" role="tabpanel" aria-labelledby="sponsors-tab">
                    <div class="card">
                        <div class="card-body">
                            
                        <div class="hstack gap-3">
                            <div class="p-2"><h6>Requirement List</h6></div>
                                <div class="p-2 ms-auto">
                  
                                </div>
                   
                            </div>
                                            
                                <div class="row">
                                    <?php 
                                    $applifiles = $admin->getApplicantsFiles($id);

                                    foreach ($applifiles as $i) {
                                        if (!empty($i['file_name'])) {
                                            $logo = ($i['requirement_name'] == 'IdPhoto') ? 'jpgLogo.png' : 'PDF-logo.png';

                                            if ($a['studType'] == "College" && $i['requirement_name'] != "Form137/138") {
                                                // Display files for college students except "CollegeGrades"
                                                ?>
                                                <div class="col-md-4 mb-3">
                                                    <a class="text-decoration-none" href="../Scholar_files/<?= $i['file_name']; ?>" target="_blank">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body">
                                                                <div class="hstack gap-3">
                                                                    <div><img class="img-fluid" src="../images/<?= $logo; ?>" width="40" height="40"></div>
                                                                    <div>
                                                                        <div><?= $i['requirement_name']; ?></div>
                                                                        <small class="text-secondary"><?php echo $i['file_name']; ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            } elseif ($a['studType'] == "Senior High Graduate" && $i['requirement_name'] != "CollegeGrades") {
                                                // Display files for senior high graduates except "CollegeGrades"
                                                ?>
                                                <div class="col-md-4 mb-3">
                                                    <a class="text-decoration-none" href="../Scholar_files/<?= $i['file_name']; ?>" target="_blank">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body">
                                                                <div class="hstack gap-3">
                                                                    <div><img class="img-fluid" src="../images/<?= $logo; ?>" width="40" height="40"></div>
                                                                    <div>
                                                                        <div><?= $i['requirement_name']; ?></div>
                                                                        <small class="text-secondary"><?php echo $i['file_name']; ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Renewal Tab-->
            <div class="tab-pane fade" id="renewal" role="tabpanel" aria-labelledby="renewal-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="hstack gap-3">
                                <div class="p-2"><h6>Renewal History</h6></div>
                                    <div class="p-2 ms-auto">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Reference Number</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($renewal_info as $ri){

                                            if($ri['renewal_status'] == 1){
                                                $status = '<span class="badge bg-secondary">Submitted</span>';
                                            }elseif($ri['renewal_status'] == 2){
                                                $status = '<span class="badge bg-success">Approved</span>';
                                            }elseif($ri['renewal_status'] == 3){
                                                $status = '<span class="badge bg-info">Tentative</span>';
                                            }elseif($ri['renewal_status'] == 4){
                                                $status = '<span class="badge bg-danger">Non-Compliant</span>';
                                            }
                                        ?>  
                                            <tr>
                                                <td><?php echo $ri['reference_number'];?></td>
                                                <td><?php echo $ri['date_apply'];?></td>
                                                <td><?php echo $status?></td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsFilesModal<?php echo $ri["id"];?>">Details</button></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                </div>
            </div>



            <?php } ?>
        </div>

<!-- Modal for Renewal History -->
<?php
        foreach($renewal_info as $i){
            $scholar_id = $i["scholar_id"];
            $ref = $i["reference_number"];
    ?>
<div class="modal fade" id="detailsFilesModal<?php echo $i["id"];?>" tabindex="-1" aria-labelledby="detailsFilesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsFilesModalLabel">Renewal Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $i["full_name"];?></h5>
            <p class="card-text">Civil Status: <?php echo $i["c_status"];?></p>
            <p class="card-text">Contact Number: <?php echo $i["contact_num"];?></p>
            <p class="card-text">Active Gcash Number: <?php echo $i["gcash"];?></p>
            <p class="card-text">Educational Level: <?php echo $i["educ_lvl"];?></p>
            <p class="card-text">Total Units: <?php echo $i["total_units"];?></p>
            <p class="card-text">University Currently Enrolled at: <?php echo $i["univ"];?></p>
            <p class="card-text">Number of Units Currently Enroleld in: <?php echo $i["num_units_sem"];?></p>
            <p class="card-text">Year Level: <?php echo $i["year_lvl"];?></p>
            <p class="card-text">Current Semester: <?php echo $i["sem"];?></p>
            <p class="card-text">School Year: <?php echo $i["school_year"];?></p>
            <p class="card-text">Date: <?php echo $i["date_apply"];?></p>
          </div>
        </div>

        <!-- Grade Info Section -->
        <div class="card mt-3">
            <div class="card-body">
            <h5 class="card-title">Grade Info</h5>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $gradeInfo = $admin->getAllGrade($scholar_id, $ref);
                    foreach($gradeInfo as $gi){
                ?>
                    <tr>
                        <td><?php echo $gi['subject'];?></td>
                        <td><?php echo $gi['unit'];?></td>
                        <td><?php echo $gi['grade'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

<!-- RenewFiles Modal-->
<?php
    $renewalFiless = $scholar->getRenewalInfo();
        foreach($renewalFiless as $e){
    ?>
        <div class="modal fade" id="renewFilesModal<?php echo $e["id"];?>" tabindex="-1" aria-labelledby="renewFilesModal<?php echo $e["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $e["id"];?>">Scholar Details</h5>
            </div>
            <div class="modal-body">
                <table id="applicant-modal<?php echo $e["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Files</th>
                            <th>Details</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <tr>
                        <td>Grade Slip</td>
                        <td><a href="../Uploads_gslip/<?php echo $e["file1"]; ?>" target="_blank"><?php echo $e["file1"]?></a></td>
                    </tr>
                    <tr>
                        <td>Registration Form</td>
                        <td><a href="../Uploads_gslip/<?php echo $e["file2"]; ?>" target="_blank"><?php echo $e["file2"]?></a></td>
                    </tr>
                    </tbody>
                </table>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <?php } ?>
<!-- Modal end -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Requirements    </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                        <!-- Content for the "View Details" modal -->

    <form method="post" enctype="multipart/form-data" action="../functions/edit-applicant-info.php">
    <?php 
    $applifiles = $admin->getApplicantsFiles($id);
    
    foreach($applifiles as $a){
  ?>
            <div class="form-group">
            <label for="<?= $a['requirement_name'] ?>"><?= $a['requirement_name'] ?></label>
            <?php if (!empty($a['file_name'])) { ?>
                <a href="../Scholar_files/<?= $a['file_name'] ?>" target="_blank"><?= $a['file_name'] ?></a>
            <?php } ?>
            <input class="form-control" type="file" id="<?= $a['requirement_name'] ?>" name="<?= $a['requirement_name'] ?>" accept=".pdf">
        </div>
    <?php } ?>
        
    



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" class="text" name="id" value="<?php echo $a['scholar_id'];?>">
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


    </main>

               








<script>
//Script for Year level other options
function checkOtherOption() {
        var selectElement = document.getElementById("yearLvlSelect");
        var otherOptionDiv = document.getElementById("otherOption");
        var otherYearLevelInput = document.getElementById("otherYearLevelInput");

        if (selectElement.value === "other") {
            otherOptionDiv.style.display = "block";
            otherYearLevelInput.required = true; // Make the textbox required
        } else {
            otherOptionDiv.style.display = "none";
            otherYearLevelInput.required = false; // Make the textbox not required
        }
    }

document.addEventListener('DOMContentLoaded', function () {
    const scrollspy = new bootstrap.ScrollSpy(document.body, {
        target: '#navbar-example3',
        offset: 0,
    });

    const scrollspyNavLinks = document.querySelectorAll('#navbar-example3 .nav-link');

    function setActiveNavLinks() {
        let fromTop = window.scrollY;

        scrollspyNavLinks.forEach(link => {
            let section = document.querySelector(link.hash);

            if (
                section.offsetTop <= fromTop &&
                section.offsetTop + section.offsetHeight > fromTop
            ) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    function handleClickEvent(event) {
        event.preventDefault();

        // Remove active class from all nav links
        scrollspyNavLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Add active class to clicked link
        event.target.classList.add('active');

        // Scroll to the target item smoothly
        const targetId = event.target.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Add click event listener to each nav link
    scrollspyNavLinks.forEach(link => {
        link.addEventListener('click', handleClickEvent);
    });

    window.addEventListener('scroll', setActiveNavLinks);

    setActiveNavLinks(); // Set active links initially
});
</script>
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
                   
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../Pages-Applicant/applicant-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

         <!-- Link Bootstrap JS and Popper.js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</body>

</html>