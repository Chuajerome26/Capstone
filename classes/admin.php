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
    public function updateNotif1($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholars_info SET notif_send = ? WHERE id =?");
       //if execution fail
       $stmt->execute([1, $id]);
       
    }
    public function updateNotif0($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholars_info SET notif_send = ? WHERE id =?");
       //if execution fail
       $stmt->execute([0, $id]);
       
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
    public function getScholarCount() {
        $scholars = $this->getScholars();
        return count($scholars);
    }
    public function getApplicantsCount() {
        $applicants = $this->getApplicants();
        return count($applicants);
    }
    public function getTotalFunds(){
        $stmt = $this->database->getConnection()->query("SELECT total_funds FROM totalFunds WHERE id = 1")->fetchAll();

        return $stmt;
        exit();
    }
    public function getDataforAreaChart(){
        $stmt = $this->database->getConnection()->query("SELECT date_added, amount FROM admin_funds")->fetchAll();

        return $stmt;
        exit();
    }
    public function getApplicants(){
        $stmt = $this->database->getConnection()->query("SELECT scholars_info.id AS scholar_id, scholars_info.*, scholar_files.* FROM scholars_info 
                                                        JOIN scholar_files ON scholars_info.id = scholar_files.scholar_id
                                                        WHERE scholars_info.status = '0'")->fetchAll();
        return $stmt;
        exit();
    }
    public function getApplicantById($id){
        $stmt = $this->database->getConnection()->prepare("SELECT scholars_info.id AS scholar_id, scholars_info.*, scholar_files.* FROM scholars_info 
                                                        JOIN scholar_files ON scholars_info.id = scholar_files.scholar_id
                                                        WHERE scholars_info.status = '0' AND scholars_info.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
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
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholars_info WHERE status = 1 AND id=?");

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
  public function updateFilesRemarks($scholar_id, $id_pic, $cog, $psa, $gm, $ef){
    // prepared statement
    $stmt = $this->database->getConnection()->prepare("UPDATE scholar_files SET id_status = ?, grade_status = ?, psa_status = ?, gm_status = ?, ef_status = ?, review_date = ? WHERE scholar_id = ?");

   //if execution fail
   if (!$stmt->execute([$id_pic, $cog, $psa, $gm, $ef, $this->date, $scholar_id])) {
       header("Location: ../Pages-admin/admin-application.php?error=stmtfail");

       exit();
   }
    }
  public function acceptScholar($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholars_info SET status = ? WHERE id = ?");

       //if execution fail
       if (!$stmt->execute([1,$id])) {
           header("Location: ../Pages-admin/admin-application.php?error=stmtfail");

           exit();
       }
   }

   function predictAcceptanceOfRenew($gwa, $attendanceHours) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    $maxGwa = 5.0;
    $minGwa = 1.0;
    $maxAttendanceHours = 150; // Hypothetical maximum attendance hours for full weight
    

    // Weights for each factor
    $gwaWeight = 0.30;
    $attendanceWeight = 0.70;

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
function convertToDecimalFivePointScale($grade) {
    if ($grade >= 90 && $grade <= 99) {
        return 1;
    } elseif ($grade >= 85 && $grade < 90) {
        return 2;
    } elseif ($grade >= 80 && $grade < 85) {
        return 2.5;
    } elseif ($grade >= 75 && $grade < 80) {
        return 3;
    } elseif ($grade >= 70 && $grade < 75) {
        return 3.5;
    } elseif ($grade >= 65 && $grade < 70) {
        return 4;
    } elseif ($grade >= 60 && $grade < 65) {
        return 4.5;
    } else {
        return 5;
    }
}

function predictAcceptanceOfApplicant($gwa, $ratings) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    if($gwa >= 75 && $gwa <= 100){
        $gwa = $this->convertToDecimalFivePointScale($gwa);
    }

    $maxGwa = 5.0; 
    $minGwa = 1.0;  // Hypothetical maximum attendance hours for full weight
    $totalRatings = 100; // Total number of required ratings

    // Weights for each factor
    $gwaWeight = 0.40;
    $ratingsWeight = 0.60; // Updated weight variable name

    // Normalize scores
    // Higher GWA (closer to 5) results in a lower score, and vice versa
    $normalizedGwaScore = ($maxGwa - $gwa) / ($maxGwa - $minGwa); //5 - 1 / 5 - 1
    $normalizedRatingsScore = $ratings / $totalRatings; // Updated variable name
    $normalizedRatingsScore = min($normalizedRatingsScore, 1); // Cap at 1 
    
    // Weighted scores
    $weightedGwaScore = $normalizedGwaScore * $gwaWeight;
    $weightedRatingsScore = $normalizedRatingsScore * $ratingsWeight; // Updated variable name
    

    // Total weighted score
    $totalWeightedScore = $weightedGwaScore + $weightedRatingsScore; // Updated variable name

    // Convert the score to a percentage and round to 2 decimal places
    $acceptanceChance = round($totalWeightedScore * 100, 2);

    return $acceptanceChance;
}

public function addFunds($amount, $donors, $date){

    // prepare insert statement for employee table
     $sql = "INSERT INTO admin_funds (amount, donors, date_added)
        VALUES (?,?,?);";

     // prepared statement
    $stmt = $this->database->getConnection()->prepare($sql);

    //if execution fail
    if (!$stmt->execute([$amount, $donors, $date])) {
        header("Location: ../Pages-admin/admin-funds.php?status=error");
        exit();
    }

    $stmtTotalAmount = $this->database->getConnection()->prepare("SELECT total_funds FROM totalFunds");

         //if execution fail
        if (!$stmtTotalAmount->execute()) {
            header("Location: ../Pages-admin/admin-funds.php?status=error");
            exit();
        }
        //fetch the employeeID
    $totalFunds = $stmtTotalAmount->fetchColumn();

    $updateTotalAmount = $totalFunds + $amount;


    $sql1 = "UPDATE totalFunds SET total_funds = ?, last_date_added = ? WHERE id = 1";
     // prepared statement
    $stmt1 = $this->database->getConnection()->prepare($sql1);


    if (!$stmt1->execute([$updateTotalAmount, $this->date])) {
        header("Location: ../Pages-admin/admin-funds.php?status=error");
        exit();
    }


    header("Location: ../Pages-admin/admin-funds.php?status=success");

}
public function getRemarks($id){
    if (!$id) {
        return false;
    }
    $stmt = $this->database->getConnection()->prepare("SELECT remarks FROM admin_remarks WHERE scholar_id=?");
    if (!$stmt) {
        return false;
    }
    if (!$stmt->execute([$id])) {
        return false;
    }
    $result = [];
    while ($row = $stmt->fetch()) {
        $result[] = $row;
    }
    return $result ? $result : false;
}

public function getDonorsFunds(){
    $stmt = $this->database->getConnection()->query("SELECT * FROM admin_funds")->fetchAll();
    return $stmt;
    exit();
}
public function setSchedule($scholar_id, $date, $time_start, $time_end, $venue){

    // prepare insert statement for employee table
     $sql = "INSERT INTO admin_schedule (scholar_id, date, time_start, time_end, venue) VALUES (?,?,?,?,?)";

     // prepared statement
    $stmt = $this->database->getConnection()->prepare($sql);

    //if execution fail
    if (!$stmt->execute([$scholar_id, $date, $time_start, $time_end, $venue])) {
        header("Location: ../Pages-admin/admin-funds.php?status=error");
        exit();
    }
    header("Location: ../Pages-admin/admin-funds.php?status=success");

}
public function getSchedule(){
    $stmt = $this->database->getConnection()->query("SELECT * FROM admin_schedule")->fetchAll();
    return $stmt;
    exit();
}
public function getScheduleById($id){
    // prepare the SQL statement using the database property
    $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_schedule WHERE scholar_id=?");

    //if execution fail
   if (!$stmt->execute([$id])) {
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
public function giveRate($id, $rate) {
    // Update personal information in scholars_info table
    $stmt = $this->database->getConnection()->prepare("UPDATE admin_schedule SET rate = ? WHERE id = ?");
    $stmt->execute([$rate, $id]);

}
}