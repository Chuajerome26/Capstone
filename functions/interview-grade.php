<?php
session_start();
if(isset($_POST['submit'])){
    require '../classes/admin.php';
    require '../classes/database.php';
    include '../email-design/interview-grade-design.php';

    $database = new Database();
    $admin = new Admin($database);

    $user_id = $_SESSION["id"];
    

    $currentDate = date('Y-m-d');
    $currentDate1 = date('Y-m-d H:i:s');
    $newDate = date('Y-m-d', strtotime($currentDate . ' +7 days'));
    $id = $_POST['id'];
    $scholar_id = $_POST['scholar_id'];

    $info = $admin->getApplicantById($scholar_id);

    $email = $info[0]['email'];
    $last_name = $info[0]['l_name'];

    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    $totalGrade = $q1 + $q2 + $q3 + $q4 + $q5;
    $average = $totalGrade / 5;


    if($updateGrade){

        $message1 = '
        Dear '.$last_name.',
        
        We are delighted to inform you that you have been shortlisted for the final round of interviews for the Scholarship Program. Congratulations on reaching this stage!
        
        The final interview will be a crucial step in the selection process, where we aim to learn more about you, your aspirations, and how you align with the values and objectives of our scholarship program.
        
        Please find below the details for your final interview:
        
        Date: '.$newDate1.'
        Time: '.$time_start.' to '.$time_end.'
        Platform: Onsite Interview
        Location: AREA 6 SITIO VETERANS, BRGY. BAGONG SILANGAN, QUEZON CITY 1119 Quezon City, Philippines
        
        During the interview, you can expect questions related to your academic achievements, extracurricular activities, career goals, and your understanding of how this scholarship will contribute to your personal and professional development.
        
        We encourage you to prepare thoroughly and showcase your strengths and passion for your chosen field of study. Feel free to bring any relevant documents or materials that you believe will support your candidacy.
        
        If you have any questions or concerns regarding the interview process, please do not hesitate to email us at ccmf2015main@gmail.com. 
        
        Once again, congratulations on reaching this stage, and we look forward to meeting you and learning more about your journey and aspirations.
        
        Best regards,
        
        Consuelo "CHITO" Madrigal Foundation, Inc.
        ccmf2015main@gmail.com
        ';


        $message = IntGrade($last_name, $newDate1, $time_start, $time_end);
        $addRemarks = $admin->addRemarks($scholar_id, $user_id, 2, $message1, $currentDate1);
        $update = $database->getConnection()->prepare('UPDATE scholar_info SET application_status = 2 WHERE id = :id');
        $update->execute(['id' => $scholar_id]);
        $database->sendEmail($email,"Invitation to Final Interview for Scholarship", $message);
        header('Location: ../newdesign/schedule-task.php?status=successGrade');
        exit();
    }
}
