<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

if(isset($_POST['submit'])){

    $id = $_POST["scholar_id"];
    $remarks = $_POST['remarks'];
    $date =  date('Y-m-d');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholars_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('INSERT INTO admin_remarks (scholar_id, remarks, date) VALUES (:id, :remarks, :date)');

    if(!$stmt->execute(['id' => $id, 'remarks' => $remarks, 'date' => $date])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }
    
    $declineMessage = "Dear ".$user['f_name']." ".$user['l_name'].",

Remarks,

".$remarks."



Best Regards,
Socorro L. Bautista
Executive Director
Consuelo Chito Madrigal Foundation
Incorporation
    
    ";

    $sentEmail = $database->sendEmail($email,"Update on Your Application", $declineMessage);

    header('Location: ../Pages-admin/admin-application.php?status=successRemarks');
}


?>
