<?php 

if(isset($_POST['submit'])){
    require '../classes/scholar.php';
    require '../classes/database.php';

    $database = new Database();
    $scholar = new Scholar($database);
    $id = $_POST['renewal_id'];

    $getStatus = $scholar->getRenewalInfo($id);
    $info = $scholar->findById($getStatus[0]['scholarID']);
    var_dump($info);
    $email = $info['email'];

    $file1 = isset($_POST['GradeSlip']) ? $_POST['GradeSlip']:$getStatus[0]['file1_status'];
    $file1_remarks = isset($_POST['GradeSlip_remarks']) ? $_POST['GradeSlip_remarks']:'';
    $file2 = isset($_POST['RegistrationForm']) ? $_POST['RegistrationForm']:$getStatus[0]['file2_status'];
    $file2_remarks = isset($_POST['RegistrationForm_remarks']) ? $_POST['RegistrationForm_remarks']:'';

    $scholar->updateRenewalStatus($id, $file1, $file2);

    if($scholar){
        $getStatus1 = $scholar->getRenewalInfo($id);
        if($getStatus1[0]['file1_status'] ==1 && $getStatus1[0]['file2_status'] == 1){
            header('Location: ../Pages-admin/renewal.php?renewal=complete');
            exit();
        }else{
            $counter = 1; // Initialize a counter variable
            $wrongFiles = "";

            if ($getStatus1[0]['file1_status'] == 0) {
                $wrongFiles .= "\n" . $counter . ". Grade Slip - ". $file1_remarks;
                $counter++; // Increment the counter
            }

            if ($getStatus1[0]['file2_status'] == 0) {
                $wrongFiles .= "\n" . $counter . ". Registration Form - ". $file2_remarks;
                $counter++; // Increment the counter
            }

            $message = '
            '.$wrongFiles.'
            ';

            $database->sendEmail($email,"Your Renewal is Under Review", $message);
            header('Location: ../Pages-admin/renewal.php?renewal=evaluation');
            exit();
        }
    }
}