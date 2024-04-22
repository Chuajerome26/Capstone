<?php
session_start();
require '../Classes/admin.php';
require '../Classes/database.php';
require '../Classes/scholar.php';

$database = new Database();
$admin = new Admin($database);
$scholar = new Scholar($database);

$user_id = $_SESSION['id'];
$currentDate1 = date("Y-m-d H:i:s");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $info = $scholar->findByEmail1($email);

    var_dump($info);


    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
        $attachmentData = array(
            'name' => $_FILES['file']['name'],
            'tmpName' => $_FILES['file']['tmp_name'],
        );
        $database->sendEmail($email,$subject,$message,$attachmentData);
    }else{
        $database->sendEmail($email,$subject,$message);
    }
    
    $addRemarks = $admin->addRemarks($info['id'], $user_id, 7, $message, $currentDate1);
    header("Location: ../newdesign/admin-scholar.php?success=emailSent");
    exit();
}else{
    header("Location: ../newdesign/admin-scholar.php?success=emailSentError");
    exit();
}