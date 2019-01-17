<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "@nj562hj3k9!";
$dbname = "CST236Login";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);