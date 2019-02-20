<html lang ="en">
	<head>
		<meta charset="UTF-8"> <!-- text encoding set up-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
		<title> Login </title> <!-- tab title display -->
		<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
	</head>
	<body>
		<div class="picture_one">
			<h1 class="htext">
				Thank you for Visiting!
			</h1>
		</div>
		<section class="section"> <!-- blue background + vaguely centered form -->
			<?php 
				// This module should logout the user.  Unset any $_SESSION variables, destroy the session.
				session_start();

				$_SESSION = array();

				session_destroy();

				echo "You have succesfully been logged out of the system";
			?>
			<p class="lightLink">
				Click<a href="login.html">here</a>to login!
			</p>
		</section>
		<div class="picture_two">
		</div>
	</body>
</html>