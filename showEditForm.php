<!-- 
 this is a partial page
 purpose is to show the "Add Recipe" form
 even though the file extension is .php, all of the code is html.
 -->
 
 <?php
 
 require_once"showTopMenu.php";
 
 session_start();
 
 $id = $_GET['ID'];
 
 require_once 'db_connector.php';
 
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
