<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
         $arrayNames = array('Application Form', 'Id Photo', 'Family Profile', 'Letter of Intent', 'Parent Consent', 'Copy of Grades',
         'Birth Certificate', 'Indigency', 'Recommendation Letter', 'Good Moral', 'School Diploma', 'Form 137/138', 'Acceptance Letter'
     , 'Enrollment Form', 'Family Picture', 'Sketch of House Area');

     for($i = 0; $i < count($arrayNames); $i++){
        echo $arrayNames[$i]."\n";
     }
    ?>
</body>
</html>