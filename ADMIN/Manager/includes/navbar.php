<!-- Navigation jquery-->
<head>
    <script>
       $(function () {
  $(document).scroll(function () {
    var $nav = $("#navhead");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
    </script>
<script src="js/jquery2.js"></script> 
</head>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row" id="navhead">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"  style="color: #b80011; margin-top: 5px; margin-left: 3px;">
            <strong>EAS CUSTOMS</strong>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html" style=" width:100%; background-color:white; ">
          <img src="images/Logo.png" class="logoo" alt="" style="width:100%;height:100%;"/>
        </a>
      </div>
        <div class="navbar-menu-wrapper d-flex align-items-center custom" style="color:white";>
         
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
            <li class="nav-item">
            </li>
        </ul>
            
        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" data-toggle="dropdown">
                <span class="count">0</span>
                <i class="mdi mdi-bell" style="color:white;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" id="dropdownnotif">     
           </ul>
            </li> 

        

            <li class="nav-item dropdown d-none d-xl-inline-block" style="color:white;">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text" style="font-size:14px; color:white;">Hello <?php echo $Name = $_SESSION['Name']; ?>
                 (<?php echo $type = $_SESSION['type']; ?>)
                </span>
              
            </a>
                
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item mt-2" data-toggle="modal" data-target="#exampleModal"><i class="menu-icon mdi mdi-logout-variant"></i>Logout
                </a>
            </div>
            </li>
            
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
        </div>
    </nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #000099; color: white; border: 3px solid #000099;">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <a class="btn btn-darkblue" href="process/logout.php"><i class="menu-icon mdi mdi-logout-variant"></i>Logout</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="menu-icon mdi mdi-cancel"></i>Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- For Notification -->
<script src="js/notif.js"></script>  