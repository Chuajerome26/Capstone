<?php

if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
    
    $amount = $_POST['amount'];
    $donor = $_POST['donor'];
    $date = $_POST['date'];

    $admin = $admin->addFunds($amount, $donor, $date);

}