
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
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


<div class="hstack gap-3">
<div class="p-2"><p class="h5 mb-0 font-weight-bold text-gray-800">Suggested Applicants</p></div>
<div class="p-2 ms-auto">
    <form action="../functions/download-applicant.php" method="post">
        <button type="submit" class=" btn  btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> 
            <div class="d-none d-sm-inline-block">Generate Report</div>
        </button>
    </form>
</div>

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
        $income = $applicant['father_income'] + $applicant['mother_income'];
        $appliGrade = $admin->getGrade($applicant['id']);
        $pic = $admin->getApplicants2x2($applicant['id']);
        $prediction = $admin->predictAcceptanceOfApplicant($appliGrade[0]['average'], $income);

        if($prediction <= 100 && $prediction >= 75) {
    ?>
    <div class="splide__slide p-0  d-flex justify-content-center align-items-center">
        <div class="card shadow ">
            <div class="hstack gap-2">
                
            <img src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>" alt="Profile Picture" class="img-thumbnail rounded-circle ms-4" style="width: 60px; height: 60px;">
           
            <div class=" ms-2">
                    <div class="text-camel-case" style="text-transform: lowercase;"><?php echo $applicant['f_name']; ?></div>
                    <div class="text-muted"><small>Age: <?php echo $applicant['age']; ?></small></div>
                    <div class="text-muted"><small>Percentage: <?php echo $prediction; ?></small></div>
                </div>
                <div class="p-2 ms-auto d-grid gap-2">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $applicant["id"];?>">Details</button>
                    <form method="post" action="../functions/scholar-accept.php">
                        <button class="btn btn-sm btn-primary" type="submit" name="accept">Accept</button>
                        <input type="hidden" name="acceptId" value="<?php echo $applicant['id']?>">
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
                        <tbody class="table-group-divider">
                        <?php
                        $applicantsData = $admin->getApplicants();
                        $num = 1;
                        foreach($applicantsData as $s){
                            // $id = $s['id'];
                            // $rate = $admin->getScheduleById($id);
                            // if($rate){
                            //     if($rate['rate'] == 0){
                            //         $rate1 = 0;
                            //     }else{
                            //         $rate1 = $rate['rate']; 
                            //     }
                            // }else{
                            //     $rate1 = 0;
                            // }
                            // $percentage = $admin->predictAcceptanceOfApplicant($s['gwa'], $rate1);
                            if($s['status'] == 0){
                                $status = "Pending";
                            }else{
                                $status = "Accepted";
                            }
                    ?>
                            <tr>
                                <th scope="col"><?php echo $num; ?></th>
                                <td style="white-space: nowrap;"><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                                <td style="white-space: nowrap;"><?php echo $s["email"];?></td>
                                <td><?php echo $s["date_apply"];?></td> 
                                <td><?php echo $status;?></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["id"];?>"><i class="fa-solid fa-circle-info"></i></button>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["id"];?>"><i class="fa-solid fa-file"></i></button>
                                 </div> 
                            </td>
                                <td class="d-flex gap-1" style="white-space: nowrap;">
                                    <form method="post" action="../functions/scholar-accept.php">
                                        <input class="btn btn-sm btn-primary " type="submit" name="accept" value="Accept"><input type="hidden" name="acceptId" value="<?php echo $s['id']?>">
                                    </form>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal<?php echo $s["id"];?>">Decline</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $s["id"];?>"><i class="fa-solid fa-comment text-white"></i></button>

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
<!-- Modal for Decline -->
<?php
$appliData = $admin->getApplicants();
foreach($appliData as $z){
?>
<div class="modal fade" id="declineModal<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="declineModal<?php echo $z["id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:8000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModal<?php echo $z["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/scholar-decline.php">
            <textarea rows="8" cols="50" placeholder="Remarks" name="remarks"></textarea>
            <input type="hidden" name="declineId" value="<?php echo $z['id']?>">
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
<!-- Modal for Remarks -->
<?php
$applicantss = $admin->getApplicants();
foreach($applicantss as $z) {
    $id = $z["id"];
?>

<div class="modal fade" id="remarks<?php echo $z["id"];?>" tabindex="-1" aria-labelledby="remarksTitle<?php echo $z["id"];?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksTitle<?php echo $z["id"];?>">Remarks</h5>
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
                                        $remarks123 = 'Evaluate By';
                                    }else if($pogi['remarks'] == 1){
                                        $remarks123 = 'Schedule Interview for Initial - Evaluation Completed By';
                                    }else if($pogi['remarks'] == 2){
                                        $remarks123 = 'Schedule Interview for Final - Interview Completed By';
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarksSend<?php echo $z["id"];?>" onclick="modal(<?php echo $z['id']; ?>)">Give Remarks</button>
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
<div class="modal fade" id="remarksSend<?php echo $pogiko["id"];?>" tabindex="-1" aria-labelledby="remarksSend<?php echo $pogiko["id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="remarksSend<?php echo $pogiko["id"];?>">Applicant Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/remarks.php">
        <label for="floatingTextarea">Comments</label>
            <textarea class="form-control" name="remarks" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          
            <input type="hidden" name="scholar_id" value="<?php echo $pogiko['id']?>">
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
        $pic1=$admin->getApplicants2x2($a['id']);
?>
<div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
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
                                    <dt class="col-sm-3">Address:</dt>
                                    <dd class="col-sm-9"><?php echo $a['address'];?></dd>
                                </div>
                            </div>

                                
                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Date of Birth:</dt>
                                    <dd class="col-sm-6"><?php echo $a['date_of_birth'];?></dd>

                                    <dt class="col-sm-6 ">Birth Place:</dt>
                                    <dd class="col-sm-6"><?php echo $a['b_place'];?></dd>

                                    <dt class="col-sm-6 ">Citizenship:</dt>
                                    <dd class="col-sm-6"><?php echo $a['citizenship'];?></dd>

                                    <dt class="col-sm-6 ">Religion:</dt>
                                    <dd class="col-sm-6"><?php echo $a['religion'];?></dd>

                                    <dt class="col-sm-6 ">Province:</dt>
                                    <dd class="col-sm-6"><?php echo $a['province'];?></dd>        
                                </div>
                            </div>

                            <div class="col-6 ">
                                <div class="row">
                                    <dt class="col-sm-6 ">Gender:</dt>
                                    <dd class="col-sm-6"><?php echo $a['gender'];?></dd>
                                    
                                    <dt class="col-sm-6 ">Civil Status:</dt>
                                    <dd class="col-sm-6"><?php echo $a['c_status'];?></dd>

                                    <dt class="col-sm-6 ">Age:</dt>
                                    <dd class="col-sm-6"><?php echo $a['age'];?></dd>
                                
                                    <dt class="col-sm-6 ">Height & Weight: </dt>
                                    <dd class="col-sm-6"><?php echo $a['height'];?> | <?php echo $a['weight'];?></dd>

                                    <dt class="col-sm-6 ">Medical Condition: </dt>
                                    <dd class="col-sm-6"><?php echo $a['med_condition'];?></dd>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <dt class="col-sm-3">Skills:</dt>
                                    <dd class="col-sm-9"><?php echo $a['skills'];?></dd>
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
                        <h6 >Mother Details</h6>
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

                <div class="col-md-12 border mt-3 mb-3"></div>

                <div class="row">
                    <div class="col-md-12">
                        <dl class="row">
                        <h6 >Guardian Details</h6>
                        <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian"];?></dd>


                            <dt class="col-sm-3">Contact No.:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian_contact"];?></dd>

                            <dt class="col-sm-3">Emergency Contact:</dt>
                            <dd class="col-sm-9"><?php echo $a["emergency_contact"];?></dd>

                            <dt class="col-sm-3">Relationship:</dt>
                            <dd class="col-sm-9"><?php echo $a["guardian_rs"];?></dd>

            
                        </dl> 
                        
            
                    </div>

                    <div class="col-md-12 border mt-3 mb-3"></div>  
                    <div class="col-md-12   " >
                        <h6>Sibling Details</h6>
                        <div class="table-responsive">
                        <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Occupation</th>
                                <th>Civil Status</th>
                                <th>Religion</th>
                                <th>Educational Attainment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sibling = $admin->getAllSibling($a['id']);
                                    foreach($sibling as $sb){
                                ?>
                                <tr>
                                    <td><?php echo $sb['name']; ?></th>
                                    <td><?php echo $sb['age']; ?></td>
                                    <td><?php echo $sb['occupation']; ?></td>
                                    <td><?php echo $sb['civil_status']; ?></td>
                                    <td><?php echo $sb['religion']; ?></td>
                                    <td><?php echo $sb['educational_attained']; ?></td>
                                </tr>
                                <?php }?>
                                
                                </tr>
                                
                                </tr>
                            </tbody>
                            </table>
    </div>
                    </div>
                </div>
    </div>
            </div>
        </div>

            <div class="col-md-6 mt-3 ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Academic Information</strong>
                        </div>

                <dl class="row ms-3">
                <h6 class="mt-3">Elementary School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["e_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3">
                <h6 >Junior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["jh_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3" >
                <h6 >Senior High School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["sh_achievements"];?></dd>
                        </dl>
                

                        <dl class="row ms-3">
                <h6 >College School</h6>
                            <dt class="col-sm-5">School:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_school"];?></dd>


                            <dt class="col-sm-5">Average:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_ave"];?></dd>

                            <dt class="col-sm-5">Achievements:</dt>
                            <dd class="col-sm-7"><?php echo $a["c_achievements"];?></dd>
                        </dl>
                </div>

                    <div class="card-body">
                    </div>
                </div>


                <div class="col-md-6 mt-3 ">
                <div class="card border shadow" style="min-height: 635px;">
                <div class="card-header">
                            <strong>Incoming Freshment</strong>
                        </div>

                            <dl class="row mt-3 ms-3" >

                            <dt class="col-sm-12 ">Did you apply for / are you a recipient of another scholarship?:</dt>
                            <dd class="col-sm-12 mb-3"><?php echo $a["other_scho"];?></dd>

                            <?php if($a["other_scho"] == "yes"): ?>
                                <dt class="col-sm-12 ">Type:</dt>
                                <dd class="col-sm-12 mb-4 "><?php echo $a["other_scho_type"];?></dd>

                                <dt class="col-sm-12 ">Coverage</dt>
                                <dd class="col-sm-12 mb-4"><?php echo $a["other_scho_coverage"];?></dd>

                                <dt class="col-sm-12 ">Status:</dt>
                                <dd class="col-sm-12 mb-4"><?php echo $a["other_scho_status"];?></dd>
                            <?php else: endif;?>

                            <dt class="col-sm-12 ">How did you learn about CCMFI Schoolarship?</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["q1"];?></dd>

                            <dt class="col-sm-12 ">Why are you applying for this scholarship</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["q2"];?></dd>

                            <dt class="col-sm-12 ">Will you pursue your studies event without this scholarship?</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["apply_scho"];?></dd>

                            <dt class="col-sm-12">Explain your Answer:</dt>
                            <dd class="col-sm-12 mb-4"><?php echo $a["apply_scho_explain"];?></dd>
            
                            </dl> 





            <div>
            </div>

            
    


            
           


    </div>

    
    </div>
    <div class="col-md-12  ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>Grade Information</strong>
                        </div>
                        <div class="table-responsive">
                <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th >Subject</th>
                                <th>Unit</th>
                                <th>Grade</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php $gradeInfo = $admin->getAllGrade($a['id']);
                                    foreach($gradeInfo as $gi){
                                ?>
                                <tr>
                                <td><?php echo $gi['subject']; ?></th>
                                <td><?php echo $gi['unit']; ?></td>
                                <td><?php echo $gi['grade']; ?></td>
                                </tr>
                                <?php }?>
                                </tr>
                            </tbody>
                            </table>
                                    </div>

                </div>
            </div>

            <div class="col-md-12 mt-2 ">
                <div class="card border shadow">
                <div class="card-header">
                            <strong>School Choices Information</strong>
                        </div>
                        <div class="table-responsive">
                 <table class="table p-0 w-100">
                            <thead>
                                <tr>
                                <th >School Name</th>
                                <th>Course/Degree Major</th>
                                <th>Entrance Exam Taken?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $choice = $admin->getAllChoice($a['id']);
                                    foreach($choice as $ce){
                                ?>
                                <tr>
                                <td><?php echo $ce['univ']; ?></th>
                                <td><?php echo $ce['course']; ?></td>
                                <td><?php echo $ce['entrance_exam']; ?>, <?php echo $ce['exam_taken']; ?></td>
                                </tr>
                                <?php }?>
                                
                                </tr>
                            </tbody>
                            </table>
                                    </div>
                </div>
            </div>

  </div>
</div>
</div>
</div>
</div>


<?php } ?>
<!-- Modal end -->
<!-- Modal for Files -->
<?php
$appliData2 = $admin->getApplicants();
    foreach($appliData2 as $b){
        $appliFiles = $admin->getApplicantsFiles($b['id']);
?>
<div class="modal fade" id="filesModal<?php echo $b["id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["id"];?>" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["id"];?>">Applicant Files</h5>
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
                    <th>Last Evaluation</th>
                    <th>Remarks</th>
                </tr> 
            </thead>
            <form id="formRemarks" method="post" action="../functions/filesRemarks.php">
            <tbody>
                <?php foreach($appliFiles as $files){
                    $name = $files['requirement_name'];
                    if($name == "FamilyProfile"){
                        $text = preg_replace('/(?<!^)([A-Z])/', ' $1', $name);
                    }else{
                        $text = preg_replace('/(?<!^)([A-Z])/', ' $1', $name);
                        $text = str_replace('of', ' of', $text);
                    }
                    ?>
                <tr>
                    <td><?php echo $text; ?></td>
                    <td><a href="../Scholar_files/<?php echo $files["file_name"]?>" target="_blank"><?php echo $files["file_name"]?></a></td>
                    <?php if($files["status"] == 0): ?>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" id="<?php echo $files['requirement_name'];?>" value="1" onchange="toggleInput(this, '<?php echo $files['requirement_name'];?>_remarks')"></td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2" disabled></td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['requirement_name'];?>_remarks" placeholder="<?php echo $text;?> Remarks" required></td>
                    <?php elseif($files["status"] == 1): ?>
                        <td align="center">Done</td>
                        <td align="center"><input type="checkbox" name="<?php echo $files['requirement_name'];?>" value="2"></td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['requirement_name'];?>_remarks" placeholder="<?php echo $text;?> Remarks" disabled></td>
                    <?php else: ?>
                        <td align="center">Done</td>
                        <td align="center">Done</td>
                        <td><input type="text" class="form-control" name="<?php echo $files['requirement_name'];?>_remarks" id="<?php echo $files['requirement_name'];?>_remarks" placeholder="<?php echo $text;?> Remarks" disabled></td>
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
        <input type="hidden" name="scholar_id" value="<?php echo $b['id'] ?>">
        <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>




                
                </div>
                   
             </div> 
          </main>



        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>
        <script src="../assets1/js/1.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>    
     
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
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
    
  

    
    

    
    
    </body>
  </html>