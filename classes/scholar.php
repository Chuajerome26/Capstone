<?php

class Scholar{

    private $database;
    private $date;

    public function __construct(Database $database) {
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date =  date('Y-m-d H:i:s');
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
        if (in_array($filesAndPicture['fileActualExt'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt1'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt3'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt4'], $filesAndPicture['allowed3']) && 
            in_array($filesAndPicture['fileActualExt5'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt6'], $filesAndPicture['allowed3']) && 
            in_array($filesAndPicture['fileActualExt7'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt8'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt9'], $filesAndPicture['allowed3']) && 
            in_array($filesAndPicture['fileActualExt10'], $filesAndPicture['allowed3']) && 
            in_array($filesAndPicture['fileActualExt11'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt12'], $filesAndPicture['allowed3']) && 
            in_array($filesAndPicture['fileActualExt13'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt14'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt15'], $filesAndPicture['allowed3']) &&
            in_array($filesAndPicture['fileActualExt16'], $filesAndPicture['allowed3'])) {

            //seperate filename
            $newFileName = explode('.',$filesAndPicture['fileName']);
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
            
            //2x2 Pic
            $fileNameNew = uniqid('', true) . "." . $filesAndPicture['fileActualExt'];
           //file destination
            $fileDestination = '../Scholar_files/' . $fileNameNew;

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

            $arrayFiles = array($fileNameNew, $fileNameNew1, $fileNameNew3, $fileNameNew4, $fileNameNew5, $fileNameNew6,
            $fileNameNew7, $fileNameNew8, $fileNameNew9, $fileNameNew10, $fileNameNew11, $fileNameNew12, $fileNameNew13, $fileNameNew14,
            $fileNameNew15, $fileNameNew16);
            // if (move_uploaded_file($fileTmpName, $fileDestination) ) {
            if (move_uploaded_file($filesAndPicture['fileTmpName'],$fileDestination) &&
                move_uploaded_file($filesAndPicture['fileTmpName1'],$fileDestination1) &&
                move_uploaded_file($filesAndPicture['fileTmpName3'],$fileDestination3) &&
                move_uploaded_file($filesAndPicture['fileTmpName4'],$fileDestination4))  {

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
            header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");
            exit();
        }
        //fetch the employeeID
        $scholarId = $stmtScholarID->fetchColumn();

        $arrayNames = array('Application Form', 'Id Photo', 'Family Profile', 'Letter of Intent', 'Parent Consent', 'Copy of Grades',
                    'Birth Certificate', 'Indigency', 'Recommendation Letter', 'Good Moral', 'School Diploma', 'Form 137/138', 'Acceptance Letter'
                , 'Enrollment Form', 'Family Picture', 'Sketch of House Area');

                for ($i = 0; $i < count($scholarFiles); $i++) {
                    $fileName = $scholarFiles[$i];
                    $name = $arrayNames[$i];
                    
                    // Prepare and bind the SQL statement
                    $stmt123 = $this->database->getConnection()->prepare("INSERT INTO scholar_file (scholar_id, requirement_name, file_name) VALUES (?, ?, ?)");

                    $stmt123->execute([$scholarId, $name, $fileName]);
                }

        // prepare insert statement for employee_details table
        // $sql2 = "INSERT INTO scholar_files (scholar_id, id_pic, copy_grades, psa, good_moral, e_Form) 
        //         VALUES (?,?,?,?,?,?);";

    
        //  // prepared statement
        // $stmt2 = $this->database->getConnection()->prepare($sql2);

        //  //if execution fail
        // if (!$stmt2->execute([$scholarId, $id_pic, $copy_grades, $psa, $good_moral, $eForm])) {
        //     header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");
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
            header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");
            exit();
            
        }
        //send email employee his/her id and password
    $emailSubject = "Congratulations! Your Scholar Application has been Submit";
    $emailBody = "Dear Applicant,\n\n"
    . "Username: " . $scholarUser . "\n"
    . "Password: " . $scholarPass . "\n\n"
    . "Please let us know if you have any questions or concerns, and we will be more than happy to help.\n\n"
    . "Best regards,\n"
    . "CCMF";
    
        //send email employee his/her id and password 
        $this->database->sendEmail($scholarEmail,$emailSubject, $emailBody);
    
        //if success saving account 
        header("Location: ../index.php?scholar=success");
        exit();
    }

    public function insertData($scholarID, $yearLvl, $uploadedFileName1, $uploadedFileName2) {
        try {
            // Insert data into the database using a single query
            $stmt = $this->database->getConnection()->prepare("INSERT INTO scholar_renew (scholarID, yearLvl, file1, file2, date_renew) VALUES ( ?, ?, ?, ?, NOW())");
            $stmt->bindParam(1, $scholarID);
            $stmt->bindParam(2, $yearLvl);
            $stmt->bindParam(3, $uploadedFileName1);
            $stmt->bindParam(4, $uploadedFileName2);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
            return false;
        }
    }

    public function getRenewalInfo() {
        $stmt = $this->database->getConnection()->query("SELECT * FROM scholar_renew")->fetchAll();

        return $stmt;
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

    public function hasSubmittedRenewal($scholarsId) {
        $query = "SELECT COUNT(*) FROM scholar_renew AS sr 
                JOIN scholar_renewal_date AS srd ON sr.date_renew BETWEEN srd.renewal_date_start AND srd.renewal_date_end
                WHERE sr.scholarID = :scholarID";
        $stmt = $this->database->getConnection()->prepare($query);
        $stmt->bindParam(':scholarID', $scholarsId, PDO::PARAM_STR);
        $stmt->execute();
    
        $count = $stmt->fetchColumn();
        return ($count > 0);
    }
    
}

