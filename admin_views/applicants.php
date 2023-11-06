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
            <tbody>
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
                    <td><a href="#">View</a></td>
                </tr>
            </tbody>
            <?php 
            $num++;
                } 
            ?>
        </table>
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
</script>