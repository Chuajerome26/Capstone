<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
          $newapplicantInfo = $admin->getApplicantsFiles(8);
          $currentDate = date('Y-m-d');
          // Add 7 days to the current date
          $newDate = date('Y-m-d', strtotime($currentDate . ' +7 days'));

          var_dump($newapplicantInfo);
        
    ?>
</body>
</html>