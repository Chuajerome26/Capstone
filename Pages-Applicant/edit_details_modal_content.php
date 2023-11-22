<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
        // Process form submission
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $mobile_num = $_POST['mobile_num'];
        $email = $_POST['email'];
        $total_sub = $_POST['total_sub'];
        $total_units = $_POST['total_units'];
        $gwa = $_POST['gwa'];

        // Update the data
        $admin->editApplicants($id, $f_name, $l_name, $mobile_num, $email, $total_sub, $total_units, $gwa);
    }
?>
<!-- Content for the "View Details" modal -->
<div class="container mt-5">
    <h1>Edit Applicant Details</h1>

    <form method="post" enctype="multipart/form-data">
    <?php 
    $applicants = $admin->getApplicantById($id);
    
    foreach($applicants as $a){
        
  ?>
            <div class="row">
                <div class="col-md-6">
                    <h4>Personal Information</h4>
                    <div class="form-group">
                        <label for="f_name">First Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="<?= $a['f_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name:</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="<?= $a['l_name']; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <h4>Contact Information</h4>
                    <div class="form-group">
                        <label for="mobile_num">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="<?= $a['mobile_num']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $a['email']; ?>">
                    </div>
                </div>
            </div>

            <h4>Educational Information</h4>
            <div class="form-group">
                <label for="total_sub">Total Subjects:</label>
                <input type="text" class="form-control" id="total_sub" name="total_sub" value="<?= $a['total_sub']; ?>">
            </div>
            <div class="form-group">
                <label for="total_units">Total Units:</label>
                <input type="text" class="form-control" id="total_units" name="total_units" value="<?= $a['total_units']; ?>">
            </div>
            <div class="form-group">
                <label for="gwa">General Weighted Average:</label>
                <input type="text" class="form-control" id="gwa" name="gwa" value="<?= $a['gwa']; ?>">
            </div>

            <h4>Document Uploads</h4>
            <div class="form-group">
                <label for="id_pic">ID Photo:</label>
                <a href="../Uploads_pic/<?= $a['id_pic'] ?>" target="_blank"><?= $a['id_pic'] ?></a>
                <input class="form-control" type="file" id="id_pic" name="id_pic">
            </div>
            <div class="form-group">
                <label for="copy_grades">Copy of Grades:</label>
                <a href="../Uploads_cog/<?= $a['copy_grades'] ?>" target="_blank"><?= $a['copy_grades'] ?></a>
                <input class="form-control" type="file" id="copy_grades" name="copy_grades">
            </div>
            <div class="form-group">
                <label for="psa">Copy of Birth Certificate/PSA:</label>
                <a href="../Uploads_psa/<?= $a['psa'] ?>" target="_blank"><?= $a['psa'] ?></a>
                <input class="form-control" type="file" id="psa" name="psa">
            </div>
            <div class="form-group">
                <label for="good_moral">Certificate of Good Moral:</label>
                <a href="../Uploads_gm/<?= $a['good_moral'] ?>" target="_blank"><?= $a['good_moral'] ?></a>
                <input class="form-control" type="file" id="good_moral" name="good_moral">
            </div>
            <div class="form-group">
                <label for="e_Form">Copy of Enrollment Form:</label>
                <a href="../Uploads_ef/<?= $a['e_Form'] ?>" target="_blank"><?= $a['e_Form'] ?></a>
                <input class="form-control" type="file" id="e_Form" name="e_Form">
            </div>

        <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<?php } ?>