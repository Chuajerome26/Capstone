<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $scholar_id = $_POST['scholar_id'];
    $applicantInfo = $admin->getApplicantById($scholar_id);
    $email = $applicantInfo[0]['email'];
    $id_newStat = $applicantInfo[0]['id_status'];
    $grade_newStat = $applicantInfo[0]['grade_status'];
    $psa_newStat = $applicantInfo[0]['psa_status'];
    $gm_newStat = $applicantInfo[0]['gm_status'];
    $ef_newStat = $applicantInfo[0]['ef_status'];
    
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
        $database->sendEmail($email,"Your Schedule for Interview", $newDate);
    }else{
        if($id_newwStat == 1){
            $IDstat = "Correct ID";
        }elseif($id_newwStat == 0){
            $IDstat = "Wrong ID";
        }

        if($grade_newwStat == 1){
            $Gradestat = "Correct Grade";
        }elseif($grade_newwStat == 0){
            $Gradestat = "Wrong Grade";
        }

        if($psa_newwStat == 1){
            $PSAstat = "Correct PSA";
        }elseif($psa_newwStat == 0){
            $PSAstat = "Wrong PSA";
        }

        if($gm_newwStat == 1){
            $GMstat = "Correct Good Moral";
        }elseif($gm_newwStat == 0){
            $GMstat = "Wrong Good Moral";
        }

        if($ef_newwStat == 1){
            $EFstat = "Correct Enrollment Form";
        }elseif($ef_newwStat == 0){
            $EFstat = "Wrong Enrollment Form";
        }

        $message = "
        1. $IDstat
        2. $Gradestat
        3. $PSAstat
        4. $GMstat
        5. $EFstat";

        $database->sendEmail($email,"Your Application is Under Review", $message);
    }
     
     header('Location: ../Pages-admin/admin-application.php?status=UpdatedRemarks');
}
