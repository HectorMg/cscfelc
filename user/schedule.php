<?php
include_once("../core/settings.php");
session_name("CSCFELC");
session_start();
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
    <link rel="shortcut icon" href="../images/felcfavicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="../Bootstrap/css/carousel.css" rel="stylesheet">

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
              <a href="principal.php"><img class="navbar-brand" src="../images/corner_logo.gif"; style="padding: 1px, 1px;"></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="principal.php">Home</a></li>
                <li><a href="company.php">Companies</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="manual.php">Manual</a></li>
                <?php
                //DropDown or Not:
                  $ID = $_SESSION['userid'];
                  $accTypeQ = mysql_query("SELECT Account_Type FROM users WHERE ID = '$ID'");
                  $accTypeR = mysql_fetch_array($accTypeQ);
                  

                   if ($accTypeR[0] != "1" && $accTypeR[0] != "2") {?>

                    <li><a href="../staff/bank.php">The Bank</a></li><?php
                   }else{?>
                    <li class="dropdown">
                      <a href="../staff/bank.php" class="dropdown-toggle" data-toggle="dropdown">The Bank <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="../staff/bank.php">Bank</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Corporate Accounts</li>
                        <li><a href="../staff/bankF1.php">Food 1</a></li>
                        <li><a href="../staff/bankF2.php">Food 2</a></li>
                        <li><a href="../staff/bankE1.php">Entertainment 1</a></li>
                        <li><a href="../staff/bankE2.php">Entertainment 2</a></li>
                        <li><a href="../staff/bankPS1.php">Public Services 1</a></li>
                        <li><a href="../staff/bankPS2.php">Public Services 2</a></li>
                        <li><a href="../staff/bankW1.php">Wildcard 1</a></li>
                        <li><a href="../staff/bankW2.php">Wildcard 2</a></li>
                      </ul>
                    </li><?php
                   }
                ?>
                <li style="margin-left: 350px"><a href="../staff/bank.php">
                    
                    <?php
                    //Echo Name and Lastname Next to Logout
                    
                    $ID = $_SESSION['userid'];
                    $getNameRes = mysql_query("SELECT Name FROM u404044402_bank . users WHERE ID = $ID");
                    $getNameRow = mysql_fetch_row($getNameRes);
                    $name = $getNameRow[0];

                    $getLastNameRes = mysql_query("SELECT Lastname FROM u404044402_bank . users WHERE ID = $ID");
                    $getLastNameRow = mysql_fetch_row($getLastNameRes);
                    $lastName = $getLastNameRow[0];

                    echo $name . " " . $lastName;

                    ?>

                  </a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    

    

<div class="container">
  <img src="../images/schedule.png">
      
      <hr>

      <footer>
        <p>&copy;Copyright CSC FELC 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
