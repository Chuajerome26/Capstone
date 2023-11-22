<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>CCMF FORM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

<style type="text/css">
    
    	body {
    margin: 0;
    padding-top: 40px;
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-7 static-top shadow">
                
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->

                             <!-- Dropdown - Messages -->
                             <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
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
                        </li> -->

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i> -->
                                <!-- Counter - Alerts -->
                                <!-- <span class="badge badge-danger badge-counter">3+</span>
                            </a> -->
                            <!-- Dropdown - Alerts -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
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
                        </li> -->

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i> -->
                                <!-- Counter - Messages -->
                                <!-- <span class="badge badge-danger badge-counter">7</span>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
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
                        </li> -->

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
</div>
</div>


<body class="">
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

<!-- PERSONAL INFORMATION -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <h4 class="mb-2 text-primary">Personal's Information</h4>
    <div class="border-bottom container mb-3 border border-1"></div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Fname" class="font-weight-bold">First Name:</label>
        <input type="text" class="form-control" name="f_name" placeholder="First Name" value="<?php echo isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : ''; ?>" required>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Lname" class="font-weight-bold">Last Name:</label>
        <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="<?php echo isset($_POST['l_name']) ? htmlspecialchars($_POST['l_name']) : ''; ?>" required>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : ''; ?>
        <label for="gender" class="font-weight-bold">Gender:</label>
        <select class="form-control" name="gender" id="exampleFormControlSelect1">
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
</select>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Cstat" class="font-weight-bold">Civil Status:</label>
        <input type="text" class="form-control" name="cStatus" placeholder="Civil Status" value="<?php echo isset($_POST['cStatus']) ? htmlspecialchars($_POST['cStatus']) : ''; ?>" required>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Cship" class="font-weight-bold" >Citizenship</label>
<input type="text" class="form-control" name="citizenship" placeholder="Enter Citizenship" value="<?php echo isset($_POST['citizenship']) ? htmlspecialchars($_POST['citizenship']) : ''; ?>" required>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="website" class="font-weight-bold" >Date of Birth:</label>
<input type="date" class="form-control" name="bday" value="<?php echo isset($_POST['bday']) ? htmlspecialchars($_POST['bday']) : ''; ?>" required>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="Bplace" class="font-weight-bold" >Birthplace:</label>
    <input type="text" class="form-control" name="bplace" placeholder="Birthplace" value="<?php echo isset($_POST['bplace']) ? htmlspecialchars($_POST['bplace']) : ''; ?>" required>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
        <label for="rgion" class="font-weight-bold">Religion:</label>
        <input type="text" class="form-control" name="religion" placeholder="Religion" value="<?php echo isset($_POST['religion']) ? htmlspecialchars($_POST['religion']) : ''; ?>" required>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="Mnum" class="font-weight-bold">Mobile Number:</label>
            <input type="number" class="form-control" name="mNum" placeholder="Enter Mobile Number" value="<?php echo isset($_POST['mNUm']) ? htmlspecialchars($_POST['mNum']) : ''; ?>" onkeydown="return onlyNumberKey(event)" required>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                <label for="Eadd" class="font-weight-bold">Email Address:</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                    <label for="adds" class="font-weight-bold">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" required>
                    </div>
                    </div>
<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h4 class="mt-3 mb-2 text-primary">Grade Information</h4>
        <div class="border-bottom container mb-3 border border-1"></div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="tsubj" class="font-weight-bold">Total Subject:</label>
            <input type="number" class="form-control" name="totalSub" placeholder="Total Subject" value="<?php echo isset($_POST['totalSub']) ? htmlspecialchars($_POST['totalSub']) : ''; ?>" required>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="Tunit" class="font-weight-bold">Total Units:</label>
            <input type="number" class="form-control" name="totalUnits" placeholder="Total Units" value="<?php echo isset($_POST['totalUnits']) ? htmlspecialchars($_POST['totalUnits']) : ''; ?>" required>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="genwa" class="font-weight-bold">General Weighted Average:</label>
            <input type="number" class="form-control" name="gwa" placeholder="GWA" value="<?php echo isset($_POST['gwa']) ? htmlspecialchars($_POST['gwa']) : ''; ?>" required> 
        </div>
    </div>
<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h4 class="mt-3 mb-2 text-primary" class="font-weight-bold">Requirements</h4>
    </div>

    <div class="border-bottom container mb-3 border border-1"></div>

<div class="row gutters">
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="Fname" class="font-weight-bold">Upload 2X2 Name Photo</label>
    <!-- <label for="formFile" class="form-label"></label> -->
    <input class="form-control" type="file" name="idPhoto" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
</div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
        <label for="Tunit" class="font-weight-bold">Latest Copy of Grades:</label>
        <!-- <label for="formFile" class="form-label"></label> -->
        <input class="form-control" type="file" name="grades" accept=".jpeg, .jpg, .png, .pdf" required>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="Tunit" class="font-weight-bold">Copy of Birth Certificate/PSA</label>
            <!-- <label for="formFile" class="form-label"></label> -->
            <input class="form-control" type="file" name="PSA" accept=".jpeg, .jpg, .png, .pdf" required>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                <label for="Tunit" class="font-weight-bold">Certificate of Good Moral</label>
                <!-- <label for="formFile" class="form-label"></label> -->
                <input class="form-control" type="file" name="goodMoral" accept=".jpeg, .jpg, .png, .pdf" required>
                </div>
                </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <label for="Fname" class="font-weight-bold">Copy of Enrollment Form </label>
                        <label for="formFile" class="form-label"></label>
                        <input class="form-control" type="file" name="eForm" accept=".jpeg, .jpg, .png, .pdf" required>
                        </div>
                        </div>
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
