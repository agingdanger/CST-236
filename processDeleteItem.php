<?php
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$db = new db_connector();
$connection = $db->getConnection();

$itemToDelete = $_GET['ID'];
$nametoDelete = $_GET['name'];



$sql_statement = "DELETE FROM `Product` WHERE `Product`.`PID` = $itemToDelete";

if($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result){
           echo "Deleted item " . $nametoDelete . "<br>";
    }else{
        echo "Error with the SQL " . mysqli_error($connection);
    }

}else{
    
    echo "Error connecting " . mysqli_connect_error();
    
}
?>