
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/Management1.png">
    <title>Sign Up</title>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- Google Fonts -->

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 -->

    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Fontawesome -->

    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    body {
        color: #1e3050;
        font-family: 'Poppins', sans-serif;
        background-image: url(../images/Background.png);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color:#f2f2f2;
        font-size: 1rem;
    }

    @media (max-width: 767px) {
        body {
            background-image: url(../images/Background-Mobile.png);
            font-size: 0.8rem;
        }
    }

    @media (max-width: 767px) {
        .slim-card {
            width: 90%;
            margin: 0 auto;
        }
        .responsive{
            width: 25vh;
            margin-top:0.8rem;
        }
    }

    @media (min-width: 768px) {
        .slim-card {
            width: 80%;
            margin: 0 auto;
            font-size: 1rem;
        }
        .responsive{
            width: 35vh;
            margin-top:0.8rem;
        }
    }

    .center-align{
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 50vh;
    }

    .card {
        overflow: hidden;
        color:#1e3050;
    }

    .card {
        overflow: hidden;
        color: #1e3050;
        transition: all 0.3s ease; 
    }
    .no-wrap{
        white-space:nowrap;
    }
    .input-group {
    position: relative;
}

.no-spinner::-webkit-inner-spin-button,
.no-spinner::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.no-spinner {
    -moz-appearance: textfield;
}


.error-message {
        color: red;
    }
</style>


<body style="background-color: #A3FFD6;"> 
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                    <span style="font-size:15px;">
                    <strong>Scholarship Management System</strong>
                </span>
            </a>
        </div>
    </nav>
    
    <div class="container center-align mt-3">
        <div class="card slim-card shadow border-0 mb-3 p-5">
        <a href="index.php" class="text-decoration-none text-black mb-3"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
            <h4 class="mb-3 fw-bold">Sign Up</h4>
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="functions/add-user.php"> <!-- Add the action attribute pointing to your PHP script -->  
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="fname" class="form-label fw-bold">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required placeholder="Firstname">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="mname" class="form-label fw-bold">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" autocomplete="off" required placeholder="Middlename">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="lname" class="form-label fw-bold">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" autocomplete="off" required placeholder="Lastname">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label  class="form-label">Suffix:</label>
                        <select class="form-select form-select-sm" name="suffix" aria-label="Default select example">
                        <option value=""></option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="II">I</option>
                        <option value="III">II</option>
                        <option value="IV">III</option>
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" required aria-describedby="passwordHelpBlock" placeholder="name@email.com">
                        <div id="passwordHelpBlock" class="form-text">
                        Use your QCU email for this field.
                        </div>
                    </div>

                    <!-- Password field -->
                <div class="col-sm-6 mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control  border-end-0" id="password" name="password" required placeholder="Password">
                        <!-- Change the id of the eye icon to togglePassword -->
                        <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>
                        <div id="passwordHelpBlock" class="form-text">
                        Your password must be between 8 to 20 characters long and must include both letters and numbers
                            </div>
                            <p id="message" style="display: none;">Password strength: <span id="strength"></span></p>
                    
                    </div>
                    <!-- Confirm Password field -->
                    <div class="col-sm-6 mb-3">
                    <label for="confirmPassword" class="form-label fw-bold">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control border-end-0" id="confirmPassword" name="confirmPassword" required placeholder="Confirm Password">
                        <!-- Change the id of the eye icon to toggleConfirmPassword -->
                        <span class="input-group-text bg-white border-start-0" id="toggleConfirmPassword"><i class="fas fa-eye-slash"></i></span>
                    </div>

                        <div id="passwordHelpBlock" class="form-text">
                            Your password and confirmation password must match.
                    </div>
                    <p id="confirmMessage" style="display: none;"></p>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- Submit button -->
                    <button class="btn btn-primary fw-bold order-md-2 order-1" type="submit" id="continueBtn" name="submit" disabled>
                        Continue
                    </button>
                    <!-- Cancel button -->
                    <button class="btn btn-outline-danger me-md-2 fw-bold order-md-1 order-2" type="button" onclick="location.href='index.php';">
                        Cancel
                    </button>   
                </div>  
            </form>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let inputs = document.querySelectorAll("input, select");
    let continueBtn = document.getElementById("continueBtn");
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    function validatePassword(inputValue) {
        return /^(?=.*[A-Za-z])(?=.*\d).{8,20}$/.test(inputValue);
    }

    function validateInput(input) {
    let inputValue = input.value.trim();
    let isValid = true;

    // Replace numbers with an empty string
    if ((input.getAttribute("id") === "fname" || input.getAttribute("id") === "lname" || input.getAttribute("id") === "mname")) {
        if (/\d/.test(input.value)) {
            Swal.fire({
                icon: "error",
                title: "Tanga mo!",
                text: "Mali numbers tsaka bawal yobmot!"
            });
        }
        input.value = input.value.replace(/\d/g, ""); // Replace numbers with an empty string
    }

    if (input.hasAttribute("required") && inputValue === "") {
        isValid = false;
    }

    if ((input.getAttribute("id") === "fname" || input.getAttribute("id") === "lname" || input.getAttribute("id") === "mname") && !/^[a-zA-Z\s\-_.,!?@#$%^&*()]*$/.test(inputValue)) {
        isValid = false;
    }

    if (input.getAttribute("id") === "email" && !/\S+@\S+\.\S+/.test(inputValue)) {
        isValid = false;
    }

    if (input.getAttribute("id") === "password" && !validatePassword(inputValue)) {
        isValid = false;
    }

    if (input.getAttribute("id") === "confirmPassword") {
        const passwordInput = document.getElementById("password");
        if (inputValue !== passwordInput.value.trim()) {
            isValid = false;
        }
    }

    if (!isValid) {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    } else {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
    }

    updateContinueButtonState();
    return isValid;
}


    function updateContinueButtonState() {
        let allValid = true;

        inputs.forEach(input => {
            if ((input.classList.contains("is-invalid") || (input.hasAttribute("required") && input.value.trim() === "")) && input.getAttribute("id") !== "confirmPassword") {
                allValid = false;
            }
        });

        continueBtn.disabled = !allValid;
    }

    inputs.forEach(input => {
        input.addEventListener("input", function () {
            validateInput(input);
        });

        // Add input event listener to remove error message when input is cleared
        input.addEventListener("input", function () {
            if (input.classList.contains("is-invalid") && input.value.trim() === "") {
                input.classList.remove("is-invalid");
            }
        });
    });

    togglePassword.addEventListener('click', function() {
        togglePasswordVisibility(document.getElementById('password'), togglePassword);
    });

    toggleConfirmPassword.addEventListener('click', function() {
        togglePasswordVisibility(document.getElementById('confirmPassword'), toggleConfirmPassword);
    });

    function togglePasswordVisibility(inputField, toggleButton) {
        const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
        inputField.setAttribute('type', type);
        toggleButton.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
    }

    // Prevent form submission if validation fails
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Perform validation before submission
        let allInputsValid = true;
        inputs.forEach(input => {
            if (!validateInput(input)) {
                allInputsValid = false;
            }
        });

        // If any input is invalid, alert and prevent form submission
        if (!allInputsValid) {
            alert("Please correct the errors in the form before submitting.");
            return;
        }

        // If all inputs are valid, submit the form
        this.submit();
    });
});
</script>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>