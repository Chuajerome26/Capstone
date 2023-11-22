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

function predictAcceptanceOfApplicant($gwa, $numDocumentsSubmitted) {
    // Assuming 1 is the highest GWA and 5 is the lowest
    $maxGwa = 5.0; 
    $minGwa = 1.0; 
    $maxAttendanceHours = 100; // Hypothetical maximum attendance hours for full weight
    $totalRequiredDocuments = 5; // Total number of required documents

    // Weights for each factor
    $gwaWeight = 0.40;
    $documentWeight = 0.60;

    // Normalize scores
    // Higher GWA (closer to 5) results in a lower score, and vice versa
    $normalizedGwaScore = ($maxGwa - $gwa) / ($maxGwa - $minGwa); //5 - 1 / 5 - 1
    $normalizedDocumentScore = $numDocumentsSubmitted / $totalRequiredDocuments; //5 / 5
    $normalizedDocumentScore = min($normalizedDocumentScore, 1); // Cap at 1 
    
    // Weighted scores
    $weightedGwaScore = $normalizedGwaScore * $gwaWeight;
    $weightedDocumentScore = $normalizedDocumentScore * $documentWeight;
    

    // Total weighted score
    $totalWeightedScore = $weightedGwaScore + $weightedDocumentScore;

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
public function editApplicants($id, $f_name, $l_name, $mobile_num, $email, $total_sub, $total_units, $gwa) {
    // Update personal information in scholars_info table
    $stmt = $this->database->getConnection()->prepare("UPDATE scholars_info SET f_name = ?, l_name = ?, mobile_num = ?, email = ?, total_sub = ?, total_units = ?, gwa = ? WHERE id = ?");
    $stmt->execute([$f_name, $l_name, $mobile_num, $email, $total_sub, $total_units, $gwa, $id]);

    // Handle document uploads in scholar_files table
    $this->handleDocumentUpload($id, 'pic', 'id_pic', 'scholar_files');
    $this->handleDocumentUpload($id, 'cog', 'copy_grades','scholar_files');
    $this->handleDocumentUpload($id, 'psa', 'psa','scholar_files');
    $this->handleDocumentUpload($id, 'gm', 'good_moral','scholar_files');
    $this->handleDocumentUpload($id, 'e_f', 'e_Form','scholar_files');
}

private function handleDocumentUpload($id, $folder, $columnName, $tableName) {
    // Check if a new file is uploaded
    if (isset($_FILES[$columnName]) && $_FILES[$columnName]['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../Uploads_{$folder}/";
        $newFileName = $id ." - " . basename($_FILES[$columnName]['name']);
        $uploadFilePath = $uploadDir . $newFileName;

        // Move the uploaded file to the destination
        move_uploaded_file($_FILES[$columnName]['tmp_name'], $uploadFilePath);

        // Update the database with the new file name
        $stmt = $this->database->getConnection()->prepare("UPDATE $tableName SET $columnName = ? WHERE scholar_id = ?");
        $stmt->execute([$newFileName, $id]);
    }
}
public function getRemarks($id){
    // prepare the SQL statement using the database property
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
public function getDonorsFunds(){
    $stmt = $this->database->getConnection()->query("SELECT * FROM admin_funds")->fetchAll();
    return $stmt;
    exit();
}

}