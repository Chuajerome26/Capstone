<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>CCMF FORM</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <style>
    
    	body {
    margin: 0;
    padding-top: 5px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}

.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


    </style>
</head>
<body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button id="backButton" class="btn btn-primary">Back</button>

                        <script>
                        document.getElementById('backButton').addEventListener('click', function(event) {
                                var confirmAction = confirm("Are you sure you want to go back?");
                                if (confirmAction) {
                                    // Perform the desired action here
                                    window.history.back(); // Navigate back
                                } else {
                                    // Handle the case when the user cancels the action
                                    console.log("Action cancelled.");
                                }
                            });
                            </script>

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
            </div>
                <!-- End of Topbar -->
</div>
</div>


<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center">
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6">
        <img src="../images/consuelo.jpg" alt="Image" class="img-fluid">
      </div>
      <div class="">
        <header>
          <h1 class="display-7 text-center">Consuelo Chito Madrigal Foundation (CCMF)</h1>
        </header>
      </div>
    </div>
</div>

<form action="../functions/applicants-register.php" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()"> 
<div class="container col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto mt-3">
<div class="card h-100">
<div class="card-body">
<div class="row gutters">
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h4 class="mt-3 mb-2 text-primary" class="font-weight-bold">Requirements</h4>
    </div>
    <div class="border-bottom container mb-3 border border-1"></div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r1" class="font-weight-bold">Application form</label>
    <input class="form-control" type="file" name="appf0rmz" accept=".jpeg, .jpg, .png, .pdf" required>
                        </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r2" class="font-weight-bold">2x2 ID photo</label>
    <input class="form-control" type="file" name="2x2" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r3" class="font-weight-bold">Affectivity test</label>
    <input class="form-control" type="file" name="affect" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r4" class="font-weight-bold">Family profile</label>
    <input class="form-control" type="file" name="Fprof" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r5" class="font-weight-bold">Letter of intent</label>
    <input class="form-control" type="file" name="Letofint" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r6" class="font-weight-bold">Written parents consent</label>
    <input class="form-control" type="file" name="Writ" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r7" class="font-weight-bold">Latest Copy of Grades</label>
    <input class="form-control" type="file" name="LCOG" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r8" class="font-weight-bold">Copy of Birth Certificate</label>
    <input class="form-control" type="file" name="COBC" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r9" class="font-weight-bold">Certificate of Indigency</label>
    <input class="form-control" type="file" name="COI" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r10" class="font-weight-bold">Recommendation letter from Adviser/Principal</label>
    <input class="form-control" type="file" name="RECLET" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r11" class="font-weight-bold">Certificate of Good Moral Standing</label>
    <input class="form-control" type="file" name="GMoral" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r12" class="font-weight-bold">Copy of High School Diploma</label>
    <input class="form-control" type="file" name="HighDip" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r13" class="font-weight-bold">Copy of Form 137/138</label>
    <input class="form-control" type="file" name="F137" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r14" class="font-weight-bold">Copy of College/University Acceptance Letter</label>
    <input class="form-control" type="file" name="AccLet" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r15" class="font-weight-bold">Copy of Enrollment Form</label>
    <input class="form-control" type="file" name="EnForm" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r16" class="font-weight-bold">Family Picture</label>
    <input class="form-control" type="file" name="Fpict" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
                        </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="r17" class="font-weight-bold">Sketch of house area and directions for commuting from CCMF site</label>
    <input class="form-control" type="file" name="Sketch" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
    </div>
    
<div class="row gutters">
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript">
   
</script>
</body>
</html>
