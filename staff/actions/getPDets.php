<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../../core/settings.php");
  session_name(CSCFELC);
  session_start();

  //Post Property ID:

  $propertyID = $_POST['property'];


  //Query Details:

  	//Get Name:
  		$pNameRes = mysql_query("SELECT Name FROM properties WHERE ID = $propertyID");
  		$pNameRow = mysql_fetch_row($pNameRes);
  		$pName = $pNameRow[0];
  	//Get Owner:
  		$ownerRes = mysql_query("SELECT Owner FROM properties WHERE ID = $propertyID");
  		$ownerRow = mysql_fetch_row($ownerRes);
  		$owner = $ownerRow[0];
  	//Get Bought During:
  		$bDRes = mysql_query("SELECT `SoldBy` FROM properties WHERE ID = $propertyID");
  		$bDRow = mysql_fetch_row($bDRes);
  		$bD = $bDRow[0];
  	//GET Original Value:
  		$oValRes = mysql_query("SELECT Starting_Price FROM properties WHERE ID = $propertyID");
  		$oValRow = mysql_fetch_row($oValRes);
  		$oVal = $oValRow[0];
  	//Get Last Sale Value:
  		$lSVRes = mysql_query("SELECT Sold_At FROM properties WHERE ID = $propertyID");
  		$lSVRow = mysql_fetch_row($lSVRes);
  		$lSV = $lSVRow[0];

  	//Establish Session Variables:

  		//ID:
  		$_SESSION['pID'] = $propertyID;

  		//Name:
  		$_SESSION['pName'] = $pName;

  		//Owner:
  		$_SESSION['pOwner'] = $owner;

  		//BD:
  		$_SESSION['BD'] = $bD;

  		//OV:
  		$_SESSION['OV'] = $oVal;

  		//LSV:
  		$_SESSION['LSV'] = $lSV;

  		
  			header("location:../bank.php?pd=e1#propTrans");
  		


?>