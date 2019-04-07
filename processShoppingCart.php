<?php
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

class processShoppingCart
{

    public function addProductID($id)
    {
    $db = new db_connector();
    $conn = $db->getConnection();
    //Creates order 
    $stmt = "INSERT INTO l426moc0o088s6g9.Order (userID) VALUES ('$id')";
    $result = mysqli_query($conn, $stmt);
    if($result)
    {
        //Something should go here?
    }
    //gets the orderid just created
    $ordered = "SELECT * FROM l426moc0o088s6g9.Order WHERE OID = LAST_INSERT_ID()";
    $result2 = mysqli_query($conn, $ordered);
    if($result2){
        while($row = mysqli_fetch_assoc($result2))
        {
            $orderID =  $_SESSION['orderID'] = $row['OID'];
            return $orderID;
        }
    }
    }
    
    public function getCurrentOrder($oid)
    {
        
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $pastorders = "SELECT * FROM l426moc0o088s6g9.`Order List` WHERE orderID = '$oid'";
        
        $currentorderquery = $conn->query($pastorders);
        
        return $currentorderquery;
    }
    public function insert($pid, $quantity)
    {
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $orderID = $_SESSION['orderID']; //$this->checkIfReal();
        
        $insert = "INSERT INTO l426moc0o088s6g9.`Order List` (productID, PQuantity, orderID) VALUES('$pid', '$quantity', '$orderID')";
        $pastorders = "SELECT * FROM l426moc0o088s6g9.`Order List` WHERE orderID = '$orderID'";
        $result3 = $conn->query($insert);
        //$result3 = mysqli_query($conn, $insert);
        $pastorderquery = $conn->query($pastorders);
        
        return $pastorderquery;
    }
    
    
}

