<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "tuy8t6uuvh43khkk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "cfxok5ub03el74fe";
$password = "gdfr6l2jjh74yy91";
$dbname = "l426moc0o088s6g9";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);