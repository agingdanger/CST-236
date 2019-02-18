 <?php
 require_once 'db_connector.php';
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
 session_start();
 
 $db = new db_connector();
 $connection = $db->getConnection();
 
 $id = $_GET['ID'];

 if($connection){
     $sql_statement = "SELECT * FROM `User` WHERE  `UID` = '$id' LIMIT 1 ";
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $userEmail = $row['Email'];
            $userFName = $row['FName'];
            $userLName = $row['LName'];
            $userPassword = $row['Password'];
            $userUsername = $row['Username'];
            $userRole = $row['Role'];
            $userUPoints = $row['UPoints'];
        }
    }else{
        echo "there was a problem connecting " . mysqli_error($connection);
    }
 }
 else{
     echo "oops" . mysqli_connect_error();
 }
 //we know the id
 //select the rest of the values from the database
 
 
 ?>
 
 
 

<div class="form-container">
<h2>Edit a Product</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditUser.php">
	<input type = "hidden" name = "id" value = "<?php echo $id; ?>"></input>
    User Email:<input type="text" name="email" value = " <?php echo $userEmail; ?>"></input><br>
    User First Name:<input type="text" name="fname" value = " <?php echo $userFName;?>"></input><br>
    User Last Name:<input type="text" name="lname" value = " <?php echo $userLName; ?>"></input><br>
    User Password:<input type="text" name="password" value = " <?php echo $userPassword; ?>"></input><br>
    Username:<input type="text" name="username" value = " <?php echo $userUsername; ?>"></input><br>
    User Role:<input type="text" name="role" value = " <?php echo $userRole; ?>"></input><br>
    User's Points:<input type="text" name="upoints" value = " <?php echo $userUPoints; ?>"></input><br>
    
    <button type="submit">Submit Changes</button>
</form>
</div>