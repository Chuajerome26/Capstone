<?php
session_start();
if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';

    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);

} else {
    header("Location: ../index.php");
}
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $yearLvl = ($_POST['yearLvl'] === 'other') ? $_POST['otherYearLevel'] : $_POST['yearLvl'];

    // Handle file upload
    $uploadDir = "../Uploads_gslip/";
    $uploadedFileName1 = $_FILES['file1']['name'];
    $uploadedFileName2 = $_FILES['file2']['name'];
    $uploadedFile1 = $uploadDir . $uploadedFileName1;
    $uploadedFile2 = $uploadDir . $uploadedFileName2;

    if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir . $uploadedFileName1) &&
        move_uploaded_file($_FILES['file2']['tmp_name'], $uploadDir . $uploadedFileName2)) {
        if ($scholar->updateRenewalData($yearLvl, $uploadedFileName1, $uploadedFileName2)) {
            echo '<script>alert("Data uploaded successfully!"); window.location.href = "../Pages-scholar/dashboard.php";</script>';
            exit;
        } else {
            echo "Error updating data.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
