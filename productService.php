<?php
require_once 'userProductService.php';

class productService{
    
    function findBySearch($n){
        
        $products = Array();
        
        $dbService = new productService();
        $products = $dbService->findProducts($n);
        
        return $products;
    }
}