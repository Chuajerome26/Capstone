<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>


<body>
  
  <div class="split left">
  
  </br>
</br>
</br>
</br>
</br>
    &nbsp;&nbsp;
      
<div class="center">
      <p style="font-size: 40px;"><b>Consuelo Chito Madrigal Foundation - QC</b></p>
      <p style="font-size: 17px;">Well-educated individuals, families,</p>
      <p style="font-size: 17px;">imbued with charity and truth, healed</p>
      <p style="font-size: 17px;;">from poverty to help build a better </p>
      <p style="font-size: 17px;">tomorrow, a better Philippines. </p>
      
    </br>
  </br>
      
    </div>  

    </div>

    <div class="split right">

        <div class="hero">
            <div class="form-box">
                
            
                <div class="logo">

                  <img src="images/ss.png" width="115" height="115" style="border-radius: 50%;">
                  
                </div>
              </br>
            </br>
              
    
                <form method="post" action="functions/admin-login.php" id="login" class="input-group">
                    <input type="text" name="email" class="input-field" placeholder="Email" required />
                    <input type="password" id="pass" name="pass" class="input-field" placeholder="Enter Password" required />
                    <a href="#" class="showPass" id="passVis"></a>
                    <input type="checkbox" class="check-box" /><span>Remember Password</span>
                    <input type="submit" class="submit-btn" name="submitBtn">
                </form>
    
                
            </div>
        </div>
    
    
        
        <script>
            
    
            
            document.getElementById('passVis').addEventListener('click', changeVisib);
    
        var visibility = true;
        var button = document.getElementById('passVis');
    
        function changeVisib(e) {
    
          if(visibility) {
            button.classList.add('notShowPass');
            visibility = false;
            document.getElementById('pass').type = 'text';
          } 
          
          else if(!visibility) {
            button.classList.remove('notShowPass');
            visibility = true;
            document.getElementById('pass').type = 'password';
          }
        }
        
// pagitan
        
        
        
    
        </script>
</body>
</html>