<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include("../core/settings.php");
  session_name(CSCFELC);
  session_start();
?>


<!DOCTYPE html>
<title>FELC - The Bank: Entertainment 2</title>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/felcfavicon.ico"

    <title>The Bank</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/dashboard.css" rel="stylesheet">


  </head>

  <body>

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
                <li><a href="../principal.php">Home</a></li>
                <li><a href="../company.php">Companies</a></li>
                <li><a href="../schedule.php">Schedule</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">The Bank <b class="caret"></b></a>
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
                    </li>
                <li style="margin-left: 400px"><a href="../staff/bank.php">
                    
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
                <li><a href="../user/logout.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#Transactions">Transaction History</a></li>
            <li><a href="#OwnedStock">Company Owned Stock</a></li>
            <li><a href="#bTrans">Make a Transaction</a></li>
            <li><a href="#OwnedProp">Company Owned Property</a></li>
            <li><a href="#sInfo">Stock Market Information</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <a name="Transactions"></a>
          <h1 class="page-header">The Bank: <span class="text-muted">Entertainment 2 Corporate Account</span></h1>
         
      <!--Company Tabs-->

          <div id="Transactions" class="">
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-default" href="bank.php">Bank</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-primary" href="bankF1.php">Food 1</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-primary" href="bankF2.php">Food 2</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-success" href="bankE1.php">Entertainment 1</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-success" href="bankE2.php">Entertainment 2</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-warning" href="bankPS1.php">P. Services 1</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-warning" href="bankPS2.php">P. Services 2</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-danger" href="bankW1.php">Wildcard 1</a>
            <a style="font-size: 14px" type="button" class="btn btn-lg btn-danger" href="bankW2.php">Wildcard 2</a>
          </div>

      <!--Transactions-->

              <h2><class="sub-header">Transactions:</h2>
              <div style="height: 200px; overflow: scroll;" class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Transaction No.</th>
                      <th>Description</th>
                      <th>Withdrawn From</th>
                      <th>Deposited Into</th>
                      <th>Amount Transfered</th>
                      <th>Previous Account Balance</th>
                      <th>New Account Balance</th>
                    </tr>
                  </thead>
                      <tbody id="OwnedStock">
                      <?php

                      $countRow = mysql_query("SELECT * FROM u404044402_bank . e2Trans");
                      $count = mysql_num_rows($countRow);

                      for($i = $count; $i >= 1; $i--){

                        //GET Trans. ID:
                        $getTransIDRes = mysql_query("SELECT Transaction_ID FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getTransIDRow = mysql_fetch_row($getTransIDRes);
                        $TransID = $getTransIDRow[0];
                        //GET DESCRIPTION:
                        $getDescRes = mysql_query("SELECT Description FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getDescRow = mysql_fetch_row($getDescRes);
                        $Desc = $getDescRow[0];
                        //GET WITHDRAWN FROM
                        $getWithdrawnRes = mysql_query("SELECT Company_Acquiring FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getWithdrawnRow = mysql_fetch_row($getWithdrawnRes);
                        $withdrawn = $getWithdrawnRow[0];
                        //GET DEPOSIT INTO
                        $getDepositRes = mysql_query("SELECT Company_Selling FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getDepositRow = mysql_fetch_row($getDepositRes);
                        $deposit = $getDepositRow[0];
                        //GET AMOUNT
                        $getAmountRes = mysql_query("SELECT Amount FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getAmountRow = mysql_fetch_row($getAmountRes);
                        $amount = $getAmountRow[0];
                        //GET PREV ACC BAL
                        $getPrevBalRes = mysql_query("SELECT Previous_Balance FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getPrevBalRow = mysql_fetch_row($getPrevBalRes);
                        $PrevBal = $getPrevBalRow[0];
                        //GET NEW ACC BAL
                        $getBalRes = mysql_query("SELECT New_Balance FROM u404044402_bank . e2Trans WHERE ID = $i");
                        $getBalRow = mysql_fetch_row($getBalRes);
                        $Bal = $getBalRow[0];
                      
                        ?>
                      <tr>
                      <td align="center"><?php echo $TransID; ?></td>
                      <td align="center"><?php echo $Desc; ?></td>
                      <td align="center"><?php echo $withdrawn; ?></td>
                      <td align="center"><?php echo $deposit; ?></td>
                      <td align="center"><?php echo "$" . number_format($amount, 2); ?></td>
                      <td align="center"><?php echo "$" . number_format($PrevBal, 2); ?></td>
                      <td align="center"><?php echo "$" . number_format($Bal, 2); }?></td>
                      
                    </tr>
                      </tbody>
                </table>
                </div>
      <!--Shares Table-->

              <h2><class="sub-header">Shares:</h2>
              <a name="Stocks"></a>
              <div style="height: 200px; overflow: scroll;" class="table-responsive">
                <table class="table table-striped">
                  <thead id="bTrans">
                    <tr>
                      <th>Company Name:</th>
                      <th>CEMEX</th>
                      <th>WALMEX</th>
                      <th>VITRO</th>
                      <th>BACHOCO</th>
                      <th>BBVA</th>
                      <th>ALFA</th>
                      <th>AEROMEX</th>
                      <th>AMX</th>
                    </tr>
                  </thead>
                    <tbody>
                      <tr>
                        <td>Entertainment 2</td>
                        <?php

                        for($i = 1; $i <= 8; $i++){

                          //GET Si:
                          $getsharesRes = mysql_query("SELECT `$i` FROM u404044402_bank . companyAccounts WHERE ID = 4");
                          $getsharesRow = mysql_fetch_row($getsharesRes);
                          $shares = $getsharesRow[0];              
                          ?>
                        <td align="center"><?php echo $shares; ?></td><?php }?>
                      </tr>
                    </tbody>
                </table>
                </div>
      <!-- Bank Transactions -->

            <div class="panel panel-success">
              <div class="panel-heading">
              <a name="Balance"></a>
                <h3 class="panel-title">Bank Transactions</h3>
              </div>
              <div class="panel-body">
              <table class="table table-striped">
              <thead>
                  <tr>
                    <th>Deposit:</th>
                    <th></th>
                    <th>Current Balance</th>
                    <th></th>
                    <th></th>
                    <th>After Tax:</th>
                  </tr>
                </thead>
              <tbody id="OwnedProp">
                       <tr>
                          <td><form action="actions/depositE2.php" method="post"><input style="height: 30px; width: 200px;" type="number" step= "any" placeholder="Insert Amount" name="Amount" class="form-control"></td>
                          <td><button style="margin-left: -210px" type="submit" class="btn btn-success">Deposit</button></form></td>
                          
                           <!-- Confirmación Deposit-->

                            <?php

                            if(isset($_GET['deposit']))
                              if($_GET['deposit'] == "error"){ ?>
                                <div class="alert alert-danger"><p>Bleh</p></div>
                       <?php } elseif($_GET['deposit'] == "e2"){ ?>
                                <div class="alert alert-success"><p>The specified amount has been successfully deposited into the company's account.</p></div>
                          <?php }
                            ?>
                          <td style="text-align: left-center">
                            
                             <?php

                          $resultID = mysql_query("SELECT MAX(ID) FROM u404044402_bank . e2Trans");
                          $rowID= mysql_fetch_row($resultID);
                          $resultBal = mysql_query("SELECT New_Balance FROM u404044402_bank . e2Trans WHERE ID = '$rowID[0]'");
                          $balance = mysql_fetch_row($resultBal);
                          $bal = $balance[0];
                          $balance_number_format = number_format($bal, 2);
                          echo "$" . $balance_number_format;

                          ?>

                          </td>
                          <td></td>
                          <td></td>
                          <td>
                          <?php

                          $balAT = $balance[0] - ($balance[0] * 0.08);
                          $balance_number_format = number_format($balAT, 2);
                          echo "$" . $balance_number_format;

                          ?>
                          </td>
                        </tr>
                    </tbody>
              </table>
              <table class="table table-striped">
              <thead>
                  <tr>
                    <th>Withdraw:</th>
                    <th></th>
                    <th>Current Balance</th>
                    <th></th>
                    <th></th>
                    <th>After Tax:</th>
                  </tr>
                </thead>
              <tbody>
                       <tr>
                          <td><form action="actions/withdrawE2.php" method="post"><input style="height: 30px; width: 200px;" type="number" step= "any" placeholder="Insert Amount" name="Amount" class="form-control"></td>
                          <td><button style="margin-left: -210px" type="submit" class="btn btn-success">Withdraw</button></form></td>
                          
                          <!-- Confirmación Withdraw-->

                            <?php

                            if(isset($_GET['withdraw']))
                              if($_GET['withdraw'] == "error"){ ?>
                                <div class="alert alert-danger"><p>Bleh</p></div>
                       <?php } elseif($_GET['withdraw'] == "e1"){ ?>
                                <div class="alert alert-success"><p>The specified amount has been successfully withdrawn from the company's account.</p></div>
                          <?php }
                            ?>
                          <td style="text-align: left-center">
                            
                             <?php

                          $resultID = mysql_query("SELECT MAX(ID) FROM u404044402_bank . e2Trans");
                          $rowID= mysql_fetch_row($resultID);
                          $resultBal = mysql_query("SELECT New_Balance FROM u404044402_bank . e2Trans WHERE ID = '$rowID[0]'");
                          $balance = mysql_fetch_row($resultBal);
                          $bal = $balance[0];
                          $balance_number_format = number_format($bal, 2);
                          echo "$" . $balance_number_format;

                          ?>

                          </td>
                          <td></td>
                          <td></td>
                          <td>
                          <?php

                          $balAT = $balance[0] - ($balance[0] * 0.08);
                          $balance_number_format = number_format($balAT, 2);
                          echo "$" . $balance_number_format;

                          ?>
                          </td>
                        </tr>
                    </tbody>
              </table>
              </div>
            </div>
      <!--Properties-->

          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Property:</h3>
            </div>
            <div style="height: 200px; overflow: scroll;" class="panel-body">
              <table class="table table-striped">
            <thead>
                <tr>
                  <th align="center">Property Number</th>
                  <th align="center">Name</th>
                  <th align="center">Owner</th>
                  <th align="center">Bought During</th>
                  <th align="center">Original Value</th>
                  <th align="center">Purchase Value</th>
                </tr>
              </thead>
            <tbody id="sInfo">
                     <?php

                        $countRow = mysql_query("SELECT * FROM u404044402_bank . properties");
                        $count = mysql_num_rows($countRow);

                        for($i = 1; $i <= $count; $i++){

                          $OwnerQuery = mysql_query("SELECT Owner FROM u404044402_bank . properties WHERE ID = $i");
                          $OwnerRow = mysql_fetch_row($OwnerQuery);
                          $Owner = $OwnerRow[0];

                          if($Owner == "Entertainment2"){
                            //GET P Name:
                            $getPropNameRes = mysql_query("SELECT Name FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropNameRow = mysql_fetch_row($getPropNameRes);
                            $PropName = $getPropNameRow[0];

                          //GET P Owner:
                            $getPropOwnerRes = mysql_query("SELECT Owner FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropOwnerRow = mysql_fetch_row($getPropOwnerRes);
                            $PropOwner = $getPropOwnerRow[0]; 

                          //GET Bought During:
                            $getPropBDRes = mysql_query("SELECT SoldBy FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropBDRow = mysql_fetch_row($getPropBDRes);
                            $PropBD = $getPropBDRow[0];

                          //GET P Original Value:
                            $getPropOValRes = mysql_query("SELECT Starting_Price FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropOValRow = mysql_fetch_row($getPropOValRes);
                            $PropOVal = $getPropOValRow[0];

                          //GET P Sale Value:
                            $getPropSaleValRes = mysql_query("SELECT Sold_At FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropSaleValRow = mysql_fetch_row($getPropSaleValRes);
                            $PropSaleVal = $getPropSaleValRow[0];

                            ?>
                            <tr>
                            <td align="center"><?php echo $i;?></td>
                            <td align="center"><?php echo $PropName; ?></td>
                            <td align="center"><?php echo $PropOwner; ?></td>
                            <td align="center"><?php echo $PropBD; ?></td>
                            <td align="center"><?php echo "$" . number_format($PropOVal, 2); ?></td>
                            <td align="center"><?php echo "$" . number_format($PropSaleVal, 2);?></td>
                            </tr>
                        <?php }
                          }

                     ?>
                  </tbody>
            </table>
            </div>
          </div>
          <hr>
          
       <!--Stocks-->

            <h2  class="page-header">Stocks</h2>

        
            
        <!--Stock Info-->

            <?php

              $countRow = mysql_query("SELECT * FROM u404044402_bank . stockMKT");
              $count = mysql_num_rows($countRow);
              $countRows = $count/4;
              $counter = 0;
              $compID = 1;

            do{?>
                <!--New Row -->
                <div  class="row placeholders">
                <?php
                  for($i = $compID; $i <= ($compID + 3); $i++){

                    //GET LOGO SOURCE:
                      $LogoSrcRes = mysql_query("SELECT LogoSrc FROM u404044402_bank . stockMKT WHERE ID = $i");
                      $LogoSrcRow = mysql_fetch_row($LogoSrcRes);
                      $LogoSrc = $LogoSrcRow[0];
                    //GET COMPANY NAME:
                      $CompRes = mysql_query("SELECT Company FROM u404044402_bank . stockMKT WHERE ID = $i");
                      $CompRow = mysql_fetch_row($CompRes);
                      $companyName = $CompRow[0];
                    //GET PERCENTAGE CHANGE:

                      //GET PSV:
                        $resultPrevSV = mysql_query("SELECT PreviousShareValue FROM u404044402_bank . stockMKT WHERE ID = $i");
                        $rowPrevSV = mysql_fetch_row($resultPrevSV);
                        $PrevSV = $rowPrevSV[0];
                      //GET CSV:
                        $resultCurSV = mysql_query("SELECT CurrentShareValue FROM u404044402_bank . stockMKT WHERE ID = $i");
                        $rowCurSV = mysql_fetch_row($resultCurSV);
                        $CurSV = $rowCurSV[0];?>

                    <!--Echo Round Logo-->

                      <div class="col-xs-6 col-sm-3 placeholder">
                      <img src=<?php echo $LogoSrc; ?> class="img-responsive" alt="Generic placeholder thumbnail">

                    <!--Echo Company Name:-->
                      <h4><?php echo $companyName; ?></h4>
                    <?php

                      //Increase or Decrese:

                        if($CurSV > $PrevSV){
                          $Increase = $CurSV - $PrevSV;
                          $PercentageIncrease = ($Increase / $PrevSV) * 100;
                    ?>
                          <p style="color: #33CC33; font-size: 20px; margin-bottom: 0px"><?php echo "↑" . round($PercentageIncrease) . "%"?></p>
                    <?php
                        }else if($PrevSV > $CurSV){
                          $Decrease = $PrevSV - $CurSV;
                          $PercentageDecrease = ($Decrease / $PrevSV) * 100;
                    ?>
                          <p style="color: #FF0000; font-size: 20px; margin-bottom: 0px"><?php echo "↓" . round($PercentageDecrease) . "%"?></p>
                    <?php
                        }
                    ?>
                    <!--Echo Current Share Value-->
                      <p class="text-muted" style="margin-bottom: 0px">
                        <?php

                          $resultCSV = mysql_query("SELECT CurrentShareValue FROM u404044402_bank . stockMKT WHERE ID = $i");
                          $rowCSV = mysql_fetch_row($resultCSV);
                          $CSV = $rowCSV[0];
                          $CSV_number_format = number_format($CSV, 2);

                          echo "Current Share Value:";?><br><?php
                          echo "$" . $CSV_number_format;

                        ?>
                      </p>

                    <!--Echo Previous Share Value-->
                      <p class="text-muted" style="margin-bottom: 0px">
                        <?php

                          $resultPrevSV = mysql_query("SELECT PreviousShareValue FROM u404044402_bank . stockMKT WHERE ID = 1");
                          $rowPrevSV = mysql_fetch_row($resultPrevSV);
                          $PrevSV = $rowPrevSV[0];
                          $PrevSV_number_format = number_format($PrevSV, 2);

                          echo "Previous Share Value:";?><br><?php
                          echo "$" . $PrevSV_number_format;

                        ?>
                      </p>

                    <!--Mkt Cap-->
                      <p class="text-muted">
                        <?php

                          $resultMkt_Cap = mysql_query("SELECT MarketCap FROM u404044402_bank . stockMKT WHERE ID = 1");
                          $rowMkt_Cap = mysql_fetch_row($resultMkt_Cap);
                          $Mkt_Cap = $rowMkt_Cap[0];
                          $Mkt_Cap_number_format = number_format($Mkt_Cap, 2);

                          echo "Market Capitalization:";?><br><?php
                          echo "$" . $Mkt_Cap_number_format;

                        ?>
                      </p>
                      </div>

                <?php

                  }?>
                </div><?php

              $counter++;
              $compID = $compID + 4;
            }

            while($counter < $countRows);

            ?>          
                
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/docs.min.js"></script>
  </body>
</html>