<?php
  $username = $mysqli->escape_string($_POST['username']);
  $password = $mysqli->escape_string($_POST['password']);
  
  $result = $mysqli->query("SELECT * FROM users where username='$username'");
  if($result->num_rows == 0) {
    echo "<script>alert('Your account doesn't exist!')</script>";
  } else {
    $data = $result->fetch_assoc();
    if($password == $data['password']) {
        if ($data['account_status'] == 'pending') {
                echo "<script>alert('Your Account is still pending!')</script>";
        } else if ($data['account_status'] == 'declined') {
            echo "<script>alert('Your registration has been declined, please contact the Admin!')</script>";
        } else if ($data['account_status'] == 'deactivated') {
            echo "<script>alert('Your Account has been deactivated, please contact the Admin!')</script>";
        } else if ($data['user_type'] == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $data['user_type'];
            $_SESSION['account_status'] = $data['account_status'];	
            $_SESSION['logged_in'] = true;
            header ('location: admin.php');
        } else {
              echo "<script>alert('You can't login on this module!');</script>";
        }
    } else {
      echo "<script>alert('Invalid Password!')</script>";
    }
  }
?>