<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_POST['submit'])) {
    // Process form submission
    $id = $_POST['id'];
    
    // Update the data
    $admin->updateScholarFiles($id);
    
    header('Location: ../Pages-Applicant/Applicant-Requirements2.php?status=editSuccess');
}

