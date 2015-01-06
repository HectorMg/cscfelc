<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once("../../core/settings.php");

	//Get Post Variables:
	$amount = (double)$_POST["amount"];
	$description = $_POST["description"];
	$compFrom = $_POST["companyFrom"];
	$compTo = $_POST["companyTo"];
	$transIDRes = mysql_query("SELECT MAX(ID) FROM  transactions");
	$transIDRow = mysql_fetch_row($transIDRes);
	$prevTransID = $transIDRow[0];

	//Transactions Query:

	$tQuery = mysql_query("INSERT INTO transactions (ID, Description, Company_Acquiring, Company_Selling, Amount) VALUES (NULL, '$description','$compFrom', '$compTo', $amount)");

	//New Transaction ID:
	$newTransID = $prevTransID + 1;

	//Establish Company Paying Table and ID:

	if($compFrom == "Food1"){
		$paying = "f1Trans";
		$payID = 1;
	}elseif($compFrom == "Food2"){
		$paying = "f2Trans";
		$payID = 2;
	}elseif($compFrom == "Entertainment1"){
		$paying = "e1Trans";
		$payID = 3;
	}elseif($compFrom == "Entertainment2"){
		$paying = "e2Trans";
		$payID = 4;
	}elseif($compFrom == "PublicServices1"){
		$paying = "ps1Trans";
		$payID = 5;
	}elseif($compFrom == "PublicServices2"){
		$paying = "ps2Trans";
		$payID = 6;
	}elseif($compFrom == "Wildcard1"){
		$paying = "w1Trans";
		$payID = 7;
	}elseif($compFrom == "Wildcard2"){
		$paying = "w2Trans";
		$payID = 8;
	}

	//Get Company Paying Prev and New Balance:

	$prevBalResPay = mysql_query("SELECT Balance FROM companyAccounts WHERE ID = $payID");
	$prevBalRowPay = mysql_fetch_row($prevBalResPay);
	$prevBalPay = $prevBalRowPay[0];

	$newBalPay = $prevBalPay - $amount;

	//Establish Company Receiving Table:

	if($compTo == "Food1"){
		$receiving = "f1Trans";
		$buyID = 1;
	}elseif($compTo == "Food2"){
		$receiving = "f2Trans";
		$buyID = 2;
	}elseif($compTo == "Entertainment1"){
		$receiving = "e1Trans";
		$buyID = 3;
	}elseif($compTo == "Entertainment2"){
		$receiving = "e2Trans";
		$buyID = 4;
	}elseif($compTo == "PublicS1"){
		$receiving = "ps1Trans";
		$buyID = 5;
	}elseif($compTo == "PublicS2"){
		$receiving = "ps2Trans";
		$buyID = 6;
	}elseif($compTo == "Wildcard1"){
		$receiving = "w1Trans";
		$buyID = 7;
	}elseif($compTo == "Wildcard2"){
		$receiving = "w2Trans";
		$buyID = 8;
	}

	//Get Company Selling Prev and New Balance:

	$prevBalResSell = mysql_query("SELECT Balance FROM companyAccounts WHERE ID = $buyID");
	$prevBalRowSell = mysql_fetch_row($prevBalResSell);
	$prevBalSell = $prevBalRowSell[0];

	$newBalSell = $prevBalSell + $amount;

	$type = Transaction;

	//Insert into Company Acquiring Trans Table:

		$wQueryTT = mysql_query("INSERT INTO $paying (ID, Transaction_ID, Company_Acquiring, Company_Selling, Description, Amount, Previous_Balance, New_Balance, Type) VALUES (NULL, $newTransID, '$compFrom', '$compTo', '$description', $amount, $prevBalPay, $newBalPay, '$type')");
		
		
	//Update Company Acquiring Account:

		$wQueryAT = mysql_query("UPDATE companyAccounts SET Balance = $newBalPay, PreviousBalance = $prevBalPay WHERE ID = $payID");
		
	//Insert into Company Selling Trans Table:

		$dQueryTT = mysql_query("INSERT INTO $receiving (ID, Transaction_ID, Company_Acquiring, Company_Selling, Description, Amount, Previous_Balance, New_Balance, Type) VALUES (NULL, $newTransID, '$compFrom', '$compTo', '$description', $amount, $prevBalSell, $newBalSell, '$type')");
		if($dQueryTT){
			echo "si";
		}else{
			die(mysql_error());
		}
	//Update Company Selling Account:

		$dQueryAT = mysql_query("UPDATE companyAccounts SET Balance = $newBalSell, PreviousBalance = $prevBalSell WHERE ID = $buyID");

if($wQueryTT && $wQueryAT && $dQueryTT && $dQueryAT && $tQuery){
	header("location:../bank.php?ict=e1#ict");
}else{
    die(mysql_error());
    header("location:../bank.php?ict=error#ict");
        }

?>