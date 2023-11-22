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
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM scholars_info WHERE email=?");

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
        if (in_array($filesAndPicture['fileActualExt'], $filesAndPicture['allowed']) &&
             in_array($filesAndPicture['fileActualExt1'], $filesAndPicture['allowed1']) &&
             in_array($filesAndPicture['fileActualExt2'], $filesAndPicture['allowed2']) &&
             in_array($filesAndPicture['fileActualExt3'], $filesAndPicture['allowed3']) &&
             in_array($filesAndPicture['fileActualExt4'], $filesAndPicture['allowed4']) ) {

            //seperate filename
            $newFileName = explode('.',$filesAndPicture['fileName']);
            $newFileName1 = explode('.',$filesAndPicture['fileName1']);
            $newFileName2 = explode('.',$filesAndPicture['fileName2']);
            $newFileName3 = explode('.',$filesAndPicture['fileName3']);
            $newFileName4 = explode('.',$filesAndPicture['fileName4']);

            //2x2 Pic
            $fileNameNew = uniqid('', true) . "." . $filesAndPicture['fileActualExt'];
           //file destination
            $fileDestination = '../Uploads_pic/' . $fileNameNew;

            
            //Copy of Grades
            $fileNameNew1 = uniqid('', true) . "." . $filesAndPicture['fileActualExt1'];
              //file destination
            $fileDestination1 = '../Uploads_cog/' . $fileNameNew1;

            //PSA
            $fileNameNew2 = uniqid('', true) . "." . $filesAndPicture['fileActualExt2'];
              //file destination
            $fileDestination2 = '../Uploads_psa/' . $fileNameNew2;

            //Good Moral
            $fileNameNew3 = uniqid('', true) . "." . $filesAndPicture['fileActualExt3'];
              //file destination
            $fileDestination3 = '../Uploads_gm/' . $fileNameNew3;

            //Enrollment Form
            $fileNameNew4 = uniqid('', true) . "." . $filesAndPicture['fileActualExt4'];
              //file destination
            $fileDestination4 = '../Uploads_ef/' . $fileNameNew4;

            // if (move_uploaded_file($fileTmpName, $fileDestination) ) {
            if (move_uploaded_file($filesAndPicture['fileTmpName'],$fileDestination) &&
                move_uploaded_file($filesAndPicture['fileTmpName1'],$fileDestination1) &&
                move_uploaded_file($filesAndPicture['fileTmpName2'],$fileDestination2) &&
                move_uploaded_file($filesAndPicture['fileTmpName3'],$fileDestination3) &&
                move_uploaded_file($filesAndPicture['fileTmpName4'],$fileDestination4))  {

                $this->registerEmployee($scholarData, $fileNameNew, $fileNameNew1, $fileNameNew2, $fileNameNew3, $fileNameNew4);
         
            } else {
                echo "move_uploaded_file error";
            }
        } else {
            echo "You can't upload this type of file!";
        }
    }



    public function registerEmployee($scholarData, $id_pic, $copy_grades, $psa, $good_moral, $eForm){

        // prepare insert statement for employee table
         $sql = "INSERT INTO scholars_info (f_name,l_name, gender, cStatus, citizenship, date_of_birth, birth_place, religion, mobile_num, email, address, total_sub, total_units, gwa, date_apply)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

         // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        //if execution fail
        if (!$stmt->execute([$scholarData['f_name'],
                             $scholarData['l_name'],
                             $scholarData['gender'],
                             $scholarData['cStatus'],
                             $scholarData['citizenship'],
                             $scholarData['bday'],
                             $scholarData['bplace'],
                             $scholarData['religion'],
                             $scholarData['mNum'],
                             $scholarData['email'],
                             $scholarData['address'],
                             $scholarData['totalSub'],
                             $scholarData['totalUnits'],
                             $scholarData['gwa'],
                             $this->date])) {
            header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");

            exit();
        }
        
        // get the ID of the inserted employee record
        // prepare the SQL statement using the database property
        $stmtScholarID = $this->database->getConnection()->prepare("SELECT id FROM scholars_info WHERE email=?");

         //if execution fail
        if (!$stmtScholarID->execute([$scholarData['email']])) {
            header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");
            exit();
        }
        //fetch the employeeID
        $scholarId = $stmtScholarID->fetchColumn();

        // prepare insert statement for employee_details table
        $sql2 = "INSERT INTO scholar_files (scholar_id, id_pic, copy_grades, psa, good_moral, e_Form) 
                VALUES (?,?,?,?,?,?);";

    
         // prepared statement
        $stmt2 = $this->database->getConnection()->prepare($sql2);

         //if execution fail
        if (!$stmt2->execute([$scholarId, $id_pic, $copy_grades, $psa, $good_moral, $eForm])) {
            header("Location: ../Pages-scholar/appforms.php?scholar=stmtfail");
            //close connection
            unset($this->database);
            exit();
        }

        
        //generate scholar account
        $scholarUser = $this->generateEmployeeIDAndPassword($scholarData['l_name']);
        $scholarPass = $this->generateEmployeeIDAndPassword($scholarData['f_name']);

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

    public function insertData($scholarID, $subjectTotal, $unitTotal, $gwa, $remark, $uploadedFileName) {
        try {
            // Insert data into the database using a single query
            $stmt = $this->database->getConnection()->prepare("INSERT INTO scholar_renew (scholarID, `subject-total`, `unit-total`, gwa, remark, file, status, date) VALUES (?, ?, ?, ?, ?, ?, 'Pending', NOW())");
            $stmt->bindParam(1, $scholarID);
            $stmt->bindParam(2, $subjectTotal);
            $stmt->bindParam(3, $unitTotal);
            $stmt->bindParam(4, $gwa);
            $stmt->bindParam(5, $remark);
            $stmt->bindParam(6, $uploadedFileName);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
            return false;
        }
    }
}

