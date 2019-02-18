<?php 
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$db = new db_connector();
$connection = $db->getConnection();

$id = $_GET['id'];
$productName = $_GET['pname'];
$productDescription = $_GET['pdescription'];
$productPrice = $_GET['pprice'];
$productOwnerID = $_GET['ownerID'];
$productPoints = $_GET['ppoints'];

//$user_id = $_SESSION['userid'];
$role = $_SESSION['Role'];

echo "user id " . $_SESSION['userID'];
if($connection && isset($_SESSION['userID']) && $role == "Admin"){
    



$sql_statement = "UPDATE `Product` SET  `PName` = '$productName', `PDescription` = '$productDescription', `PPrice` = '$productPrice', `userID` = '$productOwnerID', `PPoints` = '$productPoints' WHERE `PID` = '$id' ";


    $result = mysqli_query($connection, $sql_statement);
    if($result){
        echo " number of rows affected" . mysqli_affected_rows($connection);
        echo "Data updated successfully!";
        echo "click <a href = 'AdminPage.php'>here</a> to return";
    }
    else{
        echo "Error in the sql " . mysqli_error($connection);
    }
}
else {
    echo "Error connecting " . mysqli_connect_error();
}


?>