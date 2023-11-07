<?php 
include("header.php");

// start session
session_start();

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

} else {
    header("Location: ../index.php");
}
?>

<div class="main my-3" style="margin-left:5px;">
    <div class="main-header mb-3" style="margin-left:5px;">
        <h2>Applicants</h2>
        <hr>
    </div>
    <div class="main-body">
        <div class="content" style="height:200px;width:70%;">
        <table id="applicant" class="table table-striped table-hover" style="margin:20px;padding:20px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Applied</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
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
                    <td><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                    <td><?php echo $s["email"];?></td>
                    <td><?php echo $s["date_apply"];?></td>
                    <td><?php echo $status;?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        View
                    </button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="applicant-modal" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Requirements</th>
                    <th>Details</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    $appliData = $admin->getApplicants();
                    foreach($appliData as $a){
                ?>
                <tr>
                    <td>Copy of Id</td>
                    <td><a href="../Uploads_pic/<?php echo $a["id_pic"]?>">Copy of Grades</a></td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>D</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>H</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>J</td>
                </tr>
                <tr>
                    <td>K</td>
                    <td>L</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>N</td>
                </tr>
                <?php } ?>
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

<?php
include("footer.php");
?>

<script>
$(document).ready(function() {
    $('#applicant').DataTable();
});

$(document).ready(function() {
    $('#applicant-modal').DataTable();
});
</script>