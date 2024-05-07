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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Include stylesheet for Quill editor -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="values.php">Values Content</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="overview.php">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="events.php">Events</a>
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
                <!-- Page content-->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h6 class="p-2 font-weight-bold text-black mb-2">Values Content Management</h6>
                                    <form id="missionForm">
                                    <div class="form-group">
                                    <!-- Create a container for the Quill editor -->
                                    <div id="editor" class="form-control" style="height: 200px;"></div>
                                    </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="saveMissionContent()">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                
                 <!-- Including Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function saveMissionContent() {
            const missionContent = document.getElementById('missionText').value;
            localStorage.setItem('mission', missionContent);
            alert('Mission content saved successfully!');
        }
    </script>  
    <script>
    var quill = new Quill('#editor', {
        theme: 'snow'  // Specifies which theme to use
    });
    </script>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
