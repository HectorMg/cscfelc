<?php

  include_once("../core/settings.php");
  session_name(CSCFELC);
  session_start();
?>
<!DOCTYPE html>
 <title>FELC - Companies</title>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="../images/felcfavicon.ico"

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
 <div class="navbar-wrapper">
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


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <div class="container">
              <img src="../images/company/food_banner.jpg" style="margin-left: -65px; margin-top: 50px">
            <div class="carousel-caption">
              <h1>Food</h1>
              <p>Check out for the Staff that will be guiding and helping your team these days!.</p>
              <p><a class="btn btn-lg btn-primary" href="#Food" role="button">Food Companies</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          
          <div class="container">
              <img src="../images/company/entertainment_banner.jpg" style="margin-left: -65px; margin-top: 50px">
            <div class="carousel-caption">
              <h1>Entertainment</h1>
              <p>Check out for the Staff that will be guiding and helping your team these days!</p>
              <p><a class="btn btn-lg btn-primary" href="#Entertainment" role="button">Entertainment Companies</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          
          <div class="container">
              <img src="../images/company/publicservices_banner.jpg" style="margin-left: -65px; margin-top: 50px">
            <div class="carousel-caption">
              <h1>Public Services</h1>
              <p>Check out for the Staff that will be guiding and helping your team these days!</p>
              <p><a class="btn btn-lg btn-primary" href="#PublicServices" role="button">Public Services Companies</a></p>
            </div>
          </div>
        </div>
          <div class="item">
         
          <div class="container">
             <img src="../images/company/wildcard_banner.jpg" style="margin-left: -65px; margin-top: 50px">
            <div class="carousel-caption">
              <h1>Wildcard</h1>
              <p>Check out for the Staff that will be guiding and helping your team these days!</p>
              <p><a class="btn btn-lg btn-primary" href="#Wildcard" role="button">Wildcard Companies</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Four columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4" style="max-width: 300px">
          <img class="img-circle" src="../images/company/food.jpg" alt="Food Company Image" style="max-width: 150px">
          <h2>Food</h2>
          <p>Food Companies will be in charge of selling food inside Prepa Tec Campus Santa Catarina. They’ll be competing against each other to earn the highest profit possible and negotiate with other companies to reach sales agreements for permission to sell during their events or in their territories.</p>
          <p><a class="btn btn-default" href="#Food" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4" style="max-width: 300px">
          <img class="img-circle" src="../images/company/entertainment.jpg" alt="Entertainment Company Image" style="max-width: 150px">
          <h2>Entertainment</h2>
          <p>Entertainment companies will have to mobilize their resources in order to organize events related with entertaining people. These companies have a wide range of options to choose from during the course of the congress; however, all events must be submitted to ITESM authorization and held inside the Prepa Tec.</p>
          <p><a class="btn btn-default" href="#Entertainment" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4" style="max-width: 300px">
          <img class="img-circle" src="../images/company/publicservices.jpg" alt="Generic placeholder image" style="max-width: 150px">
          <h2>Public Services</h2>
          <p>These companies have two main missions: supplying the necessary infrastructure for the functioning of the other companies and providing them with various services. They will take care of distributing and renting spaces, as well as raw material, while also providing different services the other companies may require. </p>
          <p><a class="btn btn-default" href="#PublicServices" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4" style="max-width: 300px">
          <img class="img-circle" src="../images/company/wildcard.jpg" alt="Generic placeholder image" style="max-width: 150px">
          <h2>Wildcard</h2>
          <p>These companies will have the advantage of being able to choose from either Food, or Entertainment company status, and then abide by the rules that apply. There will be two Wildcard companies and each will have to choose a different area in which to create their company. </p>
          <p><a class="btn btn-default" href="#Wildcard" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading">Food One: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: 1204</p>
          <p class="lead" style= "font-size: 14px; margin-right: 240px;"> Food Companies will be in charge of selling food inside Prepa Tec Campus Santa Catarina. They’ll be competing against each other to earn the highest profit possible and negotiate with other companies to reach sales agreements for permission to sell during their events or in their territories.These companies are not allowed to sell outside the Campus, and they are not allowed to directly acquire sponsorships; however, they may negotiate with the Entertainment Companies to profit from sponsors acquired by them.  No alcoholic or energizing beverages may be sold, nor cigarettes or tobacco of any kind.  All sales must be submitted to ITESM authorization. </p>
        </div>
        <div class="col-md-5">
          <a name="Food"></a> 
          <img class="featurette-image img-responsive" style= "max-width: 729px; margin-left: -240px"src="../images/company/staffpics/C1.jpg" alt="Generic placeholder image">  
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5" style= "margin-left: -40px">
          <img class="featurette-image img-responsive" style ="max-width:729px" src="../images/company/staffpics/C2.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7" style= "margin-left: 40px; margin-top: -100px">
          <h2 class="featurette-heading">Food Two: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: 1205</p>
          <p class="lead" style= "font-size: 14px"> Food Companies will be in charge of selling food inside Prepa Tec Campus Santa Catarina. They’ll be competing against each other to earn the highest profit possible and negotiate with other companies to reach sales agreements for permission to sell during their events or in their territories.These companies are not allowed to sell outside the Campus, and they are not allowed to directly acquire sponsorships; however, they may negotiate with the Entertainment Companies to profit from sponsors acquired by them.  No alcoholic or energizing beverages may be sold, nor cigarettes or tobacco of any kind.  All sales must be submitted to ITESM authorization. </p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" style="margin-top: -100px;">
          <h2 class="featurette-heading">Entertainment One: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: ####</p>
          <p class="lead" style= "font-size: 14px">     Entertainment companies will have to mobilize their resources in order to organize events related with entertaining people. These companies have a wide range of options to choose from during the course of the congress; however, all events must be submitted to ITESM authorization and held inside Prepa Tec Campus Santa Catarina and must negotiate with Public Services companies regarding specific needed material. It is important that they negotiate with all the other companies in order to have well prepared events and to provide adequate services for their customers. It is also important to remember that entertainment companies may NOT provide services that are already being provided by other companies (ex. selling food in their events) but may acquire sponsorships, which they can then sell to the companies which provide those services (ex. Acquiring sponsored food products which they can sell to a food company). They can also create alliances with Food companies in order to sell food products during their events. .</p>
        </div>
        <div class="col-md-5">
        <a name="Entertainment"></a> 
        <img class="featurette-image img-responsive" src="../images/company/staffpics/C3.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5" >
          <img class="featurette-image img-responsive" src="../images/company/staffpics/C4.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading">Entertainment Two: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: ####</p>
          <p class="lead" style= "font-size: 14px"> Entertainment companies will have to mobilize their resources in order to organize events related with entertaining people. These companies have a wide range of options to choose from during the course of the congress; however, all events must be submitted to ITESM authorization and held inside Prepa Tec Campus Santa Catarina and must negotiate with Public Services companies regarding specific needed material. It is important that they negotiate with all the other companies in order to have well prepared events and to provide adequate services for their customers. It is also important to remember that entertainment companies may NOT provide services that are already being provided by other companies (ex. selling food in their events) but may acquire sponsorships, which they can then sell to the companies which provide those services (ex. Acquiring sponsored food products which they can sell to a food company). They can also create alliances with Food companies in order to sell food products during their events. .</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading">Public Services One: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: ####</p>
          <p class="lead" style= "font-size: 14px"> These companies have two main missions: supplying the necessary infrastructure for the functioning of the other companies and providing them with various services. They will take care of distributing and renting spaces, as well as raw material, while also providing different services the other companies may require. Services and raw materials may include: electricity, publicity, tables, chairs, electric extensions, cleaning and/or any equipment needed, like TV’s and stereos. The other companies will not be allowed to function without the services of either one of the Public Services companies. Public Services will also be allowed to provide publicity for external companies of the Prepa TEC Campus Santa Catarina. All publicity from an external company must be presented to the bank with detail before placing any in the campus and must comply with ITESM rules and regulations.</p>
        </div>
        <div class="col-md-5">
        <a name="PublicServices"></a> 
        <img class="featurette-image img-responsive" src="../images/company/staffpics/C5.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="../images/company/staffpics/C6.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading">Public Services Two: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: ####</p>
          <p class="lead" style= "font-size: 14px"> These companies have two main missions: supplying the necessary infrastructure for the functioning of the other companies and providing them with various services. They will take care of distributing and renting spaces, as well as raw material, while also providing different services the other companies may require. Services and raw materials may include: electricity, publicity, tables, chairs, electric extensions, cleaning and/or any equipment needed, like TV’s and stereos. The other companies will not be allowed to function without the services of either one of the Public Services companies. Public Services will also be allowed to provide publicity for external companies of the Prepa TEC Campus Santa Catarina. All publicity from an external company must be presented to the bank with detail before placing any in the campus and must comply with ITESM rules and regulations</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading">Wildcard One: <span class="text-muted">Staff</span></h2>
          <p class="lead">HQ: ####</p>
          <p class="lead" style= "font-size: 14px"> These companies will have the advantage of being able to choose from either Food, or Entertainment company status, and then abide by the rules that apply. There will be two Wildcard companies and each will have to choose a different area in which to create their company. In case that both Wildcard teams want the same type of company, an audit with the FELC Student Board and their company staff will take place (Company Designation), in which they will both explain the reasons they want that particular type of company. The Student Board and company staff will determine the distribution of companies between both Wildcard teams depending on the outcome of the audit. </p>
        </div>
        <div class="col-md-5">
        <a name="Wildcard"></a> 
        <img class="featurette-image img-responsive" src="../images/company/staffpics/C7.jpg" alt="Generic placeholder image">
        </div>
      </div>

 <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" style="max-width: 729px;" src="../images/company/staffpics/C8.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7" style="margin-top: -100px">
          <h2 class="featurette-heading" style="margin-left: 240px;">Wildcard Two: <span class="text-muted">Staff</span></h2>
          <p class="lead" style="margin-left: 240px;">HQ: ####</p>
          <p class="lead" style= "font-size: 14px; margin-left: 240px;"> These companies will have the advantage of being able to choose from either Food, or Entertainment company status, and then abide by the rules that apply. There will be two Wildcard companies and each will have to choose a different area in which to create their company. In case that both Wildcard teams want the same type of company, an audit with the FELC Student Board and their company staff will take place (Company Designation), in which they will both explain the reasons they want that particular type of company. The Student Board and company staff will determine the distribution of companies between both Wildcard teams depending on the outcome of the audit. </p>
        </div>
      </div>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 FELC Prepa Tec Campus Santa Catarina. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/docs.min.js"></script>
  </body>
</html>