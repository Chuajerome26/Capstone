<!-- verify_2fa.html -->
<?php 
// start session
session_start();

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

} else {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #fff;
            font-family: Arial, sans-serif;
        }

        form {
            text-align: center;
            background: #f2f2f2;
            padding: 40px;
	    padding-right: 58px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            font-weight: bold;
            font-size: 30px;
        }

        .description {
            font-size: 10px;
            margin-top: -5;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background: #0056b3;
        }

    </style>

</head>
<body>
<form action="../functions/verify_2fa.php" method="post">
    <label for="token">2FA Code:</label>
    <BR>
    <label class="description">Enter the code from your two-factor authentication</label>
    <input type="text" name="token" required>
    <br>
    <button type="submit">Verify</button>
</form>
</body>
</html>
