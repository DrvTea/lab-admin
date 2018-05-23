<?php
require_once './include/conn.php';

if($_POST) {
    $fname          = $mysqli->escape_string($_POST['first_name']);
    $lname          = $mysqli->escape_string($_POST['last_name']);
    $gender         = $mysqli->escape_string($_POST['gender']);
    $date           = date_create($mysqli->escape_string($_POST['birthdate']));
    $birthdate      = date_format($date,"Y-m-d");;
    $phone          = $mysqli->escape_string($_POST['cont_no']);
    $username 		= $mysqli->escape_string($_POST['username']);
    $user_email 	= $mysqli->escape_string($_POST['user_email']);
    $password 	    = $mysqli->escape_string($_POST['password']);
    $usertype       = $mysqli->escape_string($_POST['usertype']);

//    try {
        $check_email = $mysqli->query("SELECT * FROM users WHERE email_address='$user_email'") or die($mysqli->error());
        $check_username = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());
        if(!preg_match("/^[0-9]{10}$/", $phone)) {
            echo "Invalid Contact Number";
        } else if($check_email->num_rows === 0 && $check_username->num_rows === 0) {
            $sql = "insert into users(
                                  given_name,
                                  last_name,
                                  gender,
                                  birthdate,
                                  contact_no,
                                  email_address,
                                  username,
                                  password,
                                  user_type,
                                  account_status,
                                  account_balance) " . "VALUES 
                                 ('$fname', 
                                 '$lname', 
                                 '$gender', 
                                 '$birthdate',
                                 '+63$phone', 
                                 '$user_email', 
                                 '$username', 
                                 '$password', 
                                 '$usertype', 
                                 'pending', 
                                 0)";
            if($mysqli->query($sql)) {
                echo "registered";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);;
            }
        } else if ($check_email->num_rows > 0 && $check_username->num_rows > 0){
            echo "accexist";
        } else if ($check_email->num_rows > 0) {
            echo "emailtaken";
        } else {
            echo "usertaken";
        }
//    } catch(PDOException $e) {
//        echo $e->getMessage();
//    }
    //Create a directory for image uploads
    $directory = "./img/$username/";
    //Check if directory already exists.
    if(!is_dir($directory)){
        //If directory does not exist, create directory.
        mkdir($directory, 0777, true);
    }
}
?>
