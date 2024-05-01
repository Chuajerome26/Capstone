<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 1) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];
    $appliLogin = $admin->getApplicantLoginById($id);
    $pic = $admin->getApplicants2x2($id);

} else {
    header("Location: ../index.php");
}


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
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript -->



    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <style>
.fileBox {
    border: 1px solid #ccc; /* Add a border */
    padding: 5px; /* Add padding */
    margin-bottom: 10px; /* Add some spacing between boxes */
}


.Preview {
        width: 200px; /* Set the width and height to the same value to make it a circle */
        height: 200px; /* Adjust this value as needed */
        margin: auto; /* Center the circular container horizontally */
    }



    .Preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    /* CSS */
#cameraPreview {
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    position: relative;
    overflow: hidden;
}

#cameraPreview video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}


</style>
  
</head>
<body class="bg-body-teritory">





<div class="container-fluid py-5">
            <div class="d-flex justify-content-center align-items-center min-vh-100 border-0">
                <div class="card col-lg-10 col-12 shadow">
                    <div class="card-body">

                        <div class="hstack gap-3 mb-3">
                            <div class="p-1">
                                <a class="navbar-brand d-flex align-items-center m-auto" >
                                    <img src="../images/consuelo.jpg" alt="Image" class="img-fluid" width="45px" height="45px">
                                    <h6 class="display-7 text-center ms-2 mt-1 fw-bold"><span class="d-none d-lg-block">Scholarship Management System</span></h6>
                                </a>
                            </div>
                            <div class="p-2 ms-auto"> <a href="index123.php"><i class='bx bx-arrow-back me-2'></i>Back</a></div>
                        </div>




                       
        <!--- Di bale mamaya nalang mga alas singko --->
        <?php
        $currentAppState = $admin->getCurrentAppState();
        if ($currentAppState['state'] == 1) {
        ?>


            
<div class="modal fade border-0" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary p-2 m-0 px-2">
                    <h5 class="modal-title text-white ms-2" id="permissionModalLabel">Terms and Conditions</h5>
                </div>
                <div class="modal-body" style="overflow: auto;">
                    <div class="">


                    <div class="mx-1 mb-3">    I hereby declare that all information provided and documents submitted in support of my scholarship application are true and accurate. I give my consent to CCMF to collect, use and process my personal information. Furthermore, I confirm my compliance with the Data Privacy Act of 2012, ensuring the confidentiality and protection of any personal data shared in this application process.</div>
                    <div class="mx-1 mb-3 text-danger">Reminder:<span class="text-danger">*</span></div>
                    <div class="mx-1 mb-3">Ensure you are residence of Quezon City within district 1-6.</div>
                    <div class="mx-1 mb-3">Ensure that you are Incoming Freshmen or In College Level.</div>
                            <div class="mx-1 mb-3 form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input" id="checkMeOut">
                                <label class="form-check-label" for="checkMeOut">I understand and agree to the terms and conditions</label>
                            </div>

                        </ul>

                    </div>
                </div>
                <div class="modal-footer d-flex border-0 m-auto">

                    <button type="button" class="btn btn-sm btn-primary" id="agreeBtn" disabled>I Understand</button>
                </div>
            </div>
        </div>
    </div>

    <script>
       document.addEventListener("DOMContentLoaded", function() {
        var permissionModal = document.getElementById('permissionModal');
        var agreeBtn = document.getElementById('agreeBtn');
        var checkBox = document.getElementById('checkMeOut');

        if (permissionModal && agreeBtn && checkBox) {
            var myModal = new bootstrap.Modal(permissionModal, {
                backdrop: 'static',
                keyboard: false // Disabling ESC key
            });

            myModal.show();

            // Handle the change event for the checkbox
            checkBox.addEventListener('change', function() {
                if (this.checked) {
                    agreeBtn.removeAttribute('disabled');   
                } else {
                    agreeBtn.setAttribute('disabled', 'disabled');
                }
            });

            // Handle click event for "I Understand" button
            agreeBtn.addEventListener('click', function() {
                myModal.hide(); // Hide the modal
            });
        }
    });
    </script>
            <p>INSTRUCTIONS: Fill in the required information, if a field is not applicable, indicate "N/A"</p>
            <span class="text-secondary"><span class="text-danger">*</span> Required fields</span>
            <div class="border-bottom mb-3 border border-1"></div>


            <div class="row mt-2">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold " style="font-size:15px" id="personalInfo-tab" data-bs-toggle="tab" href="#personalInfo">
                                <span class="d-none d-lg-block">1. Personal Information</span>
                                <span class="d-lg-none">Personal Information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" style="font-size:15px" id="famInfo-tab" data-bs-toggle="tab" href="#famInfo">
                                <span class="d-none d-lg-block">2. Family Information</span>
                                <span class="d-lg-none">Family Information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" style="font-size:15px" id="acadInfo-tab" data-bs-toggle="tab" href="#acadInfo">
                                <span class="d-none d-lg-block">3. Academic Information</span>
                                <span class="d-lg-none">Academic Information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" style="font-size:15px" id="requirements-tab" data-bs-toggle="tab" href="#requirements">
                                <span class="d-none d-lg-block">4. Requirements</span>
                                <span class="d-lg-none">Requirements</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content mt-2 mb-4" id="myTabsContent">
                <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
                    <form id="ccmfForm" method="POST" action="../functions/applicants-register-freshmen.php" enctype="multipart/form-data">
                    <div class="row">
                    <!--- Personal Infomartion --->
                    <?php
                    foreach($appliLogin as $i){
                    ?>
                    <h5 class="text-primary">We've automatically filled in some of the fields for you based on your login information.</h5>
                    <div class="col-md-3 mb-3">
                        <label  class="form-label">First Name:<span class="text-danger">*</span></label>
                        <input type="text" name="fName" id="fName" class="form-control form-control-sm" value="<?php echo $i["fname"]?>" readonly>
                    </div>


                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Middle Name:</label>
                        <input type="text" name="mName" id="mName" class="form-control form-control-sm" value="<?php echo $i["mname"]?>" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Last Name:<span class="text-danger">*</span></label>
                        <input type="text" name="lName" id="lName" class="form-control form-control-sm" value="<?php echo $i["lname"]?>" readonly>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label  class="form-label">Suffix:(Optional)</label>
                        <input type="text" name="suffix" class="form-control form-control-sm" value="<?php echo $i["suffix"]?>" placeholder="E.g. Jr. Sr. III..." readonly>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Gender: <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" name="gender" id="genderSelect" aria-label="Default select example" onchange="checkOtherOption('genderSelect', 'otherOption', 'otherGenderInput')" required>
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                            <option value="Others">Others</option>
                        </select>
                        <div id="otherOption" style="display: none;">
                            <input class="form-control form-control-sm mt-2" type="text" name="genderOtherOption" id="otherGenderInput" placeholder="Gender preference">
                        </div>
                    </div>
                

                    <div class="col-md-2  mb-3">
                        <label  class="form-label">Date of Birth: <span class="text-danger">*</span></label>
                        <input type="date" name="dofBirth" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label  class="form-label">Place of Birth: <span class="text-danger">*</span></label>
                        <input type="text" name="bPlace" class="form-control form-control-sm" placeholder="City, Municipality" required>
                    </div>
                
                    <div class="col-md-2 mb-3">
                    <label  class="form-label">Civil Status: <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" name="cStatus" id="cStatus" aria-label="Default select example" onchange="checkOtherOption('cStatus', 'otherStatus', 'otherStatus1')" required>
                        <option value=""></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Legally Separated">Legally Separated</option>
                        <option value="Others">Others</option>
                        </select>
                        <div id="otherStatus" style="display: none;">
                            <input class="form-control form-control-sm mt-2" type="text" name="otherStatus" id="otherStatus1" placeholder="Other Condition">
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label  class="form-label">Religion: <span class="text-danger">*</span></label>
                        <input type="text" name="religion" id="religion" class="form-control form-control-sm" placeholder="Religion" required>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Height (in cm): <span class="text-danger">*</span></label>
                        <input type="text" name="height" id="height" class="form-control form-control-sm" placeholder="Height" required>
                    </div>

                    
                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Weight (in kg): <span class="text-danger">*</span></label>
                        <input type="text" name="weight" id="weight" class="form-control form-control-sm" placeholder="Weight" required>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label class="form-label">Do you have Medical Conditions?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mCondition" value="yes" onclick="showOtherScholarshipField('inputeMedical')">
                            <label class="form-check-label">Yes</label>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="form-check-input" type="radio" name="mCondition" value="no" onclick="hideOtherScholarshipField('inputeMedical')">
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <!--Lalabas lang to gar kapag nag yes-->
                    <div class="col-md-2 mb-3" id="inputeMedical" style="display: none;">
                        <label  class="form-label">Please specify <span class="text-secondary">(if applicable) </span>:</label>
                        <select class="form-select form-select-sm" name="pwd" id="pwd" aria-label="Default select example" onchange="checkOtherOption('pwd', 'otherMedical', 'otherMedical1')">
                        <option></option>
                        <option value="Physical Disabilities">Physical Disabilities</option>
                        <option value="Visual Impairments">Visual Impairments</option>
                        <option value="Hearing Impairments">Hearing Impairments</option>
                        <option value="Intellectual Disabilities">Intellectual Disabilities</option>
                        <option value="Psychological or Mental Health Disabilities">Psychological or Mental Health Disabilities</option>
                        <option value="Learning Disabilities">Learning Disabilities</option>
                        <option value="Neurological Disabilities">Neurological Disabilities</option>
                        <option value="Chronic Health Conditions">Chronic Health Conditions</option>
                        <option value="Speech or Communication Disorders">Speech or Communication Disorders</option>
                        <option value="Others">Others</option>
                        </select>
                        <div id="otherMedical" style="display: none;">
                            <input class="form-control form-control-sm mt-2" type="text" name="otherMedical" id="otherMedical1" placeholder="Other Condition">
                        </div>
                    </div>

                    <h5 class="text-primary">Current Demographic Data</h5>
                    <div class="border-bottom mb-3 border border-1"></div>

                <h6>Present Address</h6>

                        <div class="col-md-4 mb-3">
                                    <label  class="form-label">Province: <span class="text-danger">*</span></label>
                                    <input type="text" name="present_province" class="form-control form-control-sm" value="Metro Manila" readonly>
                            </div>
                        
                            <div class="col-md-4 mb-3">
                                        <label  class="form-label">City: <span class="text-danger">*</span></label>
                                        <input type="text" name="present_city" class="form-control form-control-sm" value="Quezon City" readonly>
                            </div>

                        

                        <div class="col-md-4 mb-3">
                        <label  class="form-label">Barangay:<span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" name="present_brgy" id="areaSelect" aria-label="Select Area" onchange="updateDistrictandZip()" required>
                        <option></option>
                        <option value="Alicia" data-district="1" data-zip="1105">Alicia</option>
                        <option value="Amihan" data-district="3" data-zip="1102">Amihan</option>
                        <option value="Apolonio Samson" data-district="6" data-zip="1106">Apolonio Samson</option>
                        <option value="Bagbag" data-district="5" data-zip="1116">Bagbag</option>
                        <option value="Bagong Lipunan ng Crame" data-district="4" data-zip="1100">Bagong Lipunan ng Crame</option>
                        <option value="Bagong Pag Asa" data-district="1" data-zip="1105">Bagong Pag Asa</option>
                        <option value="Bagong Silangan" data-district="2" data-zip="1119">Bagong Silangan</option>
                        <option value="Bagumbayan" data-district="3" data-zip="1110">Bagumbayan</option>
                        <option value="Bagumbuhay" data-district="3" data-zip="1109">Bagumbuhay</option>
                        <option value="Bahay Toro" data-district="1" data-zip="1106">Bahay Toro</option>
                        <option value="Balingasa" data-district="1" data-zip="1115">Balingasa</option>
                        <option value="Balon Bato" data-district="6" data-zip="1106">Balon Bato</option>
                        <option value="Batasan Hills" data-district="2" data-zip="1126">Batasan Hills</option>
                        <option value="Bayanihan" data-district="3" data-zip="1110">Bayanihan</option>
                        <option value="Blue Ridge A" data-district="3" data-zip="1109">Blue Ridge A</option>
                        <option value="Blue Ridge B" data-district="3" data-zip="1109">Blue Ridge B</option>
                        <option value="Botocan" data-district="4" data-zip="1100">Botocan</option>
                        <option value="Bungad" data-district="1" data-zip="1105">Bungad</option>
                        <option value="Camp Aguinaldo" data-district="3" data-zip="1110">Camp Aguinaldo</option>
                        <option value="Capri" data-district="5" data-zip="1117">Capri</option>
                        <option value="Central" data-district="4" data-zip="1100">Central</option>
                        <option value="Commonwealth" data-district="2" data-zip="1121">Commonwealth</option>
                        <option value="Culiat" data-district="6" data-zip="1106">Culiat</option>
                        <option value="Damar" data-district="1" data-zip="1115">Damar</option>
                        <option value="Damayan" data-district="1" data-zip="1104">Damayan</option>
                        <option value="Damayang Lagi" data-district="4" data-zip="1100">Damayang Lagi</option>
                        <option value="Del Monte" data-district="1" data-zip="1104">Del Monte</option>
                        <option value="Dioquino Zobel" data-district="3" data-zip="1110">Dioquino Zobel</option>
                        <option value="Don Manuel" data-district="4" data-zip="1113">Don Manuel</option>
                        <option value="Doña Aurora" data-district="4" data-zip="1113">Doña Aurora</option>
                        <option value="Doña Imelda" data-district="4" data-zip="1113">Doña Imelda</option>
                        <option value="Doña Josefa" data-district="4" data-zip="1113">Doña Josefa</option>
                        <option value="Duyan duyan" data-district="3" data-zip="1111">Duyan duyan</option>
                        <option value="East Kamias" data-district="3" data-zip="1102">East Kamias</option>
                        <option value="E. Rodriguez" data-district="3" data-zip="1102">E. Rodriguez</option>
                        <option value="Escopa I" data-district="3" data-zip="1104">Escopa I</option>
                        <option value="Escopa II" data-district="3" data-zip="1104">Escopa II</option>
                        <option value="Escopa III" data-district="3" data-zip="1104">Escopa III</option>
                        <option value="Escopa IIII" data-district="3" data-zip="1104">Escopa IIII</option>
                        <option value="Fairview" data-district="5" data-zip="1118">Fairview</option>
                        <option value="Greater Lagro" data-district="5" data-zip="1118">Greater Lagro</option>
                        <option value="Gulod" data-district="5" data-zip="1117">Gulod</option>
                        <option value="Holy Spirit" data-district="2" data-zip="1127">Holy Spirit</option>
                        <option value="Horseshoe" data-district="4" data-zip="1112">Horseshoe</option>
                        <option value="Immaculate Concepcion" data-district="4" data-zip="1111">Immaculate Concepcion</option>
                        <option value="Kaligayahan" data-district="5" data-zip="1117">Kaligayahan</option>
                        <option value="Kalusugan" data-district="4" data-zip="1100">Kalusugan</option>
                        <option value="Kamuning" data-district="4" data-zip="1103">Kamuning</option>
                        <option value="Kaunlaran" data-district="4" data-zip="1111">Kaunlaran</option>
                        <option value="Katipunan" data-district="1" data-zip="1105">Katipunan</option>
                        <option value="Kristong Hari" data-district="4" data-zip="1101">Kristong Hari</option>
                        <option value="Krus na Ligas" data-district="4" data-zip="1101">Krus na Ligas</option>
                        <option value="Libis" data-district="3" data-zip="1110">Libis</option>
                        <option value="Laging Handa" data-district="4" data-zip="1103">Laging Handa</option>
                        <option value="Lourdes" data-district="1" data-zip="1114">Lourdes</option>
                        <option value="Loyola Heights" data-district="3" data-zip="1108">Loyola Heights</option>
                        <option value="Mangga" data-district="3" data-zip="1109">Mangga</option>
                        <option value="Maharlika" data-district="1" data-zip="1114">Maharlika</option>
                        <option value="Manresa" data-district="1" data-zip="1115">Manresa</option>
                        <option value="Mariblo" data-district="1" data-zip="1104">Mariblo</option>
                        <option value="Marilag" data-district="3" data-zip="1109">Marilag</option>
                        <option value="Masagana" data-district="3" data-zip="1110">Masagana</option>
                        <option value="Masambong" data-district="1" data-zip="1104">Masambong</option>
                        <option value="Matandang Balara" data-district="3" data-zip="1119">Matandang Balara</option>
                        <option value="Milagrosa" data-district="3" data-zip="1109">Milagrosa</option>
                        <option value="N.S Amoranto" data-district="1" data-zip="1114">N.S Amoranto</option>
                        <option value="Nagkaisang Nayon" data-district="5" data-zip="1123">Nagkaisang Nayon</option>
                        <option value="Nayong Kanluran" data-district="1" data-zip="1104">Nayong Kanluran</option>
                        <option value="New Era" data-district="6" data-zip="1107">New Era</option>
                        <option value="Novaliches" data-district="5" data-zip="1123">Novaliches</option>
                        <option value="North Fairview" data-district="5" data-zip="1123">North Fairview</option>
                        <option value="Obrero" data-district="4" data-zip="1103">Obrero</option>
                        <option value="Old Capitol Site" data-district="4" data-zip="1101">Old Capitol Site</option>
                        <option value="Paltok" data-district="1" data-zip="1105">Paltok</option>
                        <option value="Paang Bundok" data-district="1" data-zip="1105">Paang Bundok</option>
                        <option value="Pag-ibig sa Nayon" data-district="1" data-zip="1106">Pag-ibig sa Nayon</option>
                        <option value="Pansol" data-district="3" data-zip="1110">Pansol</option>
                        <option value="Paligsahan" data-district="4" data-zip="1103">Paligsahan</option>
                        <option value="Paraiso" data-district="1" data-zip="1104">Paraiso</option>
                        <option value="Payatas" data-district="2" data-zip="1119">Payatas</option>
                        <option value="Phil-Am" data-district="1" data-zip="1104">Phil-Am</option>
                        <option value="Pinyahan" data-district="4" data-zip="1100">Pinyahan</option>
                        <option value="Project 6" data-district="1" data-zip="1100">Project 6</option>
                        <option value="Quirino 2-A" data-district="3" data-zip="1109">Quirino 2-A</option>
                        <option value="Quirino 2-B" data-district="3" data-zip="1109">Quirino 2-B</option>
                        <option value="Quirino 2-C" data-district="3" data-zip="1109">Quirino 2-C</option>
                        <option value="Quirino 3-A" data-district="3" data-zip="1109">Quirino 3-A</option>
                        <option value="Quirino 3-B (Claro)" data-district="3" data-zip="1109">Quirino 3-B (Claro)</option>
                        <option value="Ramon Magsaysay" data-district="1" data-zip="1105">Ramon Magsaysay</option>
                        <option value="Roxas" data-district="4" data-zip="1103">Roxas</option>
                        <option value="Sacred Heart" data-district="4" data-zip="1103">Sacred Heart</option>
                        <option value="Saint Peter" data-district="1" data-zip="1114">Saint Peter</option>
                        <option value="Salvacion" data-district="1" data-zip="1104">Salvacion</option>
                        <option value="San Agustin" data-district="5" data-zip="1123">San Agustin</option>
                        <option value="San Antonio" data-district="1" data-zip="1105">San Antonio</option>
                        <option value="San Bartolome" data-district="5" data-zip="1116">San Bartolome</option>
                        <option value="San Isidro Galas" data-district="4" data-zip="1101">San Isidro Galas</option>
                        <option value="San Isidro Labrador" data-district="1" data-zip="1113">San Isidro Labrador</option>
                        <option value="San Jose" data-district="1" data-zip="1115">San Jose</option>
                        <option value="San Juan" data-district="3" data-zip="1102">San Juan</option>
                        <option value="San Martin de Porres" data-district="4" data-zip="1111">San Martin de Porres</option>
                        <option value="San Roque" data-district="3" data-zip="1109">San Roque</option>
                        <option value="San Vicente" data-district="4" data-zip="1101">San Vicente</option>
                        <option value="Santa Cruz" data-district="1" data-zip="1104">Santa Cruz</option>
                        <option value="Santa Lucia" data-district="5" data-zip="1117">Santa Lucia</option>
                        <option value="Santa Monica" data-district="5" data-zip="1117">Santa Monica</option>
                        <option value="Santa Teresita" data-district="1" data-zip="1114">Santa Teresita</option>
                        <option value="Sangandaan" data-district="6" data-zip="1116">Sangandaan</option>
                        <option value="Santol" data-district="4" data-zip="1113">Santol</option>
                        <option value="Sauyo" data-district="6" data-zip="1116">Sauyo</option>
                        <option value="Siena" data-district="1" data-zip="1104">Siena</option>
                        <option value="Sikatuna Village" data-district="4" data-zip="1101">Sikatuna Village</option>
                        <option value="Silangan" data-district="3" data-zip="1102">Silangan</option>
                        <option value="Socorro" data-district="3" data-zip="1109">Socorro</option>
                        <option value="South Triangle" data-district="4" data-zip="1103">South Triangle</option>
                        <option value="Sto. Cristo" data-district="1" data-zip="1105">Sto. Cristo</option>
                        <option value="Sto. Domingo" data-district="1" data-zip="1114">Sto. Domingo</option>
                        <option value="Sto. Niño" data-district="4" data-zip="1100">Sto. Niño</option>
                        <option value="St. Ignatius" data-district="3" data-zip="1109">St. Ignatius</option>
                        <option value="Tagumpay" data-district="3" data-zip="1111">Tagumpay</option>
                        <option value="Talayan" data-district="1" data-zip="1104">Talayan</option>
                        <option value="Talipapa" data-district="6" data-zip="1116">Talipapa</option>
                        <option value="Tandang Sora" data-district="6" data-zip="1116">Tandang Sora</option>
                        <option value="Teacher's Village East" data-district="4" data-zip="1101">Teacher's Village East</option>
                        <option value="Teacher's Village West" data-district="4" data-zip="1104">Teacher's Village West</option>
                        <option value="Ugong Norte" data-district="3" data-zip="1107">Ugong Norte</option>
                        <option value="Unang Sigaw" data-district="6" data-zip="1101">Unang Sigaw</option>
                        <option value="UP Campus" data-district="4" data-zip="1101">UP Campus</option>
                        <option value="UP Village" data-district="4" data-zip="1101">UP Village</option>
                        <option value="Valencia" data-district="4" data-zip="1100">Valencia</option>
                        <option value="Vasra" data-district="1" data-zip="1100">Vasra</option>
                        <option value="Veterans Village" data-district="1" data-zip="1105">Veterans Village</option>
                        <option value="Villa Mara Clara" data-district="3" data-zip="1111">Villa Mara Clara</option>
                        <option value="West Kamias" data-district="3" data-zip="1102">West Kamias</option>
                        <option value="West Triangle" data-district="1" data-zip="1104">West Triangle</option>
                        <option value="White Plains" data-district="3" data-zip="1110">White Plains</option>
                        </select>
                        </div>


                        <div class="col-md-4 mb-3">
                                <label  class="form-label">District: <span class="text-danger">*</span></label>
                                <input type="text" name="present_district" id="districtField" class="form-control form-control-sm" placeholder="District" readonly>
                        </div>


                        <div class="col-md-4 mb-3">
                                <label  class="form-label">Zip Code:<span class="text-danger">*</span></label>
                                <input type="text" name="present_zip" id="zipField" class="form-control form-control-sm" placeholder="Zip Code" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label  class="form-label">House/Lot & Blk.No./Street/Village:<span class="text-danger">*</span></label>
                                <input type="text" name="present_hnumber" class="form-control form-control-sm" placeholder="House/Lot & Blk.No./Street/Village" required>
                        </div>


                        <h6 class="mt-3"> Permanent Address <input type="checkbox" id="sameAsPresent"> <label for="sameAsPresent"><small class="text-muted">Same as Present Address</small></label></h6>
                        <!--Auto Fill na to young padre-->
                        <div class="col-md-4 mb-3">
                        <label class="form-label">Province:<span class="text-danger">*</span></label>
                        <input type="text" name="permanent_province" class="form-control form-control-sm" placeholder="Province" required>
                        </div>


                        <div class="col-md-4 mb-3">
                                <label  class="form-label">City:<span class="text-danger">*</span></label>
                                <input type="text" name="permanent_city" class="form-control form-control-sm" placeholder="City" required>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label  class="form-label">Barangay:<span class="text-danger">*</span></label>
                                <input type="text" name="permanent_barangay" class="form-control form-control-sm" placeholder="Barangay" required>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label  class="form-label">District:<span class="text-danger">*</span></label>
                                <input type="text" name="permanent_district" class="form-control form-control-sm" placeholder="District" required>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label  class="form-label">Zip Code:<span class="text-danger">*</span></label>
                                <input type="text" name="permanent_zip" class="form-control form-control-sm" placeholder="Zip Code" required>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label  class="form-label">House/Lot & Blk.No./Street/Village:</label>:<span class="text-danger">*</span></label>
                                <input type="text" name="permanent_hnumber" class="form-control form-control-sm" placeholder="House/Lot & Blk.No./Street/Village" required>
                        </div>

                    <br>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Active Contact Number: <span class="text-danger">*</span></label>
                        <input type="text" name="mNumber" id="mNumber" class="form-control form-control-sm" placeholder="(+63)XXXXXXXX" required maxlength="11">
                    </div>
                    

                    <div class="col-md-4 mb-3">
                        <label  class="form-label">Email Address: <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?php echo $i["user"];?>" readonly>
                    </div>
                    <?php }?>
                    <div class="col-md-4 mb-3">
                        <label  class="form-label">Facebook Link:</label>
                        <input type="text" name="fbLink" id="fbLink" class="form-control form-control-sm" placeholder="Link">
                    </div>

                    </div>
                    <button type="button" class="btn btn-primary next-tab" data-next="#famInfo">Next Tab</button>
                </div>
            <!-- - End of Personal Infomartion --->
            
            <!-- famInfo Tab Content -->
            <div class="tab-pane fade" id="famInfo" role="tabpanel" aria-labelledby="famInfo-tab">
               <!-- - Family Infomartion --->
               <div class="row mt-4">
               <span class="text-secondary">(Add row if multiple income earners in the family)</span>
                <div><button class="btn btn-primary btn-sm shadow mb-1 mt-4" onclick="addFamilyRow(event)">Add Row</button></div>
                <!--Income earner-->
                <div class="family-info-container">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Income Earner in the family:<span class="text-danger">*</span></label>
                            <input type="text" name="earnerName[]" id="earnerName" class="form-control form-control-sm" placeholder="Full Name" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Estimated Monthly Income:<span class="text-danger">*</span></label>
                            <input type="text" name="earnerIncome[]"  id="earnerIncome" class="form-control form-control-sm" placeholder="Monthyly Income" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Occupation:<span class="text-danger">*</span></label>
                            <input type="text" name="earnerOccupation[]" id="earnerOccupation" class="form-control form-control-sm" placeholder="Occupation" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Company Name:</label>
                            <input type="text" name="comName[]" id="comName" class="form-control form-control-sm" placeholder="Company Name">
                        </div>
                        <div class="col-md-2 button-column">
                            <label class="form-label text-white">1</label>
                        </div>
                        <hr class="border border-2" style="color: black;">
                    </div>
                </div>

                <!--Father-->
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Father's First Name:</label>
                    <input type="text" name="fatherFName" id="fatherFName"class="form-control form-control-sm" placeholder="Father's First Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Father's Middle Name:</label>
                    <input type="text" name="fatherMName" id="fatherMName" class="form-control form-control-sm" placeholder="Father's Middle Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Father's Last Name:</label>
                    <input type="text" name="fatherLName" id="fatherLName"class="form-control form-control-sm" placeholder="Father's Last Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Educational Attainment:</label>
                    <select name="fAttain"  class="form-select form-select-sm" aria-label="Highest Educational Attainment">
                        <option value="">Select One</option>
                        <option value="No Formal Education">No Formal Education</option>
                        <option value="Elementary Graduate">Elementary Graduate</option>
                        <option value="High School Graduate">High School Graduate</option>
                        <option value="Technical/Vocational Course">Technical/Vocational Course</option>
                        <option value="College Undergraduate">College Undergraduate</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Doctorate Degree">Doctorate Degree</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="fOccupation" class="form-control form-control-sm" placeholder="Occupation">
                </div>
                </div>

                <hr>
                <!--Mother-->
                <div class="row">
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Mother's First Name:</label>
                    <input type="text" name="motherFName" id="motherFName" class="form-control form-control-sm" placeholder="Mother First Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Mother's Middle Name:</label>
                    <input type="text" name="motherMName" id="motherMName" class="form-control form-control-sm" placeholder="Mother Middle Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Mother's Last Name:</label>
                    <input type="text" name="motherLName" id="motherLName"class="form-control form-control-sm" placeholder="Mother Last Name">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Educational Attainment:</label>
                    <select name="mAttain" class="form-select form-select-sm" aria-label="Highest Educational Attainment">
                        <option value="">Select One</option>
                        <option value="No Formal Education">No Formal Education</option>
                        <option value="Elementary Graduate">Elementary Graduate</option>
                        <option value="High School Graduate">High School Graduate</option>
                        <option value="Technical/Vocational Course">Technical/Vocational Course</option>
                        <option value="College Undergraduate">College Undergraduate</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Doctorate Degree">Doctorate Degree</option>
                    </select>
                    <div style="display: none;">
                        <input class="form-control form-control-sm mt-2" type="text" name="MotherAttain" placeholder="Other Condition">
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="motherOccupation" class="form-control form-control-sm" placeholder="Occupation">
                </div>
                <hr>
                    <!--Guardian-->
                <div class="col-md-4 mb-3">
                    <label  class="form-label">Guardian Name:<span class="text-danger">*</span></label>
                    <input type="text" name="guardian" id="guardianFname" class="form-control form-control-sm" placeholder="Guardian's Full Name" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Emergency Contact:<span class="text-danger">*</span></label>
                    <input type="text" name="emergencyContact" id="emergencyContact" class="form-control form-control-sm" placeholder="(+63)XXXXXXXX" maxlength="11" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label  class="form-label">Relationship:<span class="text-danger">*</span></label>
                    <input type="text" name="relationship" class="form-control form-control-sm" placeholder="Relationship" required>
                </div>
                <hr>
                <div class="col-md-4 mb-3">
                    <label  class="form-label">No. of Siblings:</label>
                    <input type="text" name="numSiblings" id="numSiblings" class="form-control form-control-sm" placeholder="Number of Siblings">
                </div>
            </div>
            <button type="button" class="btn btn-primary next-tab" data-next="#acadInfo">Next Tab</button>
            </div>
            <!--- End Family Infomartion --->

            <!-- Academic Info Tab Content -->
            <div class="tab-pane fade" id="acadInfo" role="tabpanel" aria-labelledby="acadInfo-tab">
            <!-- Academic Info Tab -->

                <div class="col-md-6 mb-3">
                    <label class="form-label">Are you a high school graduate, or are you currently enrolled as a college student?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="highSchoolGrad" name="studentType" value="srhigh" onclick="showHighSchoolFields('highSchoolFields')">
                        <label class="form-check-label">Senior High School Graduate</label>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="form-check-input" type="radio" id="collegeStudent" name="studentType" value="college" onclick="showCollegeFields('collegeFields')">
                        <label class="form-check-label">College</label>
                    </div>
                </div>

                <!-- Hidden input for student type -->
                <input type="hidden" name="studType" id="studType" value="">

                <!--Show HS Grade Fields-->
                <div id="highSchoolFields" style="display: none;">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <label  class="form-label">Senior High School Name:<span class="text-danger">*</span></label>
                        <input type="text" name="shSchool" class="form-control form-control-sm" placeholder="Senior High School" required>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Track/Strand:</label>
                        <select class="form-select form-select-sm" name="shCourse" id="shCourse" aria-label="Default select example" onchange="checkOtherOption('shCourse', 'otherCourse', 'otherCourse1')">
                        <option></option>
                        <option value="AFA">Agri-Fishery Arts (AFA) Strand</option>
                        <option value="ABM">Accountancy, Business, and Management (ABM) Strand</option>
                        <option value="GAS">General Academic Strand (GAS)</option>
                        <option value="HE">Home Economics (HE) Strand</option>
                        <option value="HUMSS">Humanities and Social Sciences (HUMSS) Strand</option>
                        <option value="IA">Industrial Arts (IA) Strand</option>
                        <option value="ICT">Information and Communications Technology (ICT) Strand</option>
                        <option value="Performing Arts">Performing Arts Strand</option>
                        <option value="STEM">Science, Technology, Engineering, and Mathematics (STEM) Strand</option>
                        <option value="Sports">Sports Track</option>
                        <option value="Visual Arts">Visual Arts Strand</option>
                        <option value="TVL">Vocational-Livelihood (TVL) Track</option>
                        <option value="Others">Others</option>
                        </select>
                        <div id="otherCourse" style="display: none;">
                            <input class="form-control form-control-sm mt-2" type="text" name="otherCourse" id="otherCourse1" placeholder="Other Course">
                        </div>
                    </div>

                    <div class="col-md-3  mb-3">
                        <label  class="form-label">Date Graduated: <span class="text-danger">*</span></label>
                        <input type="date" name="dateGrad" id="dateGrad" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label  class="form-label">General Weighted Average:<span class="text-danger">*</span></label>
                        <input type="text" name="shAve" id="shAve" class="form-control form-control-sm" placeholder="General Weighted Average" required>
                    </div>

                    <div class="col-md-3 mb-3">
                    <label  class="form-label">Form 137/138:(PDF Only)<span class="text-danger">*</span></label>
                        <label class="fileSelect btn btn-sm btn-primary col-12">Upload PDF File<input type="file" name="cog1" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer21')" required></label>
                        <div class="Preview1 " id="previewContainer21">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label  class="form-label">Award / Honor Received(If Applicable):</label>
                        <input type="text" name="shAchievements" id="shAchievements" class="form-control form-control-sm" placeholder="Academic Average">
                    </div>

                    <div class="col-md-3 mb-3">
                    <label  class="form-label">Uploade Honor / Award PDF File (If Applicable):</label>
                        <label class="fileSelect btn btn-sm btn-primary col-12">Upload PDF File<input type="file" name="shAchievementsFile" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer22')"></label>
                        <div class="Preview1 " id="previewContainer22">
                        </div>
                    </div>
                    
                    </div>
                    <button type="button" class="btn btn-primary next-tab" data-next="#requirements">Next Tab</button>
                </div>

                <!--Show College Fields-->
                <div id="collegeFields" style="display: none;">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label  class="form-label">College Name:<span class="text-danger">*</span></label>
                            <input type="text" name="cSchool" class="form-control form-control-sm" placeholder="College Name" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label  class="form-label">Course and Year Level:</label>
                            <input type="text" name="cCourse" class="form-control form-control-sm" placeholder="Course and Year Level:">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label  class="form-label">School Years Attended (From: To: ):<span class="text-danger">*</span></label>
                            <input type="text" name="schoYear" id="schoYear" class="form-control form-control-sm" placeholder="E.g. 2022 - 2023" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label  class="form-label">General Weighted Average:<span class="text-danger">*</span></label>
                            <input type="text" name="cAve" id="cAve" class="form-control form-control-sm" placeholder="General Weighted Average" required>
                        </div>

                        <div class="col-md-3 mb-3">
                        <label  class="form-label">Upload Latest Grade File:(PDF Only)<span class="text-danger">*</span></label>
                            <label class="fileSelect btn btn-sm btn-primary col-12">Upload PDF File<input type="file" name="cog2" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer3')" required></label>
                            <div class="Preview1 " id="previewContainer3">
                            </div>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary next-tab" data-next="#requirements">Next Tab</button>
                </div>

            </div>
            
            <!-- Sponsors Tab Content -->
            <div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">

                    <div class="row">

                    <!-- HTML -->
                    <div class="col-md-12 m-auto mb-3">
                        <div class="fileUpload container">
                            <div class="p-2">
                                <div class="Preview mb-3 max-width-8 rounded-circle overflow-hidden" id="previewContainer1">
                                    <img src="../images/no-images.jpg" id="image1" alt="Image">
                                </div>
                                <h6 class="text-center">Upload 2x2 Picture</h6>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-12 mb-2 text-center">
                                        <label class="fileSelect btn btn-sm btn-primary col-12">
                                            Upload File
                                            <input type="file" id="fileInput" name="idPicture" class="fileElem visually-hidden" multiple onchange="handleFiles(event, 'previewContainer1', 'image1')" required>
                                        </label>
                                        <div id="selectedFileName" class="mt-2"></div> <!-- Display selected file name -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Birth Certificate (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" name="birth" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer6')" required></label>
                                <div class="Preview1 " id="previewContainer6">
                                </div>
                        </div> 
                    </div>

                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Certificate of Indigency (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" name="indigency" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer7')" required></label>
                                <div class="Preview1 " id="previewContainer7">
                                </div>
                        </div> 
                    </div>
                    
                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Barangay Certificate (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" name="brgy" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer17')" required></label>
                                <div class="Preview1 " id="previewContainer17">
                                </div>
                        </div> 
                    </div>

                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Latest Income Tax Return / Affidavit of Non-Filing (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" name="Itr" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer18')" required></label>
                                <div class="Preview1 " id="previewContainer18">
                                </div>
                        </div> 
                    </div>
                    </div>
                    

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>

                    function handleFiles(event, previewContainerId) {
                        const fileList = event.target.files;
                        const previewContainer = document.getElementById(previewContainerId);
                        previewContainer.innerHTML = '';

                        const acceptedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                        const maxSize = 10 * 1024 * 1024; // 5 MB in bytes

                        for (let i = 0; i < fileList.length; i++) {
                            const file = fileList[i];

                            // Check if the file type is valid
                            if (acceptedTypes.includes(file.type)) {
                                // Check if the file size is within the limit
                                if (file.size <= maxSize) {
                                    const reader = new FileReader();

                                    reader.onload = function() {
                                        const img = document.createElement('img');
                                        img.src = reader.result;
                                        img.alt = file.name;
                                        img.classList.add('previewImage');
                                        previewContainer.appendChild(img);
                                    }

                                    reader.readAsDataURL(file);

                                    document.getElementById('selectedFileName').textContent = file.name;
                                } else {
                                    swal("Error!", "File size exceeds the maximum limit of 10 MB.", "error");
                                        const img = document.createElement('img');
                                        img.src = '../images/no-images.jpg';
                                        img.classList.add('previewImage');
                                        previewContainer.appendChild(img);
                                }
                            } else {
                                swal("Error!", "Please select only JPEG, PNG, or JPG files.", "error");
                                    const img = document.createElement('img');
                                    img.src = '../images/no-images.jpg';
                                    img.classList.add('previewImage');
                                    previewContainer.appendChild(img);
                            }
                        }
                    }



                    
                function handleFiles1(event, previewContainerId) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById(previewContainerId);
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <=  3 * 1024 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/PDF-logo.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '40px'; // Set the width of the image
                                logo.style.height = '50px'; // Set the height of the image
                                fileNameContainer.appendChild(logo); // Append the logo to the div container

                                const fileName = document.createElement('a');
                                fileName.textContent = file.name;
                                fileName.href = URL.createObjectURL(file);
                                fileName.target = '_blank';
                                fileName.style.display = 'block';

                                fileNameContainer.appendChild(fileName); // Append the file name link to the div container

                                previewContainer.appendChild(fileNameContainer); // Append the div container to the preview container
                            } else {
                                swal("Error!", "File size exceeds the maximum limit of 3 MB.", "error");
                            }
                        } else {
                            swal("Error!", "Please select only PDF files.", "error");
                        }
                    }
                }
                </script>

              
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-secondary btn-sm col-lg-4 col-6 prev-step" type="button">Previous</button>
            <button class="btn btn-primary col-lg-4 col-6 btn-sm" type="submit" name="submit" id="submitForm">Submit</button>
            </div>
            </div>
        </div>  


        </form>
        <?php
        } else {
            //Application closed if the button was turned off from the admin side
            echo '
            <div class="alert alert-primary" role="alert">
            Application is currently unavailable, wait for future announcements in our Facebook page.
            </div>
            ';
        }
        ?>
        </div>
 





            </div>
        </div>
    </div>
</div>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
   
</script>
<script>
            //function for same as present address
            document.getElementById('sameAsPresent').addEventListener('change', function() {
        if (this.checked) {
            // Copy values from present address to permanent address
            document.querySelector('input[name="permanent_barangay"]').value = document.querySelector('select[name="present_brgy"]').value;
            document.querySelector('input[name="permanent_district"]').value = document.querySelector('#districtField').value;
            document.querySelector('input[name="permanent_city"]').value = "Quezon City";
            document.querySelector('input[name="permanent_province"]').value = "Metro Manila";
            document.querySelector('input[name="permanent_zip"]').value = document.querySelector('#zipField').value;
            document.querySelector('input[name="permanent_hnumber"]').value = document.querySelector('input[name="present_hnumber"][placeholder="House/Lot & Blk.No./Street/Village"]').value;
        } else {
            // Clear permanent address fields if unchecked
            document.querySelector('input[name="permanent_barangay"]').value = '';
            document.querySelector('input[name="permanent_district"]').value = '';
            document.querySelector('input[name="permanent_city"]').value = '';
            document.querySelector('input[name="permanent_province"]').value = '';
            document.querySelector('input[name="permanent_zip"]').value = '';
            document.querySelector('input[name="permanent_hnumber"]').value = '';

        }
    });
    // Function to update district and zip code
    function updateDistrictandZip() {
        var selectElement = document.getElementById("areaSelect");
        var districtField = document.getElementById("districtField");
        var zipField = document.querySelector("#zipField");
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var district = selectedOption.getAttribute('data-district');
        var zipCode = selectedOption.getAttribute('data-zip');

        // Update district field
        if (district) {
            districtField.value = "District " + district;
        } else {
            districtField.value = ""; // Clear the field or handle as needed
        }

        // Update zip code field
        if (zipCode) {
            zipField.value = zipCode;
        } else {
            zipField.value = ""; // Clear the field or handle as needed
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
    </script>

    <script>

        // Function to enforce letter-only input in specified element
        function allowLettersOnly(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any digit or dot with an empty string
                this.value = this.value.replace(/[\d.]/g, '');
            });
        }

        allowLettersOnly('fName');
        allowLettersOnly('mName');
        allowLettersOnly('lName');
        allowLettersOnly('religion');
        allowLettersOnly('earnerName');
        allowLettersOnly('fatherFName');
        allowLettersOnly('fatherMName');
        allowLettersOnly('fatherLName');
        allowLettersOnly('motherFName');
        allowLettersOnly('motherMName');
        allowLettersOnly('motherLName');
        allowLettersOnly('guardianFname');



        // Function to enforce numeric-only input in specified element
        function allowNumbersOnly(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any character that is not a digit or a dot with an empty string
                this.value = this.value.replace(/[^\d.]/g, '');
            });
        }

        // Apply the function to your input elements
        allowNumbersOnly('mNumber');
        allowNumbersOnly('shAve');
        allowNumbersOnly('cAve');
        allowNumbersOnly('height');
        allowNumbersOnly('weight');
        allowNumbersOnly('emergencyContact');
        allowNumbersOnly('earnerIncome');
        allowNumbersOnly('numSiblings');

    // function isValidEmail(email) {
    // const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // return emailRegex.test(email);
    // }
</script>

<script>
    //Function for academic info radio button
    function showHighSchoolFields() {
        document.getElementById('highSchoolFields').style.display = 'block';
        document.getElementById('collegeFields').style.display = 'none';
        toggleRequiredFields('#highSchoolFields', true);
        toggleRequiredFields('#collegeFields', false);
        document.getElementById('studType').value = 'Senior High Graduate';
    }
    function showCollegeFields() {
        document.getElementById('highSchoolFields').style.display = 'none';
        document.getElementById('collegeFields').style.display = 'block';
        toggleRequiredFields('#collegeFields', true);
        toggleRequiredFields('#highSchoolFields', false);
        document.getElementById('studType').value = 'College';
    }
    function toggleRequiredFields(selector, state) {
    $(selector).find('input[required], select[required], textarea[required]').each(function() {
        $(this).prop('required', state);
    });
}


// Function to add a new row for family information
function addFamilyRow(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const familyInfoContainer = document.querySelector('.family-info-container');
    const newRow = familyInfoContainer.querySelector('.row').cloneNode(true);

    // Clear the input values in the new row
    const inputs = newRow.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    // Create the remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'w-100', 'border-2');
    removeButton.onclick = function() {
        familyInfoContainer.removeChild(newRow);
    };

    // Append the remove button to the appropriate column
    const buttonColumn = newRow.querySelector('.button-column');
    buttonColumn.appendChild(removeButton);

    // Append the new row to the familyInfoContainer
    familyInfoContainer.appendChild(newRow);
}

// Function to remove a row for family information
function removeFamilyRow(button) {
    const familyRow = button.closest('.row');
    familyRow.remove();
}


  //Function to add a new row for grade information
function addGradeRow(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const gradeInfoContainer = document.querySelector('.sub');
    const newRow = gradeInfoContainer.querySelector('.row').cloneNode(true);

    // Clear the input values in the new row
    const inputs = newRow.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    // Create the remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'w-100', 'border-2');
    removeButton.onclick = function() {
        gradeInfoContainer.removeChild(newRow);
    };

    // Append the remove button to the appropriate column
    const buttonColumn = newRow.querySelector('.button-column');
    buttonColumn.appendChild(removeButton);

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

<script>
//Function for validating required fields
$(document).ready(function() {
    // Initially disable all tabs except the first
    disableTabs();

    function disableTabs() {
        $('#myTabs a.nav-link').not(':first').addClass('disabled');
    }

    $('.next-tab').on('click', function() {
        var currentTabPane = $(this).closest('.tab-pane');
        var nextTabId = $(this).data('next');

        if (validateCurrentTab(currentTabPane)) {
            // Enable and show the next tab
            $(`#myTabs a[href="${nextTabId}"]`).removeClass('disabled').tab('show');
        }
    });

    function validateCurrentTab(tabPane) {
    var isValid = true;
    $(tabPane).find('input:visible[required], select:visible[required], textarea:visible[required]').each(function() {
        if (!this.checkValidity()) {
            isValid = false;
            $(this).addClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
            $(this).after('<div class="invalid-feedback">This is a required field</div>');
        } else {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
    });
    return isValid;
    }

    // Clear the error state and message when the user corrects the input
    $('input[required], select[required], textarea[required]').on('input change', function() {
        if (this.checkValidity()) {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
    });

    $('#myTabs a.nav-link').on('click', function (e) {
        if ($(this).hasClass('disabled')) {
            e.preventDefault();
            return false;
        }
    });
});
</script>



</script>
</body>
</html>

    