<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];
    $admin_info = $admin->adminInfo($id);

    // Check if the Post button is clicked and announcement is not empty
    if (isset($_POST['post']) && !empty($_POST['announcement'])) {
$announcement = $_POST['announcement'];

        // Insert the announcement
        $result = $admin->postAnnouncement($id, $announcement);

        // Check if the announcement was successfully posted
        if ($result) {
            header('Location: ../newdesign/admin-announcement.php');
            exit();
        } else {
            echo "Failed to post announcement.";
        }
    }

    $announcements = $admin->getAnnouncements();
    $countA = count($announcements);

} else {
    header("Location: ../index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
        crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <body>
    <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12col-sm-12 col-12">
<div class="card h-100">
<div class="card-header">
    <h5 class="card-title mb-0">Profile</h5>
</div>
<div class="card-body">
<div class="account-settings">
<div class="user-profile">
<div class="user-avatar">
<div class="user-avatar">
    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
    <input type="file" id="avatarInput" accept="image/*" style="display: none;">
</div>

<style>
.user-avatar.green img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    background-color: white;
}
</style>

<script>
function triggerFileInput() {
    document.getElementById('avatarInput').click();
}

document.getElementById('avatarInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function() {
        var img = document.querySelector('.user-avatar img');
        img.src = reader.result;
    }
    reader.readAsDataURL(file);
});
</script>
</div>
<h5 class="user-name">Admin Name</h5>
<button type="button" class="btn btn-primary" onclick="triggerFileInput()">Edit Profile Picture</button>

</div>
</div>
</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-header">
    <h5 class="card-title mb-0">Personal Details</h5>
</div>
<div class="card-body">
<div class="row gutters">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Profile</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" placeholder="Admin Name" disabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="eMail">Email</label>
        <input type="email" class="form-control" id="eMail" placeholder="sampleemail@gmail.com" disabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="0978-XXX-XXXX" disabled>
    </div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Address</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="Street">Street</label>
        <input type="name" class="form-control" id="Street" placeholder="Sample Street" disabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="ciTy">City</label>
        <input type="name" class="form-control" id="ciTy" placeholder="Quezon City" disabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="sTate">Barangay</label>
        <input type="text" class="form-control" id="sTate" placeholder="San Bartolome" disabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="zIp">Zip Code</label>
        <input type="text" class="form-control" id="zIp" placeholder="1115" disabled>
    </div>
</div>
</div>

<!-- Modal -->
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <button type="button" class="btn btn-secondary"onclick="goBack()">Back</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit Profile
        </button>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Profile</h6>
</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" placeholder="Admin Name">
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="eMail">Email</label>
        <input type="email" class="form-control" id="eMail" placeholder="sampleemail@gmail.com">
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Address</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="street">Street</label>
        <input type="text" class="form-control" id="street" placeholder="Enter Street" value="Enter Street">
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="ciTy">City</label>
        <input type="name" class="form-control" id="ciTy" placeholder="City" enabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="sTate">Barangay</label>
        <input type="text" class="form-control" id="sTate" placeholder="Barangay" enabled>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="zIp">Zip Code</label>
        <input type="text" class="form-control" id="zIp" placeholder="Zip Code" enabled>
    </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ends here -->


<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="text-right">
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

function goBack() {
        window.history.back();
    }
	
</script>
</body>
  </html>