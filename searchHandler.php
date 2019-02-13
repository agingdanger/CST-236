<?php 

require_once 'productService.php';

$searchPhrase = $_POST['product'];

$p = new productService();



$products = $p->findProducts($searchPhrase);



?>
<h2>Search Results</h2>
<p>Here is what we found</p>

<?php

if($products){
    //we got some results
    include("_displaySearchResults.php");
}
else{
   echo "Nobody found here<br>";
}


?>
