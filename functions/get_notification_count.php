<?php
session_start();
require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Call the countNewNotifications method to get the notification count
    $notificationCount = $admin->countNewNotifications($id);

    // Output the notification count
    echo $notificationCount;
} else {
    // Return 0 if user is not logged in
    echo 0;
}
?>
