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
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

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

    $stmt = $database->getConnection()->prepare('INSERT INTO login (fname, mname, lname, suffix, user, pass, user_type) VALUES (:fname, :mname, :lname, :suffix, :email, :pass, 0)');
    $stmt->execute(['fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'suffix' => $suffix, 'email' => $email, 'pass' => $hashedpwd]);

    header('Location: ../index.php?info=success');
    exit();
}