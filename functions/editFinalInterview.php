<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $date = $_POST['date'];
    $newDate = $_POST['interviewDate'];

    $applicants = $admin->getInterviewsByDate($date);

    $edit = $admin->editFinalInterview($date, $newDate);
    
    if($edit){
        $newDate1 = date("M d, Y", strtotime($newDate));
        foreach($applicants as $email){
            $info = $admin->getApplicantById($email['scholar_id']);
            $last_name = $info[0]['l_name'];
            $appliEmail = $info[0]['email'];

            $message = '
Dear '.$last_name.',

This message is to inform you that the final interview schedule for the scholarship application is currently in edit. Below are the details that can be modified:

    NOTE: SAME TIME
    Date: '.$newDate1.'

Location: Consuelo "CHITO" Madrigal Foundation, Inc.

Please make the necessary adjustments as needed and ensure that the updated information is accurately reflected.

Thank you for your attention to this matter.

Best regards,


Consuelo "CHITO" Madrigal Foundation, Inc.
ccmf2015main@gmail.com
            ';

            $database->sendEmail($appliEmail, "Final Interview Schedule for Scholarship Application", $message);
        }
        header('Location: ../Pages-admin/schedule-task.php?success');
    }
}