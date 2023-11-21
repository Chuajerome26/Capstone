<?php
session_start();

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];

} else {
    header("Location: ../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Include Bootstrap for styling and modal functionality -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Welcome to the Landing Page</h1>

    <!-- Button to trigger "View Details" modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewDetailsModal">
        View Details
    </button>

    <!-- Button to trigger "Edit Details" modal -->
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editDetailsModal">
        Edit Details
    </button>

    <!-- Button to trigger "View Remarks" modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewRemarksModal">
        View Remarks
    </button>
</div>

<!-- External modals -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <!-- Include the content of the "View Details" modal from an external file -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- You can include the content of the modal here -->
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel">View Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Include the content from an external file here -->
                <?php include 'view_details_modal_content.php'; ?>
            </div>
        </div>
    </div>
</div>

<!-- Similar modals for "Edit Details" and "View Remarks" -->
<div class="modal fade" id="editDetailsModal" tabindex="-1" role="dialog" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDetailsModalLabel">Edit Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include 'edit_details_modal_content.php'; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewRemarksModal" tabindex="-1" role="dialog" aria-labelledby="viewRemarksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRemarksModalLabel">View Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include 'view_remarks_modal_content.php'; ?>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS for modal functionality -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
