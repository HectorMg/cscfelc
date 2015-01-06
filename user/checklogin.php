<?php
ob_start();
include_once("../core/settings.php");

// username and password sent from form 
$myusername=$_POST['Username']; 
$mypassword=$_POST['Password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$encypt_password=md5($mypassword);
$sql="SELECT * FROM users WHERE Username='$myusername' and Password='$encypt_password'";
$result=mysql_query($sql);
$rowResult = mysql_fetch_row($result);
$userid = $rowResult[0];
$userrole = $rowResult[5];

if($result){
		echo "Success";
        }
        else
        {
            die (mysql_error());
        }
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//Start your session
session_name("CSCFELC");
session_start();
//Session variables:
$_SESSION['Username'] = $myusername;
$_SESSION['userid'] = $userid;
$_SESSION['role'] = $userrole;

header("location:principal.php");
}
else {
    echo "Wrong Username or Password";
    header("location:user/signin.php?login=fail");
}
ob_end_flush();
?>