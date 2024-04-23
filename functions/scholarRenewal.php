<?php
session_start();
if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';

    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);
    $currentDate1 = date('Y-m-d H:i:s');

    if (isset($_POST['submit']) && isset($_FILES['file1']['tmp_name']) && isset($_FILES['file2']['tmp_name'])) {
        $yearLvl = ($_POST['yearLvl'] === 'other') ? $_POST['otherYearLevel'] : $_POST['yearLvl'];
        $scholar_id = $_SESSION['id'];
    
        // Handle file upload
        $uploadDir = "../Uploads_gslip/";
        $uploadedFileName1 = $_FILES['file1']['name'];
        $uploadedFileName2 = $_FILES['file2']['name'];
        $uploadedFile1 = $uploadDir . $uploadedFileName1;
        $uploadedFile2 = $uploadDir . $uploadedFileName2;
    
        if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir . $uploadedFileName1) &&
            move_uploaded_file($_FILES['file2']['tmp_name'], $uploadDir . $uploadedFileName2)) {
            if ($scholar->updateRenewalData($yearLvl, $uploadedFileName1, $uploadedFileName2, $scholar_id)) {
                $addRemarks = $admin->addRemarks($scholar_id, 0, 8, 'Renew', $currentDate1);
                header('Location: ../Pages-scholar/dashboard.php?scholar=successRenew');
                exit;
            } else {
                header('Location: ../Pages-scholar/dashboard.php?scholar=error');
                exit;
            }
        } else {
            header('Location: ../Pages-scholar/dashboard.php?scholar=error');
            exit;
        }
    }else if(isset($_POST['submit']) && isset($_FILES['file1']['tmp_name']) ){
        $scholar_id = $_SESSION['id'];

        $info = $scholar->getRenewalInfoById($scholar_id);
        // Handle file upload
        $uploadDir = "../Uploads_gslip/";
        $uploadedFileName1 = $_FILES['file1']['name'];
        $uploadedFile1 = $uploadDir . $uploadedFileName1;
    
        if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir . $uploadedFileName1)) {
            if ($scholar->updateRenewalData($yearLvl, $uploadedFileName1, $info[0]['file2'], $scholar_id)) {
                $addRemarks = $admin->addRemarks($scholar_id, 0, 9, 'Renew', $currentDate1);
                header('Location: ../Pages-scholar/dashboard.php?scholar=successRenew');
                exit;
            } else {
                header('Location: ../Pages-scholar/dashboard.php?scholar=error');
                exit;
            }
        } else {
            header('Location: ../Pages-scholar/dashboard.php?scholar=error');
            exit;
        }
    }else if(isset($_POST['submit']) && isset($_FILES['file2']['tmp_name']) ){
        $scholar_id = $_SESSION['id'];

        $info = $scholar->getRenewalInfoById($scholar_id);
        // Handle file upload
        $$uploadDir = "../Uploads_gslip/";
        $uploadedFileName2 = $_FILES['file2']['name'];
        $uploadedFile2 = $uploadDir . $uploadedFileName2;
    
        if (move_uploaded_file($_FILES['file2']['tmp_name'], $uploadDir . $uploadedFileName1)) {
            if ($scholar->updateRenewalData($yearLvl, $info[0]['file1'], $uploadedFile2, $scholar_id)) {
                $addRemarks = $admin->addRemarks($scholar_id, 0, 9, 'Renew', $currentDate1);
                header('Location: ../Pages-scholar/dashboard.php?scholar=successRenew');
                exit;
            } else {
                header('Location: ../Pages-scholar/dashboard.php?scholar=error');
                exit;
            }
        } else {
            header('Location: ../Pages-scholar/dashboard.php?scholar=error');
            exit;
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}
// Check if the form is submitted
?>
