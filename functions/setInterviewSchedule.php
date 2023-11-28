<?php 
require '../classes/admin.php';
require '../classes/database.php';

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

    $message = "
    Interview Schedule Confirmation
    
    Dear ". $info[0]['f_name'] . " " .$info[0]['l_name']. ",
    
    I hope this message finds you well. We are excited to inform you about the schedule for your upcoming interview for the Scholarship Program.
    
    Interview Date: $date
    Interview Time Start: $time_start
    Interview Time End: $time_end
    
    Location:
    $venue
    
    Please make sure to arrive at least 15 minutes before the scheduled interview time. If you have any questions or require any additional information, please do not hesitate to contact us at $contactEmail or $contactPhone.
    
    We look forward to meeting you and discussing your application further. Best of luck with your interview!
    
    Warm regards,
    Socorro L. Bautista
    Executive Director
    Consuelo Chito Madrigal Foundation
    ";


    $sentEmail = $database->sendEmail($email,"Interview Schedule Confirmation", $message);

    header('Location: ../Pages-admin/schedule-task.php?status=success');
}