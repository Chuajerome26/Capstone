
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';
    include '../email-design/renewalStartEmail-design.php';
    include '../email-design/renewalEndEmail-design.php';
    include '../email-design/renewalReminder-design.php';
    include '../email-design/renewalWarning1-design.php';
    include '../email-design/renewalWarning2-design.php';
    include '../email-design/renewalWarning3-design.php';
    date_default_timezone_set('Asia/Manila');
    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);
    
    $id = $_SESSION['id'];
    $date = date('Y-m-d');
    $admin_info = $admin->adminInfo($id);
    $renewal_info = $scholar->getRenewalNewInfo();
    $renewalDates = $scholar->getRenewalDates();
    $scholars = $admin->getScholars();
    $scholar->updateNonComStatus($id);

    $scholars_id = [];
    foreach($scholars as $z123){
        $scholars_id [] = $z123['scholar_id'];
    }

    $scholar_renew = [];
    foreach($renewal_info as $z1234){
        $scholar_renew [] = $z1234['scholar_id'];
    }
    
    $not_renewed_scholar_ids = array_diff($scholars_id, $scholar_renew);

    $not_renewed_scholars = [];
    foreach ($not_renewed_scholar_ids as $scholar_id) {
        // Find the scholar with this ID in the list of all scholars
        foreach ($scholars as $scholar123) {
            if ($scholar123['scholar_id'] === $scholar_id) {
                $not_renewed_scholars[] = $scholar123;
                break; // Move to the next not renewed scholar
            }
        }
    }

    $start = $renewalDates['renewal_date_start'];
    $end = $renewalDates['renewal_date_end'];

    $dateFormat = date('M d, Y', strtotime($renewalDates['renewal_date_start']));
    $dateFormat1 = date('M d, Y', strtotime($renewalDates['renewal_date_end']));

    // Email si user two days before the end date
    $twoDaysBeforeEnd = date('Y-m-d', strtotime($end . ' -2 days'));

    //Email message for renewal start, end, and reminder
    $messageStart = renewalStartEmail($dateFormat);
    $messageReminder = renewalReminderEmail($dateFormat1);
    $messageEnd = renewalEndEmail($dateFormat1);
    
    if($start == $date){
        foreach($scholars as $data){
            if($data['notif_send'] == 0){
                $database->sendEmail($data['email'], "Scholar Program Renewal", $messageStart);
                $admin->updateNotif1($data['id']);
            }
        }
    }elseif ($twoDaysBeforeEnd == $date) {
        foreach ($scholars as $data) {
            if ($data['notif_send'] == 1) {
                $database->sendEmail($data['email'], "Urgent: Scholarship Renewal Period Closing Soon", $messageReminder);
                $admin->updateNotif2($data['id']);
            }
        }
    }elseif($end == $date){
        foreach($scholars as $data){
            if($data['notif_send'] == 2){
                $database->sendEmail($data['email'], "Scholarship Renewal Period Closing", $messageEnd);
                $admin->updateNotif0($data['id']);
            }
        }
    }

    //Email message for 1st to final warning
    $messageWarning1st = renewalWarning1Email();
    $messageWarning2nd = renewalWarning2Email();
    $messageWarningFinal = renewalWarningFinalEmail();
    
    $endPlus1 = date('Y-m-d', strtotime($end . ' +1 day'));
    $endPlus2 = date('Y-m-d', strtotime($end . ' +2 days'));
    $endPlus3 = date('Y-m-d', strtotime($end . ' +3 days'));

    if ($date == $endPlus3) {
        for($i=0;$i < count($not_renewed_scholars);$i++){
            $scholar_id = $not_renewed_scholars[$i]['scholar_id'];
            if ($not_renewed_scholars[$i]['nonCom'] == 2) {
                $database->sendEmail($not_renewed_scholars[$i]['email'], "Urgent: Scholarship Renewal Has Ended. Final Warning", $messageWarningFinal);
                $scholar->updateNonComNotif0($scholar_id);
            }
        }
    } elseif ($date == $endPlus2) {
        for($i=0;$i < count($not_renewed_scholars);$i++){
            $scholar_id = $not_renewed_scholars[$i]['scholar_id'];
            if ($not_renewed_scholars[$i]['nonCom'] == 1) {
                $database->sendEmail($not_renewed_scholars[$i]['email'], "Urgent: Scholarship Renewal Has Ended. 2nd Warning", $messageWarning2nd);
                $scholar->updateNonComNotif2($scholar_id);
            }
        }
    } elseif ($date == $endPlus1) {
        for($i=0;$i < count($not_renewed_scholars);$i++){
            $scholar_id = $not_renewed_scholars[$i]['scholar_id'];
            if ($not_renewed_scholars[$i]['nonCom'] == 0) {
                $database->sendEmail($not_renewed_scholars[$i]['email'], "Urgent: Scholarship Renewal Has Ended. 1st Warning", $messageWarning1st);
                $scholar->updateNonComNotif1($scholar_id);
            }
        }
    }


} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
        <title>Consuelo Chito Madrigal Foundation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    </head>
    <body>
      
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0" style="font-size: 14px;">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <p class="h3 mb-0 font-weight-bold text-gray-800">Renewal</p>
                        <div id="toggleStatus" class="p-2 ms-auto">
                            <div class="alert alert-primary" role="alert">Renewal: <?php echo $dateFormat; ?> - <?php echo $dateFormat1; ?></div>
                        </div>
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#startRenewal">
                            Start Renewal
                        </button>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                              
                                <div class="card-body">
                                <h6 class="p-2 font-weight-bold text-black mb-2">Renewal</h6>
                                    <table id="applicant" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Scholar Type</th>
                                                <th scope="col">Date Renewed</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Details and Files</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                        $num = 1;
                                        foreach($renewal_info as $s){
                                            if($s['scholar_type'] == 3){
                                                $scho_type = '<span class="badge bg-warning" style="color: black; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Academic Rank 1</span>';
                                                $grants = '5000';
                                            }elseif($s['scholar_type'] == 2){
                                                $scho_type = '<span class="badge bg-info" style="color: black; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Academic Rank 2</span>';
                                                $grants = '4000';
                                            }elseif($s['scholar_type'] == 1){
                                                $scho_type = '<span class="badge bg-primary" style="color: black; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Economic</span>';
                                                $grants = '2000';
                                            }

                                            if($s['renewal_status'] == 1){
                                                $status = '<span class="badge bg-secondary">Submitted</span>';
                                            }elseif($s['renewal_status'] == 2){
                                                $status = '<span class="badge bg-success">Approved</span>';
                                            }elseif($s['renewal_status'] == 3){
                                                $status = '<span class="badge bg-info">Tentative</span>';
                                            }elseif($s['renewal_status'] == 4){
                                                $status = '<span class="badge bg-danger">Non-Compliant</span>';
                                            }
                                            
                                            ?>
                                            <tr>
                                                <th scope="col"><?php echo $num; ?></th>
                                                <td style="white-space: nowrap;"><?php echo $s["full_name"]; ?></td>
                                                <td style="white-space: nowrap;"><?php echo $scho_type;?></td>
                                                <td><?php echo $s["date_apply"];?></td>
                                                <td><?php echo $status;?></td>
                                                <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsFilesModal<?php echo $s["id"];?>">Details</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#renewFilesModal<?php echo $s["id"];?>">Files</button>
                                                </td>
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

                        <!-- Pie Chart -->
                    </div>

                    <!-- Content Row -->

            <!-- End of Main Content -->

<!-- Modal -->
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
        foreach($renewal_info as $a){
    ?>
        <div class="modal fade" id="renewFilesModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="renewFilesModal<?php echo $a["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
        <table id="applicant-modal-files" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                    <th>Evaluation</th>
                    <th>Remarks</th>
                </tr> 
            </thead>
            <form id="formRemarks" method="post" action="../functions/renewalEvaluation.php">
            <tbody>
                <tr>
                    <td>Grade Slip</td>
                    <td><a href="../Uploads_gslip/<?php echo $a["file1"]?>" target="_blank"><?php echo $a["file1"]?></a></td>
                    <?php if($a["file1_status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="GradeSlip" value="1" onchange="toggleInput(this, 'GradeSlip_remarks')"></td>
                        <td><input type="text" class="form-control" name="GradeSlip_remarks" id="GradeSlip_remarks" placeholder="Grade Slip Remarks" required>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="GradeSlip_remarks" id="GradeSlip_remarks" placeholder="Grade Slip Remarks" disabled>
                    <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td>Registration Form</td>
                    <td><a href="../Uploads_gslip/<?php echo $a["file2"]?>" target="_blank"><?php echo $a["file2"]?></a></td>
                    <?php if($a["file2_status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="RegistrationForm" value="1" onchange="toggleInput(this, 'RegistrationForm_remarks')"></td>
                        <td><input type="text" class="form-control" name="RegistrationForm_remarks" id="RegistrationForm_remarks" placeholder="Registration Form Remarks" required>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="RegistrationForm_remarks" id="RegistrationForm_remarks" placeholder="Registration Form Remarks" disabled>
                    <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>   
        </div> 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="hidden" name="renewal_id" value="<?php echo $a['id'] ?>">
            <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
            </form>
            </div>
            </div>
        </div>
        </div>
    <?php } ?>
<!-- Modal end -->
<!-- Modal for Start and end of date renewal -->
<div class="modal fade" id="startRenewal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Renewal Dates</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Range of Date</h2>
                            <form method="post" action="../functions/setDateRenewal.php">
                                <div class="form-group">
                                    <label for="startDate">Start Date:</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="endDate">End Date:</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
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
                    </div>
          </main>



        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function toggleInput(checkbox, inputId) {
            var inputField = document.getElementById(inputId);
            inputField.disabled = checkbox.checked;
            if (checkbox.checked) {
                inputField.removeAttribute("required"); // Remove the 'required' attribute when checkbox is checked
                inputField.value = ""; // Clear the input field when checkbox is checked
            } else {
                inputField.setAttribute("required", true); // Add the 'required' attribute back when checkbox is unchecked
            }
        }
    </script>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('status');
    console.log(successValue);

    if(successValue === "success"){
        Swal.fire({
            icon:'success',
            title:'Set Date Successfully',
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
    }else if(successValue === "successDecline"){
        Swal.fire({
            icon:'error',
            title:'Set Date Failed',
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

    
        $(document).ready(function() {
            $('#applicant').DataTable();
        });

</script>
    
    

    
    
    </body>
  </html>