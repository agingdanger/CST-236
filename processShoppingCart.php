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
    public function getPName($productID){
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $getnamequery = "SELECT * FROM l426moc0o088s6g9.`Product` WHERE PID = '$productID'";
        
        $result4 = $conn->query($getnamequery);
        
        if($result4){
            
            $name_array = array();
            
            while($order = $result4->fetch_assoc()){
                array_push($name_array,$order);
            }
            if($name_array){
                for($x = 0; $x < count($name_array); $x++)
                {
                    $name = $name_array[$x]['PName'];
                }
            }
       
        return $name;
        }
        else{
            $name = "No name found";
            return $name;
        }
    }
    
    public function getPrice()
    {
        // TODO Return the total price of the products selected: 
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $stmt = "SELECT `Order List`.orderID, `Order List`.PQuantity, `Product`.PPrice, `Product`.PID
            FROM `Order List`
            LEFT JOIN `Product`
            ON `Order List`.productID = `Product`.PID";
        
        $result5 = $conn->query($stmt);
        
        if($result5){
            $price_array = array();
            
            while($price = $result5->fetch_assoc()){
                array_push($price_array,$price);
            }
            $total = 0;
            $curr = 0;
            for($x = 0; $x < count($price_array); $x++)
            {
                //echo "price array " . $price_array[$x]['orderID'] . "<br>";
                //echo "session order id " . $_SESSION['orderID'] . "<br>";
                
                if($price_array[$x]['orderID'] == $_SESSION['orderID']){
                  
                    
//                     echo $price_array[$x]['orderID'];
//                     echo $price_array[$x]['PQuantity'];
                    
                    $curr = ((float)$price_array[$x]['PPrice'] * (float)$price_array[$x]['PQuantity']);
                    $total = $total + $curr;
                    $curr = 0;
                    
                }
            }
            echo "$" . $total;
        }
        
    }
    
    
}

