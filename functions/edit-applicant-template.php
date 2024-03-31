<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_POST['submit'])) {
    $fileData1 = array(
        'fileName' => $_FILES['fileUpdate']['name'],
        'fileTmpName' => $_FILES['fileUpdate']['tmp_name'],
        'fileSize' => $_FILES['fileUpdate']['size'],
        'fileError' => $_FILES['fileUpdate']['error'],
        'fileType' => $_FILES['fileUpdate']['type'],
    );

    $allowedFile1 = array('pdf');

    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));

    $filesAndPicture = array(
        'allowed1' => $allowedFile1,
        'fileActualExt1' => $fileActualExt1,
        'fileName1' => $fileData1['fileName'],
        'fileTmpName1' => $fileData1['fileTmpName'],
        'fileError' => $fileData1['fileError']
    );

    $admin->updateFamTemp($filesAndPicture);
    
    header('Location: ../Pages-admin/admin-application.php?status=editSuccess');
    exit();
}
