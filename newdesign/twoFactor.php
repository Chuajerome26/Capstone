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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/forcert1.png">

    <title>Verification</title>

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!--Google Fonts-->

    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Bootstrap 5-->

    <!--Fontawesome-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!--Fontawesome-->
<style>
    body {
            color: #1e3050;
            font-family: 'Poppins', sans-serif;
            background-image: url(../images/Background.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: #f2f2f2;
            font-size: 1rem;
        }
.single-digit-input {
    width: 30px; /* Adjust as needed */
    text-align: center;
    border: 1px solid #ced4da; /* Border color */
    border-radius: 0.25rem; /* Border radius */
    margin-right: 5px; /* Spacing between input boxes */
}

.single-digit-input:last-child {
    margin-right: 0; /* Remove margin from last input box */
}


</style>

<body>
<nav class="navbar navbar-expand-lg mt-5">
    <div class="container-fluid">
        <div class="text-center mx-auto"> <!-- Center the logo horizontally and vertically -->
            <img src="../images/Management1.png" style="width: 300px; height: 60px;" alt="Logo">
        </div>
    </div>
</nav>
        

<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow border-0 mb-2 p-3" style="width: 40rem;">
        <h4 class="mb-4 fw-bold text-center">Verification</h4>
        
        <form class="verification-group mb-4" method="POST" action="../functions/verify_2fa.php">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="text-center mb-1 d-flex justify-content-center">
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                        <span> - </span>
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                        <input type="text" name="verificationCode[]" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="single-digit-input" required>
                    </div>

                    <p class="text-center mb-3">Enter the verification code we sent to your email</p>
                    <div class="text-center mt-3">
                    <button class="btn btn-primary fw-bold order-md-2 order-1" type="submit" id="continueBtn" disabled> Verify </button>
                    <button class="btn btn-light me-md-2 fw-bold order-md-1 order-2" type="button" onclick="window.location.href='../index.php'"> Cancel </button>
                    </div>
                </div>
            </div>
        </form>

        <?php if(!empty($message)): ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let inputs = document.querySelectorAll(".single-digit-input");
        let continueBtn = document.getElementById("continueBtn");

        inputs.forEach(input => {
            input.addEventListener("input", function() {
                let allFilled = true;
                inputs.forEach(inp => {
                    if (!inp.value.trim()) {
                        allFilled = false;
                    }
                });
                continueBtn.disabled = !allFilled;
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let inputs = document.querySelectorAll(".single-digit-input");

        inputs.forEach((input, index) => {
            input.oninput = () => {
                let next = input.value ? inputs[index + 1] : inputs[index - 1];
                if(next) next.focus();
            };
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll('.single-digit-input');
        inputs.forEach((input, index) => {
            input.addEventListener('keyup', (e) => {
                if (e.key === "Backspace" && !input.value) {
                    if (index > 0) inputs[index - 1].focus();
                } else if (input.value) {
                    if (index < inputs.length - 1) inputs[index + 1].focus();
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>
</body>
</html>