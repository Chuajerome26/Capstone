<?php 
session_start();

// Assuming Database and Admin are classes that manage database operations.
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);


if (!isset($_SESSION['id']) || ($_SESSION['user_type'] == 3 && $_SESSION['user_type'] == 2 && $_SESSION['user_type'] == 4 && $_SESSION['user_type'] == 6)) {
    header("Location: ../index.php");
    exit();
}

$id = $_SESSION['id'];
$message = '';
$admin_info = $admin->adminInfo($id);
$content = $admin->getContent();
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

  // Update the admin information
  if ($admin->updateAdminInfo($id, $firstName, $lastName, $email)) {
    // Using session to store the success message to avoid form resubmission issues
    $_SESSION['message'] = "Information updated successfully!";
} else {
    $_SESSION['message'] = "Failed to update information.";
}


    header("Location: ../newdesign/admin-myprofile.php", true, 303);
    exit();

}

// Check if there's a message in session and clear it after displaying
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/<?php echo $content[0]['logo']; ?>" />
    <title><?php echo $content[0]['title_name']; ?></title>
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
    background-color: white;
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
    background-color: white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 50;
    margin-bottom: 1rem;
}


    </style>

    </head>
    <body>
    <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12col-sm-12 col-12">
<div class="card h-100">
<div class="card-header" style="background-color: rgb(14, 220, 141)">
    <h5 class="card-title mb-0">Profile</h5>
</div>
<div class="card-body">
<div class="account-settings">
<div class="user-profile">
<div class="user-avatar">
<div class="user-avatar">
        <img src="../Scholar_files/<?php echo $admin_info[0]['pic'];?>">
    <input type="file" id="avatarInput" accept="image/*" style="display: none;">
</div>

<style>
.user-avatar.green img {
    width: 50px;
    height: 50px;
    border-radius: 100%;
    object-fit: cover;
    background-color: white;
}
</style>

<script>
function triggerFileInput() {
    document.getElementById('avatarInput').click();
}

document.getElementById('avatarInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var formData = new FormData();
        formData.append('profilePicture', file);
        formData.append('action', 'uploadProfilePicture');

        fetch('update_profile_picture.php', { // Modify with the correct path to your PHP script
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                document.querySelector('.user-avatar img').src = '../Scholar_files/' + data.fileName;
                alert('Profile picture updated successfully!');
            } else {
                alert('Failed to update profile picture.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>


</div>
<div class="form-group">
  <?php if (isset($admin_info[0]['l_name']) && isset($admin_info[0]['f_name'])):?>
    <label for="rawr" class="form-control" style="border: none;">
    <h5><?php echo $admin_info[0]['f_name'] . " " . $admin_info[0]['l_name'];?></h5>
  <?php endif;?>
</div>
<button type="button" class="btn btn-primary" onclick="triggerFileInput()">Edit Profile Picture</button>

</div>
</div>
</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-header" style="background-color: rgb(14, 220, 141)">
      <h5 class="card-title mb-0">Personal Details</h5>
    </div>
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-success">Profile</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="firstName">First Name:</label>
            <?php if (isset($admin_info[0]['f_name'])):?>
              <input type="text" class="form-control" name="firstName" value="<?php echo $admin_info[0]['f_name'];?>" disabled>
            <?php else:?>
              <input type="text" class="form-control" name="firstName" disabled>
            <?php endif;?>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <?php if (isset($admin_info[0]['l_name'])):?>
              <input type="text" class="form-control" name="lastName" value="<?php echo $admin_info[0]['l_name'];?>" disabled>
            <?php else:?>
              <input type="text" class="form-control" name="lastName" disabled>
            <?php endif;?>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="email">Email:</label>
            <?php if (isset($admin_info[0]['email'])):?>
              <input type="text" class="form-control" name="email" value="<?php echo $admin_info[0]['email'];?>" disabled>
            <?php else:?>
              <input type="text" class="form-control" name="email" disabled>
            <?php endif;?>
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary mr-2" onclick="goBack()">Back</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              Edit Profile
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-10">
              <h6 class="mb-2 text-success text-center">Profile</h6>
              <?php if ($message):?>
                <p class="text-center"><?php echo $message;?></p>
              <?php endif;?>
              <form method="post">
                <div class="form-group">
                  <label for="firstName" class="col-form-label col-12">First Name:</label>
                  <input type="text" class="form-control" name="firstName" value="<?php echo $admin_info[0]['f_name'];?>">
                </div>
                <div class="form-group">
                  <label for="lastName" class="col-form-label col-12">Last Name:</label>
                  <input type="text" class="form-control" name="lastName" value="<?php echo $admin_info[0]['l_name'];?>">
                </div>
                <div class="form-group">
                  <label for="email" class="col-form-label col-12">Email:</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $admin_info[0]['email'];?>">
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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
        // Fallback: redirect to a default page or the homepage
        window.location.href = 'dashboard.php';
    
}

</script>
</body>
  </html>