<?php
    session_start();
    require_once 'conn.php';
    $email = $mysqli->escape_string($_POST['email']);

    if (isset($_POST['approve'])) {
        $result = $mysqli->query("UPDATE users SET account_status='accepted' where email_address='$email'") or die ($mysqli->error());
				echo 'Request Accepted';
    } else {
        $result = $mysqli->query("UPDATE users SET account_status='declined' where email_address='$email'") or die ($mysqli->error());
				echo 'Request Declined';
    }
    header('location: ../registrations.php');
?>