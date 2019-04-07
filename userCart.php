<html>
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title> Product Results </title> <!-- tab title display -->
        <link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
	</head>
	<body>
        <?php
            require_once 'db_connector.php';
            require_once 'processShoppingCart.php';
            
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
//           session_start();

            
            
            if(isset($_SESSION['orderID'])){
                $oid = $_SESSION['orderID'];
            $processCart = new processShoppingCart();
            
            $currentorderquery = $processCart->getCurrentOrder($oid);

if($currentorderquery){
    
    $cart_array = array();
    
    while($order = $currentorderquery->fetch_assoc()){
        array_push($cart_array,$order);
    }
    
    if($cart_array){
        ?>
                <table class="ttext" style="width:100%">
        			<tr>
            			<td>
            				Order List Row ID
            			</td>
            			<td>
            				Product ID
            			</td>
            			<td>
            				Product Quantity
            			</td>
            			<td>
            				Order ID
            			</td>
                    </tr>
                   
                    
                <?php 
                for($x = 0; $x < count($cart_array); $x++)
                {
                    //echo "<tr>";
                    echo "<td>" . $cart_array[$x]['OLID'] . "</td>";
                    echo "<td>" . $cart_array[$x]['productID'] . "</td>";
                    echo "<td>" . $cart_array[$x]['PQuantity'] .  "</td>";
                    echo "<td>" . $cart_array[$x]['orderID'] . "</td>";
                    echo "</tr>";
                }
                    
                
            }
     }
     
            //$id = $_SESSION['userID'];
            //$pid = $_POST['id'];
}
else{
    echo "You need to shop for items still!";
}
            
        ?>
    </body>
</html>