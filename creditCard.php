<html lang ="en">
<head>
<meta charset="UTF-8"> <!-- text encoding set up-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viewport defined to scale for all devices-->
<meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--backwards compatabillity with IE/edge products-->
<title> Manage Payment Methods </title> <!-- tab title display -->
<link rel="stylesheet" href="loginStyle.css"> <!-- style sheet being pulled from -->
</head>

<body>
<?php

require_once 'cardBusinessService.php';
require_once 'Card.php';

$processCard = new cardBusinessService();

$card_array = $processCard->getCreditInfo($_SESSION['userID']);
    
    if($card_array){
        
        ?>
			<table class="ttext" style="width:100%">
        			<tr>
        				<td>
        					Card Number
        				</td>
            			<td>
            				First Name
            			</td>
            			<td>
            				Middle Initial
            			</td>
            			<td>
            				Last Name
            			</td>
            			<td>
            				Expiration
            			</td>
            			<td>
            				Card Company
            			</td>
            			<td>
            				Type of Card
            			</td>
            			<td>
            				CVV
            			</td>
                    </tr>
<?php

        for($x = 0; $x < count($card_array); $x++)
        {
            echo "<td>" . $card_array[$x]['CardNumber'] . "</td>";
            echo "<td>" . $card_array[$x]['FName'] . "</td>";
            echo "<td>" . $card_array[$x]['MInitial'] . "</td>";
            echo "<td>" . $card_array[$x]['LName'] . "</td>";
            echo "<td>" . $card_array[$x]['Expiration'] . "</td>";
            echo "<td>" . $card_array[$x]['CardCompany'] . "</td>";
            echo "<td>" . $card_array[$x]['DebOCred'] . "</td>";
            echo "<td>" . $card_array[$x]['CVVNumber'] . "</td>";
        }
        
        ?>
        </table>
        <?php
    


}
else{
    echo "You haven't added any info yet!";
    
   
}

if(isset($_POST['create'])){
    
    ?>
    
    <form action="creditCard.php" method="post">
        Card Number <input type="text" name="cardnumber"><br>
        First Name <input type="text" name="firstname"><br>
        Middle Initial <input type="text" name="middlei"><br>
        Last Name <input type="text" name="lastname"><br>
        Expiration <input type="text" name="expiration"><br>
        Card Company <input type="text" name="cardcompany"><br>
        Card Type (Credit or Debit) <input type="text" name="cardtype"><br>
        CVV Number <input type="text" name="ccvnumber"><br>
        Amount <input type="text" name="amount"><br>
        <input type="hidden" name="create" value="0"><br>
        <input type="submit">
    </form>
    
    <?php
    if(isset($_POST['expiration']))
    {
        $card = new Card($_POST['cardnumber'], $_POST['firstname'], $_POST['middlei'], $_POST['lastname'], $_POST['expiration'], $_POST['cardcompany'], $_POST['cardtype'], $_POST['ccvnumber'], $_POST['amount']);
        
        
        /* $card->setCardNumber($_POST['cardnumber']);
        $card->setFName($_POST['firstname']);
        $card->setMInitial($_POST['middlei']);
        $card->setLName($_POST['lastname']);
        $card->setExpiration($_POST['expiration']);
        $card->setCardCompany($_POST['cardcompany']);
        $card->setDebOCred($_POST['cardtype']);
        $card->setCardCompany($_POST['ccvnumber']);
        $card->setAmount($_POST['amount']); */
        
        $cn = $card->getCardNumber();
        $fn = $card->getFName();
        $mi = $card->getMInitial();
        $ln = $card->getLName();
        $ex = $card->getExpiration();
        $cc = $card->getCardCompany();
        $dc = $card->getDebOCred();
        $cv = $card->getCardCompany();
        $am = $card->getAmount();
        
        
        
        $addCard = new cardBusinessService();
        
        $addCard->addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am);
        
        echo "finished adding card";
        
       
    }
    //i need to send a model here to this method
    /* $text1 = 
     * service->method(var1,var2,var3,var4,var5)*/
    
   // $createCard = $processCard->addCreditInfo($_SESSION['userID']);
}
?>
</body>
	<form>
	<button name = "create" formmethod = "POST" type="submit" class="buttonLight" formaction="creditCard.php" value="0">Create</button>
	<button name = "delete" formmethod = "POST" type="submit" class="buttonLight" formaction="creditCard.php" value="1">Delete</button>
	<button name = "update" formmethod = "POST" type="submit" class="buttonLight" formaction="creditCard.php" value="2">Update</button>
	</form>
</html>

<?php
