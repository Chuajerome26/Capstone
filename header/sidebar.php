<style>   
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

body {

    background-image: url(../../images/Background.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #f2f2f2;
}
@media (min-width: 991.98px) {
main {
padding-left: 240px;
}
}

/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 260px;
z-index: 600;
overflow-y:auto;
}
/* Add hover effect to sidebar navigation items */
.sidebar .list-group-item:hover {
    background-color: lightgray; /* Change the background color on hover */
    color: black; /* Change the text color on hover */
    border-color: #dee2e6; /* Change the border color on hover */
}




@media (max-width: 991.98px) {
.sidebar {
width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
background-color: rgb(14,220,141);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100h - 48px);
padding-top: 0.5rem;
overflow-x: auto;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
    </style>


    <!-- Main Navigation -->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white shadow mt-3">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-2 mt-2">
                    <a href="../newdesign/dashboard.php" class="list-group-item list-group-item-action py-2 border-0 ripple  <?php echo ($current_nav == 'dashboard') ? 'active' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                        </svg> 
                        <span class="ms-2">Dashboard</span>
                    </a>

                    <hr class="sidebar-divider d-none d-md-block ">


                    <a href="../newdesign/admin-scholar.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'announcement') ? 'active-nav-item' : ''; ?>" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                        </svg>
                        <span class="ms-2">Scholar Tabs</span>
                    </a>

                    <a href="../newdesign/admin-application.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'requestpending') ? 'active-nav-item' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                        </svg>
                        <span class="ms-1">Scholarship Applicants</span>
                    </a>

                    <hr class="sidebar-divider d-none d-md-block">
                    
                    <a href="../newdesign/Stipend.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'productapproval') ? 'active-nav-item' : ''; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                     <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                    </svg>
                        <span class="ms-2">Stipend</span>
                    </a>

                    <a href="../newdesign/renewal.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'productapproval') ? 'active-nav-item' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                        </svg>
                        <span class="ms-2">Renewal</span>
                    </a>

                    <a href="../newdesign/doneRenewal.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'productapproval') ? 'active-nav-item' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"  fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                        </svg>
                        <span class="ms-2">Done Renewal</span>
                    </a>

                    <a href="../newdesign/schedule-task.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'eventcalendar') ? 'active-nav-item' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27"  fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                        </svg>
                        <span class="ms-2">Schedule Interview</span>
                    </a>

                    <a href="../newdesign/admin-announcement.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'userlist') ? 'active-nav-item' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27"  fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02
                        2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06"/>
                        </svg>
                        <span class="ms-2">Announcement</span>                   
                    </a>

                    <?php if($_SESSION['user_type'] === 3): ?>
                    <a href="../newdesign/admin-account.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'history') ? 'active-nav-item' : ''; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27"  fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                    </svg>
                        <span class ="ms-2">Admin Accounts</span>                  
                    </a>
                    <hr class="sidebar-divider d-none d-md-block">

                    <a href="../newdesign/admin-viewlogs.php" class="list-group-item list-group-item-action py-2 mb-2 border-0  ripple  <?php echo ($current_nav == 'logs') ? 'active-nav-item' : ''; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27"  fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                        <span class ="ms-2">Admin Logs</span>                  
                    </a>


                    <?php endif;?>

                  
                


                    <li class="nav-item dropdown text-decoration-none list-unstyled pt-3  d-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="me-2 rounded-circle shadow-sm" src="../Scholar_files/<?php echo $admin_info[0]['pic']; ?>" alt="Id" width="30" height="30">   
                    </a>
                    <ul class="dropdown-menu w-100">
                        <li class="text-center w-100 col-10"> <?php echo $admin_info[0]['l_name'].', '.$admin_info[0]['f_name']; ?><br> <small class="text-muted"></small></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="mb-1"><a class="dropdown-item" href="../newdesign/admin-myprofile.php" ><i class="fa-solid fa-user me-3"></i>My Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <form action="../newdesign/admin-logout.php" method="POST">
                            <li><button class="dropdown-item" type="submit"><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</button></li>
                        </form>
                    </ul>
                    </li>


               

                    
                    <!-- Add more sidebar items as needed -->
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light px-3 fixed-top" style="background-color: rgb(14,220,141);">
            <div class="container-fluid">
            
                <!-- Toggle button -->
                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center text-decoration-none text-black" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">    
                </div>
                <div class="sidebar-brand-text mx-3 ms-5" style="font-size: 28px; font-weight:bold;"> <img src="../images/Management.png"  style="width: 270px; height: 55px; margin-left: -50px;"></div>
                </a>
                <hr class="sidebar-divider d-none d-md-block">


                <ul class="navbar-nav ms-auto d-flex flex-row   d-none d-lg-block me-5">
                
               

                 

                    <li class="dropdown me-4 mt-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="me-2 rounded-circle shadow-sm" src="../Scholar_files/<?php echo $admin_info[0]['pic']; ?>" alt="Id" width="30" height="30"> 
                            <span><?php echo $admin_info[0]['l_name']; ?></span>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  w-100">
                            <li class="text-center w-100 col-10"> <?php echo $admin_info[0]['l_name'].', '.$admin_info[0]['f_name']; ?><br> <small class="text-muted"></small></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="mb-1"><a class="dropdown-item" href="../newdesign/admin-myprofile.php" ><i class="fa-solid fa-user me-3"></i>My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="../newdesign/admin-logout.php" method="POST">
                                <li><button class="dropdown-item" type="submit"><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</button></li>
                            </form>
                        </ul>
                    </li>


                    </ul>


                



            </div>
        </nav>
        <!-- Navbar -->
    </header>

 <script>

document.addEventListener('DOMContentLoaded', function () {
    var navItems = document.querySelectorAll('.sidebar .list-group-item');

    navItems.forEach(function (item) {
        // Get the URL of the current page
        var currentPageUrl = window.location.href;

        // Get the URL of the navigation item
        var navItemUrl = item.href;

        // Check if the current page URL matches the navigation item URL
        if (currentPageUrl === navItemUrl) {
            item.classList.add('active');
        }
    });

    // If no navigation item is active, set the "Dashboard" link as active by default
    var activeNavItem = document.querySelector('.sidebar .list-group-item.active');
    if (!activeNavItem) {
        var defaultNavItem = document.querySelector('.sidebar .list-group-item[href="../../Pages/admin/dashboard.php"]');
        if (defaultNavItem) {
            defaultNavItem.classList.add('active');
        }
    }
});
    </script>