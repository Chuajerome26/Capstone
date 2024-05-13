<?php 

require '../classes/database.php';
require '../classes/admin.php';

$database = new Database();
$admin = new Admin($database);

$title = $_POST['titleName'];
$vision = $_POST['vision'];
$mission = $_POST['mission'];

if(isset($_FILES['logo']['name']) && $_FILES['logo']['error'] == 0){
    $fileData1 = array(
        'fileName' => $_FILES['logo']['name'],
        'fileTmpName' => $_FILES['logo']['tmp_name'],
        'fileSize' => $_FILES['logo']['size'],
        'fileError' => $_FILES['logo']['error'],
        'fileType' => $_FILES['logo']['type'],
    );
    echo "error";
    
    $allowedFile2 = array('jpg', 'jpeg', 'png');
    $fileExt1 = explode('.', $fileData1['fileName']);
    $fileActualExt1= strtolower(end($fileExt1));
    
    
    $fileNameNew1 = uniqid('', true) . "." . $fileActualExt1;
    //file destination
    $fileDestination1 = '../images/' . $fileNameNew1;
    
    if(move_uploaded_file($fileData1['fileTmpName'],$fileDestination1)){
        
        $stmt = $database->getConnection()->prepare("UPDATE content_design SET title_name = ?, logo= ?, vision = ?, mission= ? WHERE id =1");
        if(!$stmt->execute([$title, $fileNameNew1, $vision, $mission])){
            header('Location: ../newdesign/customize-form.php?status=error');
            exit();
        }
        header('Location: ../newdesign/customize-form.php?status=updateContent');
        exit();
    }
}else{

    $contents = $admin->getContent();

    $stmt = $database->getConnection()->prepare("UPDATE content_design SET title_name = ?, logo= ?, vision = ?, mission= ? WHERE id = 1");

    if(!$stmt->execute([$title, $contents[0]['logo'], $vision, $mission])){
        header('Location: ../newdesign/customize-form.php?status=error');
        exit();
    }

    header('Location: ../newdesign/customize-form.php?status=updateContent');
    exit();
}
