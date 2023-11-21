<?php
session_start();

if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];

} else {
    header("Location: ../index.php");
}


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Consuelo Chito Madrigal Foundation</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
    <link rel="stylesheet" href="Applicant-Requirments-CSS.css" />
  </head>
  <center>
  <body>
    <h1>Applicant Requirements</h1>
  <?php 
    $applicants = $admin->getApplicantById($id);
    
    foreach($applicants as $a){

  ?>
    <table id="customers">
      <tr>
        <th>Firstname</th>
        <td><?php echo $a["f_name"];?></td>
        <td>
          <button class="edit-btn" onclick="openModal(1)">Edit</button>
        </td>
      </tr>
      <tr>
        <th>Lastname</th>
        <td><?php echo $a["l_name"];?></td>
        <td>
          <button class="edit-btn" onclick="openModal(2)">Edit</button>
        </td>
      </tr>
      <tr>
        <th>Gender</th>
        <td><?php echo $a["gender"];?></td>
        <td><button class="edit-btn" onclick="openModal(3)">Edit</button></td>
      </tr>
      <tr>
        <th>Civil Status</th>
        <td><?php echo $a["cStatus"];?></td>
        <td><button class="edit-btn" onclick="openModal(4)">Edit</button></td>
      </tr>

      <tr>
        <th>Citizenship</th>
        <td><?php echo $a["citizenship"];?></td>
        <td><button class="edit-btn" onclick="openModal(5)">Edit</button></td>
      </tr>
      <tr>
        <th>Date of birth</th>
        <td><?php echo $a["date_of_birth"];?></td>
        <td><button class="edit-btn" onclick="openModal(6)">Edit</button></td>
      </tr>
      <tr>
        <th>Birthplace</th>
        <td><?php echo $a["birth_place"];?></td>
        <td><button class="edit-btn" onclick="openModal(7)">Edit</button></td>
      </tr>

      <tr>
        <th>Mobile Number</th>
        <td><?php echo $a["mobile_num"];?></td>
        <td><button class="edit-btn" onclick="openModal(8)">Edit</button></td>
      </tr>
      <tr>
        <th>Email Address</th>
        <td><?php echo $a["email"];?></td>
        <td><button class="edit-btn" onclick="openModal(9)">Edit</button></td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php echo $a["address"];?></td>
        <td><button class="edit-btn" onclick="openModal(10)">Edit</button></td>
      </tr>
      <tr>
        <th>Total Subject</th>
        <td><?php echo $a["total_sub"];?></td>
        <td><button class="edit-btn" onclick="openModal(11)">Edit</button></td>
      </tr>
      <tr>
        <th>Total Units</th>
        <td><?php echo $a["total_units"];?></td>
        <td><button class="edit-btn" onclick="openModal(12)">Edit</button></td>
      </tr>
      <tr>
        <th>General Weigthed Average</th>
        <td><?php echo $a["gwa"];?></td>
        <td><button class="edit-btn" onclick="openModal(13)">Edit</button></td>
      </tr>

      <tr>
        <th>Upload 2x2 ID photo</th>
        <td><a href="../Uploads_pic/<?php echo $a["id_pic"]?>" target="_blank"><?php echo $a["id_pic"]?></a></td>
        <td>
          <label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="formFile">
      </td>
      </tr>
      <tr>
        <th>Latest Copy of Grades</th>
        <td><a href="../Uploads_cog/<?php echo $a["copy_grades"]?>" target="_blank"><?php echo $a["copy_grades"]?></a></td>
        <td><label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="formFile"></td>
      </tr>
      <tr>
        <th>Copy of Birth Certificate/PSA</th>
        <td><a href="../Uploads_psa/<?php echo $a["psa"]?>" target="_blank"><?php echo $a["psa"]?></a></td>
        <td><label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="formFile"></td>
      </tr>
      <tr>
        <th>Certificate of Good Moral</th>
        <td><a href="../Uploads_gm/<?php echo $a["good_moral"]?>" target="_blank"><?php echo $a["good_moral"]?></a></td>
        <td><label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="formFile"></td>
      </tr>
      <tr>
        <th>Copy of Enrollment Form</th>
        <td><a href="../Uploads_ef/<?php echo $a["e_Form"]?>" target="_blank"><?php echo $a["e_Form"]?></a></td>
        <td><label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="formFile"></td>
      </tr>
    </table>
    <?php } ?>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
      </br>
    </br>

        <input type="text" id="editedName" />
        <button onclick="saveChanges()"><p>Save</p></button>
      </div>
    </div>
    <script>
      var currentRowId;

      function openModal(rowId) {
        currentRowId = rowId;
        var modal = document.getElementById("myModal");

        var cellContent = document.querySelector(
          `tr:nth-child(${rowId}) td:nth-child(2)`
        ).textContent;
        var editedNameInput = document.getElementById("editedName");
        editedNameInput.value = cellContent;
        modal.style.display = "block";
      }

      function closeModal() {
        var modal = document.getElementById("myModal");

        modal.style.display = "none";
      }

      function saveChanges() {
        var editedName = document.getElementById("editedName").value;
        var cellToEdit = document.querySelector(
          `tr:nth-child(${currentRowId}) td:nth-child(2)`
        );
        cellToEdit.textContent = editedName;
        closeModal();
      }
      //   for upload
    </script>
  </body>
  </center>
</html>
