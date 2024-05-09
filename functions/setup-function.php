<?php 

require '../classes/admin.php';
require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $pass = trim($_POST['password']);
    $confirmPass = trim($_POST['confirmPassword']);
    $token = trim($_POST['token']);
    $fileData1 = array(
        'fileName' => $_FILES['idPhoto']['name'],
        'fileTmpName' => $_FILES['idPhoto']['tmp_name'],
        'fileSize' => $_FILES['idPhoto']['size'],
        'fileError' => $_FILES['idPhoto']['error'],
        'fileType' => $_FILES['idPhoto']['type'],
    );

    $admin_data = $admin->findAdminByToken($token);

    $adminId = $admin_data[0]['id'];
    $adminEmail = $admin_data[0]['email'];
    $adminType = $admin_data[0]['type'];

    $allowedFile2 = array('jpg', 'jpeg', 'png');
    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));

    // $filesAndPicture = array(
    //     'allowed2' => $allowedFile2,
    //     'fileActualExt1' => $fileActualExt1,
    //     'fileName1' => $fileData1['fileName'],
    //     'fileTmpName1' => $fileData1['fileTmpName'],
    // );

    $fileNameNew1 = uniqid('', true) . "." . $fileActualExt1;
    //file destination
    $fileDestination1 = '../Scholar_files/' . $fileNameNew1;

    if($pass !==  $confirmPass){
        header('Location: ../newdesign/setup-account.php?token='.$token.'&status=passDoNotMatch');
        exit();
    }

    if(move_uploaded_file($fileData1['fileTmpName'],$fileDestination1)){
        $admin->setUpAdminPass($adminId, $adminEmail, $pass, $fileNameNew1, $token, $adminType);
        header('Location: ../index.php?scholar=setUp');
        exit();
    }


