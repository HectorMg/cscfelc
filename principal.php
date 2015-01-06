<?php
session_name("CSCFELC");
session_start();
if(isset($_SESSION['Username'])){
  header("location:user/principal.php");
}
?>
<!DOCTYPE html>
<title>FELC - Home</title>
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

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1//style.css" media="screen" />
	<script type="text/javascript" src="engine1//jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

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

    

    <!-- Main jumbotron for a primary marketing message or call to action 

    

<!-- Start WOWSlider.com BODY section id=wowslider-container1 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/mesa.jpg" alt="Welcome to FELC" title="Welcome to FELC" id="wows1_0"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="data1/images/mesa.jpg" title="Welcome to FELC"><img src="data1/tooltips/mesa.jpg" alt="Welcome to FELC"/>1</a>
<a href="data1/images/1798111_438635002905884_187424567_n.jpg" title="FELC Prepas 2013">2</a>
<a href="data1/images/1888535_438634919572559_1164023052_n.jpg" title="FELC Prepas 2014">3</a>
<a href="data1/images/1922014_438638116238906_1571165649_n.jpg" title="FELC Prepas 2014">4</a>
</div></div><span class="wsl"><a href="http://wowslider.com/vw">wordpress slider plugin</a> by WOWSlider.com v6.1m</span>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1//wowslider.js"></script>
	<script type="text/javascript" src="engine1//script.js"></script>
<!-- End WOWSlider.com BODY section -->

<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          



<h2>Conception</h2>
          <p>With a focus on young people in mind and a creative idea that developed years prior, Helms Center President John Dodd founded FELC in 1995 to teach young people about free enterprise and the principles which support it. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
       <div class="col-md-4">
          <h2>Prepa Tec and FELC</h2>
          <p>In 2002, the Helms Center partnered with Tecnologico de Monterrey's high school division "Prepa Tec" to take FELC to Mexico. FELC is now a regular part of Prepa Tec's after-school offerings across its five campuses. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Goal</h2>
          <p>The goal of FELC is to educate students about entrepreneurship, the differences between capitalism and socialism, free market economics, personal responsibility, principled leadership and corporate/personal philanthropy.  Activities and lessons are designed for students to create meaningful practical application.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>
      <h1>Sponsors</h1>
      
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Sanissima:</h2>
          <p class="lead" style= "font-size: 14px"><a class="btn btn-default" href="http://www.sanissima.com.mx" target="_blank" role="button">Visit Website &raquo;</a></p>
        </div>
        <div class="col-md-5">
          <a name="Food"></a> 
          <img class="featurette-image img-responsive" style= "max-width: 729px; margin-top: 75px" src="images/sanissima.jpg" alt="Sanissima">  
        </div>
      </div>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">H-E-B:</h2>
          <p class="lead" style= "font-size: 14px"><a class="btn btn-default" href="http://www.hebmexico.com" target="_blank" role="button">Visit Website &raquo;</a></p>
        </div>
        <div class="col-md-5">
          <a name="Food"></a> 
          <img class="featurette-image img-responsive" style= "max-width: 729px; margin-top: 75px" src="images/HEB.jpg" alt="HEB">  
        </div>
      </div>
          <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">NOVALIV:</h2>
          <p class="lead" style= "font-size: 14px"><a class="btn btn-default" href="http://www.novaliv.mx/" target="_blank" role="button">Visit Website &raquo;</a></p>
        </div>
        <div class="col-md-5">
          <a name="Food"></a> 
          <img class="featurette-image img-responsive" style= "max-width: 729px; margin-top: 75px" src="images/novaliv.png" alt="HEB">  
        </div>
      </div>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Habitat Boutique Inmobiliaria:</h2>
          <p class="lead" style= "font-size: 14px"><a class="btn btn-default" href="http://www.habitatbi.mx/" target="_blank" role="button">Visit Website &raquo;</a></p>
        </div>
        <div class="col-md-5">
          <a name="Food"></a> 
          <img class="featurette-image img-responsive" style= "max-width: 729px; margin-top: 75px" src="images/habitat.jpg" alt="HEB">  
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
