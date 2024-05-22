<?php
include '../email-design/scholarlogin-design.php';//Sa email design to ya.
include '../email-design/scholar-apply-design.php';
class Scholar{

    private $database;
    private $date;

    public function __construct(Database $database) {
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date =  date('Y-m-d H:i:s');
    }
    public function findById($id){
            // prepare the SQL statement using the database property
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE scholar_id=? AND status = 1");

        //if execution fail
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/renewal.php?scholar=error");
            exit();
        }

        //fetch the result
        $result = $stmt->fetch();
        
            //if has result true, else return false
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function findByEmailLogin($email){
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM login WHERE user=?");

       //if execution fail
      if (!$stmt->execute([$email])) {
          header("Location: ../Pages-scholar/form.php?scholar=emailExist");
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
    public function findByEmail($email){
          // prepare the SQL statement using the database property
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE email=?");

         //if execution fail
        if (!$stmt->execute([$email])) {
            header("Location: ../Pages-scholar/form.php?scholar=emailExist");
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
    public function findByEmail1($email){
        // prepare the SQL statement using the database property
      $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE email=?");

       //if execution fail
      if (!$stmt->execute([$email])) {
          header("Location: ../Pages-scholar/form.php?scholar=emailExist");
          exit();
      }

      //fetch the result
      $result = $stmt->fetch();
      
        //if has result true, else return false
      if ($result) {
          return $result;
      } else {
          return false;
      }

  }

  public function checkData($filesAndPicture, $scholarData, $studentType) {
    $stmt = $this->database->getConnection()->query("SELECT * FROM customizable_form_file");

    if (!$stmt->execute()) {
        header("Location: ../newdesign/admin-application.php?error=stmtfail");
        exit();
    }

    $result = $stmt->fetchAll();

    $arrayFiles = array();
    $status = false;

    // Move main file
    $fileNameNew = uniqid('', true) . "." . $filesAndPicture['fileActualExt'];
    $fileDestination = '../Scholar_files/' . $fileNameNew;
    $arrayFiles[] = $fileNameNew;

    if (isset($filesAndPicture['fileNameA']) && $filesAndPicture['fileNameA'] !== '') {
        $fileNameNewA = uniqid('', true) . "." . $filesAndPicture['fileActualExtA'];
        $fileDestinationA = '../Scholar_files/' . $fileNameNewA;
        $arrayFiles[] = $fileNameNewA;
        $status = true;
    }

    if (move_uploaded_file($filesAndPicture['fileTmpName'], $fileDestination) &&
        isset($fileDestinationA) ? move_uploaded_file($filesAndPicture['fileTmpNameA'], $fileDestinationA) : true) {
            foreach ($result as $file) {
                $fileKey = 'fileData' . $file['id'];
        
                $newFileName = explode('.', $filesAndPicture[$fileKey]['fileName']);
                $fileNameNew = uniqid('', true) . "." . $filesAndPicture['fileActualExt'.$file['id']];
                $fileDestination = '../Scholar_files/' . $fileNameNew;
        
                $arrayFiles[] = $fileNameNew;
        
                if (!move_uploaded_file($filesAndPicture[$fileKey]['fileTmpName'], $fileDestination)) {
                    echo "move_uploaded_file error";
                }
            }

        $this->registerEmployee($scholarData, $arrayFiles, $status);
    } else {
        echo "move_uploaded_file error";
    }
}


    public function insertInterview($scholarData){
        $sql = "INSERT INTO admin_schedule (scholar_id, interview_schedule, mode_interview, i_f_interview, status, venue, time_start, time_end, grade) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = $this->database->getConnection()->prepare($sql);

        if(!$stmt->execute([
            $scholarData['scholar_id'],
            $scholarData['interview_schedule'],
            $scholarData['mode_interview'],
            $scholarData['i_f_interview'],
            $scholarData['status'],
        ])){

        }
    }
    function convertToDecimal($grade) {
        if ($grade >= 95 && $grade <= 99) {
            return 1;
        } elseif ($grade >= 90 && $grade <= 95) {
            return 2;
        } elseif ($grade >= 85 && $grade <= 90) {
            return 2.5;
        } elseif ($grade >= 80 && $grade <= 85) {
            return 3;
        } elseif ($grade >= 75 && $grade <= 80) {
            return 3.5;
        } elseif ($grade >= 70 && $grade <= 75) {
            return 4;
        } elseif ($grade >= 65 && $grade <= 70) {
            return 4.5;
        } else {
            return 5;
        }
    }

    public function registerEmployee($scholarData, $scholarFiles, $status123){

        $stmt1234 = $this->database->getConnection()->query("SELECT * FROM customizable_form_file");

            if (!$stmt1234->execute()) {
                header("Location: ../newdesign/admin-application.php?error=stmtfail");
                exit();
            }
        $result123 = $stmt1234->fetchAll();

        $stmtScholarID = $this->database->getConnection()->prepare("SELECT id FROM login WHERE user=?");

            //if execution fail
        if (!$stmtScholarID->execute([$scholarData['email']])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
            exit();
        }
        //fetch the employeeID
        $scholarId = $stmtScholarID->fetchColumn();

        //query for new GWA
        $stmtScholarshipTypes = $this->database->getConnection()->prepare("SELECT * FROM customize_gwa");

            if (!$stmtScholarshipTypes->execute()) {
                header("Location: ../newdesign/customize-gwa.php?error=stmtfail");
                exit();
            }
        $scholarshipTypes = $stmtScholarshipTypes->fetchAll(PDO::FETCH_ASSOC);

        // prepare insert statement for employee table 38
        $sql = "INSERT INTO scholar_info 
        (scholar_id, f_name, m_name, l_name, suffix, gender, c_status, date_of_birth, b_place, height, weight, religion, mobile_number, gcash_number, email, present_address, 
        permanent_address, med_condition, fb_link, father_name, father_attain, father_occupation, mother_name, mother_attain, mother_occupation, guardian, emergency_contact, guardian_rs, numSiblings, 
        sh_school, date_grad, sh_ave, sh_achievements, sh_course, c_school, c_ave, c_course, cschool_years, studType, scholar_type, date_apply) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

            // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        // Define the scholar type based on studType and corresponding average
        foreach ($scholarshipTypes as $isko) {
            if ($scholarData['studType'] == 'Senior High Graduate') {
                // Check if the user's input grade is a whole number
                if ($scholarData['shAve'] == intval($scholarData['shAve'])) {
                    // Convert user input grade to decimal equivalent
                    $shAveDecimal = $this->convertToDecimal($scholarData['shAve']);
                    if (($shAveDecimal >= $isko['min_gwa'] && $shAveDecimal <= $isko['max_gwa'])) {
                        $scholar_type = $isko['scholar_type'];
                        break;
                    }
                } else {
                    // Use the user's input grade directly for comparison
                    if (($scholarData['shAve'] >= $isko['min_gwa'] && $scholarData['shAve'] <= $isko['max_gwa'])) {
                        $scholar_type = $isko['scholar_type'];
                        break;
                    }
                }
            } elseif ($scholarData['studType'] == 'College') {
                // Use the user's input grade directly for comparison
                if (($scholarData['cAve'] >= $isko['min_gwa'] && $scholarData['cAve'] <= $isko['max_gwa'])) {
                    $scholar_type = $isko['scholar_type'];
                    break;
                }
            }
        }
        // If no matching scholarship type is found, set default scholar type
        if (!isset($scholar_type)) {
            $scholar_type = "Not Qualified";
        }
        //if execution fail
        if (!$stmt->execute([$scholarId, 
                            $scholarData['fName'],
                            $scholarData['mName'],
                            $scholarData['lName'],
                            $scholarData['suffix'],
                            $scholarData['gender'],
                            $scholarData['cStatus'],
                            $scholarData['dofBirth'],
                            $scholarData['bPlace'],
                            $scholarData['height'],
                            $scholarData['weight'],

                            $scholarData['religion'],
                            $scholarData['mNumber'],
                            $scholarData['gNumber'],
                            $scholarData['email'],
                            $scholarData['present_address'],
                            $scholarData['permanent_address'],
                            $scholarData['mCondition'],
                            $scholarData['fb_link'],
                            $scholarData['fatherName'],
                            $scholarData['fAttain'],
                            $scholarData['fOccupation'],
                            
                            $scholarData['motherName'],
                            $scholarData['mAttain'],
                            $scholarData['motherOccupation'],
                            $scholarData['guardian'],
                            $scholarData['emergencyContact'],
                            $scholarData['relationship'],
                            $scholarData['numSiblings'],
                            $scholarData['shSchool'],
                            $scholarData['dateGrad'],
                            $scholarData['shAve'],

                            $scholarData['shAchievements'],
                            $scholarData['shCourse'],
                            $scholarData['cSchool'],
                            $scholarData['cAve'],
                            $scholarData['cCourse'],
                            $scholarData['schoYear'],
                            $scholarData['studType'],
                            $scholar_type,
                            $this->date])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");

            exit();
        }

        $arrayNames = array(($scholarData['studType'] == 'Senior High Graduate') ? 'Form137/138':'GradeSlip');
        if ($status123) {
            array_push($arrayNames, 'Honor');
        }
        

        for($i=0;$i < count($result123);$i++){
            $newName = str_replace(' ', '', $result123[$i]['name']);
            array_push($arrayNames, $newName);
        }


                for ($i = 0; $i < count($scholarFiles); $i++) {
                    $fileName = $scholarFiles[$i];
                    $name = $arrayNames[$i];
                    
                    // Prepare and bind the SQL statement
                    $stmt123 = $this->database->getConnection()->prepare("INSERT INTO scholar_file (scholar_id, requirement_name, file_name) VALUES (?, ?, ?)");

                    $stmt123->execute([$scholarId, $name, $fileName]);
                }
                //var_dump($scholarData['earnerName']);
                for ($i = 0; $i < count($scholarData['earnerName']); $i++) {
                    // Prepare an SQL statement
                    $stmt4 = $this->database->getConnection()->prepare("INSERT INTO scholar_earner (scholar_id, earner_name, earner_income, earner_occupation, earner_company) VALUES (?, ?, ?, ?, ?)");

                    // Bind parameters and execute the statement
                    $stmt4->execute([$scholarId ,$scholarData['earnerName'][$i], $scholarData['earnerIncome'][$i], $scholarData['earnerOccupation'][$i], $scholarData['comName'][$i]]);

                }
                // Loop through each set of additional scholar data and insert into the database
                // for ($i = 0; $i < count($scholarData['sName']); $i++) {
                //     // Prepare an SQL statement
                //     $stmt3 = $this->database->getConnection()->prepare("INSERT INTO scholar_siblings (scholar_id, name, age, occupation, civil_status, religion, educational_attained) VALUES (?, ?, ?, ?, ?, ?, ?)");

                //     // Bind parameters and execute the statement
                //     $stmt3->execute([$scholarId ,$scholarData['sName'][$i], $scholarData['sAge'][$i], $scholarData['sOccupation'][$i], $scholarData['sCstatus'][$i], $scholarData['sR'][$i], $scholarData['sEattained'][$i]]);

                // }

                // for ($i = 0; $i < count($scholarData['sub']); $i++) {
                //     // Prepare an SQL statement
                //     $stmt4 = $this->database->getConnection()->prepare("INSERT INTO scholar_grade (scholar_id, subject, unit, grade) VALUES (?, ?, ?, ?)");

                //     // Bind parameters and execute the statement
                //     $stmt4->execute([$scholarId ,$scholarData['sub'][$i], $scholarData['totalUnits'][$i], $scholarData['gAverage'][$i]]);
                // }

                // for ($i = 0; $i < count($scholarData['collegeChoice']); $i++) {
                //     // Prepare an SQL statement
                //     $stmt5 = $this->database->getConnection()->prepare("INSERT INTO scholar_college_choices (scholar_id, univ, course, entrance_exam, exam_taken) VALUES (?,?,?,?,?)");

                //     if($scholarData['entranceExam'][$i] == 'yes'){
                //         $exam_taken = $scholarData['ifYes'][$i];
                //     }else{
                //         $exam_taken = $scholarData['ifNo'][$i];
                //     }
                //     // Bind parameters and execute the statement
                //     $stmt5->execute([$scholarId ,$scholarData['collegeChoice'][$i], $scholarData['collegeCourse'][$i], $scholarData['entranceExam'][$i], $exam_taken]);
                // }
                        // $totalRows = $scholarData['rowCount'];
                        
                        // // Loop through each row
                        // for ($i = 0; $i <= $totalRows; $i++) {
                        //     $stmt5 = $this->database->getConnection()->prepare("INSERT INTO scholar_college_choices (scholar_id, univ, course, entrance_exam, exam_taken) VALUES (?,?,?,?,?)");

                        //     $schoolName = isset($scholarData['collegeChoice'][$i]) ? $scholarData['collegeChoice'][$i]:"";
                        //     $courseMajor = isset($scholarData['collegeCourse'][$i]) ? $scholarData['collegeCourse'][$i]:"";
                        //     $entranceExam = $scholarData['entranceExam'][$i];

                        //     if($scholarData['entranceExam'][$i] == 'yes'){
                        //         $exam_taken = $scholarData['ifYes'][$i];
                        //     }else{
                        //         $exam_taken = $scholarData['ifNo'][$i];
                        //     }

                        //     if($schoolName == '' && $courseMajor == '' && $entranceExam == '' && $exam_taken == ''){
                                
                        //     }else{
                        //         $stmt5->execute([$scholarId ,$schoolName, $courseMajor, $entranceExam, $exam_taken]);
                        //     }
                        // }


        // prepare insert statement for employee_details table
        // $sql2 = "INSERT INTO scholar_files (scholar_id, id_pic, copy_grades, psa, good_moral, e_Form) 
        //         VALUES (?,?,?,?,?,?);";

    
        //  // prepared statement
        // $stmt2 = $this->database->getConnection()->prepare($sql2);

        //  //if execution fail
        // if (!$stmt2->execute([$scholarId, $id_pic, $copy_grades, $psa, $good_moral, $eForm])) {
        //     header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
        //     //close connection
        //     unset($this->database);
        //     exit();
        // }

        
        //generate scholar account
        // $scholarUser = $this->generateEmployeeIDAndPassword($scholarData['lName']);
        // $fullName = str_replace(' ', '', $scholarData['fName']);
        // $scholarPass = $this->generateEmployeeIDAndPassword($fullName);
        // $this->saveScholarIDAndPassword($scholarUser[0], $scholarPass[0], $scholarId,0, $scholarData['email']);

        $messageApplied = ApplySuccess($scholar_type, $scholarData['fName']);
        // send email
        $this->database->sendEmail($scholarData['email'],"Scholarship Application Submitted Successfully!",$messageApplied);

        //if sucess uploading file, go to this 👇 page
             header("Location: ../Pages-Applicant/index123.php?scholar=success");
             exit();

    }

    public function attendanceList(){
        $attlist =  $this->database->getConnection()->query("SELECT * FROM attendance")->fetchAll();
        return $attlist;
        exit();
    }

    public function generateEmployeeIDAndPassword($scholarLastName){

        // Generate a random 4-digit number
        $randomNumber = rand(1000, 9999);
    
        // Convert the number to a string and concatenate lastname
        $scholarID = strval($randomNumber).strtoupper($scholarLastName);
    
        //return the id and password
        return [$scholarID];
    
        }
      public function saveScholarIDAndPassword($scholarUser, $scholarPass, $user_id, $user_type, $scholarEmail){
        // prepare insert statement for employee_login table
        $sql = "INSERT INTO login (user,pass,user_id,user_type) VALUES (?,?,?,?);";
    
         // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);
    
         //hash password
        $hashedpwd = password_hash($scholarPass, PASSWORD_DEFAULT);
         //if execution fail
        if (!$stmt->execute([$scholarUser, $hashedpwd, $user_id, $user_type])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
            exit();
            
        }
    $emailBody = scholarLoginEmail($scholarUser, $scholarPass);
    //send email employee his/her id and password 
    $this->database->sendEmail($scholarEmail,"Your Scholar Application has been Submitted", $emailBody);
    
    }

    public function updateRenewalData($yearLvl, $uploadedFileName1, $uploadedFileName2, $scholarID) {
        // try {
        //     // Begin a transaction
        //     $this->database->getConnection()->beginTransaction();
    
        //     // Update renewal data in the database
        //     $updateStmt = $this->database->getConnection()->prepare("UPDATE scholar_renew SET yearLvl = ?, file1 = ?, file2 = ?, renew_status = 1, date_renew = ?");
        //     $updateStmt->bindParam(1, $yearLvl);
        //     $updateStmt->bindParam(2, $uploadedFileName1);
        //     $updateStmt->bindParam(3, $uploadedFileName2);
        //     $updateStmt->bindParam(4, $this->date);
        //     $updateStmt->execute();
    
        //     // Commit the transaction
        //     $this->database->getConnection()->commit();
    
        //     return true;
        // } catch (PDOException $e) {
        //     // Rollback the transaction if an error occurs
        //     $this->database->getConnection()->rollBack();
        //     echo "Error: " . $e->getMessage();
        //     return false;
        // }
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_renew SET yearLvl = ?, file1 = ?, file2 = ?, renew_status = 1, date_renew = ? WHERE scholarID = ?");

        if(!$stmt->execute([$yearLvl, $uploadedFileName1, $uploadedFileName2, $this->date, $scholarID])){
            return false;
        }else{
            return true;
        }
    }
    public function getStipend() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM stipend")->fetchAll();

        return $stmt;
    }
    public function getRenewalInfo() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew WHERE renew_status = 1 OR renew_status = 2 OR renew_status = 3 OR renew_status = 4")->fetchAll();

        return $stmt;
    }
    public function getRenewalNewInfo() {

        $renewalDates = $this->getRenewalDates();
        $ref = $renewalDates['reference_number'];

        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renewal WHERE reference_number = '$ref'")->fetchAll();

        return $stmt;
    }
    public function getRenewalNewInfoById($id) {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renewal WHERE id='$id'")->fetchAll();

        return $stmt;
    }
    public function getRenewalNewInfoAll() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renewal")->fetchAll();

        return $stmt;
    }
    public function getDoneRenewalInfo() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_done_renew")->fetchAll();

        return $stmt;
    }
    public function getDoneRenewalInfoById($id) {
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_done_renew WHERE scholarID = ?");
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/renewal.php?scholar=renewalDoesNotExist");
            exit();
        }

        //fetch the result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
          //if has result true, else return false
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getRenewalInfoById($id) {
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_renew WHERE scholarID = ?");
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/renewal.php?scholar=renewalDoesNotExist");
            exit();
        }
    
        // Fetch the result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // If there is a result, return it; otherwise, return false
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }    

    public function getRenewalDatesForScholar() {
        $query = "SELECT renewal_date_start, renewal_date_end FROM scholar_renewal_date WHERE id = 1";
        $stmt = $this->database->getConnection()->query($query);

        if ($stmt) {
            $renewalDates = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $renewalDates;
        } else {
            // Handle the error, you might want to log or return an appropriate value
            return false;
        }
    }

    public function getRenewalDates() {
        $query = "SELECT * FROM scholar_renewal_date WHERE id = 1";
        $stmt = $this->database->getConnection()->query($query);

        if ($stmt) {
            $renewalDates = $stmt->fetch(PDO::FETCH_ASSOC);
            return $renewalDates;
        } else {
            // Handle the error, you might want to log or return an appropriate value
            return false;
        }
    }    
    public function getScholars($id){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info 
                                                        WHERE scholar_id = ? AND status = '1'");
        $stmt->execute([$id]);
        $scholars = $stmt->fetchAll();
        return $scholars;
    }
    public function getAllScholars(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_info WHERE status = '1'")->fetchAll();
        return $stmt;
    }
    public function getAllApplicants(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_info WHERE status = '0'")->fetchAll();
        return $stmt;
    }

    public function getAllApplicantsGenerate($start, $end){
        // Prepare the SQL query
        $sql = "SELECT * FROM scholar_info WHERE status = '0' AND date_apply BETWEEN :start AND :end";
    
    
        // Prepare the statement
        $stmt = $this->database->getConnection()->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch all results
        return $stmt->fetchAll();
    }
    
    public function getAllStipend(){
        $stmt = $this->database->getConnection()->query("SELECT * FROM stipend")->fetchAll();
        return $stmt;
    }
    public function getAllStipendGenerate($start, $end) {
        // Prepare the SQL query
        $sql = "SELECT * FROM stipend WHERE DATE(date_insert) BETWEEN :start AND :end";

        $stmt = $this->database->getConnection()->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch all results
        return $stmt->fetchAll();
    }
    
    public function hasSubmittedRenewal($id, $ref) {
    $query = "SELECT renewal_status FROM scholar_renewal WHERE scholar_id = :scholar_id AND reference_number = :ref";
    $stmt = $this->database->getConnection()->prepare($query);
    $stmt->bindParam(':scholar_id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':ref', $ref, PDO::PARAM_STR);
    $stmt->execute();

    $renewStatus = $stmt->fetchColumn();
    return ($renewStatus == 1 || $renewStatus == 2);
    }


    public function moveRenewalToDone($id) {
        // First, fetch the renewal information of the scholar
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_renew WHERE id = ?");
        $stmt->execute([$id]);
        $renewalInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($renewalInfo && $renewalInfo['renew_status'] == 2) {
            $renewalDates = $this->getRenewalDates();
            $currentDate = date('Y-m-d');
    
            // Check if current date is beyond the grace period
            if ($currentDate >= date('Y-m-d', strtotime($renewalDates['renewal_date_end'] . ' +3 days'))) {
                // Insert the renewal information into scholar_done_renew table
                $stmt = $this->database->getConnection()->prepare("INSERT INTO scholar_done_renew (scholarID, Firstname, Lastname, Email, yearLvl, file1, file1_status, file2, file2_status, date_renew, renew_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$renewalInfo['scholarID'], $renewalInfo['Firstname'], $renewalInfo['Lastname'], $renewalInfo['Email'], $renewalInfo['yearLvl'], $renewalInfo['file1'], $renewalInfo['file1_status'], $renewalInfo['file2'], $renewalInfo['file2_status'], $renewalInfo['date_renew'], $renewalInfo['renew_status']]);
    
                // Delete the renewal information from scholar_renew table
                $stmt = $this->database->getConnection()->prepare("DELETE FROM scholar_renew WHERE id = ?");
                $stmt->execute([$id]);
    
                return true;
            } else {
                // Still within the grace period
                return false;
            }
        } else {
            // Renewal information not found or renew_status is not 2
            return false;
        }
    }     

    public function updateRenewalStatus($id, $file1, $file2){
        $renew_status = ($file1 && $file2) ? 2 : 3;
    
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_renewal SET file1_status = ?, file2_status = ?, renewal_status = ? WHERE id = ? ");
        
        if(!$stmt->execute([$file1, $file2, $renew_status, $id])){
            header('Location: ../newdesign/renewal.php?scholar=error');
            exit();
        }
        return true;
    }
    
    public function updateNonComStatus($id) {
        $renewalDates = $this->getRenewalDates();
        $currentDate = date('Y-m-d');
        
        // Check if current date is beyond the grace period
        if ($currentDate > date('Y-m-d', strtotime($renewalDates['renewal_date_end'] . ' +3 days'))) {
            try {
                // Prepare and execute the SQL query using prepared statements to prevent SQL injection
                $query = "UPDATE scholar_renew SET renew_status = 4 WHERE id = ? AND renew_status = 0";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->execute([$id]);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    
    public function updateNonComNotif0($id){
        // Update for 1st warning
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET nonCom = ? WHERE scholar_id =?");
       //if execution fail
        $stmt->execute([0, $id]);
    }
    public function updateNonComNotif1($id){
        // Update for 1st warning
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET nonCom = ? WHERE scholar_id =?");
       //if execution fail
        $stmt->execute([1, $id]);
    }
    public function updateNonComNotif2($id){
        // Update for 2nd warning
        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_info SET nonCom = ? WHERE scholar_id =?");
       //if execution fail
        $stmt->execute([2, $id]);
    }
    
}

