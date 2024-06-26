
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 6) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);
    $admin_logs = $admin->getAdminlogs();
    $count = count($admin_logs);
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">


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
                        <div class="p-2"><p class="h4 mb-0 font-weight-bold text-gray-800">Admin Logs</p></div>
                    </div>



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4" style="font-size: 14px;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-body">
                                    <h6 class="p-2 font-weight-bold text-black mb-2">Admin Logs</h6>
                                    <div class="table-responsive">
                                    <table id="viewLogs" class="table table-striped table-hover">
                                    <?php if($count != 0): ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Scholar ID</th>
                                            <th scope="col">Admin ID</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-dividercar">
                                    <?php
                                    $num = 1;
                                    foreach ($admin_logs as $log): 

                                        $scholar_info = $admin->scholarInfo($log['scholar_id']);
                                        $admin_info = $admin->adminInfo($log['admin_id']);
                                        if($log['remarks'] == 0){
                                            $remarks = '<span class="badge bg-primary">Evaluate</span>';
                                        }
                                        else if($log['remarks'] == 1){
                                            $remarks = '<span class="badge bg-secondary">Initial Interview</span>';
                                        }else if($log['remarks'] == 2){
                                            $remarks = '<span class="badge bg-info">Done Interview</span>';
                                        }else if($log['remarks'] == 3){
                                            $remarks = '<span class="badge bg-success">Accepted</span>';
                                        }else if($log['remarks'] == 5){
                                            $remarks = '<span class="badge bg-danger">Declined</span>';
                                        }else if($log['remarks'] == 6){
                                            $remarks = '<span class="badge bg-danger">Revoke</span>';
                                        }else if($log['remarks'] == 7){
                                            $remarks = '<span class="badge bg-secondary">Send Email</span>';
                                        }else if($log['remarks'] == 8){
                                            $remarks = '<span class="badge bg-success">Scholar Renew</span>';
                                        }else if($log['remarks'] == 9){
                                            $remarks = '<span class="badge bg-info">Scholar Edit Renew </span>';
                                        }
                                        
                                        ?>
                                        <tr>
                                            <th scope="col"><?php echo $num; ?></th>
                                            <td style="white-space: nowrap;"><?php echo $scholar_info[0]['f_name'];?></td>
                                            <td style="white-space: nowrap;"><?php echo isset($admin_info[0]["f_name"]) ? $admin_info[0]["f_name"]:'';?></td>
                                            <td style="white-space: nowrap;"><?php echo $remarks;?></td>
                                            <td style="white-space: nowrap;"><?php echo $log["date"];?></td>
                                        </tr>
                                        <?php 
                                    $num++;
                                    endforeach;
                                    else:?>
                                        <div class="alert alert-primary" role="alert">No Announcements</div>
                                    <?php endif; ?>
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
            $('#viewLogs').DataTable();
        });
    </script>

    
    

    
    
    </body>
  </html>