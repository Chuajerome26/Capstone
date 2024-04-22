<?php

require '../classes/database.php';
require '../classes/admin.php';
require '../classes/scholar.php';

$database = new Database();
$admin = new Admin($database);
$scholar = new Scholar($database);

if(isset($_POST['submit'])){
    $scholar_id = $_POST['scholar_id'];
    
    $scholarInfo = $admin->scholarInfo($scholar_id);

    if($scholarInfo[0]['studType'] == "College"){

        $name = $_POST['name'];
        $nameParts = explode(' ', $name);
        if(count($nameParts) < 4){
            $fname = $nameParts[0].' '.$nameParts[1];
            $mname = $nameParts[2];
            $lname = $nameParts[3];
            $suffix = $nameParts[4];
        }else{
            $fname = $nameParts[0];
            $mname = $nameParts[1];
            $lname = $nameParts[2];
        }
    
        if($scholarInfo['isDecF'] == "no"){

        }
    }

}