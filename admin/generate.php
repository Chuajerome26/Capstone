<?php
require_once __DIR__ . '/vendor/autoload.php';
require '../classes/database.php';
require '../classes/scholar.php';

$database = new Database();
$scholar = new Scholar($database);
$scholarInfo = $scholar->getAllScholars();
$applicantInfo = $scholar->getAllApplicants();
$stipendInfo = $scholar->getAllStipend();
$month = date('F');

$mdpf = new \Mpdf\Mpdf(['format' => 'LETTER']);

// Scholars Table
$data = '
    <style>
        .column {
            width: 250px;
        }
        .column1 {
            width: 20px;
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
    </style>

    <div class="container" style="font-family: Bahnschrift;">
        <h2 style="margin-bottom: 20px; text-align: center;">Data Report for the Month of '.$month.'</h2>
        <h2 style="margin-top: 0; text-align: center;">Current Scholars</h2>

        <table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
            <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
                <td class="column1" style="text-align: center; color: white;">#</td>
                <td class="column2" style="text-align: center; color: white;">Name</td>
                <td class="column2" style="text-align: center; color: white;">Student Type</td> 
                <td class="column2" style="text-align: center; color: white;">Scholarship Type</td> 
                <td class="column2" style="text-align: center; color: white;">Date Applied</td> 
            </tr>
            <tbody>';
            $num = 1;
            foreach ($scholarInfo as $isko) {
                $dateApplied = date("F d, Y", strtotime($isko['date_apply']));
                if($isko['scholar_type'] = 3){
                    $scho_type = "Academic Rank 1";
                }else if($isko['scholar_type'] = 2){
                    $scho_type = "Academic Rank 2";
                }else if($isko['scholar_type'] = 1){
                    $scho_type = "Economic";
                }
                $data .= '<tr>
                            <td class="column2">' . $num . '</td>
                            <td class="column2">' . $isko['f_name'] .' '. $isko['l_name'] .'</td>
                            <td class="column2">'. $isko['studType'] .'</td>
                            <td class="column2">'. $scho_type .'</td>
                            <td class="column2">'. $dateApplied .'</td>
                        </tr>';
                $num++;
            }
            $data .= '</tbody></table>

            <h2 style="margin-top: 0; text-align: center;">Applicants of '.$month.'</h2>

            <table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
                <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
                    <td class="column1" style="text-align: center; color: white;">#</td>
                    <td class="column2" style="text-align: center; color: white;">Name</td>
                    <td class="column2" style="text-align: center; color: white;">Student Type</td> 
                    <td class="column2" style="text-align: center; color: white;">Scholarship Type</td> 
                    <td class="column2" style="text-align: center; color: white;">Date Applied</td> 
                </tr>
                <tbody>';
                $num = 1;
                foreach ($applicantInfo  as $appli) {
                    $dateApplied = date("F d, Y", strtotime($appli['date_apply']));
                    if($appli['scholar_type'] = 3){
                        $scho_type = "Academic Rank 1";
                    }else if($appli['scholar_type'] = 2){
                        $scho_type = "Academic Rank 2";
                    }else if($appli['scholar_type'] = 1){
                        $scho_type = "Economic";
                    }
                    $data .= '<tr>
                                <td class="column2">' . $num . '</td>
                                <td class="column2">' . $appli['f_name'] .' '. $appli['l_name'] .'</td>
                                <td class="column2">'. $appli['studType'] .'</td>
                                <td class="column2">'. $scho_type .'</td>
                                <td class="column2">'. $dateApplied .'</td>
                            </tr>';
                    $num++;
                }
                $data .= '</tbody></table>
            
                <h2 style="margin-top: 0; text-align: center;">Stipend Disbursements of '.$month.'</h2>

                <table style="border-collapse: collapse; width: 80%; margin: auto; margin-bottom: 20;">
                    <tr style="text-align:center; font-weight: bold; color: white; background-color: #0d6efd;">
                        <td class="column1" style="text-align: center; color: white;">#</td>
                        <td class="column2" style="text-align: center; color: white;">Name</td>
                        <td class="column2" style="text-align: center; color: white;">Scholarship Type</td> 
                        <td class="column2" style="text-align: center; color: white;">Grant</td> 
                        <td class="column2" style="text-align: center; color: white;">Date Processed</td>
                        <td class="column2" style="text-align: center; color: white;">Reference Number</td>
                    </tr>
                    <tbody>';
                    $num = 1;
                    foreach ($stipendInfo  as $stipend) {
                        $dateInsert  = date("F d, Y", strtotime($stipend['date_insert']));
                        if($stipend['scholar_type'] = 3){
                            $scho_type = "Academic Rank 1";
                        }else if($stipend['scholar_type'] = 2){
                            $scho_type = "Academic Rank 2";
                        }else if($stipend['scholar_type'] = 1){
                            $scho_type = "Economic";
                        }
                        $data .= '<tr>
                                    <td class="column2">' . $num . '</td>
                                    <td class="column2">' . $stipend['full_name'] .'</td>
                                    <td class="column2">'. $scho_type .'</td>
                                    <td class="column2">'. $stipend['grants'] .'</td>
                                    <td class="column2">'. $dateInsert .'</td>
                                    <td class="column2">'. $stipend['reference_number'] .'</td>
                                </tr>';
                        $num++;
                    }
                    $data .= '</tbody></table>
    </div>
';

$mdpf->WriteHTML($data);
$date = date('Y-m-d');
$timestamp = time(); // get current timestamp
$filename = 'Data_Report_of_'.$date.'-' . $timestamp . '.pdf';

$mdpf->Output($filename, 'D');

exit;
?>
