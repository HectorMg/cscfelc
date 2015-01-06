<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include_once("../core/settings.php");
	session_name("CSCFELC");
	session_start();
	$userID = $_SESSION['userid'];
	echo $userid;
	$accTypeQ = mysql_query("SELECT Account_Type FROM users WHERE ID = '$userID'");
	$accTypeR = mysql_fetch_array($accTypeQ);
	

   if ($accTypeR[0] != "1" && $accTypeR[0] != "2") {
    header("location:../user/bank.php");

}
?>