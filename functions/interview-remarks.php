<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

$user_id = $_SESSION["id"];

$currentDate1 = date('Y-m-d');

if(isset($_POST['submit'])){

    $id = $_POST["scholar_id"];
    $remarks = $_POST['remarks'];
    $date =  date('Y-m-d');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE scholar_id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('INSERT INTO admin_remarks (scholar_id, admin_id, remarks, remarks_mess, date) VALUES (:id, :admin_id, :remarks, :remarks_mess, :date)');

    if(!$stmt->execute(['id' => $id, 'admin_id' => $user_id, 'remarks' => 6, 'remarks_mess' => $remarks, 'date' => $date])){
        header('Location: ../newdesign/admin-application.php?status=error');
        exit();
    }

    header('Location: ../newdesign/schedule-task.php?status=successRemarks');
    exit();
}


?>
