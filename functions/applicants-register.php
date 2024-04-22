<?php

if(isset($_POST['submit'])){
    require '../classes/database.php';
    require '../classes/scholar.php';
    require '../classes/admin.php';

    $database = new Database();
    $scholar = new Scholar($database);

    //scholar data

    $entranceExam = array(isset($_POST['entranceExam_0']) ? $_POST['entranceExam_0']:"", 
                        isset($_POST['entranceExam_1']) ? $_POST['entranceExam_1']:"", 
                        isset($_POST['entranceExam_2']) ? $_POST['entranceExam_2']:""
                    );
    $ifYes = array(isset($_POST['yesStats_0']) ? $_POST['yesStats_0']:"", isset($_POST['yesStats_1']) ? $_POST['yesStats_1']:"", isset($_POST['yesStats_2']) ? $_POST['yesStats_2']:"");
    $ifNo = array(isset($_POST['noDate_0']) ? $_POST['noDate_0']:"", isset($_POST['noDate_1']) ? $_POST['noDate_1']:"", isset($_POST['noDate_2']) ? $_POST['noDate_2']:"");

    $dob = $_POST["dofBirth"];
    $dateOfBirth = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dateOfBirth)->y;

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
        'age' => trim($age) ?? '',
        'dofBirth' => trim($_POST["dofBirth"]) ?? '',
        'bPlace' => trim($_POST["bPlace"]) ?? '',
        'cStatus' => trim($_POST["cStatus"]) ?? '',
        'citizenship' => trim(isset($_POST["citizenship"]) && $_POST["citizenship"] == "Others" ? $_POST['citizenshipOtherOption'] : ($_POST["citizenship"] ?? '')) ?? '',
        'religion' => trim(isset($_POST["religion"]) && $_POST['religion'] == "Others" ? $_POST['religionOtherOption'] : ($_POST['religion'] ?? '') ) ?? '',
        'mNumber' => trim($_POST["mNumber"]) ?? '',
        'email' => trim($_POST["email"]) ?? '',
        'height' => trim($_POST["height"]) ?? '',
        'weight' => trim($_POST["weight"]) ?? '',


        'present_address' => trim($present_address) ?? '',
        'permanent_address' => trim($permanent_address) ?? '',

        'mCondition' => trim(isset($_POST["mCondition"]) && $_POST['mCondition'] == "yes" ? $_POST['pwd'] == "Others" ? $_POST['otherMedical']:$_POST['pwd']:'No') ?? '',
        'fb_link' => trim($_POST["fbLink"]) ?? '',

        'isDecF' => trim($_POST['fatherOption']) ?? '',
        'fDeceased' => trim(
            (isset($_POST['fDeceased']) && $_POST['fDeceased'] == "Others" 
            ? $_POST['otherDecF']
            : ($_POST['fDeceased'] ?? '')) 
            ?? '') ,       
        'fatherName' => trim($father_name) ?? '', 
        'fAge' => trim($_POST["fAge"]) ?? '',
        'fOccupation' => trim($_POST["fOccupation"]) ?? '',
        'fatherIncome' => trim($_POST["fatherIncome"]) ?? '',
        'fatherContact' => trim($_POST["fatherContact"]) ?? '',
        
        'isDecM' => trim($_POST['motherOption'] ?? ''),
        'mDeceased' => trim(
            (isset($_POST['mDeceased']) && $_POST['mDeceased'] == "Others" 
            ? $_POST['otherDecM']
            : ($_POST['mDeceased'] ?? '')) 
            ?? ''),
        'motherName' => trim($mother_name) ?? '',
        'motherAge' => trim($_POST["motherAge"]) ?? '',
        'motherOccupation' => trim($_POST["motherOccupation"]) ?? '',
        'motherIncome' => trim($_POST["motherIncome"]) ?? '',
        'motherContact' => trim($_POST["motherContact"]) ?? '',

        'guardian' => trim($_POST["guardian"]) ?? '',
        'emergencyContact' => trim($_POST["emergencyContact"]) ?? '',
        'relationship' => trim($_POST["relationship"]) ?? '',

        'eSchool' => trim($_POST["eSchool"]) ?? '',
        'eAve' => trim($_POST["eAve"]) ?? '',
        'eAchievements' => trim($_POST["eAchievements"]) ?? '',
        'jhSchool' => trim($_POST["jhSchool"]) ?? '',
        'jhAve' => trim($_POST["jhAve"]) ?? '',
        'jhAchievements' => trim($_POST["jhAchievements"]) ?? '',
        'shSchool' => trim(isset($_POST["shSchool"]) ? $_POST["shSchool"]:'') ?? '',
        'shAve' => trim(isset($_POST["shAve"]) ? $_POST["shAve"]:'') ?? '',
        'shAchievements' => trim(isset($_POST["shAchievements"]) ? $_POST["shAchievements"]:'') ?? '',
        'shCourse' => trim(isset($_POST["shCourse"]) ? $_POST["shCourse"]:'') ?? '',
        'cSchool' => trim($_POST["cSchool"]) ?? '',
        'cAve' => trim($_POST["cAve"]) ?? '',
        'cAchievements' => trim($_POST["cAchievements"]) ?? '',
        'cCourse' => trim($_POST["cCourse"]) ?? '',
        
        'stopAttend' => trim($_POST['stop_attend']) ?? '',
        'reason_attend' => trim($_POST['reason_attend']) ?? '',
        'yrlvl' => trim($_POST['yrlvl']) ?? '',
        'semester' => trim($_POST['semester']),

        'otherScholarship' => trim(isset($_POST["otherScholarship"]) ? $_POST["otherScholarship"]:'') ?? '',
        'otherScholarType' => trim(isset($_POST["otherScholarType"]) ? $_POST["otherScholarType"]:'') ?? '',
        'otherScholarCoverage' => trim(isset($_POST["otherScholarCoverage"]) ? $_POST["otherScholarCoverage"]:'') ?? '',
        'otherScholarStatus' => trim(isset($_POST["otherScholarStatus"]) ? $_POST["otherScholarStatus"]:'') ?? '',

        'q1' => trim($_POST["q1"]) ?? '',
        'q2' => trim($_POST["q2"]) ?? '',
        'applyScho' => trim($_POST["applyScho"]) ?? '',
        'applySchoExplain' => trim($_POST["applySchoExplain"]) ?? '',
        
        'sName' => $_POST["sName"] ?? '',
        'sAge' => $_POST["sAge"] ?? '',
        'sOccupation' => $_POST["sOccupation"] ?? '',
        'sCstatus' => $_POST["sCstatus"] ?? '',
        'sR' => $_POST["sR"] ?? '',
        'sEattained' => $_POST["sEattained"] ?? '',
        
        'sub' => $_POST["sub"] ?? '',
        'totalUnits' => $_POST["totalUnits"] ?? '',
        'gAverage' => $_POST["gAverage"] ?? '',
        
        'studType' => 'College'
    );

    $fileData1 = array(
        'fileName' => $_FILES['idPicture']['name'],
        'fileTmpName' => $_FILES['idPicture']['tmp_name'],
        'fileSize' => $_FILES['idPicture']['size'],
        'fileError' => $_FILES['idPicture']['error'],
        'fileType' => $_FILES['idPicture']['type'],
    );
    $fileData2 = array(
        'fileName' => $_FILES['cog']['name'],
        'fileTmpName' => $_FILES['cog']['tmp_name'],
        'fileSize' => $_FILES['cog']['size'],
        'fileError' => $_FILES['cog']['error'],
        'fileType' => $_FILES['cog']['type'],
    );
    $fileData3 = array(
        'fileName' => $_FILES['birth']['name'],
        'fileTmpName' => $_FILES['birth']['tmp_name'],
        'fileSize' => $_FILES['birth']['size'],
        'fileError' => $_FILES['birth']['error'],
        'fileType' => $_FILES['birth']['type'],
    );
    $fileData4 = array(
        'fileName' => $_FILES['indigency']['name'],
        'fileTmpName' => $_FILES['indigency']['tmp_name'],
        'fileSize' => $_FILES['indigency']['size'],
        'fileError' => $_FILES['indigency']['error'],
        'fileType' => $_FILES['indigency']['type'],
    );
    $fileData5 = array(
        'fileName' => $_FILES['form137']['name'],
        'fileTmpName' => $_FILES['form137']['tmp_name'],
        'fileSize' => $_FILES['form137']['size'],
        'fileError' => $_FILES['form137']['error'],
        'fileType' => $_FILES['form137']['type'],
    );
    
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
    

    //resume and picture data
    $filesAndPicture = array(
        'allowed1' => $allowedFile1,  
        'allowed2' => $allowedFile2,
        'fileActualExt1' => $fileActualExt1,
        'fileActualExt2' => $fileActualExt2,
        'fileActualExt3' => $fileActualExt3,
        'fileActualExt4' => $fileActualExt4,
        'fileActualExt5' => $fileActualExt5,
        'fileName1' => $fileData1['fileName'],
        'fileName2' => $fileData2['fileName'],
        'fileName3' => $fileData3['fileName'],
        'fileName4' => $fileData4['fileName'],
        'fileName5' => $fileData5['fileName'],
        'fileTmpName1' => $fileData1['fileTmpName'],
        'fileTmpName2' => $fileData2['fileTmpName'],
        'fileTmpName3' => $fileData3['fileTmpName'],
        'fileTmpName4' => $fileData4['fileTmpName'],
        'fileTmpName5' => $fileData5['fileTmpName'],
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
        header("Location: ../index.php?scholar=alreadyExist");
        exit();
    }


    //if theres no error from the resume file
    if ( $fileData1['fileError'] === 0 && $fileData2['fileError'] === 0 && $fileData3['fileError'] === 0
    && $fileData4['fileError'] === 0 && $fileData5['fileError'] === 0) {

        $scholar->checkData($filesAndPicture, $scholarData);
    } else {
        echo "There was an error while u ploading the file";
        exit();
    }


}
?>