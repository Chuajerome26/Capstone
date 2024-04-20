<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../images/logo.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets1/css/1.css" />
    <style>
    body {
        background-color: #D5EFBE;
       
    }
  </style>
  </head>
  <body>

  <div class="loader">

</div>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card col-sm-10 shadow-lg">
            <div class="card-body">
            
                <div class="row">
                
                    <div class="col-md-11 mx-auto">
                     <span><p class="text-center fs-4 fw-bold">SET UP YOUR ACCOUNT</p></span>
                        <form id="signupForm" method="post" action="../functions/setup-function.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    <div id="emailHelp" class="form-text">Your password must be 8-20 characters long, contain letters and numbers.</div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                                    <div id="emailHelp" class="form-text">Your password and confirmation password must match.</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    <input class="form-control" type="file" name="idPhoto" accept=".jpg, .jpeg">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="hidden" name="token" value="<?php echo $_GET['token'];?>">
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