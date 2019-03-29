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
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();
 
 $id = $_SESSION['userID'];
 //echo $id;
 $pid = $_POST['id'];
 $quantity = $_POST['quantity'];
 
 $processCart = new processShoppingCart();
 /*
 $db = new db_connector();
 
 $connection = $db->getConnection();

 $sql_statement = "INSERT INTO l426moc0o088s6g9.Order (userID) VALUES ('$id')";
 $result = mysqli_query($connection, $sql_statement);
 if($result){
 

 }
 */
 $processCart->addProductID();
 
 
 //echo $sql_statement;
 
 
 /*
 $ordered = "SELECT * FROM l426moc0o088s6g9.Order WHERE OID = LAST_INSERT_ID()";
 $result2 = mysqli_query($connection, $ordered);
 if($result2){
     while($row = mysqli_fetch_assoc($result2))
     {
        $orderID =  $_SESSION['orderID'] = $row['OID'];  
     }
 }
 */
$pastorderquery = $processCart->insert($pid, $quantity);
 
/*
 $insert = "INSERT INTO l426moc0o088s6g9.`Order List` (productID, PQuantity, orderID) VALUES('$pid', '$quantity', '$orderID')";
 $pastorders = "SELECT * FROM l426moc0o088s6g9.`Order List` WHERE OLID = LAST_INSERT_ID()";
 $result3 = $connection->query($insert);

*/
 $pastorderquery = $processCart->addProductID();
 
 if($pastorderquery){

    
        $cart_array = array();
        
        while($order = $pastorderquery->fetch_assoc()){
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
            }
                
            
        }
 }
 else{
     echo "Try more";
 }
 
 //echo $orderID;
 //$sql_statement2 = "INSERT INTO"
 
 
 //   echo "will be overwritten";
?>
        <!--</tr>	-->
        </table>
          <img src="https://thumbs.gfycat.com/CharmingIdioticBlobfish-size_restricted.gif" alt="The Simpsons" style="width:700px;height:393px;"> 
	</body>
</html>
<?php

?>