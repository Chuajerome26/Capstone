<?php 
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>CCMF FORM</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-body-teritory">


            
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center vh-100 border-0">
                <div class="card col-lg-8 col-12 shadow">
                    <div class="card-body">

                        <div class="hstack gap-3 mb-3">
                            <div class="p-1">
                                <a class="navbar-brand d-flex align-items-center m-auto" >
                                    <img src="../images/consuelo.jpg" alt="Image" class="img-fluid" width="45px" height="45px">
                                    <h6 class="display-7 text-center ms-2 mt-1 fw-bold"><span class="d-none d-lg-block">Consuelo Chito Madrigal Foundation Inc.(CCMFI)</span><span class="d-lg-none">CCMFI</span></h6>
                                </a>
                            </div>
                            <div class="p-2 ms-auto"> <a href="../index.php"><i class='bx bx-arrow-back me-2'></i>Back</a></div>
                        </div>





                                        
                        <form id="ccmfForm" method="POST" action="../functions/applicants-register.php" enctype="multipart/form-data">
                        <!------- STEP 1 ------->
                        <div class="step" id="step1">
                            <h5 class="text-primary mt-4"> Registrant Record Verification </h5>
                            <div class="border-bottom mb-3 border border-1"></div>
                                <div class="row">
                                <!--- Personal Infomartion --->
                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">First Name:<span class="text-danger">*</span></label>
                                    <input type="text" name="fName" class="form-control form-control-sm" placeholder="First Name" required>
                                    <span class="error-message"></span>

                                </div>


                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">Middle Name:</label>
                                    <input type="text" name="mName" class="form-control form-control-sm" placeholder="Optional">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">Last Name:<span class="text-danger">*</span></label>
                                    <input type="text" name="lName" class="form-control form-control-sm" placeholder="Last Name" required>
                                </div>


                
                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">Suffix:</label>
                                    <select class="form-select form-select-sm" name="suffix" aria-label="Default select example">
                                    <option selected><p class="text-secondary">Ex</p></option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    </select>
                                </div>


                                
                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">Email Address: <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Email Address" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    <div id="emailFeedback" class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label  class="form-label">Active Contact Number: <span class="text-danger">*</span></label>
                                    <input type="text" name="mNumber" id="mNumber" class="form-control form-control-sm" placeholder="Mobile Number" required>
                                </div>


                            



                            

                                </div>
                                    <!--- End Personal Infomartion --->
                        </div> 
                            <div class="d-flex justify-content-center gap-2 mt-2">
                                <button class="btn btn-primary col-lg-5 col-12 btn-sm shadow" type="submit" name="submit" id="submitForm">Submit</button>
                            </div>
                        </form>




                    </div>
                </div>  
            </div>
        </div>




<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.3/dist/boxicons.js"></script>

<script>
            //function for same as present address
        document.getElementById('sameAsPresent').addEventListener('change', function() {
        if (this.checked) {
            // Copy values from present address to permanent address
            document.querySelector('input[name="permanent_barangay"]').value = document.querySelector('select[name="address"]').value;
            document.querySelector('input[name="permanent_district"]').value = document.querySelector('#districtField').value;
            document.querySelector('input[name="permanent_city"]').value = "Quezon City";
            document.querySelector('input[name="permanent_province"]').value = "Metro Manila";
            document.querySelector('input[name="permanent_zip"]').value = document.querySelector('input[name="present_zip"][placeholder="Zip Code"]').value;
        } else {
            // Clear permanent address fields if unchecked
            document.querySelector('input[name="permanent_barangay"]').value = '';
            document.querySelector('input[name="permanent_district"]').value = '';
            document.querySelector('input[name="permanent_city"]').value = '';
            document.querySelector('input[name="permanent_province"]').value = '';
            document.querySelector('input[name="permanent_zip"]').value = '';
        }
    });
    //function for District Auto Fill
    function updateDistrict() {
    var selectElement = document.getElementById("areaSelect");
    var districtField = document.getElementById("districtField");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var district = selectedOption.getAttribute('data-district');

    if (district) {
        districtField.value = "District " + district;
    } else {
        districtField.value = ""; // Clear the field or handle as needed
    }
}
    //function for other option
    function checkOtherOption(selectId, otherOptionId, otherInputId) {
        var selectElement = document.getElementById(selectId);
        var otherOptionDiv = document.getElementById(otherOptionId);
        var otherInput = document.getElementById(otherInputId);

        if (selectElement.value === "Others") {
            otherOptionDiv.style.display = "block";
            otherInput.required = true; // Make the textbox required
        } else {
            otherOptionDiv.style.display = "none";
            otherInput.required = false; // Make the textbox not required
        }
    }

        //Function for email validation
        document.addEventListener("DOMContentLoaded", function() {
        let emailInput = document.getElementById("email");

        function validateEmailInput(input) {
            let inputValue = input.value.trim();
            let isValid = true;

            if (!/\S+@\S+\.\S+/.test(inputValue)) {
                isValid = false;
            }

            if (!isValid) {
                input.classList.remove("is-valid");
                input.classList.add("is-invalid");
                document.getElementById("emailFeedback").style.display = "block";
            } else {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
                document.getElementById("emailFeedback").style.display = "none";
            }
        }

        // Add event listener to email input for validation
        emailInput.addEventListener("input", function() {
            validateEmailInput(emailInput);
        });
    });

    function showOtherScholarshipField(inputFieldId) {
        // Show the selected input field
        document.getElementById(inputFieldId).style.display = 'block';
    }

    function hideOtherScholarshipField(inputFieldId) {
        // Hide the selected input field
        document.getElementById(inputFieldId).style.display = 'none';
    }
    </script>


<script>
    function validateForm() {
    let isValid = true;

    // Check required fields for null inputs
    const requiredInputs = document.querySelectorAll('input[required]');
    requiredInputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add("is-invalid");
            const errorMessage = input.parentNode.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.textContent = 'This field is required';
                errorMessage.style.color = 'red';
            }
        }
    });

    // Check email field for invalid format
    const emailInput = document.getElementById('email');
    if (emailInput && emailInput.value.trim() && !isValidEmail(emailInput.value.trim())) {
        isValid = false;
        emailInput.classList.add("is-invalid");
        const errorMessage = emailInput.parentNode.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.textContent = 'Please enter a valid email address';
            errorMessage.style.color = 'red';
        }
    }

    return isValid;
}

// Submit form if validation passes
document.getElementById('ccmfForm').addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});

// Function to validate email format
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
</script>
</body>
</html>

    