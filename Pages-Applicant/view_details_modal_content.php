<?php 
    $applicants = $admin->getApplicantById($id);
    
    foreach($applicants as $a){
        
  ?>
<!-- Content for the "View Details" modal -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Personal Information</h4>
            <dl class="row">
                <dt class="col-sm-4">First Name:</dt>
                <dd class="col-sm-8"><?php echo $a["f_name"];?></dd>

                <dt class="col-sm-4">Last Name:</dt>
                <dd class="col-sm-8"><?php echo $a["l_name"];?></dd>

                <!-- Add other personal information fields in a similar fashion -->
            </dl>
        </div>

        <div class="col-md-6">
            <h4>Contact Information</h4>
            <dl class="row">
                <dt class="col-sm-4">Mobile Number:</dt>
                <dd class="col-sm-8"><?php echo $a["mobile_num"];?></dd>

                <dt class="col-sm-4">Email Address:</dt>
                <dd class="col-sm-8"><?php echo $a["email"];?></dd>

                <!-- Add other contact information fields in a similar fashion -->
            </dl>
        </div>
    </div>

    <h4>Educational Information</h4>
    <dl class="row">
        <dt class="col-sm-4">Total Subjects:</dt>
        <dd class="col-sm-8"><?php echo $a["total_sub"];?></dd>

        <dt class="col-sm-4">Total Units:</dt>
        <dd class="col-sm-8"><?php echo $a["total_units"];?></dd>

        <dt class="col-sm-4">General Weighted Average:</dt>
        <dd class="col-sm-8"><?php echo $a["gwa"];?></dd>

        <!-- Add other educational information fields in a similar fashion -->
    </dl>

    <h4>Document Uploads</h4>
    <dl class="row">
        <dt class="col-sm-4">ID Photo:</dt>
        <dd class="col-sm-8"><a href="../Uploads_pic/<?php echo $a["id_pic"]?>" target="_blank"><?php echo $a["id_pic"]?></a></dd>

        <dt class="col-sm-4">Copy of Grades:</dt>
        <dd class="col-sm-8"><a href="../Uploads_cog/<?php echo $a["copy_grades"]?>" target="_blank"><?php echo $a["copy_grades"]?></a></dd>

        <dt class="col-sm-4">Copy of Birth Certificate/PSA:</dt>
        <dd class="col-sm-8"><a href="../Uploads_psa/<?php echo $a["psa"]?>" target="_blank"><?php echo $a["psa"]?></a></dd>

        <dt class="col-sm-4">Certificate of Good Moral:</dt>
        <dd class="col-sm-8"><a href="../Uploads_gm/<?php echo $a["good_moral"]?>" target="_blank"><?php echo $a["good_moral"]?></a></dd>
        
        <dt class="col-sm-4">Copy of Enrollment Form:</dt>
        <dd class="col-sm-8"><a href="../Uploads_ef/<?php echo $a["e_Form"]?>" target="_blank"><?php echo $a["e_Form"]?></a></dd>

        <!-- Add other document upload fields in a similar fashion -->
    </dl>
</div>

  <?php } ?>
    </table>