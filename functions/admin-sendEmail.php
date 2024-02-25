<?php
require '../Classes/admin.php';
require '../Classes/database.php';

$database = new Database();
$admin = new Admin($database);

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
    
    header("Location: ../Pages-admin/admin-scholar.php?success=emailSent");
    exit();
}else{
    header("Location: ../Pages-admin/admin-scholar.php?success=emailSentError");
    exit();
}