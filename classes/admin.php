<?php

class Admin
{
    private $database;
    private $date;

    public function __construct($database) {
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
    function generateRandomSixDigitNumber() {
        $number = '';
    
        for ($i = 0; $i < 6; $i++) {
            $number .= strval(random_int(0, 9));
        }
    
        return $number;
    }
    public function twoFactor($token, $token_expiry, $id){

        $stmt = $this->database->getConnection()->prepare('UPDATE login SET token = ?, token_expiry = ? WHERE user_id = ?');

         //if execution fail
         if (!$stmt->execute([$token, $token_expiry, $id])) {
            header("Location: ../index.php?error=stmtfail");
            exit();
        }
    }
    public function getScholars(){
        $stmt = $this->database->getConnection()->query("SELECT scholars_info.id AS scholar_id, scholars_info.*, scholar_files.* FROM scholars_info 
                                                        JOIN scholar_files ON scholars_info.id = scholar_files.scholar_id
                                                        WHERE scholars_info.status = '1'")->fetchAll();
        return $stmt;
        exit();
    }
    public function getApplicants(){
        $stmt = $this->database->getConnection()->query("SELECT scholars_info.*, scholar_files.* FROM scholars_info 
                                                        JOIN scholar_files ON scholars_info.id = scholar_files.scholar_id
                                                        WHERE scholars_info.status = '0'")->fetchAll();
        return $stmt;
        exit();
    }
    public function scholarInfo($id){
        
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT scholars_info.id AS scholar_id, scholars_info.*,scholar_files.* FROM scholars_info
                                                    JOIN scholar_files ON scholars_info.id = scholar_files.scholar_id
                                                   WHERE scholars_info.id=?");

       //if execution fail
      if (!$stmt->execute([$id])) {
          header("Location: ../index.php?error=stmtfail");
          exit();
      }

      //fetch the result
      $result = $stmt->fetchAll();
      
        //if has result return it, else return false
      if ($result) {
          return $result;
      } else {
          $result = false;
          return $result;
      }
    }

    public function findScholarById($id){

        
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholars_info WHERE status = '1' AND id=?");

       //if execution fail
      if (!$stmt->execute([$id])) {
          header("Location: ../index.php?error=stmtfail");
          exit();
      }

      //fetch the result
      $result = $stmt->fetchAll();
      
        //if has result return it, else return false
      if ($result) {
          return $result;
      } else {
          $result = false;
          return $result;
      }

    
  }
  public function acceptScholar($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholars_info SET status = ? WHERE id = ?");

       //if execution fail
       if (!$stmt->execute([1,$id])) {
           header("Location: ../Pages/employee-register.php?error=stmtfail");

           exit();
       }
   }

   function predictAcceptanceOfRenew($gwa, $attendanceHours) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    $maxGwa = 5.0;
    $minGwa = 1.0;
    $maxAttendanceHours = 150; // Hypothetical maximum attendance hours for full weight
    

    // Weights for each factor
    $gwaWeight = 0.40;
    $attendanceWeight = 0.60;

    // Normalize scores
    // Higher GWA (closer to 5) results in a lower score, and vice versa
    $normalizedGwaScore = ($maxGwa - $gwa) / ($maxGwa - $minGwa); // 5 - 1.5 / 5 - 1 = 3.5 / 4
    $attendanceScore = min($attendanceHours / $maxAttendanceHours, 1);

    // Weighted scores
    $weightedGwaScore = $normalizedGwaScore * $gwaWeight;
    $weightedAttendanceScore = $attendanceScore * $attendanceWeight;

    // Total weighted score
    $totalWeightedScore = $weightedGwaScore + $weightedAttendanceScore;

    // Convert the score to a percentage and round to 2 decimal places
    $acceptanceChance = round($totalWeightedScore * 100, 2);

    return $acceptanceChance;
}
}