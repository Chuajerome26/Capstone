<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;

if(isset($_POST["accept"])){
    
    $database = new Database;
    $id = $_POST["acceptId"];

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholars_info WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    $email = $user['email'];
    $stmt = $database->getConnection()->prepare('UPDATE scholars_info SET status = 1 WHERE id = :id');

    if(!$stmt->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }

    $stmt1 = $database->getConnection()->prepare('UPDATE login SET user_type = 1 WHERE id = :id');

    if(!$stmt1->execute(['id' => $id])){
        header('Location: ../Pages-admin/admin-application.php?status=error');
    }
    $acceptanceMessage = "Dear ".$user['f_name']." ".$user['l_name'].",

    We are delighted to inform you that your application has been accepted by our organization. Congratulations!

    Details of the Acceptance:
    - Dahil Malupet ka.
    - Pogi ka
    - Matalino ka
    - Edi ikaw na!

    We look forward to having you as a part of our program/team and working together towards our shared goals.

    If you have any questions or need further information, please do not hesitate to contact us.

    Sincerely,
    CCMF
    ";

    $sentEmail = $database->sendEmail($email,"Your Scholarship Application Has been Accepted!", $acceptanceMessage);
    header('Location: ../Pages-admin/admin-application.php?status=success');

}
