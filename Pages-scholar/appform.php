<?php 
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>CCMF FORM</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-body-teritory">

<header class="">

<nav class="navbar navbar-expand-lg transparent  w-100">
<div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center m-auto" >
        <img src="../images/consuelo.jpg" alt="Image" class="img-fluid" width="70px" height="70px">
        <h5 class="display-7 text-center ms-3">Consuelo Chito Madrigal Foundation Inc.(CCMFI)</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText"> <!-- Using justify-content-end to align items to the end -->
        <span class="navbar-text">
            <button type="button" class="btn btn-primary" onclick="logout()">Back</button>
        </span>
    </div>
</div>
</nav>
</header>
    <div class="container d-flex justify-content-center align-items-center vh-max-100">

        <div class="card w-100 p-4 mt-5 shadow">
        <!--- Di bale mamaya nalang mga alas singko --->
        <?php if($admin->isFormOpen()) {?>
        <form id="ccmfForm" method="POST" action="../functions/applicants-register.php" enctype="multipart/form-data">
            <!------- STEP 1 ------->
        <div class="step" id="step1">
            <h4 class="text-primary"> Personal Information </h4>
            <div class="border-bottom mb-3 border border-1"></div>
                <div class="row">
                <!--- Personal Infomartion --->
                <div class="col-md-3 mb-3">
                    <label  class="form-label">First Name:</label>
                    <input type="text" name="fName" class="form-control form-control-sm" placeholder="First Name" required>
                </div>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Middle Name:</label>
                    <input type="text" name="mName" class="form-control form-control-sm" placeholder="Optional">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Last Name:</label>
                    <input type="text" name="lName" class="form-control form-control-sm" placeholder="Last Name" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Suffix:</label>
                    <select class="form-select form-select-sm" name="suffix" aria-label="Default select example">
                    <option selected>Suffix(Optional)</option>
                    <option value="Jr.">Jr.</option>
                    <option value="Sr.">Sr.</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Gender:</label>
                    <select class="form-select form-select-sm" name="gender" aria-label="Default select example" required>
                    <option selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                    </select>
                </div>
               
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Age:</label>
                    <input type="text" name="age" id="ageko" class="form-control form-control-sm" placeholder="Age" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Nickname:</label>
                    <input type="text" name="nName" class="form-control form-control-sm" placeholder="Nickname" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Civil Status:</label>
                    <select class="form-select form-select-sm" name="cStatus" aria-label="Default select example" required>
                    <option selected>Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Legally Separated">Legally Separated</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Citizenship:</label>
                    <input type="text" name="citizenship" class="form-control form-control-sm" placeholder="Citizenship" required>
                </div>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Date of Birth:</label>
                    <input type="date" name="dofBirth" class="form-control form-control-sm" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Birth place:</label>
                    <input type="text" name="bPlace" class="form-control form-control-sm" placeholder="Birthplace" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Height:</label>
                    <input type="text" name="height" class="form-control form-control-sm" placeholder="Height" required>
                </div>

                
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Weight:</label>
                    <input type="text" name="weight" class="form-control form-control-sm" placeholder="Weight" required>
                </div>
            

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Religion:</label>
                    <input type="text" name="religion" class="form-control form-control-sm" placeholder="Religion" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Mobile Number:</label>
                    <input type="text" name="mNumber" id="mNumber" class="form-control form-control-sm" placeholder="Mobile Number" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Email Address:</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Email Address" required>
                    <div id="emailFeedback" class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Present Address:</label>
                    <select class="form-select form-select-sm" name="address" id="areaSelect" aria-label="Select Area" onchange="updateDistrict()" required>
                    <option selected>Barangay</option>
                    <!--District 1-->
                    <option value="Alicia" data-district="1">Alicia</option>
                    <option value="Bagong Pag-asa" data-district="1">Bagong Pag-asa</option>
                    <option value="Bahay Toro" data-district="1">Bahay Toro</option>
                    <option value="Balingasa" data-district="1">Balingasa</option>
                    <option value="Bungad" data-district="1">Bungad</option>
                    <option value="Damar" data-district="1">Damar</option>
                    <option value="Damayan" data-district="1">Damayan</option>
                    <option value="Del Monte" data-district="1">Del Monte</option>
                    <option value="Katipunan" data-district="1">Katipunan</option>
                    <option value="Lourdes" data-district="1">Lourdes</option>
                    <option value="Maharlika" data-district="1">Maharlika</option>
                    <option value="Manresa" data-district="1">Manresa</option>
                    <option value="Mariblo" data-district="1">Mariblo</option>
                    <option value="Masambong" data-district="1">Masambong</option>
                    <option value="N.S Amoranto" data-district="1">N.S Amoranto</option>
                    <option value="Nayong Kanluran" data-district="1">Nayong Kanluran</option>
                    <option value="Paang Bundok" data-district="1">Paang Bundok</option>
                    <option value="Pag-ibig sa Nayon" data-district="1">Pag-ibig sa Nayon</option>
                    <option value="Paltok" data-district="1">Paltok</option>
                    <option value="Paraiso" data-district="1">Paraiso</option>
                    <option value="Phil-Am" data-district="1">Phil-Am</option>
                    <option value="Project 6" data-district="1">Project 6</option>
                    <option value="Ramon Magsaysay" data-district="1">Ramon Magsaysay</option>
                    <option value="Saint Peter" data-district="1">Saint Peter</option>
                    <option value="Salvacion" data-district="1">Salvacion</option>
                    <option value="San Antonio" data-district="1">San Antonio</option>
                    <option value="San Isidro Labrador" data-district="1">San Isidro Labrador</option>
                    <option value="San Jose" data-district="1">San Jose</option>
                    <option value="Baesa" data-district="1">Santa Cruz</option>
                    <option value="Santa Teresita" data-district="1">Santa Teresita</option>
                    <option value="Santo Cristo" data-district="1">Santo Cristo</option>
                    <option value="Santo Domingo" data-district="1">Santo Domingo</option>
                    <option value="Siena" data-district="1">Siena</option>
                    <option value="Talayan" data-district="1">Talayan</option>
                    <option value="Vasra" data-district="1">Vasra</option>
                    <option value="Veterans Village" data-district="1">Veterans Village</option>
                    <option value="West Triangle" data-district="1">West Triangle</option>
                    <!--District 2-->
                    <option value="Bagong Silangan" data-district="2">Bagong Silangan</option>
                    <option value="Batasan Hills" data-district="2">Batasan Hills</option>
                    <option value="Commonwealth" data-district="2">Commonwealth</option>
                    <option value="Holy Spirit" data-district="2">Holy Spirit</option>
                    <option value="Payatas" data-district="2">Payatas</option>
                    <!--District 3-->
                    <option value="Amihan" data-district="3">Amihan</option>
                    <option value="Bagumbayan" data-district="3">Bagumbayan</option>
                    <option value="Bagumbuhay" data-district="3">Bagumbuhay</option>
                    <option value="Bayanihan" data-district="3">Bayanihan</option>
                    <option value="Blue Ridge A" data-district="3">Blue Ridge A</option>
                    <option value="Blue Ridge B" data-district="3">Blue Ridge B</option>
                    <option value="Camp Aguinaldo" data-district="3">Camp Aguinaldo</option>
                    <option value="Dioquino Zobel" data-district="3">Dioquino Zobel</option>
                    <option value="Duyan duyan" data-district="3">Duyan duyan</option>
                    <option value="E. Rodriguez" data-district="3">E. Rodriguez</option>
                    <option value="East Kamias" data-district="3">East Kamias</option>
                    <option value="Escopa I" data-district="3">Escopa I</option>
                    <option value="Escopa II" data-district="3">Escopa II</option>
                    <option value="Escopa III" data-district="3">Escopa III</option>
                    <option value="Escopa IV" data-district="3">Escopa IV</option>
                    <option value="Libis" data-district="3">Libis</option>
                    <option value="Loyola Heights" data-district="3">Loyola Heights</option>
                    <option value="Mangga" data-district="3">Mangga</option>
                    <option value="Marilag" data-district="3">Marilag</option>
                    <option value="Masagana" data-district="3">Masagana</option>
                    <option value="Matandang Balara" data-district="3">Matandang Balara</option>
                    <option value="Milagrosa" data-district="3">Milagrosa</option>
                    <option value="Pansol" data-district="3">Pansol</option>
                    <option value="Quirino 2-A" data-district="3">Quirino 2-A</option>
                    <option value="Quirino 2-B" data-district="3">Quirino 2-B</option>
                    <option value="Quirino 2-C" data-district="3">Quirino 2-C</option>
                    <option value="Quirino 3-A" data-district="3">Quirino 3-A</option>
                    <option value="Quirino 3-B" data-district="3">Quirino 3-B (Claro)</option>
                    <option value="San Roque" data-district="3">San Roque</option>
                    <option value="Silangan" data-district="3">Silangan</option>
                    <option value="Socorro" data-district="3">Socorro</option>
                    <option value="St. Ignatius" data-district="3">St. Ignatius</option>
                    <option value="Tagumpay" data-district="3">Tagumpay</option>
                    <option value="Ugong Norte" data-district="3">Ugong Norte</option>
                    <option value="Villa Mara Clara" data-district="3">Villa Mara Clara</option>
                    <option value="West Kamias" data-district="3">West Kamias</option>
                    <option value="White Plains" data-district="3">White Plains</option>
                    <!--District 4-->
                    <option value="Bagong Lipunan ng Crame" data-district="4">Bagong Lipunan ng Crame</option>
                    <option value="Botocan" data-district="4">Botocan</option>
                    <option value="Central" data-district="4">Central</option>
                    <option value="Damayang Lagi" data-district="4">Damayang Lagi</option>
                    <option value="Don Manuel" data-district="4">Don Manuel</option>
                    <option value="Doña Aurora" data-district="4">Doña Aurora</option>
                    <option value="Doña Imelda" data-district="4">Doña Imelda</option>
                    <option value="Doña Josefa" data-district="4">Doña Josefa</option>
                    <option value="Duyan duyan" data-district="4">Duyan duyan</option>
                    <option value="Horseshoe" data-district="4">Horseshoe</option>
                    <option value="Immaculate Concepcion" data-district="4">Immaculate Concepcion</option>
                    <option value="Kalusugan" data-district="4">Kalusugan</option>
                    <option value="Kamuning" data-district="4">Kamuning</option>
                    <option value="Kaunlaran" data-district="4">Kaunlaran</option>
                    <option value="Kristong Hari" data-district="4">Kristong Hari</option>
                    <option value="Krus na Ligas" data-district="4">Krus na Ligas</option>
                    <option value="Laging Handa " data-district="4">Laging Handa </option>
                    <option value="Malaya" data-district="4">Malaya</option>
                    <option value="Mariana" data-district="4">Mariana</option>
                    <option value="Obrero" data-district="4">Obrero</option>
                    <option value="Old Capitol Site" data-district="4">Old Capitol Site</option>
                    <option value="Paligsahan" data-district="4">Paligsahan</option>
                    <option value="Pinagkaisahan" data-district="4">Pinagkaisahan</option>
                    <option value="Pinyahan" data-district="4">Pinyahan</option>
                    <option value="Roxas" data-district="4">Roxas</option>
                    <option value="Sacred Heart" data-district="4">Sacred Heart</option>
                    <option value="San Isidro Galas" data-district="4">San Isidro Galas</option>
                    <option value="San Martin de Porres" data-district="4">San Martin de Porres</option>
                    <option value="San Vicente" data-district="4">San Vicente</option>
                    <option value="Santol" data-district="4">Santol</option>
                    <option value="Sikatuna Village" data-district="4">Sikatuna Village</option>
                    <option value="South Triangle" data-district="4">South Triangle</option>
                    <option value="Sto. Niño" data-district="4">Sto. Niño</option>
                    <option value="Tatalon" data-district="4">Tatalon</option>
                    <option value="Teacher's Village East" data-district="4">Teacher's Village East</option>
                    <option value="Teacher's Village West" data-district="4">Teacher's Village West</option>
                    <option value="UP Campus" data-district="4">UP Campus</option>
                    <option value="UP Village" data-district="4">UP Village</option>
                    <option value="Valencia" data-district="4">Valencia</option>
                    <!--District 5-->
                    <option value="Bagbag" data-district="5">Bagbag</option>
                    <option value="Capri" data-district="5">Capri</option>
                    <option value="Fairview" data-district="5">Fairview</option>
                    <option value="Greater Lagro" data-district="5">Greater Lagro</option>
                    <option value="Gulod" data-district="5">Gulod</option>
                    <option value="Kaligayahan" data-district="5">Kaligayahan</option>
                    <option value="Nagkaisang Nayon" data-district="5">Nagkaisang Nayon</option>
                    <option value="North Fairview" data-district="5">North Fairview</option>
                    <option value="Novaliches" data-district="5">Novaliches</option>
                    <option value="Pasong Putik" data-district="5">Pasong Putik</option>
                    <option value="San Agustin" data-district="5">San Agustin</option>
                    <option value="San Bartolome" data-district="5">San Bartolome</option>
                    <option value="Sta. Lucia" data-district="5">Sta. Lucia</option>
                    <option value="Sta. Monica" data-district="5">Sta. Monica</option>
                    <!--District 6-->
                    <option value="Apolonio Samson" data-district="6">Apolonio Samson</option>
                    <option value="Baesa" data-district="6">Baesa</option>
                    <option value="Balon Bato" data-district="6">Balon Bato</option>
                    <option value="Culiat" data-district="6">Culiat</option>
                    <option value="New Era" data-district="6">New Era</option>
                    <option value="Pasong Tamo" data-district="6">Pasong Tamo</option>
                    <option value="Sangandaan" data-district="6">Sangandaan</option>
                    <option value="Sauyo" data-district="6">Sauyo</option>
                    <option value="Talipapa" data-district="6">Talipapa</option>
                    <option value="Tandang Sora" data-district="6">Tandang Sora</option>
                    <option value="Unang Sigaw" data-district="6">Unang Sigaw</option>
                    </select>
                    <input type="text" name="present_district" id="districtField" class="form-control form-control-sm" placeholder="District" required>
                    <input type="text" name="present_city" class="form-control form-control-sm" value="Quezon City" readonly>
                    <input type="text" name="present_province" class="form-control form-control-sm" value="Metro Manila" readonly>
                    <input type="text" name="present_zip" class="form-control form-control-sm" placeholder="Zip Code" required>
                </div>
                    <!--Auto Fill na to young padre-->
                <div class="col-md-3 mb-3">
                    <label class="form-label">Permanent Address:</label>
                    <input type="text" name="permanent_barangay" class="form-control form-control-sm" placeholder="Barangay" required>
                    <input type="text" name="permanent_district" class="form-control form-control-sm" placeholder="District" required>
                    <input type="text" name="permanent_city" class="form-control form-control-sm" placeholder="City" required>
                    <input type="text" name="permanent_province" class="form-control form-control-sm" placeholder="Province" required>
                    <input type="text" name="permanent_zip" class="form-control form-control-sm" placeholder="Zip Code" required>
                    <input type="checkbox" id="sameAsPresent"> <label for="sameAsPresent">Same as Present Address</label>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Medical Conditions:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pwdOption" value="yes" onclick="showOtherScholarshipField('inputeMedical')">
                        <label class="form-check-label">Yes</label>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="form-check-input" type="radio" name="pwdOption" value="no" onclick="hideOtherScholarshipField('inputeMedical')">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <!--Lalabas lang to gar kapag nag yes-->
                <div class="col-md-3 mb-3" id="inputeMedical" style="display: none;">
                    <label  class="form-label">Please specify(if applicable):</label>
                    <select class="form-select form-select-sm" name="pwd" aria-label="Default select example">
                    <option selected>Options</option>
                    <option value="Physical Disabilities">Physical Disabilities</option>
                    <option value="Visual Impairments">Visual Impairments</option>
                    <option value="Hearing Impairments">Hearing Impairments</option>
                    <option value="Intellectual Disabilities">Intellectual Disabilities</option>
                    <option value="Psychological or Mental Health Disabilities">Psychological or Mental Health Disabilities</option>
                    <option value="Learning Disabilities">Learning Disabilities</option>
                    <option value="Neurological Disabilities">Neurological Disabilities</option>
                    <option value="Chronic Health Conditions">Chronic Health Conditions</option>
                    <option value="Speech or Communication Disorders">Speech or Communication Disorders</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Skills/Hobbies/Interest/Talents</label>
                    <textarea class="form-control" name="skills" placeholder="Skills/Hobbies/Interest/Talents" required></textarea>
                </div>

                </div>
                    <!--- End Personal Infomartion --->

                    <!--- Family Infomartion --->
                
                <div class="row mt-4">
                    <h4 class="text-primary"> Family Information (if applicable) </h4>
                    <div class="border-bottom mb-3 border border-1"></div>
                            
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Father Name:</label>
                    <input type="text" name="fatherName" class="form-control form-control-sm" placeholder="Father Name">
                </div>
            

                <div class="col-md-1 mb-3">
                    <label  class="form-label">Age:</label>
                    <input type="text" name="fAge" id="fAge" class="form-control form-control-sm" placeholder="Age">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="fOccupation" class="form-control form-control-sm" placeholder="Occupation">
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Monthly Income:</label>
                    <input type="text" name="fatherIncome" id="fatherIncome" class="form-control form-control-sm" placeholder="Monthly Income">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Highest Level Attained:</label>
                    <input type="text" name="fatherAttained" class="form-control form-control-sm" placeholder="Highest Level Attained (Optional)">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Mother Name:</label>
                    <input type="text" name="motherName" class="form-control form-control-sm" placeholder="Mother Name">
                </div>
             

                <div class="col-md-1 mb-3">
                    <label  class="form-label">Age:</label>
                    <input type="text" name="motherAge" id="motherAge" class="form-control form-control-sm" placeholder="Age">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="motherOccupation" class="form-control form-control-sm" placeholder="Occupation">
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Monthly Income:</label>
                    <input type="text" name="motherIncome" id="motherIncome" class="form-control form-control-sm" placeholder="Monthly Income">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Highest Level Attained:</label>
                    <input type="text" name="motherAttained" class="form-control form-control-sm" placeholder="Highest Level Attained (Optional)">
                </div>


                
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Guardian:</label>
                    <input type="text" name="guardian" class="form-control form-control-sm" placeholder="Gurdian">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Emergency Contact:</label>
                    <input type="text" name="emergencyContact" id="emergencyContact" class="form-control form-control-sm" placeholder="Emergency Contact">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Relationship:</label>
                    <input type="text" name="relationship" class="form-control form-control-sm" placeholder="Relationship">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Contact Number:</label>
                    <input type="text" name="guardiancNumber" id="guardiancNumber" class="form-control form-control-sm" placeholder="Contact Number">
                </div>

                    
            
                </div>
                        <!--- End Family Infomartion --->

                        <!--- Siblings Information --->
            <div class="row mt-4">
                <div class="hstack gap-3">
                    <div class="p-2">
                    <h4 class="text-primary"> Sibling/s Information </h4>
                    </div>
                    <div class="p-2">
                        <button class="btn btn-primary btn-sm shadow " onclick="addSiblingRow(event)">Add Row</button>
                    </div>
                </div>

                <div class="border-bottom mb-3 border border-1"></div>

                <div id="siblingsContainer">
                    <div class="box sibling-row">
                    <div class="row">
                    
                        <div class="col-md-3 mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" name="sName[]" class="form-control form-control-sm" placeholder="Name">
                        </div>

                        <div class="col-md-3 mb-3">
                        <label class="form-label">Age:</label>
                        <input type="text" name="sAge[]" id="sAge" class="form-control form-control-sm" placeholder="Age">
                        </div>

                        <!-- <div class="col-md-3 mb-3">
                        <label class="form-label">Relationship:</label>
                        <input type="text" name="sRelationship[]" class="form-control form-control-sm" placeholder="Relationship">
                        </div> -->

                        <div class="col-md-3 mb-3">
                        <label class="form-label">Occupation:</label>
                        <input type="text" name="sOccupation[]" class="form-control form-control-sm" placeholder="Occupation">
                        </div>

                        <div class="col-md-3 mb-3">
                        <label class="form-label">Civil Status:</label>
                        <input type="text" name="sCstatus[]" class="form-control form-control-sm" placeholder="Civil Status">
                        </div>

                        <div class="col-md-3 mb-3">
                        <label class="form-label">Religion:</label>
                        <input type="text" name="sReligion[]" class="form-control form-control-sm" placeholder="Religion">
                        </div>

                        <div class="col-md-3 mb-3">
                        <label class="form-label">Educational Attainment:</label>
                        <input type="text" name="sEattained[]" class="form-control form-control-sm" placeholder="Educational Attainment">
                        </div>
                        
                        <hr class="border border-2" style="color: black;">
                    </div>
                    </div>
                </div>
                </div>


        <div class="d-flex justify-content-center">
        <button type="button" id="next" class="btn btn-primary w-25 next-step" type="button">Next</button>
        </div>

        </div>  

          <!----- STEP 2 ------->
        <div class="step" id="step2" style="display: none;">
            <h4 class="text-primary"> Academic Information </h4>
            <div class="border-bottom mb-3 border border-1"></div>

                    <div class="row"> 
                <div class="col-md-4 mb-3">
                    <label  class="form-label">Elementary School:</label>
                    <input type="text" name="eSchool" class="form-control form-control-sm" placeholder="Elementary School" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Academic Average:</label>
                    <input type="text" name="eAve" class="form-control form-control-sm" placeholder="Academic Average" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Achievements::</label>
                    <input type="text" name="eAchievements" class="form-control form-control-sm" placeholder="Achievements:" >
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Junior High School:</label>
                    <input type="text" name="jhSchool" class="form-control form-control-sm" placeholder="Junior High School" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Academic Average:</label>
                    <input type="text" name="jhAve" class="form-control form-control-sm" placeholder="Academic Average" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Achievements:</label>
                    <input type="text" name="jhAchievements" class="form-control form-control-sm" placeholder="Achievement" >
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Senior High School:</label>
                    <input type="text" name="shSchool" class="form-control form-control-sm" placeholder="Senior High School" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Academic Average:</label>
                    <input type="text" name="shAve" class="form-control form-control-sm" placeholder="Academic Average"required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Achievements:</label>
                    <input type="text" name="shAchievements" class="form-control form-control-sm" placeholder="Achievements">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Strand and Year Level:</label>
                    <input type="text" name="shCourse" class="form-control form-control-sm" placeholder="Strand and Year Level" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">College:</label>
                    <input type="text" name="cSchool" class="form-control form-control-sm" placeholder="College">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Academic Average:</label>
                    <input type="text" name="cAve" class="form-control form-control-sm" placeholder="Academic Average">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Achievements:</label>
                    <input type="text" name="cAchievements" class="form-control form-control-sm" placeholder="Achievements">
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Course and Year Level:</label>
                    <input type="text" name="cCourse" class="form-control form-control-sm" placeholder="Course and Year Level:">
                </div>


                    </div>

                    <div class="hstack gap-3">

    <div class="p-2">
        <h4 class="text-primary">Grade Information </h4>
    </div>
    <div class="p-2">
    <button class="btn btn-primary btn-sm shadow" onclick="addGradeRow(event)">Add Row</button>
    </div>
</div>
<div class="border-bottom mb-3 border border-1"></div>

<div class="sub">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Subject:</label>
            <input type="text" name="sub[]" class="form-control form-control-sm" placeholder="Subject" required>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Grade:</label>
            <input type="text" name="gAverage[]" class="form-control form-control-sm" placeholder="Grade" required>
        </div>
        <hr class="border border-2" style="color: black;">
    </div>
</div>
            <div class="d-flex justify-content-center gap-2">
            <button class="btn btn-secondary w-25 prev-step" type="button">Previous</button>
            <button  class="btn btn-primary w-25 next-step" type="button">Next</button>
            </div>


        </div>  

   


          <!------- STEP 3 ------->
          <div class="step" id="step3" style="display: none;">
            <h4 class="text-primary">COLLEGES/UNIVERSITIES OF CHOICE  </h4>
            <div class="border-bottom mb-3 border border-1"></div>

            <div class="hstack gap-3">
    <div class="p-2">
        <h6 class="text-primary"> (IF INCOMING FRESHMAN) </h6>
    </div>
    <div class="p-2">
        <button class="btn btn-primary btn-sm shadow" type="button" onclick="addSchoolRow()">Add Row</button>
    </div>
</div>

<div id="school-rows">
    <!-- Existing input row -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label class="form-label">School Name</label>
            <input type="text" name="collegeSchool[]" class="form-control form-control-sm" placeholder="School Name">
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Course/Degree Major</label>
            <input type="text" name="collegeCourse[]" class="form-control form-control-sm" placeholder="Course/Degree Major">
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Entrance Exam Taken?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="entranceExam_0" value="yes" onclick="showInputField(this)" id="radioYes0">
                <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="entranceExam_0" value="no" onclick="showInputField(this)" id="radioNo0">
                <label class="form-check-label">No</label>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <button type="button" class="btn btn-danger" onclick="removeSchoolRow(this)">Remove</button>
        </div>
        <div class="col-md-6 input-fields">
            <div class="inputFieldYes" style="display: none;">
                <div class="col-md-12 mb-3">
                    <label class="form-label">If "YES":</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="yesStats_0" value="Pass">
                        <label class="form-check-label">PASS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="yesStats_0" value="Failed">
                        <label class="form-check-label">FAIL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="yesStats_0" value="Waitlist">
                        <label class="form-check-label">WAITLIST</label>
                    </div>
                </div>
            </div>

            <div class="inputFieldNo" style="display: none;">
                <div class="col-md-12 mb-3">
                    <label class="form-label">If "NO", When:</label>
                    <input type="date" name="noDate_0" class="form-control form-control-sm">
                </div>
            </div>
        </div>
        <input type="hidden" name="rowCount" id="rowCount" value="0">
        <hr class="border border-2" style="color: black;">
    </div>
</div>




<div class="col-md-6 mb-3">
    <label class="form-label">Did you apply for / are you a recipient of another scholarship?</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="otherScholarship" value="yes" onclick="showOtherScholarshipField('inputYes')">
        <label class="form-check-label">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="otherScholarship" value="no" onclick="hideOtherScholarshipField('inputYes')">
        <label class="form-check-label">No</label>
    </div>
</div>
<div class="col-md-12 mb-3">
<div class="input-fields">
    <div id="inputYes" style="display: none;">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Type:</label>
            <input type="text" class="form-control form-control-sm" name="otherScholarType" id="otherScholarshipYesField" placeholder="Type">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Coverage:</label>
            <input type="text" class="form-control form-control-sm" name="otherScholarCoverage" id="otherScholarshipYesField" placeholder="Coverage">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Status:</label>
            <input type="text" class="form-control form-control-sm" name="otherScholarStatus" id="otherScholarshipYesField" placeholder="Status">
        </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
            <label class="form-label">How did you learn about CCMFI Scholarship?</label>
            <input type="text" class="form-control form-control-sm" name="q1" id="otherScholarshipYesField" placeholder="How did you learn about CCMFI Scholarship" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Why are you applying for this scholarship?</label>
            <input type="text" class="form-control form-control-sm" name="q2" id="otherScholarshipYesField" placeholder="How did you learn about CCMFI Scholarship" required>
        </div>
      
        
        <div class="col-md-6 mb-3">
            <label class="form-label">Will you pursue your studies even without this scholarship?</label>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="applyScho" id="exampleRadios1" value="yes" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Yes
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="applyScho" id="exampleRadios2" value="no">
                <label class="form-check-label" for="exampleRadios2">
                    No
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="applyScho" id="exampleRadios3" value="i dont know" >
                <label class="form-check-label" for="exampleRadios3">
                    I Dont know
                </label>
                </div>
              

        </div>
        <div class="col-md-7 mb-3">
            <label class="form-label">Explain your Answer:</label>
            <input type="text" class="form-control form-control-sm" name="applySchoExplain" id="otherScholarshipYesField" placeholder="Answer">
        </div>
        </div>


<div class="d-flex justify-content-center gap-2">
    <button class="btn btn-secondary w-25 prev-step" type="button">Previous</button>
    <button class="btn btn-primary w-25 next-step" type="button">Next</button>
</div>


        </div>  



          <!------- STEP 4 ------->
          <div class="step" id="step4" style="display: none;">
            <h4 class="text-primary"> Requirements </h4>
            <div class="border-bottom mb-3 border border-1"></div>

                    <div class="row">

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">2x2 ID photo</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="idPhoto" accept="image/jpeg,image/jpg,image/png" required>
                    </div>

                    <!-- <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Affectivity Test</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="affectTest" accept="application/pdf,image/jpeg,image/jpg">
                    </div> -->
                    <?php
                    $appliTemp = $admin->getFamTemp();
                        foreach($appliTemp as $a){
                    ?>
                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Family Profile</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="famProf" accept="application/pdf" required>
                    <a href="../Uploads_gslip/<?php echo $a["fam_temp"]; ?>" target="_blank">Download for template</a>
                    </div>
                    <?php } ?>
                    
                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Letter of Intent</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="letterIntent" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Written Parent Consent</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="parentConsent" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Latest Copy of Grades</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="copyGrades" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Copy of Birth Certificate</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="copyBirthCert" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Certificate of Indigency</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="certIndigency" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Recommendation Letter from Adviser/Principal</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="recommendationLetter" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Certificate of Good Moral</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="goodMoral" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Copy of High School Diploma</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="copyhsDiploma" accept="application/pdf" required> 
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Copy of Form 137/138</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="form137" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Copy of College/University Acceptance Letter</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="acceptanceLetter" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Copy of Enrollment Form</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="eForm" accept="application/pdf" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Family Picture</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="famPic" accept="image/jpeg,image/jpg,image/png" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Sketch of House Area and Directions for Commuting from CCMF site</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="sketch" accept="application/pdf,image/jpeg,image/jpg,image/png" required>
                    </div>

                    <div class="col-md-12 mb-3 my-2">
                    <div class="mx-1"><input type="checkbox" class="mx-20" id="checkConfirm" name="checkConfirm">    I hereby declare that all information provided and documents submitted in support of my scholarship application are true and accurate. I give my consent to CCMF to collect, use and process my personal information. Furthermore, I confirm my compliance with the Data Privacy Act of 2012, ensuring the confidentiality and protection of any personal data shared in this application process.</div>
                    </div>
                    </div>


              
            <div class="d-flex justify-content-center gap-2">
            <button class="btn btn-secondary w-25 prev-step" type="button">Previous</button>
            <button class="btn btn-primary w-25" type="submit" name="submit" id="submitForm" onclick="updateRowCount()" disabled>Submit</button>
            </div>

        </div>  


        </form>
        <?php
        } else {
            // Ah sarado, bibili sana ko mighty yung sigariryo
            echo '<p style="font-weight: bold; font-size: larger; text-align:center;">The application form is currently closed. It is open from 8:00 AM to 5:00 PM.</p>';
        }
        ?>
        
        </div>
    </div>

    <script>
        //Function for email validation
        document.addEventListener("DOMContentLoaded", function() {
        let emailInput = document.getElementById("email");

        function validateEmailInput(input) {
            let inputValue = input.value.trim();
            let isValid = true;

            if (!/\S+@\S+\.\S+/.test(inputValue)) {
                isValid = false;
            }

            if (!isValid) {
                input.classList.remove("is-valid");
                input.classList.add("is-invalid");
                document.getElementById("emailFeedback").style.display = "block";
            } else {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
                document.getElementById("emailFeedback").style.display = "none";
            }
        }

        // Add event listener to email input for validation
        emailInput.addEventListener("input", function() {
            validateEmailInput(emailInput);
        });
    });

        //function for same as present address
        document.getElementById('sameAsPresent').addEventListener('change', function() {
        if (this.checked) {
            // Copy values from present address to permanent address
            document.querySelector('input[name="permanent_barangay"]').value = document.querySelector('select[name="address"]').value;
            document.querySelector('input[name="permanent_district"]').value = document.querySelector('#districtField').value;
            document.querySelector('input[name="permanent_city"]').value = "Quezon City";
            document.querySelector('input[name="permanent_province"]').value = "Metro Manila";
            document.querySelector('input[name="permanent_zip"]').value = document.querySelector('input[name="present_zip"][placeholder="Zip Code"]').value;
        } else {
            // Clear permanent address fields if unchecked
            document.querySelector('input[name="permanent_barangay"]').value = '';
            document.querySelector('input[name="permanent_district"]').value = '';
            document.querySelector('input[name="permanent_city"]').value = '';
            document.querySelector('input[name="permanent_province"]').value = '';
            document.querySelector('input[name="permanent_zip"]').value = '';
        }
    });
    //function for District Auto Fill
    function updateDistrict() {
    var selectElement = document.getElementById("areaSelect");
    var districtField = document.getElementById("districtField");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var district = selectedOption.getAttribute('data-district');

    if (district) {
        districtField.value = "District " + district;
    } else {
        districtField.value = ""; // Clear the field or handle as needed
    }
}
    </script>

    <script>
        const checkbox = document.getElementById("checkConfirm");
        const submitBtn = document.getElementById("submitForm");
        // Add event listener to the checkbox
        checkbox.addEventListener("change", function() {
            // If checkbox is checked, enable submit button, otherwise disable it
            if (this.checked) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        });
        // Function to enforce numeric-only input in specified element
        function allowNumbersOnly(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any non-digit character with an empty string
                this.value = this.value.replace(/\D/g, '');
            });
        }

        // Apply the function to your input elements
        allowNumbersOnly('mNumber');
        allowNumbersOnly('emergencyContact');
        allowNumbersOnly('motherIncome');
        allowNumbersOnly('fatherIncome');
        allowNumbersOnly('ageko');
        allowNumbersOnly('fAge');
        allowNumbersOnly('sAge');
        allowNumbersOnly('motherAge');
        allowNumbersOnly('guardiancNumber');

    </script>




    <script>
    // Initialize variables
    let currentStep = 1;
    const form = document.getElementById('ccmfForm');
    const steps = document.querySelectorAll('.step');
    const nextBtns = document.querySelectorAll('.next-step');
    const prevBtns = document.querySelectorAll('.prev-step');

    // Function to show the current step and hide others
    function showStep(stepNumber) {
        steps.forEach((step, index) => {
            if (index + 1 === stepNumber) {
                step.style.display = 'block';
            } else {
                step.style.display = 'none';
            }
        });
    }

    // Function to reset border color of input fields
    function resetInputBorders(stepNumber) {
        const currentStepInputs = steps[stepNumber - 1].querySelectorAll('input[required]');
        currentStepInputs.forEach(input => {
            input.style.borderColor = ''; // Reset border color to default
        });
    }

    // Function to remove error message span
    function removeErrorMessage(stepNumber) {
        const currentStepInputs = steps[stepNumber - 1].querySelectorAll('input[required]');
        currentStepInputs.forEach(input => {
            const errorMessage = input.parentNode.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        });
    }

    // Initial setup
    showStep(currentStep);

    nextBtns.forEach((nextBtn, index) => {
    nextBtn.addEventListener('click', () => {
        // Check if there are any required fields in the current step that are empty
        const currentStepInputs = steps[currentStep - 1].querySelectorAll('input[required]');
        let canProceed = true;

        for (let i = 0; i < currentStepInputs.length; i++) {
            const input = currentStepInputs[i];
            if (!input.value.trim()) { // Check if the input value is empty after trimming whitespace
                canProceed = false;
                // Add a visual indicator to the empty input field (e.g., change border color to red)
                input.style.borderColor = 'red';
                // Optionally, you can also display an error message next to the input field if it doesn't already exist
                const errorMessage = input.parentNode.querySelector('.error-message');
                if (!errorMessage) {
                    const errorMessage = document.createElement('span');
                    errorMessage.textContent = 'This field is required';
                    errorMessage.classList.add('error-message');
                    errorMessage.style.color = 'red';
                    input.parentNode.appendChild(errorMessage);
                }
                break; // Break out of the loop if any required field is empty
            }
        }

        // If all required fields are filled, proceed to the next step
        if (canProceed && currentStep < steps.length) {
            resetInputBorders(currentStep); // Reset border color of input fields for the current step
            removeErrorMessage(currentStep); // Remove error message span for the current step
            currentStep++;
            showStep(currentStep);
        }

        // Update button visibility based on the current step
        if (currentStep === steps.length) {
            nextBtn.style.display = 'none';
        }
        prevBtns[index].style.display = 'block';
    });
});


    // Event listeners for input fields
    steps.forEach((step, index) => {
        const stepInputs = step.querySelectorAll('input[required]');
        stepInputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.trim()) {
                    input.style.borderColor = ''; // Reset border color if input is not null
                    const errorMessage = input.parentNode.querySelector('.error-message');
                    if (errorMessage) {
                        errorMessage.remove(); // Remove error message if input is not null
                    }
                }
            });
        });
    });

    prevBtns.forEach((prevBtn, index) => {
        prevBtn.addEventListener('click', () => {
            // Go to the previous step
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }

            // Update button visibility based on the current step
            if (currentStep < steps.length) {
                nextBtns[index].style.display = 'block';
            }
            if (currentStep === 1) {
                prevBtn.style.display = 'none';
            }
        });
    });

</script>







<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
   
</script>

<script>
  // Function to add a new row of sibling information
  function addSiblingRow(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const siblingsContainer = document.getElementById('siblingsContainer');
    const defaultRow = siblingsContainer.querySelector('.sibling-row');
    const newRow = defaultRow.cloneNode(true);

    // Clear the input values in the new row
    const inputs = newRow.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    // Create a wrapping div for the remove button and adjust styling
    const removeButtonDiv = document.createElement('div');
    removeButtonDiv.classList.add('col-md-3', 'mb-3', 'd-flex', 'align-items-end'); // Adjust width and alignment

    // Create the remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'w-100', 'border-2');
    removeButton.onclick = function() {
        siblingsContainer.removeChild(newRow);
    };

    // Append the remove button to the wrapping div
    removeButtonDiv.appendChild(removeButton);

    // Append the wrapping div to the new row
    newRow.appendChild(removeButtonDiv);

    // Append the new row to the siblings container
    siblingsContainer.appendChild(newRow);
}




  // Function to remove a row of sibling information
function removeSiblingRow(button) {
    const siblingRow = button.closest('.sibling-row');
    siblingRow.remove();
}

  // Function to add a new row for grade information
function addGradeRow(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const gradeInfoContainer = document.querySelector('.sub');
    const newRow = gradeInfoContainer.querySelector('.row').cloneNode(true);

    // Clear the input values in the new row
    const inputs = newRow.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    // Create a div to hold the remove button with appropriate styling
    const removeButtonDiv = document.createElement('div');
    removeButtonDiv.classList.add('col-md-3', 'mb-3', 'd-flex', 'align-items-end'); // Adjust width and alignment

    // Create the remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'w-100', 'border-2', 'mt-2'); // Add margin-top for spacing
    removeButton.onclick = function() {
        gradeInfoContainer.removeChild(newRow);
    };

    // Append the remove button to its container
    removeButtonDiv.appendChild(removeButton);

    // Append the remove button container to the new row
    newRow.appendChild(removeButtonDiv);

    // Append the new row to the gradeInfoContainer
    gradeInfoContainer.appendChild(newRow);
}


    // Function to remove a row for grade information
    function removeGradeRow(button) {
        const gradeRow = button.closest('.row');
        gradeRow.remove();
    }


    function showOtherScholarshipField(inputFieldId) {
        // Show the selected input field
        document.getElementById(inputFieldId).style.display = 'block';
    }

    function hideOtherScholarshipField(inputFieldId) {
        // Hide the selected input field
        document.getElementById(inputFieldId).style.display = 'none';
    }

    var rowCount = 1; // Initialize rowCount

    function addSchoolRow() {
        if (rowCount <= 2) { // Check if the maximum limit is not reached
            const schoolRows = document.getElementById('school-rows');
            const newRow = document.createElement('div');
            newRow.classList.add('row');
            newRow.innerHTML = `
            <div class="col-md-3 mb-3">
                <label class="form-label">School Name</label>
                <input type="text" name="collegeSchool[]" class="form-control form-control-sm" placeholder="School Name">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Course/Degree Major</label>
                <input type="text" name="collegeCourse[]" class="form-control form-control-sm" placeholder="Course/Degree Major">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Entrance Exam Taken?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="entranceExam_${rowCount}" value="yes" onclick="showInputField(this)" id="radioYes${rowCount}">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="entranceExam_${rowCount}" value="no" onclick="showInputField(this)" id="radioNo${rowCount}">
                    <label class="form-check-label">No</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <button type="button" class="btn btn-danger" onclick="removeSchoolRow(this)">Remove</button>
            </div>
            <div class="col-md-6 input-fields">
                <div class="inputFieldYes" style="display: none;">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">If "YES":</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="yesStats_${rowCount}" value="Pass">
                            <label class="form-check-label">PASS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="yesStats_${rowCount}" value="Failed">
                            <label class="form-check-label">FAIL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="yesStats_${rowCount}" value="Waitlist">
                            <label class="form-check-label">WAITLIST</label>
                        </div>
                    </div>
                </div>

                <div class="inputFieldNo" style="display: none;">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">If "NO", When:</label>
                        <input type="date" name="noDate_${rowCount}" class="form-control form-control-sm">
                    </div>
                </div>
            </div>`;

            schoolRows.appendChild(newRow);
            rowCount++;
        } else {
            alert("Maximum limit reached.");
        }
    }

    function removeSchoolRow(button) {
        var rowToRemove = button.closest('.row');
        rowToRemove.remove();
        rowCount--;
    }

    function showInputField(radio) {
        var row = radio.closest('.row');
        var inputFieldYes = row.querySelector('.inputFieldYes');
        var inputFieldNo = row.querySelector('.inputFieldNo');

        if (radio.value === 'yes') {
            inputFieldYes.style.display = 'block';
            inputFieldNo.style.display = 'none';
        } else if (radio.value === 'no') {
            inputFieldYes.style.display = 'none';
            inputFieldNo.style.display = 'block';
        }
    }



    function logout(){
        window.location.href = "../index.php";
    }

    function updateRowCount() {
        document.getElementById('rowCount').value = rowCount - 1; // Subtract 1 to account for the initial row
    }
</script>

</script>
</body>
</html>

    