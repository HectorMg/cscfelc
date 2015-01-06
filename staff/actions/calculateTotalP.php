<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");
  session_name(CSCFELC);
  session_start();

//Calcular Total

$compID = $_POST["company"];
$_SESSION["compID"] = $compID;
$shareQty = $_POST["qty"];
$_SESSION['qty'] = $shareQty;
$stock = $_POST["stock"];
$_SESSION["stockID"] = $stock;
$resultCSV = mysql_query("SELECT CurrentShareValue FROM stockMKT WHERE ID = $stock");
$CSVrow = mysql_fetch_row($resultCSV);
$CSV = $CSVrow[0];
$_SESSION['CSV'] = $CSV;
$valorTotal = $CSV * $shareQty;
$_SESSION['total'] = $valorTotal;


//Balance

$balanceResult = mysql_query("SELECT Balance from companyAccounts WHERE ID = $compID");
$balanceRow = mysql_fetch_row($balanceResult);
$balance = $balanceRow[0];
$_SESSION['CurrentBalance'] = $balance;
$_SESSION['BalanceAP'] = $balance - $valorTotal;
$_SESSION['BalanceAS'] = $balance + $valorTotal;

if($balance < $valorTotal){
  header("location:../bank.php?valor=ua1#bStock");
}else{

  //Availability

$PrevASharesRes = mysql_query("SELECT AvailableShares FROM stockMKT WHERE ID = $stock");
$PrevASharesRow = mysql_fetch_row($PrevASharesRes);
$PrevAShares = $PrevASharesRow[0];
$_SESSION['PrevAShares'] = $PrevAShares;

  if($PrevAShares < $shareQty){
    header("location:../bank.php?valor=ua2#bStock");
  }else{

    

if($valorTotal){

            header("location:../bank.php?valor=e1#bStock");
        }
        else
        {
            die (mysql_error());
            header("location:../bank.php?valor=error#bStock");
        }


  }


}

?>