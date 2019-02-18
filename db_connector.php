<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class db_connector{
private $servername = "tuy8t6uuvh43khkk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
private $username = "cfxok5ub03el74fe";
private $password = "gdfr6l2jjh74yy91";
private $dbname = "l426moc0o088s6g9";

// Create connection
    function getConnection(){
    $connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    
        if($connection->connect_error){
            echo "Connection Failed " . $connection->connect_error . "<br>";
        }
        else{
            return $connection;
        }
    }
}