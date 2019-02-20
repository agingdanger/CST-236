<?php 
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

?>
<!DOCTYPE html>
	<!--
		Kevin George
		Charles Henderson
		Reuel Maddela
		CST-236
		Professor Yi
	-->

<html lang ="en">
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title>Administer</title> <!-- tab title display -->
		<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
	</head>
	
	<body>
		<section class="section"> <!-- blue background + vaguely centered form -->
			<form action="adminProductPage.php"> 
				<div class="row"> <!--row to hold the four columns-->
					
					<div>	
					<button type = "submit" class = "button">
					
					</button>			
					</div>
				</div>
				<div class="row"> <!--new row to hold the button-->
					<button type="submit" class="button">
						Mod Products
					</button>
				</div>
				
			</form>
			<form action= "adminUserPage.php">
				<div class="row"> <!--row to hold the four columns-->
					
					<div>	
					<button type = "submit" class = "button">
					
					</button>			
					</div>
				</div>
				<div class="row"> <!--new row to hold the button-->
					<button type="submit" class="button">
						Mod Users
					</button>
				</div>
			
			</form>
		</section>
	</body>
</html>