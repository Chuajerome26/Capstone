<?php
// start session
session_start();
$timezone = 'Asia/Manila';
date_default_timezone_set($timezone);
$lognow = date('H:i:s');

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    //get admin data 
    
    $id = $_SESSION['id'];
}
else {
    header("Location: ../index.php");
}

include("header.php");
?>
<body>
</body>