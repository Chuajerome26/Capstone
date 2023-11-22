<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>CCMF FORM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style type="text/css">
    	body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


    </style>
</head>
<!-- $scholarData = array(
        'f_name' => trim($_POST["f_name"]),
        'l_name' => trim($_POST["l_name"]),
        'gender' => trim($_POST["gender"]),
        'cStatus' => trim($_POST["cStatus"]),
        'citizenship' => trim($_POST["citizenship"]),
        'bday' => trim($_POST["bday"]),
        'bplace' => $_POST["bplace"],
        'religion' => $_POST["religion"],
        'mNum' => $_POST["mNum"],
        'email' => $_POST["email"],
        'address' => $_POST["address"],
        'totalSub' => trim($_POST["totalSub"]),
        'totalUnits' => trim($_POST["totalUnits"]),
        'gwa' => trim($_POST["gwa"]),
    ); -->


<body class="">
    
<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center">
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6">
        <img src="../images/consuelo.jpg" alt="Image" class="img-fluid">
      </div>
      <!-- <div class="col"> -->
      <div class="">
        <header>
          <h1 class="display-7 text-center">Consuelo Chito Madrigal Foundation (CCMF)</h1>
        </header>
      </div>
    </div>
</div>

<form action="../functions/applicants-register.php" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()"> 
<div class="container col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto mt-3">
<div class="card h-100">
<div class="card-body">
<div class="row gutters">

<!-- PERSONAL INFORMATION -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <h6 class="mb-2 text-primary">Personal's Information</h6>
    <div class="border-bottom container mb-3"></div>
</div>

<!-- <div></div> -->
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Fname">First Name:</label>
        <input type="text" class="form-control" name="f_name" placeholder="First Name" value="<?php echo isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : ''; ?>" required>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Lname">Last Name:</label>
        <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="<?php echo isset($_POST['l_name']) ? htmlspecialchars($_POST['l_name']) : ''; ?>" required>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <!-- <label for="gender">Gender:</label> -->
        <!-- <input type="select" class="form-control" name="gender" placeholder="Gender" value="<?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : ''; ?>" required> -->
        <label for="gender">Gender</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Cstat">Civil Status:</label>
        <input type="text" class="form-control" name="cStatus" placeholder="Civil Status" value="<?php echo isset($_POST['cStatus']) ? htmlspecialchars($_POST['cStatus']) : ''; ?>" required>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Cship">Citizenship</label>
<input type="text" class="form-control" name="citizenship" placeholder="Enter Citizenship" value="<?php echo isset($_POST['citizenship']) ? htmlspecialchars($_POST['citizenship']) : ''; ?>" required>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="website">Date of Birth:</label>
<input type="date" class="form-control" name="bday" value="<?php echo isset($_POST['bday']) ? htmlspecialchars($_POST['bday']) : ''; ?>" required>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="Bplace">Birthplace:</label>
    <input type="text" class="form-control" name="bplace" placeholder="Birthplace" value="<?php echo isset($_POST['bplace']) ? htmlspecialchars($_POST['bplace']) : ''; ?>" required>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
        <label for="rgion">Religion:</label>
        <input type="text" class="form-control" name="religion" placeholder="Religion" value="<?php echo isset($_POST['religion']) ? htmlspecialchars($_POST['religion']) : ''; ?>" required>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="Mnum">Mobile Number:</label>
            <input type="number" class="form-control" name="mNum" placeholder="Enter # Number" value="<?php echo isset($_POST['mNUm']) ? htmlspecialchars($_POST['mNum']) : ''; ?>" onkeydown="return onlyNumberKey(event)" required>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                <label for="Eadd">Email Address:</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                    <label for="adds">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" required>
                    </div>
                    </div>
</div>

    <!-- Grade Information -->
<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="mt-3 mb-2 text-primary">Grade Information</h6>
        <div class="border-bottom container mb-3"></div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="tsubj">Total Subject:</label>
            <input type="number" class="form-control" name="totalSub" placeholder="Total Subject" value="<?php echo isset($_POST['totalSub']) ? htmlspecialchars($_POST['totalSub']) : ''; ?>" required>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="Tunit">Total Units:</label>
            <input type="number" class="form-control" name="totalUnits" placeholder="Total Units" value="<?php echo isset($_POST['totalUnits']) ? htmlspecialchars($_POST['totalUnits']) : ''; ?>" required>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label for="genwa">General Weighted Average:</label>
            <input type="number" class="form-control" name="gwa" placeholder="GWA" value="<?php echo isset($_POST['gwa']) ? htmlspecialchars($_POST['gwa']) : ''; ?>" required> 
        </div>
    </div>

</div>

<!-- REQUIREMENTS -->
<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="mt-3 mb-2 text-primary">Requirements</h6>
    </div>

    <div class="border-bottom container mb-3"></div>

<div class="row gutters">
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
    <label for="Fname">Upload 2X2 Name Photo</label>
    <!-- <label for="formFile" class="form-label"></label> -->
    <input class="form-control" type="file" name="idPhoto" accept=".jpeg, .jpg, .png, .pdf" required>
    </div>
</div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
        <label for="Tunit">Latest Copy of Grades:</label>
        <!-- <label for="formFile" class="form-label"></label> -->
        <input class="form-control" type="file" name="grades" accept=".jpeg, .jpg, .png, .pdf" required>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="Tunit">Copy of Birth Certificate/PSA</label>
            <!-- <label for="formFile" class="form-label"></label> -->
            <input class="form-control" type="file" name="PSA" accept=".jpeg, .jpg, .png, .pdf" required>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                <label for="Tunit">Certificate of Good Moral</label>
                <!-- <label for="formFile" class="form-label"></label> -->
                <input class="form-control" type="file" name="goodMoral" accept=".jpeg, .jpg, .png, .pdf" required>
                </div>
                </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <label for="Fname">Copy of Enrollment Form </label>
                        <label for="formFile" class="form-label"></label>
                        <input class="form-control" type="file" name="eForm" accept=".jpeg, .jpg, .png, .pdf" required>
                        </div>
                        </div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript">
   
</script>
</body>
</html>