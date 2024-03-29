<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

if(isset($_POST["accept"])){
    
    $id = $_POST["acceptId"];
    $currentDate = date('Y-m-d');

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];
    $stmt = $database->getConnection()->prepare('UPDATE scholar_info SET status = 1, application_status = 3 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
        exit();
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 1 WHERE user_id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
        exit();
    }
    
    $acceptanceMessage = '
Dear '.$user['l_name'].',

We are delighted to inform you that your application for the Consuelo "CHITO" Madrigal Foundation, Inc. has been successful. Your academic achievements, aspirations, and dedication stood out among the applicants, making you a deserving recipient.
    
Details regarding the disbursement of funds and any additional requirements will be communicated to you shortly. If you have any questions or need further assistance, please do not hesitate to reach out to us at 2-8289-8795.
    
Once again, congratulations on this well-deserved achievement. We look forward to witnessing your continued success.
    
Best regards,
    
Executive Director
Consuelo "CHITO" Madrigal Foundation, Inc.
ccmf2015main@gmail.com';

    $addRemarks = $admin->addRemarks($id, 3, $acceptanceMessage, $currentDate);
    $sentEmail = $database->sendEmail($email,"Congratulations! Scholarship Acceptance", $acceptanceMessage);
    header('Location: ../Pages-admin/admin-application.php?status=success');
    exit();
}
