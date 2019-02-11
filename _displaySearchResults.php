<?php 
// Expects an array of $person. Display the results in a table.
//require_once 'SearchHandler.php';
//person array

//print_r($persons);

for($x = 0; $x < count($products); $x++){
    echo $products[$x]['PID'] . "     ";
    echo $products[$x]['PName'] .  "     ";
    echo $products[$x]['PDescription'] .  "     ";
    echo $products[$x]['PPrice'] .  "     ";
    echo "<br>";
    
}

?>