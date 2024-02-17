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

                <dt class="col-sm-4">Suffix:</dt>
                <dd class="col-sm-8"><?php echo $a["suffix"];?></dd>

                <dt class="col-sm-4">Gender:</dt>
                <dd class="col-sm-8"><?php echo $a["gender"];?></dd>

                <dt class="col-sm-4">Age:</dt>
                <dd class="col-sm-8"><?php echo $a["age"];?></dd>

                <dt class="col-sm-4">Date of Birth:</dt>
                <dd class="col-sm-8"><?php echo $a["date_of_birth"];?></dd>

                <dt class="col-sm-4">Address:</dt>
                <dd class="col-sm-8"><?php echo $a["address"];?></dd>
            </dl>
        </div>

        <div class="col-md-6">
            <h4>Contact Information</h4>
            <dl class="row">
                <dt class="col-sm-4">Mobile Number:</dt>
                <dd class="col-sm-8"><?php echo $a["mobile_number"];?></dd>

                <dt class="col-sm-4">Email Address:</dt>
                <dd class="col-sm-8"><?php echo $a["email"];?></dd>

                <dt class="col-sm-4">Facebook Link:</dt>
                <dd class="col-sm-8"><?php echo $a["fb_link"];?></dd>
            </dl>
        </div>
    </div>
    
    <h4>Academic Information</h4>
    <dl class="row">
        <dt class="col-sm-4">Elementary School:</dt>
        <dd class="col-sm-8"><?php echo $a["e_school"];?></dd>

        <dt class="col-sm-4">Junior High School:</dt>
        <dd class="col-sm-8"><?php echo $a["jh_school"];?></dd>

        <dt class="col-sm-4">Senior High School:</dt>
        <dd class="col-sm-8"><?php echo $a["sh_school"];?></dd>

        <dt class="col-sm-4">College:</dt>
        <dd class="col-sm-8"><?php echo $a["c_school"];?></dd>
    </dl>
</div>

  <?php } ?>