<?php
require '../classes/database.php';

$database = new Database();

if(isset($_POST['submit'])){
    $admin_id = $_POST['admin_id'];
    $admin_type = $_POST['admin_type'];

    // Update admins table
    $query_admins = "UPDATE admin_info SET type = :admin_type WHERE id = :admin_id";
    $stmt_admins = $database->getConnection()->prepare($query_admins);
    $stmt_admins->bindParam(':admin_type', $admin_type);
    $stmt_admins->bindParam(':admin_id', $admin_id);
    $result_admins = $stmt_admins->execute();

    // Update login table
    $query_login = "UPDATE login SET user_type = :admin_type WHERE admin_id = :admin_id";
    $stmt_login = $database->getConnection()->prepare($query_login);
    $stmt_login->bindParam(':admin_type', $admin_type);
    $stmt_login->bindParam(':admin_id', $admin_id);
    $result_login = $stmt_login->execute();

    // Check if both updates were successful
    if($result_admins && $result_login){
        // Redirect with success message
        header('Location: ../newdesign/admin-account.php?updateSuccess');
        exit();
    } else {
        // Redirect with error message
        header('Location: ../newdesign/admin-account.php?updateError');
        exit();
    }
}
?>
