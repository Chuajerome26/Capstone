
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 2 || $_SESSION['user_type'] === 6)) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);
    $content = $admin->getContent();


} else {
    header("Location: ../index.php");
}
?>

  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/<?php echo $content[0]['logo']; ?>" />
        <title><?php echo $content[0]['title_name']; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11"> -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
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
                 <?php
                        $getappform = $admin->getCurrentAppState();
                        $state = $getappform['state'];
                    ?>

                    <div class="hstack g-1 mb-3">
                        <div class="p-2"><p class="h4 mb-0 font-weight-bold text-gray-800">Suggested Applicants</p></div>
                        <div id="toggleStatus" class="p-2 ms-auto">
                            <div class="alert alert-primary" role="alert">Application form is currently <?php echo ($state == 1) ? 'open' : 'closed'; ?></div>
                        </div>
                        <div class="p-2 ms-auto">
                        <form id="formToggle" method="POST" action="../functions/toggleFormAccess.php">
                            <input type="hidden" name="state" value="<?php echo ($state == 1) ? '0' : '1'; ?>">
                            <button id="toggleButton" type="submit" class="btn shadow sm" name="submit" style="background-color: <?php echo ($state == 1) ? 'red' : 'green'; ?>; color: white;">
                            <i class="fa-regular fa-paper-plane "></i><div class="d-none d-sm-inline-block" style="background-color: <?php echo ($state == 1) ? 'red' : 'green'; ?>; color: white;"><?php echo ($state == 1) ? 'OFF' : 'ON'; ?></div>
                            </button>
                        </form>
                        
                        </div>
                        <!-- <div class="p-2">
                            <form action="../functions/download-applicant.php" method="post">
                                <button type="submit" class=" btn  btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    <div class="d-none d-sm-inline-block">Generate Report</div>
                                </button>
                            </form>
                        </div> -->
                    </div>
    

                
    <div class="container-fluid py-3">
<div class="row no-gutters g-2">
<div class="col-sm-12">
<div class="splide">

<div class="splide__track">
<div class="splide__list">
    <?php
    $applicantsData1 = $admin->getApplicants();
    foreach($applicantsData1 as $applicant) {
        if($applicant['studType'] == "College"){
            $income = $applicant['c_ave'];
        }else{
            $income = $applicant['sh_ave'];
        }

        $appliGrade = $admin->getAllEarnerSum($applicant['scholar_id']);
        $pic = $admin->getApplicants2x2($applicant['scholar_id']);
        $prediction = $admin->predictAcceptanceOfApplicant($income, $appliGrade);

        if($prediction <= 100 && $prediction >= 85) {
    ?>
    <div class="splide__slide p-0  d-flex justify-content-center align-items-center">
        <div class="card shadow ">
            <div class="hstack gap-2">
                
            <img src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>" alt="Profile Picture" class="img-thumbnail rounded-circle ms-4" style="width: 60px; height: 60px;">
           
            <div class=" ms-2">
                    <div class="text-camel-case" style="text-transform: lowercase;"><?php echo $applicant['l_name']; ?></div>
                    <div class="text-camel-case" style="text-transform: lowercase;"><?php echo $prediction; ?> %</div>
                </div>
                <div class="p-2 ms-auto d-grid gap-2">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#suggested<?php echo $applicant["scholar_id"];?>">Details</button>
                    <form method="post" action="../functions/scholar-accept.php">
                        <?php if($applicant['application_status'] == 2): ?>
                        <button class="btn btn-sm btn-primary" type="submit" name="accept">Accept</button>
                        <?php else: ?>
                        <button class="btn btn-sm btn-primary" type="submit" name="accept" disabled>Accept</button>
                        <?php endif; ?>
                        <input type="hidden" name="acceptId" value="<?php echo $applicant['scholar_id']?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        } else {
            // If the prediction is not in the specified range, you can add an alternative action here
        }
    }
    ?>
</div>
</div>
</div>
</div>
</div>
</div>


    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12 mb-4 p-2">
            <div class="card shadow mb-4 " style="font-size: 14px;">
              
                <div class="card-body">
                <h5 class="p-2 font-weight-bold text-black mb-2">Scholar Applicants</h5>

                    <div class="table-responsive">
                    <table id="applicant" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date Applied</th>
                                <th scope="col">Status</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $applicantsData = $admin->getApplicants();
                        $num = 1;
                        foreach($applicantsData as $s){
                            if($s['application_status'] == 0){
                                $remarks = '<span class="badge bg-primary">For Evaluation</span>';
                            }
                            else if($s['application_status'] == 1){
                                $remarks = '<span class="badge bg-warning">Interview</span>';
                            }else if($s['application_status'] == 2){
                                $remarks = '<span class="badge bg-info">Done Interview</span>';
                            }

                    ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td style="white-space: nowrap;"><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                                <td style="white-space: nowrap;"><?php echo $s["email"];?></td>
                                <td><?php echo $s["date_apply"];?></td> 
                                <td><?php echo $remarks;?></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["scholar_id"];?>"><i class="fa-solid fa-circle-info"></i></button>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["scholar_id"];?>"><i class="fa-solid fa-file"></i></button>
                                </div> 
                            </td>
                                <td class="d-flex gap-1" style="white-space: nowrap;">
                                    <form method="post" action="../functions/scholar-accept.php">
                                        <?php if($s['application_status'] == 2): ?>
                                            <input class="btn btn-sm btn-primary" type="submit" name="accept" value="Accept"><input type="hidden" name="acceptId" value="<?php echo $s['scholar_id']?>">
                                        <?php else: ?>
                                            <input class="btn btn-sm btn-primary" type="submit" name="accept" value="Accept" disabled><input type="hidden" name="acceptId" value="<?php echo $s['scholar_id']?>">
                                        <?php endif; ?>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal<?php echo $s["scholar_id"];?>">Decline</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $s["scholar_id"];?>"><i class="fa-solid fa-comment text-white"></i></button>

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
        </div>

        <!-- Pie Chart -->
    </div>
                        </div>
                    </div>
                </div>
</main>




<!-- Initialize Splide slider -->
<script>
document.addEventListener('DOMContentLoaded', function () {
new Splide('.splide', {
perPage: 3,
pagination: false,
breakpoints: {
992: {
    perPage: 2,
},
768: {
    perPage: 1,
}
}
}).mount();
});
</script>
    
<!-- End of Main Content -->

<!-- Modal for Decline -->
<?php
$appliData = $admin->getApplicants();
foreach($appliData as $z){
?>
<div class="modal fade" id="declineModal<?php echo $z["scholar_id"];?>" tabindex="-1" aria-labelledby="declineModal<?php echo $z["scholar_id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModal<?php echo $z["scholar_id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/scholar-decline.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="declineId" value="<?php echo $z['scholar_id']?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

<?php
$appliData = $admin->getApplicants();
$scholarshipTypes = $admin->getGwaRequirement();

foreach($appliData as $suggest){
    if($suggest['studType'] == "College"){
        $grade1 = $suggest['c_ave'];
    }else{
        $grade1 = $suggest['sh_ave'];
    }
    $suggestIncome = $admin->getAllEarnerSum($suggest['scholar_id']);
?>
<div class="modal fade" id="suggested<?php echo $suggest["scholar_id"];?>" tabindex="-1" aria-labelledby="suggested<?php echo $suggest["scholar_id"];?>" aria-hidden="true">
<div class="modal-dialog" style="max-width:500px;">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Suggestions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <p>The systems Evaluate this Applicant and this is the Result:</p>

        <?php echo " - <b>".$suggestIncome." Income Per Month. </b><br>"; ?>
        <?php
            if ($suggestIncome < 10000) {
                echo "Strongly suggest to become a scholar by the system. <br>Reason: The applicant's income falls significantly below the threshold, indicating financial need.<br>";
            } elseif ($suggestIncome >= 10000 && $suggestIncome < 11000) {
                echo "Suggest to become a scholar this applicant by the system. <br>Reason: While the income is slightly above the minimum threshold, the applicant might still face financial challenges that warrant consideration for scholarship support.<br>";
            } elseif ($suggestIncome >= 20000) {
                echo "This applicant is not eligible for the scholar. <br>Reason: The applicant's income exceeds the maximum threshold, indicating a level of financial stability that may not warrant scholarship assistance.<br>";
            } else {
                echo "Provide reasons for considering this applicant's scholarship eligibility based on their income.";
            }
        ?>
        <?php echo " - <b>".$grade1." GWA </b><br>"; ?>
        <?php 
        foreach ($scholarshipTypes as $isko) {
            if ($grade1 >= $isko['min_gwa'] && $grade1 <= $isko['max_gwa']) {
                echo "This applicant is suggested for the ".$isko['scholar_type']." scholarship. <br>";
                echo "Reason: The applicant's grade point average falls within the specified range for the ".$isko['scholar_type']." scholarship, indicating academic excellence.";
                
                $scholar_type = $isko['scholar_type'];
                break;
            }
        }
        ?>
    </div>
</div>
</div>
</div>
<?php } ?>

<!-- End -->
<!-- Modal for Remarks -->
<?php
$applicantss = $admin->getApplicants();
foreach($applicantss as $z1) {
    $id = $z1["scholar_id"];
?>

<div class="modal fade" id="remarks<?php echo $z1["scholar_id"];?>" tabindex="-1" aria-labelledby="remarksTitle<?php echo $z1["scholar_id"];?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksTitle<?php echo $z1["scholar_id"];?>">Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-3 text-dark">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-11">
                            <?php 
                            $getRemarks = $admin->getRemarks($id);
                            if($getRemarks):
                                foreach($getRemarks as $pogi):
                                    if($pogi['remarks'] == 0){
                                        $remarks123 = 'Evaluated By';
                                    }else if($pogi['remarks'] == 1){
                                        $remarks123 = 'Schedule for Interview - Evaluation Completed By';
                                    }else if($pogi['remarks'] == 2){
                                        $remarks123 = 'Done Interview';
                                    }else if($pogi['remarks'] == 3){
                                        $remarks123 = 'Accepted By';
                                    }else if($pogi['remarks'] == 5){
                                        $remarks123 = 'Declined By';
                                    }
                            ?>
                            <div class="d-flex flex-row align-items-start mb-4">
                                <img class="img-thumbnail rounded-circle shadow border me-3" src="../images/logo.jpg" alt="avatar" width="50" height="55" />
                                <div class="card w-100 shadow">
                                    <div class="card-body p-4">
                                        <div class="">
                                            <h5><?php echo $remarks123;?> Admin</h5>
                                            <p class="small"><?php echo date('M d, Y', strtotime($pogi["date"])); ?></p>
                                            <p><?php echo nl2br($pogi["remarks_mess"]);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="alert alert-primary" role="alert">No Remarks</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarksSend<?php echo $z1["scholar_id"];?>" onclick="modal(<?php echo $z1['scholar_id']; ?>)">Give Remarks</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php
$applicantsss = $admin->getApplicants();
$num = 1;
foreach($applicantsss as $pogiko){
?>
<!-- Modal for Remarks Save-->
<div class="modal fade" id="remarksSend<?php echo $pogiko["scholar_id"];?>" tabindex="-1" aria-labelledby="remarksSend<?php echo $pogiko["scholar_id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="remarksSend<?php echo $pogiko["scholar_id"];?>">Send Remarks</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/remarks.php">
        <label for="floatingTextarea">Comments</label>
            <textarea class="form-control" name="remarks" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          
            <input type="hidden" name="scholar_id" value="<?php echo $pogiko['scholar_id']?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!-- End -->

<!-- Modal for Details -->
<?php
$appliData1 = $admin->getApplicants();
    foreach($appliData1 as $a){
        $pic1=$admin->getApplicants2x2($a['scholar_id']);
?>
<div class="modal fade" id="detailsModal<?php echo $a["scholar_id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["scholar_id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["scholar_id"];?>">Scholar Details</h5>
        <div id="editCancelBtn<?php echo $a['scholar_id']; ?>" style="margin-left:10px;display:none;">
            <button id="editButton" class="btn btn-sm btn-primary" onclick="replaceDetailsWithInputs('detailsContainer'+<?php echo $a['scholar_id']; ?>, 'footer'+<?php echo $a['scholar_id'];?>, 'editBtn<?php echo $a['scholar_id']; ?>')">Edit</button>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/applicant-info-edit.php">
        <div id="detailsContainer<?php echo $a['scholar_id']; ?>">
        
            <div class="row g-0 p-2">

                <div class="col-md-12 ">
                    
                    <div class="card shadow">

                        <div class="card-header">
                            <strong>Personal Information</strong>
                        </div>
                        <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                        <div class="d-flex justify-content-center">
                        <img src="../Scholar_files/<?php echo $pic1[0]['file_name'];?>" alt="Profile Picture" class="img-thumbnail rounded-circle shadow" width="150" height="150">
                        </div>

                        <h5 class="text-center mt-4"><?php echo $a["f_name"]." ".$a["m_name"] ." ".$a["l_name"]." ".$a["suffix"];?></h5>
                        <div class="text-center text-muted"><?php echo $a["email"];?></div>
                        <div class="text-center text-muted"><?php echo $a['mobile_number'];?></div>
                        
                        <div class="text-center">
                        <a href="<?php echo $a["fb_link"];?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook text-primary fs-6 mt-1"></i> Facebook Link
                        </a>
                        </div>
                </div>

                      
                                <div class="col-md-8 d-flex justify-content-center align-items-center ">
                        <div class= "g-1 border-0">
                            <div class="row ">
                                
                            <div class="col-12 ">
                                <div class="row">
                                    <dt class="col-sm-3">Present Address:</dt>
                                    <dd class="col-sm-9"><?php echo $a['present_address'];?></dd>
                                    <dt class="col-sm-3">Permanent Address:</dt>
                                    <dd class="col-sm-9"><?php echo $a['permanent_address'];?></dd>
                                </div>
                            </div>

                                
                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Date of Birth:</dt>
                                    <dd class="col-sm-6"><?php echo $a['date_of_birth'];?></dd>

                                    <dt class="col-sm-6 ">Birth Place:</dt>
                                    <dd class="col-sm-6"><?php echo $a['b_place'];?></dd>

                                    <dt class="col-sm-6 ">Religion:</dt>
                                    <dd class="col-sm-6"><?php echo $a['religion'];?></dd>

                                    <dt class="col-sm-6 ">Student Type:</dt>
                                    <dd class="col-sm-6"><?php echo $a['studType'];?></dd>

                                    <dt class="col-sm-5">Scholarship Type:</dt>
                                    <dd class="col-sm-6"><?php echo $a['scholar_type'];?></dd>
                                </div>
                            </div>

                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Gender:</dt>
                                    <dd class="col-sm-6"><?php echo $a['gender'];?></dd>
                                    
                                    <dt class="col-sm-6 ">Civil Status:</dt>
                                    <dd class="col-sm-6"><?php echo $a['c_status'];?></dd>
                                
                                    <dt class="col-sm-6 ">Height & Weight: </dt>
                                    <dd class="col-sm-6"><?php echo $a['height'];?> | <?php echo $a['weight'];?></dd>

                                    <dt class="col-sm-6 ">Medical Condition: </dt>
                                    <dd class="col-sm-6"><?php echo $a['med_condition'];?></dd>
                                </div>
                            </div>

                            </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


            <div class="col-md-12 mt-3 ">
            <div class="card border shadow">
            <div class="card-header">
                            <strong>Family Information</strong>
                        </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <h6>Father Details</h6>
        
                        <dl class="row">
                            <dt class="col-sm-5 ">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_name"];?></dd>

                            <dt class="col-sm-5">Educational Attainment:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_attain"];?></dd>

                            <dt class="col-sm-5">Occupation:</dt>
                            <dd class="col-sm-7"><?php echo $a["father_occupation"];?></dd>
                        </dl>

                    </div>

                    <div class="col-md-6">
                        <dl class="row">
                        <h6 >Mother Details</h6>
                            <dl class="row">
                            <dt class="col-sm-5">Name:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_name"];?></dd>


                            <dt class="col-sm-5">Educational Attainment:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_attain"];?></dd>

                            <dt class="col-sm-5">Monthly Income:</dt>
                            <dd class="col-sm-7"><?php echo $a["mother_occupation"];?></dd>
                            </dl>
                        </dl>
                        </div>
                </div>

                <div class="col-md-12 border mt-3 mb-3"></div>

                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                        <h6 >Guardian Details</h6>
                        <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian"];?></dd>

                            <dt class="col-sm-3">Emergency Contact:</dt>
                            <dd class="col-sm-9"><?php echo $a["emergency_contact"];?></dd>

                            <dt class="col-sm-3">Relationship:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian_rs"];?></dd>

            
                        </dl> 
                        
            
                    </div>

                    <div class="col-md-6">
                        <dl class="row">
                            <h6>Siblings Details:</h6>

                            <dt class="col-sm-3">Number of Siblings:</dt>
                            <dd class="col-sm-9"><?php echo $a["numSiblings"];?></dd>
                        </dl>
                    </div>

                    <div class="col-md-12 border mt-3 mb-3"></div>  
                </div>
                </div>
            </div>
        </div>

            <div class="col-md-12 mt-3">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Academic Information</strong>
                        </div>
                        <?php if($a['studType'] == "Senior High Graduate"): ?>
                        <dl class="row ms-3" >
                        <h6 >Senior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_school"];?></dd>
                            
                            <dt class="col-sm-5">Date Graduate:</dt>
                            <dd class="col-sm-7"><?php echo $a["date_grad"];?></dd>

                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_achievements"];?></dd>

                            <dt class="col-sm-5">Senior High Strand:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_course"];?></dd>
                        </dl>
                
                    <?php else: ?>
                        <dl class="row ms-3">
                        <h6 >College School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_achievements"];?></dd>

                            <dt class="col-sm-5">Course:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_course"];?></dd>

                            <dt class="col-sm-5">School Years:</dt>
                            <dd class="col-sm-7"><?php echo $a["cschool_years"];?></dd>
                        </dl>
                        <?php endif; ?>
                </div>

                    <div class="card-body">
                    </div>
                </div>

    <div class="col-md-12  ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Income Provider in the Family</strong>
                        </div>
                        <div class="table-responsive">
                <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Income</th>
                                <th>Occupation</th>
                                <th>Company</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php $gradeInfo = $admin->getAllEarner($a['scholar_id']);
                                    foreach($gradeInfo as $gi){
                                ?>
                                <tr>
                                <td><?php echo $gi['earner_name']; ?></th>
                                <td><?php echo $gi['earner_income']; ?></td>
                                <td><?php echo $gi['earner_occupation']; ?></td>
                                <td><?php echo $gi['earner_company']; ?></td>
                                </tr>
                                <?php }?>
                                </tr>
                            </tbody>
                            </table>
                                    </div>

                </div>
            </div>

            <!--  -->

  </div>
</div>
</div>
<div class="modal-footer" id="footer<?php echo $a['id'];?>">

    <input type="hidden" name="scholar_id" value="<?php echo $a['scholar_id'];?>">
    <button type="submit" class="btn btn-sm btn-success" name="submit" id="editBtn<?php echo $a['scholar_id']; ?>" style="display:none">Save</button>
</div>

</form>
</div>
</div>
</div>


<?php } ?>
<!-- Modal end -->
<!-- Modal for Files -->
<?php
$appliData2 = $admin->getApplicants();
    foreach($appliData2 as $b){
        $appliFiles = $admin->getApplicantsFiles($b['scholar_id']);
?>
<div class="modal fade" id="filesModal<?php echo $b["scholar_id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["scholar_id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["scholar_id"];?>">Applicant Files</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="applicant-modal-files" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                    <th>First Evaluation</th>
                    <th>Remarks</th>
                </tr> 
            </thead>
            <form id="formRemarks" method="post" action="../functions/filesRemarks.php">
            <tbody>
                <?php foreach($appliFiles as $files){

                    $status = str_replace(' ', '', $files['requirement_name']);
                    echo $status;
                    ?>
                <tr>
                    <td><?php echo $files['requirement_name']; ?></td>
                    <td><a href="../Scholar_files/<?php echo $files["file_name"]?>" target="_blank"><?php echo $files["file_name"]?></a></td>
                    <?php if($files["status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="<?php echo $status; ?>" id="<?php echo $files['id'];?>" value="1" onchange="toggleInput(this, '<?php echo $files['id'];?>_remarks')"></td>
                        <td><input type="text" class="form-control" name="<?php echo $status;?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" required></td>
                    <?php elseif($files["status"] == 1): ?>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="<?php echo $status;?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" disabled></td>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="<?php echo $status;?>_remarks" id="<?php echo $files['id'];?>_remarks" placeholder="<?php echo $files['requirement_name'];?> Remarks" disabled></td>
                    <?php endif; ?>
                        <td><input type="hidden" name="file_id" value="<?php echo $files['id']; ?>">
                    </td>

                </tr>
                <?php }?>
            </tbody>
        </table>   
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="scholar_id" value="<?php echo $b['scholar_id'] ?>">
        <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>



        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>    
     
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
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
    }else if(successValue === "UpdatedRemarks"){
        Swal.fire({
            icon:'success',
            title:'Update Remarks!',
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
    
  
    <script>
        function replaceDetailsWithInputs(containerId, cancelContainer, editBtn) {
    // Get all elements inside the specified container
    var detailsContainer = document.getElementById(containerId);
    var editBtn = document.getElementById(editBtn);
    var cancelContainer1 = document.getElementById(cancelContainer);
    if (!detailsContainer || !cancelContainer1) {
        console.error("Container with ID '" + containerId + "' or '" + cancelContainer + "' not found.");
        return;
    }

    // Check if cancel button already exists in the cancel container
    var cancelButton = cancelContainer1.querySelector('button[type="button"]');
    if (cancelButton) {
        // If cancel button already exists, exit the function
        return;
    }

    var detailsElements = detailsContainer.querySelectorAll('dd');
    var nameCounter = 0; // Initialize counter for unique names

    // Store original content of each dd element
    var originalContents = [];

    // Iterate through each detail element
    detailsElements.forEach(function(element) {
        // Store original content
        originalContents.push(element.innerHTML);

        // Create input element
        var input = document.createElement('input');
        input.value = element.innerText;
        input.type = "text";
        input.name = "detail_" + nameCounter++; // Generate unique name for input
        input.style.width = "100%"; // Set input width to 100% to fit inside the dd element
        input.classList.add('form-control');

        // Clear existing content of dd element
        element.innerHTML = '';

        // Append input element to the dd element
        element.appendChild(input);
    });

    // Select the elements to edit: name, email, phone number, and Facebook link
    var nameElement = detailsContainer.querySelector('.card-body h5');
    var emailElement = detailsContainer.querySelector('.card-body .text-center:nth-of-type(2)');
    var phoneElement = detailsContainer.querySelector('.card-body .text-center:nth-of-type(3)');
    var fbLinkElement = detailsContainer.querySelector('.card-body .text-center:last-of-type a');

    // Store original content of each element
    var originalTextContent = {
        name: nameElement.textContent.trim(),
        email: emailElement.textContent.trim(),
        mNum: phoneElement.textContent.trim(),
        fbLink: fbLinkElement.textContent.trim()
    };

    // Function to replace text content with input field
    function replaceTextWithInput(element, name, originalContent) {
        // Create input element
        var input = document.createElement('input');
        input.value = originalContent;
        input.type = 'text';
        input.name = name;
        input.classList.add('form-control'); // Add Bootstrap class for styling

        // Clear the content of the element
        element.innerHTML = '';

        // Append input element to the element
        element.appendChild(input);

        // Focus on the input element
        input.focus();
    }

    // Replace content with input fields for each element
    replaceTextWithInput(nameElement, 'name', originalTextContent.name);
    replaceTextWithInput(emailElement, 'email', originalTextContent.email);
    replaceTextWithInput(phoneElement, 'mNum', originalTextContent.mNum);
    replaceTextWithInput(fbLinkElement, 'fbLink', originalTextContent.fbLink);

    // Create a cancel button
    var cancelButton = document.createElement('button');
    cancelButton.className = 'btn btn-sm btn-info'; // Set Bootstrap classes for styling
    cancelButton.textContent = 'Cancel';
    cancelButton.type = 'button';

    cancelButton.addEventListener('click', function() {
        // Restore original content for each element
        nameElement.textContent = originalTextContent.name;
        emailElement.textContent = originalTextContent.email;
        phoneElement.textContent = originalTextContent.mNum;
        fbLinkElement.textContent = originalTextContent.fbLink;

        detailsElements.forEach(function(element, index) {
            element.innerHTML = originalContents[index];
        });
        cancelButton.parentNode.removeChild(cancelButton);

        editBtn.style.display = "none";
    });

    cancelContainer1.appendChild(cancelButton);

    editBtn.style.display = "block";
}
    </script>

<!--SCRIPT FOR BUTTON TOGGLE-->
    <script>
    function toggleButton() {
        var form = document.getElementById('formToggle');
        var button = document.getElementById('toggleButton');
        var status = document.getElementById('toggleStatus');

        // Toggle the value of the hidden input field
        var currentState = form.querySelector('input[name="state"]').value;
        var newState = (currentState == 1) ? 0 : 1;
        form.querySelector('input[name="state"]').value = newState;

        // Change button style and text based on new state
        button.style.backgroundColor = (newState == 1) ? 'green' : 'red';
        button.textContent = (newState == 1) ? 'ON' : 'OFF';
        
        // Update status text
        status.textContent = "Application form is now " + ((newState == 1) ? 'open' : 'closed');
    }
    </script>
    </body>
  </html>