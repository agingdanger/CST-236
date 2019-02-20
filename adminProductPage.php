<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
<?php
require_once 'db_connector.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$db = new db_connector();
$connection = $db->getConnection();

if($_SESSION['Role'] != 'Admin') {
    echo "Please login as an admin<br>";
    exit;
}



$sql_statement = "SELECT * FROM `Product` ";

if($connection)
{
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while($row = mysqli_fetch_assoc($result)){?>
            <section class="section">
            <?php
            echo "Product ID " . $row['PID'] . "<br>";
            echo "Product Name " . $row['PName'] . "<br>";
            echo "Product Description " . $row['PDescription'] . "<br>";
            echo "Product Price " . $row['PPrice'] . "<br>";
            echo "Product's Owner ID " . $row['userID'] . "<br>";
            echo "Product Total Points " . $row['PPoints'] . "<br>";
            ?>
            <div class="row">
                <form action="processDeleteItem.php">
                    <input type = "hidden" name = "ID" value =" <?php echo $row['PID']?>"></input>
                    <input type = "hidden" name = "name" value = " <?php echo $row['PName']?>"></input>
                    
                    <div style="margin-left: auto;margin-right: auto;">
                        <button type = "submit" class="button">Delete</button>
                        <button type = "submit" class="button" formaction="showEditForm.php">Edit</button>
                    </div>
                </form>
                <!--<div class="column">
                    <form action="showEditForm.php">
                        <input type = "hidden" name = "ID" value =" <?php //echo $row['PID']?>"></input>
                        <input type = "hidden" name = "name" value = " <?php //echo $row['PName']?>"></input>
                        
                        <button type = "submit"class="button"formaction="showEditForm.php">Edit</button>
                        </form>
                </div>-->
            </div>
            
            
            <?php
            echo "==============<br>";
            ?>
            </section>
            <?php
        }
    }
    
}
?>