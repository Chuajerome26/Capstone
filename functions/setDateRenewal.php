
<?php

require '../classes/database.php';
require '../classes/admin.php';
include '../email-design/renewalStartEmail-design.php';

function generateReferenceNumber($length = 8) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $referenceNumber = '';
    $charLength = strlen($characters);

    // Generate random characters
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charLength - 1);
        $referenceNumber .= $characters[$randomIndex];
    }

    // Append current year and month for uniqueness
    $referenceNumber .= date('ym');

    return $referenceNumber;
}

// Example usage:
$reference = generateReferenceNumber();


if(isset($_POST['submit'])){
    $database = new Database();
    $admin = new Admin($database);
    
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];

    $stmt = $database->getConnection()->prepare('UPDATE scholar_renewal_date SET renewal_date_start = :start ,renewal_date_end = :end, reference_number = :ref WHERE id = 1');

    if(!$stmt->execute(['start' => $start,'end' => $end, 'ref' => $reference])){
        header('Location: ../newdesign/renewal.php?status=error');
        exit();
    }

    $stmt1 =  $database->getConnection()->prepare('UPDATE scholar_info SET nonCom = 0');

    if(!$stmt1->execute()){
        header('Location: ../newdesign/renewal.php?status=error');
        exit();
    }
    // $stmt1 = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE status = 1');
    // $stmt1->execute();
    // $rows = $stmt1->fetchAll();

    // if ($rows) {
    //     $insertStmt = $database->getConnection()->prepare('INSERT INTO scholar_renew (scholarID, Firstname, Lastname, Email) VALUES (:scholarID, :first_name, :last_name, :email)');
        
    //     // Loop through each row and insert the values into scholar_renewal
    //     foreach ($rows as $row) {
    //         // Bind parameters and execute the INSERT statement
    //         $insertStmt->bindParam(':scholarID', $row['id']);
    //         $insertStmt->bindParam(':first_name', $row['f_name']);
    //         $insertStmt->bindParam(':last_name', $row['l_name']);
    //         $insertStmt->bindParam(':email', $row['email']);
    //         $insertStmt->execute();
    //     }

    //     // Redirect to a success page
    //     header('Location: ../newdesign/renewal.php?status=success');
    //     exit();
    // } else {
    //     // Redirect to a page indicating no data found
    //     header('Location: ../newdesign/renewal.php?status=empty');
    //     exit();
    // }
    $scholar_info = $admin->getScholars();
    $dateFormat = date('M d, Y', strtotime($start));

    $messageStart = renewalStartEmail($dateFormat);

    foreach($scholar_info as $s){
        $database->sendEmail($s['email'], "Scholar Program Renewal", $messageStart);
    }


    header('Location: ../newdesign/renewal.php?status=success');
    exit();

}