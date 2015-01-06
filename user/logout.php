<?php
ob_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_name("CSCFELC");
session_start();
session_destroy();
header("location:signin.php");

ob_end_flush();
echo "//Loging out of your account
// If this takes too long Refresh the page.";
?>