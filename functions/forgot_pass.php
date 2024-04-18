<?php
require '../classes/admin.php';
require '../classes/database.php';
include '../email-design/forgot_pass-design';

$database = new Database;
$admin = new Admin($database);

if(isset($_POST["submit"])){
    // Get the email from the form
    $email = $_POST["forgotEmail"];

    $stmt = $database->getConnection()->prepare("SELECT * FROM admin_info WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $admin_query = $stmt->fetch();

    if (!$admin_query) {
        $stmt = $database->getConnection()->prepare("SELECT * FROM scholar_info WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $scholar_query = $stmt->fetch();
    } else {
        $scholar_query = false;
    }

    if ($admin_query || $scholar_query) {
        // Generate a unique token
        $token = bin2hex(random_bytes(16));
        $tokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        // Determine user_id
        $user_id = $admin_query['id'] ?? $scholar_query['id'];

        $stmt = $database->getConnection()->prepare("UPDATE login SET token = :token, token_expiry = :tokenExpiry WHERE user_id = :id");
        $stmt->execute([':token' => $token, ':tokenExpiry' => $tokenExpiry, ':id' => $user_id]);

        // Construct password reset link with token
        $resetLink = "https://ccmf.website/functions/reset_pass.php?token=$token";

        // Email message
        $forgotMessage = forgotEmail($resetLink);

        $sentEmail = $database->sendEmail($email, "Password Reset Request", $forgotMessage);

        echo "<script>alert('An email has been sent to $email with instructions to reset your password.'); 
        window.location.href='../index.php?user=passwordResetSuccess';</script>";
        exit();
    } else {
        echo "<script>alert('Email address not found. Please enter a valid email address.'); 
        window.location.href='../index.php?user=errorEmail';</script>";
        exit();
    }
}
?>
