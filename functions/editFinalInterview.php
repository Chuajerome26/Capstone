<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';
    include '../email-design/editFinalInterview-design.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $date = $_POST['date'];
    $newDate = $_POST['interviewDate'];

    $applicants = $admin->getInterviewsByDate($date);

    $allDates = $admin->getAllDates();

    // Check if the new date already exists in the database
    $dateExists = false;
    foreach ($allDates as $ad) {
        if ($ad['date'] === $newDate) {
            $dateExists = true;
            break;
        }
    }

    if(!$dateExists) {
    $edit = $admin->editFinalInterview($date, $newDate);
    
    if($edit){
        $newDate1 = date("M d, Y", strtotime($newDate));
        foreach($applicants as $email){
            $info = $admin->getApplicantById($email['scholar_id']);
            $last_name = $info[0]['l_name'];
            $appliEmail = $info[0]['email'];
            $start = $email["time_start"];
            $end = $email["time_end"];
            $mode = $email["mode_interview"];

            $convertedTime = date("h:i A", strtotime($start));
            $convertedTime1 = date("h:i A", strtotime($end));

            $message = editFinalIntEmail($last_name, $convertedTime, $convertedTime1, $newDate1, $mode);

            $database->sendEmail($appliEmail, "Final Interview Schedule for Scholarship Application", $message);
        }
        header('Location: ../Pages-admin/schedule-task.php?success');
        exit();
    }
}else{
        // The new date already exists in the database
        header('Location: ../Pages-admin/schedule-task.php?message=date_exists');
        exit();
    
}
}