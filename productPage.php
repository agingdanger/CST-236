<?php 
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatability with IE/edge products-->
		<title>
			Item Information
		</title> <!-- tab title display -->
		<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
	</head>
	<body>
		<table class = "productInfo">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Department</td>
				<td>Price</td>
				<td>Picture</td>
				
				<?php 
				$id = $_POST['id'];
				$db = new db_connector();
				
				$sql_query = "SELECT * FROM l426moc0o088s6g9.Product WHERE PID = '$id'";
				
				$sql_query2 = "SELECT * FROM l426moc0o088s6g9.Picture";
				
				$connection = $db->getConnection();
				
				$result = $connection->query($sql_query);
				$result2 = $connection->query($sql_query2);
				$product_array = array();
				$picture_array = array();
				
				while($product = $result->fetch_assoc()){
				    array_push($product_array,$product);
				}
				
				while($picture = $result2->fetch_assoc()){
				    array_push($picture_array,$picture);
				}
				
				
				
				for($x = 0; $x < count($product_array); $x++)
				{
				    echo "<tr>";
				    echo "<td>" . $product_array[$x]['PID'] . "<td>";
				    echo "<td>" . $product_array[$x]['PName'] . "<td>";
				    echo "<td>" . $product_array[$x]['PDescription'] .  "<td>";
				    echo "<td>" . $product_array[$x]['PPrice'] . "<td>";
				    
				    for($x = 0; $x < count($picture_array); $x++)
				    {
				        if($product_array[$x]['PDescription'] == $picture_array[$x]['PicDescription'])
				        {
				            echo "<td"> print [$picture_array][$x]['IMG'];
				        }
				    }
				
				}
				
				?>
			
			
			
			
			</tr>
			
		
		
		</table>
	
	
	
	</body>
	
	
	
</html>