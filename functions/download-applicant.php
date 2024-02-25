<?php

require '../classes/database.php';
$database = new Database();

$data = "SELECT * FROM scholar_info WHERE status=0 ORDER BY id ASC";
$query = $database->getConnection()->query($data);
$query1 = $query->fetch();

if($query1){
    $delimeter = ",";
    $filename = "applicant-data_". date('Y-m-d') .".csv";

    $f = fopen('php://memory', 'w');

    $fields = array('ID', 'FIRSTNAME', 'MIDDLENAME', 'LASTNAME', 'TIME IN', 'STATUS', 'TIME OUT', 'NUMBER OF HOUR', 'OVER TIME', 'SCHEDULE');
    fputcsv($f , $fields, $delimeter);

    while($row = $query1){
        $linedata = array($row['id'], $row['Name'], $row['employee_id'], $row['date'], $row['time_in'], $row['status'], $row['time_out'], $row['num_hr'], $row['over_time'], $row['schedule_id']);
        fputcsv($f , $linedata, $delimeter);
    }

    fseek($f, 0);

    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);
}

// $datadelete = "SELECT * FROM attendance";
// $querydel = $conn->query($datadelete);
// if($querydel->num_rows > 0){
//     while($row1 = $querydel->fetch_assoc()){
//         $delete = "DELETE FROM attendance WHERE attendance.id = '".$row1['id']."'";
//         $querydell = $conn->query($delete);
//     }
// }