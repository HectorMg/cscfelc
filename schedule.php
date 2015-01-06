<?php
session_name("CSCFELC");
session_start();
if(isset($_SESSION['Username'])){
  header("location:user/schedule.php");
}
?>
<!DOCTYPE html>
<title>FELC - Schedule</title>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/felcfavicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="Bootstrap/css/carousel.css" rel="stylesheet">

</head>
<body role="document">
  <div style="z-index: 1000;" class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="principal.php"><img class="navbar-brand" src="images/corner_logo.gif"; style="padding: 1px, 1px;"></a>
            </div>
            <div class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" action="user/checklogin.php" method="post" name="form_signin">
                  
                  <!-- Si hay error de login -->
                  <?php 

                    if(isset($_GET['login']))
                      if ($_GET['login']=="fail") { ?>
                      <div class="alert alert-danger"><p>Login Fail</p></div>
                      <?php } elseif ($_GET['login']=="e1") { ?>
                      <div class="alert alert-success"><p>Registro Exitoso, ahora haz login :)</p></div>
                      <?php } ?>

                <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control" name="Username">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="Password">
                </div>
                <button type="submit" class="btn btn-success" style="background-color: #22a3d0;border: 1px solid #22a3d0;">Sign in</button>
            </form>
              <ul class="nav navbar-nav">
                <li><a href="principal.php">Home</a></li>
                <li><a href="company.php">Companies</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="manual.php">Manual</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    

    

<div class="container">
  <img src="images/schedule.png">
      
      <hr>

      <footer>
        <p>&copy;Copyright CSC FELC 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
