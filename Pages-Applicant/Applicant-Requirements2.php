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
    $content = $admin->getContent();

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
    <link rel="shortcut icon" type="image/x-icon" href="../images/<?php echo $content[0]['logo']; ?>" />
    <title><?php echo $content[0]['title_name']; ?></title>

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

.custom-modal-width {
    max-width: auto; /* Adjust the width as needed */
    margin: auto;
    margin-top: 100px;
}

.modal.fade .modal-dialog {
    animation: zoomOut 0.3s forwards;
}

@keyframes zoomOut {
    from {
        transform: scale(1);
        opacity: 1;
    }
    to {
        transform: scale(0.5);
        opacity: 0;
    }
}

.modal.fade.show .modal-dialog {
    animation: zoomIn 0.3s forwards;
}

@keyframes zoomIn {
    from {
        transform: scale(0.5);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}



        .nav-tabs {
            border: none;
            /* Remove all borders for the navigation tabs */
        }

        .nav-tabs .nav-link {
            color: gray;
        }


        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #0C0C0C;
            border-left: none;
            border-right: none;
            border-top: none;
            /* Keep only the border-bottom for the active tab */
            background-color: #E2DFD0;
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
                <img src="../images/<?php echo $content[0]['logo']; ?>" alt="Logo" width="70" height="40" class="d-inline-block align-text-top">
                <span class="ms-2" style="color:#0EDC8D;"><strong><?php echo $content[0]['title_name']; ?></strong></span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     
                    </ul>
                    <span class="navbar-text d-flex">
                    <img class="img-profile rounded-circle me-2" width="30" height="30" src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>">
                    <div class="ms-auto">
                        <a href="index123.php" class="text-primary"><i class="fas fa-arrow-left me-2 text-primary"></i>Back</a>
                    </div>
                </span>

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
                <div class="row ">
                    <div class="col-lg-2 col-12 mx-auto text-center mb-2">
                        <img class="img-fluid shadow-sm thumbnail shadow-sm" src='../Scholar_files/<?php echo $pic[0]['file_name'];?>' alt="">
                    </div>

                    <div class="col-lg-10 col-12">
                        <h5 class="card-title fw-bold mt-2"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></h5>
                        <div class="mb-1 ">
                            <span class='card-text'><i class="fa-solid fa-envelope me-1"></i> <?php echo $a["email"]?></span>
                        </div>
                        <div class="mb-1">
                            <span class="card-text"><i class="fa-solid fa-phone me-2"></i><?php echo $a['mobile_number'];?></span>
                        </div>
                        <div class="mb-1">
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

                                                <dt class="col-sm-5">Religion:</dt>
                                                <dd class="col-sm-7"><?php echo $a['religion'];?></dd>

                                                <dt class="col-sm-5">Gender:</dt>
                                                <dd class="col-sm-7"><?php echo $a['gender'];?></dd>

                                                <dt class="col-sm-5">Civil Status:</dt>
                                                <dd class="col-sm-7"><?php echo $a['c_status'];?></dd>                              
                                                </dl>
                                            </div>



                                            <div class="col-md-6">
                                                <dl class="row">

                                                <dt class="col-sm-5">Height:</dt>
                                                <dd class="col-sm-7"><?php echo $a['height'];?></dd>

                                                <dt class="col-sm-5">Weight:</dt>
                                                <dd class="col-sm-7"><?php echo $a['weight'];?></dd>

                                                <dt class="col-sm-5">Medical Condition:</dt>
                                                <dd class="col-sm-7"><?php echo $a['med_condition'];?></dd>

                                                <dt class="col-sm-5">Student Type:</dt>
                                                <dd class="col-sm-7"><?php echo $a['studType'];?></dd>

                                                <dt class="col-sm-5">Scholarship Type:</dt>
                                                <dd class="col-sm-7">

<div class="modal fade" id="scholarshipTypeModal" tabindex="-1" role="dialog" aria-labelledby="scholarshipTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal-width" role="document">
    <div class="modal-content">
    <div class="modal-header d-flex justify-content-center" style="background-color: #C9FDD7;">
    <h5 class="modal-title">Scholarship Types</h5>
    
      </div>
      <div class="modal-body">
       <ul>
        <li>Academic Rank 1 - Applicants with a GWA between 1 - 1.5 </li>
        <li>Academic Rank 2 - Applicants with a GWA between 1.4 - 1.9 </li>
        <li>Economic - Applicants with a GWA between 2 - 2.25 </li>
    </ul>
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #0EDC8D;">OK</button>
</div>

    </div>
  </div>
</div>

                                                <?php
                                                if ($a['scholar_type'] == 3) {
                                                    $schoType = "Academic Rank 1";
                                                } elseif ($a['scholar_type'] == 2) {
                                                    $schoType = "Academic Rank 2";
                                                } elseif ($a['scholar_type'] == 1) {
                                                    $schoType = "Economic Scholarship";
                                                }else{
                                                    $schoType = "Not Qualified";
                                                }
                                                echo $schoType;
                                                ?>
                                                
                                            &nbsp; <i class="fas fa-info-circle" data-toggle="modal" data-target="#scholarshipTypeModal" style="cursor: pointer;"></i>

                                                </dd>
                                                </dl>
                                            </div>


                                            </div>





                                    <h6 class="fw-bold mb-1">Family Information</h6>
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
                                            <dl class="row">
                                            <dt class="col-sm-5">Name:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_name"];?></dd>

                                            <dt class="col-sm-5">Occupation:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_occupation"];?></dd>

                                            <dt class="col-sm-5">Educational Attainment:</dt>
                                            <dd class="col-sm-7"><?php echo $a["mother_attain"];?></dd>
                                            </dl>
                                        </dl>
                                        
                                        </dl>
                                    </div>

                                    <div class="col-md-6">
                                        <dl class="row">
                                        <p class="mb-3 fw-bold">Siblings</p> 
                                            <dl class="row">
                                            <dt class="col-sm-5">Number of Siblings:</dt>
                                            <dd class="col-sm-7"><?php echo $a["numSiblings"];?></dd>
                                            </dl>
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
                                        

                                    <h6 class="fw-bold mt-2">Income Earner in the Family</h6>
                                    <hr>
                                                        
                                        <dl class="row ms-3" style="font-size: 14px;">
                                            <?php 
                                                        $earner = $admin->getAllEarner($a['scholar_id']);
                                                        foreach($earner as $er){
                                                    ?>
                                                <dt class="col-sm-5 ">Name:</dt>
                                                <dd class="col-sm-7"><?php echo $er["earner_name"];?></dd>


                                                <dt class="col-sm-5">Income:</dt>
                                                <dd class="col-sm-7"><?php echo $er["earner_income"];?></dd>

                                                <dt class="col-sm-5">Occupation:</dt>
                                                <dd class="col-sm-7"><?php echo $er["earner_occupation"];?></dd>

                                                <dt class="col-sm-5">Company:</dt>
                                                <dd class="col-sm-7"><?php echo $er["earner_company"];?></dd>
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
                                                            <?php
                                                                if($a['application_status'] == 0){
                                                                    $remarks = '<span class="badge bg-primary">For Evaluation</span>';
                                                                }
                                                                else if($a['application_status'] == 1){
                                                                    $remarks = '<span class="badge bg-warning">Interview</span>';
                                                                }else if($a['remapplication_statusarks'] == 2){
                                                                    $remarks = '<span class="badge bg-info">Done Interview</span>';
                                                                }

                                                                echo $remarks;
                                                            ?>
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
                        <div class="col-12 col-lg-9 ">
                            <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <h6>Academic Information</h6>
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
                    <?php if($a['application_status'] == 0):?>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-pen-to-square me-2 d-none d-lg-inline-block"></i> <div class="d-inline-block">Edit Requirements</div>
                    </button>
                    <?php endif; ?>
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


                 
               


            <?php } ?>
        </div>

        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Requirements</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                        <!-- Content for the "View Details" modal -->

    <form method="post" enctype="multipart/form-data" action="../functions/edit-applicant-info.php">
    <?php 
    $applifiles = $admin->getApplicantsFiles($id);

    foreach($applifiles as $i) {
        if ($a['studType'] == "Senior High Graduate" && $i['requirement_name'] != "CollegeGrades") {
            // Display files for senior high graduates except "CollegeGrades"
            ?>
            <div class="form-group">
                <label for="<?= $i['requirement_name'] ?>"><?= $i['requirement_name'] ?></label>
                <?php if (!empty($i['file_name'])) { ?>
                    <a href="../Scholar_files/<?= $i['file_name'] ?>" target="_blank"><?= $i['file_name'] ?></a>
                <?php } ?>
                <input class="form-control" type="file" id="<?= $i['requirement_name'] ?>" name="<?= $i['requirement_name'] ?>" accept=".pdf">
            </div>
            <?php
        } elseif ($a['studType'] == "College" && $i['requirement_name'] != "Form137/138") {
            // Display files for college students except "Form137/138"
            ?>
            <div class="form-group">
                <label for="<?= $i['requirement_name'] ?>"><?= $i['requirement_name'] ?></label>
                <?php if (!empty($i['file_name'])) { ?>
                    <a href="../Scholar_files/<?= $i['file_name'] ?>" target="_blank"><?= $i['file_name'] ?></a>
                <?php } ?>
                <input class="form-control" type="file" id="<?= $i['requirement_name'] ?>" name="<?= $i['requirement_name'] ?>" accept=".pdf">
            </div>
            <?php
        }
    }
    ?>

        
    



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

$(document).ready(function() {
  $('i.fa-question-circle').on('click', function() {
    $('#scholarshipTypeModal').modal('show');
  });
});

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

    

   
</script>



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