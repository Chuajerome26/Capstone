
<?php

require '../classes/database.php';


if(isset($_POST['submit'])){
    $database = new Database();
    
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];

    $stmt = $database->getConnection()->prepare('UPDATE scholar_renewal_date SET renewal_date_start = :start ,renewal_date_end = :end WHERE id = 1');

    if(!$stmt->execute(['start' => $start,'end' => $end])){
        header('Location: ../newdesign/renewal.php?status=error');
        exit();
    }

    $stmt1 = $database->getConnection()->prepare('SELECT * FROM scholar_info WHERE status = 1');
    $stmt1->execute();
    $rows = $stmt1->fetchAll();

    if ($rows) {
        $insertStmt = $database->getConnection()->prepare('INSERT INTO scholar_renew (scholarID, Firstname, Lastname, Email) VALUES (:scholarID, :first_name, :last_name, :email)');
        
        // Loop through each row and insert the values into scholar_renewal
        foreach ($rows as $row) {
            // Bind parameters and execute the INSERT statement
            $insertStmt->bindParam(':scholarID', $row['id']);
            $insertStmt->bindParam(':first_name', $row['f_name']);
            $insertStmt->bindParam(':last_name', $row['l_name']);
            $insertStmt->bindParam(':email', $row['email']);
            $insertStmt->execute();
        }

        // Redirect to a success page
        header('Location: ../newdesign/renewal.php?status=success');
        exit();
    } else {
        // Redirect to a page indicating no data found
        header('Location: ../newdesign/renewal.php?status=empty');
        exit();
    }



    header('Location: ../newdesign/renewal.php?status=success');
    exit();

}