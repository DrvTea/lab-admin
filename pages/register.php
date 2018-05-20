<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Welcome Customer!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../css/style.css" rel="stylesheet">
    
    <!-- Ionicons
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.css">-->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- START OF BOOTSTRAP & FONTAWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">

    <!-- FOR AJAX -->
    <script type="text/javascript" src="../dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <link href="../dist/css/style.css" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript" src="ajaxscript.js"></script>
</head>
<body class="hold-transition">
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../admin.php" class="nav-link">Home</a>
        </li>
    </ul>
</nav>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 mb-1 text-center">
                <h1 class="">Register a new account!</h1>
                <div class="fading-line"></div>
                <p class="text-dark">Already has an account?<a href="../index.php" id="register-link">, Click here to Login!</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 create-acc">
                <div class="card text-white bg-secondary p-3" style="width: 80%;">
                    <div class="card-body">
                        <h1 class="mb-4">Registration Form <i class="fas fa-address-book"></i></h1>
                        <hr style="background-color: white;">
                        <form class="reg-form" method="post" id="registration-form">
                            <div id="error"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" required/>
                                    <span class="mx-1"></span>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="gender" id="gender">
                                    <option selected value="" disabled>Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate:</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" />
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">+63</span></div>
                                    <input type="tel" class="form-control" placeholder="Contact No" name="cont_no" id="cont_no" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                                <span id="check-e"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Retype Password" name="confirmpassword" id="confirmpassword" />
                            </div>
                            <div class="form-group">
                                <label for="usertype">Select a Role:</label>
                                <select class="form-control" name="usertype" id="usertype">
                                    <option selected value="user">Customer</option>
                                    <option value="provider">Service Provider</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info w-100" name="btn-save" id="btn-submit">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.js"></script> -->

</body>
</html>
