<?php
require_once './include/conn.php';
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
    header ('location: ../index.php');
} else if($_SESSION['user_type'] !== "admin") {
    header ('location: ../index.php');
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


    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
        <form class="form-inline ml-3" action="users.php" method="get">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
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
                <?php
                $result = $mysqli->query('SELECT user_id, gender, CONCAT(given_name, " ", last_name) as "name" FROM users where username="'.$_SESSION['username'].'"');
                $row = mysqli_fetch_array($result);
                echo '<div class="image">
									<img src="../dist/img/'.$row['gender'].'.png" class="img-edit" alt="User Image">
								</div>
								<div class="info">
									<a href="#" class="d-block">'.$row['name'].'</a>
								</div>';
                ?>
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
                <div class="container">
                    <?php if (isset($_GET['activate'])){
                        if($_GET['activate'] == 'false'){
                            echo "<div class=\"alert alert-danger\"><i class=\"fas fa-exclamation-circle\"></i> &nbsp; Account Activation Failed</div>";
                        } else if($_GET['activate'] == 'true'){
                            echo "<div class=\"alert alert-success\"><i class=\"fas fa-exclamation-circle\"></i> &nbsp; Account Activated</div>";
                        }
                    }else if (isset($_GET['deactivate'])){
                        if($_GET['deactivate'] == 'false'){
                            echo "<div class=\"alert alert-danger\"><i class=\"fas fa-exclamation-circle\"></i> &nbsp; Account Deactivation Failed</div>";
                        } else if($_GET['deactivate'] == 'true'){
                            echo "<div class=\"alert alert-success\"><i class=\"fas fa-exclamation-circle\"></i> &nbsp; Account Deactivated</div>";
                        }
                    }

                    ?>
                </div>
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#customers">Customers</a></li>
                    <li><a data-toggle="pill" href="#providers">Service Providers</a></li>
                    <li><a data-toggle="pill" href="#admins">Admins</a></li>
                </ul>
                <div class="tab-content">
                    <div id="customers" class="tab-pane fade in active" style="background-color: #f4f6f9 !important;">
                        <h3>Customers</h3>
                        <?php
                        if(!empty($_GET['search'])) {
                            $string = $mysqli->escape_string($_GET['search']);
                            $search = "'%" . $string . "%'";
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='user' 
                                                            AND (username LIKE $search 
                                                                  OR gender LIKE $search
                                                                  OR contact_no LIKE $search
                                                                  OR given_name LIKE $search
                                                                  OR last_name LIKE $search
                                                                  OR birthdate LIKE $search
                                                                  OR email_address LIKE $search
                                                                  OR account_status LIKE $search)
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        } else {
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='user' 
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        }

                        if ($result->num_rows > 0) { ?>
                            <div class="cards-row">

                                <?php // output data of each row
                                while($row = $result->fetch_assoc()) { ?>
                                    <div class="cards-column">
                                        <div class="card">
                                            <?php
                                            //check if profile picture exists
                                            if(!($row['display_picture'] == null)){
                                                echo "<img src=\"".$row['display_picture']."\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                            } else {
                                                if($row['gender'] == "male"){
                                                    echo "<img src=\"../dist/img/male.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }else if($row['gender'] == "female"){
                                                    echo "<img src=\"../dist/img/female.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }
                                            }
                                            ?>
                                            <div class="container" style="text-align: -webkit-center !important; display: block !important;width:100%">
                                                <br>
                                                <h4><b><?php echo $row['given_name']." ".$row['last_name'];?></b></h4>
                                                <hr color="black" width="100">
                                                <?php
                                                if($row['account_status']=='deactivated'){
                                                    echo "<button class=\"collapsible btn btn-block btn-danger btn-lg\" style=\"margin-bottom: 10px;\" >User Details</button>";
                                                }else{
                                                    echo "<button class=\"collapsible btn btn-block btn-primary btn-lg\" style=\"margin-bottom: 10px;\">User Details</button>";
                                                }
                                                ?>
                                                <div class="content">
                                                    <div style="overflow-x:auto;">
                                                        <table>
                                                            <tr>
                                                                <th>User ID</th>
                                                                <th><?php echo $row['user_id'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th><?php echo $row['username'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Gender</th>
                                                                <th><?php echo $row['gender'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Birthdate</th>
                                                                <th><?php echo $row['birthdate'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <th><?php echo $row['contact_no'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Email Address</th>
                                                                <th><?php echo $row['email_address'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Status</th>
                                                                <th><?php echo $row['account_status'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Balance</th>
                                                                <th><?php echo $row['account_balance'];?></th>
                                                            </tr>
                                                        </table>
                                                        <div class="btn-group-xs">
                                                            <a href="./edit.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-primary">Edit</a>
                                                            <?php //check if account is deactivated
                                                            if($row['account_status']=='deactivated'){
                                                                echo "<a href=\"./activate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Activate</a>";
                                                            } else {
                                                                echo "<a href=\"./deactivate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Deactivate</a>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </div>
                    <div id="providers" class="tab-pane fade" style="background-color: #f4f6f9 !important;">
                        <h3>Service Providers</h3>
                        <?php
                        if(!empty($_GET['search'])) {
                            $string = $mysqli->escape_string($_GET['search']);
                            $search = "'%" . $string . "%'";
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='provider' 
                                                            AND (username LIKE $search 
                                                                  OR gender LIKE $search
                                                                  OR contact_no LIKE $search
                                                                  OR given_name LIKE $search
                                                                  OR last_name LIKE $search
                                                                  OR birthdate LIKE $search
                                                                  OR email_address LIKE $search
                                                                  OR account_status LIKE $search)
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        } else {
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='provider' 
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        }
                        if ($result->num_rows > 0) { ?>
                            <div class="cards-row">

                                <?php // output data of each row
                                while($row = $result->fetch_assoc()) { ?>
                                    <div class="cards-column">
                                        <div class="card">
                                            <?php
                                            //check if profile picture exists
                                            if(!($row['display_picture'] == null)){
                                                echo "<img src=\"".$row['display_picture']."\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                            } else {
                                                if($row['gender'] == "male"){
                                                    echo "<img src=\"../dist/img/male.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }else if($row['gender'] == "female"){
                                                    echo "<img src=\"../dist/img/female.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }
                                            }
                                            ?>
                                            <div class="container" style="text-align: -webkit-center !important; display: block !important;width:100%">
                                                <br>
                                                <h4><b><?php echo $row['given_name']." ".$row['last_name'];?></b></h4>
                                                <hr color="black" width="100">
                                                <?php
                                                if($row['account_status']=='deactivated'){
                                                    echo "<button class=\"collapsible btn btn-block btn-danger btn-lg\" style=\"margin-bottom: 10px;\" >User Details</button>";
                                                }else{
                                                    echo "<button class=\"collapsible btn btn-block btn-primary btn-lg\" style=\"margin-bottom: 10px;\">User Details</button>";
                                                }
                                                ?>
                                                <div class="content">
                                                    <div style="overflow-x:auto;">
                                                        <table>
                                                            <tr>
                                                                <th>User ID</th>
                                                                <th><?php echo $row['user_id'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th><?php echo $row['username'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Gender</th>
                                                                <th><?php echo $row['gender'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Birthdate</th>
                                                                <th><?php echo $row['birthdate'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <th><?php echo $row['contact_no'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Email Address</th>
                                                                <th><?php echo $row['email_address'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Status</th>
                                                                <th><?php echo $row['account_status'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Balance</th>
                                                                <th><?php echo $row['account_balance'];?></th>
                                                            </tr>
                                                        </table>
                                                        <div class="btn-group-xs">
                                                            <a href="./edit.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-primary">Edit</a>
                                                            <?php //check if account is deactivated
                                                            if($row['account_status']=='deactivated'){
                                                                echo "<a href=\"./activate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Activate</a>";
                                                            } else {
                                                                echo "<a href=\"./deactivate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Deactivate</a>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                    <div id="admins" class="tab-pane fade" style="background-color: #f4f6f9 !important;">
                        <h3>Admins</h3>
                        <?php
                        if(!empty($_GET['search'])) {
                            $string = $mysqli->escape_string($_GET['search']);
                            $search = "'%" . $string . "%'";
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='admin' 
                                                            AND (username LIKE $search 
                                                                  OR gender LIKE $search
                                                                  OR contact_no LIKE $search
                                                                  OR given_name LIKE $search
                                                                  OR last_name LIKE $search
                                                                  OR birthdate LIKE $search
                                                                  OR email_address LIKE $search
                                                                  OR account_status LIKE $search)
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        } else {
                            $result = $mysqli->query("SELECT * 
                                                            FROM users 
                                                            WHERE user_type='admin' 
                                                            AND account_status 
                                                            IN ('accepted','deactivated')") or die($mysqli->error);
                        }
                        if ($result->num_rows > 0) { ?>
                            <div class="cards-row">

                                <?php // output data of each row
                                while($row = $result->fetch_assoc()) { ?>
                                    <div class="cards-column">
                                        <div class="card">
                                            <?php
                                            //check if profile picture exists
                                            if(!($row['display_picture'] == null)){
                                                echo "<img src=\"".$row['display_picture']."\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                            } else {
                                                if($row['gender'] == "male"){
                                                    echo "<img src=\"../dist/img/male.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }else if($row['gender'] == "female"){
                                                    echo "<img src=\"../dist/img/female.png\" alt=\"".$row['username']."\" style=\"width:100%\">";
                                                }
                                            }
                                            ?>
                                            <div class="container" style="text-align: -webkit-center !important; display: block !important;width:100%">
                                                <br>
                                                <h4><b><?php echo $row['given_name']." ".$row['last_name'];?></b></h4>
                                                <hr color="black" width="100">
                                                <?php
                                                if($row['account_status']=='deactivated'){
                                                    echo "<button class=\"collapsible btn btn-block btn-danger btn-lg\" style=\"margin-bottom: 10px;\" >User Details</button>";
                                                }else{
                                                    echo "<button class=\"collapsible btn btn-block btn-primary btn-lg\" style=\"margin-bottom: 10px;\">User Details</button>";
                                                }
                                                ?>
                                                <div class="content">
                                                    <div style="overflow-x:auto;">
                                                        <table>
                                                            <tr>
                                                                <th>User ID</th>
                                                                <th><?php echo $row['user_id'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th><?php echo $row['username'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Gender</th>
                                                                <th><?php echo $row['gender'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Birthdate</th>
                                                                <th><?php echo $row['birthdate'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <th><?php echo $row['contact_no'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Email Address</th>
                                                                <th><?php echo $row['email_address'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Status</th>
                                                                <th><?php echo $row['account_status'];?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Balance</th>
                                                                <th><?php echo $row['account_balance'];?></th>
                                                            </tr>
                                                        </table>
                                                        <div class="btn-group-xs">
                                                            <a href="./edit.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-primary">Edit</a>
                                                            <?php //check if account is deactivated
                                                            if($row['account_status']=='deactivated'){
                                                                echo "<a href=\"./activate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Activate</a>";
                                                            } else {
                                                                echo "<a href=\"./deactivate.php?user_id=".$row['user_id']."\" class=\"btn btn-primary\">Deactivate</a>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--Rentals-on going -->

        </div></div></div>
<!-- /.content-header -->


<!-- /.content-wrapper -->

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
<script src="../dist/js/jquery.min.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
</body>
</html>
