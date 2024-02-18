<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

if(isset($_POST['submit'])){

    $id = $_POST["declineId"];
    $remarks = $_POST['remarks'];

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('UPDATE scholar_info SET status = 5 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 5 WHERE id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }
    $declineMessage = '
Dear '.$user["l_name"].',

We appreciate the time and effort you invested in applying for the Consuelo Chito Scholarship Program. After careful consideration, we regret to inform you that your application has not been selected for the next stage of the selection process.

We received many qualified applications, making the decision-making process challenging. While your application did not move forward, we commend your dedication and wish you continued success in your academic and personal endeavors.

If you have any questions or would like feedback on your application, please don\'t hesitate to reach out to us at Consuelo "CHITO" Madrigal Foundation, Inc.

Thank you for your interest in our scholarship program, and we wish you the very best in your future pursuits.

Sincerely,

Consuelo "CHITO" Madrigal Foundation, Inc.
ccmf2015main@gmail.com
    ';

    $sentEmail = $database->sendEmail($email,"Scholarship Application Status Update", $declineMessage);

    header('Location: ../Pages-admin/admin-application.php?status=successDecline');
}


?>
