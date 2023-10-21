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
    

     //start session 
    session_start();
    $_SESSION["admin_id"] = $adminEmpId;

    header("Location: ../Pages/dashboard.php");
    exit();
} else {
    header("Location:../index.php?error=emptyInput");
    exit();
}