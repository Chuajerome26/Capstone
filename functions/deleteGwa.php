<?php 

require '../classes/database.php';

$database = new Database();

$id = $_GET['id'];

$stmt = $database->getConnection()->prepare("DELETE from customize_gwa WHERE id = ?");

if(!$stmt->execute([$id])){
    header('Location: ../newdesign/customize-gwa.php?status=error');
    exit();
}

header('Location: ../newdesign/customize-gwa.php?status=successDel');
exit();