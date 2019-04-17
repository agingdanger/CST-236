<?php
require_once 'db_connector.php';
require_once 'CardDataTransactionService.php';
require_once 'BankVault.php';

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

        $dataTransactionService = new BankVault($conn);
        $balance = $dataTransactionService->getBalance();

        return $balance;
    }

    function transaction($transaction)
    {
        // TODO Using ACID, finish transaction:
        $db = new db_connector();
        $conn = $db->getConnection();

        $conn->autocommit(FALSE);
        $conn->begin_transaction();

        $cardBalance = $this->getBalance();
        $cardData = new CardDataTransactionService($conn);
        $okCard = $cardData->updateBalance($cardBalance - $transaction);

        $bankVaultBalance = $this->getBankingVault();
        $bankVaultData = new BankVault($conn);
        $okBankVault = $bankVaultData->updateBalance($bankVaultBalance + $transaction);

        if($okCard && $okBankVault)
        {
            $conn->commit();
            include 'transactionSuccess.php';
        }
        else
        {
            $conn->rollback();
            include 'transactionFailed.php';
        }
        $conn->close();
    }
    
    
}