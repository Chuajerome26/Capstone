
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
    $scho_info = $admin->getGwaRequirement();
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
                    
              <div class="row mb-3">
                        <div class="col-8"><p class="h4 mb-0 font-weight-bold text-gray-800">Customize GWA Requirement for Scholarship Types</p></div>

                    </div>



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12" >
                            <div class="card shadow mb-4" style="font-size: 14px;">
                            
                                <div class="row m-3">
                                    <div class="col-8"><h5 class="p-2 font-weight-bold text-black mb-2">Scholarship Types</h5></div>
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
                                            <th scope="col">Scholarship Type</th>
                                            <th scope="col">Grade Range Requirement</th>
                                            <th scope="col">Grants</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $num = 1;
                                            foreach($scho_info as $s):
                                        ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $s['scholar_type']; ?></td>
                                            <td><?php echo $s['min_gwa']; ?> - <?php echo $s['max_gwa']; ?></td>
                                            <td><?php echo $s['grants']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $s["id"];?>"><i class="fas fa-edit"></i></button>
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


                    </div>
                </div>
            </div> 
            </div>
        </main>
<!--Modal for adding scholarship type-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Scholar Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../functions/addScholar-type.php">
        <div class="row">
            <div class="col-md-12">
                <label  class="form-label">Scholar Type:</label>
                <input type="text" name="scholar_type" class="form-control form-control-sm" placeholder="E.g. Academic, Economic..." required>
            </div>
            <div class="col-md-12">
                <label  class="form-label">Minimum Grade Range for this Type:</label>
                <input type="text" name="minimumGrade" class="form-control form-control-sm" placeholder="E.g. 1.75, 2.5..." required>
            </div>
            <div class="col-md-12">
                <label  class="form-label">Maximum Grade Range for this Type:</label>
                <input type="text" name="maximumGrade" class="form-control form-control-sm" placeholder="E.g. 1.75, 2.5..." required>
            </div>
            <div class="col-md-12">
                <label  class="form-label">Grant for this Type:</label>
                <input type="text" name="grant" class="form-control form-control-sm" placeholder="E.g. 1000, 2000..." required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitRemarks" name="submit">Add Scholar Type</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--Modal End-->

<!--Modal for editing GWA-->
<?php
foreach($scho_info as $i){
?>
<div class="modal fade" id="editModal<?php echo $i["id"];?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $i["id"];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel<?php echo $i["id"];?>">Edit Grades and Grants</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="../functions/editScholar-type.php">
          <div class="mb-3">
            <label for="minGrade" class="form-label">Minimum Grade:</label>
            <input type="text" class="form-control" name="minGrade" value="<?php echo $i['min_gwa']?>" required>
          </div>
          <div class="mb-3">
            <label for="maxGrade" class="form-label">Maximum Grade:</label>
            <input type="text" class="form-control" name="maxGrade" value="<?php echo $i['max_gwa']?>" required>
          </div>
          <div class="mb-3">
            <label for="grants" class="form-label">Grants:</label>
            <input type="text" class="form-control" name="grants" value="<?php echo $i['grants']?>" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="id" value="<?php echo $i['id']?>">
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php }?>
<!--Modal End-->
        
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