<?php
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

class processShoppingChart
{
    public function addProductID($id)
    {
    $db = new db_connector();
    $conn = $db->getConnection();
    
    $stmt = "INSERT INTO l426moc0o088s6g9.Order (userID) VALUES ('$id')";
    $result = mysqli_query($conn, $stmt);
     if($result)
    {
        //Something should go here?
    }
    
    $ordered = "SELECT * FROM l426moc0o088s6g9.Order WHERE OID = LAST_INSERT_ID()";
    $result2 = mysqli_query($conn, $ordered);
    if($result2){
        while($row = mysqli_fetch_assoc($result2))
        {
            $orderID =  $_SESSION['orderID'] = $row['OID'];
            
            //return $orderID;
        }
    }
    }
    public function checkIfReal()
    {
        
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $ordered = "SELECT * FROM l426moc0o088s6g9.Order WHERE OID = LAST_INSERT_ID()";
        $result2 = mysqli_query($conn, $ordered);
        if($result2){
            while($row = mysqli_fetch_assoc($result2))
            {
                $orderID = $row['OID'];
                
                return $orderID;
            }
        }
    }
    public function insert($pid, $quantity)
    {
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $orderID = $this->checkIfReal();
        
        $insert = "INSERT INTO l426moc0o088s6g9.`Order List` (productID, PQuantity, orderID) VALUES('$pid', '$quantity', '$orderID')";
        $pastorders = "SELECT * FROM l426moc0o088s6g9.`Order List` WHERE OLID = LAST_INSERT_ID()";
        //$result3 = $connection->query($insert);
        
        $pastorderquery = $conn->query($pastorders);
        
        return $pastorderquery;
    }
    
    
}

