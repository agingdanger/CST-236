<?php 
// Expects an array of $person. Display the results in a table.
//require_once 'SearchHandler.php';
//person array

//print_r($persons);

for($x = 0; $x < count($products); $x++){
    echo $products[$x]['FIRST_NAME'] . "     ";
    echo $products[$x]['LAST_NAME'] .  "     ";
    echo $products[$x]['ID'] .  "     ";
    echo "<br>";
    
}

?>