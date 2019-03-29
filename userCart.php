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
            $pid = $_POST['id'];

            
        ?>
    </body>
</html>