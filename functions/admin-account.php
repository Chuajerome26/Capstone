<?php

require '../classes/admin.php';
require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $fname = trim($_POST['firstName']);
    $lname = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $type = trim($_POST['type']);

    if($admin->findAdminByEmail($email)){

        header("Location: ../newdesign/admin-account.php?scholar=alreadyExist");
        exit();
    }

    $verificationToken = md5(uniqid(rand(), true));
    $message = "https://ccmf.website/newdesign/setup-account.php?token=$verificationToken";

    $condition = $admin->addAdminAccount($fname, $lname, $email, $type, $verificationToken);

    if($condition){
        $database->sendEmail($email, 'Set Up Your Account!', $message);
        header('Location: ../newdesign/admin-account.php');
        exit();
    }


