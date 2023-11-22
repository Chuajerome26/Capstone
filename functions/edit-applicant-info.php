<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_POST['submit'])) {
    // Process form submission
    $id = $_POST['id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $mobile_num = $_POST['mobile_num'];
    $email = $_POST['email'];
    $total_sub = $_POST['total_sub'];
    $total_units = $_POST['total_units'];
    $gwa = $_POST['gwa'];

    // Update the data
    $savee = $admin->editApplicants($id, $f_name, $l_name, $mobile_num, $email, $total_sub, $total_units, $gwa);
    if($savee){
        header('Location: ../Pages-Applicant/Applicant-Requirements2.php?status=editSuccess');
    }
}

