 <?php
 require_once 'db_connector.php';
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();
 
 $id = $_SESSION['userID'];
 //echo $id;
 $pid = $_POST['id'];
 $quantity = $_POST['quantity'];
 
 $db = new db_connector();
 
 $connection = $db->getConnection();

 $sql_statement = "INSERT INTO l426moc0o088s6g9.Order (userID) VALUES ('$id')";
 $result = mysqli_query($connection, $sql_statement);
 /*if($result){
     echo "We did it";
 }
 else{
     echo "Dangit";
 }*/
 
 //echo $sql_statement;
 
 $ordered = "SELECT * FROM l426moc0o088s6g9.Order WHERE OID = LAST_INSERT_ID()";
 $result2 = mysqli_query($connection, $ordered);
 if($result2){
     while($row = mysqli_fetch_assoc($result2))
     {
        $orderID =  $_SESSION['orderID'] = $row['OID'];  
     }
 }
 echo $pid . "<br>";
 echo $quantity . "<br>";
 echo $orderID . "<br>";
 
 $insert = "INSERT INTO l426moc0o088s6g9.`Order List` (productID, PQuantity, orderID) VALUES('$pid', '$quantity', '$orderID')";
 $result3 = mysqli_query($connection, $insert);
 if($result3){
     echo "We did it again";
 }
 else{
     echo "Try more";
 }
 
 //echo $orderID;
 //$sql_statement2 = "INSERT INTO"
 
 
 //   echo "will be overwritten";
?>
 <img src="https://thumbs.gfycat.com/CharmingIdioticBlobfish-size_restricted.gif" alt="The Simpsons" style="width:700px;height:393px;"> 