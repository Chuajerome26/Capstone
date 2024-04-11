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
                                    <h6 class="display-7 text-center ms-2 mt-1 fw-bold"><span class="d-none d-lg-block">Consuelo Chito Madrigal Foundation Inc.(CCMFI)</span><span class="d-lg-none">CCMFI</span></h6>
                                </a>
                            </div>
                            <div class="p-2 ms-auto"> <a href="../index.php"><i class='bx bx-arrow-back me-2'></i>Back</a></div>
                        </div>




                       
        <!--- Di bale mamaya nalang mga alas singko --->
        <?php if($admin->isFormOpen()) {?>


            
<div class="modal fade border-0" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary p-2 m-0 px-2">
                    <h5 class="modal-title text-white ms-2" id="permissionModalLabel">Terms and Conditions</h5>
                </div>
                <div class="modal-body" style="overflow: auto;">
                    <div class="">


                    <div class="mx-1 mb-3">    I hereby declare that all information provided and documents submitted in support of my scholarship application are true and accurate. I give my consent to CCMF to collect, use and process my personal information. Furthermore, I confirm my compliance with the Data Privacy Act of 2012, ensuring the confidentiality and protection of any personal data shared in this application process.</div>

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
        <form id="ccmfForm" method="POST" action="../functions/applicants-register.php" enctype="multipart/form-data">
        <!------- STEP 1 ------->
     
          <!------- STEP 4 ------->
          <div class="step" id="step4" style="display: block;">
            <h4 class="text-primary"> Requirements </h4>
            <div class="border-bottom mb-3 border border-1"></div>

                    <div class="row">

                    <div class="col-md-6 m-auto mb-3">
                                <div class="fileUpload container">
                                <div class="p-2">
                                    <div class="Preview mb-3 max-width-8 rounded-circle overflow-hidden" id="previewContainer1">
                                    <img src="../images/no-images.jpg" alt="Image">
                                    </div>
                                    <h6 class="text-center">Upload 2x2 Picture</h6>
                                    <div class="text-center"> <!-- Centering the button -->
                            <label class="fileSelect btn btn-sm btn-primary col-lg-5 col-12 text-center">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" multiple onchange="handleFiles(event)"></label>
                        </div>                    
                    </div>
                            </div>


                            </div>



                            <div class="col-md-6 m-auto mb-3">
                                <div class="fileUpload container">
                                <div class="p-2">
                                    <div class="Preview mb-3 max-width-8  overflow-hidden" id="previewContainer2">
                                    <img src="../images/no-images.jpg" alt="Image">
                                    </div>
                                    <h6 class="text-center">Family Picture</h6>
                                    <div class="text-center"> <!-- Centering the button -->
                            <label class="fileSelect btn btn-sm btn-primary col-lg-5 col-12 text-center">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" multiple onchange="handleFiles2(event)"></label>
                        </div>                    
                    </div>
                            </div>


                            </div>

                    <!-- <label for="formFile" class="form-label">2x2 ID photo</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="idPhoto" accept="image/jpeg,image/jpg,image/png" required> -->
                    



                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Letter of Intent</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles1(event)"></label>
                                <div class="Preview1 " id="previewContainer">
                                </div>
                        </div> 
                    </div>

                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Family Profile</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles3(event)"></label>
                                <div class="Preview1 " id="previewContainer3">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Written Parent Consent</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles4(event)"></label>
                                <div class="Preview1 " id="previewContainer4">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Latest Copy of Grades</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles5(event)"></label>
                                <div class="Preview1 " id="previewContainer5">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Copy of Birth Certificate</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles6(event)"></label>
                                <div class="Preview1 " id="previewContainer6">
                                </div>
                        </div> 
                    </div>

                     <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Certificate of Indigency</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles7(event)"></label>
                                <div class="Preview1 " id="previewContainer7">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Recommendation Letter from Adviser/Principal</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles8(event)"></label>
                                <div class="Preview1 " id="previewContainer8">
                                </div>
                        </div> 
                    </div>


                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Certificate of Indigency</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles9(event)"></label>
                                <div class="Preview1 " id="previewContainer9">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Recommendation Letter from Adviser/Principal</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles10(event)"></label>
                                <div class="Preview1 " id="previewContainer10">
                                </div>
                        </div> 
                    </div>


                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Certificate of Good Moral</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles11(event)"></label>
                                <div class="Preview1 " id="previewContainer11">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Copy of High School Diploma</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles12(event)"></label>
                                <div class="Preview1 " id="previewContainer12">
                                </div>
                        </div> 
                    </div>


                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Copy of Form 137/138</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles13(event)"></label>
                                <div class="Preview1 " id="previewContainer13">
                                </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Copy of College/University Acceptance Letter</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles14(event)"></label>
                                <div class="Preview1 " id="previewContainer14">
                                </div>
                        </div> 
                    </div>

                    <div class="col-lg-4 col-12 mb-2 mt-4">               
                        <div class="fileUpload container">
                                <h6>Copy of Enrollment Form</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles15(event)"></label>
                                <div class="Preview1 " id="previewContainer15">
                                </div>
                        </div> 
                    </div>

                  

                    <div class="col-lg-4 col-12 mb-3">               
                        <div class="fileUpload container">
                                <h6>Sketch of House Area and Directions for Commuting from CCMF site</h6>
                                <label class="fileSelect btn btn-sm btn-primary col-12">Upload File<input type="file" id="fileInput" class="fileElem visually-hidden" accept=".pdf" multiple onchange="handleFiles16(event)"></label>
                                <div class="Preview1 " id="previewContainer16">
                                </div>
                        </div> 
                    </div>



                 


                    


                <script>

                function handleFiles(event) {
                        const fileList = event.target.files;
                        const previewContainer = document.getElementById('previewContainer1');
                        previewContainer.innerHTML = '';

                        const imageSize = 200; // Set the desired size for the preview images

                        for (let i = 0; i < fileList.length; i++) {
                            const file = fileList[i];
                            const reader = new FileReader();

                            reader.onload = function() {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.alt = file.name;
                                img.classList.add('previewImage');
                                img.style.width = imageSize + 'px'; // Set width
                                img.style.height = imageSize + 'px'; // Set height
                                previewContainer.appendChild(img);
                            }

                            reader.readAsDataURL(file);
                        }
                    }

                    function handleFiles2(event) {
                        const fileList = event.target.files;
                        const previewContainer = document.getElementById('previewContainer2');
                        previewContainer.innerHTML = '';

                        const imageSize = 200; // Set the desired size for the preview images

                        for (let i = 0; i < fileList.length; i++) {
                            const file = fileList[i];
                            const reader = new FileReader();

                            reader.onload = function() {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.alt = file.name;
                                img.classList.add('previewImage');
                                img.style.width = imageSize + 'px'; // Set width
                                img.style.height = imageSize + 'px'; // Set height
                                previewContainer.appendChild(img);
                            }

                            reader.readAsDataURL(file);
                        }
                    }
                    
                function handleFiles1(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }



                function handleFiles3(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer3');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }



                
                function handleFiles4(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer4');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles5(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer5');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }


                
                function handleFiles6(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer6');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles7(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer7');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles8(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer8');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles9(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer9');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles10(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer10');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }


                
                function handleFiles12(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer12');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }


                
                function handleFiles13(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer13');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }


                
                function handleFiles14(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer14');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles15(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer15');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }

                
                function handleFiles16(event) {
                    const fileList = event.target.files;
                    const previewContainer = document.getElementById('previewContainer16');
                    previewContainer.innerHTML = '';

                    for (let i = 0; i < fileList.length; i++) {
                        const file = fileList[i];
                        if (file.type === 'application/pdf') {
                            if (file.size <= 500 * 1024) { // Check if file size is less than or equal to 25MB
                                const fileNameContainer = document.createElement('div'); // Create a div container
                                fileNameContainer.classList.add('fileBox', 'd-flex', 'align-items-center'); // Add classes for styling and flexbox

                                const logo = document.createElement('img');
                                logo.src = '../images/folder-removebg-preview.png'; // Replace 'path_to_your_logo_image' with the actual path to your logo image
                                logo.alt = 'Logo';
                                logo.style.width = '50px'; // Set the width of the image
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
                                alert('File size exceeds the maximum limit of 25MB.');
                            }
                        } else {
                            alert('Please select only PDF files.');
                        }
                    }
                }
                </script>

                    



                   
                     <!-- <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Affectivity Test</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="affectTest" accept="application/pdf,image/jpeg,image/jpg">
                    </div>
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
                    <input class="form-control form-control-sm border-bottom border-bottom broken-border" type="file" name="letterIntent" accept="application/pdf" required>
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
                    </div> -->


              
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-secondary btn-sm col-lg-4 col-6 prev-step" type="button">Previous</button>
            <button class="btn btn-primary col-lg-4 col-6 btn-sm" type="submit" name="submit" id="submitForm" onclick="updateRowCount()" disabled>Submit</button>
            </div>

        </div>  


        </form>
        <?php
        } else {
            // Ah sarado, bibili sana ko mighty yung sigariryo
            echo '
            <div class="alert alert-primary" role="alert">
            The application form is currently closed. It is open from 8:00 AM to 5:00 PM.
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
        allowNumbersOnly('fAge');
        allowNumbersOnly('sAge');
        allowNumbersOnly('motherAge');

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

  // Functi// Function to add a new row for grade information
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
                <button type="button" class="btn btn-danger btn-sm" onclick="removeSchoolRow(this)">Remove</button>
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

    