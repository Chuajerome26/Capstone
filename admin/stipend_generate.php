<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require '../classes/database.php';
require '../classes/scholar.php';
require '../classes/admin.php';

$database = new Database();
$scholar = new Scholar($database);
$admin = new Admin($database);
// $scholarInfo = $scholar->getAllScholars();
// $applicantInfo = $scholar->getAllApplicantsGenerate();
// $stipendInfo = $scholar->getAllStipend();

$admin_id = $_SESSION["id"];
$admin_info = $admin->adminInfo($admin_id);

$month = date('F');
$date = date('Y-m-d');
$timestamp = time();

$mdpf = new \Mpdf\Mpdf(['format' => 'LETTER']);

$status123 = $_POST['type'];
$startDate = $_POST['date_start'];
$endDate = $_POST['date_end'];

$applicantInfo = $scholar->getAllStipendGenerate($startDate, $endDate);

if($status123 == 0){
    $status1 = "To Send";
}elseif($status123 == 1){
    $status1 = "Sent";
}

function convertDate($date123) {
    // Create a DateTime object from the input date using the correct format 'Y-d-m'
    $date = DateTime::createFromFormat('Y-m-d', $date123);

    // Check if the date is valid
    if (!$date) {
        return "Invalid date format";
    }

    // Format the date to "M d, Y"
    $formattedDate = $date->format('M d, Y');
    return $formattedDate;
}
function generateTable($applicants, $statusFilter) {
    $statusMap = [
        0 => "To Send",
        1 => "Sent"
    ];
    
    $data .= '<table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
                <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
                    <td class="column1" style="text-align: center; color: white;">#</td>
                    <td class="column2" style="text-align: center; color: white;">Name</td>
                    <td class="column2" style="text-align: center; color: white;">Scholarship Type</td>
                    <td class="column2" style="text-align: center; color: white;">Status</td> 
                    <td class="column2" style="text-align: center; color: white;">Grant</td> 
                    <td class="column2" style="text-align: center; color: white;">Date Processed</td>
                </tr>
                <tbody>';
    
    $num = 1;
    foreach ($applicants as $appli) {
        if ($appli['status'] == $statusFilter) {
            $dateInsert  = date("F d, Y", strtotime($appli['date_insert']));
            $status = $stipend['status'] == 0 ? "To Send" : "Sent";
            
            $data .= '<tr>
                        <td class="column1">' . $num . '</td>
                        <td class="column2">' . $appli['full_name'] . '</td>
                        <td class="column2">' . $appli['scholar_type'] . '</td>
                        <td class="column2">' . $status . '</td>
                        <td class="column2">' . $appli['grants'] . '</td>
                        <td class="column2">' . $dateInsert . '</td>
                    
                    </tr>';
            $num++;
        }
    }
    
    $data .= '</tbody></table>';
    return $data;
}

// Styles and Header
$data = '
    <style>
        .column {
            width: 250px;
        }
        .column1 {
            width: 16px;
            padding: 5px;
            border: 1px solid black;
        }
        .column2 {
            width: 150px;
            padding: 5px;
            border: 1px solid black;
        }
        table {
            font-size: 13px;
        }
        p {
            font-size: 12px;
            font-style: italic;
        }
    </style>
    <p>Date: ' . date('F j, Y \T\i\m\e: h:iA') . '</p>
    <p>Generated by Admin: '.$admin_info[0]['l_name'].', '.$admin_info[0]['f_name'].'</p>
    <div class="container" style="font-family: Bahnschrift;">
        <h2 style="margin-bottom: 20px; text-align: center;">Data Report from '. convertDate($startDate) .' to '. convertDate($endDate) .'</h2>';

        // // Scholars Table
        // $data .= '<table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
        //             <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
        //                 <td class="column1" style="text-align: center; color: white;">#</td>
        //                 <td class="column2" style="text-align: center; color: white;">Name</td>
        //                 <td class="column2" style="text-align: center; color: white;">Student Type</td> 
        //                 <td class="column2" style="text-align: center; color: white;">Scholarship Type</td> 
        //                 <td class="column2" style="text-align: center; color: white;">Date Applied</td> 
        //             </tr>
        //             <tbody>';
        // $num = 1;
        // foreach ($scholarInfo as $isko) {
        //     $dateApplied = date("F d, Y", strtotime($isko['date_apply']));
        //     $data .= '<tr>
        //                 <td class="column1">' . $num . '</td>
        //                 <td class="column2">' . $isko['f_name'] . ' ' . $isko['l_name'] . '</td>
        //                 <td class="column2">' . $isko['studType'] . '</td>
        //                 <td class="column2">' . $isko['scholar_type'] . '</td>
        //                 <td class="column2">' . $dateApplied . '</td>
        //             </tr>';
        //     $num++;
        // }
        // $data .= '</tbody></table>';

        // Applicants Table for Each Status
        // $data .= '<h2 style="margin-top: 0; text-align: center;">Applicants of ' . $month . '</h2>';
        $data .= '<h3 style="margin-top: 0; text-align: center;">'.$status1.'</h3>';
        $data .= generateTable($applicantInfo, $status123);

        // // Stipend Disbursements Table
        // $data .= '<h2 style="margin-top: 0; text-align: center;">Stipend Disbursements of ' . $month . '</h2>';
        // $data .= '<table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
        //             <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
        //                 <td class="column1" style="text-align: center; color: white;">#</td>
        //                 <td class="column2" style="text-align: center; color: white;">Name</td>
        //                 <td class="column2" style="text-align: center; color: white;">Scholarship Type</td>
        //                 <td class="column2" style="text-align: center; color: white;">Status</td> 
        //                 <td class="column2" style="text-align: center; color: white;">Grant</td> 
        //                 <td class="column2" style="text-align: center; color: white;">Date Processed</td>
        //                 <td class="column2" style="text-align: center; color: white;">Reference Number</td>
        //             </tr>
        //             <tbody>';
        // $num = 1;
        // foreach ($stipendInfo as $stipend) {
        //     $dateInsert  = date("F d, Y", strtotime($stipend['date_insert']));
        //     $status = $stipend['status'] == 0 ? "To send" : "Sent";
        //     $data .= '<tr>
        //                 <td class="column1">' . $num . '</td>
        //                 <td class="column2">' . $stipend['full_name'] . '</td>
        //                 <td class="column2">' . $stipend['scholar_type'] . '</td>
        //                 <td class="column2">' . $status . '</td>
        //                 <td class="column2">' . $stipend['grants'] . '</td>
        //                 <td class="column2">' . $dateInsert . '</td>
        //                 <td class="column2">' . $stipend['reference_number'] . '</td>
        //             </tr>';
        //     $num++;
        // }
        // $data .= '</tbody></table>
            '</div>';

        // Generate and Output PDF
        $mdpf->WriteHTML($data);
        $filename = 'Data_Report_of_' . $date . '-' . $timestamp . '.pdf';
        $mdpf->Output($filename, 'D');
        exit;
        ?>
