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
                    <input type="text" name="suffix" class="form-control form-control-sm" placeholder="Optional">
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
                    <input type="text" name="cStatus" class="form-control form-control-sm" placeholder="Civil Status" required>
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
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Email Address" required>
                </div>


                <div class="col-md-3 mb-3">
                    <label  class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control form-control-sm" placeholder="Address" required>
                </div>
            

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Province:</label>
                    <input type="text" name="province" class="form-control form-control-sm" placeholder="Province" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Medical Conditions:</label>
                    <input type="text" name="mCondition" class="form-control form-control-sm" placeholder="Medical Conditions" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Facebook Account Link:</label>
                    <input type="text" name="fbLink" class="form-control form-control-sm" placeholder="Facebook Link" required>
                </div>


                <div class="col-md-12 mb-3">
                    <label class="form-label">Skills/Hobbies/Interest/Talents</label>
                    <textarea class="form-control" name="skills" placeholder="Skills/Hobbies/Interest/Talents" required></textarea>
                </div>

                </div>
                    <!--- End Personal Infomartion --->

                    <!--- Family Infomartion --->
                
                <div class="row mt-4">
                    <h4 class="text-primary"> Family Information </h4>
                    <div class="border-bottom mb-3 border border-1"></div>
                            
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Father Name:</label>
                    <input type="text" name="fatherName" class="form-control form-control-sm" placeholder="Father Name" required>
                </div>
            

                <div class="col-md-1 mb-3">
                    <label  class="form-label">Age:</label>
                    <input type="text" name="fAge" id="fAge" class="form-control form-control-sm" placeholder="Age" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="fOccupation" class="form-control form-control-sm" placeholder="Occupation" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Monthly Income:</label>
                    <input type="text" name="fatherIncome" id="fatherIncome" class="form-control form-control-sm" placeholder="Monthly Income" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Highest Level Attained:</label>
                    <input type="text" name="fatherAttained" class="form-control form-control-sm" placeholder="Highest Level Attained" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Mother Name:</label>
                    <input type="text" name="motherName" class="form-control form-control-sm" placeholder="Mother Name" required>
                </div>
             

                <div class="col-md-1 mb-3">
                    <label  class="form-label">Age:</label>
                    <input type="text" name="motherAge" id="motherAge" class="form-control form-control-sm" placeholder="Age" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Occupation:</label>
                    <input type="text" name="motherOccupation" class="form-control form-control-sm" placeholder="Occupation" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label  class="form-label">Monthly Income:</label>
                    <input type="text" name="motherIncome" id="motherIncome" class="form-control form-control-sm" placeholder="Monthly Income" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Highest Level Attained:</label>
                    <input type="text" name="motherAttained" class="form-control form-control-sm" placeholder="Highest Level Attained" required>
                </div>


                
                <div class="col-md-3 mb-3">
                    <label  class="form-label">Guardian:</label>
                    <input type="text" name="guardian" class="form-control form-control-sm" placeholder="Gurdian" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Emergency Contact:</label>
                    <input type="text" name="emergencyContact" id="emergencyContact" class="form-control form-control-sm" placeholder="Emergency Contact" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Relationship:</label>
                    <input type="text" name="relationship" class="form-control form-control-sm" placeholder="Relationship" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Contact Number:</label>
                    <input type="text" name="guardiancNumber" id="guardiancNumber" class="form-control form-control-sm" placeholder="Contact Number" required>
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
        <button type="button" class="btn btn-primary w-25 next-step" type="button">Next</button>
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
                    <input type="text" name="eAchievements" class="form-control form-control-sm" placeholder="Achievements:" required>
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
                    <input type="text" name="jhAchievements" class="form-control form-control-sm" placeholder="Achievement" required>
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
                    <input type="text" name="shAchievements" class="form-control form-control-sm" placeholder="Achievements" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Strand and Year Level:</label>
                    <input type="text" name="shCourse" class="form-control form-control-sm" placeholder="Strand and Year Level" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">College:</label>
                    <input type="text" name="cSchool" class="form-control form-control-sm" placeholder="College" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Academic Average:</label>
                    <input type="text" name="cAve" class="form-control form-control-sm" placeholder="Academic Average" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Achievements:</label>
                    <input type="text" name="cAchievements" class="form-control form-control-sm" placeholder="Achievements" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label  class="form-label">Course and Year Level:</label>
                    <input type="text" name="cCourse" class="form-control form-control-sm" placeholder="Course and Year Level:" required>
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
            <label class="form-label">Unit:</label>
            <input type="text" name="totalUnits[]" class="form-control form-control-sm" placeholder="Unit" required>
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

                    <div class="col-md-4 mb-3">
                    <label for="formFile" class="form-label">Family Profile</label>
                    <input class="form-control form-control-sm border-bottom" type="file" name="famProf" accept="application/pdf" required>
                    </div>

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
        </div>
    </div>


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

    