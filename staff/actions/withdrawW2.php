<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");
//Retrieve necessary values:
$amount= (double)$_POST["Amount"];
$resultID = mysql_query("SELECT MAX(ID) FROM transactions");
$prevIDRow = mysql_fetch_row($resultID);
$prevID = $prevIDRow[0];
$resultPrevBal = mysql_query("SELECT Balance FROM companyAccounts WHERE ID = 8");
$rowPrevBal = mysql_fetch_row($resultPrevBal);
$prevBal = $rowPrevBal[0];
$newBal = $prevBal - $amount;


//Define inserted variables
$newID = $prevID + 1;
$from = "CashBox";
$to = "Wildcard2";

//Query Withdrawal transactions
$transactionDetailQuery = mysql_query("INSERT INTO transactions (ID, Description, Company_Acquiring, Company_Selling, Amount, Type) VALUES (NULL, 'Withdrawal', '$from', '$to', '$amount', 'Withdrawal')");


//Query Withdrawal w2Trans
$withdrawQuery = "INSERT INTO w2Trans (ID, Transaction_ID, Description, Company_Acquiring, Company_Selling, Amount, Previous_Balance, New_Balance, Type) VALUES (NULL, $newID, 'Withdrawal', '$from', '$to', '$amount', '$prevBal', '$newBal', 'Withdrawal')";
$withdraw = mysql_query($withdrawQuery);


//Query Withdrawal cashBoxTrans

$cashIDRes = mysql_query("SELECT MAX(ID) FROM cashBoxTrans");
$cashIDRow = mysql_fetch_row($cashIDRes);
$cashID = $cashIDRow[0];
$prevCashRes = mysql_query("SELECT NewBalance FROM cashBoxTrans WHERE ID = $cashID");
$prevCashRow = mysql_fetch_row($prevCashRes);
$prevCash = $prevCashRow[0];

$newCash = $prevCash - $amount;
$cbTransQuery = mysql_query("INSERT INTO cashBoxTrans (ID, TransID, `From`, `To`, Amount, PreviousBalance, NewBalance) VALUES (NULL, '$newID','$from', '$to', '$amount', '$prevCash','$newCash')");

//Query Account Balance
$balanceQuery = mysql_query("UPDATE companyAccounts SET PreviousBalance = $prevBal, Balance = $newBal WHERE ID = 8");


if($withdraw){
            header("location:../bankW2.php?withdraw=e1#bTrans");
        }
        else
        {
            die (mysql_error());
            header("location:../bankW2.php?withdraw=error#bTrans");
        }



?>