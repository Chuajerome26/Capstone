<?php

require '../classes/database.php';
require '../classes/admin.php';
include '../email-design/auto-decline.php';

$database = new Database();
$admin = new Admin($database);

if(isset($_POST['submit'])){
    $date = date('Y-m-d H:i:s');
    $scholar_id = $_POST['scholar_id'];
    $info1 = $admin->getScholarById($scholar_id);
    $full_name = $_POST['fName'].' '.$_POST['mName'].' '.$_POST['lName'].' '.$_POST['suffix'];
    $c_stat = $_POST['cStatus'];
    $active_num = $_POST['mNumber'];
    $gcash_num = $_POST['gNumber'];
    $educLvl = $_POST['eduLevel'];
    $totalUnits = $_POST['totalUnitsCol'];
    $university = isset($_POST['university']) && $_POST['university'] == "Others" ? $_POST['otherUniv']:$_POST['university'];
    $unitsPerSem = $_POST['unitsPerSem'];
    $yLevel = $_POST['yLevel'];
    $semester = $_POST['semester'];
    $schoolYear = $_POST['schoolYear'];

    $sub = $_POST['sub'];
    $unit = $_POST['totalUnits'];
    $grade = $_POST['gAverage'];

    $stmt = $database->getConnection()->prepare('SELECT * FROM scholar_renewal_date');
    $stmt->execute();
    $user = $stmt->fetch();

    $grade1 = 0;
    $count = 0;
    for ($i = 0; $i < count($sub); $i++) {
        // Prepare an SQL statement
        $stmt4 = $database->getConnection()->prepare("INSERT INTO scholar_grade (scholar_id, subject, unit, grade, reference_num) VALUES (?, ?, ?, ?, ?)");
        $stmt4->execute([$scholar_id ,$sub[$i], $unit[$i], $grade[$i], $user['reference_number']]);

        $grade1 += $grade[$i];
        $count++;
    }

    $average = round($grade1 / $count, 2);

    if (($average >= 1.0 && $average <= 1.5) || ($average >= 95 && $average <= 100)) {
        $scholar_type = 3;
    } elseif (($average >= 1.6 && $average <= 1.9) || ($average >= 90 && $average <= 94)) {
        $scholar_type = 2;
    } elseif (($average >= 2.0 && $average <= 2.25) || ($average >= 85 && $average <= 89)) {
        $scholar_type = 1;
    } else {
        $scholar_type = 0;
    }

    if($scholar_type != 0){
        $uploadDir = "../Uploads_gslip/";
        $uploadedFileName1 = $_FILES['regForm']['name'];
        $uploadedFileName2 = $_FILES['gradeSlip']['name'];
        $uploadedFile1 = $uploadDir . $uploadedFileName1;
        $uploadedFile2 = $uploadDir . $uploadedFileName2;
    
        if (move_uploaded_file($_FILES['regForm']['tmp_name'], $uploadDir . $uploadedFileName1) &&
            move_uploaded_file($_FILES['gradeSlip']['tmp_name'], $uploadDir . $uploadedFileName2)) {

                $stmt2 = $database->getConnection()->prepare("INSERT INTO scholar_renewal (scholar_id, full_name, c_status, contact_num, gcash, educ_lvl, total_units, univ, num_units_sem, year_lvl, sem, school_year, scholar_type, reference_number, date_apply, file1, file2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt2->execute([$scholar_id, $full_name, $c_stat, $active_num, $gcash_num, $educLvl, $totalUnits, $university, $unitsPerSem, $yLevel, $semester, $schoolYear, $scholar_type, $user['reference_number'], $date, $uploadedFileName1, $uploadedFileName2]);

                // Update renewal_status to 1 after insertion
                $stmt3 = $database->getConnection()->prepare("UPDATE scholar_renewal SET renewal_status = 1 WHERE scholar_id = ?");
                $stmt3->execute([$scholar_id]);
                header('Location: ../Pages-scholar/dashboard.php?scholar=successRenew');
                exit;
            
        } else {
            header('Location: ../Pages-scholar/dashboard.php?scholar=error');
            exit;
        }
    }else{
        $message = autoDeclined($info[0]['l_name']);
        $database->sendEmail($info[0]['email'], "Renewal Declined", $message);
        header('Location: ../Pages-scholar/dashboard.php?scholar=successRenew');
        exit;
    }
    header('Location: ../Pages-Scholar/renewal-form.php');
    exit();
}