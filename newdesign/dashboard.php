
<?php 
// start session
session_start();

if (isset($_SESSION['id']) && ($_SESSION['user_type'] === 3 || $_SESSION['user_type'] === 2)) {
    require '../classes/admin.php';
    require '../classes/database.php';
    require '../classes/scholar.php';

    $database = new Database();
    $admin = new Admin($database);
    $scholar = new Scholar($database);

    $id = $_SESSION['id'];

    $admin_info = $admin->adminInfo($id);

    $pic = $admin->getApplicants2x2($id);

    $today = $admin->getInterviewCountForToday();

    $renewal = $scholar->getRenewalNewInfo();
    $countRenew = count($renewal);

    $scholar = $admin->getScholars();
    $scholar1 = count($scholar);

    $applicants = $admin->getApplicantsCount();
    // $funds = $admin->getTotalFunds();
    $content = $admin->getContent();


} else {
    header("Location: ../index.php");
}
?>
  <!doctype html>
  <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/<?php echo $content[0]['logo']; ?>" />
        <title><?php echo $content[0]['title_name']; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-xrbcVZjH2az0FbiCx9A1Gvpy2m1xL/zoVqOz8O3R5gBQVlBwm8AR2wteZbc56l3P5fQQ8HIjTCSxmbWEKeF86A=="
            crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    </head>
    <body>
      
          <header>
            <?php include '../header/sidebar.php'; ?>
          </header>

            <main  style="margin-top: 68px;">
                <div class="container-fluid p-3">

                <div class="card bg-transparent border-0">

                        <!-- Begin Page Content -->
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <p class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa-solid fa-chart-line me-3"></i>Dashboard</p>

                        
                        <div class="p-2">
                            <form action="../admin/generate.php" method="post">
                                <button type="submit" class=" btn  btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    <div class="d-none d-sm-inline-block">Generate Report</div>
                                </button>
                            </form>
                        </div>
                </div>

                <!-- Content Row -->
                <div class="row g-2">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-0 border-4  border-start border-primary shadow h-100 py-2 bg-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-white text-uppercase mb-1">
                                                Current Scholars</div>
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $scholar1; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mortarboard text-white" viewBox="0 0 16 16">
                                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-0 border-4  border-start border-success border-left-success shadow h-100 py-2 bg-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-white text-uppercase mb-1">
                                                Scheduled Interview Today</div>
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $today; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-wallet2 text-white" viewBox="0 0 16 16">
                                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                    </svg>
                                            
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-0 border-4  border-start border-info shadow h-100 py-2 bg-info">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-small font-weight-bold text-white text-uppercase mb-1" >
                                                Renewal
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h6 mb-0 mr-3 font-weight-bold text-white"><?php echo $countRenew; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto align-items-center mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-arrow-repeat text-white" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-0 border-4  border-start border-warning shadow h-100 py-2 bg-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-white text-uppercase mb-1">
                                                Pending Applicants</div>
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $applicants; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mortarboard-fill text-white" viewBox="0 0 16 16">
                                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Content Row -->

                <div class="row g-2 mt-2">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-2" style="height: 300px;">
                            <!-- Card Header - Dropdown -->
                            
                            <!-- Card Body -->
                            <div class="card-body">
                            <h6 class="p-2 font-weight-bold text-black mb-2">Applicants</h6>
                                <div class="chart-area">
                                    <canvas id="myAreaChart" height="220"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Home Visit -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-2">
                            <!-- Card Header - Dropdown -->
                            
                            <!-- Card Body -->
                            <div class="card-body">
                            <h6 class="p-2 font-weight-bold text-black mb-2">Recommended Home Visit</h6>
                                <div class="table-responsive" style="height: 225px; max-height: 225px; overflow-y:auto">
                                <?php
                                $homeVisit = $admin->getNoneCompliantInfo();
                                foreach ($homeVisit as $visit) {
                                    $info = $admin->getScholarById($visit['scholarID']);
                                    $pic = $admin->getApplicants2x2($id);
                                ?>

                                    <div class="card" style="font-size: 14px;">
                                        <div class="card-body p-0 p-0">
                                            <div class="hstack gap-3">
                                            <div class="p-2"> <img src="../Scholar_files/<?php echo $pic[0]['file_name']; ?>" alt="Photo" width="50" height="50"></div>
                                            <div class="p-2 align-items-center"> <?php echo $info[0]['f_name'];?> <?php echo $info[0]['l_name'];?></div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                        
                </div>
                <!-- End of Main Content -->




                </div>
                   
             </div> 
          </main>



        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>
        <script src="../assets1/js/1.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script>
        fetch('../functions/get_chart_data.php')
    .then(response => response.json())
    .then(monthData => {
        const labels = Object.keys(monthData).map(month => month.slice(0, 3)); // Convert full month names to three-letter abbreviations
        const amounts = Object.values(monthData);

        myLineChart.data.labels = labels;
        myLineChart.data.datasets[0].data = amounts;
        myLineChart.data.datasets[0].label = "Total Applicants";
        
        // Update y-axis ticks to remove the dollar sign
        myLineChart.options.scales.yAxes[0].ticks.callback = function(value, index, values) {
            return value.toString().replace(/\$/g, ''); 
        };
        
        // Update tooltips callback to remove the dollar sign
        myLineChart.options.tooltips.callbacks.label = function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        };

        myLineChart.update();
    })
    .catch(error => console.error('Error:', error));



    </script>
    
  

    
    

    
    
    </body>
  </html>