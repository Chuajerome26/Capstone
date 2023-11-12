<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../assets/topnav.css" />

    <!-- ===== Boxicons CSS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Responsive Navigation Menu Bar</title>
  </head>
  <body>
    <nav>
      <div class="nav-bar">
        <span class="logo navLogo" style="padding-right: 250px"
          ><a href="scholardash2Options.php" style="color:black;">CCMF</a></span
        >

        <div class="darkLight-searchBox">
          <div class="dark-light">
            <i class="bx bx-moon moon" style="color:black"></i>
            <i class="bx bx-sun sun" style="color:black"></i>
          </div>
          <div class="searchBox">
            <div class="searchToggle">
              <i class="bx bx-x cancel" style="color:black;"></i>
              <i class="bx bx-search search" style="color:black;"></i>
            </div>
            <div class="search-field">
              <input type="text" placeholder="Search..." />
              <i class="bx bx-search" ></i>
            </div>
          </div>
          <div class="flex-container">
            <div class="profile">
              <button type="button" class="butt" onclick="myFunction()">
                <img src="../images/pcard1.jpg" onclick="toggleDropdown()" />
              </button>
              <div class="d-c" id="dropdownContent">
                <a href="#">Option 1</a></br>  </br>
                <a href="#">Option 1</a>  </br>  </br>
                <a href="#">Log Out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <script>
      const body = document.querySelector("body"),
        nav = document.querySelector("nav"),
        modeToggle = document.querySelector(".dark-light"),
        searchToggle = document.querySelector(".searchToggle"),
        siderbarClose = document.querySelector(".siderbarClose");
      let getMode = localStorage.getItem("mode");
      if (getMode && getMode === "dark-mode") {
        body.classList.add("dark");
      }
      // js code to toggle dark and light mode
      modeToggle.addEventListener("click", () => {
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if (!body.classList.contains("dark")) {
          localStorage.setItem("mode", "light-mode");
        } else {
          localStorage.setItem("mode", "dark-mode");
        }
      });
      // js code to toggle search box
      searchToggle.addEventListener("click", () => {
        searchToggle.classList.toggle("active");
      });

      function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");

        // Toggle the visibility of the dropdown content
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      }
    </script>
  </body>
</html>
