 <?php
 require_once"showTopMenu.php";
 require_once 'db_connector.php';
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
 session_start();
 
 $db = new db_connector();
 $connection = $db->getConnection();
 
 $id = $_GET['ID'];

 if($connection){
     $sql_statement = "SELECT * FROM `Product` WHERE  `PID` = '$id' LIMIT 1 ";
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $productName = $row['PName'];
            $productDescription = $row['PDescription'];
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
<form action="processEditItem.php">
	<input type = "hidden" name = "id" value = "<?php echo $id; ?>"></input>
    Product Title:<input type="text" name="postTitle" value = " <?php echo $productName; ?>"></input><br>
    Product Description:<textarea rows="5" cols="50" name="postContents"><?php echo $productDescription;?></textarea><br>
    <button type="submit">Submit Changes</button>
</form>
</div>
