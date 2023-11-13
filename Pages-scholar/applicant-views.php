<?php 

// start session
session_start();

// if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

// } else {
//     header("Location: ../index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="main my-3" style="margin:20px;">
    <div class="main-header mb-3" style="margin-left:5px;">
        <h2>Applicants</h2>
        <hr>
    </div>
    <div class="main-body">
        <div class="content" style="max-height:500px;width:100%;">
        <table id="applicant" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Applied</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col">Files</th>
                    <th scope="col">Analysis</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
            $applicantsData = $admin->getApplicants();
            $num = 1;
            foreach($applicantsData as $s){
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
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["id"];?>">Details</button></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["id"];?>">Files</button></td>
                    <td><div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar bg-success" style="width: 100%">100%</div></div></td>
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
<!-- Modal for Details -->

<?php
$appliData = $admin->getApplicants();
    foreach($appliData as $a){
?>
<div class="modal fade" id="detailsModal<?php echo $a["id"];?>" tabindex="-1" aria-labelledby="detailsModal<?php echo $a["id"];?>l" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModal<?php echo $a["id"];?>">Scholar Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="applicant-modal<?php echo $a["id"]?>" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?php echo $a["f_name"]." ".$a["l_name"];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $a["gender"];?></td>
                </tr>
                <tr>
                    <td>Civil Status</td>
                    <td><?php echo $a["cStatus"];?></td>
                </tr>
                <tr>
                    <td>Citizenship</td>
                    <td><?php echo $a["citizenship"];?></td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><?php echo $a["date_of_birth"];?></td>
                </tr>
                <tr>
                    <td>Place of Birth</td>
                    <td><?php echo $a["birth_place"];?></td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td><?php echo $a["religion"];?></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><?php echo $a["mobile_num"];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $a["email"];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $a["address"];?></td>
                </tr>
                <tr>
                    <td>Total Subject</td>
                    <td><?php echo $a["total_sub"];?></td>
                </tr>
                <tr>
                    <td>Total Units</td>
                    <td><?php echo $a["total_units"];?></td>
                </tr>
                <tr>
                    <td>General Weighted Average</td>
                    <td><?php echo $a["gwa"];?></td>
                </tr>
                <tr>
                    <td>Guardian Relationship</td>
                    <td><?php echo $a["pR"];?></td>
                </tr>
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
<?php } ?>
<!-- Modal end -->
<!-- Modal for Files -->
<?php
$appliData = $admin->getApplicants();
    foreach($appliData as $b){
?>
<div class="modal fade" id="filesModal<?php echo $b["id"];?>" tabindex="-1" aria-labelledby="filesModal<?php echo $b["id"];?>" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModal<?php echo $b["id"];?>">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="applicant-modal<?php echo $b["id"]?>" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>Copy of Id</td>
                    <td><a href="../Uploads_pic/<?php echo $b["id_pic"]?>" target="_blank"><?php echo $b["id_pic"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Grades</td>
                    <td><a href="../Uploads_cog/<?php echo $b["copy_grades"]?>" target="_blank"><?php echo $b["copy_grades"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of PSA</td>
                    <td><a href="../Uploads_psa/<?php echo $b["psa"]?>" target="_blank"><?php echo $b["psa"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Good Moral</td>
                    <td><a href="../Uploads_gm/<?php echo $b["good_moral"]?>" target="_blank"><?php echo $b["good_moral"]?></a></td>
                </tr>
                <tr>
                    <td>Copy of Enrollment Form</td>
                    <td><a href="../Uploads_ef/<?php echo $b["e_Form"]?>" target="_blank"><?php echo $b["e_Form"]?></a></td>
                </tr>
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
<?php } ?>
<!-- Modal end -->

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Bundle with Popper (includes JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<!-- DataTables Bootstrap 5 JS -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> -->
<!-- <script>
$(document).ready(function() {
    $('#applicant').DataTable();
});

</script> -->