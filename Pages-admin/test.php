<?php

require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

$scholarInfo = $admin->getRemarks(45);

var_dump($scholarInfo);