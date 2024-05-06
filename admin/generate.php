<?php
require_once __DIR__ . '/vendor/autoload.php';
require '../classes/database.php';
require '../classes/scholar.php';

$database = new Database();
$scholar = new Scholar($database);
$scholarInfo = $scholar->getAllScholars();

$mdpf = new \Mpdf\Mpdf(['format' => 'LETTER']);

if ($scholarInfo && count($scholarInfo) > 0) {
$data = '<table border="1">
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

$mdpf->WriteHTML($data);

$filename = 'Data_Report_for_this_Month.pdf';

$mdpf->Output($filename, 'D');

exit;
} else {
    echo "No records found.";
}
?>
