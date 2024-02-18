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

    $scholarData = array(
        'fName' => trim($_POST["fName"]) ?? '',
        'mName' => trim($_POST["mName"]) ?? '',
        'lName' => trim($_POST["lName"]) ?? '',
        'suffix' => trim($_POST["suffix"]) ?? '',
        'gender' => trim($_POST["gender"]) ?? '',
        'age' => trim($_POST["age"]) ?? '',
        'nName' => trim($_POST["nName"]) ?? '',
        'cStatus' => trim($_POST["cStatus"]) ?? '',
        'citizenship' => trim($_POST["citizenship"]) ?? '',
        'dofBirth' => trim($_POST["dofBirth"]) ?? '',
        'bPlace' => trim($_POST["bPlace"]) ?? '',
        'height' => trim($_POST["height"]) ?? '',
        'weight' => trim($_POST["weight"]) ?? '',
        'religion' => trim($_POST["religion"]) ?? '',
        'mNumber' => trim($_POST["mNumber"]) ?? '',
        'email' => trim($_POST["email"]) ?? '',
        'address' => trim($_POST["address"]) ?? '',
        'province' => trim($_POST["province"]) ?? '',
        'mCondition' => trim($_POST["mCondition"]) ?? '',
        'fb_link' => trim($_POST["fbLink"]) ?? '',
        'skills' => trim($_POST["skills"]) ?? '',
        'fatherName' => trim($_POST["fatherName"]) ?? '',
        'fAge' => trim($_POST["fAge"]) ?? '',
        'fOccupation' => trim($_POST["fOccupation"]) ?? '',
        'fatherIncome' => trim($_POST["fatherIncome"]) ?? '',
        'fatherAttained' => trim($_POST["fatherAttained"]) ?? '',
        'motherName' => trim($_POST["motherName"]) ?? '',
        'motherAge' => trim($_POST["motherAge"]) ?? '',
        'motherOccupation' => trim($_POST["motherOccupation"]) ?? '',
        'motherIncome' => trim($_POST["motherIncome"]) ?? '',
        'motherAttained' => trim($_POST["motherAttained"]) ?? '',
        'guardian' => trim($_POST["guardian"]) ?? '',
        'emergencyContact' => trim($_POST["emergencyContact"]) ?? '',
        'relationship' => trim($_POST["relationship"]) ?? '',
        'guardianNumber' => trim($_POST["guardiancNumber"]) ?? '',
        'eSchool' => trim($_POST["eSchool"]) ?? '',
        'eAve' => trim($_POST["eAve"]) ?? '',
        'eAchievements' => trim($_POST["eAchievements"]) ?? '',
        'jhSchool' => trim($_POST["jhSchool"]) ?? '',
        'jhAve' => trim($_POST["jhAve"]) ?? '',
        'jhAchievements' => trim($_POST["jhAchievements"]) ?? '',
        'shSchool' => trim($_POST["shSchool"]) ?? '',
        'shAve' => trim($_POST["shAve"]) ?? '',
        'shAchievements' => trim($_POST["shAchievements"]) ?? '',
        'shCourse' => trim($_POST["shCourse"]) ?? '',
        'cSchool' => trim($_POST["cSchool"]) ?? '',
        'cAve' => trim($_POST["cAve"]) ?? '',
        'cAchievements' => trim($_POST["cAchievements"]) ?? '',
        'cCourse' => trim($_POST["cCourse"]) ?? '',
        
        'otherScholarship' => trim($_POST["otherScholarship"]) ?? '',
        'otherScholarType' => trim($_POST["otherScholarType"]) ?? '',
        'otherScholarCoverage' => trim($_POST["otherScholarCoverage"]) ?? '',
        'otherScholarStatus' => trim($_POST["otherScholarStatus"]) ?? '',

        'q1' => trim($_POST["q1"]) ?? '',
        'q2' => trim($_POST["q2"]) ?? '',
        'applyScho' => trim($_POST["applyScho"]) ?? '',
        'applySchoExplain' => trim($_POST["applySchoExplain"]) ?? '',
        'sName' => $_POST["sName"] ?? '',
        'sAge' => $_POST["sAge"] ?? '',
        'sOccupation' => $_POST["sOccupation"] ?? '',
        'sCstatus' => $_POST["sCstatus"] ?? '',
        'sReligion' => $_POST["sReligion"] ?? '',
        'sEattained' => $_POST["sEattained"] ?? '',
        'sub' => $_POST["sub"] ?? '',
        'totalUnits' => $_POST["totalUnits"] ?? '',
        'gAverage' => $_POST["gAverage"] ?? '',
        
        'collegeChoice' => $_POST["collegeSchool"] ?? [],
        'collegeCourse' => $_POST["collegeCourse"] ?? [],

        'entranceExam' => $entranceExam ?? [],
        'ifYes' => $ifYes ?? [],
        'ifNo' => $ifNo ?? [],
        'rowCount' => $_POST['rowCount']
    );
    $fileData1 = array(
        'fileName' => $_FILES['idPhoto']['name'],
        'fileTmpName' => $_FILES['idPhoto']['tmp_name'],
        'fileSize' => $_FILES['idPhoto']['size'],
        'fileError' => $_FILES['idPhoto']['error'],
        'fileType' => $_FILES['idPhoto']['type'],
    );
    // $fileData2 = array(
    //     'fileName' => $_FILES['affectTest']['name'],
    //     'fileTmpName' => $_FILES['affectTest']['tmp_name'],
    //     'fileSize' => $_FILES['affectTest']['size'],
    //     'fileError' => $_FILES['affectTest']['error'],
    //     'fileType' => $_FILES['affectTest']['type'],
    // );
    $fileData3 = array(
        'fileName' => $_FILES['famProf']['name'],
        'fileTmpName' => $_FILES['famProf']['tmp_name'],
        'fileSize' => $_FILES['famProf']['size'],
        'fileError' => $_FILES['famProf']['error'],
        'fileType' => $_FILES['famProf']['type'],
    );
    $fileData4 = array(
        'fileName' => $_FILES['letterIntent']['name'],
        'fileTmpName' => $_FILES['letterIntent']['tmp_name'],
        'fileSize' => $_FILES['letterIntent']['size'],
        'fileError' => $_FILES['letterIntent']['error'],
        'fileType' => $_FILES['letterIntent']['type'],
    );
    $fileData5 = array(
        'fileName' => $_FILES['parentConsent']['name'],
        'fileTmpName' => $_FILES['parentConsent']['tmp_name'],
        'fileSize' => $_FILES['parentConsent']['size'],
        'fileError' => $_FILES['parentConsent']['error'],
        'fileType' => $_FILES['parentConsent']['type'],
    );
    $fileData6 = array(
        'fileName' => $_FILES['copyGrades']['name'],
        'fileTmpName' => $_FILES['copyGrades']['tmp_name'],
        'fileSize' => $_FILES['copyGrades']['size'],
        'fileError' => $_FILES['copyGrades']['error'],
        'fileType' => $_FILES['copyGrades']['type'],
    );
    $fileData7 = array(
        'fileName' => $_FILES['copyBirthCert']['name'],
        'fileTmpName' => $_FILES['copyBirthCert']['tmp_name'],
        'fileSize' => $_FILES['copyBirthCert']['size'],
        'fileError' => $_FILES['copyBirthCert']['error'],
        'fileType' => $_FILES['copyBirthCert']['type'],
    );
    $fileData8 = array(
        'fileName' => $_FILES['certIndigency']['name'],
        'fileTmpName' => $_FILES['certIndigency']['tmp_name'],
        'fileSize' => $_FILES['certIndigency']['size'],
        'fileError' => $_FILES['certIndigency']['error'],
        'fileType' => $_FILES['certIndigency']['type'],
    );
    $fileData9 = array(
        'fileName' => $_FILES['recommendationLetter']['name'],
        'fileTmpName' => $_FILES['recommendationLetter']['tmp_name'],
        'fileSize' => $_FILES['recommendationLetter']['size'],
        'fileError' => $_FILES['recommendationLetter']['error'],
        'fileType' => $_FILES['recommendationLetter']['type'],
    );
    $fileData10 = array(
        'fileName' => $_FILES['goodMoral']['name'],
        'fileTmpName' => $_FILES['goodMoral']['tmp_name'],
        'fileSize' => $_FILES['goodMoral']['size'],
        'fileError' => $_FILES['goodMoral']['error'],
        'fileType' => $_FILES['goodMoral']['type'],
    );
    $fileData11 = array(
        'fileName' => $_FILES['copyhsDiploma']['name'],
        'fileTmpName' => $_FILES['copyhsDiploma']['tmp_name'],
        'fileSize' => $_FILES['copyhsDiploma']['size'],
        'fileError' => $_FILES['copyhsDiploma']['error'],
        'fileType' => $_FILES['copyhsDiploma']['type'],
    );
    $fileData12 = array(
        'fileName' => $_FILES['form137']['name'],
        'fileTmpName' => $_FILES['form137']['tmp_name'],
        'fileSize' => $_FILES['form137']['size'],
        'fileError' => $_FILES['form137']['error'],
        'fileType' => $_FILES['form137']['type'],
    );
    $fileData13 = array(
        'fileName' => $_FILES['acceptanceLetter']['name'],
        'fileTmpName' => $_FILES['acceptanceLetter']['tmp_name'],
        'fileSize' => $_FILES['acceptanceLetter']['size'],
        'fileError' => $_FILES['acceptanceLetter']['error'],
        'fileType' => $_FILES['acceptanceLetter']['type'],
    );
    $fileData14 = array(
        'fileName' => $_FILES['eForm']['name'],
        'fileTmpName' => $_FILES['eForm']['tmp_name'],
        'fileSize' => $_FILES['eForm']['size'],
        'fileError' => $_FILES['eForm']['error'],
        'fileType' => $_FILES['eForm']['type'],
    );
    $fileData15 = array(
        'fileName' => $_FILES['famPic']['name'],
        'fileTmpName' => $_FILES['famPic']['tmp_name'],
        'fileSize' => $_FILES['famPic']['size'],
        'fileError' => $_FILES['famPic']['error'],
        'fileType' => $_FILES['famPic']['type'],
    );
    $fileData16 = array(
        'fileName' => $_FILES['sketch']['name'],
        'fileTmpName' => $_FILES['sketch']['tmp_name'],
        'fileSize' => $_FILES['sketch']['size'],
        'fileError' => $_FILES['sketch']['error'],
        'fileType' => $_FILES['sketch']['type'],
    );
    $allowedFile2 = array('jpg', 'jpeg', 'png');
    $allowedFile1 = array('pdf');
    $allowedFile3 = array('pdf', 'jpg', 'jpeg', 'png');
    //seperate the filename and its extension - file
    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));

    // $fileExt2 = explode('.', $fileData2['fileName']);
    // $fileActualExt2 = strtolower(end($fileExt2));

    $fileExt3 = explode('.', $fileData3['fileName']);
    $fileActualExt3 = strtolower(end($fileExt3));

    $fileExt4 = explode('.', $fileData4['fileName']);
    $fileActualExt4 = strtolower(end($fileExt4));

    $fileExt5 = explode('.', $fileData4['fileName']);
    $fileActualExt5 = strtolower(end($fileExt5));
    
    $fileExt6 = explode('.', $fileData4['fileName']);
    $fileActualExt6 = strtolower(end($fileExt6));

    $fileExt7 = explode('.', $fileData4['fileName']);
    $fileActualExt7 = strtolower(end($fileExt7));

    $fileExt8 = explode('.', $fileData4['fileName']);
    $fileActualExt8 = strtolower(end($fileExt8));

    $fileExt9 = explode('.', $fileData4['fileName']);
    $fileActualExt9 = strtolower(end($fileExt9));

    $fileExt10 = explode('.', $fileData4['fileName']);
    $fileActualExt10 = strtolower(end($fileExt10));

    $fileExt11 = explode('.', $fileData4['fileName']);
    $fileActualExt11 = strtolower(end($fileExt11));

    $fileExt12 = explode('.', $fileData4['fileName']);
    $fileActualExt12 = strtolower(end($fileExt12));

    $fileExt13 = explode('.', $fileData4['fileName']);
    $fileActualExt13 = strtolower(end($fileExt13));

    $fileExt14 = explode('.', $fileData4['fileName']);
    $fileActualExt14 = strtolower(end($fileExt14));

    $fileExt15 = explode('.', $fileData4['fileName']);
    $fileActualExt15 = strtolower(end($fileExt15));

    $fileExt16 = explode('.', $fileData4['fileName']);
    $fileActualExt16 = strtolower(end($fileExt16));

    //resume and picture data
    $filesAndPicture = array(
        'allowed1' => $allowedFile1,  
        'allowed2' => $allowedFile2,
        'allowed3' => $allowedFile3,
        'fileActualExt1' => $fileActualExt1,
        'fileActualExt3' => $fileActualExt3,
        'fileActualExt4' => $fileActualExt4,
        'fileActualExt5' => $fileActualExt5,
        'fileActualExt6' => $fileActualExt6,
        'fileActualExt7' => $fileActualExt7,
        'fileActualExt8' => $fileActualExt8,
        'fileActualExt9' => $fileActualExt9,
        'fileActualExt10' => $fileActualExt10,
        'fileActualExt11' => $fileActualExt11,
        'fileActualExt12' => $fileActualExt12,
        'fileActualExt13' => $fileActualExt13,
        'fileActualExt14' => $fileActualExt14,
        'fileActualExt15' => $fileActualExt15,
        'fileActualExt16' => $fileActualExt16,
        'fileName1' => $fileData1['fileName'],
        'fileName3' => $fileData3['fileName'],
        'fileName4' => $fileData4['fileName'],
        'fileName5' => $fileData5['fileName'],
        'fileName6' => $fileData6['fileName'],
        'fileName7' => $fileData7['fileName'],
        'fileName8' => $fileData8['fileName'],
        'fileName9' => $fileData9['fileName'],
        'fileName10' => $fileData10['fileName'],
        'fileName11' => $fileData11['fileName'],
        'fileName12' => $fileData12['fileName'],
        'fileName13' => $fileData13['fileName'],
        'fileName14' => $fileData14['fileName'],
        'fileName15' => $fileData15['fileName'],
        'fileName16' => $fileData16['fileName'],
        'fileTmpName1' => $fileData1['fileTmpName'],
        'fileTmpName3' => $fileData3['fileTmpName'],
        'fileTmpName4' => $fileData4['fileTmpName'],
        'fileTmpName5' => $fileData5['fileTmpName'],
        'fileTmpName6' => $fileData6['fileTmpName'],
        'fileTmpName7' => $fileData7['fileTmpName'],
        'fileTmpName8' => $fileData8['fileTmpName'],
        'fileTmpName9' => $fileData9['fileTmpName'],
        'fileTmpName10' => $fileData10['fileTmpName'],
        'fileTmpName11' => $fileData11['fileTmpName'],
        'fileTmpName12' => $fileData12['fileTmpName'],
        'fileTmpName13' => $fileData13['fileTmpName'],
        'fileTmpName14' => $fileData14['fileTmpName'],
        'fileTmpName15' => $fileData15['fileTmpName'],
        'fileTmpName16' => $fileData16['fileTmpName']
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
        header("Location: ../Pages-scholar/appforms.php?scholar=alreadyExist");
        exit();
    }


    //if theres no error from the resume file
    if ( $fileData1['fileError'] === 0 && $fileData3['fileError'] === 0 && $fileData4['fileError'] === 0
    && $fileData5['fileError'] === 0 && $fileData6['fileError'] === 0 && $fileData7['fileError'] === 0 && $fileData8['fileError'] === 0 && $fileData9['fileError'] === 0
    && $fileData10['fileError'] === 0 && $fileData11['fileError'] === 0 && $fileData12['fileError'] === 0 && $fileData13['fileError'] === 0 && $fileData14['fileError'] === 0
    && $fileData15['fileError'] === 0 && $fileData16['fileError'] === 0) {

        $scholar->checkData($filesAndPicture, $scholarData);
    } else {
        echo "There was an error while uploading the file";
        exit();
    }


}
?>