<?php
// Include the database connection code
require '../classes/scholar.php';
require '../classes/database.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get user input data
    $scholarID = $_POST['scholarID'];
    $subjectTotal = $_POST['subjectTotal'];
    $unitTotal = $_POST['unitTotal'];
    $gwa = $_POST['gwa'];
    $remark = $_POST['remark'];

    // Create a new instance of the Database class
    $database = new Scholar(new Database());


    // Handle file upload
    $uploadDir = "../Uploads_gslip/";
    $uploadedFileName = $_FILES['file']['name'];
    $uploadedFile = $uploadDir . $uploadedFileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)) {
        if ($database->insertData($scholarID, $subjectTotal, $unitTotal, $gwa, $remark, $uploadedFileName)) {
            // Display an alert and then redirect using JavaScript
            echo '<script>alert("Data uploaded successfully!"); window.location.href = "scholar-dashboard.php";</script>';
            exit;
        } else {
            echo "Error inserting data.";
        }
    } else {
        echo "Error uploading file.";
    }
    

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Renew</title>
</head>
<body>
    <h1>Renew Form</h1>
    <form action="scholar-renew.php" method="post" enctype="multipart/form-data">
        <input type="text" name="scholarID" placeholder="Scholar ID"><br>
        <input type="text" name="subjectTotal" placeholder="Total Subjects"><br>
        <input type="text" name="unitTotal" placeholder="Total Units"><br>
        <input type="text" name="gwa" placeholder="GWA"><br>
        <select name="remark">
            <option value="passed">Passed</option>
            <option value="failed">Failed</option>
        </select><br>
        <input type="file" name="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
