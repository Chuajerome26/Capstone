<?php

require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

$scholarInfo = $admin->convertToDecimalFivePointScale(85);

var_dump($scholarInfo);