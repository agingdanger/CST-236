<html lang ="en">
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title> Login </title> <!-- tab title display -->
	</head>
	<body>
		<div class="picture_one">
		</div>
		<section class="section"> <!-- blue background + vaguely centered form -->
			<?php
				session_start();
				require_once 'db_connector.php';
				if($connection)
				{
					$FirstName = addslashes($_POST['Fname']); //php variables set to html names. $_POST used to avoid sensitive info from showing up in the address bar
					$LastName = $_POST['Lname'];
					$EmailAdd = $_POST['Email'];
					$Password = $_POST['Keycode'];
			
				//input all the data from the form into the database
					$addToTable = "INSERT INTO `userinfo_table` (`ID`, `FName`, `LName`, `Email`, `Password`) VALUES (NULL, '$FirstName', '$LastName', '$EmailAdd', '$Password')";
				//add input and let user know if it works
					if (mysqli_query($connection, $addToTable)) 
					{
			    		echo "New record created successfully<br>";
					}
					else
					{
			    		echo "something went wrong please try again at another time <br>";
						echo "Error: " . $addToTable . "<br>" . mysqli_error($connection);
					}
				}
			?>
			<p class="lightLink">
				click<a href="login.html">here</a>to login!
			</p>
		</section>
		<div class="picture_two">
		</div>
	</body>
</html>