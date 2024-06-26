<?php

if ($_POST['email'] !== '' && $_POST['pass'] !== '' && isset($_POST['submit'])){
session_start();
require '../classes/admin.php';
require '../classes/database.php';


// include '../includes/autoload-class.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $database = new Database();
    $admin = new Admin($database);


    $adminData = $admin->login($email);

    $user_id = $adminData['id'];
    $adminPass = $adminData['pass'];
    $userType = $adminData['user_type'];
    $admin_id = $adminData['admin_id'];

    //if($adminData['is_verified'] == 0){
    //    header("Location:../index.php?info=verifyEmail");
    //    exit();
    //}

    // $scholarInfo = $admin->scholarInfo($user_id);
    // $adminInfo = $admin->adminInfo($admin_id);

    if(!$adminData){
        header("Location:../index.php?info=errorCredentials");
        exit();
    }
    $hashed_input_password = password_hash($pass, PASSWORD_DEFAULT); 
    if(!password_verify($pass, $adminPass)){
        // if not, create variable error 
        header("Location:../index.php?info=errorCredentials");
        exit();
    }

    // Generate a random token and set expiry time (e.g., 10 minutes from now)
    //$token = $admin->generateRandomSixDigitNumber();
    //$expiry = new DateTime('+1 minutes');
    //$formattedExpiry = $expiry->format('Y-m-d H:i:s');

    //$update = $admin->twoFactor($token, $formattedExpiry, $user_id);

   // $sentEmail = $database->sendEmail($email,"Your Code For Authentication", "Your code is ". $token);

     //start session 
    
    $get_admin = $admin->checkAdmin();

    if($get_admin[0]['count'] == 0 && $userType == 3){
        header('Location: ../newdesign/setup-superAdmin.php?type='.$userType);
        exit();
        
    }elseif($get_admin[0]['count'] == 0 && $userType == 1){
        header('Location: ../index.php?info=error');
        exit();
    }



    if($userType == 6){//Super Admin
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 6;
        header("Location: ../newdesign/dashboard.php");
    }else if($userType == 4){//Renewal/Stipend
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 4;
        header("Location: ../newdesign/dashboard.php");
    }else if($userType == 3){//Interviewer
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 3;
        header("Location: ../newdesign/dashboard.php");
    }else if($userType == 2){//Evaluator
        $_SESSION["id"] = $admin_id;
        $_SESSION["user_type"] = 2;
        header("Location: ../newdesign/dashboard.php");
    }else if($userType == 1){//Scholar
        $_SESSION["id"] = $user_id;
        $_SESSION["user_type"] = 1;
        header("Location: ../Pages-scholar/dashboard.php");
    }else if($userType == 0){//Applicant
        $_SESSION["id"] = $user_id;
        $_SESSION["user_type"] = 0;
        header("Location: ../Pages-Applicant/index123.php");
    }


    exit();
} else {
    header("Location:../index.php?error=emptyInput");
    exit();
}