<?php
require_once 'userProductService.php';

class productService{
    
    function findProducts($n){
        
        $products = Array();
        
        $dbService = new userProductService();
        $products = $dbService->findProducts($n);
        
        return $products;
    }
}