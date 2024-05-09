
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
    $admin_logs = $admin->getCustomizableForm();
    $content_design = $admin->getContent();

} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/forcert1.png" />
        <title>Scholarship Management System</title>
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
            <?php include '../header/sidebar-CMS.php'; ?>
          </header>

          <main  style="margin-top: 68px;">
              <div class="container-fluid p-3">

              <div class="card bg-transparent border-0">


              <div class="container-fluid">
                    
              <div class="row mb-3">
                        <div class="col-8"><p class="h4 mb-0 font-weight-bold text-gray-800">Customize WebPage</p></div>

                    </div>



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12" >
                            <div class="card shadow mb-4" style="font-size: 14px;">
                            
                                <div class="row m-3">
                                    <div class="col-8"><h5 class="p-2 font-weight-bold text-black mb-2">Files</h5></div>
                                    <div class="col-4 float-end">
                                        <button type="submit" class=" btn  btn-primary shadow-sm float-end" data-bs-toggle="modal" data-bs-target="#add">
                                            <i class="fas fa-add fa-sm text-white-50"></i> 
                                            <div class="d-none d-sm-inline-block">Add</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="viewLogs" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">File Type</th>
                                            <th scope="col">Required</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $num = 1;
                                            foreach($admin_logs as $s):
                                                if($s['is_required'] == 1){
                                                    $req = "Required";
                                                }else{
                                                    $req = "Not Required";
                                                }
                                        ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $s['name']; ?></td>
                                            <td><?php echo $s['file_type']; ?></td>
                                            <td><?php echo $req; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmation(<?php echo $s['id'];?>)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php 
                                        $num++;
                                    endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Area Chart -->
                        <div class="col-xl-12" >
                            <div class="card shadow mb-4" style="font-size: 14px;">
                            
                                <div class="row m-3">
                                    <div class="col-8"><h5 class="p-2 font-weight-bold text-black mb-2">Content</h5></div>
                                    <div class="col-4 float-end">
                                        <button type="submit" class=" btn  btn-primary shadow-sm float-end" data-bs-toggle="modal" data-bs-target="#add">
                                            <i class="fas fa-add fa-sm text-white-50"></i> 
                                            <div class="d-none d-sm-inline-block">Add</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <?php 
                                            $nums = 1;
                                            foreach($content_design as $des):
                                        ?>
                                        <div class="container">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-3" style="height: 200px;">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="p-2 font-weight-bold text-black mb-2">Title</h5>
                                                            <h3><?php echo $des['title_name']; ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-3" style="height: 200px;">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="p-2 font-weight-bold text-black mb-2">Logo</h5>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <img src="../images/<?php echo $des['logo']; ?>" class="img-fluid" style="max-width: 100px; max-height: 100px;" alt="Logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-3" style="height: 200px;">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="p-2 font-weight-bold text-black mb-2">Vision</h5>
                                                            <h3><?php echo $des['vision']; ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-3" style="height: 200px;">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="p-2 font-weight-bold text-black mb-2">Mission</h5>
                                                            <h3><?php echo $des['mission']; ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php 
                                        $num++;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div> 
            </div>
        </main>
    
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Files Requirements</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/addRequirements.php">
        <div class="row">
            <div class="col-md-12">
                <label  class="form-label">Name:</label>
                <input type="text" name="fileName" class="form-control form-control-sm" placeholder="Name of Requirements" required>
            </div>
            <div class="col-md-12">
                <label  class="form-label">File Type:</label>
                <select class="form-select form-select-sm" name="fileType" required>
                    <option></option>
                    <option value="pdf">PDF</option>
                    <option value="image">Image</option>
                </select>
            </div>
            <div class="col-md-12">
                <label  class="form-label">Is Required?</label>
                <select class="form-select form-select-sm" name="isReq" required>
                    <option></option>
                    <option value="0">Not Required</option>
                    <option value="1">Required</option>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


        
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

        $(document).ready(function() {
            $('#contents').DataTable();
        });
    </script>

    <script>
    function confirmation(id){
        Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            window.location.href = '../functions/deleteReq.php?id='+id;
        });
    }
    </script>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successValue = urlParams.get('status');
    console.log(successValue);

    if(successValue === "successDel"){
        Swal.fire({
            icon:'success',
            title:'Deleted Successfully!',
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
    }else if(successValue === "successAdd"){
        Swal.fire({
            icon:'success',
            title:'Added Successfully!',
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
    </script>

    
    

    
    
    </body>
  </html>