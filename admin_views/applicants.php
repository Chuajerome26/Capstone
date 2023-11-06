<?php 
include("header.php");
?>

<div class="main my-3" style="margin-left:70px;">
    <div class="main-header mb-3" style="margin-left:20px;">
        <h2>Applicants</h2>
        <hr>
    </div>
    <div class="main-body">
        <div class="content" style="height:200px;width:90%;">
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
                <tr>
                    <th scope="col">1</th>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Developer</td>
                    <td>Reviewed</td>
                    <td><a href="#">View</a></td>
                </tr>
            </tbody>
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