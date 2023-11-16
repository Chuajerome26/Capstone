<!-- verify_2fa.php -->
<?php
require '../classes/admin.php';
require '../classes/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $userId = $_SESSION['id'];
    $userType = $_SESSION['user_type'];

    $database = new Database;

    // Check token and expiry time
    $stmt = $database->getConnection()->prepare('SELECT * FROM login WHERE user_id = :id AND token = :token AND token_expiry > NOW()');
    $stmt->execute(['id' => $userId, 'token' => $token]);
    $user = $stmt->fetch();

    if ($user) {
        // 2FA verification successful, clear token and expiry
        $stmt = $database->getConnection()->prepare('UPDATE login SET token = NULL, token_expiry = NULL WHERE user_id = :id');
        $stmt->execute(['id' => $userId]);

        if($userType == 3){
            header("Location: ../Pages-admin/dashboard.php");
        }else if($userType == 2){
            header("Location: ../Pages-admin/dashboard.php");
        }else if($userType == 1){
            header("Location: ../Pages-scholar/scholardash.php");
        }else if($userType == 0){
            header("Location: ../Pages-admin/dashboard.php");
        }

    } else {
        echo 'Invalid 2FA code or code has expired.';
    }
}else{
    header("Location: ../index.php");
}
?>
