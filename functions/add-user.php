<?php 

require '../classes/database.php';
require '../classes/scholar.php';

$database = new Database();
$scholar = new Scholar($database);

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'] ?? '';
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $confirmPass = $_POST['confirmPassword'];
    $token = md5(rand());

    if($password !== $confirmPass){
        header("Location: ../index.php?info=passDonotMatch");
        exit();
    }
    
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    if($scholar->findByEmail($email)){
        //return to employee register page
        header("Location: ../index.php?info=emailExist");
        exit();
    }

    $stmt = $database->getConnection()->prepare('INSERT INTO login (fname, mname, lname, suffix, user, pass, token, user_type) VALUES (:fname, :mname, :lname, :suffix, :email, :pass, :token, 0)');
    $stmt->execute(['fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'suffix' => $suffix, 'email' => $email, 'pass' => $hashedpwd, 'token' => $token]);

        $subject = "Email Verification";
        $message = "Click the following link to verify your email:\n\n";
        $message .= '<a href="http://ccmf.website/functions/verify_email.php?token='.$token.'">Verify Account</a>';
    
        if ($database->sendEmail($email , $subject, $message)) {
            header('Location: ../Pages/signup.php');
        } else {
            echo "Error sending email. Please try again later.";
        }

    header('Location: ../index.php?info=checkEmail');
    exit();
}