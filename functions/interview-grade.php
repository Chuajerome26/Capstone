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

    $updateGrade = $admin->gradeInterviewInitial($id, $totalGrade);

    if($updateGrade){
        $start_time = '09:00';
        $end_time = '15:00';
        $excluded_start = '12:00';
        $excluded_end = '13:00';
        $max10 = 1;
        $duration = 30;

        $scholarData = array(
            'scholar_id' => $scholar_id,
            'type' => 1,
        );

        $sched = $admin->selectAndInsertSchedulesforFinal($scholarData, $start_time, $end_time, $excluded_start, $excluded_end, $duration, $max10, $newDate);
        $date = $sched[0]['date'];
        $newDate1 = date("M d, Y", strtotime($date));
        $time_start = $sched[0]['start'];
        $time_end = $sched[0]['end'];

        $convertedTime = date("h:i A", strtotime($time_start));
        $convertedTime1 = date("h:i A", strtotime($time_end));
        $message = IntGrade($last_name, $newDate1, $time_start, $time_end);
        $addRemarks = $admin->addRemarks($id, $user_id, 2, $message, $currentDate1);
        $database->sendEmail($email,"Invitation to Final Interview for Scholarship", $message);
        header('Location: ../newdesign/schedule-task.php?status=successGrade');
        exit();
    }
}
