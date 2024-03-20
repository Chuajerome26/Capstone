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
    </style>
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column vh-100">

            <!-- Main Content -->
            <div id="content">
          

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 sticky-top shadow">
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                  </button>

                  <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                      <ul class="navbar-nav ml-auto">
                          <div class="topbar-divider d-none d-sm-block"></div>
                          <li class="nav-item dropdown no-arrow">
                              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $info[0]['l_name']; ?></span>
                                  <img class="img-profile rounded-circle"
                                      src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>">
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
                  </div>
              </nav>


                <main>

        <div class="container-fluid  col-11">
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
                            <span class='card-text'><i class="fa-solid fa-envelope me-1"></i> <?php echo $a["email"]?></span>;
                        </div>
                        <div class="mb-1 ms-1">
                            <span class="card-text"><i class="fa-solid fa-phone me-2"></i><?php echo $a['mobile_number'];?></span>
                        </div>
                        <div class="mb-1 ms-1">
                            <span class="card-text"><i class="fab fa-facebook me-1"></i> <a href="<?php echo $a["fb_link"];?>" target="_blank"><?php echo $a["fb_link"];?></a>
                        </div>
                        <div class="mb-1 ms-1">
                            <span class="card-text"><i class="fa-solid fa-location-dot me-1"></i> <?php echo $a['address'];?> </span>
                        </div>
                    </div>
                </div>
            </div>



                    <!-- <div class="row mb-3">
                        <div class="col-md-3 mx-end text-end mx-0">
                        <img class="img-fluid shadow-sm thumbnail shadow-sm"  src='../Scholar_files/<?php echo $pic[0]['file_name'];?>' alt="">
                        </div>

                        <div class="col-md-9" style=" font-size: 14px ;">
                            <h5 class="card-title fw-bold"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></h5>
                            <div class="mb-2">
                                <span class='card-text'><i class='fa-regular fa-calendar-days '></i> <?php echo $a["email"];?></span>;
                                </div>
                            <div class="mb-2">
                                <span class="card-text"><i class="fa-solid fa-location-dot "></i><?php echo $a['mobile_number'];?></span>
                            </div>
                            <div class="mb-2">
                                <span class="card-text"><i class="fa-solid fa-circle-info "></i> <a href="<?php echo $a["fb_link"];?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook text-primary fs-6 mt-1"></i></span> Facebook Link
                            </div>
                            <div >
                                <span class="card-text"><i class="fa-solid fa-calendar-check "></i></i> Date Registered : test </span>
                            </div>
                        </div>
                    </div> -->
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTabs">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold " style="font-size:15px" id="overview-tab" data-bs-toggle="tab"
                                        href="#overview"> Personal Information </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" style="font-size:15px" id="agenda-tab" data-bs-toggle="tab" href="#agenda">
                                        Academic Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" style="font-size:15px" id="sponsors-tab" data-bs-toggle="tab" href="#sponsors">
                                        Requirements List</a>
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
                                                <dd class="col-sm-7"><?php echo $a['date_of_birth'];?></dd>

                                                <dt class="col-sm-5">Place of Birth:</dt>
                                                <dd class="col-sm-7"><?php echo $a['b_place'];?></dd>

                                                <dt class="col-sm-5">Citizenship:</dt>
                                                <dd class="col-sm-7"><?php echo $a['citizenship'];?></dd>

                                                <dt class="col-sm-5">Religion:</dt>
                                                <dd class="col-sm-7"><?php echo $a['religion'];?></dd>

                                                <dt class="col-sm-5">Province:</dt>
                                                <dd class="col-sm-7"><?php echo $a['province'];?></dd>

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

                                                <dt class="col-sm-5">Skills:</dt>
                                                <dd class="col-sm-7"><?php echo $a['skills'];?></dd>

                                                <dt class="col-sm-5">Medical Condition:</dt>
                                                <dd class="col-sm-7"><?php echo $a['med_condition'];?></dd>
                                                
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
                                        <p class="mb-3 fw-bold">Mother Information</p> 

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

                                   







                                    <h6 class="fw-bold mb-3 mt-2">Guardian Information</h6>
                                    <hr>
                                    <div class="col-md-12" style="font-size: 14px;">
                                    <dl class="row ms-2">
                                       
                                        <dt class="col-sm-4">Name:</dt>
                                        <dd class="col-sm-8"><?php echo $a["guardian"];?></dd>


                                        <dt class="col-sm-4">Contact No.:</dt>
                                        <dd class="col-sm-8"><?php echo $a["guardian_contact"];?></dd>

                                        <dt class="col-sm-4">Emergency Contact:</dt>
                                        <dd class="col-sm-8"><?php echo $a["emergency_contact"];?></dd>

                                        <dt class="col-sm-4">Relationship:</dt>
                                        <dd class="col-sm-8"><?php echo $a["guardian_rs"];?></dd>
                                                    
                                        </dl>
                                        
                                    </div>
                                        
                                      



                                    <h6 class="fw-bold mt-2">Siblings Details:</h6>
                                    <hr>
                                    <dl class="row ms-3" style="font-size: 14px;">
                                        <dt class="col-sm-3 fw-bold mb-1">
                                            Type of Registration
                                        </dt>
                                        <dd class="col-sm-9">
                                            Online Registration
                                        </dd>
                                        <dt class="col-sm-3 fw-bold">
                                            Target Participant
                                        </dt>
                                        <dd class="col-sm-9">
                                            Student, Teacher
                                        </dd>
                                    </dl>




                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <h6 class="fw-bold mb-3">Requested Approved</h6>
                                            <hr>
                                            <!-- Description -->
                                            <div class="card-text " style="font-size: 14px ;">
                                            <dl class="row ">
                                                <dt class="col-sm-7 fw-bold mb-1">
                                                <i class="fa-solid fa-calendar-minus me-1"></i>Date Registered: 
                                                </dt>
                                                <dd class="col-sm-5">
                                                test
                                                </dd>

                                                <dt class="col-sm-7 fw-bold mb-1">
                                                <i class="fa-solid fa-calendar-check me-1"></i>Date Approved: 
                                                </dt>
                                                <dd class="col-sm-5">
                                               test
                                                </dd>
                                            </dl>
                                            </div>
                                            <!-- Button -->
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-sm btn-primary" type="button">View Approved Letter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h6 class="fw-bold mb-3">Registered Participants</h6>
                                            <hr>
                                            <!-- Description for online registered participants -->
                                            <div class="d-flex justify-content-between" style=" font-size: 14px ;">
                                            <dl class="row ms-2" style="font-size: 14px;">
                                                <dt class="col-sm-8 fw-bold mb-1">
                                                    Online Registration
                                                </dt>
                                                <dd class="col-sm-4">
                                                1021/123
                                                </dd>
                                                <dt class="col-sm-8 fw-bold">
                                                    Walk-in Registration
                                                </dt>
                                                <dd class="col-sm-4">
                                               test
                                                </dd>
                                            </dl>
                                            
                                            </div>
                                           
                                            <!-- Button -->
                                            <div class="d-grid gap-2 mt-1">

                                            <button type="submit" class="btn btn-primary btn-sm  approveButton w-100" data-bs-toggle="modal" data-bs-target="#ParticipantModal<?php echo $row['request_id']; ?>">
                                                <i class="fa-solid fa-list me-2"></i>View All Participants
                                            </button>

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
                            <h5 class="text-uppercase my-3 text-primary fw-bold">
                                Scheduled Events
                            </h5>
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <ul class="list-timeline list-timeline-primary">

                                        <li
                                            class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column row">
                                            <p class="my-0 text-dark flex-fw text-sm"><span
                                                    class="text-primary me-2 time">01:00 to 02:00</span><span
                                                    class="mx-2 events">Introduction</span></p>
                                        </li>

                                        <li
                                            class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column row">
                                            <p class="my-0 text-dark flex-fw text-sm"><span
                                                    class="text-primary me-2 time">02:00 to 03:00</span><span
                                                    class="mx-2 events">Explanation</span></p>
                                        </li>

                                        <li
                                            class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column row">
                                            <p class="my-0 text-dark flex-fw text-sm"><span
                                                    class="text-primary me-2 time">03:00 to 04:00</span><span
                                                    class="mx-2 events">Registration</span></p>
                                        </li>
                                        </li>

                                        <li
                                            class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column row">
                                            <p class="my-0 text-dark flex-fw text-sm"><span
                                                    class="text-primary me-2 time">04:00 to 05:00</span><span
                                                    class="mx-2 events">Information</span></p>
                                        </li>

                                        <li
                                            class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column row">
                                            <p class="my-0 text-dark flex-fw text-sm"><span
                                                    class="text-primary me-2 time">05:00 to 06:00</span><span
                                                    class="mx-2 events">Outroduction</span></p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Sponsors Tab Content -->
                <div class="tab-pane fade" id="sponsors" role="tabpanel" aria-labelledby="sponsors-tab">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="fw-bold">Team Coordinator/s</h6>
                            <div class="row ms-4">
                                <div class="col-lg-4 mb-3">
                                    <div>President: Mark Zuckerberg</div>
                                    <div>Vice President: Sheryl Sandberg</div>
                                    <div>Manager: Antent Sandberg</div>
                                    <!-- Add more coordinators as needed -->
                                </div>
                            </div>

                            <h6 class="fw-bold">Sponsors and Partners</h6>
                        </div>
                    </div>
                </div>
            </div>


                 
               


            <?php } ?>
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