<?php 

if(isset($_POST['submit'])){
    require '../classes/scholar.php';
    require '../classes/database.php';
    include '../email-design/renewalEvaluation-design.php';

    $database = new Database();
    $scholar = new Scholar($database);
    $id = $_POST['renewal_id'];

    $getStatus = $scholar->getRenewalNewInfoById($id);

    var_dump($getStatus);

    $info = $scholar->findById($getStatus[0]['scholar_id']);

    $email = $info['email'];
    
    $file1 = isset($_POST['GradeSlip']) ? $_POST['GradeSlip']:$getStatus[0]['file1_status'];
    $file1_remarks = isset($_POST['GradeSlip_remarks']) ? $_POST['GradeSlip_remarks']:'';
    $file2 = isset($_POST['RegistrationForm']) ? $_POST['RegistrationForm']:$getStatus[0]['file2_status'];
    $file2_remarks = isset($_POST['RegistrationForm_remarks']) ? $_POST['RegistrationForm_remarks']:'';
    
    $scholar->updateRenewalStatus($id, $file1, $file2);
    
    if($scholar){
        $getStatus1 = $scholar->getRenewalNewInfoById($id);
        if($getStatus1[0]['file1_status'] == 1 && $getStatus1[0]['file2_status'] == 1){

            if($getStatus1[0]['scholar_type'] == 3){
                $grants = 5000;
            }elseif($getStatus1[0]['scholar_type'] == 2){
                $grants = 4000;
            }elseif($getStatus1[0]['scholar_type'] == 1){
                $grants = 2000;
            }

            $stmt = $database->getConnection()->prepare('INSERT INTO stipend (scholar_id, full_name, scholar_type, grants, date_insert) VALUE (?, ?, ?, ?, CURRENT_TIMESTAMP)');

            if(!$stmt->execute([$getStatus1[0]['scholar_id'], $getStatus1[0]['full_name'], $getStatus1[0]['scholar_type'], $grants])){
                header('Location: ../newdesign/admin-application.php?status=error');
                exit();
            }


            header('Location: ../newdesign/renewal.php?renewal=complete');
            exit();
        } else {
            $message = renewalEvaluationEmail($file1_remarks, $file2_remarks, $getStatus1);
    
            $database->sendEmail($email, "Your Renewal is Under Review", $message);
            // header('Location: ../newdesign/renewal.php?renewal=evaluation');
            // exit();
        }
    }
    
}