<?php
include '../email-design/scholarlogin-design.php';//Sa email design to ya.
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
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_info WHERE id=? AND status = 1");

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

    public function checkData($filesAndPicture, $scholarData){
         //check if the file extension is in the array $allowed
        if (
            in_array($filesAndPicture['fileActualExt1'], $filesAndPicture['allowed2']) &&
            in_array($filesAndPicture['fileActualExt3'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt4'], $filesAndPicture['allowed1']) && 
            in_array($filesAndPicture['fileActualExt5'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt6'], $filesAndPicture['allowed1']) && 
            in_array($filesAndPicture['fileActualExt7'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt8'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt9'], $filesAndPicture['allowed1']) && 
            in_array($filesAndPicture['fileActualExt10'], $filesAndPicture['allowed1']) && 
            in_array($filesAndPicture['fileActualExt11'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt12'], $filesAndPicture['allowed1']) && 
            in_array($filesAndPicture['fileActualExt13'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt14'], $filesAndPicture['allowed1']) &&
            in_array($filesAndPicture['fileActualExt15'], $filesAndPicture['allowed2']) &&
            in_array($filesAndPicture['fileActualExt16'], $filesAndPicture['allowed3'])) {

            //seperate filename
            $newFileName1 = explode('.',$filesAndPicture['fileName1']);
            $newFileName3 = explode('.',$filesAndPicture['fileName3']);
            $newFileName4 = explode('.',$filesAndPicture['fileName4']);
            $newFileName5 = explode('.',$filesAndPicture['fileName5']);
            $newFileName6 = explode('.',$filesAndPicture['fileName6']);
            $newFileName7 = explode('.',$filesAndPicture['fileName7']);
            $newFileName8 = explode('.',$filesAndPicture['fileName8']);
            $newFileName9 = explode('.',$filesAndPicture['fileName9']);
            $newFileName10 = explode('.',$filesAndPicture['fileName10']);
            $newFileName11 = explode('.',$filesAndPicture['fileName11']);
            $newFileName12 = explode('.',$filesAndPicture['fileName12']);
            $newFileName13 = explode('.',$filesAndPicture['fileName13']);
            $newFileName14 = explode('.',$filesAndPicture['fileName14']);
            $newFileName15 = explode('.',$filesAndPicture['fileName15']);
            $newFileName16 = explode('.',$filesAndPicture['fileName16']);
            
            //Copy of Grades
            $fileNameNew1 = uniqid('', true) . "." . $filesAndPicture['fileActualExt1'];
              //file destination
            $fileDestination1 = '../Scholar_files/' . $fileNameNew1;

            //Good Moral
            $fileNameNew3 = uniqid('', true) . "." . $filesAndPicture['fileActualExt3'];
            $fileDestination3 = '../Scholar_files/' . $fileNameNew3;

            //Enrollment Form
            $fileNameNew4 = uniqid('', true) . "." . $filesAndPicture['fileActualExt4'];
              //file destination
            $fileDestination4 = '../Scholar_files/' . $fileNameNew4;

            $fileNameNew5 = uniqid('', true) . "." . $filesAndPicture['fileActualExt5'];
            $fileDestination5 = '../Scholar_files/' . $fileNameNew5;

            $fileNameNew6 = uniqid('', true) . "." . $filesAndPicture['fileActualExt6'];
            $fileDestination6 = '../Scholar_files/' . $fileNameNew6;

            $fileNameNew7 = uniqid('', true) . "." . $filesAndPicture['fileActualExt7'];
            $fileDestination7 = '../Scholar_files/' . $fileNameNew7;
            
            $fileNameNew8 = uniqid('', true) . "." . $filesAndPicture['fileActualExt8'];
            $fileDestination8 = '../Scholar_files/' . $fileNameNew8;
            
            $fileNameNew9 = uniqid('', true) . "." . $filesAndPicture['fileActualExt9'];
            $fileDestination9 = '../Scholar_files/' . $fileNameNew9;

            $fileNameNew10 = uniqid('', true) . "." . $filesAndPicture['fileActualExt10'];
            $fileDestination10 = '../Scholar_files/' . $fileNameNew10;

            $fileNameNew11 = uniqid('', true) . "." . $filesAndPicture['fileActualExt11'];
            $fileDestination11 = '../Scholar_files/' . $fileNameNew11;

            $fileNameNew12 = uniqid('', true) . "." . $filesAndPicture['fileActualExt12'];
            $fileDestination12 = '../Scholar_files/' . $fileNameNew12;

            $fileNameNew13 = uniqid('', true) . "." . $filesAndPicture['fileActualExt13'];
            $fileDestination13 = '../Scholar_files/' . $fileNameNew13;

            $fileNameNew14 = uniqid('', true) . "." . $filesAndPicture['fileActualExt14'];
            $fileDestination14 = '../Scholar_files/' . $fileNameNew14;

            $fileNameNew15 = uniqid('', true) . "." . $filesAndPicture['fileActualExt15'];
            $fileDestination15 = '../Scholar_files/' . $fileNameNew15;

            $fileNameNew16 = uniqid('', true) . "." . $filesAndPicture['fileActualExt16'];
            $fileDestination16 = '../Scholar_files/' . $fileNameNew16;

            $arrayFiles = array($fileNameNew1, $fileNameNew3, $fileNameNew4, $fileNameNew5, $fileNameNew6,
            $fileNameNew7, $fileNameNew8, $fileNameNew9, $fileNameNew10, $fileNameNew11, $fileNameNew12, $fileNameNew13, $fileNameNew14,
            $fileNameNew15, $fileNameNew16);
            // if (move_uploaded_file($fileTmpName, $fileDestination) ) {
            if (
                move_uploaded_file($filesAndPicture['fileTmpName1'],$fileDestination1) &&
                move_uploaded_file($filesAndPicture['fileTmpName3'],$fileDestination3) &&
                move_uploaded_file($filesAndPicture['fileTmpName4'],$fileDestination4) &&
                move_uploaded_file($filesAndPicture['fileTmpName5'],$fileDestination5) &&
                move_uploaded_file($filesAndPicture['fileTmpName6'],$fileDestination6) &&
                move_uploaded_file($filesAndPicture['fileTmpName7'],$fileDestination7) &&
                move_uploaded_file($filesAndPicture['fileTmpName8'],$fileDestination8) &&
                move_uploaded_file($filesAndPicture['fileTmpName9'],$fileDestination9) && 
                move_uploaded_file($filesAndPicture['fileTmpName10'],$fileDestination10) &&
                move_uploaded_file($filesAndPicture['fileTmpName11'],$fileDestination11) &&
                move_uploaded_file($filesAndPicture['fileTmpName12'],$fileDestination12) && 
                move_uploaded_file($filesAndPicture['fileTmpName13'],$fileDestination13) &&
                move_uploaded_file($filesAndPicture['fileTmpName14'],$fileDestination14) &&
                move_uploaded_file($filesAndPicture['fileTmpName15'],$fileDestination15) && 
                move_uploaded_file($filesAndPicture['fileTmpName16'],$fileDestination16))  {

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

        // prepare insert statement for employee table
        $sql = "INSERT INTO scholar_info 
        (f_name, m_name, l_name, suffix, gender, age, nick_name, c_status, citizenship, date_of_birth, b_place, height, weight, religion,
        mobile_number, email, address, province, med_condition, fb_link, skills, father_name, father_age, father_occupation, father_income, father_attained,
        mother_name, mother_age, mother_occupation, mother_income, mother_attained, guardian, emergency_contact, guardian_rs, guardian_contact, e_school, e_ave
        , e_achievements, jh_school, jh_ave, jh_achievements, sh_school, sh_ave, sh_achievements, sh_course, c_school, c_ave, c_achievements, c_course, other_scho,
        other_scho_type, other_scho_coverage, other_scho_status, q1, q2, apply_scho, apply_scho_explain, date_apply) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

         // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        //if execution fail
        if (!$stmt->execute([$scholarData['fName'],
                            $scholarData['mName'],
                            $scholarData['lName'],
                            $scholarData['suffix'],
                            $scholarData['gender'],
                            $scholarData['age'],
                            $scholarData['nName'],
                            $scholarData['cStatus'],
                            $scholarData['citizenship'],
                            $scholarData['dofBirth'],
                            $scholarData['bPlace'],
                            $scholarData['height'],
                            $scholarData['weight'],
                            $scholarData['religion'],
                            $scholarData['mNumber'],
                            $scholarData['email'],
                            $scholarData['address'],
                            $scholarData['province'],
                            $scholarData['mCondition'],
                            $scholarData['fb_link'],
                            $scholarData['skills'],
                            $scholarData['fatherName'],
                            $scholarData['fAge'],
                            $scholarData['fOccupation'],
                            $scholarData['fatherIncome'],
                            $scholarData['fatherAttained'],
                            $scholarData['motherName'],
                            $scholarData['motherAge'],
                            $scholarData['motherOccupation'],
                            $scholarData['motherIncome'],
                            $scholarData['motherAttained'],
                            $scholarData['guardian'],
                            $scholarData['emergencyContact'],
                            $scholarData['relationship'],
                            $scholarData['guardianNumber'],
                            $scholarData['eSchool'],
                            $scholarData['eAve'],
                            $scholarData['eAchievements'],
                            $scholarData['jhSchool'],
                            $scholarData['jhAve'],
                            $scholarData['jhAchievements'],
                            $scholarData['shSchool'],
                            $scholarData['shAve'],
                            $scholarData['shAchievements'],
                            $scholarData['shCourse'],
                            $scholarData['cSchool'],
                            $scholarData['cAve'],
                            $scholarData['cAchievements'],
                            $scholarData['cCourse'],
                            $scholarData['otherScholarship'],
                            $scholarData['otherScholarType'],
                            $scholarData['otherScholarCoverage'],
                            $scholarData['otherScholarStatus'],
                            $scholarData['q1'],
                            $scholarData['q2'],
                            $scholarData['applyScho'],
                            $scholarData['applySchoExplain'],
                            $this->date])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");

            exit();
        }
        
        // get the ID of the inserted employee record
        // prepare the SQL statement using the database property
        $stmtScholarID = $this->database->getConnection()->prepare("SELECT id FROM scholar_info WHERE email=?");

         //if execution fail
        if (!$stmtScholarID->execute([$scholarData['email']])) {
            header("Location: ../Pages-scholar/appform.php?scholar=stmtfail");
            exit();
        }
        //fetch the employeeID
        $scholarId = $stmtScholarID->fetchColumn();

        $arrayNames = array('IdPhoto', 'FamilyProfile', 'LetterofIntent', 'ParentConsent', 'CopyofGrades',
                    'BirthCertificate', 'Indigency', 'RecommendationLetter', 'GoodMoral', 'SchoolDiploma', 'Form137/138', 'AcceptanceLetter'
                , 'EnrollmentForm', 'FamilyPicture', 'SketchofHouseArea');

                for ($i = 0; $i < count($scholarFiles); $i++) {
                    $fileName = $scholarFiles[$i];
                    $name = $arrayNames[$i];
                    
                    // Prepare and bind the SQL statement
                    $stmt123 = $this->database->getConnection()->prepare("INSERT INTO scholar_file (scholar_id, requirement_name, file_name) VALUES (?, ?, ?)");

                    $stmt123->execute([$scholarId, $name, $fileName]);
                }

                // Loop through each set of additional scholar data and insert into the database
                for ($i = 0; $i < count($scholarData['sName']); $i++) {
                    // Prepare an SQL statement
                    $stmt3 = $this->database->getConnection()->prepare("INSERT INTO scholar_siblings (scholar_id, name, age, occupation, civil_status, religion, educational_attained) VALUES (?, ?, ?, ?, ?, ?, ?)");

                    // Bind parameters and execute the statement
                    $stmt3->execute([$scholarId ,$scholarData['sName'][$i], $scholarData['sAge'][$i], $scholarData['sOccupation'][$i], $scholarData['sCstatus'][$i], $scholarData['sReligion'][$i], $scholarData['sEattained'][$i]]);
                }

                for ($i = 0; $i < count($scholarData['sub']); $i++) {
                    // Prepare an SQL statement
                    $stmt4 = $this->database->getConnection()->prepare("INSERT INTO scholar_grade (scholar_id, subject, unit, grade) VALUES (?, ?, ?, ?)");

                    // Bind parameters and execute the statement
                    $stmt4->execute([$scholarId ,$scholarData['sub'][$i], $scholarData['totalUnits'][$i], $scholarData['gAverage'][$i]]);
                }

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
                        $totalRows = $scholarData['rowCount'];
                        
                        // Loop through each row
                        for ($i = 0; $i <= $totalRows; $i++) {
                            $stmt5 = $this->database->getConnection()->prepare("INSERT INTO scholar_college_choices (scholar_id, univ, course, entrance_exam, exam_taken) VALUES (?,?,?,?,?)");

                            $schoolName = isset($scholarData['collegeChoice'][$i]) ? $scholarData['collegeChoice'][$i]:"";
                            $courseMajor = isset($scholarData['collegeCourse'][$i]) ? $scholarData['collegeCourse'][$i]:"";
                            $entranceExam = $scholarData['entranceExam'][$i];

                            if($scholarData['entranceExam'][$i] == 'yes'){
                                $exam_taken = $scholarData['ifYes'][$i];
                            }else{
                                $exam_taken = $scholarData['ifNo'][$i];
                            }

                            if($schoolName == '' && $courseMajor == '' && $entranceExam == '' && $exam_taken == ''){
                                
                            }else{
                                $stmt5->execute([$scholarId ,$schoolName, $courseMajor, $entranceExam, $exam_taken]);
                            }
                        }


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
        $scholarUser = $this->generateEmployeeIDAndPassword($scholarData['lName']);
        $scholarPass = $this->generateEmployeeIDAndPassword($scholarData['fName']);

        $this->saveScholarIDAndPassword($scholarUser[0], $scholarPass[0], $scholarId,0, $scholarData['email']);


        // send email
        // $this->database->sendEmail($scholarData['email'],"Succesfully register","We are delighted to inform you that your registration in the 3G Clothing has been successful.");

        //if sucess uploading file, go to this 👇 page
            header("Location: ../index.php?scholar=success");
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

    public function updateRenewalData($yearLvl, $uploadedFileName1, $uploadedFileName2) {
        try {
            // Begin a transaction
            $this->database->getConnection()->beginTransaction();
    
            // Update renewal data in the database
            $updateStmt = $this->database->getConnection()->prepare("UPDATE scholar_renew SET yearLvl = ?, file1 = ?, file2 = ?, renew_status = 1, date_renew = ?");
            $updateStmt->bindParam(1, $yearLvl);
            $updateStmt->bindParam(2, $uploadedFileName1);
            $updateStmt->bindParam(3, $uploadedFileName2);
            $updateStmt->bindParam(4, $this->date);
            $updateStmt->execute();
    
            // Commit the transaction
            $this->database->getConnection()->commit();
    
            return true;
        } catch (PDOException $e) {
            // Rollback the transaction if an error occurs
            $this->database->getConnection()->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function getRenewalInfo() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew")->fetchAll();

        return $stmt;
    }
    public function getDoneRenewalInfo() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_done_renew")->fetchAll();

        return $stmt;
    }
    public function getRenewalInfoById($id) {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew WHERE id = ?")->fetchAll();
        if (!$stmt->execute([$id])) {
            header("Location: ../newdesign/renewal.php?scholar=renewalDoesNotExist");
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
    
    public function getRenewalDates() {
        $query = "SELECT renewal_date_start, renewal_date_end FROM scholar_renewal_date WHERE id = 1";
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
                                                        WHERE id = ? AND status = '1'");
        $stmt->execute([$id]);
        $scholars = $stmt->fetchAll();
        return $scholars;
    }    
    public function hasSubmittedRenewal($id) {
        $query = "SELECT renew_status FROM scholar_renew WHERE scholarID = :scholarID";
        $stmt = $this->database->getConnection()->prepare($query);
        $stmt->bindParam(':scholarID', $id, PDO::PARAM_STR);
        $stmt->execute();

        $renewStatus = $stmt->fetchColumn();
        return ($renewStatus == 1);
    }

    public function moveRenewalToDone($id) {
        // First, fetch the renewal information of the scholar
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholar_renew WHERE id = ?");
        $stmt->execute([$id]);
        $renewalInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($renewalInfo) {
            // Insert the renewal information into scholar_done_renew table
            $stmt = $this->database->getConnection()->prepare("INSERT INTO scholar_done_renew (scholarID, Firstname, Lastname, Email, yearLvl, file1, file1_status, file2, file2_status, date_renew, renew_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$renewalInfo['scholarID'], $renewalInfo['Firstname'], $renewalInfo['Lastname'], $renewalInfo['Email'], $renewalInfo['yearLvl'], $renewalInfo['file1'], $renewalInfo['file1_status'], $renewalInfo['file2'], $renewalInfo['file2_status'], $renewalInfo['date_renew'], $renewalInfo['renew_status']]);
    
            // Delete the renewal information from scholar_renew table
            $stmt = $this->database->getConnection()->prepare("DELETE FROM scholar_renew WHERE id = ?");
            $stmt->execute([$id]);
    
            return true;
        } else {
            // Renewal information not found
            return false;
        }
    }    

    public function updateRenewalStatus($id, $file1, $file2){
        $renew_status = ($file1 && $file2) ? 2 : 3;

        $stmt = $this->database->getConnection()->prepare("UPDATE scholar_renew SET file1_status = ?, file2_status = ?, renew_status = ? WHERE id = ? ");
        
        if(!$stmt->execute([$file1, $file2, $renew_status, $id])){
            header('Location: ../newdesign/renewal.php?scholar=error');
            exit();
        }

        if ($renew_status == 2) {
            // Move renewal information to done table if renew_status is 2
            $this->moveRenewalToDone($id);
        }

        return true;
    }
    
}

