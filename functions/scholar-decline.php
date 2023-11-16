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

    Reason for Decline:
    ".$remarks."

    If you have any questions or need further information, please feel free to contact us.

    Sincerely,
    CCMF
    
    ";
    $sentEmail = $database->sendEmail($email,"Your Scholarship Application Has been Declined!", $declineMessage);

    header('Location: ../Pages-admin/admin-application.php?status=successDecline');
}


?>
