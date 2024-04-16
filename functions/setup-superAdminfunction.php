<?php 

require '../classes/admin.php';
require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $fname = trim($_POST['firstName']);
    $lname = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $confirmPass = trim($_POST['confirmPassword']);
    $type = trim($_POST['type']);


    $fileData1 = array(
        'fileName' => $_FILES['idPhoto']['name'],
        'fileTmpName' => $_FILES['idPhoto']['tmp_name'],
        'fileSize' => $_FILES['idPhoto']['size'],
        'fileError' => $_FILES['idPhoto']['error'],
        'fileType' => $_FILES['idPhoto']['type'],
    );

    $allowedFile2 = array('jpg', 'jpeg', 'png');
    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));


    $fileNameNew1 = uniqid('', true) . "." . $fileActualExt1;
    $fileDestination1 = '../Scholar_files/' . $fileNameNew1;

    if($pass !==  $confirmPass){
        header('Location: ../newdesign/setup-superAdmin.php?type='.$type.'&status=passDoNotMatch');
        exit();
    }

    if(move_uploaded_file($fileData1['fileTmpName'],$fileDestination1)){
        $admin->setUpSuperAdmin($fname, $lname, $email, $fileNameNew1, $pass, $type);
        header('Location: ../index.php?scholar=setUp');
        exit();
    }


