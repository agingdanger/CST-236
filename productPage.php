<?php 
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new db_connector();
$connection = $db->getConnection();
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
		<section class="section">
			<div class="row">
				<div class="sixtcolumn">
					ID
				</div>
				<div class="sixtcolumn">
					Name
				</div>
				<div class="sixtcolumn">
					Department
				</div>
				<div class="sixtcolumn">
					Price
				</div>
				<div class="sixtcolumn">
					Picture
				</div>
				<div class="sixtcolumn">
					Mem
				</div>
			</div>
			<div class="row">
				<?php
					$id = $_POST['id'];
					$sql_query = "SELECT * FROM l426moc0o088s6g9.Product WHERE PID = '$id'";
					$sql_query2 = "SELECT * FROM l426moc0o088s6g9.Picture";
					$result = $connection->query($sql_query);
					$result2 = $connection->query($sql_query2);
					$product_array = array();
					$picture_array = array();

					while($product = $result->fetch_assoc())
					{
						array_push($product_array,$product);
					}
					
					while($picture = $result2->fetch_assoc())
					{
						array_push($picture_array,$picture);
					}

					for($x = 0; $x < count($product_array); $x++)
					{
				?>
				<div class="sixtcolumn">
					<?php
						echo $product_array[$x]['PID'];
					?>
				</div>
				<div class="sixtcolumn">
					<?php
						echo $product_array[$x]['PName'];
					?>
				</div>
				<div class="sixtcolumn">
					<?php
						echo $product_array[$x]['PDescription'];
					?>
				</div>
				<div class="sixtcolumn">
					<?php
						echo $product_array[$x]['PPrice'];
					?>
				</div>
				<div class="sixtcolumn">
					<?php
						echo $product_array[$x]['PSource'];
					?>
				</div>
				<div class="sixtcolumn">
					<?php
						for($y = 0; $y < count($picture_array); $y++)
						{
							if($product_array[$x]['PDescription'] == $picture_array[$y]['PicDescription'])
							{
								echo [$picture_array][$y]['IMG'];
							}
						}
					}
					?>
				</div>
			</div>
		</section>
	</body>
</html>