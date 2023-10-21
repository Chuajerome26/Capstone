<?php

if ($_POST['email'] !== '' && $_POST['pass'] !== '' && isset($_POST['submitBtn'])){

require '../classes/admin.php';
require '../classes/database.php';


// include '../includes/autoload-class.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $database = new Database();
    $admin = new Admin($database);


    $adminData = $admin->login($email);
    $adminId = $adminData['id'];
    $adminPass = $adminData['pass'];

    if(!$adminData){
          header("Location:../index.php?error=errorEmail");
        exit();
    }

    if($adminPass !== $pass){
        // if not, create variable error 
          header("Location:../index.php?error=errorPassword");
        exit();
    }

    // Generate a random token and set expiry time (e.g., 10 minutes from now)
    $token = bin2hex(random_bytes(5));
    $expiry = new DateTime('+10 minutes');
    $formattedExpiry = $expiry->format('Y-m-d H:i:s');

    $update = $admin->twoFactor($token, $formattedExpiry, $adminId);

    $sentEmail = $database->sendEmail($email,"Your Code For Authentication", "Your code is ". $token);

     //start session 
    session_start();
    $_SESSION["id"] = $adminId;

    header("Location: ../Pages/twoFactor.php");
    exit();
} else {
    header("Location:../index.php?error=emptyInput");
    exit();
}