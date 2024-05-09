<?php
require '../classes/database.php';

$database = new Database();

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $minGrade = $_POST['minGrade'];
    $maxGrade = $_POST['maxGrade'];
    $grants = $_POST['grants'];

    // Update customize_gwa table
    $query = "UPDATE customize_gwa SET min_gwa = :minGrade, max_gwa = :maxGrade, grants = :grants WHERE id = :id";
    $stmt = $database->getConnection()->prepare($query);
    $stmt->bindParam(':minGrade', $minGrade);
    $stmt->bindParam(':maxGrade', $maxGrade);
    $stmt->bindParam(':grants', $grants);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result){
        // Redirect with success message
        header('Location: ../newdesign/customize-gwa.php?updateSuccess');
        exit();
    } else {
        // Redirect with error message
        header('Location: ../newdesign/customize-gwa.php?updateError');
        exit();
    }
}
?>
