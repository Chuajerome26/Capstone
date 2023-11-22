<?php
require '../classes/admin.php';
require '../classes/attendance.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);
$attendance = new Attendance($database);
// Check if the ID and image data are received via POST
if (isset($_POST["id"]) && isset($_POST["image"])) {
    // Retrieve the ID and image data
    $id = $_POST["id"];
    $base64Image = $_POST["image"];

    // Define the directory where you want to save the image
    $uploadDirectory = '../attendance_proof/';

    // Determine the image format based on the file extension
    $imageFormat = 'jpeg'; // Modify this if you expect a different format

    // Generate a unique filename for the image with the correct file extension
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . '.' . $imageFormat;

    // Construct the full path to save the image
    $imagePath = $uploadDirectory . $imageName;

    // Save the image to the specified directory with the correct format
    if (file_put_contents($imagePath, base64_decode($base64Image))) {
        // Image saved successfully
        
        $stmt = $database->getConnection()->prepare('INSERT INTO scholar_attendance (scholar_id, image_proof) VALUES (:id, :imageName)');
        $stmt->execute(['id' => $id, 'imageName' => $imageName]);

    } else {
        // Handle the case where image saving fails
        echo "Failed to save the image.";
    }
} else {
    // Handle the case where data is not received properly
    echo "Data not received.";
}
?>
