<?php 

require '../classes/database.php';

$database = new Database();

$name = $_POST['fileName'];
$fileType = $_POST['fileType'];
$isReq = $_POST['isReq'];

$stmt = $database->getConnection()->prepare("INSERT INTO customizable_form_file (name, file_type, is_required) VALUE (?,?,?)");

if(!$stmt->execute([$name, $fileType, $isReq])){
    header('Location: ../newdesign/customize-form.php?status=error');
    exit();
}

header('Location: ../newdesign/customize-form.php?status=successAdd');
exit();