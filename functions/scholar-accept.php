<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';
include '../email-design/scholar-accept-design.php';

$database = new Database;
$admin = new Admin($database);

$user_id = $_SESSION["id"];

if(isset($_POST["accept"])){
    
    $id = $_POST["acceptId"];
    $currentDate1 = date('Y-m-d H:i:s');
    $currentDate = date('Y-m-d');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];
    $stmt = $database->getConnection()->prepare('UPDATE scholar_info SET status = 1, application_status = 3 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
        exit();
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 1 WHERE user_id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
        exit();
    }
    
    $acceptanceMessage = applicantAccept($user['l_name']);

    $addRemarks = $admin->addRemarks($id, $user_id, 3, $acceptanceMessage, $currentDate1);
    $sentEmail = $database->sendEmail($email,"Congratulations! Scholarship Acceptance", $acceptanceMessage);
    header('Location: ../Pages-admin/admin-application.php?status=success');
    exit();
}
