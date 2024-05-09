<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'reset_notification') {

    $id = $_SESSION['id'];
    
    // Call the resetNotificationCount method to update the notification count
    $admin->resetNotificationCount($id);

    // Send a response
    echo 'Notification count updated successfully';
} else {
    // Handle invalid requests
    http_response_code(400);
    echo 'Invalid request';
}
?>
