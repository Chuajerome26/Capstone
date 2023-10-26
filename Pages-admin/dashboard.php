<?php
// start session
session_start();
$timezone = 'Asia/Manila';
date_default_timezone_set($timezone);
$lognow = date('H:i:s');

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    //get admin data 
    
    $id = $_SESSION['id'];
}
else {
    header("Location: ../index.php");
}

include("header.php");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCMF</title>
    <!-- SWEET ALERT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- BOOTSTRAP 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- ====== ICONS ========= -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- ==================== -->

  </head>
  <body>
                        <div class="container py-4">
                            <div class="row">
                                <div class="col" >
                                <button type="button" class="btn  ps-0 btn-light shadow btn-md p-2 w-100 vh-100 text-secondary" style="max-width: 200px; max-height: 50px;"  onclick="goToPage()">
                                <span class="ps-2 text-black" style="font-size: 18px;">8</span> Employee
                                <span ><i class=" text-primary fa-solid fa-circle-info p-0"  style="font-size: 18px;"></i></span>
                                </button>
                            </div>

                            <div class="col">
                                    <button type="button" class=" btn ps-0 btn-light shadow btn-md p-2 w-100 vh-100 text-secondary" style="max-width: 200px; max-height:  50px;" data-bs-toggle="modal" data-bs-target="#presentModal">
                                    <span class="p-2 text-black" style="font-size: 18px;">8</span>Presents 
                                    <span ><i class=" text-success fa-solid fa-circle-info p-0" style="font-size: 18px;" ></i></span>
                                    </button>
                                   
                            </div>

                            <div class="col">
                                    <button type="button" class=" btn ps-0 btn-light shadow btn-md p-2 w-100 vh-100 text-secondary" style="max-width: 200px;max-height:  50px;" data-bs-toggle="modal" data-bs-target="#absentModal">
                                    <span class="p-2 text-black"  style="font-size: 18px;">8</span> Absents 
                                    <span ><i class=" text-danger fa-solid fa-circle-info p-0" style="font-size: 18px;" ></i></span>
                                    </button>
                                    
                            </div>

                            <div class="col">
                                    <button type="button" class="btn  ps-0 btn-light shadow btn-md p-2 w-100 vh-100 text-secondary" style="max-width: 200px; max-height:  50px;"  data-bs-toggle="modal" data-bs-target="#WarningModal">
                                    <span class="p-2 text-black" style="font-size: 18px;">8</span> Warnings 
                                    <span ><i class=" text-warning fa-solid fa-circle-info  p-0"  style="font-size: 18px;"></i></span>
                                    </button>
                                   
                            </div>
                            <div class="col">
                                    <button type="button" class="btn ps-0  btn-light shadow btn-md p-2 w-100  vh-100  text-secondary" style="max-width: 200px; max-height:  50px;"   data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    <span class="p-2 text-black" style="font-size: 18px;">8</span>  Pending
                                    <span ><i class=" text-secondary fa-solid fa-circle-info p-0" style="font-size: 18px;"></i></span>
                                    </button>
                                </div>


                             </div>
                            </div>
                        <!---------------------------->
</body>