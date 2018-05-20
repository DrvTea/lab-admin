<?php
    require_once "./include/conn.php";
    $userid = $_GET['user_id'];
    $result = $mysqli->query("SELECT * FROM users WHERE user_id='$userid'") or die($mysqli->error);
    $row = $result->fetch_assoc();

        $sql = "UPDATE users SET 
                                  account_status = 'accepted'
                             WHERE
                                  user_id = '$userid'";
        if($mysqli->query($sql)) {
            header("Location: ./users.php?activate=true");
        } else {
            header("Location: ./users.php?activate=false");
        }
?>