<?php

require '../classes/database.php';
require '../classes/admin.php';

$database = new Database();
$admin = new Admin($database);

$monthData = array_fill_keys(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), 0);

$data = $admin->getDataforAreaChart();

  foreach ($data as $row) {
    // Convert the date to a DateTime object
    $dateObj = DateTime::createFromFormat('Y-m-d', $row['date_apply']);
    
    // Get the month name
    $monthName = $dateObj->format('F');
  
    // Set the amount for the month
    $monthData[$monthName] += (int)$row['applicant_count'];
  }

  echo json_encode($monthData);

?>
  