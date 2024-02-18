<?php
// Start the session
session_start();
require '../classes/scholar.php';
require '../classes/database.php';

// Create a new instance of the Database class
$database = new Scholar(new Database());

// Fetch scholar ID from the session
$scholarsId = $_SESSION["id"];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $scholarID = $_POST['scholarID'];
    $yearLvl = ($_POST['yearLvl'] === 'other') ? $_POST['otherYearLevel'] : $_POST['yearLvl'];
    $firstName = $_POST['Firstname'];
    $lastName = $_POST['Lastname'];
    $email = $_POST['Email'];

    // Handle file upload
    $uploadDir = "../Uploads_gslip/";
    $uploadedFileName1 = $_FILES['file1']['name'];
    $uploadedFileName2 = $_FILES['file2']['name'];
    $uploadedFile1 = $uploadDir . $uploadedFileName1;
    $uploadedFile2 = $uploadDir . $uploadedFileName2;

    if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir . $uploadedFileName1) &&
        move_uploaded_file($_FILES['file2']['tmp_name'], $uploadDir . $uploadedFileName2)) {
        if ($database->insertData($scholarID, $firstName, $lastName, $email, $yearLvl, $uploadedFileName1, $uploadedFileName2)) {
            echo '<script>alert("Data uploaded successfully!"); window.location.href = "renewal.php";</script>';
            exit;
        } else {
            echo "Error inserting data.";
        }
    } else {
        echo "Error uploading file.";
    }
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
    
    <title>Renewal</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="scholardash.php">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>

            <div class="sidebar-brand-text mx-3" style="font-size: 28px; text-shadow: 4px 4px 4px #000;"> CCMFI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="scholardash.php">
                    <!-- DASHBOARD ICON -->
                   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                   </svg>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="allowancehistory.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1"/>
                </svg>
                    <span>Allowance</span>
                </a>
            </li>

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item active">
                <a class="nav-link collapsed" href="renewal.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
                <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
                </svg>
                    <span>Renewal</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="Announcement.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06"/>
               </svg>
                    <span>Announcement</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
          

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Tables -->
            

            <!-- Divider -->
           

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
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Renewal</h1>
                        
                    </div> -->

                    <!-- Content Row -->
                    <div class="row">

                    <div class="col-xl-6 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h4 class="m-0 font-weight-bold text-primary">Renewal</h4>
                            </div>
                            <div class="card-body">
                            <?php
                            $renewalDates = $database->getRenewalDates();
                            $currentDate = date('Y-m-d');
                            if ($currentDate >= $renewalDates['renewal_date_start'] && $currentDate <= $renewalDates['renewal_date_end']) {
                                // Before displaying the renewal form, check if the scholar has already submitted
                                if (!$database->hasSubmittedRenewal($scholarsId)) {
                            ?>
                            <form action="renewal.php" method="post" enctype="multipart/form-data">
                                <?php
                                    $scholarInfo = $database->getScholars($scholarsId);
                                    foreach($scholarInfo as $s){
                                ?>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="scholarid" name="scholarID" value="<?php echo $s["id"]?>" hidden><br>
                                <label for="firstname">First Name:</label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="Firstname" name="Firstname" value="<?php echo $s["f_name"]?>" readonly><br>
                                <label for="lastname">Last Name:</label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="Lastname" name="Lastname" value="<?php echo $s["l_name"]?>" readonly><br>
                                <label for="email">Email:</label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="Email" name="Email" value="<?php echo $s["email"]?>" readonly><br>
                                <?php } ?>

                                <label for="gwa">Year Level:</label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="yearLvl" id="yearLvlSelect" onchange="checkOtherOption()">
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="other">Other</option>
                                </select><br>
                                <div id="otherOption" style="display: none;">
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="otherYearLevel" id="otherYearLevelInput" placeholder="Enter your year level">
                                </div>
                                <label for="gradeslip">Upload Grade Slip:</label>
                                <input type="file" id="gradeslip" name="file1" required><br>
                                <label for="gradeslip">Upload Registration Form:</label>
                                <input type="file" id="regform" name="file2" required><br>
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                            </form>
                            <?php
                                } else {
                                    // Display a message indicating that the scholar has already submitted
                                    echo '<p>You have already submitted a renewal entry.</p>';
                                }
                            } else {
                                // Display a message indicating that renewal is not allowed at the current date
                                echo '<p>Renewal is not allowed at the current date.</p>';
                            }
                            ?>
</div>
</div>
</div>
                    <div class="col-xl-5 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Renewal List</h4>
                        </div>
                        <div class="card-body">
                        <table id="applicant" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date Renewed</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Files</th>
                                                <th scope="col">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                        $rewalInfo = $database->getRenewalInfo();
                                        $num = 1;
                                        foreach($rewalInfo as $s){

                                            if($s['renew_status'] == 0){
                                                $status = "Pending";
                                            }else{
                                                $status = "Accepted";
                                            }
                                    ?>
                                            <tr>
                                                <th scope="col"><?php echo $num; ?></th>
                                                <td><?php echo $s["date_renew"];?></td>
                                                <td><?php echo $status;?></td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#renewFilesModal<?php echo $s["id"];?>">Files</button></td>
                                            <td></td>
                                            </tr>
                                            <?php 
                                        $num++;
                                            } 
                                        ?>
                                        </tbody>
                                    </table>
                        </div>
                        </div>
                        </div>

<!-- Script for Year level other options -->
<script>
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
</script>
<!-- Script End -->

  <!-- Script for handling file upload -->
  <script>
   document.getElementById('fileInput').addEventListener('change', handleFileSelect);

   function handleFileSelect(event) {
     const file = event.target.files[0];

     if (file) {
       const reader = new FileReader();

       reader.onload = function(e) {
         const data = e.target.result;
         // Assuming the uploaded file is a CSV and contains the same structure as the table
         updateTableWithData(parseCSV(data));
       };

       reader.readAsText(file);
     }
   }

   function parseCSV(data) {
     // Custom CSV parsing logic based on your data format
     // For simplicity, you might want to use a CSV parsing library for more complex CSV structures
     const rows = data.split('\n');
     const tableData = [];

     for (const row of rows) {
       const columns = row.split(',');
       tableData.push(columns);
     }

     return tableData;
   }

   function updateTableWithData(data) {
     const tableBody = document.getElementById('workLogTable').getElementsByTagName('tbody')[0];
     tableBody.innerHTML = '';

     for (const row of data) {
       const tableRow = document.createElement('tr');
       for (const column of row) {
         const tableCell = document.createElement('td');
         tableCell.textContent = column;
         tableRow.appendChild(tableCell);
       }
       tableBody.appendChild(tableRow);
     }
   }
 </script>
                          </table>

                      
                        

                        <!-- Earnings (Monthly) Card Example -->
                      

                        <!-- Earnings (Monthly) Card Example -->
                

                        <!-- Pending Requests Card Example -->
                       

                    <!-- Content Row -->


                        <!-- Area Chart -->
                        

                                <!-- Card Header - Dropdown -->
                                

                        <!-- Pie Chart -->
                        
                    <!-- Content Row -->
                  

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            
            </div>
            <!-- End of Main Content -->

            <!-- Footer
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>
            End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
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
                    <a class="btn btn-primary" href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<!-- RenewFiles Modal-->
    <?php
    $renewalFiless = $database->getRenewalInfo();
        foreach($renewalFiless as $a){
    ?>
        <div class="modal fade" id="renewFilesModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="renewFilesModal<?php echo $a["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
            </div>
            <div class="modal-body">
                <table id="applicant-modal<?php echo $a["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Files</th>
                            <th>Details</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <tr>
                        <td>Grade Slip</td>
                        <td><a href="../Uploads_gslip/<?php echo $a["file1"]; ?>" target="_blank"><?php echo $a["file1"]?></a></td>
                    </tr>
                    <tr>
                        <td>Registration Form</td>
                        <td><a href="../Uploads_gslip/<?php echo $a["file2"]; ?>" target="_blank"><?php echo $a["file2"]?></a></td>
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
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

         <!-- Link Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

</body>

</html>
