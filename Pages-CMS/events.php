<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CMS</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/stylecms.css" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">CMS</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboardcms.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="shorcuts.php">Shortcuts</a>
                    <div class="p-2 mx-3 mb-2 text-muted small">Default Contents.</div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="mission.php">Mission Content</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="vision.php">Vision Content</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="values.php">Values Content</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="overview.php">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="events.php">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="status.php">Status</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <!-- You can add title or buttons here if you need -->
                </div>

                <!-- Content Row -->
                <div class="row">
                <div class="col-xl-12">
                            <div class="card shadow mb-4" style="font-size: 14px;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-body">
                                <h6 class="p-2 font-weight-bold text-black mb-2">Tables3</h6>
                                    <div class="table-responsive">
                                    <table id="scholars" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date Applied</th>
                                            
                                            <th scope="col">Details</th>
                                            <th scope="col">Action</th>
                                    
                                            
                                        </tr>
                                    </thead>
                                    <!-- <tbody class="table-group-dividercar">
                                            <th scope="col"><?php echo $num; ?></th>
                                            <td style="white-space: nowrap;"><?php echo $s["f_name"]." ".$s["l_name"]; ?></td>
                                            <td style="white-space: nowrap;"><?php echo $s["email"];?></td>
                                            <td><?php echo $s["date_apply"];?></td>
                                            
                                            <td style="white-space: nowrap;">
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $s["scholar_id"];?>">Details</button>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#filesModal<?php echo $s["scholar_id"];?>">Files</button>
                                            </td>
                                            <td>
                                                <form method="post" action="../functions/revoke.php">
                                                    <input type="hidden" name="scholar_id" value="<?php echo $s['scholar_id']; ?>"> 
                                                    <button type="submit" name="revoke" class="btn btn-sm btn-danger">Revoke</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody> -->
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>


                        
                        

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
