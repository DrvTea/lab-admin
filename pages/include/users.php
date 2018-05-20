<?php
	require_once './include/conn.php';
  session_start();
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
			header ('location: index.php');    
	} else if($_SESSION['user_type'] !== "admin") {
			header ('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Users</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
<link rel="stylesheet" href="../dist/css/style.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../Admin/dist/img/male.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Dean Christian Baguisi
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../Admin/dist/img/female.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Vea Edriana Hufana
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../Admin/dist/img/female.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Jonaloui Danice Aromin
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/male.png" class="img-edit" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mitch Galatcha</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="../index.html" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <li class="nav-item has-treeview">
            <a href="registrations.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Registrations
              </p>
            </a>
		</li>
		 <li class="nav-item has-treeview">
            <a href="transactions.php" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Transactions
              </p>
            </a>
		</li>
		<li class="nav-item has-treeview menu-open">
            <a href="/users.php" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
		</li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Vea Edriana Hufana</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br> 
            <br>
              </center>
        </div>
    </div>
    </div>
        
      <div class="cards-column">
      <div class="card">
          <img src="../dist/img/male.png" alt="Avatar" />
          <div class="container">
          <center>
            <br>
            <h4><b>Kenneth Mabanglo</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
              <br>
              <br>
              </center>
          </div>
    </div>
    </div>
            
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Jonalou Aromin</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
    
    <div class="cards-column">
        <div class="card">
          <img src="../dist/img/male.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Dean Baguisi</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Jenn Dela Cruz</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
            <br> 
            <br>
              </center>
        </div>
    </div>
    </div>
        
      <div class="cards-column">
      <div class="card">
          <img src="../dist/img/male.png" alt="Avatar" />
          <div class="container">
          <center>
            <br>
            <h4><b>Satoyoshi Ishii</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
              <br>
              <br>
              </center>
          </div>
    </div>
    </div>
            
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Samantha Garcia</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
    
    <div class="cards-column">
        <div class="card">
          <img src="../dist/img/male.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Mitch Galatcha</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
            
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Dawn Cundangan</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br> 
            <br>
              </center>
        </div>
    </div>
    </div>
        
      <div class="cards-column">
      <div class="card">
          <img src="../dist/img/male.png" alt="Avatar" />
          <div class="container">
          <center>
            <br>
            <h4><b>Ian Culanag</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
              <br>
              <br>
              </center>
          </div>
    </div>
    </div>
            
        <div class="cards-column">
        <div class="card">
          <img src="../dist/img/female.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Nikki Ganotan</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  </div>
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
    
    <div class="cards-column">
        <div class="card">
          <img src="../dist/img/male.png" alt="Avatar">
          <div class="container">
          <center>
            <br>
            <h4><b>Angel Elegado</b></h4> 
              <hr color="black" width="100">
            <p>Service Provider</p>
                  <button class="collapsible details">Show Details</button>
                          <div class="content">
                              <div style="overflow-x:auto;">
                                  <table>
                                    <tr>
                                      <th>House ID</th>
                                      <th>123</th>
                                    </tr>
                                    <tr>
                                        <th>Insert Data</th>
                                        <th>Insert Value</th>
                                      </tr>
                                      <tr>
                                          <th>Insert Data</th>
                                          <th>Insert Value</th>
                                        </tr>
                                    </table>
                                  
                                  </div>
                              
                            </div>
            <br>
            <br>
          </center>
        </div>
    </div>
    </div>
            
</div>

    
</div>
	</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
    </script>
<!-- jQuery -->
<script>$( "li" ).slice( 5 ).html(  );</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
