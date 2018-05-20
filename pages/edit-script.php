<?php
require_once './include/conn.php';

if($_POST) {
    $userid         = $mysqli->escape_string($_POST['userid']);
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

    if(!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "Invalid Contact Number";
    } else if($check_email->num_rows <= 1) {
        /*$sql = "insert into users(
                                  given_name,
                                  last_name,
                                  gender,
                                  birthdate,
                                  contact_no,
                                  email_address,
                                  username,
                                  password,
                                  display_picture,
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
                                 './img/$username/,
                                 '$usertype', 
                                 'pending', 
                                 0)";
                                 */
        $target_dir = "./img/$username/";
        if(!is_dir($target_dir)){
            //If directory does not exist, create directory.
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["display_picture"]["name"]);
        $file_ext=strtolower(end(explode('.',$_FILES['display_picture']['name'])));
        $file_name = $target_dir . "profilepic." . $file_ext;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $sql = "UPDATE users SET 
                                  given_name = '$fname',
                                  last_name = '$lname',
                                  gender = '$gender',
                                  birthdate = '$birthdate',
                                  contact_no = '+63$phone',
                                  email_address = '$user_email',
                                  password = '$password',
                                  display_picture = '$file_name',
                                  user_type = '$usertype'
                             WHERE
                                  user_id = '$userid'";


// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["display_picture"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($file_name)) {
            unlink($file_name);
        }
// Check file size
        if ($_FILES["display_picture"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["display_picture"]["tmp_name"], $file_name)) {
                echo "The file ". basename( $_FILES["display_picture"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if($mysqli->query($sql)) {
            echo "updated";
            header("Location: ./edit.php?user_id=$userid&success=true");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    } else if ($check_email->num_rows > 1) {
        echo "emailtaken";
        header("Location: ./edit.php?user_id=$userid&success=false");
    }


}
?>