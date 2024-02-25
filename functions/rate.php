<?php 
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if(isset($_POST['submit'])){
    $scholar_id = $_POST['id'];
    $rate = $_POST['rate'];

    $save = $admin->giveRate($scholar_id,$rate);

    header('Location: ../Pages-admin/schedule-task.php?status=success');
    exit();
}