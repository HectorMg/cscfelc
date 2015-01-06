<?php

  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");
  session_name(CSCFELC);
  session_start();

  //Post Variables:
  	//Buyer:
  		$buyer = $_POST['buyer'];
  	//Bought During:
  		$bDuring = $_POST['BoughtD'];
  	//Amount:
  		$amount = $_POST['amount'];

  //Other Vars:
  		//Property ID:
  			$propertyID = $_SESSION['pID'];
  		//Seller
  			$seller = $_SESSION['pOwner'];
  		//GET TransID:
		    $prevTransIDRes = mysql_query("SELECT MAX(ID) FROM transactions");
		    $prevTransIDRow = mysql_fetch_row($prevTransIDRes);
		    $prevTransID = $prevTransIDRow[0];

		    $transID = $prevTransID + 1;
		//GET Buyer PV:
		    $resultPrevBalBuy = mysql_query("SELECT Balance FROM companyAccounts WHERE Name = '$buyer'");
			$rowPrevBalBuy = mysql_fetch_row($resultPrevBalBuy);
			$prevBalBuy = $rowPrevBalBuy[0];

			$balanceBuy = $prevBalBuy - $amount;

		if($seller != 'Bank'){
			//GET Seller PV:
			$resultPrevBalSell = mysql_query("SELECT Balance FROM companyAccounts WHERE Name = '$seller'");
			$rowPrevBalSell = mysql_fetch_row($resultPrevBalSell);
			$prevBalSell = $rowPrevBalSell[0];

			$balanceSell = $prevBalSell + $amount;
		}

  //Transactions:

  		//Transactions Query:
  			$transQ = mysql_query("INSERT INTO transactions (ID, Description, Company_Acquiring, Company_Selling, Amount) VALUES (NULL, 'Property Purchase', '$buyer', '$seller', $amount)");

  		//Transfer Query:
  			$transfer = mysql_query("UPDATE properties SET PreviousOwner = '$seller', Owner = '$buyer', Sold_At = '$amount', `SoldBy` = '$bDuring' WHERE ID = $propertyID");
  		
  		//BuyerTrans Query:
	  		if($buyer == "Food1"){
	        $cTableB = "f1Trans";
	      }elseif($buyer == "Food2"){
	        $cTableB = "f2Trans";
	      }elseif($buyer == "Entertainment1"){
	        $cTableB = "e1Trans";
	      }elseif($buyer == "Entertainment2"){
	        $cTableB = "e2Trans";
	      }elseif($buyer == "PublicServices1"){
	        $cTableB = "ps1Trans";
	      }elseif($buyer == "PublicServices2"){
	        $cTableB = "ps2Trans";
	      }elseif($buyer == "Wildcard1"){
	        $cTableB = "w1Trans";
	      }elseif($buyer == "Wildcard2"){
	        $cTableB = "w2Trans";
	      }

	    $transCTB = mysql_query("INSERT INTO $cTableB (ID, Transaction_ID, Company_Acquiring, Company_Selling, Description, Previous_Balance, New_Balance, Amount) VALUES (NULL, $transID , '$buyer', '$seller', 'Property Purchase', $prevBalBuy, $balanceBuy, $amount)");

    	//Seller
    		if($seller != "Bank"){
    			if($seller == "Food1"){
	        $cTableS = "f1Trans";
	      }elseif($seller == "Food2"){
	        $cTableS = "f2Trans";
	      }elseif($seller == "Entertainment1"){
	        $cTableS = "e1Trans";
	      }elseif($seller == "Entertainment2"){
	        $cTableS = "e2Trans";
	      }elseif($seller == "PublicServices1"){
	        $cTableS = "ps1Trans";
	      }elseif($seller == "PublicServices2"){
	        $cTableS = "ps2Trans";
	      }elseif($seller == "Wildcard1"){
	        $cTableS = "w1Trans";
	      }elseif($seller == "Wildcard2"){
	        $cTableS = "w2Trans";
	      }

	      $transCTS = mysql_query("INSERT INTO $cTableS (ID, Transaction_ID, Company_Acquiring, Company_Selling, Description, Previous_Balance, New_Balance, Amount) VALUES (NULL, $transID , '$buyer', '$seller', 'Property Purchase', $prevBalSell, $balanceSell, $amount)");
    		}

    		if($transQ && $transfer && $transCTB){
    			header("location:../bank.php?propsale=e1#propTrans");
    		}else{
    			die (mysql_error());
            	header("location:../bank.php?propsale=error#propTrans");
    		}

?>