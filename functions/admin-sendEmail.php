<?php
require '../Classes/admin.php';
require '../Classes/database.php';

$database = new Database();
$admin = new Admin($database);

$user_id = $_SESSION['id'];

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
        $attachmentData = array(
            'name' => $_FILES['file']['name'],
            'tmpName' => $_FILES['file']['tmp_name'],
        );
        $database->sendEmail($email,$subject,$message,$attachmentData);
    }else{
        $database->sendEmail($email,$subject,$message);
    }
    
    $addRemarks = $admin->addRemarks($id, $user_id, 5, $remarks, $currentDate1);
    header("Location: ../newdesign/admin-scholar.php?success=emailSent");
    exit();
}else{
    header("Location: ../newdesign/admin-scholar.php?success=emailSentError");
    exit();
}