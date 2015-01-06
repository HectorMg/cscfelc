<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");
  session_name(CSCFELC);
  session_start();

  //Transacción
  $compID = (int)$_SESSION["compID"];
  $shareqty = $_SESSION[qty];
  $CSV = $_SESSION[CSV];
  $total = $shareqty * $CSV;
  $number_total = number_format($total, 2);
  
  $resultPrevBal = mysql_query("SELECT Balance FROM companyAccounts WHERE ID = $compID");
  $rowPrevBal = mysql_fetch_row($resultPrevBal);
  $prevBal = $rowPrevBal[0];

  $balance = $prevBal + $total;

  $purchase = mysql_query("UPDATE companyAccounts SET PreviousBalance = $prevBal, Balance = $balance WHERE ID = $compID");

  $stockID = $_SESSION["stockID"];
  $prevSharesPartRes = mysql_query("SELECT `$stockID` FROM companyAccounts WHERE ID = $compID");
  $prevSharesPartRow = mysql_fetch_row($prevSharesPartRes);
  $prevSharesPart = $prevSharesPartRow[0];

  $PrevAShares = $_SESSION['PrevAShares'];

  $newSharesPart = $prevSharesPart - $shareqty;

  

  $newAShares = $PrevAShares + $shareqty;

  //GET TransID:
    $prevTransIDRes = mysql_query("SELECT MAX(ID) FROM transactions");
    $prevTransIDRow = mysql_fetch_row($prevTransIDRes);
    $prevTransID = $prevTransIDRow[0];

    $transID = $prevTransID + 1;

  //GET STOCK NAME:
    $stockRes = mysql_query("SELECT Company FROM stockMKT WHERE ID = $stockID");
    $stockRow = mysql_fetch_row($stockRes);
    $stockName = $stockRow[0];

  //GET COMPANY NAME:
    $companyRes = mysql_query("SELECT Name FROM companyAccounts WHERE ID = $compID");
    $companyRow = mysql_fetch_row($companyRes);
    $companyName = $companyRow[0];

  //Transfer

  $transferTo = mysql_query("UPDATE companyAccounts SET `$stockID` = $newSharesPart WHERE ID = $compID");
  $transferFrom = mysql_query("UPDATE stockMKT SET AvailableShares = $newAShares WHERE ID = $stockID");

  //Transaction Queries:

    //All Transactions:

      $transQ = mysql_query("INSERT INTO transactions (ID, Description, Company_Acquiring, Company_Selling, Amount) VALUES (NULL, 'Stock Sale', 'Bank','$companyName', $total)");

    //cTrans:
      if($companyName == "Food1"){
        $cTable = "f1trans";
      }elseif($companyName == "Food2"){
        $cTable = "f2trans";
      }elseif($companyName == "Entertainment1"){
        $cTable = "e1trans";
      }elseif($companyName == "Entertainment2"){
        $cTable = "e2trans";
      }elseif($companyName == "PublicServices1"){
        $cTable = "ps1trans";
      }elseif($companyName == "PublicServices2"){
        $cTable = "ps2trans";
      }elseif($companyName == "Wildcard1"){
        $cTable = "w1trans";
      }elseif($companyName == "Wildcard2"){
        $cTable = "w2trans";
      }

    $transCT = mysql_query("INSERT INTO $cTable (ID, Transaction_ID, Company_Acquiring, Company_Selling, Description, Previous_Balance, New_Balance, Amount) VALUES (NULL, $transID , 'Bank', '$companyName', 'Stock Purchase', $prevBal, $balance, $total)");

  	if($purchase && $transferTo && $transferFrom && $transQ && $transCT){
  		header("location:../bank.php?sale=e1#sStock");
        }
        else
        {
            die (mysql_error());
            header("location:../bank.php?sale=error#sStock");
        }




  ?>