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

        public function checkData($filesAndPicture, $scholarData, $studentType){
            //check if the file extension is in the array $allowed
        if (
            in_array($filesAndPicture['fileActualExt1'], $filesAndPicture['allowed2']) &&
            (
                ($studentType == 'srhigh') ? (
                    in_array($filesAndPicture['fileActualExt2'], $filesAndPicture['allowed1'])
                ) : true
            ) &&
            (
                ($studentType == 'college') ? (
                    in_array($filesAndPicture['fileActualExt3'], $filesAndPicture['allowed1'])
                ) : true
            ) &&
            in_array($filesAndPicture['fileActualExt4'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt5'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt6'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt7'], $filesAndPicture['allowed1']) &&
            (
                ($studentType == 'srhigh' && isset($filesAndPicture['fileActualExt8'])) ? (
                    in_array($filesAndPicture['fileActualExt8'], $filesAndPicture['allowed1'])
                ) : true
            )) {

            //seperate filename
            $newFileName1 = explode('.',$filesAndPicture['fileName1']);
            $newFileName2 = explode('.',$filesAndPicture['fileName2']);
            $newFileName3 = explode('.',$filesAndPicture['fileName3']);
            $newFileName4 = explode('.',$filesAndPicture['fileName4']);
            $newFileName5 = explode('.',$filesAndPicture['fileName5']);
            $newFileName6 = explode('.',$filesAndPicture['fileName6']);
            $newFileName7 = explode('.',$filesAndPicture['fileName7']);
            if (isset($filesAndPicture['fileName8'])) {
                $newFileName8 = explode('.',$filesAndPicture['fileName8']);
            }
            
            //Copy of Grades
            $fileNameNew1 = uniqid('', true) . "." . $filesAndPicture['fileActualExt1'];
                //file destination
            $fileDestination1 = '../Scholar_files/' . $fileNameNew1;

            //Good Moral
            $fileNameNew2 = uniqid('', true) . "." . $filesAndPicture['fileActualExt2'];
            $fileDestination2 = '../Scholar_files/' . $fileNameNew2;

            //Enrollment Form
            $fileNameNew3 = uniqid('', true) . "." . $filesAndPicture['fileActualExt3'];
                //file destination
            $fileDestination3 = '../Scholar_files/' . $fileNameNew3;

            $fileNameNew4 = uniqid('', true) . "." . $filesAndPicture['fileActualExt4'];
            $fileDestination4 = '../Scholar_files/' . $fileNameNew4;

            $fileNameNew5 = uniqid('', true) . "." . $filesAndPicture['fileActualExt5'];
            $fileDestination5 = '../Scholar_files/' . $fileNameNew5;

            $fileNameNew6 = uniqid('', true) . "." . $filesAndPicture['fileActualExt6'];
            $fileDestination6 = '../Scholar_files/' . $fileNameNew6;

            $fileNameNew7 = uniqid('', true) . "." . $filesAndPicture['fileActualExt7'];
            $fileDestination7 = '../Scholar_files/' . $fileNameNew7;
            
            if (isset($filesAndPicture['fileActualExt8'])) {
                $fileNameNew8 = uniqid('', true) . "." . $filesAndPicture['fileActualExt8'];
                $fileDestination8 = '../Scholar_files/' . $fileNameNew8;
            }

            $arrayFiles = array($fileNameNew1, $fileNameNew2, $fileNameNew3, $fileNameNew4, $fileNameNew5, $fileNameNew6, $fileNameNew7);

            if (isset($fileNameNew8)) {
                array_push($arrayFiles, $fileNameNew8);
            }
            
            // if (move_uploaded_file($fileTmpName, $fileDestination) ) {
            if (
                move_uploaded_file($filesAndPicture['fileTmpName1'],$fileDestination1) &&
                (
                    ($studentType == 'srhigh') ? (
                        move_uploaded_file($filesAndPicture['fileTmpName2'],$fileDestination2)
                    ) : true
                ) &&
                (
                    ($studentType == 'college') ? (
                        move_uploaded_file($filesAndPicture['fileTmpName3'],$fileDestination3)
                    ) : true
                ) &&
                move_uploaded_file($filesAndPicture['fileTmpName4'],$fileDestination4) &&
                move_uploaded_file($filesAndPicture['fileTmpName5'],$fileDestination5) &&
                move_uploaded_file($filesAndPicture['fileTmpName6'],$fileDestination6) &&
                move_uploaded_file($filesAndPicture['fileTmpName7'],$fileDestination7) &&
                (
                    ($studentType == 'srhigh' && isset($fileDestination8) && isset($filesAndPicture['fileTmpName8'])) ? (
                        move_uploaded_file($filesAndPicture['fileTmpName8'],$fileDestination8)
                    ) : true
                ))  {

                $this->registerEmployee($scholarData, $arrayFiles);
        
            } else {
                echo "move_uploaded_file error";
            }
        } else {
            echo "You can't upload this type of file!";
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

    public function registerEmployee($scholarData, $scholarFiles){

        // get the ID of the inserted employee record
        // prepare the SQL statement using the database property
        $stmtScholarID = $this->database->getConnection()->prepare("SELECT id FROM login WHERE user=?");

            //if execution fail
        if (!$stmtScholarID->execute([$scholarData['email']])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
            exit();
        }
        //fetch the employeeID
        $scholarId = $stmtScholarID->fetchColumn();


        // prepare insert statement for employee table 38
        $sql = "INSERT INTO scholar_info 
        (scholar_id, f_name, m_name, l_name, suffix, gender, c_status, date_of_birth, b_place, height, weight, religion, mobile_number, gcash_number, email, present_address, 
        permanent_address, med_condition, fb_link, father_name, father_attain, father_occupation, mother_name, mother_attain, mother_occupation, guardian, emergency_contact, guardian_rs, numSiblings, 
        sh_school, date_grad, sh_ave, sh_achievements, sh_course, c_school, c_ave, c_course, cschool_years, studType, scholar_type, date_apply) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

            // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        // Define the scholar type based on studType and corresponding average
        if ($scholarData['studType'] == 'Senior High Graduate') {
            if (($scholarData['shAve'] >= 95 && $scholarData['shAve'] <= 100) || ($scholarData['shAve'] >= 1.0 && $scholarData['shAve'] <= 1.5)) {
                $scholar_type = 3;
            } elseif (($scholarData['shAve'] >= 90 && $scholarData['shAve'] <= 94) || ($scholarData['shAve'] >= 1.6 && $scholarData['shAve'] <= 1.9)) {
                $scholar_type = 2;
            } elseif (($scholarData['shAve'] >= 85 && $scholarData['shAve'] <= 89) || ($scholarData['shAve'] >= 2.0 && $scholarData['shAve'] <= 2.25)) {
                $scholar_type = 1;
            } else {
                $scholar_type = 0;
            }
        } elseif ($scholarData['studType'] == 'College') {
            if (($scholarData['cAve'] >= 1.0 && $scholarData['cAve'] <= 1.5) || ($scholarData['cAve'] >= 95 && $scholarData['cAve'] <= 100)) {
                $scholar_type = 3;
            } elseif (($scholarData['cAve'] >= 1.6 && $scholarData['cAve'] <= 1.9) || ($scholarData['cAve'] >= 90 && $scholarData['cAve'] <= 94)) {
                $scholar_type = 2;
            } elseif (($scholarData['cAve'] >= 2.0 && $scholarData['cAve'] <= 2.25) || ($scholarData['cAve'] >= 85 && $scholarData['cAve'] <= 89)) {
                $scholar_type = 1;
            } else {
                $scholar_type = 0;
            }
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

        $arrayNames = array('IdPhoto', 'Form137/138', 'CollegeGrades', 'BirthCertificate', 'Indigency', 'BarangayCert', 'ITR', 'HighScoolAchievement');


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
    public function hasSubmittedRenewal($id) {
        $query = "SELECT renewal_status FROM scholar_renewal WHERE scholar_id = :scholar_id";
        $stmt = $this->database->getConnection()->prepare($query);
        $stmt->bindParam(':scholar_id', $id, PDO::PARAM_STR);
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

