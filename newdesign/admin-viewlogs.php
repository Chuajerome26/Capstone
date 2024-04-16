
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
    $admin_logs = $admin->getAdminlogs();
    $count = count($admin_logs);

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
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    </head>
    <body>
      
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0">


              <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4" style="font-size: 14px;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-body">
                                    <h6 class="p-2 font-weight-bold text-black mb-2">Admin Logs</h6>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                    <?php if($count != 0): ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Scholar ID</th>
                                            <th scope="col">Admin ID</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-dividercar">
                                    <?php
                                    $num = 1;
                                    foreach ($admin_logs as $log): 

                                        $scholar_info = $admin->scholarInfo($log['scholar_id']);
                                        $admin_info = $admin->adminInfo($log['admin_id']);
                                        if($log['remarks'] == 0){
                                            $remarks = '<span class="badge badge-primary">Evaluate</span>';
                                        }
                                        else if($log['remarks'] == 1){
                                            $remarks = '<span class="badge badge-success">Evaluation Complete</span>';
                                        }else if($log['remarks'] == 2){
                                            $remarks = '<span class="badge badge-success">Done Initial Interview</span>';
                                        }else if($log['remarks'] == 3){
                                            $remarks = '<span class="badge badge-success">Accepted</span>';
                                        }
                                        ?>
                                        <tr>
                                            <th scope="col"><?php echo $num; ?></th>
                                            <td style="white-space: nowrap;"><?php echo $scholar_info[0]['f_name'];?></td>
                                            <td style="white-space: nowrap;"><?php echo $admin_info[0]["f_name"];?></td>
                                            <td style="white-space: nowrap;"><?php echo $remarks;?></td>
                                            <td style="white-space: nowrap;"><?php echo $log["date"];?></td>
                                        </tr>
                                        <?php 
                                    $num++;
                                    endforeach;
                                    else:?>
                                        <div class="alert alert-primary" role="alert">No Announcements</div>
                                    <?php endif; ?>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">

                    <!-- Content Row -->
                    <!-- <div class="row"> -->
                        
                        <!-- Area Chart -->
                        <!-- <div class="col-lg-15 mb-4 ">
                            <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Student</h6>
            
                                </div> -->
                                <!-- Card Body --> 
                                <!-- <div class="card-body">                                  
                            <label for="uname"><b>Email:</b></label>
                            <input type="text" placeholder="Enter Email" name="Email" required>
                            <button type="submit">Add Student</button>
                            </div> -->
                     <!-- Card Body -->
                    <!-- </div> -->
                

            
                    <!-- Content Row -->
                    <div class="row">
                        

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             



            
<!-- Send Email -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Send Email</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


            <div class="container ">
                    <form enctype="multipart/form-data" method="post" action="../functions/admin-sendEmail.php">
                        <div class="form-group mb-3">
                            <label for="recipientEmail">Recipient's Email:</label>
                            <select name="email" class="form-control" required>
                                <option value="0">Select Scholar</option>
                                <?php
                                $scholar = $admin->getScholars();
                                foreach($scholar as $s){
                                    echo "<option value='" . $s['email'] . "'>" . $s['f_name'] . " " . $s['l_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter email subject" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" rows="5" placeholder="Enter your message" required></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                            </div>
                        
                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Send Email</button>
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

    <!-- Modal for Details -->

    
    <?php
       $appliData1 = $admin->getScholars();
       foreach($appliData1 as $a){
           $count = 1;
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
                                            
                                            <dt class="col-sm-6 ">Status:</dt>
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



        
<!-- Modal for Files -->
<?php
$appliData2 = $admin->getScholars();
    foreach($appliData2 as $b){
        $appliFiles = $admin->getApplicantsFiles($b['id']);
?>
<div class="modal fade" id="filesModal<?php echo $b["id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["id"];?>" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["id"];?>">Scholar Files</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="applicant-modal-files" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            
            <tbody>
                <?php foreach($appliFiles as $files){ ?>
                <tr>
                    <td><?php echo $files['requirement_name'];?></td>
                    <td><a href="../Scholar_files/<?php echo $files["file_name"]?>" target="_blank"><?php echo $files["file_name"]?></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>   
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="scholar_id" value="<?php echo $b['id'] ?>">
        <button type="button" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Modal end -->



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
    
    <script>
        $(document).ready(function() {
            $('#scholars').DataTable();
        });
    </script>

    
    

    
    
    </body>
  </html>