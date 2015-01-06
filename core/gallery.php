<?php
//*** Created By: Jose Antonio Torres <thetonio96@gmail.com>
//*** www.mislibros.com

//***  "die()" will exit the script and show an error if something goes wrong with the "connect" or "select" functions. 
//***  A "mysql_connect()" error usually means your connection specific details are wrong 
//***  A "mysql_select_db()" error usually means the database does not exist.

$setting_test="Success";


// Place db host name. Usually is "localhost" but sometimes a more direct string is needed
$db_host = "localhost";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = "504307";
// Place the name for the MySQL database here
$db_name = "cscfelc";

mysql_connect("$db_host","$db_username","$db_pass") or die(mysql_error());
mysql_select_db("$db_name") or die("ERROR: No se encontro base de datos.");
?>