
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

    header('Location: ../newdesign/renewal.php?status=success');
    exit();

}