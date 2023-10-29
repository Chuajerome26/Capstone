<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="../images/consuelo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style1.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Scholar | By Name</title>
    <link rel="stylesheet" href="../assets/pcard.css" />
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="../assets/drop.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    
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
        
        <img src="../images/pcard1.jpg" alt="" class="profile" />
        
      </div>
    </nav>
<br>

    <body>

<!--DropDown and Searchfield-->
<br>
<div align="right" class="wrapper">
  <div class="searchBox">
    <div class="dropdown">
      <div class="defaultOption">By Name</div>
      <ul class="ul">
        <li onclick="selectOption(this)" >By Name</li>
        <li onclick="selectOption(this)" link href="header.php">Student</li>
        <li onclick="selectOption(this)" >Alumni</li>
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

  <div class="head">
    <div class="text">
      <h1>Scholars By Name</h1>
    </div>
  </div>

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
  </body>
</html>