<?php

class Attendance{
    private $database;
    private $date;
    private $time;

    public function __construct(Database $database) {
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date =  date('Y-m-d');
        $this->time = date('H:i:s');

    }

    public function login_time_in($id, $name, $image){
        $sql = 'INSERT INTO scholar_attendance (scholar_id, scholar_name, date, time_in, image_proof) VALUES (?,?,?,?,?)';
        
        $stmt = $this->database->getConnection()->prepare($sql);
        //if execution fail
        if (!$stmt->execute([$id, $name, $this->date, $this->time, $image])) {
            header("Location: ../Pages-admin/scholar-attendance.php?status=stmtfail");

            exit();
        }

        header("Location: ../Pages-admin/scholar-attendance.php?status=success");
    }

    public function login_time_out($id, $scholar_id, $name, $image){
        $stmt = $database->getConnection()->prepare('UPDATE scholar_attendance');
        
        //if execution fail
        if (!$stmt->execute([$id, $name, $this->date, $this->time, $image])) {
            header("Location: ../Pages-admin/scholar-attendance.php?status=stmtfail");

            exit();
        }

        header("Location: ../Pages-admin/scholar-attendance.php?status=success");
    }
}