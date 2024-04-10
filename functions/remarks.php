<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

$user_id = $_SESSION["id"];

if(isset($_POST['submit'])){

    $id = $_POST["scholar_id"];
    $remarks = $_POST['remarks'];
    $date =  date('Y-m-d');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('INSERT INTO admin_remarks (scholar_id, admin_id, remarks, remarks_mess, date) VALUES (:id, :admin_id, :remarks, :remarks_mess, :date)');

    if(!$stmt->execute(['id' => $id, 'admin_id' => $user_id, 'remarks' => 0, 'remarks_mess' => $remarks, 'date' => $date])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
        exit();
    }
    
    $declineMessage = "Dear ".$user['f_name']." ".$user['l_name'].",

".$remarks."



Best Regards,
Socorro L. Bautista
Executive Director
Consuelo Chito Madrigal Foundation
Incorporation
    
    ";

    $sentEmail = $database->sendEmail($email,"Update on Your Application", $declineMessage);

    header('Location: ../Pages-admin/admin-application.php?status=successRemarks');
    exit();
}


?>
