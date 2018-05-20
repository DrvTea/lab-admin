<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'transient';
$mysqli = new mysqli($host, $user, $pass,$db) or die($mysqli -> error);
?>