<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 0) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];
    $info = $admin->getApplicantById($id);
    $pic = $admin->getApplicants2x2($id);

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
                <img src="../assets1/images/logo/Logo2.png" alt="Logo" width="190" height="40" class="d-inline-block align-text-top">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     
                    </ul>
                    <span class="navbar-text d-flex">


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
                      $applicants = $admin->getApplicantById($id);
                      
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
                            <span class='card-text'><i class="fa-solid fa-envelope me-1"></i> <?php echo $a["email"]?></span>
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
                                     
                                    <span class="d-none d-lg-block">Personal Information</span>
                                        <span class="d-lg-none">Personal</span>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" style="font-size:15px" id="agenda-tab" data-bs-toggle="tab" href="#agenda">
                                    <span class="d-none d-lg-block">Academic Information</span>
                                        <span class="d-lg-none">Academic</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" style="font-size:15px" id="sponsors-tab" data-bs-toggle="tab" href="#sponsors">
                                    <span class="d-none d-lg-block">Requirements List</span>
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
                            <div class="card shadow">
                                <div class="card-body px-4">
                                    <h6 class="fw-bold mb-1">Personal Information</h6>
                                    <hr>


                                    <div class="row mt-2 mx-2" style="font-size: 14px;">

                                    <div class="col-md-6 ">
                                                <dl class="row">
                                                
                                                <dt class="col-sm-5">Date of Birth:</dt>
                                                <dd class="col-sm-7"> <?php echo date("F j, Y", strtotime($a["date_of_birth"])); ?></dd>

                                                <dt class="col-sm-5">Place of Birth:</dt>
                                                <dd class="col-sm-7"><?php echo $a['b_place'];?></dd>

                                                <dt class="col-sm-5">Citizenship:</dt>
                                                <dd class="col-sm-7"><?php echo $a['citizenship'];?></dd>

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

                                                <dt class="col-sm-5">Age:</dt>
                                                <dd class="col-sm-7"><?php echo $a['age'];?></dd>


                                                <dt class="col-sm-5">Height:</dt>
                                                <dd class="col-sm-7"><?php echo $a['height'];?></dd>

                                                <dt class="col-sm-5">Weight:</dt>
                                                <dd class="col-sm-7"><?php echo $a['weight'];?></dd>

                                                <dt class="col-sm-5">Medical Condition:</dt>
                                                <dd class="col-sm-7"><?php echo $a['med_condition'];?></dd>
                                                
                                                </dl>
                                            </div>


                                            </div>





                                    <h6 class="fw-bold mb-1">Family Information</h6>
                                    <hr>

                                    <div class="row mt-2 mx-2" style="font-size: 14px;">
                                    <div class="col-md-6 ">
                                    <?php if($a['isDecF'] == "no"): ?>
                                        <dl class="row">
                                            <p class="mb-3 fw-bold">Father Information</p> 
                                            <dt class="col-sm-5 ">Name:</dt>
                                            <dd class="col-sm-7"><?php echo $a["father_name"];?></dd>

                                            <dt class="col-sm-5">Occupation:</dt>
                                            <dd class="col-sm-7"><?php echo $a["father_occupation"];?></dd>

                                            <dt class="col-sm-5">Monthly Income:</dt>
                                            <dd class="col-sm-7"><?php echo $a["father_income"];?></dd>

                                            <dt class="col-sm-5">Age:</dt>
                                            <dd class="col-sm-7"><?php echo $a["father_age"];?></dd>

                                            
                                            <dt class="col-sm-5">Educational Attained:</dt>
                                            <dd class="col-sm-7"><?php echo $a["father_contact"];?></dd>
                                        </dl>
                                        <?php else: ?>
                                            <dl class="row">
                                            <dt class="col-sm-5">Is your Father Deceased?</dt>
                                            <dd class="col-sm-7"><?php echo $a["isDecF"];?></dd>


                                            <dt class="col-sm-5">Reason:</dt>
                                            <dd class="col-sm-7"><?php echo $a["reasonF"];?></dd>

                                        </dl>
                                        <?php endif;?>
                                    </div>



                                    <div class="col-md-6">
                                        <dl class="row">
                                        <p class="mb-3 fw-bold">Mother Information</p> 

                                        <?php if($a['isDecM'] == "no"):?>
                                            <dl class="row">
                                            <dt class="col-sm-5">Name:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_name"];?></dd>


                                            <dt class="col-sm-5">Occupation:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_occupation"];?></dd>

                                            <dt class="col-sm-5">Monthly Income:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_income"];?></dd>

                                            <dt class="col-sm-5">Age:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_age"];?></dd>

                                            
                                            <dt class="col-sm-5">Educational Attained:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_contact"];?></dd>
                                            </dl>
                                            <?php else: ?>
                                            <dl class="row">
                                            <dt class="col-sm-5">Is your Mother Deceased?</dt>
                                            <dd class="col-sm-7"><?php echo $a["isDecM"];?></dd>


                                            <dt class="col-sm-5">Reason:</dt>
                                            <dd class="col-sm-7"><?php echo $a["reasonM"];?></dd>

                                            </dl>
                                            <?php endif;?>
                                        </dl>
                                        
                                        </dl>
                                    </div>


                                    </div>

                                   







                                    <h6 class="fw-bold mb-3 mt-2">Guardian Information</h6>
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
                                        
                                      



                                    <h6 class="fw-bold mt-2">Siblings Details:</h6>
                                    <hr>
                                                        
                                        <dl class="row ms-3" style="font-size: 14px;">
                                            <?php 
                                                        $sibling = $admin->getAllSibling($a['id']);
                                                        foreach($sibling as $sb){
                                                    ?>
                                                <dt class="col-sm-5 ">Name:</dt>
                                                <dd class="col-sm-7"><?php echo $sb["name"];?></dd>


                                                <dt class="col-sm-5">Age:</dt>
                                                <dd class="col-sm-7"><?php echo $sb["age"];?></dd>

                                                <dt class="col-sm-5">Occupation:</dt>
                                                <dd class="col-sm-7"><?php echo $sb["occupation"];?></dd>

                                                <dt class="col-sm-5">Civil Status:</dt>
                                                <dd class="col-sm-7"><?php echo $sb["civil_status"];?></dd>


                                                <dt class="col-sm-5">Religion:</dt>
                                                <dd class="col-sm-7"><?php echo $sb["religion"];?></dd>

                                                <dt class="col-sm-5">Educational Attained:</dt>
                                                <dd class="col-sm-7 mb-4"><?php echo $sb["educational_attained"];?></dd>

                                                <?php }?>                  
                                            </dl> 




                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <h6 class="fw-bold mb-3">Requested Status</h6>
                                            <hr>
                                            <!-- Description -->
                                            <div class="card-text " style="font-size: 14px ;">
                                            <dl class="row ms-2">
                                                <dt class="col-sm-7 fw-bold mb-1">
                                                <i class="fa-solid fa-calendar-minus me-2"></i>Date Registered: 
                                                </dt>
                                                <dd class="col-sm-5">
                                                <?php echo date("F j, Y", strtotime($a["date_apply"])); ?>
                                                </dd>

                                                <dt class="col-sm-7 fw-bold mb-1">
                                                <i class="fa-solid fa-calendar-check me-2"></i>Status: 
                                                </dt>
                                                <dd class="col-sm-5">
                                               test
                                                </dd>
                                            </dl>
                                            </div>
                                            <!-- Button -->
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h6 class="fw-bold mb-3">Remarks</h6>
                                            <hr>
                                            <!-- Description for online registered participants -->
                                            <div class="d-flex justify-content-between" style=" font-size: 14px ;">
                                            
                                            <div class="container mt-1 text-dark" style="overflow: auto; max-height: 300px;">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="w-100">
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
                                                                    <img class="img-fluid rounded-circle shadow border me-2" src="../images/logo.jpg" alt="avatar" width="35" height="35" />
                                                                    <div class="card w-100 shadow">
                                                                        <div class="card-body p-3">
                                                                            <div class="">
                                                                                <div class="fw-bold"><?php echo $remarks123;?> Admin</div>
                                                                                <div class="small"><?php echo date('M d, Y', strtotime($pogi["date"])); ?></div>
                                                                                <p class="mt-2"><?php echo nl2br($pogi["remarks_mess"]);?></p>
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
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-1"><h6>Academic Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-2"><h6>Grade Information</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-3"><h6>Incoming Freshmen</h6></a>
                            <a class="p-1 rounded text-decoration-none text-black" href="#simple-list-item-4"><h6>School Choice Information</h6></a>
                           
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 ">
                            <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <h6 id="simple-list-item-1">Academic Information</h6>
                            <hr>
                            
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


                            <h6 id="simple-list-item-2">Grade Information</h6>
                            <hr>
                        <dl class="row ms-3">
                        <?php $gradeInfo = $admin->getAllGrade($a['id']);
                                    foreach($gradeInfo as $gi){
                                ?>
                            <?php if($a['studType'] == "College"): ?>
                            
                            <dt class="col-sm-5">Subject:</dt>
                            <dd class="col-sm-7"><?php echo $gi['subject']; ?></dd>

                            <dt class="col-sm-5">Unit:</dt>
                            <dd class="col-sm-7"><?php echo $gi['unit']; ?></dd>

                            <dt class="col-sm-5">Grade:</dt>
                            <dd class="col-sm-7 mb-4"><?php echo $gi['grade']; ?></dd>
                            <?php else: ?>
                                
                            <dt class="col-sm-5">Subject:</dt>
                            <dd class="col-sm-7"><?php echo $gi['subject']; ?></dd>

                            <dt class="col-sm-5">Grade:</dt>
                            <dd class="col-sm-7 mb-4"><?php echo $gi['grade']; ?></dd>
                            <?php endif; }?>
                        </dl>
                        
                            
                            <h6 id="simple-list-item-3">Incoming Freshmen</h6>
                            <hr>
                            <dl class="row mt-3 ms-3" >
                            <?php if($a['studType'] == "College"):?>
                                <dt class="col-sm-6 ">Did you stop attending college?</dt>
                                <dd class="col-sm-6 mb-3"><?php echo $a["stopAttend"];?></dd>
                                <?php if($a['stopAttend'] == "yes"): ?>

                                <dt class="col-sm-6 ">Reason:</dt>
                                <dd class="col-sm-6 mb-3"><?php echo $a["reason_attend"];?></dd>

                                <dt class="col-sm-6 ">Year Level:</dt>
                                <dd class="col-sm-6 mb-3"><?php echo $a["yrlvl"];?></dd>

                                <dt class="col-sm-6 ">Semester:</dt>
                                <dd class="col-sm-6 mb-3"><?php echo $a["semester"];?></dd>
                                <?php else: endif; ?>
                            <?php else: endif;?>

                            <dt class="col-sm-6 mt-3">Did you apply for / are you a recipient of another scholarship?</dt>
                            <dd class="col-sm-6"><?php echo $a["other_scho"];?></dd>

                            <?php if($a["other_scho"] == "yes"): ?>
                                <dt class="col-sm-6 mt-3">Type:</dt>
                                <dd class="col-sm-6  "><?php echo $a["other_scho_type"];?></dd>

                                <dt class="col-sm-6 mt-3">Coverage</dt>
                                <dd class="col-sm-6 "><?php echo $a["other_scho_coverage"];?></dd>

                                <dt class="col-sm-6 mt-3">Status:</dt>
                                <dd class="col-sm-6 "><?php echo $a["other_scho_status"];?></dd>
                            <?php else: endif;?>

                            <dt class="col-sm-6 mt-3">How did you learn about CCMFI Schoolarship?</dt>
                            <dd class="col-sm-6 "><?php echo $a["q1"];?></dd>

                            <dt class="col-sm-6 mt-3">Why are you applying for this scholarship></dt>
                            <dd class="col-sm-6 "><?php echo $a["q2"];?></dd>

                            <dt class="col-sm-6 mt-3">Will you pursue your studies event without this scholarship?</dt>
                            <dd class="col-sm-6 "><?php echo $a["apply_scho"];?></dd>

                            <dt class="col-sm-6 mt-3">Explain your Answer:</dt>
                            <dd class="col-sm-6"><?php echo $a["apply_scho_explain"];?></dd>

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
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-pen-to-square me-2 d-none d-lg-inline-block"></i> <div class="d-inline-block">Edit Requirements</div>
                     </button>
                    </div>
                   
                    </div>
                                            
                        <div class="row ">
                            <?php 
                                $applifiles = $admin->getApplicantsFiles($id);
                                
                                foreach($applifiles as $a) {
                                    if (!empty($a['file_name'])) {
                            ?>
                            <div class="col-md-4 mb-3">
                                <a class="text-decoration-none" href="../Scholar_files/<?= $a['file_name'] ?>" target="_blank">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                        <div class="hstack gap-3">
                                        <div class=""> <img class="img-fluid" src="../images/folder-removebg-preview.png" width="40" height="40"></div>
                                        
                                        <div class="">  
                                        <div for="<?= $a['requirement_name'] ?>"><?= $a['requirement_name'] ?></div>
                                            <small class="text-secondary"><?php echo $a['file_name'] ?></small>
                                            
                                        </div>
                                        
                                        </div>

                                    
                                        </div>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>


                 
               


            <?php } ?>
        </div>

        
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
                    <a class="btn btn-primary" href="applicant-logout.php">Logout</a>
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