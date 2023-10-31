<!-- verify_2fa.php -->
<?php
require '../classes/admin.php';
require '../classes/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $userId = $_SESSION['id'];

    $database = new Database;

    // Check token and expiry time
    $stmt = $database->getConnection()->prepare('SELECT * FROM login WHERE id = :id AND token = :token AND token_expiry > NOW()');
    $stmt->execute(['id' => $userId, 'token' => $token]);
    $user = $stmt->fetch();

    if ($user) {
        // 2FA verification successful, clear token and expiry
        $stmt = $database->getConnection()->prepare('UPDATE login SET token = NULL, token_expiry = NULL WHERE id = :id');
        $stmt->execute(['id' => $userId]);

        header("Location: ../Pages-admin/dashboard.php");
    } else {
        echo 'Invalid 2FA code or code has expired.';
    }
}else{
    header("Location: ../index.php");
}
?>
