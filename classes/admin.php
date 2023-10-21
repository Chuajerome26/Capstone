<?php

class Admin
{
    private $database;
    private $date;

    public function __construct( $database) {
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date =  date('Y-m-d H:i:s');
    }
    public function login($email){
        // prepare the SQL statement using the database property
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM login WHERE user=?");

         //if execution fail
        if (!$stmt->execute([$email])) {
            header("Location: ../index.php?error=stmtfail");
            exit();
        }

        //fetch the result
        $result = $stmt->fetch();
        
          //if has result return it, else return false
        if ($result) {
            return $result;
        } else {
            $result = false;
            return $result;
        }
    }
}