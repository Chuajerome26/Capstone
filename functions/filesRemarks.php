<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $arrayNames = array('IdPhoto', 'FamilyProfile', 'LetterofIntent', 'ParentConsent', 'CopyofGrades',
                    'BirthCertificate', 'Indigency', 'RecommendationLetter', 'GoodMoral', 'SchoolDiploma', 'Form137/138', 'AcceptanceLetter'
                , 'EnrollmentForm', 'FamilyPicture', 'SketchofHouseArea');
    $remarks = array();
    // Iterate through each name and retrieve its value from $_POST
    foreach ($arrayNames as $name) {
        // Check if the value exists in $_POST before assigning
        if (isset($_POST[$name."_remarks"])) {
            // Retrieve the status and remarks based on $_POST
            $remarks[$name] = isset($_POST[$name.'_remarks']) ? $_POST[$name.'_remarks'] : "";
        } else {
            // If the value doesn't exist in $_POST, assign an empty string for remarks
            $remarks[$name] = "";
        }
    }
    // $id_remarks = $_POST['id_remarks'];
    // $cog_remarks = $_POST['cog_remarks'];
    // $psa_remarks = $_POST['psa_remarks'];
    // $gm_remarks = $_POST['gm_remarks'];
    // $eForm_remarks = $_POST['eForm_remarks'];
    $start_time = '09:00';
    $end_time = '15:00';
    $excluded_start = '12:00';
    $excluded_end = '13:00';
    $max10 = 1;
    $duration = 30;

    $scholar_id = $_POST['scholar_id'];
    $applicantInfo = $admin->getApplicantsFiles($scholar_id);

    // $email = $applicantInfo[0]['email'];
    // $last_name = $applicantInfo[0]['l_name'];
    // $id_newStat = $applicantInfo[0]['id_status'];
    // $grade_newStat = $applicantInfo[0]['grade_status'];
    // $psa_newStat = $applicantInfo[0]['psa_status'];
    // $gm_newStat = $applicantInfo[0]['gm_status'];
    // $ef_newStat = $applicantInfo[0]['ef_status'];

    $scholarData = array(
        'scholar_id' => $scholar_id,
        'type' => 0,

    );
    
    $status = array();
    foreach ($arrayNames as $name) {
        // Check if the value exists in $_POST before assigning
        if (isset($_POST[$name])) {
            $status[$name] = $_POST[$name];
        } else {
            foreach ($applicantInfo as $file) {
                if ($file['requirement_name'] == $name) {
                    $currentStatus = $file['status'];
                    break; // Exit the loop once the status is found
                }
            }
            $status[$name] = $currentStatus;
        }
    }
    $admin->updateFilesRemarks($scholar_id, $status, $arrayNames);

    $scholar_infor = $admin->getApplicantById($scholar_id); 
    $last_name = $scholar_infor[0]['l_name'];
    $email = $scholar_infor[0]['email'];
    $countCorrect = $admin->getApplicantsFilesCorrect($scholar_id);
    $currentDate = date('Y-m-d');
    // Add 7 days to the current date
    $newDate = date('Y-m-d', strtotime($currentDate . ' +7 days'));

    if($countCorrect[0]['count'] == 16){
        
        $sched = $admin->selectAndInsertSchedules($scholarData, $start_time, $end_time, $excluded_start, $excluded_end, $duration, $max10, $newDate);
        $date = $sched[0]['date'];
        $time_start = $sched[0]['start'];
        $time_end = $sched[0]['end'];

        $convertedTime = date("h:i A", strtotime($time_start));
        $convertedTime1 = date("h:i A", strtotime($time_end));
        $message = '
Dear '.$last_name.',

I trust this message finds you well. We wanted to inform you that the evaluation of your scholarship application has been successfully completed.

    NOTE: Date and Time for Initial Interview 
    Date: '.$date.'
    Time: '.$convertedTime.' - '.$convertedTime1.'

Our committee thoroughly reviewed your academic achievements, extracurricular activities, and personal statements. We appreciate the time and effort you invested in your application.

Thank you for your interest in the John Poul B. Galen. We wish you the best of luck in the final stages of the selection process.

Best regards,

Consuelo "CHITO" Madrigal Foundation Inc
ccmf2015main@gmail.com
';

        $database->sendEmail($email,"Scholarship Application Evaluation - Completed", $message);
    }else{
        $counter = 1;
        $wrongFiles = "";

        foreach ($arrayNames as $name) {
            // Assuming $id_remarks is the remark associated with the file '2x2 Picture'
            if ($remarks[$name] != "") {
                $wrongFiles .= "\n" . $counter . ". " . $name . " - " . $remarks[$name];
                $counter++; // Increment the counter
            }
        }

        $message = '
Dear '.$last_name.',

Thank you for submitting your application for the Consuelo "CHITO" Madrigal Foundation, Inc. We have begun the evaluation process, and we regret to inform you that there are discrepancies or missing information in your submitted files.

To ensure a fair assessment, we kindly request you to review your application and rectify the issues identified below:
'.$wrongFiles.'

Please make the necessary corrections and resubmit your updated files by '.$newDate.'. If you encounter any challenges or have questions regarding the requested changes, feel free to contact our scholarship office at 2-8289-8795.

We appreciate your prompt attention to this matter and value your commitment to the scholarship application process.

Best regards,

Consuelo "CHITO" Madrigal Foundation Inc
ccmf2015main@gmail.com
        ';

        $database->sendEmail($email,"Scholarship Application - File Evaluation Update", $message);
    }

    header('Location: ../Pages-admin/admin-application.php?status=UpdatedRemarks');
}
