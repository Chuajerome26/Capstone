<!DOCTYPE html>
<?php
include("scholarnavbar.php")
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allowance History</title>
    <link rel="stylesheet" type="text/css" href="SweatEquityHistory.css">


    <div class="main">
    
<center>


   
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Allowance History</h2>

    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../images/pcard3.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title">Surname, Lastname M.I</h1>
      </div>
    </div>
  </div>
</div>


    
    <div class="dropdown">
        <button class="dropbtn">Status</button>
        <div class="dropdown-content">
            <a href="#">All</a>
            <a href="#">Attended</a>
            <a href="#">Missed</a>
            <a href="#">Late</a>
        </div>
    </div>

    <table>
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
       
    </table>

    </center>
    </main>
</body>
</html>