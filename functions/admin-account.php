<?php

require '../classes/admin.php';
require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $fname = trim($_POST['firstName']);
    $lname = trim($_POST['lastName']);
    $email = trim($_POST['email']);

    if($admin->findAdminByEmail($email)){

        header("Location: ../Pages-admin/admin-account.php?scholar=alreadyExist");
        exit();
    }

    $verificationToken = md5(uniqid(rand(), true));
    $message = "https://ccmf.website/Pages-admin/setup-account.php?token=$verificationToken";

    $condition = $admin->addAdminAccount($fname, $lname, $email, $verificationToken);

    if($condition){
        $database->sendEmail($email, 'Set Your Account!', $message);
        header('Location: ../Pages-admin/admin-account.php');
        exit();
    }


