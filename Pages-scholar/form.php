<html>
    <head>
        <title>Consuelo Chito Madrigal Foundation</title>
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        <link rel="stylesheet" href="../assets/style-application.css">

    </head>
<body>
    <div class="banner-area">
        <div class="wrapper">
            <div class="logo"><img src="../images/logo.jpg"></img>
    <br>
        <h3> Consuelo Chito Madrigal <br> Foundation (CCMF)</h3>
            </div>
    <br></br>
    
    <div class="form">
        <h1>APPLICATION FORM</h1>
            <h2><br>Personal's Information</h2>
    <br></br>
    <form action="../functions/applicants-register.php" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
        <div class="form first">
                <div class="fields">  
                    <div class="input-field">
                       <label>Firstname:</label>
                          <input type="text" placeholder="   Firstname" id="f_name" name="f_name" value="<?php echo isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : ''; ?>" required>
                    </div> 
                    <div class="input-field">
                        <label>Lastname:</label>
                            <input type="text" placeholder="   Lastname" id="l_name" name="l_name" value="<?php echo isset($_POST['l_name']) ? htmlspecialchars($_POST['l_name']) : ''; ?>" required>
                    </div> 
        <br></br>
        <br></br>
                    <div class="input-field">
                        <label>Gender:</label><br>
                            <input type="text" placeholder="   Gender" id="gender" name="gender" value="<?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : ''; ?>" required>
                    </div>   
                    <div class="input-field">
                       <label>Civil Status:</label>
                            <input type="text" placeholder="   Civil Status" id="cStatus" name="cStatus" value="<?php echo isset($_POST['cStatus']) ? htmlspecialchars($_POST['cStatus']) : ''; ?>" required>
                    </div> 
                    <div class="input-field">
                        <label>Citizenship:</label>
                            <input type="text" placeholder="   Citizenship" id="citizenship" name="citizenship" value="<?php echo isset($_POST['citizenship']) ? htmlspecialchars($_POST['citizenship']) : ''; ?>" required>
                    </div> 
                    <div class="input-field">
                        <label>Date of Birth:</label>
                            <input type="date" id="birthdate" id="bday" name="bday" value="<?php echo isset($_POST['bday']) ? htmlspecialchars($_POST['bday']) : ''; ?>" required>
                    </div>         
        <br></br>
        <br></br>
                    <div class="input-field">
                        <label>Birthplace:</label>
                            <input type="text" placeholder="   Birthplace" id="bplace" name="bplace" value="<?php echo isset($_POST['bplace']) ? htmlspecialchars($_POST['bplace']) : ''; ?>" required>
                    </div>   
                    <div class="input-field">
                        <label>Religion:</label><br>
                            <input type="text" placeholder="   Religion" id="religion" name="religion" value="<?php echo isset($_POST['religion']) ? htmlspecialchars($_POST['religion']) : ''; ?>" required>
                    </div> 
                    <div class="input-field">
                        <label>Mobile Number:</label>
                            <input type="text" placeholder="   Mobile Number" id="mNum" name="mNum" value="<?php echo isset($_POST['mNUm']) ? htmlspecialchars($_POST['mNum']) : ''; ?>" onkeydown="return onlyNumberKey(event)" required>
                    </div> 
                    <div class="input-field">
                        <label>Email Address:</label>
                            <input type="text" placeholder="   Email Address" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                            <span id="errorEmail" style="color: red;"></span>
                    </div>
                    <div class="input-field">
                        <label>Address:</label>
                            <input type="text" placeholder="   Address" id="address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" required>
                    </div> 
                </div>

    <h4>_____________________________________________________________________________________________________________________________________</h4>
   
    <h3><br>Grade Information</h3>                              
    <br></br>
                <div class="fields">  
                    <div class="input-field">
                       <label>Total Subject:</label>
                            <input type="text" placeholder="   Total Subject" id="totalSub" name="totalSub" value="<?php echo isset($_POST['totalSub']) ? htmlspecialchars($_POST['totalSub']) : ''; ?>" required>
                    </div> 
                    <div class="input-field">
                        <label>Total Units:</label>
                            <input type="text" placeholder="   Total Units" id="totalUnits" name="totalUnits" required>
                    </div> 
    <br></br>
    <br></br>
                    <div class="input-field">
                        <label>General Weighted Average:</label>
                            <input type="text" placeholder="   Gwa" id="gwa" name="gwa" required>
                    </div> 
                    </div>

    <h4>_____________________________________________________________________________________________________________________________________</h4>
   
    <h3><br>Upload 2x2 ID Photo</h3>   
    <br></br>
                <div class="educational">  
                    <div class="educ-back">
                            <input type="file" id="idPhoto" name="idPhoto" accept="image/jpeg, image/png" required>
                    </div> 
		</div>
    <h4>_____________________________________________________________________________________________________________________________________</h4>
    
    <h3><br>Latest Copy of Grades</h3>   
    <br></br>
                <div class="educational">  
                    <div class="educ-back">
                            <input type="file" id="grades" name="grades" accept=".docx, .pdf" required>
                    </div> 
		</div>
    <h4>_____________________________________________________________________________________________________________________________________</h4>
    <h3><br>Copy of Birth Certificate/PSA</h3>   
    <br></br>
                <div class="educational">  
                    <div class="educ-back">
                            <input type="file" id="PSA" name="PSA" accept="image/jpeg, image/png" required>
                    </div> 
		</div>
    <h4>_____________________________________________________________________________________________________________________________________</h4>
    <h3><br>Certificate of Good Moral</h3>   
    <br></br>
                <div class="educational">  
                    <div class="educ-back">
                            <input type="file" id="goodMoral" name="goodMoral" accept="image/jpeg, image/png" required>
                    </div> 
		</div>
    <h4>_____________________________________________________________________________________________________________________________________</h4>      
    <h3><br>Copy of Enrollment Form</h3>   
    <br></br>
                <div class="educational">  
                    <div class="educ-back">
                            <input type="file" id="eForm" name="eForm" accept="image/jpeg, image/png" required>
                    </div> 
		</div>
    <h4>_____________________________________________________________________________________________________________________________________</h4>    
                    <input type="checkbox" id="checkbox" value="declare" onclick="check()">I declare that all information in this 
                application is true and correct. I understand that any <br>
                <p>wrong information or misinterpretation may be ground for me to denied admission and<br>
	            or basis for expulsion from Consuelo Chito Madrigal Foundation.
                <a href="https://policies.google.com/privacy?hl=en">Data Privacy Act of 2012.</a></p>
                      
                <div class="button">
                    <input type = "submit" value="Submit" id="submit" name="submit">
                </div>      
	<br>
	</div> 
<br></br>
<br></br>
<br></br>
<br></br>

</div>
</div> 
</form>
</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('scholar');
    console.log(successValue);

    if(successValue === "stmfail"){
        Swal.fire({
            icon:'error',
            title:'Error in your Application Please Try Again!',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }else if(successValue === "success"){
        Swal.fire({
            icon:'success',
            title:'Successfully Registered!',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }
function check() {
  // Get the checkbox and submit button elements
  var checkbox = document.getElementById('checkbox');
  var submitButton = document.getElementById('submit');

  // If the checkbox is checked, enable the submit button. Otherwise, disable it.
  if (checkbox.checked) {
    submitButton.disabled = false;
  } else {
    submitButton.disabled = true;
  }
}

function onlyNumberKey(evt) {
    
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
    
    // Allow numbers, backspace, delete, arrow keys, etc.
    if ((ASCIICode >= 48 && ASCIICode <= 57) || (ASCIICode >= 96 && ASCIICode <= 105) ||
        ASCIICode == 8 || ASCIICode == 46 || (ASCIICode >= 37 && ASCIICode <= 40) ||
        ASCIICode == 9) {
        return true;
    }
    return false;
}


function validateForm() {
  var email = document.forms["myForm"]["email"].value;
  var errorEmail = document.getElementById("errorEmail");

  // Regular expression for basic email validation
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (!re.test(email)) {
    errorEmail.textContent = "Invalid email format";
    return false;
  }

  errorEmail.textContent = ""; // Clear any error messages
  return true; // Submit form if email is valid
}

// Call the check function on page load in case the checkbox is already checked
// (for example, if the user is returning to the form using the browser's back button).
window.onload = check;
</script>