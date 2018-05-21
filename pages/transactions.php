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
  <title>Admin | Transactions</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  
  <link rel="stylesheet" href="../dist/css/main.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
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
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
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
                <?php
                if(isset($_SESSION['display_picture'])){
                    echo "<img class=\"img-circle elevation-2\" src=\"".$_SESSION['display_picture']."\" alt=\"User Image\">";
                } else {
                    if($_SESSION['gender'] == "male"){
                        echo "<img class=\"img-circle elevation-2\" src=\"../dist/img/male.png\" alt=\"User Image\">";
                    }else if($_SESSION['gender'] == "female"){
                        echo "<img class=\"img-circle elevation-2\" src=\"../dist/img/female.png\" alt=\"User Image\">";
                    }
                }
                ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></a>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="../index.php" class="nav-link">
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
            <a href="transactions.php" class="nav-link active">
              <i class="nav-icon fa fa-money"></i>
              <p>
                On Going Transactions
              </p>
            </a>
		</li>
        <li class="nav-item has-treeview">
            <a href="transactions-finished.php" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
               Finished Transactions
              </p>
            </a>
		</li>
		<li class="nav-item has-treeview">
            <a href="users.php" class="nav-link">
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
    <!-- /.sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transactions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            
                  <!--Rentals-on going -->
            <div class="card">
                              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-cash mr-1"></i>
                 ON GOING
                </h3>
              </div>

    <ion-content>
      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>House name</th>
			<th>Owner</th>
            <th>Customer Name</th>
            <th>Rental Start</th>
            <th>Current Charge</th>
            <th>Fee to Charge to Provider</th>
          </tr>
          <?php
					$result = $mysqli->query("SELECT rental.rental_startdate,(reservation.reservation_fee + rental.rental_fee) as 'current charge', rental.fee_to_provider, house.house_name, (SELECT CONCAT(given_name, ' ',last_name) FROM users WHERE user_id = house.user_id) as 'owner', (SELECT CONCAT(given_name, ' ',last_name) FROM users WHERE user_id = reservation.user_id) as 'customer' FROM reservation JOIN rental ON reservation.reservation_id = rental.reservation_id JOIN house ON reservation.house_id = house.house_id JOIN users ON reservation.user_id = users.user_id WHERE rental_status ='ongoing'") or die ($mysqli->error());
					while($row = mysqli_fetch_array($result)) {
						echo '<tr>
            <td>'.$row['house_name'].'</td>
            <td>'.$row['owner'].'</td>
            <td>'.$row['customer'].'</td>
            <td>'.$row['rental_startdate'].'</td>
            <td>'.$row['current charge'].'</td>
            <td>'.$row['fee_to_provider'].'</td>
          </tr>';
					}
					?>
        </table>
      </div>
        
    </ion-content>
      </div><!-- /.container-fluid -->          
    </div>
    <!-- /.content-header -->

   
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
      </div>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Override script -->
<script src="../dist/js/pages/main.js"></script>


<!-- jQuery -->
<script>$( "li" ).slice( 5 ).php(  );</script>
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
