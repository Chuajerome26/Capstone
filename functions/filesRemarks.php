<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id_remarks = $_POST['id_remarks'];
    $cog_remarks = $_POST['cog_remarks'];
    $psa_remarks = $_POST['psa_remarks'];
    $gm_remarks = $_POST['gm_remarks'];
    $eForm_remarks = $_POST['eForm_remarks'];
    $start_time = '09:00';
    $end_time = '15:00';
    $excluded_start = '12:00';
    $excluded_end = '13:00';
    $max10 = 1;
    $duration = 30;

    $scholar_id = $_POST['scholar_id'];
    $applicantInfo = $admin->getApplicantById($scholar_id);
    $email = $applicantInfo[0]['email'];
    $last_name = $applicantInfo[0]['l_name'];
    $id_newStat = $applicantInfo[0]['id_status'];
    $grade_newStat = $applicantInfo[0]['grade_status'];
    $psa_newStat = $applicantInfo[0]['psa_status'];
    $gm_newStat = $applicantInfo[0]['gm_status'];
    $ef_newStat = $applicantInfo[0]['ef_status'];

    $scholarData = array(
        'scholar_id' => $scholar_id,
        'type' => 0,

    );
    
    // Check if documents is set, otherwise use a default value (e.g., 0)
    $scholar_id = $_POST['scholar_id'];
    $id_status = isset($_POST['id_pic']) ? $_POST['id_pic'] : $id_newStat;
    $grade_status = isset($_POST['cog']) ? $_POST['cog'] : $grade_newStat;
    $psa_status = isset($_POST['psa']) ? $_POST['psa'] : $psa_newStat;
    $gm_status = isset($_POST['gm']) ? $_POST['gm'] : $gm_newStat;
    $ef_status = isset($_POST['eForm']) ? $_POST['eForm'] : $ef_newStat;

    $admin->updateFilesRemarks($scholar_id, $id_status, $grade_status, $psa_status, $gm_status, $ef_status);


    // new Update to the Files
    $newapplicantInfo = $admin->getApplicantById($scholar_id);
    $currentDate = date('Y-m-d');
    // Add 7 days to the current date
    $newDate = date('Y-m-d', strtotime($currentDate . ' +7 days'));



    $id_newwStat = $newapplicantInfo[0]['id_status'];
    $grade_newwStat = $newapplicantInfo[0]['grade_status'];
    $psa_newwStat = $newapplicantInfo[0]['psa_status'];
    $gm_newwStat = $newapplicantInfo[0]['gm_status'];
    $ef_newwStat = $newapplicantInfo[0]['ef_status'];

    if($id_newwStat == 1 && $grade_newwStat == 1 && $psa_newwStat == 1 && $gm_newwStat == 1 && $ef_newwStat == 1){
        
        $sched = $admin->selectAndInsertSchedules($scholarData, $start_time, $end_time, $excluded_start, $excluded_end, $duration, $max10, $newDate);
        $date = $sched[0]['date'];
        $time_start = $sched[0]['start'];
        $time_end = $sched[0]['end'];

        $convertedTime = date("h:i A", strtotime($time_start));
        $convertedTime1 = date("h:i A", strtotime($time_end));
        $message = "Dear $last_name,\nYour Schedulte for Interview: \nSchedule Date for Interview: $date\nTime Start: $convertedTime\nTime End: $convertedTime1\n";
        $database->sendEmail($email,"Scholarship Application Evaluation - Completed", $message);
    }else{
        $wrongFiles = "Wrong";
        $counter = 1; // Initialize a counter variable

        if ($id_newwStat == 0) {
            $wrongFiles .= "\n" . $counter . ". 2x2 Picture - ". $id_remarks;
            $counter++; // Increment the counter
        }

        if ($grade_newwStat == 0) {
            $wrongFiles .= "\n" . $counter . ". Grade - ". $cog_remarks;
            $counter++; // Increment the counter
        }

        if ($psa_newwStat == 0) {
            $wrongFiles .= "\n" . $counter . ". PSA - ". $psa_remarks;
            $counter++; // Increment the counter
        }

        if ($gm_newwStat == 0) {
            $wrongFiles .= "\n" . $counter . ". Good Moral - ". $gm_remarks;
            $counter++; // Increment the counter
        }

        if ($ef_newwStat == 0) {
            $wrongFiles .= "\n" . $counter . ". Enrollment Form - ". $eForm_remarks;
            $counter++; // Increment the counter
        }

        $message = "
        
        
        ".$wrongFiles;




        $database->sendEmail($email,"Your Application is Under Review", $message);
    }
     
     header('Location: ../Pages-admin/admin-application.php?status=UpdatedRemarks');
}
