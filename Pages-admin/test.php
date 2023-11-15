<?php

require '../classes/admin.php';
require '../classes/database.php';

$database = new Database();
$admin = new Admin($database);

$scholarInfo = $admin->scholarInfo(21);

var_dump($scholarInfo);