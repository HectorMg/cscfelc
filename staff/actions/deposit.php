<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");

$amount= (double)$_POST["Amount"];
$resultID = mysql_query("SELECT MAX(ID) FROM a3670842_cscfelc . food1deposits");
$rowID= mysql_fetch_row($resultID);
$resultPrevBal = mysql_query("SELECT New_Balance FROM a3670842_cscfelc . food1deposits WHERE ID = '$rowID[0]'");
$rowPrevBal = mysql_fetch_row($resultPrevBal);
$prevBal = $rowPrevBal[0];
$newBal = $prevBal + $amount;
$depositQuery = "INSERT INTO a3670842_cscfelc . food1deposits (ID, Amount, Previous_Balance, New_Balance) VALUES (NULL, '$amount', '$prevBal', '$newBal')";
$deposit = mysql_query($depositQuery);

if($deposit){
            header("location:../bankF1.php?deposit=e1");
        }
        else
        {
            die (mysql_error());
            header("location:../bankF1.php?deposit=error");
        }

?>