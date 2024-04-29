<?php
require '../classes/database.php';
require '../classes/admin.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_GET['token'])) {
    $token = $_GET["token"];
    $stmt = $database->getConnection()->prepare("UPDATE login SET is_verified = 1, token = NULL WHERE token = :token");

    if (!$stmt->execute(['token' => $token])) {
        header('Location: ../index.php?info=invalidToken');
        exit();
    } else {
        header('Location: ../index.php?info=successfullyVerified');
        exit();
    }
} else {
    header('Location: ../index.php?info=invalidToken');
    exit();
}
?>
