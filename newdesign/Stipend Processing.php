
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 4)) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require  '../classes/scholar.php';

    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);

    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);
    $stipend = $scholar->getStipend();

    $content = $admin->getContent();

} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/<?php echo $content[0]['logo']; ?>" />
        <title><?php echo $content[0]['title_name']; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    </head>

    <body>  
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0">


              < class="container-fluid">
                    
                    <div class="hstack g-1 mb-1">
                    <div class="p-2"><p class="h4 mb-0 font-weight-bold text-gray-800">Stipend</p></div>
                              <div class="p-2 ms-auto">
                                  
                              <!-- Academic is for Checkbox 1 -->
                              <!-- Economic is for Checkbox 2 -->

                              
                          </div>
      
                          </div>
                          
                      <div class="container-fluid">
                        <div class="row justify-content-end">
              
                 
                        </div>
                    </div> 
      

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4" style="font-size: 14px;">
                                <div class="card-body">
                                <h6 class="p-2 font-weight-bold text-black mb-2">Stipend Processing</h6>
                                    <div class="table-responsive">
                                    <table id="scholars" class="table">
                                    <thead>
     <tr>
      <th scope="col">#</th>
      <th scope="col">Scholar ID</th>
      <th scope="col">Scholar Name</th>
      <th scope="col">Type</th>
      <th scope="col">Grants</th>
      <th scope="col">Status</th>
      <th scope="col">Certificate</th>
      <th scope="col">Actions</th>
        </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php 
$index = 1; // Initialize a counter for the table row numbers
foreach ($stipend as $stip) {
    // Determine the status badge
    if ($stip['status'] == 0) {
        $status = '<span class="badge bg-primary">To Send</span>';
    } elseif ($stip['status'] == 1) {
        $status = '<span class="badge bg-success">Sent</span>';
    }

    // Determine the certificate link or text
    if ($stip['certificate'] == "") {
        $cert = 'Not Generated';
    } else {
        $cert = '<a href="../certificates/' . $stip['certificate'] . '" target="_blank">Generated</a>';
    }
    ?>
    <tr>
        <th scope="row"><?php echo $index++; ?></th> <!-- Use the counter for row number -->
        <td style="white-space: nowrap;"><?php echo $stip['scholar_id']; ?></td>
        <td style="white-space: nowrap;"><?php echo $stip['full_name']; ?></td>
        <td style="white-space: nowrap;"><?php echo $stip['scholar_type']; ?></td>
        <td style="white-space: nowrap;"><?php echo $stip['grants']; ?></td>
        <td style="white-space: nowrap;"><?php echo $status; ?></td>
        <td style="white-space: nowrap;"><?php echo $cert; ?></td>
        <td style="white-space: nowrap;">
            <form method="post" action="../admin/stipend.php">
                <input type="hidden" name="scholar_id" value="<?php echo $stip['scholar_id']; ?>">
                <input type="hidden" name="f_name" value="<?php echo $stip['full_name']; ?>">
                <input type="hidden" name="grants" value="<?php echo $stip['grants']; ?>">
                <input type="hidden" name="id" value="<?php echo $stip['id']; ?>">
                
                <button class="btn btn-sm btn-primary" type="submit" name="sendCert">Send Stipend</button>
                <button class="btn btn-sm btn-info" type="submit" name="genCert">Generate Certificate</button>
            </form>
        </td>
    </tr>
<?php } ?>

      </tbody>
      </table>
                    </div>
</div>
</div>
</div>
</div>

      </div>
      </div>
      </main>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        $(document).ready(function() {
            $('#scholars').DataTable();
        });

    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('info');
    console.log(successValue);

    if(successValue === "send"){
        Swal.fire({
            icon:'success',
            title:'Stipend Send!',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }else if(successValue === "generated"){
        Swal.fire({
            icon:'success',
            title:'Certificate Generated!',
            toast:true,
            position:'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }

    // Stipend table script start

// Add event listener to the select economic button
document.getElementById('select-economic-btn').addEventListener('click', function() {
  // Get all checkboxes
  var checkboxes = document.getElementsByClassName('item-checkbox2');
  var economicChecked = document.getElementById('economic-checked');

  // Toggle the checked state of all checkboxes
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = !checkboxes[i].checked;
  }

  // Update the hidden input field
  economicChecked.value = checkboxes[0].checked ? 1 : 0;
});

// Add event listener to the select academic button
document.getElementById('select-academic-btn').addEventListener('click', function() {
  // Get all checkboxes
  var checkboxes = document.getElementsByClassName('item-checkbox1');
  var academicChecked = document.getElementById('academic-checked');

  // Toggle the checked state of all checkboxes
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = !checkboxes[i].checked;
  }

  // Update the hidden input field
  academicChecked.value = checkboxes[0].checked ? 1 : 0;
});

// Add event listener to the deselect all button
document.getElementById('deselect-btn').addEventListener('click', function() {
  // Get all checkboxes
  var checkboxes = document.getElementsByClassName('item-checkbox1');
  var checkboxes2 = document.getElementsByClassName('item-checkbox2');
  var academicChecked = document.getElementById('academic-checked');
  var economicChecked = document.getElementById('economic-checked');

  // Toggle the checked state of all checkboxes
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = false;
  }
  for (var i = 0; i < checkboxes2.length; i++) {
    checkboxes2[i].checked = false;
  }

  // Update the hidden input fields
  academicChecked.value = 0;
  economicChecked.value = 0;
});

// Function to update the selected list
function updateSelectedList(checkboxes, selectedList) {
  var selectedItems = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedItems.push(checkboxes[i].nextSibling.textContent.trim());
    }
  }

  // Sort the selected items in ascending order
  selectedItems.sort();

  // Update the selected list
  selectedList.innerHTML = '';
  if (selectedItems.length > 0) {
    for (var i = 0; i < selectedItems.length; i++) {
      var listItem = document.createElement('li');
      listItem.textContent = selectedItems[i];
      selectedList.appendChild(listItem);
    }
  } else {
    var listItem = document.createElement('li');
    listItem.textContent = 'No items selected';
    selectedList.appendChild(listItem);
  }
}

// Add event listener to the Send Email button
document.getElementById('send-email-btn').addEventListener('click', function() {
  // Get the selected academic and economic checkboxes
  var academicChecked = document.getElementById('academic-checked').value;
  var economicChecked = document.getElementById('economic-checked').value;

  // Get the selected academic and economic students
  var academicStudents = [];
  var economicStudents = [];
  var checkboxes = document.getElementsByClassName('item-checkbox1');
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      academicStudents.push(checkboxes[i].value);
    }
  }
  checkboxes = document.getElementsByClassName('item-checkbox2');
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      economicStudents.push(checkboxes[i].value);
    }
  }

  // Get the email templates
  var academicTemplate = 'Dear [Name],\n\nThis is an email for the academic group.\n\nBest regards,\n[Your Name]';
  var economicTemplate = 'Dear [Name],\n\nThis is an email for the economic group.\n\nBest regards,\n[Your Name]';

  // Create the email content
  var emailContent = '';
  if (academicChecked == '1') {
    for (var i = 0; i < academicStudents.length; i++) {
      var student = academicStudents[i];
      var name = student.split('|')[0];
      var email = student.split('|')[1];
      var subject = 'Academic Email';
      var message = academicTemplate.replace('[Name]', name);

      // Send the email
      sendEmail(email, subject, message);

      // Add the student to the email content
      emailContent += '<p><strong>Name:</strong> ' + name + '</p>';
      emailContent += '<p><strong>Email:</strong> ' + email + '</p>';
    }
  }
  if (economicChecked == '1') {
    for (var i = 0; i < economicStudents.length; i++) {
      var student = economicStudents[i];
     var name = student.split('|')[0];
      var email = student.split('|')[1];
      var subject = 'Economic Email';
      var message = economicTemplate.replace('[Name]', name);

      // Send the email
      sendEmail(email, subject, message);

      // Add the student to the email content
      emailContent += '<p><strong>Name:</strong> ' + name + '</p>';
      emailContent += '<p><strong>Email:</strong> ' + email + '</p>';
    }
  }

  // Display the email content
  var emailModal = document.getElementById('email-modal');
  emailModal.querySelector('.modal-body').innerHTML = emailContent;
  emailModal.querySelector('.modal-title').textContent = 'Email Sent';
  emailModal.querySelector('.modal-footer').innerHTML = '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
  var modal = new bootstrap.Modal(emailModal);
  modal.show();
});

// Function to send an email
function sendEmail(email, subject, message) {
  // Implement your email sending logic here
}


// Stipend table script end

    </script>

    

    
    

    
    
    </body>
  </html>