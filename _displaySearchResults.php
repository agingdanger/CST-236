<html>
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title> Login </title> <!-- tab title display -->
	</head>
	<body>
		<table class="ttext">
    			<tr>
        			<td>
        				ID
        			</td>
        			<td>
        				Product Name
        			</td>
        			<td>
        				Product Department
        			</td>
        			<td>
        				Product Price
        			</td>
        				
		<?php 
            // Expects an array of $person. Display the results in a table.
            //require_once 'SearchHandler.php';
            //person array
            
            //print_r($persons);
            
            for($x = 0; $x < count($products); $x++)
            {
                echo "<tr>";
                echo "<td>" . $products[$x]['PID'] . "<td>";
                echo "<td>" . $products[$x]['PName'] . "<td>";
                echo "<td>" . $products[$x]['PDescription'] .  "<td>";
                echo "<td>" . $products[$x]['PPrice'] . "<td>";
                
                
                ?>
                <td> Product Info
                <form action="productPage.php" method = "POST">
                <input type = "hidden" name = "id" value = " <?php echo $products[$x]['PID'] ?> "></input>
                <button type = "submit">Details</button>
                </form>
                <form action="shoppingCart.php" method = "POST">
                <input type = "hidden" name = "id" value = " <?php echo $products[$x]['PID'] ?> "></input>
                <button type = "submit">Add to Cart</button>
                </form>
                </td>
                	
                <?php 
                echo "</tr>";
            }
        ?>
        </tr>	
        </table>
	</body>
</html>
