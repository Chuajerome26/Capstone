<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $admin->updateFamTemp($id);
    header('Location: ../Pages-admin/admin-application.php?status=editSuccess');
    exit();
}
