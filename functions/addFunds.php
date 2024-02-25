<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $amount = $_POST['amount'];
    $donor = $_POST['donor'];
    $date = $_POST['date'];
    $mot = $_POST['mot'];
    $tn = $_POST['tn'];

    $admin = $admin->addFunds($amount, $donor, $date, $mot, $tn);

    if($admin){
        header('Location: ../Pages-admin/admin-funds.php?status=successSave');
        exit();
    }

}