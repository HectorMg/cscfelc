<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include_once("../core/settings.php");

session_name("CSCFELC");
session_start();
if(isset($_SESSION['Username'])){
header("location:../user");
}
$username=$_POST["Username"];
$password=$_POST["Password"];
$password=md5($password);
$email=$_POST["Email"];

$query=mysql_query("SELECT * from users where Username='$username'");
$find=mysql_num_rows($query);
if($find==0){
    $query = mysql_query("INSERT INTO users (Username, Password, Email) VALUES ('$username', '$password', '$email')");
    if($query){
            header("location:signin.php?login=e1");
        }
        else
        {
            die (mysql_error());
            header("location:signup.php?login=error");
        }
}
else {
    header("location:signup.php?login=error");
}
?>