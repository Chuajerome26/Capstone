<?php

require '../classes/admin.php';
require '../classes/database.php';

if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpName = $_FILES["webcam"]["tmp_name"];
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
    move_uploaded_file($tmpName, '../attendance_proof/'.$imageName);

    $date = date("Y/m/d") . " & " . date("h.i.sa");

    $stmt = $database->getConnection()->prepare('INSERT INTO scholar_attendance (username, email, password) VALUES (:username, :email, :password)');
    $stmt->execute(['id' => $userId, 'token' => $token]);
    $user = $stmt->fetch();
}
