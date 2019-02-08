<?php 

require_once 'Product.php';

$searchPhrase = $_GET['name'];

$p = new Product();



$persons = $p->findProducts($searchPhrase);



?>
<h2>Search Results</h2>
<p>Here is what we found</p>

<?php

if($persons){
    //we got some results
 
    include("_displaySearchResults.php");
}
else{
   echo "Nobody found here<br>";
}


?>
