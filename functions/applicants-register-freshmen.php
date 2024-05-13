<?php
session_start();
if(isset($_POST['submit'])){
    require '../classes/database.php';
    require '../classes/scholar.php';
    require '../classes/admin.php';

    $user_id = $_SESSION["id"];
    $currentDate1 = date('Y-m-d H:i:s');
    $currentDate = date('Y-m-d');

    $database = new Database();
    $scholar = new Scholar($database);
    $admin = new Admin($database);

    $files = $admin->getCustomizableForm();
    //scholar data
    $dob = $_POST["dofBirth"];
    $dateOfBirth = new DateTime($dob);
    // $currentDate = new DateTime();
    // $age = $currentDate->diff($dateOfBirth)->y;

    $father_name = $_POST['fatherFName'].' '.$_POST['fatherMName'].' '.$_POST['fatherLName'];
    $mother_name = $_POST['motherFName'].' '.$_POST['motherMName'].' '.$_POST['motherLName'];
    
    $present_address = "Metro Manila, Quezon City, ".$_POST['present_brgy'].", ".$_POST['present_district'].", ".$_POST['present_zip'].", ".$_POST['present_hnumber'];
    $permanent_address = $_POST['permanent_province'].", ".$_POST['permanent_city'].", ".$_POST['permanent_barangay'].", ".$_POST['permanent_district'].", ".$_POST['permanent_zip'].", ".$_POST['permanent_hnumber'];

    $scholarData = array(
        'fName' => trim($_POST["fName"]) ?? '',
        'mName' => trim($_POST["mName"]) ?? '',
        'lName' => trim($_POST["lName"]) ?? '',
        'suffix' => trim($_POST["suffix"]) ?? '',
        'gender' => trim($_POST["gender"]) ?? '',
        // 'age' => trim($age) ?? '',
        'dofBirth' => trim($_POST["dofBirth"]) ?? '',
        'bPlace' => trim($_POST["bPlace"]) ?? '',
        'cStatus' => trim(isset($_POST["cStatus"]) && $_POST['cStatus'] == "Others" ? $_POST['otherStatus']:$_POST['cStatus'] ?? '') ?? '',
        'religion' => trim($_POST["religion"]) ?? '',
        'height' => trim($_POST["height"]) ?? '',
        'weight' => trim($_POST["weight"]) ?? '',
        'mCondition' => trim(isset($_POST["mCondition"]) && $_POST['mCondition'] == "yes" ? $_POST['pwd'] == "Others" ? $_POST['otherMedical']:$_POST['pwd']:'No') ?? '',

        'present_address' => trim($present_address) ?? '',
        'permanent_address' => trim($permanent_address) ?? '',

        'mNumber' => trim($_POST["mNumber"]) ?? '',
        'gNumber' => trim($_POST["gNumber"]) ?? '',
        'email' => trim($_POST["email"]) ?? '',
        'fb_link' => trim($_POST["fbLink"]) ?? '',

        'earnerName' => $_POST["earnerName"] ?? '',
        'earnerIncome' => $_POST["earnerIncome"] ?? '',
        'earnerOccupation' => $_POST["earnerOccupation"] ?? '',
        'comName' => $_POST["comName"] ?? '',
     
        'fatherName' => trim($father_name) ?? '',
        'fAttain' => trim(isset($_POST["fAttain"]) && $_POST['fAttain'] == "Others" ? $_POST['FotherAttain']:$_POST['fAttain'] ?? '') ?? '',
        'fOccupation' => trim($_POST["fOccupation"]) ?? '',
        
        'motherName' => trim($mother_name) ?? '',
        'mAttain' => trim(isset($_POST["mAttain"]) && $_POST['mAttain'] == "Others" ? $_POST['MotherAttain']:$_POST['mAttain'] ?? '') ?? '',
        'motherOccupation' => trim($_POST["motherOccupation"]) ?? '',

        'guardian' => trim($_POST["guardian"]) ?? '',
        'emergencyContact' => trim($_POST["emergencyContact"]) ?? '',
        'relationship' => trim($_POST["relationship"]) ?? '',

        'numSiblings' => trim($_POST["numSiblings"]) ?? '',

        'shSchool' => trim($_POST["shSchool"]) ?? '',
        'dateGrad' => trim($_POST["dateGrad"]) ?? '',
        'shAve' => trim($_POST["shAve"]) ?? '',
        'shAchievements' => trim(isset($_POST["shAchievements"]) ? $_POST["shAchievements"]:'') ?? '',
        'shCourse' => trim(isset($_POST["shCourse"]) && $_POST['shCourse'] == "Others" ? $_POST["otherCourse"]:$_POST['shCourse'] ?? '') ?? '',

        'cSchool' => trim($_POST["cSchool"]) ?? '',
        'cCourse' => trim($_POST["cCourse"]) ?? '',
        'schoYear' => trim($_POST["schoYear"]) ?? '',
        'cAve' => trim($_POST["cAve"]) ?? '',
        
        'studType' => trim($_POST["studType"]) ?? '',
    );
    
    if($_POST['studType'] == 'Senior High Graduate'){
        $fileData = array(
            'fileName' => $_FILES['cog1']['name'],
            'fileTmpName' => $_FILES['cog1']['tmp_name'],
            'fileSize' => $_FILES['cog1']['size'],
            'fileError' => $_FILES['cog1']['error'],
            'fileType' => $_FILES['cog1']['type'],
        );

        if(isset($_FILES['shAchievementsFile']) && $_FILES['shAchievementsFile']['error'] === UPLOAD_ERR_OK) {
            $fileDataA = array(
                'fileName' => $_FILES['shAchievementsFile']['name'],
                'fileTmpName' => $_FILES['shAchievementsFile']['tmp_name'],
                'fileSize' => $_FILES['shAchievementsFile']['size'],
                'fileError' => $_FILES['shAchievementsFile']['error'],
                'fileType' => $_FILES['shAchievementsFile']['type'],
            );

            $fileExtA = explode('.', $fileDataA['fileName']);
            $fileActualExtA = strtolower(end($fileExtA));
        }
    }elseif($_POST['studType'] == 'College'){
        $fileData = array(
            'fileName' => $_FILES['cog2']['name'],
            'fileTmpName' => $_FILES['cog2']['tmp_name'],
            'fileSize' => $_FILES['cog2']['size'],
            'fileError' => $_FILES['cog2']['error'],
            'fileType' => $_FILES['cog2']['type'],
        );
    }

    $fileExt = explode('.', $fileData['fileName']);
    $fileActualExt= strtolower(end($fileExt));

    $filesAndPicture = array(
        'fileActualExt' => $fileActualExt,
        'fileName' => $fileData['fileName'],
        'fileTmpName' => $fileData['fileTmpName'],
        'fileActualExtA' => isset($fileDataA) ? $fileActualExtA: '',
        'fileNameA' => isset($fileDataA) ? $fileDataA['fileName']: '',
        'fileTmpNameA' => isset($fileDataA) ? $fileDataA['fileTmpName']: '',
    );
    
    for($i = 0; $i < count($files); $i++) {
        $status= str_replace(' ', '', $files[$i]['name']);
        $fileKey = 'fileData' . $files[$i]['id'];
    
        $$fileKey = array(
            'fileName' => $_FILES[$status]['name'],
            'fileTmpName' => $_FILES[$status]['tmp_name'],
            'fileSize' => $_FILES[$status]['size'],
            'fileError' => $_FILES[$status]['error'],
            'fileType' => $_FILES[$status]['type'],
        );
    
        $fileExt = explode('.', $$fileKey['fileName']);
        ${'fileActualExt' . $files[$i]['id']} = strtolower(end($fileExt));
    
        // Insert the data into the filesAndPicture array
        $filesAndPicture[$fileKey] = $$fileKey;
        $filesAndPicture['fileActualExt' . $files[$i]['id']] = ${'fileActualExt' . $files[$i]['id']};
    }
    
    var_dump($filesAndPicture);


    //check if records already exist
    if($scholar->findByEmail($scholarData['email'])){

         //return to employee register page
        header("Location: ../Pages-scholar/appform.php?scholar=alreadyExist");
        exit();
    }

    for($i = 0; $i < count($files); $i++){
        $fileKey = 'fileData' . $files[$i]['id'];
        if($filesAndPicture[$fileKey]['fileError'] === 0){

        }else{
            echo "There was an error while uploading the file";
            exit();
        }
    }
    //if theres no error from the resume file
    if ($fileData['fileError'] === 0 && (isset($fileDataA) ? $fileDataA['fileError'] === 0 : true)) {

        // Fetch all admin IDs
        $adminIds = $admin->getEvaluatorAdminIds();

        foreach ($adminIds as $adminId) {
            $notification = $admin->InsertNotif($user_id, $adminId, "applicantApplied", $currentDate1);
        }

        $scholar->checkData($filesAndPicture, $scholarData, $_POST['studentType']);
    } else {
        echo "There was an error while uploading the file";
        exit();
    }


}
?>