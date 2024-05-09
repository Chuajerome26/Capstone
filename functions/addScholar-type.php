<?php 

require '../classes/database.php';

$database = new Database();

$scholar_type = $_POST['scholar_type'];
$minimumGrade = $_POST['minimumGrade'];
$maximumGrade = $_POST['maximumGrade'];
$grant = $_POST['grant'];

$stmt = $database->getConnection()->prepare("INSERT INTO customize_gwa (scholar_type, min_gwa, max_gwa, grants) VALUE (?,?,?,?)");

if(!$stmt->execute([$scholar_type, $minimumGrade, $maximumGrade, $grant])){
    header('Location: ../newdesign/customize-gwa.php?status=error');
    exit();
}

header('Location: ../newdesign/customize-gwa.php?status=successAdd');
exit();
