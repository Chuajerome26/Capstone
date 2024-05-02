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
    $average = round($totalGrade / 5, 2);


    if($average >= 37.50){

        $message1 = '
        Dear '.$last_name.',

I hope this message finds you well. I wanted to take a moment to express my gratitude for your participation in the recent scholarship interview. Your thoughtful responses and insightful perspectives truly impressed the interview panel.

We understand that preparing for and participating in interviews can be a demanding process, and we appreciate the time and effort you dedicated to sharing your experiences and aspirations with us.

The interview panel was particularly impressed by [mention any specific strengths or standout points discussed during the interview]. Your passion for [mention relevant subject or field] was evident throughout our conversation.

Please know that your application is under careful consideration, and we will be in touch with you as soon as a decision has been made. In the meantime, if you have any questions or need further information, please dont hesitate to reach out to us.

Once again, thank you for your interest in our scholarship program and for your participation in the interview. We wish you the best of luck in all your future endeavors.

Warm regards,
        ';


        $message = IntGrade($last_name);
        $addRemarks = $admin->addRemarks($scholar_id, $user_id, 2, $message1, $currentDate1);
        $update = $database->getConnection()->prepare('UPDATE scholar_info SET application_status = 2 WHERE id = :id');
        $update->execute(['id' => $scholar_id]);
        $database->sendEmail($email,"Thank You for Your Recent Scholarship Interview", $message);
        header('Location: ../newdesign/schedule-task.php?status=successGrade');
        exit();
    }else{
        
    }
}
