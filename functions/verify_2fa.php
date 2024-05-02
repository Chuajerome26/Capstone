<!-- verify_2fa.php -->
<?php
require '../classes/admin.php';
require '../classes/database.php';

session_start();

$database = new Database();
$admin = new Admin($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = implode('', $_POST["verificationCode"]);
    $userId = $_SESSION['id'];
    $userType = $_SESSION['user_type'];

    if($userType == 3 || $userType == 2){
        $stmt = $database->getConnection()->prepare('SELECT * FROM login WHERE admin_id = :id AND token = :token AND token_expiry > NOW()');
        $stmt->execute(['id' => $userId, 'token' => $token]);
    }else{
        $stmt = $database->getConnection()->prepare('SELECT * FROM login WHERE id = :id AND token = :token AND token_expiry > NOW()');
        $stmt->execute(['id' => $userId, 'token' => $token]);
    }

    $user = $stmt->fetch();
    
    if ($user) {
        // 2FA verification successful, clear token and expiry
        $stmt = $database->getConnection()->prepare('UPDATE login SET token = NULL, token_expiry = NULL WHERE id = :id');
        $stmt->execute(['id' => $userId]);

        if($userType == 3){
            header("Location: ../newdesign/dashboard.php");
        }else if($userType == 2){
            header("Location: ../newdesign/dashboard.php");
        }else if($userType == 1){
            header("Location: ../Pages-scholar/dashboard.php");
        }else if($userType == 0){
            header("Location: ../Pages-Applicant/index123.php");
        }

    } else {
        echo 'Invalid 2FA code or code has expired.';
    }
}else{
    header("Location: ../index.php");
}
?>
