<?php
require_once __DIR__ .'/vendor/autoload.php';
require '../classes/database.php';
require '../classes/admin.php';
require '../classes/scholar.php';

$database = new Database();
$admin = new Admin($database);
$scholar = new Scholar($database);

$fullName = $_POST['f_name'];
$scholar_id = $_POST['scholar_id'];
$grants = $_POST['grants'];

$scholar_dates = $scholar->getRenewalDates();

if(isset($_POST['sendCert'])){
    $info = $admin->getScholarById($scholar_id);
    $ref = $scholar_dates['reference_number'];
    $stipend = $admin->selectStipend($scholar_id, $ref);
    $last = $info[0]['l_name'];
    $message = '
Dear '.$last.',

I hope this email finds you well. I am writing to inform you that we have received the certificate confirming the disbursement of your stipend/allowance as a scholar.

Kindly note that the stipend/allowance will be credited to your GCash account within the next one to seven days. Once the transaction is complete, you will receive a notification from GCash confirming the deposit.

Should you encounter any delays or have any inquiries regarding the stipend/allowance disbursement process, please do not hesitate to reach out to us for assistance.

Congratulations once again on your academic achievements, and we wish you the best as you continue to excel in your studies.
';

    if($stipend[0]['certificate'] == ""){
        header('Location: ../newdesign/Stipend Processing.php?status=noFileGenerated');
        exit();
    }else{
        $stmt = $database->getConnection()->prepare('UPDATE stipend SET status = 1 WHERE scholar_id = :id AND reference_number = :ref');

        if(!$stmt->execute(['id' => $scholar_id, 'ref' => $ref])){
            header('Location: ../newdesign/Stipend Processing.php?info=error');
            exit();
        }

        $fileDirectory = "../certificates/";
        $fileName = $stipend[0]['certificate'];
        $filePath = $fileDirectory . $fileName;
        // echo $filePath;

        $attachment = [
            'tmpName' => $filePath,      // File path of the attachment
            'name' => $fileName        // Name of the attachment file
        ];

        $database->sendEmail($info[0]['email'], "Certificate of Scholar Stipend/Allowance Certificate", $message, $attachment);

        header('Location: ../newdesign/Stipend Processing.php?info=send');
        exit();
    }

}elseif(isset($_POST['genCert'])){


    $imageUrl = 'https://ccmf.website/images/Management1.png';
    $imageData = file_get_contents($imageUrl);

    $mdpf = new \Mpdf\Mpdf(['format' => 'LETTER', 'orientation' => 'L']);

    $data='
        <style>
        body {
            font-family: Roboto;
            margin: 0;
            padding: 0;
        }

        .certificate-container {
            padding: 50px;
            width: 1024px;
            margin: 0 auto; /* Center the container */
        }
        .certificate {
            border: 20px solid #018749;
            padding: 25px;
            height: 600px;
            position: relative;
        }

        .certificate:after {
            content: "";
            top: 0px;
            left: 30px;
            bottom: 0px;
            right: 0px;
            position: absolute;
            background-image: url(../images/forcert.png);
            background-size: 100%;
            z-index: -1;
            opacity: 0.1;
        }

        .certificate-header > .logo {
            width: 80px;
            height: 80px;
        }

        .certificate-title {
            text-align: center;
        }

        .certificate-body {
            text-align: center;
        }

        h1 {
            font-weight: 400;
            font-size: 48px;
            color: #0c5280;
        }

        .student-name {
            font-size: 24px;
        }

        .certificate-content {
            margin: 0 auto;
            width: 750px;
        }

        .about-certificate {
            width: 380px;
            margin: 0 auto;
        }

        .topic-description {
            text-align: center;
        }
        </style>
    </head>
    <body>
        <div class="certificate-container">
        <div class="certificate">
            <div class="certificate-body">
        
            <h1>Certificate of Scholarship</h1>
            <p style="font-size: 15px;">
                    This is to certify that
                </p>
            <p class="student-name">'.$fullName.'</p>
            <div class="certificate-content">
            
                
                <div class="text-center">
                <p class="topic-description text-muted">
                As city scholar, he/she is entitled to a scholarship grant not exceeding <b><u>'.$grants.'</u></b> for stipend for the 2nd Term of S.Y. 2023 - 2024.
                </p>
                </div>
            </div>
            <div class="certificate-footer text-muted">
                <div class="row">
                <div class="col-md-6">
                    <div class="row">
                    <div class="col-md-6">
                        <p>Accredited by</p>
                    </div>
                    <div class="col-md-6">
                        <p>The Development Team</p>
                    </div>
                    <div class="col-md-6">
                        <p>Endorsed by</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>
    ';

        $scholar_dates = $scholar->getRenewalDates();
        $ref = $scholar_dates['reference_number'];

        $document_path = '../certificates/';

        $mdpf->WriteHTML($data);

        $date = date('Y-m-d');
        $timestamp = time(); // get current timestamp

        $filename = $fullName. '_' . $date . '-' . $timestamp . '.pdf'; // append timestamp to filename

        $file_path = $document_path . $filename;

        $mdpf->Output($file_path, 'F');

        $admin->insertCertFilePath($filename,$scholar_id,$ref);

        header('Location: ../newdesign/Stipend Processing.php?info=generated');
        exit();
        
}