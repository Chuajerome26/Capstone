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


<body class="">
<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center">
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6">
        <img src="../images/consuelo.jpg" alt="Image" class="img-fluid">
      </div>
      <div class="">
        <header>
          <h1 class="display-7 text-center">Consuelo Chito Madrigal Foundation Inc.(CCMFI)</h1>
        </header>
      </div>
    </div>
</div>

<form action="../functions/applicants-register.php" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()"> 
<div class="container col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto mt-3">
<div class="card h-100">
<div class="card-body">
<div class="row gutters">

<!-- IV. COLLEGES/UNIVERSITIES OF CHOICE (IF INCOMING FRESHMAN) -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <h7 class="mb-2 text-primary">IV. COLLEGES/UNIVERSITIES OF CHOICE (IF INCOMING FRESHMAN)</h7>
    <div class="border-bottom container mb-3 border border-1"></div>
</div>

<style>
        /* Define the row and column layout */
        .row {
            display: flex;
        }
        .column {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<!-- Table 1 -->
<!-- Header of this Table -->
 
    <table style="width: 100%; border: 1px solid black;">
  <tr>
  <div class="row">
        <div class="column" style="font-weight: bold; border: 1px solid black;">COLLEGE/UNIVERSITIES OF CHOICE</div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">COURSE/DEGREE MAJOR</div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">ENTRANCE EXAM TAKEN?</div>
    </div> 
  </tr>

  <!-- Content -->

  <!-- row 1 -->
  <tr>
  <div class="row">
  <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type College/University:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type Degree:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">
        <input type="radio" id="myradioYes" name="myRadio1" value="Yes1" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadio1" style="font-size: 16px; width: 50px; height: 15px;">YES</label>
    <input type="radio" id="myradioNo" name="myRadio1" value="No1" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadio1" style="font-size: 16px; width: 50px; height: 15px;">NO</label>
    <p>
<h6 style="font-weight: bold;">IF "NO," WHEN:</h6>
<input type="date" name="date" id="date" value="2023-03-14">
</p>
<p>
<h6 style="font-weight: bold;">IF "YES:"</h6> 
<input type="radio" id="myradioPass" name="myRadio2" value="Pass" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadio2" style="font-size: 16px; width: 50px; height: 15px;">PASS</label>
<input type="radio" id="myradioFail" name="myRadio2" value="Fail" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadio2" style="font-size: 16px; width: 50px; height: 15px;">FAIL</label>
<input type="radio" id="myradioWaitlist" name="myRadio2" value="Waitlist" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadio2" style="font-size: 16px; width: 80px; height: 15px;">WAITLIST</label>
</p>
</div>
  </tr>

  <!-- row 2 -->
  <tr>
  <div class="row">
  <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type College/University:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type Degree:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">
        <input type="radio" id="myRadioYes" name="myRadio3" value="Yes" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadioYes" style="font-size: 16px; width: 50px; height: 15px;">YES</label>
    <input type="radio" id="myRadioNo" name="myRadio3" value="No" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadioNo" style="font-size: 16px; width: 50px; height: 15px;">NO</label>
    <p>
<h6 style="font-weight: bold;">IF "NO," WHEN:</h6>
<input type="date" name="date" id="date" value="2023-03-14">
</p>
<p>
<h6 style="font-weight: bold;">IF "YES:"</h6> 
<input type="radio" id="myRadioPass" name="myRadio4" value="Pass" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioPass" style="font-size: 16px; width: 50px; height: 15px;">PASS</label>
<input type="radio" id="myRadioFail" name="myRadio4" value="Fail" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioFail" style="font-size: 16px; width: 50px; height: 15px;">FAIL</label>
<input type="radio" id="myRadioWaitlist" name="myRadio4" value="Waitlist" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioWaitlist" style="font-size: 16px; width: 80px; height: 15px;">WAITLIST</label>
</p>
</div>
  </tr>

    <!-- row 3 -->
  <tr>
  <div class="row">
  <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type College/University:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">        
        <form action="/download" method="POST" enctype="multipart/form-data">
        <label for="words">Type Degree:</label>
        <input type="text" name="degree" id="degree" style="display: block; height: 80%; width: 100%; margin-bottom: 10px;">
    </div>
        <div class="column" style="font-weight: bold; border: 1px solid black;">
        <input type="radio" id="myRadioYes" name="myRadi5" value="Yes" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadioYes" style="font-size: 16px; width: 50px; height: 15px;">YES</label>
    <input type="radio" id="myRadioNo" name="myRadio5" value="No" style="width: 16px; height: 16px; margin-right: 10px">
    <label for="myRadioNo" style="font-size: 16px; width: 50px; height: 15px;">NO</label>
    <p>
<h6 style="font-weight: bold;">IF "NO," WHEN:</h6>
<input type="date" name="date" id="date" value="2023-03-14">
</p>
<p>
<h6 style="font-weight: bold;">IF "YES:"</h6> 
<input type="radio" id="myRadioPass" name="myRadio6" value="Pass" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioPass" style="font-size: 16px; width: 50px; height: 15px;">PASS</label>
<input type="radio" id="myRadioFail" name="myRadio6" value="Fail" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioFail" style="font-size: 16px; width: 50px; height: 15px;">FAIL</label>
<input type="radio" id="myRadioWaitlist" name="myRadio6" value="Waitlist" style="width: 16px; height: 16px; margin-right: 10px">
<label for="myRadioWaitlist" style="font-size: 16px; width: 80px; height: 15px;">WAITLIST</label>
</p>
</div>
  </tr>
</table>

<br>

<!-- Table 2 -->
<table style="width: 100%; border: 1px solid black;">
  <tr>
    <!-- row1 -->
  <div class="row">
        <div class="column" style="font-weight: bold; border: 1px solid black;">Did you apply for / are you recipient of other scholarship?
        <input type="radio" id="myRadioYes" name="myRadio7" value="Yes" style="width: 16px; height: 16px; margin-left: 80px; margin-right: 20px; margin-left: 10px;">
    <label for="myCheckbox" style="font-size: 16px; width: 50px; height: 15px;">YES</label>
    <input type="radio" id="myRadioNo" name="myRadio7" value="No" style="width: 16px; height: 16px; margin-left: 80px; margin-right: 10px">
    <label for="myCheckbox" style="font-size: 16px; width: 50px; height: 15px;">NO</label>
    <div>
  <input type="text" name="type" placeholder="TYPE" style="display: block; width: 31.1%; margin-bottom: 10px"> 
  <input type="text" name="coverage" placeholder="COVERAGE" style="display: block; width: 31.1%; margin-bottom: 10px">
  <input type="text" name="status" placeholder="STATUS" style="display: block; width: 31.1%; margin-bottom: 10px">
</div>
    </div>
    </div> 

    <!-- row 2 -->
    <div class="row">
        <div class="column" style="font-weight: bold; border: 1px solid black;">
        <input type="text" name="input answer" placeholder="How did you learn about CCMFI Scholarship?" style="display: block; width: 100%; font-weight: bold; "> 
    </div>
    </div> 

     <!-- row 3 -->
     <div class="row">
        <div class="column" style="font-weight: bold; border: 1px solid black;">
        <input type="text" name="input answer" placeholder="Why are you applying for this scholarship?" style="display: block; width: 100%; font-weight: bold; "> 
    </div>
    </div> 

    <!-- row 4 -->
    <div class="row">
      
    <div class="column" style="font-weight: bold; border: 1px solid black;">Will are you applying for this scholarship?
        <div>

  <input type="radio" id="myRadioYes" name="myRadio8" value="Yes" style="width: 16px; height: 16px; margin-right: 10px;">
  <label for="myCheckboxYes" style="font-size: 16px; width: 50px; height: 15px;">YES</label>
</div>
<div>
  <input type="radio" id="myRadioNo" name="myRadio8" value="No" style="width: 16px; height: 16px; margin-right: 10px;">
  <label for="myCheckboxNo" style="font-size: 16px; width: 50px; height: 15px;">NO</label>
</div>
<div>
  <input type="radio" id="myRadioI don't know" name="myRadio8" value="I don't know" style="width: 16px; height: 16px; margin-right: 10px;">
  <label for="myI don't know" style="font-size: 16px; width: 150px; height: 15px;">I DON'T KNOW</label>
</div>

<form id="explainForm">
        <label for="texline">Explain your answer:</label>
        <textarea id="texline" name="texline" rows="1" cols="50"></textarea>
    </form>
    <div id="explainResult"></div>
    <script>
        function explainAnswer() {
            var texline = document.getElementById('texline').value;
            document.getElementById('explainResult').innerHTML = 'Explain your answer:<br>' + texline;
        }
    </script>   
    </div>
    </div> 
  </tr>

  <div>
    <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  </div>


<div class="row gutters">

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
