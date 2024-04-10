<?php

if ($_POST['uname'] !== '' && $_POST['psw'] !== '' && isset($_POST['submitBtn'])){
session_start();
require '../classes/admin.php';
require '../classes/database.php';


// include '../includes/autoload-class.php';

    $email = $_POST['uname'];
    $pass = $_POST['psw'];

    $database = new Database();
    $admin = new Admin($database);


    $adminData = $admin->login($email);

    $user_id = $adminData['user_id'];
    $adminPass = $adminData['pass'];
    $userType = $adminData['user_type'];
    $admin_id = $adminData['admin_id'];

    $scholarInfo = $admin->scholarInfo($user_id);
    $adminInfo = $admin->adminInfo($admin_id);

    if(!$adminData){
          header("Location:../index.php?scholar=errorEmail");
        exit();
    }
    $hashed_input_password = password_hash($pass, PASSWORD_DEFAULT);
    if(!password_verify($pass, $adminPass)){
        // if not, create variable error 
        header("Location:../index.php?scholar=errorPassword");
        exit();
    }

    // Generate a random token and set expiry time (e.g., 10 minutes from now)
    // $token = $admin->generateRandomSixDigitNumber();
    // $expiry = new DateTime('+10 minutes');
    // $formattedExpiry = $expiry->format('Y-m-d H:i:s');

    // $update = $admin->twoFactor($token, $formattedExpiry, $user_id);

    // $sentEmail = $database->sendEmail($email,"Your Code For Authentication", "Your code is ". $token);

     //start session 
    
    $get_admin = $admin->checkAdmin();

    if($get_admin[0]['count'] == 0 && $userType == 3){
        // header('Location: ../Pages-admin/setup-superAdmin.php?type='.$userType);
        exit();
        
    }elseif($get_admin[0]['count'] == 0 && $userType == 1){
        header('Location: ../index.php?scholar='.$userType);
        exit();
    }



    if($userType == 3){
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 3;
        header("Location: ../Pages-admin/dashboard.php");
    }else if($userType == 2){
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 2;
        header("Location: ../Pages-admin/dashboard.php");
    }else if($userType == 1){
        $_SESSION["id"] = $user_id;
        $_SESSION["user_type"] = 1;
        header("Location: ../Pages-scholar/scholardash.php");
    }else if($userType == 0){
        $_SESSION["id"] = $user_id;
        $_SESSION["user_type"] = 0;
        header("Location: ../Pages-Applicant/Applicant-Requirements2.php");
    }

    // header("Location: ../Pages-admin/dashboard.php");
    exit();
} else {
    header("Location:../index.php?error=emptyInput");
    exit();
}