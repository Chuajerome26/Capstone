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
        <!-- <?php ?> -->
        <form id="ccmfForm" method="POST" action="../functions/applicants-register.php" enctype="multipart/form-data">
        <!------- STEP 1 ------->
        <div class="step" id="step1">
            <h4 class="text-primary"> Personal Information </h4>
            <div class="border-bottom mb-3 border border-1"></div>
                <div class="row">
                <!--- Personal Infomartion --->
                <div class="col-md-4 mb-3">
                    <label  class="form-label">First Name:<span class="text-danger">*</span></label>
                    <input type="text" name="fName" class="form-control form-control-sm" placeholder="First Name" required>
                    <span class="error-message"></span>

                </div>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Middle Name:</label>
                    <input type="text" name="mName" class="form-control form-control-sm" placeholder="Optional">
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Last Name:<span class="text-danger">*</span></label>
                    <input type="text" name="lName" class="form-control form-control-sm" placeholder="Last Name" required>
                </div>

                <div class="col-md-1 mb-3">
                    <label  class="form-label">Suffix:</label>
                    <select class="form-select form-select-sm" name="suffix" aria-label="Default select example">
                    <option selected><p class="text-secondary">Ex</p></option>
                    <option value="Jr.">Jr.</option>
                    <option value="Sr.">Sr.</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    </select>
                </div>


                <div class="col-md-5 mb-3">
                    <label  class="form-label">Active Contact Number: <span class="text-danger">*</span></label>
                    <input type="text" name="mNumber" id="mNumber" class="form-control form-control-sm" placeholder="Mobile Number" required>
                </div>

                <div class="col-md-5 mb-3">
                    <label  class="form-label">Email Address: <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Email Address" required>
                    <div id="emailFeedback" class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>


            

                <div class="col-md-2 mb-3">
                    <label class="form-label">Gender: <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm" name="gender" id="genderSelect" aria-label="Default select example" onchange="checkOtherOption('genderSelect', 'otherOption', 'otherGenderInput')" required>
                        <option selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="LGBTQIA+">LGBTQIA+</option>
                        <option value="Others">Others</option>
                    </select>
                    <div class="mt-2" id="otherOption" style="display: none;">
                        <input class="form-control form-control-sm" type="text" name="genderOtherOption" id="otherGenderInput" placeholder="Gender preference">
                    </div>
                </div>
                  
               

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Civil Status: <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm" name="cStatus" aria-label="Default select example" required>
                    <option selected>Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Legally Separated">Legally Separated</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Citizenship: <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm" name="citizenship" id="citizenshipSelect" aria-label="Default select example" onchange="checkOtherOption('citizenshipSelect', 'otherCitizenshipOption', 'otherCitizenshipInput')" required>
                        <option selected>Citizenship</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Korean">Korean</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Others">Others</option>
                    </select>
                    <div class="mt-2" id="otherCitizenshipOption" style="display: none;">
                        <input class="form-control form-control-sm" type="text" name="citizenshipOtherOption" id="otherCitizenshipInput" placeholder="Other Citizenship">
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Date of Birth: <span class="text-danger">*</span></label>
                    <input type="date" name="dofBirth" class="form-control form-control-sm" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Birth place: <span class="text-danger">*</span></label>
                    <input type="text" name="bPlace" class="form-control form-control-sm" placeholder="Birthplace" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Religion: <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm" name="religion" aria-label="Default select example" required>
                    <option selected>Religion</option>
                    <option value="Roman Catholicism">Roman Catholicism</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestantism">Protestantism</option>
                    <option value="Iglesia ni Cristo (Church of Christ)">Iglesia ni Cristo (Church of Christ)</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Indigenous">Indigenous</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Height: <span class="text-danger">*</span></label>
                    <input type="text" name="height" class="form-control form-control-sm" placeholder="Height" required>
                </div>

                
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Weight: <span class="text-danger">*</span></label>
                    <input type="text" name="weight" class="form-control form-control-sm" placeholder="Weight" required>
                </div>
            

             

               <hr>

               <h5 class="mb-2"> Address Information </h5>


               <h6> Present Address </h6>

               <div class="col-md-3 mb-3">
                    <label  class="form-label">Province: <span class="text-danger">*</span></label>
                    <input type="text" name="present_province" class="form-control form-control-sm" value="Metro Manila" readonly>
                </div>
                

                <div class="col-md-3 mb-3">
                    <label  class="form-label">City: <span class="text-danger">*</span></label>
                    <input type="text" name="present_city" class="form-control form-control-sm" value="Quezon City" readonly>
                </div>

              
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Barangay: <span class="text-danger">*</span></label>
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
                   
                </div>


              
                   
                <div class="col-md-2 mb-3">
                    <label  class="form-label">District: <span class="text-danger">*</span></label>
                    <input type="text" name="present_district" id="districtField" class="form-control form-control-sm" placeholder="District" required>
                </div>


    

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Zip Code: <span class="text-danger">*</span></label>
                    <input type="text" name="present_zip" class="form-control form-control-sm" placeholder="Zip Code" required>
                </div>



                <h6> Permanent Address</h6>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Province: <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_province" class="form-control form-control-sm" placeholder="Province" required>
                    <input type="checkbox" id="sameAsPresent"> <label for="sameAsPresent" class="text-muted">Same as Present Address</label>

                </div>

                

                <div class="col-md-3 mb-3">
                    <label  class="form-label">City: <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_city" class="form-control form-control-sm" placeholder="City" required>
                </div>

                
                    <!--Auto Fill na to young padre-->
                    <div class="col-md-2 mb-3">
                    <label class="form-label">Barangaay: <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_barangay" class="form-control form-control-sm" placeholder="Barangay" required>
                   
                </div>

                
                   
                <div class="col-md-2 mb-3">
                    <label  class="form-label">District: <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_district" class="form-control form-control-sm" placeholder="District" required>
                </div>


    

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Zip Code: <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_zip" class="form-control form-control-sm" placeholder="Zip Code" required>
                </div>

    <hr>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Do you have medical conditions? (If yes please specify) <span class="text-danger">*</span></label>
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

                </div>
                    <!--- End Personal Infomartion --->
        </div>
        <div class="d-flex justify-content-center gap-2">
            <button class="btn btn-primary w-25" type="submit" name="submit" id="submitForm">Submit</button>
        </div>
        </form>
        <?php
        
        ?>
        </div>
    </div>


    <script>
 document.addEventListener('DOMContentLoaded', function() {
    const nextButtonStep1 = document.querySelector('.step1 .next');
    const requiredInputsStep1 = document.querySelectorAll('.step1 input[required], .step1 select[required], .step1 textarea[required]');
    const submitButton = document.getElementById('submitForm');

    function checkInputsStep1() {
        let hasErrorStep1 = false;

        requiredInputsStep1.forEach(input => {
            if (!input.value.trim()) {
                showErrorMessageStep1(input, 'This field is required');
                hasErrorStep1 = true;
            } else {
                removeErrorMessageStep1(input);
            }
        });

        return !hasErrorStep1; // Return true if there are no errors
    }

    function updateSubmitButton() {
        if (checkInputsStep1()) {
            submitButton.removeAttribute('disabled');
        } else {
            submitButton.setAttribute('disabled', 'disabled');
        }
    }

    // Check inputs on page load
    updateSubmitButton();

    // Check inputs when the submit button is clicked
    nextButtonStep1.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        // Check if all required fields are filled out
        updateSubmitButton();
    });

    // Check inputs when any input is changed
    requiredInputsStep1.forEach(input => {
        input.addEventListener('input', updateSubmitButton);
    });

    function showErrorMessageStep1(input, message) {
        let errorMessageStep1 = input.parentNode.querySelector('.error-message');
        if (!errorMessageStep1) {
            errorMessageStep1 = document.createElement('span');
            errorMessageStep1.textContent = message;
            errorMessageStep1.classList.add('error-message');
            errorMessageStep1.style.color = 'red';
            input.parentNode.appendChild(errorMessageStep1);
        } else {
            errorMessageStep1.textContent = message;
        }
    }

    function removeErrorMessageStep1(input) {
        const errorMessageStep1 = input.parentNode.querySelector('.error-message');
        if (errorMessageStep1) {
            errorMessageStep1.remove();
        }
    }
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

<script>
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
    //function for other option
    function checkOtherOption(selectId, otherOptionId, otherInputId) {
        var selectElement = document.getElementById(selectId);
        var otherOptionDiv = document.getElementById(otherOptionId);
        var otherInput = document.getElementById(otherInputId);

        if (selectElement.value === "Others") {
            otherOptionDiv.style.display = "block";
            otherInput.required = true; // Make the textbox required
        } else {
            otherOptionDiv.style.display = "none";
            otherInput.required = false; // Make the textbox not required
        }
    }

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

    function showOtherScholarshipField(inputFieldId) {
        // Show the selected input field
        document.getElementById(inputFieldId).style.display = 'block';
    }

    function hideOtherScholarshipField(inputFieldId) {
        // Hide the selected input field
        document.getElementById(inputFieldId).style.display = 'none';
    }
    </script>
</body>
</html>

    