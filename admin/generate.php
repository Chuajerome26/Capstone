<?php
require_once __DIR__ . '/vendor/autoload.php';
require '../classes/database.php';
require '../classes/scholar.php';

$database = new Database();
$scholar = new Scholar($database);
$scholarInfo = $scholar->getAllScholars();
$applicantInfo = $scholar->getAllApplicants();
$stipendInfo = $scholar->getAllStipend();

$mdpf = new \Mpdf\Mpdf(['format' => 'LETTER']);

// Scholars Table
$data = '<h1>Scholars</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Student Type</th>
                        <th>Scholarship Type</th>
                        <th>Date Applied</th>
                    </tr>
                </thead>
                <tbody>';
$num = 1;
foreach ($scholarInfo as $isko) {
    $data .= '<tr>
                <td>' . $num . '</td>
                <td>' . $isko['f_name'] .' '. $isko['l_name'] .'</td>
                <td>'. $isko['studType'] .'</td>
                <td>'. $isko['scholar_type'] .'</td>
                <td>'. $isko['date_apply'] .'</td>
            </tr>';
    $num++;
}
$data .= '</tbody></table>';

// Applicants Table
$data .= '<h1>Applicants</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Student Type</th>
                        <th>Scholarship Type</th>
                        <th>Date Applied</th>
                    </tr>
                </thead>
                <tbody>';
$num = 1;
foreach ($applicantInfo as $appli) {
    $data .= '<tr>
                <td>' . $num . '</td>
                <td>' . $appli['f_name'] .' '. $appli['l_name'] .'</td>
                <td>'. $appli['studType'] .'</td>
                <td>'. $appli['scholar_type'] .'</td>
                <td>'. $appli['date_apply'] .'</td>
            </tr>';
    $num++;
}
$data .= '</tbody></table>';

// Stipend Table
$data .= '<h1>Stipend</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Scholarship Type</th>
                        <th>Grant</th>
                        <th>Date Processed</th>
                        <th>Reference Number</th>
                    </tr>
                </thead>
                <tbody>';
$num = 1;
foreach ($stipendInfo as $stipend) {
    $data .= '<tr>
                <td>' . $num . '</td>
                <td>' . $stipend['full_name'] .'</td>
                <td>'. $stipend['scholar_type'] .'</td>
                <td>'. $stipend['grants'] .'</td>
                <td>'. $stipend['date_insert'] .'</td>
                <td>'. $stipend['reference_number'] .'</td>
            </tr>';
    $num++;
}
$data .= '</tbody></table>';

$mdpf->WriteHTML($data);

$filename = 'Data_Report_for_this_Month.pdf';

$mdpf->Output($filename, 'D');

exit;
?>
