<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connector.php';

class cardDataService
{

    function getCreditInfo($id)
    {
        $db = new db_connector();
        $conn = $db->getConnection();

        $creditInfo = "SELECT * FROM l426moc0o088s6g9.`Cards` WHERE userID = '$id'";

        $cardInfo = $conn->query($creditInfo);

        return $cardInfo;
    }

    function addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am)
    {
        $db = new db_connector();

        $conn = $db->getConnection();

        $id = $_SESSION['userID'];

        $creditInfo = "INSERT INTO l426moc0o088s6g9.`Cards` (CardNumber, FName, MInitial, LName, Expiration, CardCompany, DebOCred, CVVNumber, userID, Amount) VALUES( '$cn', '$fn', '$mi', '$ln', '$ex', '$cc', '$dc', '$cv', '$id', '$am')";

        $cardInfo = $conn->query($creditInfo);

        return $cardInfo;
    }

    function deleteCreditInfo($id)
    {
    }

    function updateCreditInfo($id)
    {
    }
}