
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);

    $initialInterview = $admin->getInitialInterviews();
    
    if($initialInterview["hasData"]){
        $initialInterview1 = $initialInterview["data"];
    }else{
        $initialInterview1 = [];
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
        <link rel="shortcut icon" type="image/x-icon" href="../images/forcert1.png" />
        <title>Scholarship Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">


    </head>
    <body>
      
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0">


               <!-- Begin Page Content -->
               <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <p class="h3 mb-0 font-weight-bold text-gray-800">Interviews</p>
</div>

<!-- Content Row -->

<ul class="nav nav-underline">
<li class="nav-item">
<a class="nav-link text-black" aria-current="page" href="#">Interviews</a>
</li>

</li>
</ul>



<!-- Content Row -->

<div class="row">
<!-- Area Chart -->
<div class="col-lg-12 mb-4 mt-3">
    <div class="card shadow mb-4 ">
        <!-- Card Header - Dropdown -->
        
        <div class="card-body">
        <h6 class="p-2 font-weight-bold text-black mb-2">Interviews</h6>
            <div class="container mt-6" style="max-height: 400px; overflow-y: auto;">
                <div class="row">
                    <?php
                    // Initialize an array to keep track of displayed dates
                    $displayedDates = [];

                    // Collect all dates from initial interviews
                    $dates = [];
                    foreach ($initialInterview1 as $it) {
                        $dates[] = $it['date'];
}
                    // Sort the dates in ascending order
                        sort($dates);

                if($initialInterview["hasData"]){
                    foreach ($dates as $date) {
                        $dateTime = new DateTime($date);
                        $formattedDate = $dateTime->format("F j, Y");
                        // Check if the date has already been displayed
                        if (!in_array($date, $displayedDates)) {
                            // Add the date to the list of displayed dates
                            $displayedDates[] = $date;
                            ?>
                            
                            <div class="col-4">

                                <div class="card" style="width: 22rem;">
                                <div class="hstack gap-1 d-flex align-items-center ms-4 mt-1">
                                    <div class="p-1 text-center"><i class="fa-regular fa-calendar-days fs-2"></i></div>
                                    <div class="ms-2">
                                    <div><strong><?php echo date('l', strtotime($date)); ?></strong></div>
                                        <div><small class="text-muted"><?php echo $formattedDate; ?></small></div>
                                    </div>
                                </div>
                                    
                                <div class="card border mt-2 mb-2"></div>

                                    <div class="card-body " style="max-height: 200px; overflow-y: auto; min-height: 180px;">


                                <div class="scrollable-content">
                                        <?php
                                        // Loop to display data entries with the same date within the same card
                                        foreach ($initialInterview1 as $entry) { 
                                            if ($entry['date'] == $date) {
                                                if($admin->checkIfApplicant($entry['scholar_id'])){
                                                    $info = $admin->getApplicantById($entry['scholar_id']);
                                                ?>
                                                <li class="card-text ms-3"><?php echo $info[0]['f_name']." ".$info[0]['l_name']; ?></li>
                                                <?php
                                                }else{
                                                    $admin->deleteApplicantInterview($entry['id']);
                                                }
                                            }
                                        }
                                        ?>
                                      <!-- Add more content if needed -->
                                </div>
                            </div>
                            <div class="card-footer bg-light border-0 d-flex gap-1">

                            <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $it["id"];?>">View</button>
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#editInitialModal<?php echo $it["date"];?>">Edit</button>


                        </div>
                        </div>
                                </div>
                            <?php
                        }
                    }
                }else{
                    ?>
                    
                    <div class="alert alert-primary text-center" role="alert">
                        No Interview for now.
                        </div>
                    
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Pie Chart -->
</div>


<!-- End of Main Content -->

    <!-- Modal For View Details -->
    <?php 
        $displayedDatesforModal = [];
        foreach($initialInterview1 as $a){
            $date = $a['date'];
            if (!in_array($date, $displayedDatesforModal)) {
                // Add the date to the list of displayed dates
                $displayedDatesforModal[] = $date;
    ?>
    <div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="applicant-modal<?php echo $a["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Requirements</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php foreach($initialInterview1 as $b){
                                if($b['date'] == $date){
                                    $info1 = $admin->getApplicantById($b['scholar_id']);
                                    ?>
                        <tr>
                            <td><?php echo $info1[0]['f_name']." ".$info1[0]['l_name'];?></td>
                            <td><?php echo $b['time_start']?> - <?php echo $b['time_end'];?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#questionModal<?php echo $b["id"];?>">Start</button>
                            </td>
                        </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <?php }} ?>
    <!-- Modal End -->

    <!-- Modal Start Question -->
    <?php 
    foreach($initialInterview1 as $z){
    ?>
    <div class="modal fade" id="questionModal<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $z["id"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $z["id"];?>">Questioner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-10px">
                    <div class="col-12">
                        <strong>Instructions: </strong>Rate the applicants on every Question 1 to 10.
                    </div>
                    <div class="col-12">
                        <strong>(1 - lowest, 10 - Highest)</strong>
                    </div>
                </div>
                <table id="applicant-modal<?php echo $z["id"]?>" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>Grade</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <form method="post" action="../functions/interview-grade.php">
                        <tr>
                            <td>Tell us about yourself</td>
                            <td><input class="form-control" type="text" name="q1" required></td>
                        </tr>
                        <tr>
                            <td>Tell us about your Greatest Strength</td>
                            <td><input class="form-control" type="text" name="q2" required></td>
                        </tr>
                        <tr>
                            <td>Why do you deserve this scholarship ?</td>
                            <td><input class="form-control" type="text" name="q3" required></td>
                        </tr>
                        <tr>
                            <td>Why did you choose this scholarship ?</td>
                            <td><input class="form-control" type="text" name="q4" required></td>
                        </tr>
                        <tr>
                            <td>Imagine yourself Five years Form now ?</td>
                            <td><input class="form-control" type="text" name="q5" required></td>
                        </tr>
                    </tbody>
                </table>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="id" value="<?php echo $z['id']; ?>">
                <input type="hidden" name="scholar_id" value="<?php echo $z['scholar_id']; ?>">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php }?>

    <!-- Modal for Initial Interview Edit -->
    <?php 
    foreach($initialInterview1 as $p){
    ?>
    <div class="modal fade" id="editInitialModal<?php echo $p["date"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $p["date"];?>l" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModal<?php echo $p["date"];?>">Edit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>Interview Form</h2>
                    <form method="post" action="../functions/editInitialInterview.php">
                    <div class="form-group">
                        <label for="interviewDate">Interview Date:</label>
                        <input type="date" class="form-control" id="interviewDate" name="interviewDate"  min="<?php echo date('Y-m-d'); ?>" value="<?php echo $p['date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" id="modeOfTnterview" name="modeOfTnterview" aria-label="Floating label select example" required>
                                <option>Open this select menu</option>
                                <option value="Online">Online</option>
                                <option value="Onsite">Onsite</option>
                            </select>
                            <label for="floatingSelect">Mode of Interview</label>
                        </div>
                    </div>
                    <div id="additionalInput" style="display: none;">
                        <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" id="additionalInput" name="additionalInput" aria-label="Floating label select example">
                                <option>Open this select menu</option>
                                <option value="Meet">Meet</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                            <label for="floatingSelect">Online Platform</label>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="date" value="<?php echo $p['date']; ?>">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php }?>


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
           $(document).ready(function() {
        $('#modeOfTnterview').change(function() {
            if ($(this).val() === "Online") {
                $('#additionalInput').show();
            } else {
                $('#additionalInput').hide();
            }
        });
    });
    </script>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('status');
    console.log(successValue);

    if(successValue === "success"){
        Swal.fire({
            icon:'success',
            title:'Accepted',
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
            title:'Declined',
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
    }else if(successValue === "successRemarks"){
        Swal.fire({
            icon:'success',
            title:'Save Remarks Successfully!',
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

        $('#applicant').parent().parent().css('overflow', 'auto');
        $('#applicant').parent().parent().css('max-height', '500px');
    });

    function modal(id){
        $(document).ready(function() {
        $('#applicant'+id).DataTable();

        $('#applicant'+id).parent().parent().css('overflow', 'auto');
        $('#applicant'+id).parent().parent().css('max-height', '500px');
    });
    }

    function showAdditionalInput() {
        var modeOfInterview = document.getElementById("modeOfInterview");
        var additionalInput = document.getElementById("additionalInput");

        if (modeOfInterview.value === "Onsite") {
            additionalInput.style.display = "block";
        } else {
            additionalInput.style.display = "none";
        }
    }
</script>

    
    

    
    
    </body>
  </html>