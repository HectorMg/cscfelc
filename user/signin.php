<?php
session_name("CSCFELC");
session_start();
if(isset($_SESSION['Username'])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/felcfavicon.ico">

    <title>FELC - Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/signin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

        <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <img class="cover-heading" style= "margin-left: -500px" src= "../images/estrella.gif"></img>
              <ul class="nav masthead-nav">
                <li><a href="../principal.php" style = "color: #333">Home</a></li>
                <li><a href="#" style = "color: #333">Contact</a></li>
                <li><a href="signup.php" style = "color: #333">Register</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover" style="margin-top: 250px">
            <!--<h1 class="cover-heading">Cover your page.</h1>-->
           <div class="container" style="margin-left: -250px">

            <form class="form-signin" action="checklogin.php" method="post" name="form_signin">
              

              <!-- Si hay error de login -->

              <?php

              if(isset($_GET['login']))
                if($_GET['login'] == "fail"){ ?>
                  <div class="alert alert-danger"><p>Login Fail</p></div>
         <?php } elseif($_GET['login'] == "e1"){ ?>
                  <div class="alert alert-success"><p>Registration successful, now please log in.</p></div>
            <?php }
              ?>

              <h2 class="form-signin-heading">Please Sign In </h2>
              <input type="text" class="form-control" placeholder="Username" name='Username'required autofocus>
              <input type="password" class="form-control" placeholder="Password" name='Password' required>
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
              </label>
              <button class="btn btn-lg btn-primary btn-block" style="background-color: #22a3d0 " type="submit" value= "Login" name="login">Sign in</button>
            <a href="https://www.facebook.com/csc.felc?fref=ts&ref=br_tf" target="_blank"><img src="../images/facebook_icon.gif"></a>
            <a href="https://twitter.com/CSCFELC12" target="_blank"><img src="../images/twitter_icon.gif"></a>
            </form>

          </div> <!-- /container -->
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p style= "color: #333">© Copyright CSC FELC 2014<style= "color: #333"></p>
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