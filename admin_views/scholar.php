<!-- MAIN -->
<?php 
include("header.php");

// start session
session_start();


if (isset($_SESSION['id'])) {
    require '../classes/admin.php';
    require '../classes/database.php';

    $database = new Database();
    $admin = new Admin($database);

       //get admin data 

    
} else {
    header("Location: ../index.php");
}


?>
<style>
container-fluid{
        overflow: hidden;
    }
    #inCard {
        background-color: #f2f2f2;
    };

    .small-text {
  font-size: 10px;
}

.email-wrapper {
  display: inline-flex; /* display the icon and email address inline */

}
.card:hover{

  cursor: pointer;
}

.dropdown-menu li {
position: relative;
}
.dropdown-menu .dropdown-submenu {
display: none;
position: absolute;
left: 100%;
top: -7px;
}
.dropdown-menu .dropdown-submenu-left {
right: 100%;
left: auto;
}
.dropdown-menu > li:hover > .dropdown-submenu {
display: block;
}

   
</style>
<div class="main"> 
    <!-----Employee List----->
    <div class="container mt-3">
        
    <div class="row d-flex">
    <div class="col-sm-3 pt-2">
        <h2 style="font-weight: bolder;">Scholar List</h2>     
    </div>
    <div class="col-sm-9">
        <div class="row">
            <!-- Search Input -->
            <div class="col-sm">
                <div class="input-group">
                    <span class="input-group-text bg-white border-0">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" class="form-control border-0" id="search" placeholder="Search..." autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</div>

    <!-----End----->
    <div class="container mt-3">  
    <div class="container-fluid ms-3 p-3 mt-3 employeeList-container align-content-center m-auto d-block ">
    <div class="row employee-list-wrapper">

      <?php 
        $scholarData = $admin->getScholars();
  
        foreach($scholarData as $sdata){                 
      ?>
    <div class="card bg-white rounded ms-2 my-2 pt-3 employee-container" style="width: 18rem;" data-bs-toggle="modal"
                         id="view" data-bs-target="#viewmodal" data-employee-id="<?php echo $sdata["id"]?>">
                        <img class="rounded-circle mx-auto" src="../Uploads_pic/<?php echo $sdata["id_pic"]?>" style="object-fit: cover;border-radius: 50%;height: 140px; width: 140px;" alt="Employee Pic">    
                        <div class="card-body ps-1">
                            <h6 class="card-title text-center col-11 m-auto" name="EmployeeName"><?php echo "".$sdata["f_name"]." ".$sdata["l_name"].""?></h6>
                            <p class="card-text text-center" style="opacity: 0.7;">HR MANAGER</p>
                            
                            <div id="inCard"  style=" background-color: #f2f2f2;"; class="col-12 rounded m-auto align-content-center ms-2 ">
                            <table class="table table-borderless p-0 m-0 pb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="font-size: 14px;">Department:</th>
                                        <th style="font-size: 14px;">Date Hired: </th>
                                       
                                    </tr>
                                    

                                </thead> 
                               
                                <tbody>
                                <tr >
                                        <td class="ps-4" name="Department" style="font-size: 13.5px;">Sample</td>
                                        <td class="ps-3" name="DateHired" style="font-size: 13.5px;">October 10, 2023</td>
                                    </tr>   
                                </tbody>

                               
                            </table>
                            
                                <div class="col-12 mt-2">

                                <div class="d-flex ms-3">
                                <i class="fa-solid fa-star text-warning pe-2"></i> <p class="text d-flex flex-column col-10"  style="font-size: 13px;" name="Email">Sample</p>
                                </div>

                                <div class="d-flex ms-3">
                                <i class="fa-solid fa-envelope text-primary text pe-2"></i> <p class="text d-flex flex-column col-10"  style="font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" name="Email">Sample</p>
                                </div>

                            <div class="d-flex ms-3">
                            <i class="fa-solid fa-phone text-success pe-2"></i> <p class="text d-flex flex-column col-10"  style="font-size: 13px;" name="Email">09380533018</p>
                            </div>
                        
                             </div>
                           
                        </div>
                        </div>
                    </div>
          <?php 
              } 
          ?>          
        </div>
    </div>
    <!-----End----->
</div>
<?php
include("footer.php");
?>