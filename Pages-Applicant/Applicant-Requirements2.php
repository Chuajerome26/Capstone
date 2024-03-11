<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 0) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];

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

    <title>Applicant Requirements</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<!-- Link Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column vh-100">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 sticky-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        ₱290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Scholar</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?php 
    $applicants = $admin->getApplicantById($id);
    
    foreach($applicants as $a){

  ?>
                <div class="container-fluid">
    <div class="row">
        <div class="col-3 position-fixed d-lg-block d-none vh-100">
            <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link " href="#item-1">Personal Information</a>
    
                    <a class="nav-link" href="#item-2">Family Information</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ms-3 my-1" href="#item-2-1">Guardian Details</a>
                        <a class="nav-link ms-3 my-1" href="#item-2-2">Siblings Details</a>
                    </nav>
                    <a class="nav-link" href="#item-3">Academic Information</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ms-3 my-1" href="#item-3-1">Grade Information</a>
                        <a class="nav-link ms-3 my-1" href="#item-3-2">Incoming Freshments</a>
                        <a class="nav-link ms-3 my-1" href="#item-3-2">School Choice Information</a>
                    </nav>
                    <a class="nav-link" href="#item-4">Requirements</a>
                   
                </nav>
            </nav>
        </div>

        <div class="col-lg-9 col-12  offset-lg-3">
            <div class="scrollspy-example-2 px-3" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
                <div id="item-1">

                <div class="hstack gap-3">
                <div class=""><h5 class="mt-3">Personal Information</h5></div>
                <div class=" ms-auto"><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                        Remarks
                </button>
                </div>
               
                </div>
                    
                    <div class="card mb-3"></div>
                    <dl class="row ms-3">
                            <dt class="col-sm-5 ">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></dd>

                            <dt class="col-sm-5">Nickname:</dt>
                            <dd class="col-sm-7"><?php echo $a["nick_name"];?></dd>

                            <dt class="col-sm-5">Email Address:</dt>
                            <dd class="col-sm-7"><?php echo $a["email"];?></dd>

                            <dt class="col-sm-5">Contact Number:</dt>
                            <dd class="col-sm-7"><?php echo $a['mobile_number'];?></dd>

                            <dt class="col-sm-5">Facebook Information:</dt>
                            <dd class="col-sm-7"> <a href="<?php echo $a["fb_link"];?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook text-primary fs-6 mt-1"></i> Facebook Link
                            </a></dd>

                            
                            <dt class="col-sm-5">Addresss:</dt>
                            <dd class="col-sm-7"><?php echo $a['address'];?></dd>

                            <dt class="col-sm-5">Date of Birth:</dt>
                            <dd class="col-sm-7"><?php echo $a['b_place'];?></dd>

                            <dt class="col-sm-5">Place of Birth:</dt>
                            <dd class="col-sm-7"><?php echo $a['date_of_birth'];?></dd>

                            <dt class="col-sm-5">Citizenship:</dt>
                            <dd class="col-sm-7"><?php echo $a['citizenship'];?></dd>

                            <dt class="col-sm-5">Religion:</dt>
                            <dd class="col-sm-7"><?php echo $a['religion'];?></dd>

                            <dt class="col-sm-5">Province:</dt>
                            <dd class="col-sm-7"><?php echo $a['province'];?></dd>

                            <dt class="col-sm-5">Gender:</dt>
                            <dd class="col-sm-7"><?php echo $a['gender'];?></dd>

                            <dt class="col-sm-5">Status:</dt>
                            <dd class="col-sm-7"><?php echo $a['status'];?></dd>

                            <dt class="col-sm-5">Age:</dt>
                            <dd class="col-sm-7"><?php echo $a['age'];?></dd>


                            <dt class="col-sm-5">Height:</dt>
                            <dd class="col-sm-7"><?php echo $a['height'];?></dd>

                            <dt class="col-sm-5">Weight:</dt>
                            <dd class="col-sm-7"><?php echo $a['weight'];?></dd>

                            <dt class="col-sm-5">Skills:</dt>
                            <dd class="col-sm-7"><?php echo $a['skills'];?></dd>

                            <dt class="col-sm-5">Medical Condition:</dt>
                            <dd class="col-sm-7"><?php echo $a['med_condition'];?></dd>

                    
                </div>
               
                <div id="item-2">
                    <h5 class="mt-4">Family Information</h5>
                    <div class="card mb-3"></div>
                    
                    <dl class="row ms-3">
                    <h6><strong>Father Information</strong></h6>

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


                        <dl class="row mt-4 ms-3">
                        <h6 ><strong>Mother Details</strong></h6>
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

                
                <div id="item-2-1">
                    <h5 class="mt-3">Guardian Details</h5>
                    <div class="card mb-3"></div>

                    <dl class="row ms-3">
                            <dt class="col-sm-5">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["guardian"];?></dd>


                            <dt class="col-sm-5">Contact No.:</dt>
                            <dd class="col-sm-7"><?php echo $a["guardian_contact"];?></dd>

                            <dt class="col-sm-5">Emergency Contact:</dt>
                            <dd class="col-sm-7"><?php echo $a["emergency_contact"];?></dd>

                            <dt class="col-sm-5">Relationship:</dt>
                            <dd class="col-sm-7"><?php echo $a["guardian_rs"];?></dd>

            
                        </dl> 
                    
                </div>
                <div id="item-2-2">
                    <h5 class="mt-3">Sibling Detals</h5>
                    <div class="card mb-3"></div>

                    <dl class="row ms-3">
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

                <div id="item-3">
                    <h5 class="mt-3 ">Academic Infomation</h5>
                    <div class="card mb-3"></div>

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

            
                <div id="item-3-1">
                    <h5 class="mt-3">Grade Information</h5>
                    <div class="card mb-3"></div>

                    <dl class="row ms-3">
                    <?php $gradeInfo = $admin->getAllGrade($a['id']);
                                    foreach($gradeInfo as $gi){
                                ?>
                            <dt class="col-sm-5">Subject:</dt>
                            <dd class="col-sm-7"><?php echo $gi['subject']; ?></dd>


                            <dt class="col-sm-5">Unit:</dt>
                            <dd class="col-sm-7"><?php echo $gi['unit']; ?></dd>

                            <dt class="col-sm-5">Grade:</dt>
                            <dd class="col-sm-7 mb-4"><?php echo $gi['grade']; ?></dd>
                            <?php }?>
                        </dl>
                 
                </div>
                <div id="item-3-2">
                    <h5 class="mt-3 ">Incoming Freshment</h5>
                    <div class="card mb-3"></div>

                                        
                    <dl class="row mt-3 ms-3" >

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
                <div id="item-3-3">
                    <h5 class="mt-3 ">School Choices</h5>
                    <div class="card mb-3"></div>


                    <dl class="row ms-3">
                    <?php  $choice = $admin->getAllChoice($a['id']);
                                    foreach($choice as $ce){
                                ?>
                            <dt class="col-sm-5">Subject:</dt>
                            <dd class="col-sm-7"><?php echo $ce['univ']; ?></dd>


                            <dt class="col-sm-5">Unit:</dt>
                            <dd class="col-sm-7"><?php echo $ce['course']; ?></dd>

                            <dt class="col-sm-5">Grade:</dt>
                            <dd class="col-sm-7 mb-4"><?php echo $ce['entrance_exam']; ?></dd>
                            <?php }?>
                        </dl>
                </div>
                <div id="item-4">
                <div class="hstack gap-3">
                <div class=""><h5 class="mt-3">Requirements</h5></div>
                <div class=" ms-auto"><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Edit Requirements
            </button>
            </div>
               
                </div>
                    
                    <div class="card mb-3"></div>



                    <dl class="row ms-3">
                  
                            <dt class="col-sm-5">ID Photo:</dt>
                            <dd class="col-sm-7 mb-4">Test 1</dd>


                            <dt class="col-sm-5">Family Profile:</dt>
                            <dd class="col-sm-7 mb-4">Test 1</dd>

                            <dt class="col-sm-5">Letter of Intent:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Parent Consent:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Copy of Grades:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Birth Certificate:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Indigency:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Reccommendation Letter:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Good Moral:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">School Diploma:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Form 137/138:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Acceptance Letter:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Enrollment Form:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Family Picture:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>

                            <dt class="col-sm-5">Sketch of House Area:</dt>
                            <dd class="col-sm-7 mb-4">test 1</dd>
                           
                        </dl>
                </div>
                




            </div>
        </div>
    </div>
</div>
<?php } ?>



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
    $applifiles = $admin->scholarInfo($id);
    
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








<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Remarks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <?php
        if(isset($id)) {
            $remarks = $admin->getRemarks($id);

            // Check if $remarks is an array or object before iterating
            if(is_array($remarks) || is_object($remarks)) {
                foreach($remarks as $r){
        ?>
                    <h4>Admin Remarks</h4>
                    <dd class="col-sm-8"> - <?php echo $r["remarks"];?></dd>
        <?php
                }
            } else {
                echo "No remarks found for the provided Scholar ID.";
            }
        } else {
            echo "Scholar ID not provided.";
        }
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const scrollspy = new bootstrap.ScrollSpy(document.body, {
        target: '#navbar-example3',
        offset: 50,
    });

    const scrollspyNavLinks = document.querySelectorAll('#navbar-example3 .nav-link');

    window.addEventListener('scroll', function () {
        let fromTop = window.scrollY + 50; // Add an offset for better visualization

        scrollspyNavLinks.forEach(link => {
            let section = document.querySelector(link.getAttribute('href'));

            if (
                section.offsetTop <= fromTop &&
                section.offsetTop + section.offsetHeight > fromTop
            ) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    });
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
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="applicant-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

         <!-- Link Bootstrap JS and Popper.js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>