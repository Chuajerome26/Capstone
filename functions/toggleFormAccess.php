<?php
require '../classes/database.php';

$database = new Database();

if (isset($_POST["submit"])) {
    // Assuming the state is passed through POST
    $newState = $_POST["state"];

    // Prepare and execute the SQL query
    $stmt = $database->getConnection()->prepare("UPDATE application_form_state SET state = ? WHERE id = 1");
    if ($stmt->execute([$newState])) {
        header('Location: ../newdesign/admin-application.php?status=successUpdated');
        exit();
    } else {
        // Redirect to a page indicating error
        header('Location: ../newdesign/admin-application.php?status=errorNoUpdate');
        exit();
    }
}
?>
