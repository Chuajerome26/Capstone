
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
        <title>Consuelo Chito Madrigal Foundation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    </head>
    <body>
      
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0" style="font-size: 14px;">

   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->


<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="row d-flex justify-content-center">
<div class="col-xl-8 col-lg-7">
<div class="card shadow mb-4">
<!-- Card Header - Dropdown -->
<div class="card-body">
<h6 class="p-2 font-weight-bold text-black mb-2">Post Announcement</h6>
<div class="card">
<div class="card-header d-flex align-items-center">
    <img src="../Scholar_files/<?php echo $admin_info[0]['pic']; ?>" alt="Profile image" class="profile-image me-2" width="50" height="50" style="border-radius: 50%;">
    <div class="flex-grow-1 ml-2"><?php echo $admin_info[0]['f_name'].' '.$admin_info[0]['l_name']; ?></div>
</div>

<div class="card-body">
    <form action="" method="post">
        <div class="input-group mb-3">
            <textarea name="announcement" class="form-control w-100" style="height: 150px; resize: none;" placeholder="Announce something here..." aria-label="Comment" aria-describedby="button-addon2"></textarea>
            <button type="submit" class="btn btn-primary" name="post" style="margin-top: 10px;">Post</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-8 col-lg-7">
<div class="card shadow mb-4">
<!-- Card Header - Dropdown -->

<div class="card-body">
<h6 class="p-2 font-weight-bold text-black mb-2">Announcements</h6>
<?php 
if($countA != 0):
foreach($announcements as $a):
    $admin_info1 = $admin->adminInfo($a['admin_id']);
 ?>
<div class="card" style="margin-bottom: 2.5%;">
<div class="card-header d-flex align-items-center">
<img src="../Scholar_files/<?php echo $admin_info1[0]['pic']; ?>" alt="Profile image" class="profile-image me-2 " width="50" height="50" style="border-radius: 50%;">
<div class="flex-grow-1 ml-2 mt-2"><?php echo $admin_info1[0]['f_name'].' '.$admin_info1[0]['l_name']; ?>
<small><p>Date Posted on: <?= $a['ann_date'] ?> Time: <?= $a['ann_time'] ?></p></time></small>
</div>
<div class="dropdown">
<button class="btn btn-white" style="border-radius: 50%;" type="button" id="dropdownMenuButton-<?= $a['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg>
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?= $a['id'] ?>">
    <a class="dropdown-item edit-button" href="#" data-announcement-id="<?= $a['id'] ?>">Edit</a>
    <a class="dropdown-item delete-button text-danger" href="#" data-announcement-id="<?= $a['id'] ?>">Delete</a>
</div>
</div>
</div>
<div class="card-body">
<?= $a['announcement'] ?>
</div>
</div>
<?php endforeach;
else:
    ?>
    <div class="alert alert-primary" role="alert">No Announcements</div>
    <?php endif;  ?>
</div>

<script>
// Function to handle edit button click event
function handleEditButtonClick(event) {
event.preventDefault();
const announcementId = event.target.dataset.announcementId;
alert(`Editing announcement with ID ${announcementId}`);
// Add your own implementation here
}

// Function to handle delete button click event
function handleDeleteButtonClick(event) {
event.preventDefault();
const result = confirm('Are you sure you want to delete this announcement?');
if (result) {
const announcementId = event.target.dataset.announcementId;
alert(`Deleting announcement with ID ${announcementId}`);
// Add your own implementation here
}
}

// Add event listeners to the buttons
const editButtons = document.querySelectorAll('.edit-button');
editButtons.forEach(function(button) {
button.addEventListener('click', handleEditButtonClick);
});

const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
button.addEventListener('click', handleDeleteButtonClick);
});

const dateTime = document.querySelectorAll( 'time');

function updateDateTime() {
const now = new Date();
const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
const formattedDateTime = now.toLocaleString('en-US', options);
dateTime.forEach(time => {
time.textContent = formattedDateTime;
time.setAttribute('datetime', now.toISOString());
});
}

// Update the date and time every minute
setInterval(updateDateTime, 60000);

// Update the date and time initially
updateDateTime();
</script>
</div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="admin-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

           

                </div>
                   
             </div> 
          </main>



        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
$(document).ready(function() {
    $('#scholars').DataTable();

    $('#scholars').parent().parent().css('overflow', 'auto');
    $('#scholars').parent().parent().css('max-height', '500px');
});

</script>
    

    
    
    </body>
  </html>