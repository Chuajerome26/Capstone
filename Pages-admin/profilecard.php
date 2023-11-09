<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="../images/consuelo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style1.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Scholar | By Name</title>
    <link rel="stylesheet" href="../assets/pcard.css" />
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  

    <body>
 <!-- navbar -->
 <nav class="navbar">
      <div class="logo_item">
        <i class="" id="sidebarOpen"></i>
       &nbsp; &nbsp;</i>Logo's Here
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        
        <img src="..//images/pcard1.jpg" alt="" class="profile" />
        
      </div>
    </nav>

    <br>

<!--DropDown and Searchfield-->
<br>
<div align="right" class="wrapper">
  <div class="searchBox">
    <div class="dropdown">
      <div class="defaultOption">By Name</div>
      <i class="bi bi-menu-button-wide"></i>
      <ul class="ul">
        <li onclick="selectOption(this)">By Name</li>
        <li onclick="selectOption(this)">Student</li>
        <li onclick="selectOption(this)">Alumni</li>
      </ul>
    </div>
    <div class="searchField">
      <input type="text" class="input" placeholder="Search">
      <i class="fa fa-search"></i>
    </div>
  </div>
</div>

<br>
<br>
<br>

  <!--Cards-->


  <div class="row">
  <!--1st Column-->
  <div class="column">
  <div class="card" style="width: 15em;">
                <img src="../images/pcard1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Alindog, Cong</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">QCU-20-2132</p>
                  <a href="#" class="btn btn-primary">More Details</a>                  
                </div>
              </div>

              <br>
            
  <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>

              <br>

  <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>

</div>
           
  
  
<!--Second Column-->
  <div class="column">
  <div class="card" style="width: 15em;">
                <img src="../images/pcard2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Anderson, John</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">QCU-21-2122</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
              <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg"class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
              <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
  </div>

  <!--Third Column-->
  <div class="column">
  <div class="card" style="width: 15em;">
                <img src="../images/pcard3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Akita, Jenny</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">QCU-20-2176</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
              <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
              <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
  </div>

    <!--Fourth Column-->

  <div class="column">
  <div class="card" style="width: 15em;">
                <img src="../images/pcard4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Asaka, Hanny</h2>
                  <h2 class="card-title">Student</h2>
                  <p class="card-text">QCU-20-2132</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
              <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>
              <br>
               <div class="card" style="width: 15em;">
                <img src="../images/UserIconSample.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">Surname, Firstname</h2>
                  <h2 class="card-title">Alumni</h2>
                  <p class="card-text">School-xx-xxx</p>
                  <a href="#" class="btn btn-primary">More Details</a>
                </div>
              </div>

  </div>

  

              <script>
                var defaultOption = document.querySelector('.defaultOption');
                var ul = document.querySelector('.ul');

                defaultOption.onclick = function(){
                  ul.classList.toggle("active");
                }
                function selectOption(listItem){
                    var value = listItem.innerHTML;
                    defaultOption.innerHTML = value;
                    ul.classList.toggle("active");

                }
               </script>
  </div>

  

      <!-- sidebar -->
      <nav class="sidebar">
        <div class="menu_content">
          <ul class="menu_items">
          </br>
            <div class="menu_title menu_dahsboard"></div>
            <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
            <!-- start -->
            
          
            <li class="item">
              <div href="#" class="nav_link submenu_item">
                
                <span class="navlink_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                  </svg>
                  <i class="bi bi-person-badge-fill"></i>
                </span>
                
                <span class="navlink">Applicant Info</span>
                <i class="bx bx-chevron-right arrow-left"></i>
              </div>
  
              <ul class="menu_items submenu">
                <a href="profilecard.php" class="nav_link sublink">Scholar's Profile</a>
              </ul>
            </li>
            <!-- end -->
  
            <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
            <!-- start -->
            <li class="item">
              <div href="#" class="nav_link submenu_item">
                <span class="navlink_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                  </svg>
                  <i class="bi bi-list-task"></i>
                </span>
                <span class="navlink">Appointment</span>
                <i class="bx bx-chevron-right arrow-left"></i>
              </div>
  
              <ul class="menu_items submenu">
                <a href="#" class="nav_link sublink">Schedule Task</a>
                <a href="#" class="nav_link sublink">Plan Details and Info</a>
                <a href="#" class="nav_link sublink">Records</a>
              </ul>
            </li>
            <!-- end -->
          </ul>
          
          <ul class="menu_items">
            <div class="menu_title menu_editor"></div>
            <!-- duplicate these li tag if you want to add or remove navlink only -->
            <!-- Start -->
  
            <li class="item">
              <a href="#" class="nav_link">
                <span class="navlink_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z"/>
                  </svg>
                  <i class="bi bi-clipboard2-data-fill"></i>
                </span>
                <span class="navlink">Applicant Reviews</span>
              </a>
            </li>
            <!-- End -->
  
            <li class="item">
              <a href="#" class="nav_link">
                <span class="navlink_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                  </svg>
                  <i class="bi bi-calendar2-check-fill"></i>
                </span>
                <span class="navlink">Events and Programs</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="nav_link">
                <span class="navlink_icon">
                  <i class="bx bx-cloud-upload"></i>
                </span>
                <span class="navlink">Upload new</span>
              </a>
            </li>
          </ul>
          <ul class="menu_items">
            <div class="menu_title menu_setting"></div>
            <li class="item">
              <a href="#" class="nav_link">
                <span class="navlink_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                  </svg>
                  <i class="bi bi-question-circle"></i>
                </span>
                <span class="navlink" style="color:black;">FAQs</span>
              </a>
            </li>
  
          <!-- Sidebar Open / Close -->
          <div class="bottom_content">
          
          </div>
          
            </div>
          </div>
        </div>
      </nav>
      <!-- JavaScript -->
      <script>
  


  const body = document.querySelector("body");
  const darkLight = document.querySelector("#darkLight");
  const sidebar = document.querySelector(".sidebar");
  const submenuItems = document.querySelectorAll(".submenu_item");
  const sidebarOpen = document.querySelector("#sidebarOpen");
  const sidebarClose = document.querySelector(".collapse_sidebar");
  const sidebarExpand = document.querySelector(".expand_sidebar");
  sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));
  
  
  darkLight.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
      document.setI
      darkLight.classList.replace("bx-sun", "bx-moon");
    } else {
      darkLight.classList.replace("bx-moon", "bx-sun");
    }
  });
  
  submenuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
      item.classList.toggle("show_submenu");
      submenuItems.forEach((item2, index2) => {
        if (index !== index2) {
          item2.classList.remove("show_submenu");
        }
      });
    });
  });
  
  if (window.innerWidth < 768) {
    sidebar.classList.add("close");
  } else {
    sidebar.classList.remove("close");
  }
  
  
      </script>
  
  </body>
</html>