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

			if ($connection) {
				$attemptedLoginUsername = $_POST['Username'];
				$attemptedPassword = $_POST['Keycode'];

				//echo "Connected to " . $dbname . " as " . $username;
				//echo "<br> login name: " . $attemptedLoginName . "<br>" . $attemptedPassword . "<br>";
				$sql_statement = "SELECT * FROM `l426moc0o088s6g9.User` WHERE `Username` = '$attemptedLoginUsername' AND `Password` = '$attemptedPassword' LIMIT 1";
				$result = mysqli_query($connection, $sql_statement);
				if ($result) {
					if (mysqli_num_rows($result) == 1) {
						//echo "Login successful<br>";
						$row = mysqli_fetch_assoc($result);
						$_SESSION['userUsername'] = $row['Username'];
						$_SESSION['userid'] = $row['ID'];
						$_SESSION['userName'] = $row['FName'];
						header('Location: userHome.php');
					}
					else {
						echo "Login unsuccessful<br>";
						//exit;
					}
				}
				else {
					echo "error" . mysqli_error($connection);
					//exit;
				}
			}
			else {
				echo "Error connecting " . mysqli_connect_errno();
				//exit;
			}
			?>
			<p class="lightLink">
				<a href="login.html">Go Back</a>
			</p>
		</section>
		<div class="picture_two">
		</div>
	</body>
</html>