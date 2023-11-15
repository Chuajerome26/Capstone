<?php

if(isset($_POST['submit'])){
    require '../classes/database.php';
    require '../classes/scholar.php';
    require '../classes/admin.php';

    $database = new Database();
    $scholar = new Scholar($database);

    //scholar data
    $scholarData = array(
        'f_name' => trim($_POST["f_name"]),
        'l_name' => trim($_POST["l_name"]),
        'gender' => trim($_POST["gender"]),
        'cStatus' => trim($_POST["cStatus"]),
        'citizenship' => trim($_POST["citizenship"]),
        'bday' => trim($_POST["bday"]),
        'bplace' => $_POST["bplace"],
        'religion' => $_POST["religion"],
        'mNum' => $_POST["mNum"],
        'email' => $_POST["email"],
        'address' => $_POST["address"],
        'totalSub' => trim($_POST["totalSub"]),
        'totalUnits' => trim($_POST["totalUnits"]),
        'gwa' => trim($_POST["gwa"]),
    );
  
    //file data
    $fileData = array(
        'fileName' => $_FILES['idPhoto']['name'],
        'fileTmpName' => $_FILES['idPhoto']['tmp_name'],
        'fileSize' => $_FILES['idPhoto']['size'],
        'fileError' => $_FILES['idPhoto']['error'],
        'fileType' => $_FILES['idPhoto']['type'],
    );
    $fileData1 = array(
        'fileName' => $_FILES['grades']['name'],
        'fileTmpName' => $_FILES['grades']['tmp_name'],
        'fileSize' => $_FILES['grades']['size'],
        'fileError' => $_FILES['grades']['error'],
        'fileType' => $_FILES['grades']['type'],
    );
    $fileData2 = array(
        'fileName' => $_FILES['PSA']['name'],
        'fileTmpName' => $_FILES['PSA']['tmp_name'],
        'fileSize' => $_FILES['PSA']['size'],
        'fileError' => $_FILES['PSA']['error'],
        'fileType' => $_FILES['PSA']['type'],
    );
    $fileData3 = array(
        'fileName' => $_FILES['goodMoral']['name'],
        'fileTmpName' => $_FILES['goodMoral']['tmp_name'],
        'fileSize' => $_FILES['goodMoral']['size'],
        'fileError' => $_FILES['goodMoral']['error'],
        'fileType' => $_FILES['goodMoral']['type'],
    );
    $fileData4 = array(
        'fileName' => $_FILES['eForm']['name'],
        'fileTmpName' => $_FILES['eForm']['tmp_name'],
        'fileSize' => $_FILES['eForm']['size'],
        'fileError' => $_FILES['eForm']['error'],
        'fileType' => $_FILES['eForm']['type'],
    );

    //seperate the filename and its extension - file
    $fileExt = explode('.', $fileData['fileName']);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpeg', 'png', 'jpg');

    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));
    $allowed1 = array('pdf', 'docx');

    $fileExt2 = explode('.', $fileData2['fileName']);
    $fileActualExt2 = strtolower(end($fileExt2));
    $allowed2 = array('jpeg','png','jpg');

    $fileExt3 = explode('.', $fileData3['fileName']);
    $fileActualExt3 = strtolower(end($fileExt3));
    $allowed3 = array('jpeg','png','jpg');

    $fileExt4 = explode('.', $fileData4['fileName']);
    $fileActualExt4 = strtolower(end($fileExt4));
    $allowed4 = array('jpeg','png','jpg');

    //resume and picture data
    $filesAndPicture = array(
        'allowed' => $allowed, 
        'allowed1' => $allowed1,
        'allowed2' => $allowed2, 
        'allowed3' => $allowed3,
        'allowed4' => $allowed4, 
        'fileActualExt' => $fileActualExt,
        'fileActualExt1' => $fileActualExt1,
        'fileActualExt2' => $fileActualExt2,
        'fileActualExt3' => $fileActualExt3,
        'fileActualExt4' => $fileActualExt4,
        'fileName' => $fileData['fileName'],
        'fileName1' => $fileData1['fileName'],
        'fileName2' => $fileData2['fileName'],
        'fileName3' => $fileData3['fileName'],
        'fileName4' => $fileData4['fileName'],
        'fileTmpName' => $fileData['fileTmpName'],
        'fileTmpName1' => $fileData1['fileTmpName'],
        'fileTmpName2' => $fileData2['fileTmpName'],
        'fileTmpName3' => $fileData3['fileTmpName'],
        'fileTmpName4' => $fileData4['fileTmpName']
    );

    //check if any input is  empty
    foreach($scholarData as $data){
        if(empty($data)){
            //return to employee register page
            header("Location: ../Pages/employee-register.php?scholar=emptyInput");
            exit();
        }
    }


    //check if records already exist
    if($scholar->findByEmail($scholarData['email'])){

         //return to employee register page
        header("Location: ../Pages-scholar/form.php?scholar=alreadyExist");
        exit();
    }


    //if theres no error from the resume file
    if ( $fileData['fileError'] === 0 && $fileData1['fileError'] === 0 && $fileData2['fileError'] === 0 && $fileData3['fileError'] === 0 && $fileData4['fileError'] === 0) {

        $scholar->checkData($filesAndPicture,
                             $scholarData);
    } else {
        echo "There was an error while uploading the file";
        exit();
    }


}
?>