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
$stockID = $_POST["stock"];
$_SESSION["stockID"] = $stockID;
$resultCSV = mysql_query("SELECT CurrentShareValue FROM stockMKT WHERE ID = $stockID");
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

//Owned Stocks

$PrevOSharesRes = mysql_query("SELECT `$stockID` FROM companyAccounts WHERE ID = $compID");
$PrevOSharesRow = mysql_fetch_row($PrevOSharesRes);
$PrevOShares = $PrevOSharesRow[0];

  if($PrevOShares < $shareQty){
    header("location:../bank.php?vdv=ua#sStock");
  }else{

  if($valorTotal){

              header("location:../bank.php?vdv=e1#sStock");
          }
          else
          {
              die (mysql_error());
              header("location:../bank.php?vdv=error#sStock");
          }


    }

?>