<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 1) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];
    $appliLogin = $admin->getScholarById($id);
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
                            <div class="p-2 ms-auto"> <a href="dashboard.php"><i class='bx bx-arrow-back me-2'></i>Back</a></div>
                        </div>


            
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


            <div class="tab-content mt-2 mb-4" id="myTabsContent">
                <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
                    <form id="ccmfForm" method="POST" action="../functions/renewal-function.php" enctype="multipart/form-data">
                    <div class="row">
                    <!--- Personal Infomartion --->
                    <?php
                    foreach($appliLogin as $i){
                    ?>
                    <h5 class="text-primary">WE'VE AUTOMATICALLY FILLED IN SOME OF THE FIELDS FOR YOU BASED ON YOU INFORMATION.</h5>
                    <div class="col-md-4 mb-3">
                        <label  class="form-label">First Name:<span class="text-danger">*</span></label>
                        <input type="text" name="fName" id="fName" class="form-control form-control-sm" value="<?php echo $i["f_name"]?>" readonly>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label  class="form-label">Middle Name:</label>
                        <input type="text" name="mName" id="mName" class="form-control form-control-sm" value="<?php echo $i["m_name"]?>" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label  class="form-label">Last Name:<span class="text-danger">*</span></label>
                        <input type="text" name="lName" id="lName" class="form-control form-control-sm" value="<?php echo $i["l_name"]?>" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label  class="form-label">Suffix:(Optional)</label>
                        <input type="text" name="suffix" class="form-control form-control-sm" value="<?php echo $i["suffix"]?>" placeholder="E.g. Jr. Sr. III..." readonly>
                    </div>
                
                    <div class="col-md-6 mb-3">
                        <label  class="form-label">Civil Status: <span class="text-danger">*</span></label>
                        <input type="text" name="cStatus" class="form-control form-control-sm" value="<?php echo $i["c_status"]?>" readonly>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Active Contact Number: <span class="text-danger">*</span></label>
                        <input type="text" name="mNumber" id="mNumber" class="form-control form-control-sm" value="<?php echo $i["mobile_number"]?>" maxlength="11" readonly>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Active Gcash Number: <span class="text-danger">* </span><input type="checkbox" id="sameAsActive"> <label for="sameAsActive"><small class="text-muted">Same as active number</small></label>
                        <input type="text" name="gNumber" id="gNumber" class="form-control form-control-sm" placeholder="09XXXXXXXX" required maxlength="11">
                    </div>


                    <h5 class="text-primary">SCHOLARSHIP AND ENROLLMENT INFORMATION</h5>
                    <div class="border-bottom mb-3 border border-1"></div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Current Educational Level: <span class="text-danger">*</span></label>
                        <input type="text" name="eduLevel" id="eduLevel" class="form-control form-control-sm" value="TERTIARY/COLLEGE" Readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label"><small>Number of Units completed from 1st year to previous school term/school year</small>: <span class="text-danger">*</span></label>
                        <input type="text" name="totalUnitsCol" id="totalUnits" class="form-control form-control-sm" maxlength="11" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label  class="form-label">Current University Enrolled at:</label>
                        <select class="form-select form-select-sm" name="university" id="universitySelect" aria-label="Select University" onchange="checkOtherOption('universitySelect', 'otherUniv', 'otherUniv1')">
                            <option></option>
                            <option value="AMA Computer University - Fairview Campus">AMA Computer University - Fairview Campus</option>
                            <option value="Asian College Quezon City (ACQC)">Asian College Quezon City (ACQC)</option>
                            <option value="Bestlink College of The Philippines">Bestlink College of The Philippines</option>
                            <option value="Mary the Queen College of Science and Technology">Mary the Queen College of Science and Technology</option>
                            <option value="National College of Business and Arts (NCBA)">National College of Business and Arts (NCBA)</option>
                            <option value="New Era University">New Era University</option>
                            <option value="Our Lady of Fatima University (OLFU) - Quezon City campus">Our Lady of Fatima University (OLFU) - Quezon City campus</option>
                            <option value="Philippine Women's University in Quezon City">Philippine Women's University in Quezon City</option>
                            <option value="Quezon City University (QCU)">Quezon City University (QCU)</option>
                            <option value="St. Anthony School of Quezon City (SASQC)">St. Anthony School of Quezon City (SASQC)</option>
                            <option value="St. Joseph's College Of Quezon City">St. Joseph's College Of Quezon City</option>
                            <option value="St. Paul University Quezon City (SPUQC)">St. Paul University Quezon City (SPUQC)</option>
                            <option value="Systems Technology Institute's College">Systems Technology Institute's College</option>
                            <option value="Technological Institute of the Philippines – Quezon City">Technological Institute of the Philippines – Quezon City</option>
                            <option value="University of the Philippines Diliman">University of the Philippines Diliman</option>
                            <option value="Others">Other (Specify)</option>
                        </select>

                        <div id="otherUniv" style="display: none;">
                            <input class="form-control form-control-sm mt-2" type="text" name="otherUniv" id="otherUniv1" placeholder="Other Course">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label"><small>Number of Units currently enrolled in</small>: <span class="text-danger">*</span></label>
                        <input type="text" name="unitsPerSem" id="unitsPerSem" class="form-control form-control-sm" maxlength="11" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Year Level:</label>
                        <select name="yLevel"  class="form-select form-select-sm" aria-label="Year Level">
                            <option value=""></option>
                            <option value="1ST YEAR">1st</option>
                            <option value="2ND YEAR">2nd</option>
                            <option value="3RD YEAR">3rd</option>
                            <option value="4TH YEAR">4th</option>
                            <option value="5TH YEAR">5th</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Semester:</label>
                        <select name="semester"  class="form-select form-select-sm" aria-label="SEMESTER">
                            <option value=""></option>
                            <option value="1ST SEMESTER">1st</option>
                            <option value="2ND SEMESTER">2nd</option>
                            <option value="3RD SEMESTER">3rd</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">School Year: <span class="text-danger">*</span></label>
                        <input type="text" name="schoolYear" id="schoolYear" class="form-control form-control-sm" maxlength="11" required>
                    </div>

                    <div class="hstack gap-3">

                        <div>
                            <h5 class="text-primary mt-4">LIST OF SUBJECTS/COURSE TAKEN IN THE LAST SCHOOL TERM</h5>
                        </div>
                        <div >
                            <button class="btn btn-primary btn-sm shadow mb-1 mt-4" onclick="addGradeRow(event)">Add Row</button>
                        </div>
                    </div>
                    <div class="border-bottom mb-3 border border-1"></div>

                    <div class="sub">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Subject:<span class="text-danger">*</span></label>
                            <input type="text" name="sub[]" class="form-control form-control-sm" placeholder="Subject" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Unit:</label>
                            <input type="text" name="totalUnits[]" class="form-control form-control-sm" placeholder="Unit">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Grade:<span class="text-danger">*</span></label>
                            <input type="text" name="gAverage[]" id="gAve" class="form-control form-control-sm" placeholder="Grade" required>
                        </div>

                        <div class="col-md-2  button-column">
                        <label class="form-label text-white">1</label>
                        </div>
                        <hr class="border border-2" style="color: black;">
                    </div>
                    </div>

                    <h5 class="text-primary">UPLOAD YOUR SUPPORTING DOCUMENTS</h5>
                    <div class="border-bottom mb-3 border border-1"></div>
                    
                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Registration Form (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">
                                <img src="../images/upload-logo1.png" alt="Upload File" style="height: 20px;">    
                                <input type="file" name="regForm" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer6')" required></label>
                                <div class="Preview1 " id="previewContainer6">
                                </div>
                        </div> 
                    </div>

                    <div class="col-lg-6 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Grade Slip (PDF Only)<span class="text-danger">*</span></h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">
                                <img src="../images/upload-logo1.png" alt="Upload File" style="height: 20px;">
                                <input type="file" name="gradeSlip" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event, 'previewContainer7')" required></label>
                                <div class="Preview1 " id="previewContainer7">
                                </div>
                        </div> 
                    </div>
                    <input type="hidden" name="scholar_id" class="form-control form-control-sm" value="<?php echo $i["scholar_id"]?>">
                    <?php }?>

                    </div>
                </div>
            <!-- - End of Personal Infomartion --->
            
            <!-- Sponsors Tab Content -->
            

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    
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
                <button class="btn btn-primary col-lg-4 col-6 btn-sm" type="submit" name="submit" id="submitForm">Submit</button>
            </div>
            
        </div>  


        </form>
        </div>
 





            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('#submitForm').on('click', function(event) {
            // Prevent form submission if validation fails
            if (!validateForm()) {
                event.preventDefault();
                return false;
            }
        });

        function validateForm() {
            var isValid = true;
            $('#ccmfForm').find('input:visible[required], select:visible[required], textarea:visible[required]').each(function() {
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
    });
</script>
   

<script>
    // document.getElementById('transferSchool').addEventListener('change', function() {
    //     if (this.value == "yes") {
    //         document.getElementById('otherUnivOption').style.display = "block";
    //     } else {
    //         document.getElementById('otherUnivOption').style.display = 'none';
    //     }
    // });
    //function for same as present address
    document.getElementById('sameAsActive').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('gNumber').value = document.getElementById('mNumber').value;
        } else {
            document.getElementById('gNumber').value = '';
        }
    });
    // Function to update district and zip code

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
    </script>

    <script>

        // Function to enforce letter-only input in specified element
        function allowLettersOnly(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any digit or dot with an empty string
                this.value = this.value.replace(/[\d.]/g, '');
            });
        }

        // Function to enforce numeric-only input in specified element
        function allowNumbersOnly(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any character that is not a digit or a dot with an empty string
                this.value = this.value.replace(/[^\d.]/g, '');
            });
        }

        // Apply the function to your input elements
        allowNumbersOnly('mNumber');
        allowNumbersOnly('gNumber');

        allowNumbersOnly('totalUnits');
        allowNumbersOnly('unitsPerSem');
        allowNumbersOnly('gAve');

        // Function to enforce numeric-only input and restrictions on average fields
        function restrictAverage(inputId) {
            document.getElementById(inputId).addEventListener('input', function(e) {
                // Replace any character that is not a digit or a dot with an empty string
                this.value = this.value.replace(/[^\d.]/g, '');

                // If the input is not empty
                if (this.value !== "") {
                    // If it's a valid number
                    if (!isNaN(this.value)) {
                        const value = parseFloat(this.value);
                        // Restrict the value based on whether it's a whole number or decimal
                        if (Number.isInteger(value)) {
                            // If whole number, restrict to not exceed 100
                            if (value > 100) {
                                this.value = "100";
                            }
                        } else {
                            // If decimal, restrict to not exceed 100
                            if (value > 100) {
                                this.value = "100";
                            }
                            // Round the value to two decimal places
                            this.value = parseFloat(value.toFixed(2)).toString();
                        }
                    } else {
                        // If input is not a valid number, set value to empty string
                        this.value = "";
                    }
                }
            });
        }

        // Apply the function to your input elements
        restrictAverage('unitsPerSem');
        restrictAverage('gAve');
</script>

<script>

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





</script>
</body>
</html>

    