<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'cardDataService.php';

class cardBusinessService{
    
    
    
    public function getCreditInfo($id){
        
        $cardData = new cardDataService();
        $processCard = new cardBusinessService();
        $userID = $_SESSION['userID'];
        $result = $cardData->getCreditInfo($userID);
        
        if($result)
        {
            $card_array = array();
            
            while ($cards = $result->fetch_assoc()){
                array_push($card_array,$cards);
            }
            return $card_array;
        }
        else{
            return;
        }
        
    }
    
    public function addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am){
        
        $cardData = new cardDataService();
        $result = $cardData->addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am);
        
        return $result;
    }
    
    public  function deleteCreditInfo($id){
        
    }
    
     public  function updateCreditInfo($id){
        
    }
}