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
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Scholarship Management System</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="shortcut icon" type="image/x-icon" href="../images/forcert1.png" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="../assets1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets1/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="../assets1/css/animate.css" />
    <link rel="stylesheet" href="../assets1/css/tiny-slider.css" />
    <link rel="stylesheet" href="../assets1/css/glightbox.min.css" />
    <link rel="stylesheet" href="../assets1/css/main.css" />
    <link rel="stylesheet" href="../assets1/css/2.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

      <!-- Style CSS -->
      <link rel="stylesheet" href="./css/style.css">
      <!-- Demo CSS (No need to include it into your project) -->
      <link rel="stylesheet" href="./css/demo.css">
      <!-- Material Icons -->
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<style>

.cd__main {
   display: block !important;
}

.fab-container {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: flex-start;
  user-select: none;
  position: fixed;
  bottom: 20px; /* Adjusted bottom */
  left: 20px; /* Adjusted left */
  transition: left 0.3s, height 0.3s;
  height: 50px; /* Adjusted height */
  width: 50px; /* Adjusted width */
  border-radius: 50%;
  background-color: #4ba2ff;
  z-index: 9999;
}

.fab-container:hover {
  transform: scale(1.1); /* Zoom in by 10% */
}

.fab-container .fab {
  position: relative;
  height: 50px; /* Adjusted height */
  width: 50px; /* Adjusted width */
  background-color: #4ba2ff;
  border-radius: 50%;
  z-index: 2;
}

.fab-container .fab::before {
  content: " ";
  position: absolute;
  bottom: 0;
  right: 0;
  height: 25px; /* Adjusted height */
  width: 25px; /* Adjusted width */
  background-color: inherit;
  border-radius: 0 0 10px 0;
  z-index: -1;
}


.fab-container .fab .fab-content .material-icons {
  color: white;
  font-size: 36px; /* Adjusted font size */
  
}



.fab-container .sub-button .material-icons {
  color: white;
}

.fab-container .fab .fab-content {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
  border-radius: 50%;
}


    </style>
    
</head>

<body>


    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Toolbar Start -->
        <!-- <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <?php
                        $userHasApplied = $admin->checkUserApplicationStatus($id); // Function that checks the database
                        ?> -->
                        <!-- <div class="toolbar-login">
                            <div class="button">
                            <?php if ($userHasApplied): ?>
                                <a href="../Pages-Applicant/Applicant-Requirements2.php" style="font-size: 15px; height: 43px;" class="btn btn-primary">View Submitted Files</a>
                                <?php else: ?>
                                    <button type="button" style="font-size: 15px; height: 43px;"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>

                                <?php endif; ?> -->
                                <!-- <button type="button" style="font-size: 15px; height: 43px;" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Toolbar End -->

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" >
                            <img src="../images/Management1.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                                <li class="nav-item"><a class="nav-link mr-5" href="#about">About</a></li>
                            </ul>

                            <!-- toolbar -->
                            <div class="toolbar-login" style="margin-left: 10px;">
    <div class="button">
        <?php if ($userHasApplied): ?>
            <a href="../Pages-Applicant/Applicant-Requirements2.php" style="font-size: 15px; height: 43px; background-color: #0EDC8D; color: white;" class="btn btn-primary">View Submitted Files</a>
        <?php else: ?>
            <button type="button" style="font-size: 15px; height: 43px; background-color: #0EDC8D; color: white;"  class="btn btn-primary mr-3" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
        <?php endif; ?>
        <button type="button" style="font-size: 15px; height: 43px; background-color: #0EDC8D; color: white;" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">Logout</button>
    </div>
</div>


                             <!-- toolbar end -->
                            
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="home" id="home">
    <div class="hero-area">
        <div class="hero-slider">
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('../assets1/images/hero/hero.png');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Scholarship Management</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Opening Doors of <br>Hope..</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Empowering students to achieve<br>
                                        their academic dreams
                                        </p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="#about" class="btn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--/ End Single Slider -->
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('../assets1/images/hero/hero2.png');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Scholarship Programs</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Building a strong foundation<br> through education </h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Scholarships are a means to enable deserving students to have an education, that might otherwise be beyond their reach, to encourage them to study well and is a great way to motivate them to perform even better. 
                                        </p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="#about" class="btn">Learn More</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('../assets1/images/hero/hero3.png');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Social Responsibility & Sustainability</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Empower communities and enlighten <br>families</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">We are committed to making a positive impact on society and empowering <br> the future generations.
                                        </p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="#about" class="btn">Learn More</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
        </div>
    </div>
    
    <!--/ End Hero Area -->

    <!-- Start About Us Area -->
    <div class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s">About Our Scholarship</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Welcome to Scholarship Management</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"> where we are dedicated to facilitating access to education for students worldwide. Our organization was founded with the mission of bridging the gap between deserving students and available scholarship opportunities.</p>
                            <p class="qote wow fadeInUp" data-wow-delay=".8s"></p>
                            <div class="button wow fadeInUp" data-wow-delay="1s">
                                <a href="#about" class="btn">Read More</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img height="550" src="../assets1/images/about/bg4.jpg" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /End About Us Area -->



    <section class="about" id="about">
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">About Us</h1>
                        <p>At the Scholarship Management System, we are committed to revolutionizing the process of scholarship administration. Our platform serves as a centralized hub where students can effortlessly discover, apply for, and track scholarships, while administrators efficiently manage and allocate funds. By leveraging cutting-edge technology and a user-friendly interface, we aim to empower students to pursue their academic dreams and enable institutions to optimize their scholarship programs. Join us in shaping a brighter future through accessible education for all.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
</section>
    
    <!-- /End About Us Area -->

    <!-- Start Newsletter Area -->
    
    <div class="newsletter-area section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <div class="newsletter-title">
                        
                        <h2>Mission</h2>
                        <p>Our mission is to empower students by providing them with the necessary resources and support to pursue their academic dreams. We believe that education is a fundamental right and should be accessible to all, regardless of financial background or social status.</p>
                        <br>
                        <h2>Vission</h2>
                        <p>Our vision is a world where every individual, regardless of background or circumstance, has the opportunity to pursue higher education and fulfill their academic potential. We strive to be the leading provider of innovative scholarship management solutions, driving positive change in education globally.</p>
                        <br>
                        <h2>What We Do</h2>
                        <p>Well-educated individuals, families, imbued with charity and truth,healed from poverty to help build a better tomorrow.</p>
                    </div>
                  
               
                </div>
            </div>
        </div>
    </section>
    <!-- /End Newsletter Area -->

    <!-- Start Call To Action Area -->
    <div class="call-action section overlay">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="call-content">
                        
                        <h2>Values</h2>
                        <p style="font-size: 17px"><b>Accessibility</b> We believe that education should be accessible to all, and we are dedicated to creating opportunities for students from diverse backgrounds to access scholarships.</p>
                  <br>
                  <p style="font-size: 17px"><b>Integrity</b> We uphold the highest standards of integrity, honesty, and transparency in all our interactions with students, partners, and stakeholders.</p>
                  <br>
                  <p style="font-size: 17px"><b>Excellence</b> We are committed to excellence in everything we do, from the quality of our scholarship management solutions to the level of service we provide to our users.</p>
                  <br>
                  <p style="font-size: 17px"><b>Innovation</b> We embrace innovation and continuously seek new ways to improve and enhance our scholarship management platform, ensuring that it remains at the forefront of the industry.</p>
                  <br>
                  <p style="font-size: 17px"><b>Empowerment</b> We empower students to take control of their educational journey by providing them with the tools, resources, and support they need to succeed.</p>
                  <br>
                  <p style="font-size: 17px"><b>Collaboration</b> We believe in the power of collaboration and work closely with universities, corporations, foundations, and government agencies to expand scholarship opportunities and create positive change in education.</p>
                  <br>
                  <p style="font-size: 17px"><b>Diversity and Inclusion</b> We celebrate diversity and value the unique perspectives and contributions of all individuals. We are committed to fostering an inclusive environment where everyone feels welcome and supported.</p>
                    
                    </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
    <!-- /End Call To Action Area -->


    <!-- Start Achivement Area -->
    <section class="our-achievement section overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="counter"><span id="secondo1" class="countup" cup-end="100">100</span>+</h3>
                        <h4>Scholars</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                        <h3 class="counter"><span id="secondo2" class="countup" cup-end="70">70</span>+</h3>
                        <h4>Programs</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100</span>%</h3>
                        <h4>Satisfaction</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100%</span>%</h3>
                        <h4>Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achivement Area -->
    <!-- Start Clients Area -->
    
    <!-- Start Footer Area -->
    <!-- <section class="requirements" id="requirements"> -->
    <footer class="footer style2">
   
     <!-- Adjusted class and input -->
     <center>
     <!-- <div class="col-lg-10 col-md-12 col-12"> -->
    <!-- Card Element -->
    <!-- <div class="card-header bg-white py-2 text-center">
        <button class="accordion-button collapsed mx-auto text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: #0EDC8D;">
            <span class="fw-bold h6 mb-0" style="color: black;">REQUIREMENT LIST FOR APPLICATION</span>   
        </button>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <ul class="list-group list-group-flush text-center">
            <li class="list-group-item">2x2 latest photo</li>
            <li class="list-group-item">Certified True Copy of Birth Certificate</li>
            <li class="list-group-item">Certified True Copy of Form 137 or 138 / Grade Slip</li>
            <li class="list-group-item">Latest Copy of Grades</li>
            <li class="list-group-item">Barangay Certification</li>
            <li class="list-group-item">Latest Income Tax Return of Parents / Affidavit of Non-filing</li>
            <li class="list-group-item">Indigency</li>
        </ul>
        <div class="card-footer bg-white py-2 text-center">
            <a data-toggle="modal" data-target="#applyModal" class="btn mt-3" style="background-color: #0EDC8D; color: #ffffff;">Apply Now</a>
        </div>
    </div>
</div> -->
    
</center>
    </div>
</div>
</div>
</div>
        </div>
    </div>


        <!--/ End Footer Middle -->

        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">
                                <p class="fw-bold fs-5">Scholar Management System <a href="" rel="nofollow"
                                        target="_blank">(SMS)</a></p>

                                        <p class=" fs-6">&copy; 2024 All Rights Reserved. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

<!-- Second Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold text-center">Are you sure you want to proceed?</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body">
        <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width: 200px; height: 40px; font-size: 16px;" onclick="window.location.href='freshmen.php';">Yes, Continue</button>
        <p class="text-center mt-2">Click here if all your requirements are ready.</p>
        <button type="button" class="btn btn-secondary mx-auto d-block mt-3" style="width: 200px; height: 40px; font-size: 16px;" data-bs-dismiss="modal">No, Cancel</button>
        <p class="text-center mt-2">Click here to review the requirements.</p>
      </div>
    </div>
  </div>
</div>



 <!-- Modal for Forgot Password -->
 <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="forgotPasswordModalLabel">Forgot Password?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>
                <form action="functions/forgot_pass.php" method="post">
                    <div class="form-group">
                        <label class="fw-bold" for="forgotEmail">Email Address:</label>
                        <input type="email" id="forgotEmail" name="forgotEmail" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var passwordIcon = document.getElementById("showPasswordIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        }
    }
</script>
    <!-- End of Modal -->
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

     <!--$%adsense%$-->
     <main class="cd__main">
      

     <div class="fab-container">
  <button type="button" class="fab shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <div class="fab-content">
      <span class="material-icons">description</span>
    </div>
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requirements List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="list-group list-group-flush text-center">
      <li class="list-group-item">2x2 latest photo</li>
            <li class="list-group-item">Certified True Copy of Birth Certificate</li>
            <li class="list-group-item">Certified True Copy of Form 137 or 138 / Grade Slip (For Sr. High School Graduates)</li>
            <li class="list-group-item">Certificate of Honor or Award (For Sr. High School Graduates)</li>
            <li class="list-group-item">Latest Copy of Grades (For College Enrolled Students)</li>
            <li class="list-group-item">Barangay Certification</li>
            <li class="list-group-item">Latest Income Tax Retur of Parents /Affidavit of Non-filing</li>
            <li class="list-group-item">Indigency</li>
            <li class="list-group-item">General Weighted Average should be 85 and above for Senior High School Graduates<br>
                                        And 2.25 and above for College Enrolled</li>
        </ul>
      </div>
      <div class="card-footer bg-white py-2 text-center">
        <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#applyModal" style="background-color: #0EDC8D; color: #ffffff;">Apply Now</button>
      </div>
    </div>
  </div>
</div>
      

</style>
    <!-- ========================= JS here ========================= -->
    <script src="../assets1/js/bootstrap.min.js"></script>
    <script src="../assets1/js/count-up.min.js"></script>
    <script src="../assets1/js/wow.min.js"></script>
    <script src="../assets1/js/tiny-slider.js"></script>
    <script src="../assets1/js/glightbox.min.js"></script>
    <script src="../assets1/js/main.js"></script>
    <script src="../assets1/js/2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
        });
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
 

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('scholar');
    console.log(successValue);

    if(successValue === "errorEmail"){
        Swal.fire({
            icon:'error',
            title:'Wrong Email',
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
    }else if(successValue === "errorPassword"){
        Swal.fire({
            icon:'error',
            title:'Wrong Password',
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
    }else if(successValue === "success"){
        Swal.fire({
            icon:'success',
            title:'Application Complete',
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
    }else if(successValue === "alreadyExist"){
        Swal.fire({
            icon:'error',
            title:'Email Already Exist!',
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


    function showPassword() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}


$('#applyModal').on('show.bs.modal', function () {
    $('#exampleModal').modal('hide');
  });
  
</script>
</body>

</html>