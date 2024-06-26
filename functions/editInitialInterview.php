<?php

if(isset($_POST['submit']) && isset($_POST['modeOfTnterview'])){
    require '../classes/admin.php';
    require '../classes/database.php';
    include '../email-design/editInitialInterview-design.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $date = $_POST['date'];
    $newDate = $_POST['interviewDate'];
    $mode_interview = isset($_POST['modeOfTnterview']) ? $_POST['modeOfTnterview']:'';
    $additional = isset($_POST['additionalInput']) ? $_POST['additionalInput']:'';

    if($mode_interview == "Online"){
        $data = $additional;
    }else{
        $data = "AREA 6 SITIO VETERANS, BRGY. BAGONG SILANGAN, QUEZON CITY 1119 Quezon City, Philippines";
    }

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

if (!$dateExists) {
    // The new date doesn't exist, proceed with editing initial interview
    $edit = $admin->editInitialInterview($date, $newDate, $mode_interview, $data);
    
    if ($edit) {
        $newDate1 = date("M d, Y", strtotime($newDate));
        
        foreach ($applicants as $email) {
            $info = $admin->getApplicantById($email['scholar_id']);
            $last_name = $info[0]['l_name'];
            $appliEmail = $info[0]['email'];
            $start = $email["time_start"];
            $end = $email["time_end"];

            $convertedTime = date("h:i A", strtotime($start));
            $convertedTime1 = date("h:i A", strtotime($end));

            $message = editInitialIntEmail($last_name, $convertedTime, $convertedTime1, $newDate1, $mode_interview, $data);

            $database->sendEmail($appliEmail, "Initial Interview Schedule for Scholarship Application", $message);
        }
        header('Location: ../newdesign/schedule-task.php?message=success');
        exit();
    } else {
        header('Location: ../newdesign/schedule-task.php?message=failed');
        exit();
    }
} else {
    // The new date already exists in the database
    header('Location: ../newdesign/schedule-task.php?message=date_exists');
    exit();
}
}else{
    header('Location: ../newdesign/schedule-task.php?message=allFieldsAreRequire');
    exit();
}
