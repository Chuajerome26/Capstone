<?php
include '../email-design/setupSuperAdmin-design.php';//Sa email design to ya.
include '../email-design/setupAdmin-design.php';//Sa email design to ya.
class Admin
{
    private $database;
    private $date;

    public function __construct($database) {
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date =  date('Y-m-d H:i:s');
    }
    public function deleteApplicantInterview($id){
        $stmt = $this->database->getConnection()->prepare("DELETE FROM admin_schedule_interview WHERE id=?");

         //if execution fail
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/schedule-task.php?error=stmtfail");
            exit();
        }

        //fetch the result
        $result = $stmt->fetch();
        
          //if has result return it, else return false
        if ($result) {
            return true;
        } else {
            $result = false;
            return $result;
        }
    }
    public function checkIfApplicant($id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE id=? AND status=0");

         //if execution fail
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/schedule-task.php?error=stmtfail");
            exit();
        }

        //fetch the result
        $result = $stmt->fetch();
        
          //if has result return it, else return false
        if ($result) {
            return true;
        } else {
            $result = false;
            return $result;
        }
    }
    public function updateNotif1($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET notif_send = ? WHERE id =?");
       //if execution fail
        $stmt->execute([1, $id]);
    }
    public function updateNotif2($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET notif_send = ? WHERE id =?");
       //if execution fail
        $stmt->execute([2, $id]);
    }
    public function updateNotif0($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET notif_send = ? WHERE id =?");
       //if execution fail
        $stmt->execute([0, $id]);
    }
    function getInitialInterviews(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM admin_schedule_interview WHERE i_f_interview = 0 AND status = 0")->fetchAll();

        if ($stmt === null || empty($stmt)) {
            return array(
                "hasData" => false,
                "data" => array()
            );
        }
    
        return array(
            "hasData" => true,
            "data" => $stmt
        );
    }
    function getInterviews($id){
        $stmt = $this->database->getConnection()->query("SELECT * FROM admin_schedule_interview WHERE i_f_interview = 0 AND status = 0 AND scholar_id = ".$id."")->fetchAll();

        if ($stmt === null || empty($stmt)) {
            return array(
                "hasData" => false,
                "data" => array()
            );
        }
    
        return array(
            "hasData" => true,
            "data" => $stmt
        );
    }
    function getFinalInterviews(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM admin_schedule_interview WHERE i_f_interview = 1 AND status = 0")->fetchAll();

        if ($stmt === null || empty($stmt)) {
            return array(
                "hasData" => false,
                "data" => array()
            );
        }
    
        return array(
            "hasData" => true,
            "data" => $stmt
        );
    }
    public function insertDateWithCheck($date) {
        while (true) {
            // Prepare the SQL query to count the number of rows for the given date
            $stmt = $this->database->getConnection()->prepare("SELECT COUNT(*) FROM admin_schedule_interview WHERE date = :date");
            $stmt->execute([':date' => $date]);
            $count = $stmt->fetchColumn();
    
            // Check if the count is less than 10
            if ($count < 10) {
                // If the count is less than 10, return the current date
                return $date;
            } else {
                // If the count is 10, add one day to the date and check again
                $date = date('Y-m-d', strtotime($date . ' +1 days'));
            }
        }
    }
    public function selectAndInsertSchedules($scholarData, $start, $end, $excludeStart, $excludeEnd, $appointmentDuration, $maxSchedules, $date) {
        $startTime = strtotime($start);
        $endTime = strtotime($end);
        $excludeStartTime = strtotime($excludeStart);
        $excludeEndTime = strtotime($excludeEnd);
        $formattedDate = $this->insertDateWithCheck($date);
    
        $insertedSchedules = [];
    
        while ($startTime < $endTime && count($insertedSchedules) < $maxSchedules) {
            if ($startTime >= $excludeStartTime && $startTime < $excludeEndTime) {
                // Skip the excluded time range
                $startTime = $excludeEndTime;
            }
    
            $endTimeSlot = strtotime("+$appointmentDuration minutes", $startTime);
    
            // Check if the end time of the slot is beyond the end time of the schedule
            if ($endTimeSlot > $endTime) {
                break;
            }
    
            // Check if the schedule already exists in the database
            $sql = "SELECT COUNT(*) FROM admin_schedule_interview WHERE date = :date AND time_start = :start AND time_end = :end";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([':date' => $formattedDate, ':start' => date('H:i', $startTime), ':end' => date('H:i', $endTimeSlot)]);
            $count = $stmt->fetchColumn();

            if($count == 0){
                // The schedule doesn't exist in the database, insert it
                $sql = "INSERT INTO admin_schedule_interview (scholar_id, date, mode_interview, i_f_interview, time_start, time_end) VALUES (:id, :date, :mode, :type, :start, :end)";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->execute([':id' => $scholarData['scholar_id'],':date' => $formattedDate,'mode' => 'Online Interview','type' => $scholarData['type'],':start' => date('H:i', $startTime), ':end' => date('H:i', $endTimeSlot)]);
    
                // Add the inserted schedule to the array
                $insertedSchedules[] = [
                    'date' => $formattedDate,
                    'start' => date('H:i', $startTime),
                    'end' => date('H:i', $endTimeSlot)
                ];
            }
    
            $startTime = $endTimeSlot;
        }
    
        return $insertedSchedules;
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
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_info 
                                                        WHERE status = '1'")->fetchAll();
        return $stmt;
        exit();
    }
    public function getAdmins(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM admin_info")->fetchAll();
        return $stmt;
        exit();
    }
    public function checkAdmin(){
        $stmt = $this->database->getConnection()->prepare("SELECT COUNT(*) as count FROM admin_info");

       //if execution fail
      if (!$stmt->execute()) {
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
        $stmt = $this->database->getConnection()->query("SELECT date_apply, COUNT(*) AS applicant_count
        FROM scholar_info
        GROUP BY date_apply")->fetchAll();

        return $stmt;
        exit();
    }
    public function getApplicants(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_info
                                                        WHERE status = '0'")->fetchAll();
        return $stmt;
        exit();
    }
    public function getGrade($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT ROUND(AVG(grade), 2) as average FROM scholar_grade WHERE scholar_id = ?");

        if (!$stmt->execute([$scholar_id])) {
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
    public function getAllGrade($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_grade WHERE scholar_id = ?");

        if (!$stmt->execute([$scholar_id])) {
            header("Location: ../newdesign/admin-application.php?error=stmtfail");
            exit();
        }
        //fetch the result
        $result = $stmt->fetchAll();
    
        return $result;
        
    }
    public function getAllChoice($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_college_choices WHERE scholar_id = ?");

        if (!$stmt->execute([$scholar_id])) {
            header("Location: ../newdesign/admin-application.php?error=stmtfail");
            exit();
        }
        //fetch the result
        $result = $stmt->fetchAll();
        
        return $result;

    }
    public function getAllSibling($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_siblings WHERE scholar_id = ?");

        if (!$stmt->execute([$scholar_id])) {
            header("Location: ../newdesign/admin-application.php?error=stmtfail");
            exit();
        }
        //fetch the result
        $result = $stmt->fetchAll();
        
        return $result;

    }
    public function getApplicants2x2($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_file WHERE scholar_id=? AND requirement_name = 'IdPhoto'");

       //if execution fail
    if (!$stmt->execute([$scholar_id])) {
        header("Location: ../newdesign/admin-application.php?error=stmtfail");
        exit();
    }
      //fetch the result
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getApplicantsFiles($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_file WHERE scholar_id=?");

       //if execution fail
      if (!$stmt->execute([$scholar_id])) {
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
    public function getApplicantsFilesCorrect($scholar_id){
        $stmt = $this->database->getConnection()->prepare("SELECT COUNT(*) as count FROM scholar_file WHERE scholar_id=? AND status = 1");

       //if execution fail
      if (!$stmt->execute([$scholar_id])) {
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
    public function getApplicantById($id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info 
                                                        WHERE status = '0' AND id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function getScholarById($id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info 
                                                        WHERE status = '1' AND id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function scholarInfo($id){
        
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info
                                                   WHERE id=?");

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
    public function adminInfo($id){
        
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_info
                                                   WHERE id=?");

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
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE status = 1 AND id=?");

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
  public function updateFilesRemarks($scholar_id, $status, $arrayNames) {
    // Check if the sizes of $status and $arrayNames arrays are the same
    if (count($status) !== count($arrayNames)) {
        // Handle error, such as array size mismatch
        error_log("Array sizes mismatch: Status count = " . count($status) . ", ArrayNames count = " . count($arrayNames));
        header("Location: ../newdesign/admin-application.php?error=array_size_mismatch");
        exit();
    }

    // Iterate through each name and its corresponding status
    foreach ($arrayNames as $name) {
        // Check if the name exists as a key in the $status array
        if (array_key_exists($name, $status)) {
            $statusValue = $status[$name];
            $stmt = $this->database->getConnection()->prepare("UPDATE scholar_file SET status = ? WHERE scholar_id = ? AND requirement_name = ?");

            // Bind parameters and execute the statement
            $stmt->execute([$statusValue, $scholar_id, $name]);
            // Close the statement
        } else {
            // Log the error for debugging
            error_log("Undefined array key: $name in status array.");
            // Handle the error as needed
        }
    }
}

public function updateScholarFiles($id) {
    foreach ($_FILES as $columnName => $file) {
        // Check if a new file is uploaded
        if ($file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "../Scholar_files/";
            $newFileName = $id . " - " . basename($file['name']);
            $uploadFilePath = $uploadDir . $newFileName;

            // Move the uploaded file to the destination
            move_uploaded_file($file['tmp_name'], $uploadFilePath);

            // Update the database with the new file name
            $stmt = $this->database->getConnection()->prepare("UPDATE scholar_file SET file_name = ? WHERE scholar_id = ? AND requirement_name = ?");
            $stmt->execute([$newFileName, $id, $columnName]);
        }
    }
}


public function acceptScholar($id){
        // prepared statement
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET status = ? WHERE id = ?");

       //if execution fail
       if (!$stmt->execute([1,$id])) {
           header("Location: ../newdesign/admin-application.php?error=stmtfail");

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

public function predictAcceptanceOfApplicant($gwa, $monthlyIncome) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    if ($gwa >= 75 && $gwa <= 100) {
        $grade = $this->convertToDecimalFivePointScale($gwa);
    }else{
        $grade = $gwa;
    }

    $maxGwa = 5.0; 
    $minGwa = 1.0;  // Hypothetical maximum attendance hours for full weight
    $maxIncome = 100000  ; // Updated maximum monthly income

    // Weights for each factor
    $gwaWeight = 0.60; // Adjusted weight for GWA
    $incomeWeight = 0.40; // Weight for monthly income

    // Normalize scores
    // Higher GWA (closer to 5) results in a lower score, and vice versa
    $normalizedGwaScore = ($maxGwa - $grade) / ($maxGwa - $minGwa); //5 - 1 / 5 - 1

    // Adjust monthly income to be within a range that affects acceptance chance
    $monthlyIncome = max(0, min($monthlyIncome, $maxIncome)); // Ensure monthly income is between 0 and $maxIncome

    // Higher income (closer to 0) results in a lower score
    $normalizedIncomeScore = ($maxIncome - $monthlyIncome) / $maxIncome;

    // Weighted scores
    $weightedGwaScore = $normalizedGwaScore * $gwaWeight;
    $weightedIncomeScore = $normalizedIncomeScore * $incomeWeight; // Weighted score for monthly income

    // Total weighted score
    $totalWeightedScore = $weightedGwaScore + $weightedIncomeScore; // Updated variable name

    // Convert the score to a percentage and round to 2 decimal places
    $acceptanceChance = round($totalWeightedScore * 100, 2);

    return $acceptanceChance;
}

// public function addFunds($amount, $donors, $date){

//     // prepare insert statement for employee table
//      $sql = "INSERT INTO admin_funds (amount, donors, date_added)
//         VALUES (?,?,?);";

//      // prepared statement
//     $stmt = $this->database->getConnection()->prepare($sql);

//     //if execution fail
//     if (!$stmt->execute([$amount, $donors, $date])) {
//         header("Location: ../newdesign/admin-funds.php?status=error");
//         exit();
//     }

//     $stmtTotalAmount = $this->database->getConnection()->prepare("SELECT total_funds FROM totalFunds");

//          //if execution fail
//         if (!$stmtTotalAmount->execute()) {
//             header("Location: ../newdesign/admin-funds.php?status=error");
//             exit();
//         }
//         //fetch the employeeID
//     $totalFunds = $stmtTotalAmount->fetchColumn();

//     $updateTotalAmount = $totalFunds + $amount;


//     $sql1 = "UPDATE totalFunds SET total_funds = ?, last_date_added = ? WHERE id = 1";
//      // prepared statement
//     $stmt1 = $this->database->getConnection()->prepare($sql1);


//     if (!$stmt1->execute([$updateTotalAmount, $this->date])) {
//         header("Location: ../newdesign/admin-funds.php?status=error");
//         exit();
//     }


//     header("Location: ../newdesign/admin-funds.php?status=success");
//     exit();

// }
public function getRemarks($id){

    $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_remarks WHERE scholar_id=?");

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

public function findAdminByEmail($email){
    // prepare the SQL statement using the database property
  $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_info WHERE email=?");

   //if execution fail
  if (!$stmt->execute([$email])) {
      header("Location: ../newdesign/admin-account.php?scholar=emailExist");
      exit();
  }

  //fetch the result
  $result = $stmt->fetch();
  
    //if has result true, else return false
  if ($result) {
      return true;
  } else {
      return false;
  }

}
public function addAdminAccount($first_name, $last_name, $email, $token){

    // prepare insert statement for employee table
    $date = date('Y-m-d');
    $sql = "INSERT INTO admin_info (f_name, l_name, email, token, date) VALUES (?,?,?,?,?)";

     // prepared statement
    $stmt = $this->database->getConnection()->prepare($sql);

    //if execution fail
    if (!$stmt->execute([$first_name, $last_name, $email, $token, $date])) {
        header("Location: ../newdesign/admin-application.php?status=error");
        exit();
    }
    return true;
}
public function setUpSuperAdmin($fname, $lname, $email, $fileName, $pass, $type){

    $sql = "INSERT INTO admin_info (f_name,l_name,email,pic,date) VALUES (?,?,?,?,NOW());";
    $stmt1 = $stmt = $this->database->getConnection()->prepare($sql);

    $hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
        //if execution fail
    if (!$stmt->execute([$fname, $lname, $email, $fileName])) {
        header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
        exit();
    }
    
    $stmtScholarID = $this->database->getConnection()->prepare("SELECT id FROM admin_info WHERE email=?");

        //if execution fail
    if (!$stmtScholarID->execute([$email])) {
        header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
        exit();
    }
    //fetch the employeeID
    $adminId = $stmtScholarID->fetchColumn();


    $hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $this->database->getConnection()->prepare("UPDATE login SET user = ?, pass = ?, admin_id = ? WHERE user_type = ?");

    if (!$stmt->execute([$email, $hashedpwd, $adminId,$type])) {
        header("Location: ../index.php?status=error");
        exit();
    }
    $emailBody = superAdminSetupEmail($email, $pass);
    //send email employee his/her id and password 
    $this->database->sendEmail($email,"Your Set Up for your Account has been done!", $emailBody);
}

public function setUpAdminPass($id ,$username, $pass, $pic, $token, $email){

    $stmt = $this->database->getConnection()->prepare("UPDATE admin_info SET pic = ? WHERE token = ?");

    if (!$stmt->execute([$pic, $token])) {
        header("Location: ../index.php?status=error");
        exit();
    }

    $sql = "INSERT INTO login (user,pass,admin_id,user_type) VALUES (?,?,?,?);";
    $stmt1 = $stmt = $this->database->getConnection()->prepare($sql);

    $hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
        //if execution fail
    if (!$stmt->execute([$username, $hashedpwd, $id, 2])) {
        header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
        exit();
    }
    $emailBody = AdminSetupEmail($username, $pass);
    //send email employee his/her id and password 
    $this->database->sendEmail($email,"Your Set Up for your Account has been done!", $emailBody);
}

public function findAdminByToken($token){

        
    // prepare the SQL statement using the database property
  $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_info WHERE token = ?");

   //if execution fail
  if (!$stmt->execute([$token])) {
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

public function addRemarks($scholar_id, $admin_id, $remarks, $remarks_mess, $date){

    // prepare insert statement for employee table
     $sql = "INSERT INTO admin_remarks (scholar_id, admin_id, remarks, remarks_mess, date) VALUES (?,?,?,?,?)";

     // prepared statement
    $stmt = $this->database->getConnection()->prepare($sql);

    //if execution fail
    if (!$stmt->execute([$scholar_id, $admin_id, $remarks, $remarks_mess, $date])) {
        header("Location: ../newdesign/admin-application.php?status=error");
        exit();
    }
}

// public function getDonorsFunds(){
//     $stmt = $this->database->getConnection()->query("SELECT * FROM admin_funds")->fetchAll();
//     return $stmt;
//     exit();
// }
public function getSchedule(){
    $stmt = $this->database->getConnection()->query("SELECT * FROM admin_schedule_interview")->fetchAll();
    return $stmt;
    exit();
}
public function getScheduleById($id){
    // prepare the SQL statement using the database property
    $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_schedule_interview WHERE scholar_id=?");

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
public function getAnnouncements(){
    $stmt = $this->database->getConnection()->query("SELECT * FROM admin_announcement ORDER BY ann_date DESC, ann_time DESC")->fetchAll();
    return $stmt;
}
public function postAnnouncement($admin_id, $announcement) {
    $sql = "INSERT INTO admin_announcement (admin_id, announcement, ann_date, ann_time) VALUES (?,?, CURDATE(), CURTIME())";

    // prepared statement
    $stmt = $this->database->getConnection()->prepare($sql);

    // Execute the statement
    if ($stmt->execute([$admin_id, $announcement])) {
        return true;
    } else {
        return false;
    }
}
public function gradeInterviewInitial($id, $totalGrade){
    $stmt = $this->database->getConnection()->prepare("UPDATE admin_schedule_interview SET grade = ?, status = 1 WHERE id =?");

    if ($stmt->execute([$totalGrade, $id])) {
        return true;
    } else {
        return false;
    }
}
public function editInitialInterview($date, $newDate, $mode, $additional){
    $stmt = $this->database->getConnection()->prepare("UPDATE admin_schedule_interview SET date = ?, mode_interview = ?, venue = ? WHERE date = ? AND i_f_interview = 0");

    if ($stmt->execute([$newDate, $mode, $additional, $date])) {
        return true;
    } else {
        return false;
    }
}
public function editFinalInterview($date, $newDate){
    $stmt = $this->database->getConnection()->prepare("UPDATE admin_schedule_interview SET date = ? WHERE date = ? AND i_f_interview = 1");

    if ($stmt->execute([$newDate, $date])) {
        return true;
    } else {
        return false;
    }
}
public function getAllDates(){
    $stmt = $this->database->getConnection()->query("SELECT date FROM admin_schedule_interview")->fetchAll();
    
    return $stmt;
}
public function getInterviewsByDate($date){
    $stmt = $this->database->getConnection()->prepare("SELECT * FROM admin_schedule_interview WHERE date = ?");

    if (!$stmt->execute([$date])) {
        header("Location: ../newdesign/schedule-task.php?error=stmtfail");
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
public function updateFamTemp($files) {
        // Check if a new file is uploaded
        if ($files['fileError'] === UPLOAD_ERR_OK) {
            $newFileName = uniqid('', true) . " - " . basename($files['fileName1']);

            $fileDestination1 = '../Uploads_gslip/' . $newFileName;
            // Move the uploaded file to the destination
            move_uploaded_file($files['fileTmpName1'], $fileDestination1);

            // Update the database with the new file name
            $stmt = $this->database->getConnection()->prepare("UPDATE applicant_temp SET fam_temp = ? WHERE id = 1");
            $stmt->execute([$newFileName]);
        }
}
public function getFamTemp()
{
    $stmt = $this->database->getConnection()->query("SELECT * FROM applicant_temp")->fetchAll();
    return $stmt;
}
public function getAdminlogs()
{
    $stmt = $this->database->getConnection()->query("SELECT id, scholar_id, admin_id, remarks, date FROM admin_remarks")->fetchAll();
    return $stmt;
}
public function getRenewal()
{
    $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew")->fetchAll();
    return $stmt;
}
public function getApplicantsCountToday(){
    $today = date('Y-m-d');
    $stmt = $this->database->getConnection()->prepare('SELECT COUNT(*) FROM scholar_info WHERE date_apply = ?');

    $stmt->execute([$today]);
    $info = $stmt->fetchColumn();

    if($info < 15){
        return true;
    }else{
        return false;
    }
}
public function getRenewalById($id)
{
    $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew WHERE scholarID = '$id'")->fetchAll();
    return $stmt;
}
public function getRenewalCount() {
    $renewal = $this->getRenewal();
    return count($renewal);
}
public function getNoneCompliantInfo()
{
    $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew WHERE renew_status = 4")->fetchAll();
    return $stmt;
}
public function getInterviewCountForToday() {
    $stmt = $this->database->getConnection()->query("SELECT COUNT(*) FROM admin_schedule_interview WHERE date = CURDATE()")->fetchColumn();
    return $stmt;
}

public function getCurrentAppState() {
    $query = "SELECT state FROM application_form_state WHERE id = 1";
    $stmt = $this->database->getConnection()->query($query);

    if ($stmt) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } else {
        // Handle the error, you might want to log or return an appropriate value
        return false;
    }
}

public function selectAndInsertSchedulesforFinal($scholarData, $start, $end, $excludeStart, $excludeEnd, $appointmentDuration, $maxSchedules, $date) {
    $startTime = strtotime($start);
    $endTime = strtotime($end);
    $excludeStartTime = strtotime($excludeStart);
    $excludeEndTime = strtotime($excludeEnd);
    $formattedDate = $this->insertDateWithCheck($date);

    $insertedSchedules = [];

    while ($startTime < $endTime && count($insertedSchedules) < $maxSchedules) {
        if ($startTime >= $excludeStartTime && $startTime < $excludeEndTime) {
            // Skip the excluded time range
            $startTime = $excludeEndTime;
        }

        $endTimeSlot = strtotime("+$appointmentDuration minutes", $startTime);

        // Check if the end time of the slot is beyond the end time of the schedule
        if ($endTimeSlot > $endTime) {
            break;
        }

        // Check if the schedule already exists in the database
        $sql = "SELECT COUNT(*) FROM admin_schedule_interview WHERE date = :date AND time_start = :start AND time_end = :end";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->execute([':date' => $formattedDate, ':start' => date('H:i', $startTime), ':end' => date('H:i', $endTimeSlot)]);
        $count = $stmt->fetchColumn();

        if($count == 0){
            // The schedule doesn't exist in the database, insert it
            $sql = "INSERT INTO admin_schedule_interview (scholar_id, date, mode_interview, i_f_interview, time_start, time_end) VALUES (:id, :date, :mode,:type, :start, :end)";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([':id' => $scholarData['scholar_id'],':date' => $formattedDate,'mode' => 'Onsite Interview','type' => $scholarData['type'],':start' => date('H:i', $startTime), ':end' => date('H:i', $endTimeSlot)]);

            // Add the inserted schedule to the array
            $insertedSchedules[] = [
                'date' => $formattedDate,
                'start' => date('H:i', $startTime),
                'end' => date('H:i', $endTimeSlot)
            ];
        }

        $startTime = $endTimeSlot;
    }

    return $insertedSchedules;
}

}