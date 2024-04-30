<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Log In</title>
<link rel="icon" type="image/x-icon" href="<?php echo 'images/Management1.png'; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Fontawesome -->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<script>
       function updateTime() {
            var now = new Date();
            var dateTime = now.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
            document.getElementById('datetime').innerHTML = dateTime;
            setTimeout(updateTime, 1000); // Update every second
        }
        </script>
         <body onload="updateTime()">
         <header>
        <nav style="background-color: #A3FFD6; color: #fff; padding: 3px; text-align: center;">
        <div id="datetime" style="font-family: 'Times New Roman', Times, serif; font-size: 22px; font-weight: bold; color: black; background-color: #A3FFD6; padding: 3px;"></div>
        </nav>
    </header>
<style>
    	.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

.btn-custom-color {
    
    border: none;
    background-color: #0EDC8D;
    color: white; /* Optionally change the text color */
}

.btn-custom-color:hover {

    background-color:
    #74E291;
    color:white;
}



  /* Apply the animation to the element */
  .image-container {
    background-image: url('images/1.jpg');
    background-size: 459px;
    background-repeat: no-repeat;
    
  }


  .valid-input {
      border-color: green;
    }
    .invalid-input {
      border-color: red;
    }
  /* Add a hover effect */
 
  

    </style>
</head>
<body style="background-color: #A3FFD6;">

  <div class="container py-0 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="images/Management1.png"
                    style="width: 250px;">
                  
                </div>
</br>

<div style="text-align: center;">
                <b><p style="font-size: 25px;">Log in</p></b>
</div>

                <form method="post" action="functions/admin-login.php">
                  

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Username</label>
                    <input type="email" id="form2Example11" class="form-control"
                      name="email" placeholder="name@example.com" />
                    
                  </div>
  
                   <div class="col-sm-15 mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control  border-end-0" id="password" name="pass" required placeholder="Password">
                        <!-- Change the id of the eye icon to togglePassword -->
                        <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>
                    
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block fa-lg  mb-2 btn-custom-color" type="submit" name="submit">Log In</button>

                  <a href="#" class="forgot-password" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="test.php"> &nbsp; Create new</a>
                    
                  </div>

                </form>

              </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center  image-container" style="background-image: url('images/side.png'); background-size: 459px; background-repeat: no-repeat; animation: zoomIn 1s;">

           
           
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
              
            
            </p>
        </div>
      

        </div>
        

        </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal for Forgot Password -->
 <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="forgotPasswordModalLabel">Forgot Password?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>
                <form action="functions/forgot_pass.php" method="post">
                    <div class="form-group">
                        <label class="fw-bold" for="forgotEmail">Email Address:</label>
                        <input type="email" id="forgotEmail" name="forgotEmail" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>


<?php include 'footer1.php'; ?>




</html>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('info');
    console.log(successValue);

    if(successValue === "errorCredentials"){
        Swal.fire({
            icon:'error',
            title:'Wrong Credentials',
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
    }else if(successValue === "verifyEmail"){
        Swal.fire({
            icon:'error',
            title:'Verify Your Account!',
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
    }else if(successValue === "passDonotMatch"){
        Swal.fire({
            icon:'error',
            title:'Password Do not Match!',
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
    }else if(successValue === "emailExist"){
        Swal.fire({
            icon:'error',
            title:'Email Already Exist!',
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
    }else if(successValue === "checkEmail"){
        Swal.fire({
            icon:'success',
            title:'Check Your Email!',
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
    else if(successValue === "successfullyVerified"){
        Swal.fire({
            icon:'success',
            title:'Successfully Verify, Proceed to Login!',
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

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("form2Example22");
        var checkbox = document.getElementById("showPasswordCheck");
        
        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

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
</script>