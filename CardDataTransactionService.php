<?php

require_once 'db_connector.php';
require_once 'Card.php';

class CardDataTransactionService
{// class opens
    private $conn;
    
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    function getBalance($id)
    {
        // run query to get balance:
        $sql = "SELECT AMOUNT FROM CARDS WHERE CARDNUMBER LIKE ";
        $result = $this->conn->query($sql);
        
        if($result->num_rows == 0)
        {
            return -1;
        }
        else
        {
            // return balance
            $row = $result->fetch_assoc();
            $amount = $row['AMOUNT'];
            return $amount;
        }
    }
    
    function updateBalance($amount)
    {
        // run query to get balance:
        $sql = "UPDATE CARDS SET AMOUNT=$amount";
        $result = $this->conn->query($sql);
        
        if($result)
        {
            // update successful
            return 1;
        }
        else
        {
            return 0;
        }
    }
}