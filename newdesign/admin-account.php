
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);

} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
        <title>Consuelo Chito Madrigal Foundation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
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


              <div class="container-fluid">

                 

                    <div class="hstack g-1 mb-3">
                        <div class="p-2"><p class="h3 mb-0 font-weight-bold text-gray-800">Admins</p></div>
                        <div class="p-2 ms-auto">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-regular fa-paper-plane "></i> <div class="d-none d-sm-inline-block">Add Account</div>
                        </button>
                        </div>
                    </div>

                        

  

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4" style="font-size: 14px;">
                                <!-- Card Header - Dropdown -->
                                
                                <div class="card-body">
                                <h6 class="p-2 font-weight-bold text-black mb-2">Admin Accounts</h6>
                                    <div class="table-responsive">
                                    <table id="scholars" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pic</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date Added</th>
                                    
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-dividercar">
                                    <?php
                                    $applicantsData = $admin->getAdmins();
                                    $num = 1;
                                    foreach($applicantsData as $s){
                                    ?>
                                        <tr>
                                            <th scope="col"><?php echo $num; ?></th>
                                            <td><img class="img-profile rounded-circle" src="../Scholar_files/<?php echo $s['pic']; ?>" style="height:40px;width:40px;"></td>
                                            <td style="white-space: nowrap;"><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                                            <td style="white-space: nowrap;"><?php echo $s["email"];?></td>
                                            <td><?php echo $s["date"];?></td>
                                            
                                            
                                        </tr>
                                        <?php 
                                    $num++;
                                        } 
                                    ?>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card-body">

                    <!-- Content Row -->
                    <!-- <div class="row"> -->
                        
                        <!-- Area Chart -->
                        <!-- <div class="col-lg-15 mb-4 ">
                            <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Student</h6>
            
                                </div> -->
                                <!-- Card Body --> 
                                <!-- <div class="card-body">                                  
                            <label for="uname"><b>Email:</b></label>
                            <input type="text" placeholder="Enter Email" name="Email" required>
                            <button type="submit">Add Student</button>
                            </div> -->
                     <!-- Card Body -->
                    <!-- </div> -->
                

            
                    <!-- Content Row -->
                    <div class="row">
                        

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             



            
<!-- Send Email -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


            <div class="container ">
                    <form enctype="multipart/form-data" method="post" action="../functions/admin-sendEmail.php">
                        <div class="form-group mb-3">
                            <label for="recipientEmail">Recipient's Email:</label>
                            <select name="email" class="form-control" required>
                                <option value="0">Select Scholar</option>
                                <?php
                                $scholar = $admin->getScholars();
                                foreach($scholar as $s){
                                    echo "<option value='" . $s['email'] . "'>" . $s['f_name'] . " " . $s['l_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter email subject" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" rows="5" placeholder="Enter your message" required></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                            </div>
                        
                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Send Email</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Send Email -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


            <div class="container ">
                <form enctype="multipart/form-data" method="post" action="../functions/admin-account.php">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    
                
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Send Email</button>
                </form>
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
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        $(document).ready(function() {
            $('#scholars').DataTable();
        });
    </script>

    
    

    
    
    </body>
  </html>