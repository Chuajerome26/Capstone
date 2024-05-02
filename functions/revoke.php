<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';
require '../email-design/revoke-design.php';

$database = new Database();
$admin = new Admin($database);

$user_id = $_SESSION["id"];

$currentDate1 = date('Y-m-d H:i:s');

if(isset($_POST['revoke'])){

    $scholar_id = $_POST['scholar_id'];

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE scholar_id = :id');
    $stmt->execute(['id' => $scholar_id]);
    $user = $stmt->fetch();

    $email = $user['email'];
    $stmt = $database->getConnection()->prepare('UPDATE scholar_info SET status = 6 WHERE scholar_id = :id');

    if(!$stmt->execute(['id' => $scholar_id])){
        header('Location: ../newdesign/admin-scholar.php?status=error');
        exit();
    }

    $message = scholarRevoke($user['l_name']);


    $messageRevoke = '
Dear '.$user['l_name'].',

I trust this message finds you well.

It is with regret that I must inform you of the revocation of your scholar status due to not meeting the established criteria for maintaining this esteemed position.

As you are aware, our scholar program is designed to recognize individuals who consistently demonstrate excellence in their academic pursuits and actively contribute to our scholarly community. Regrettably, recent evaluations have indicated that your current contributions do not align with the expectations outlined in our criteria for maintaining scholar status.

While this decision may come as a disappointment, it is essential to uphold the integrity and standards of our scholar program. We believe in providing opportunities for those who meet and exceed our criteria to continue their valuable contributions to our community.

Effective immediately, your privileges and responsibilities as a scholar are revoked. This includes access to scholarly resources, participation in scholarly events, and any associated benefits.

We encourage you to take this as an opportunity for growth and reflection. Should you wish to reapply for scholar status in the future, we recommend addressing the areas where improvements are needed to align with our criteria.

Thank you for your past contributions to our scholarly community, and we wish you the best in your future endeavors.

If you have any questions or require further clarification regarding this decision, please do not hesitate to reach out to us. We are here to assist you in any way we can.

Warm regards,

Executive Director
Consuelo "CHITO" Madrigal Foundation, Inc.
ccmf2015main@gmail.com    
    ';

    $addRemarks = $admin->addRemarks($scholar_id, $user_id, 6, $messageRevoke, $currentDate1);

    $sentEmail = $database->sendEmail($email,"Revocation of Scholar Status Due to Criteria Non-fulfillment", $message);
    header('Location: ../newdesign/admin-scholar.php?status=success');
    exit();
}


