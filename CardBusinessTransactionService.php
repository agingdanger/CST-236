<?php
 
require_once 'db_connector.php';


class CardBusinessTransactionService
{
    // class opens
    function getBalance()
    {
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $dataTransactionService = new CardDataTransactionService($conn);
        $balance = $dataTransactionService->getBalance();
        
        $conn->close();
        return $balance;
    }
    
    function getBankingVault()
    {
        $db = new db_connector();
        $conn = $db->getConnection();
        
        $dataTransactionService = new BankVault($am);
    }
    function transaction()
    {
        // TODO Using ACID, finish transaction: 
    }
}