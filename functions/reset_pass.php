<?php
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database;
$admin = new Admin($database);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if all required fields are set
    if (isset($_POST["newpass"]) && isset($_POST["confirmpass"]) && isset($_GET["token"])) {
        $password = $_POST["newpass"];
        $confirmPassword = $_POST["confirmpass"];
        $token = $_GET["token"];

        // Validate password and confirm password
        if ($password !== $confirmPassword) {
            header('Location: ../functions/reset_pass.php?token='.$token.'&success=notmatch');
            exit();
        }

        // Check if the token is valid and not expired in the login table
        $stmt = $database->getConnection()->prepare("SELECT * FROM login WHERE token = :token AND token_expiry > NOW()");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) === 0) {
            header('Location: ../functions/reset_pass.php?token='.$token.'&success=invalid');
            exit();
        }

        // Update password in the login table
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $database->getConnection()->prepare("UPDATE login SET pass = :password, token = NULL, token_expiry = NULL WHERE token = :token");
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            // Password updated successfully
            header('Location: ../index.php?success=reset');
            exit();
        } else {
            // Error updating password
            header('Location: ../functions/reset_pass.php?token='.$token.'&success=error');
            exit();
        }
    } else {
        // Missing required fields
        header('Location: ../functions/reset_pass.php?token='.$token.'&success=missing');
        exit();
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../images/logo.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets1/css/1.css" />
    <style>
        body {
            background-color: hsla(23,100%,50%,0.83);
            background-image:
            radial-gradient(at 10% 0%, hsla(91,90%,67%,1) 0px, transparent 50%),
            radial-gradient(at 88% 88%, hsla(45,97%,74%,1) 0px, transparent 50%),
            radial-gradient(at 50% 25%, hsla(108,65%,69%,1) 0px, transparent 50%),
            radial-gradient(at 40% 20%, hsla(120,100%,74%,1) 0px, transparent 50%);
            /* Add any other styles you want for the body */
        }
    </style>
</head>
<body>

<div class="loader"></div>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card col-sm-10 shadow-lg">
        <div class="card-body">
            <span><a href="../index.php" class="text-black"><i class="fa-solid fa-arrow-left-long ms-2"></i></a></span>
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <span><p class="text-center fs-4 fw-bold">SET UP YOUR ACCOUNT</p></span>
                    <form id="resetPasswordForm" method="post" action="../functions/reset_pass.php<?php echo isset($_GET['token']) ? '?token=' . $_GET['token'] : ''; ?>">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="newpass" id="password" placeholder="Password" required>
                                <div id="emailHelp" class="form-text">Your password must be 8-20 characters long, contain letters and numbers.</div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="Confirm Password" required>
                                <div id="emailHelp" class="form-text">Your password and confirmation password must match.</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary col-md-9 mx-auto shadow">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
