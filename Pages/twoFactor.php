<!-- verify_2fa.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../functions/verify_2fa.php" method="post">
    <label for="token">2FA Code:</label>
    <input type="text" name="token" required>
    <br>
    <button type="submit">Verify</button>
</form>
</body>
</html>
