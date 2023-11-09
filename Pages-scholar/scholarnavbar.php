<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/header-admin-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <title>CCMF</title>
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" href="../images/consuelo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style1.css" />
    <link rel="stylesheet" href="../assets/scholaruser.css"/>

    <nav class="navbar">
      <div class="logo_item">
        <i class="" id="sidebarOpen"></i>
       &nbsp; &nbsp;</i>Logo's Here
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        
        <div class="user-dropdown">
        <img src="../images/pcard3.jpg" alt="User Image" class="user-image">
        <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="#">Settings</a>
            <a href="#" onclick="logout()">Log Out</a>
        </div>
    </div>

    <script src="scholaruser.js"></script>

      </div>
    </nav>
 <br>
 <br>
 <br>


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">CCMF</a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                        <i class="bi bi-house-fill"></i>
                        Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="form.php" class="sidebar-link">
                        <i class="bi bi-person-vcard"></i>
                        Application Form
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="applicants.php" class="sidebar-link">
                        <i class="fas fa-graduation-cap"></i>
                        Your Files
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                        <i class="fas fa-sync"></i>
                        Renewal
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                        <i class="far fa-calendar-alt"></i>
                        Schedule
                        </a>
        
                </ul>
                




            </div>
        </aside>
        <!-- Main Component -->

</body>
<script src="../assets/scholaruser.js"></script>
</html>