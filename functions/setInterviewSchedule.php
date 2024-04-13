<?php 
require '../classes/admin.php';
require '../classes/database.php';
include '../email-design/setInterviewSchedule-design.php';

$database = new Database();
$admin = new Admin($database);

if(isset($_POST['submit'])){
    $scholar_id = $_POST['scholar'];
    $date = $_POST['date'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $venue = $_POST['venue'];

    $info = $admin->getApplicantById($scholar_id);

    $email = $info[0]['email'];

    $save = $admin->setSchedule($scholar_id, $date, $time_start, $time_end, $venue);

    $message = SetIntSched($info, $date, $time_start, $time_end, $venue, $contactEmail, $contactPhone);


    $sentEmail = $database->sendEmail($email,"Interview Schedule Confirmation", $message);

    header('Location: ../Pages-admin/schedule-task.php?status=success');
    exit();
}