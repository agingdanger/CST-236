<?php 

    require_once 'productService.php';

    $searchPhrase = $_POST['product'];

    $p = new productService();

    $products = $p->findProducts($searchPhrase);
?>
<html lang ="en">
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title> Login </title> <!-- tab title display -->
		<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
	</head>
    <body>
    <h2 class="ttext">Search Results</h2>
    <!--<p class="ptext">Here is what we found</p>-->
    </body>
</html>

<?php

    if($products)
    {
        //we got some results
        include("_displaySearchResults.php");
    }
    else
    {
    echo "Nobody found here<br>";
    }


?>
