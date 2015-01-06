<?php
  include_once("../core/settings.php");

session_name("CSCFELC");
session_start();
if(!isset($_SESSION['Username'])){
  header("location:principal.php");
}
function get_username($username) {
  // To protect MySQL injection (more detail about MySQL injection)
  $username = stripslashes($username);
  $username = mysql_real_escape_string($username);
  $sql="SELECT * FROM users WHERE Username='$username'";
  $result=mysql_query($sql);
  $count=mysql_num_rows($result);
  if(!$result){
            die (mysql_error());
            return "ERROR";
        }
  if($count==1){
  return $result['Name'];
  } else {
    return "NONE";
  }
}
?>
<!DOCTYPE html>

<title>FELC - Welcome</title>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="../images/felcfavicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/cover.css" rel="stylesheet">

   
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix" style= "position: fixed">
            <div class="inner">
              <img class="cover-heading" style= "margin-left: -500px" src= "../images/estrella.gif"></img>
              <ul class="nav masthead-nav">
                <li><a href="principal.php" style = "color: #333">Home</a></li>
                <li><a href="logout.php" style = "color: #333">Log Out</a></li>
                <li><a href="signup.php" style = "color: #333">Register</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover" style="margin-top: 250px">
            <!--<h1 class="cover-heading">Cover your page.</h1>-->
            <p style= "font-size: 16px"class="lead">"With a focus on young people in mind and a creative idea that developed years prior, Helms Center President John Dodd founded FELC in 1995 to teach young people about free enterprise and the principles which support it.
            In 2002, the Helms Center partnered with Tecnologico de Monterrey's high school division "Prepa Tec" to take FELC to Mexico. FELC is now a regular part of Prepa Tec's after-school offerings across its five campuses."</p>
            <p class="lead">
              <a href="principal.php" class="btn btn-lg btn-default" style="background-color: #22a3d0;border: 1px solid #22a3d0;">Learn more</a>
            </p>
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com/csc.felc?fref=ts&ref=br_tf" target="_blank"><img src="../images/facebook_icon.gif"></a>
            <a href="https://twitter.com/CSCFELC12" target="_blank"><img src="../images/twitter_icon.gif"></a>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p style= "color: #333">Powered by Testigos de Javá<style= "color: #333"></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/docs.min.js"></script>
  </body>
</html>