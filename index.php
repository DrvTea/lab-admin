<!DOCTYPE html>
<?php
    require './pages/include/conn.php';
    session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Homeseek - Login</title>
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    if($_SESSION['user_type'] == "admin") {
      header ('location: admin.php');
    } else {
    echo "<script>alert('You can't login on this module!')</script>";
    }
  }
  
  if(isset($_POST['submit'])) {
    require './pages/include/signin.php';
  }
?>
<body>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white bg-light border border-info m-2 p-4">
            <div class="card-body">
              <img class="img-fluid d-block" src="images/HS.png">
                <div class="fading-line"></div>
              <form action="index.php" method="post">
                <div class="form-group">
                  <input type="username" class="form-control" placeholder="Username" name="username"> </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password"> </div>
                  <input type="submit" class="btn btn-g btn-secondary btn-lg w-100 text-center p-1 m-0" name="submit">
              </form>
								<div class="fading-line"></div>
								<p class="text-dark text-center">New? <a href="./pages/register.php" id="register-link">Register a new account</a></p>
            </div>
          </div>
          <div class="col-md-12 mt-3 text-center">
            <p class="text-dark">© Copyright 2018 Group 3 WebtechLab - All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>