<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

if(isset($_POST['submit'])){

    $id = $_POST["declineId"];
    $remarks = $_POST['remarks'];

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholars_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];

    $stmt = $database->getConnection()->prepare('UPDATE scholars_info SET status = 5 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 5 WHERE id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }
    $declineMessage = "Dear ".$user['f_name']." ".$user['l_name'].",

    We regret to inform you that your application has been declined by the administrator.

    Thank you for your application for the Educational Assistant. After careful review,

    we regret to inform you that your application was not selected.

    We appreciate your interest and commend your efforts. Wishing you success in your
    academic and future endeavors.

    If you have any questions or need further information, please feel free to contact us.

    Best Regards,
    Socorro L. Bautista
    Executive Director
    Consuelo Chito Madrigal Foundation
    Incorporation
    
    ";
    $sentEmail = $database->sendEmail($email,"Your Scholarship Application Has been Declined!", $declineMessage);

    header('Location: ../Pages-admin/admin-application.php?status=successDecline');
}


?>
