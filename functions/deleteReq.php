<?php 

require '../classes/database.php';

$database = new Database();

$id = $_GET['id'];

$stmt = $database->getConnection()->prepare("DELETE from customizable_form_file WHERE id = ?");

if(!$stmt->execute([$id])){
    header('Location: ../newdesign/customize-form.php?status=error');
    exit();
}

header('Location: ../newdesign/customize-form.php?status=successDel');
exit();