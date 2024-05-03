
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';
    include '../email-design/renewalStartEmail-design.php';
    include '../email-design/renewalEndEmail-design.php';
    date_default_timezone_set('Asia/Manila');
    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);
    
    $id = $_SESSION['id'];
    $date = date('Y-m-d');
    $admin_info = $admin->adminInfo($id);
    $renewalDates = $scholar->getRenewalDates();
    $scholars = $admin->getScholars();

    $scholarInfo = $scholar->getRenewalNewInfoAll();

} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/forcert1.png" />
        <title>Scholarship Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

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
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-15 mb-4">
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
                                                <th scope="col">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                        $num = 1;
                                        foreach($scholarInfo as $s){
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
                                                <td><?php echo $s['reference_number'];?> </td>
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
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-15 mb-4">

            </div>
            <!-- End of Main Content -->



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
                    <a class="btn btn-primary" href="admin-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
<!-- RenewFiles Modal-->
<?php

        foreach($scholarInfo as $a){
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
                </tr> 
            </thead>
            <form id="formRemarks" method="post" action="../functions/renewalEvaluation.php">
            <tbody>
                <tr>
                    <td>Grade Slip</td>
                    <td><a href="../Uploads_gslip/<?php echo $a["file1"]?>" target="_blank"><?php echo $a["file1"]?></a></td>
                        <td align="center">Done</td>
                </tr>

                <tr>
                    <td>Registration Form</td>
                    <td><a href="../Uploads_gslip/<?php echo $a["file2"]?>" target="_blank"><?php echo $a["file2"]?></a></td>
                        <td align="center">Done</td>
                </tr>
            </tbody>
        </table>   
        </div> 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="hidden" name="renewal_id" value="<?php echo $a['id'] ?>">
            </form>
            </div>
            </div>
        </div>
        </div>
    <?php } ?>
<!-- Modal end -->

      
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
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
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
        $(document).ready(function() {
            $('#applicant').DataTable();
        });
    
        $(document).ready(function () {
        $("#openModalLink").click(function () {
        $("#myModal").modal("show");
        });
    });
</script>
    </body>
  </html>