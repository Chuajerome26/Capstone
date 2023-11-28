<?php

if ($_POST['uname'] !== '' && $_POST['psw'] !== '' && isset($_POST['submitBtn'])){

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

    $scholarInfo = $admin->scholarInfo($user_id);

    $email = $scholarInfo[0]['email'];

    if(!$adminData){
          header("Location:../index.php?error=errorEmail");
        exit();
    }
    $hashed_input_password = password_hash($pass, PASSWORD_DEFAULT);
    if(!password_verify($pass, $adminPass)){
        // if not, create variable error 
          header("Location:../index.php?error=errorPassword");
        exit();
    }

    // Generate a random token and set expiry time (e.g., 10 minutes from now)
    // $token = $admin->generateRandomSixDigitNumber();
    // $expiry = new DateTime('+10 minutes');
    // $formattedExpiry = $expiry->format('Y-m-d H:i:s');

    // $update = $admin->twoFactor($token, $formattedExpiry, $user_id);

    // $sentEmail = $database->sendEmail($email,"Your Code For Authentication", "Your code is ". $token);

     //start session 
    session_start();
    $_SESSION["id"] = $user_id;

    if($userType == 3){
        $_SESSION["user_type"] = 3;
        header("Location: ../Pages-admin/dashboard.php");
    }else if($userType == 2){
        $_SESSION["user_type"] = 2;
        header("Location: ../Pages-admin/dashboard.php");
    }else if($userType == 1){
        $_SESSION["user_type"] = 1;
        header("Location: ../Pages-scholar/scholardash.php");
    }else if($userType == 0){
        $_SESSION["user_type"] = 0;
        header("Location: ../Pages-Applicant/Applicant-Requirements2.php");
    }

    // header("Location: ../Pages-admin/dashboard.php");
    exit();
} else {
    header("Location:../index.php?error=emptyInput");
    exit();
}