<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vehicle</title>
  <link rel="icon" href="images/Logo.png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "includes/navbar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="position:fixed; width:256px;">
        <hr class="style2">
           <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces/pic-1.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $Name = $_SESSION['Name']; ?>
                 </p>
                  <div>
                    <small class="designation text-muted"><?php echo $type = $_SESSION['type']; ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>             
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-view-dashboard"></i>
              <span class="menu-title" style="font-size:14px;">Dashboard</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-inbox"></i>
              <span class="menu-title" style="font-size:14px;">Appointment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="appointments.php" style="font-size:14px;">Request</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="overdue.php" style="font-size:14px;">Overdue</a>
                </li>
              </ul>
            </div>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="calendar.php">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title" style="font-size:14px;">Calendar</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="dailytaskform.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title" style="font-size:14px;">Daily Task Form</span>
            </a>
          </li>
            
<!--
          <li class="nav-item">
            <a class="nav-link" href="accountmanagement.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title" style="font-size:14px;">Account Management</span>
            </a>
          </li>
-->
            
          <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
              <i class="menu-icon mdi mdi-car-side"></i>
              <span class="menu-title" style="font-size:14px;">Vehicle</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="servicesmanagement.php">
              <i class="menu-icon mdi mdi-wrench"></i>
              <span class="menu-title" style="font-size:14px;">Services</span>
            </a>
          </li>
            
            
            
            
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin  stretch-card">
              <div class="card">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="vehicle.php" style="font-size:18px;">Vehicles</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="font-size:20px;">Vehicles</h4>
                  <p class="card-description">
                    List of all registered Vehicles
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="grid">
                          <th style="font-size:15px;">
                            Plate
                          </th>
                          <th style="font-size:15px;">
                            Make
                          </th>
                          <th style="font-size:15px;">
                            Series
                          </th>
                          <th style="font-size:15px;">
                            Color
                          </th>
                          <th style="font-size:15px;">
                            Status
                          </th>
                          <th style="font-size:15px;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                      <?php
                            $data = $connection->prepare("SELECT  vehicles.id as 'ID', concat(firstName, ' ', middleName, ' ',lastName ) as 'Name', vehicles.plateNumber,
                            vehicles.bodyType, vehicles.bodyType, vehicles.make, vehicles.series, vehicles.color, vehicles.status FROM `vehicles`
                             join personalinfo where personalinfo.personalId = vehicles.personalId");
                            if($data->execute()){
                                $values = $data->get_result();
                                
                                while($row = $values->fetch_assoc()) {
                                  $vehicleID = $row['ID'];
                                echo '
                                    <tr>
                                        <td>'.$row['plateNumber'].'</td>
                                        <td>'.$row['make'].'</td>
                                        <td>'.$row['series'].'</td>
                                        <td>'.$row['color'].'</td>
                                        <td>'.$row['status'].'</td>
                                        <td class="text-center">
                                          <a href="viewvehicle.php?plate='.$row['plateNumber'].'"><button class="btn btn-primary"><i class="menu-icon mdi mdi-eye-outline"></i> View</button></a>
                                          
                                          <a href="viewvehiclehistory.php?plate='.$row['plateNumber'].'"><button class="btn btn-darkblue"><i class="menu-icon mdi mdi-history"></i>
                                          History</button></a>
                                        
                                        </td>
                                    </tr>

                       
        
                                   
                                ';
                                }
                            }else{
                                echo "<tr>
                                        <td colspan='7'>No Available Data</td>
                                    </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/script.js"></script> 
</body>

</html>

<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

});
</script>