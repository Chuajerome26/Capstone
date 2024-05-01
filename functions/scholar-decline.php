<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';
include '../email-design/scholar-decline-design.php';

$database = new Database;
$admin = new Admin($database);

$user_id = $_SESSION["id"];

if(isset($_POST['submit'])){

    $id = $_POST["declineId"];
    $remarks = $_POST['remarks'];
    $currentDate1 = date('Y-m-d H:i:s');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('UPDATE scholar_info SET status = 5 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../newdesign/admin-application.php?status=error');
        exit();
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 5 WHERE id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../newdesign/admin-application.php?status=error');
        exit();
    }
    
    $declineMessage = applicantDecline($user['l_name']);
    $addRemarks = $admin->addRemarks($id, $user_id, 5, $remarks, $currentDate1);
    $sentEmail = $database->sendEmail($email,"Scholarship Application Status Update", $declineMessage);

    header('Location: ../newdesign/admin-application.php?status=successDecline');
    exit();
}


?>
