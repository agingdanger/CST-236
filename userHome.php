<?php
	session_start();
	require_once 'db_connector.php';
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
		<div class="picture_one">
			<h1 class="htext">
				<?php 
					if (isset($_SESSION['userID'])):
				?>
				Welcome! <?php echo $_SESSION['userName'];?>
				<?php
					endif;
				?>
			</h1>
		</div>
		<section class="sectionLight"> <!-- blue background + vaguely centered form -->
			<form method="post">
				<button type="submit" class="buttonLight" name="CP">Create Post</button>
				<button type="submit" class="buttonLight" name='SP'>Search Products</button>
				<?php if($_SESSION['Role'] == "Admin"):?>
					<button type="submit" class="buttonLight" name='SAP'>Show Admin Page</button>
				<?php endif;?>
				<button type="submit" class="buttonLight" formaction="logout.php">Logout</button>
			</form>
	
		</section>
		<section class="section">
			<?php
				if (isset($_POST['SP']))
				{
					$page = "search.html";
				}
				elseif (isset($_POST['SAP']))
				{
					$page = "showAdminPage.php";
				}
				else
				{
					$page = "clean.html";
				}
			?>
			<iframe height="150%" width="95%" src="<?php echo $page?>" class="framing"></iframe>
		</section>
	</body>
</html>