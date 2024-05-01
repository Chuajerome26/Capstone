<?php

if(isset($_POST['submit'])){
    require '../classes/database.php';
    require '../classes/scholar.php';
    require '../classes/admin.php';

    $database = new Database();
    $scholar = new Scholar($database);

    //scholar data
    $dob = $_POST["dofBirth"];
    $dateOfBirth = new DateTime($dob);
    $currentDate = new DateTime();
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

    $fileData1 = array(
        'fileName' => $_FILES['idPicture']['name'],
        'fileTmpName' => $_FILES['idPicture']['tmp_name'],
        'fileSize' => $_FILES['idPicture']['size'],
        'fileError' => $_FILES['idPicture']['error'],
        'fileType' => $_FILES['idPicture']['type'],
    );
    $fileData2 = array(
        'fileName' => $_FILES['cog1']['name'],
        'fileTmpName' => $_FILES['cog1']['tmp_name'],
        'fileSize' => $_FILES['cog1']['size'],
        'fileError' => ($_POST['studentType'] == 'srhigh') ? $_FILES['cog1']['error'] : 0,
        'fileType' => $_FILES['cog1']['type'],
    );
    $fileData3 = array(
        'fileName' => $_FILES['cog2']['name'],
        'fileTmpName' => $_FILES['cog2']['tmp_name'],
        'fileSize' => $_FILES['cog2']['size'],
        'fileError' => ($_POST['studentType'] == 'college') ? $_FILES['cog2']['error'] : 0,
        'fileType' => $_FILES['cog2']['type'],
    );
    $fileData4 = array(
        'fileName' => $_FILES['birth']['name'],
        'fileTmpName' => $_FILES['birth']['tmp_name'],
        'fileSize' => $_FILES['birth']['size'],
        'fileError' => $_FILES['birth']['error'],
        'fileType' => $_FILES['birth']['type'],
    );
    $fileData5 = array(
        'fileName' => $_FILES['indigency']['name'],
        'fileTmpName' => $_FILES['indigency']['tmp_name'],
        'fileSize' => $_FILES['indigency']['size'],
        'fileError' => $_FILES['indigency']['error'],
        'fileType' => $_FILES['indigency']['type'],
    );
    $fileData6 = array(
        'fileName' => $_FILES['brgy']['name'],
        'fileTmpName' => $_FILES['brgy']['tmp_name'],
        'fileSize' => $_FILES['brgy']['size'],
        'fileError' => $_FILES['brgy']['error'],
        'fileType' => $_FILES['brgy']['type'],
    );
    $fileData7 = array(
        'fileName' => $_FILES['Itr']['name'],
        'fileTmpName' => $_FILES['Itr']['tmp_name'],
        'fileSize' => $_FILES['Itr']['size'],
        'fileError' => $_FILES['Itr']['error'],
        'fileType' => $_FILES['Itr']['type'],
    );
    if (isset($_FILES['shAchievementsFile']) && $_FILES['shAchievementsFile']['error'] === UPLOAD_ERR_OK) {
        $fileData8 = array(
            'fileName' => $_FILES['shAchievementsFile']['name'],
            'fileTmpName' => $_FILES['shAchievementsFile']['tmp_name'],
            'fileSize' => $_FILES['shAchievementsFile']['size'],
            'fileError' => ($_POST['studentType'] == 'srhigh') ? $_FILES['shAchievementsFile']['error'] : 0,
            'fileType' => $_FILES['shAchievementsFile']['type'],
        );
    }
    
    $allowedFile1 = array('pdf');
    $allowedFile2 = array('jpg', 'jpeg', 'png');
    //seperate the filename and its extension - file
    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));

    $fileExt2 = explode('.', $fileData2['fileName']);
    $fileActualExt2 = strtolower(end($fileExt2));

    $fileExt3 = explode('.', $fileData3['fileName']);
    $fileActualExt3 = strtolower(end($fileExt3));

    $fileExt4 = explode('.', $fileData4['fileName']);
    $fileActualExt4 = strtolower(end($fileExt4));

    $fileExt5 = explode('.', $fileData5['fileName']);
    $fileActualExt5 = strtolower(end($fileExt5));

    $fileExt6 = explode('.', $fileData6['fileName']);
    $fileActualExt6 = strtolower(end($fileExt6));

    $fileExt7 = explode('.', $fileData7['fileName']);
    $fileActualExt7 = strtolower(end($fileExt7));

    if (isset($fileData8)) {
        $fileExt8 = explode('.', $fileData8['fileName']);
        $fileActualExt8 = strtolower(end($fileExt8));
    }

    //resume and picture data
    $filesAndPicture = array(
        'allowed1' => $allowedFile1,  
        'allowed2' => $allowedFile2,
        'fileActualExt1' => $fileActualExt1,
        'fileActualExt2' => $fileActualExt2,
        'fileActualExt3' => $fileActualExt3,
        'fileActualExt4' => $fileActualExt4,
        'fileActualExt5' => $fileActualExt5,
        'fileActualExt6' => $fileActualExt6,
        'fileActualExt7' => $fileActualExt7,
        'fileActualExt8' => isset($fileData8) ? $fileActualExt8 : null,
        'fileName1' => $fileData1['fileName'],
        'fileName2' => $fileData2['fileName'],
        'fileName3' => $fileData3['fileName'],
        'fileName4' => $fileData4['fileName'],
        'fileName5' => $fileData5['fileName'],
        'fileName6' => $fileData6['fileName'],
        'fileName7' => $fileData7['fileName'],
        'fileName8' => isset($fileData8) ? $fileData8['fileName'] : null,
        'fileTmpName1' => $fileData1['fileTmpName'],
        'fileTmpName2' => $fileData2['fileTmpName'],
        'fileTmpName3' => $fileData3['fileTmpName'],
        'fileTmpName4' => $fileData4['fileTmpName'],
        'fileTmpName5' => $fileData5['fileTmpName'],
        'fileTmpName6' => $fileData6['fileTmpName'],
        'fileTmpName7' => $fileData7['fileTmpName'],
        'fileTmpName8' => isset($fileData8) ? $fileData8['fileTmpName'] : null,
    );

    //check if any input is  empty
    // foreach($scholarData as $data){
    //     if(empty($data)){
    //         //return to employee register page
    //         header("Location: ../Pages-scholar/appforms.php?scholar=emptyInput");
    //         exit();
    //     }
    // }


    //check if records already exist
    if($scholar->findByEmail($scholarData['email'])){

         //return to employee register page
        header("Location: ../Pages-scholar/appform.php?scholar=alreadyExist");
        exit();
    }


    //if theres no error from the resume file
    if ( $fileData1['fileError'] === 0 && $fileData2['fileError'] === 0 && $fileData3['fileError'] === 0
    && $fileData4['fileError'] === 0 && $fileData5['fileError'] === 0 && $fileData6['fileError'] === 0 && $fileData7['fileError'] === 0 && (
        isset($fileData8) ? $fileData8['fileError'] === 0 : true
    )) {

        $scholar->checkData($filesAndPicture, $scholarData, $_POST['studentType']);
    } else {
        echo "There was an error while uploading the file";
        exit();
    }


}
?>