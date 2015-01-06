<?php

  include_once("actions/authenticate.php");
  session_name(CSCFELC);
  session_start();
?>
<!DOCTYPE html>
<title>FELC - The Bank</title>
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
              <a href="../user/principal.php"><img class="navbar-brand" src="../images/corner_logo.gif"; style="padding: 1px, 1px;"></a>
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
            <li><a href="#Transactions">All Transactions</a></li>
            <li><a href="#cbTrans">Cash Box Transactions</a></li>
            <li><a href="#ict">Inter-Company Transactions</a></li>
            <li><a href="#Balance">Balances</a></li>
            <li><a href="#bStock">Buy Stock</a></li>
            <li><a href="#sStock">Sell Stock</a></li>
            <li><a href="#sInfo">Stock Info</a></li>
            <li><a href="#Property">Properties</a></li>
            <li><a href="#Property">Property Related Transaction</a></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <a name="Transactions"></a>
          <h1 class="page-header">The Bank</h1>
         
        <!--Company Tabs-->

          <div class="">
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

          <h2 id="cbTrans"><class="sub-header">All Transactions:</h2>
          <div style="height: 200px; overflow: scroll;" class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th align="center">Transaction No.</th>
                  <th align="center">Description</th>
                  <th align="center">Withdrawn From</th>
                  <th align="center">Deposited Into</th>
                  <th align="center">Amount Transfered</th>
                </tr>
              </thead>
                  <tbody>
                  <?php

                  $countRow = mysql_query("SELECT * FROM u404044402_bank . transactions");
                  $count = mysql_num_rows($countRow);

                  for($i = $count; $i >= 1; $i--){

                    //GET DESCRIPTION:
                    $getDescRes = mysql_query("SELECT Description FROM u404044402_bank . transactions WHERE ID = $i");
                    $getDescRow = mysql_fetch_row($getDescRes);
                    $Desc = $getDescRow[0];
                    //GET WITHDRAWN FROM
                    $getWithdrawnRes = mysql_query("SELECT Company_Acquiring FROM u404044402_bank . transactions WHERE ID = $i");
                    $getWithdrawnRow = mysql_fetch_row($getWithdrawnRes);
                    $withdrawn = $getWithdrawnRow[0];
                    //GET DEPOSIT INTO
                    $getDepositRes = mysql_query("SELECT Company_Selling FROM u404044402_bank . transactions WHERE ID = $i");
                    $getDepositRow = mysql_fetch_row($getDepositRes);
                    $deposit = $getDepositRow[0];
                    //GET AMOUNT
                    $getAmountRes = mysql_query("SELECT Amount FROM u404044402_bank . transactions WHERE ID = $i");
                    $getAmountRow = mysql_fetch_row($getAmountRes);
                    $amount = $getAmountRow[0];
                    //GET PREV ACC BAL
                    $getPrevBalRes = mysql_query("SELECT Previous_Balance FROM u404044402_bank . transactions WHERE ID = $i");
                    $getPrevBalRow = mysql_fetch_row($getPrevBalRes);
                    $PrevBal = $getPrevBalRow[0];
                    //GET NEW ACC BAL
                    $getBalRes = mysql_query("SELECT New_Balance FROM u404044402_bank . transactions WHERE ID = $i");
                    $getBalRow = mysql_fetch_row($getBalRes);
                    $Bal = $getBalRow[0];
                  
                    ?>
                  <tr>
                  <td align="center"><?php echo $i; ?></td>
                  <td align="center"><?php echo $Desc; ?></td>
                  <td align="center"><?php echo $withdrawn; ?></td>
                  <td align="center"><?php echo $deposit; ?></td>
                  <td align="center"><?php echo "$" . number_format($amount, 2); }?></td>
                </tr>
                  </tbody>
            </table>
            </div>

       <!--Cash Box Transactions-->

          <h2><class="sub-header">Cash Box Transactions:</h2>
          <div style="height: 200px; overflow: scroll;" class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th align="center">Transaction No.</th>
                  <th align="center">Description</th>
                  <th align="center">Withdrawn From</th>
                  <th align="center">Deposited Into</th>
                  <th align="center">Amount Transfered</th>
                </tr>
              </thead>
                  <tbody>
                  <?php

                  $countRow = mysql_query("SELECT * FROM u404044402_bank . cashBoxTrans");
                  $count = mysql_num_rows($countRow);

                  for($i = $count; $i >= 1; $i--){

                    //GET TRANS ID:
                    $getIDRes = mysql_query("SELECT TransID FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getIDRow = mysql_fetch_row($getIDRes);
                    $ID = $getIDRow[0];
                   
                    //GET WITHDRAWN FROM
                    $getWithdrawnRes = mysql_query("SELECT `From` FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getWithdrawnRow = mysql_fetch_row($getWithdrawnRes);
                    $withdrawn = $getWithdrawnRow[0];
                    //GET DEPOSIT INTO
                    $getDepositRes = mysql_query("SELECT `To` FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getDepositRow = mysql_fetch_row($getDepositRes);
                    $deposit = $getDepositRow[0];
                    //GET AMOUNT
                    $getAmountRes = mysql_query("SELECT Amount FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getAmountRow = mysql_fetch_row($getAmountRes);
                    $amount = $getAmountRow[0];
                    //GET PREV CB BAL
                    $getPrevBalRes = mysql_query("SELECT PreviousBalance FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getPrevBalRow = mysql_fetch_row($getPrevBalRes);
                    $PrevBal = $getPrevBalRow[0];
                    //GET NEW CB BAL
                    $getBalRes = mysql_query("SELECT NewBalance FROM u404044402_bank . cashBoxTrans WHERE ID = $i");
                    $getBalRow = mysql_fetch_row($getBalRes);
                    $Bal = $getBalRow[0];
                  
                    ?>
                  <tr>
                  <td align="center"><?php echo $ID; ?></td>
                  <td align="center"><?php echo $Desc; ?></td>
                  <td align="center"><?php echo $withdrawn; ?></td>
                  <td align="center"><?php echo $deposit; ?></td>
                  <td id="ict" align="center"><?php echo "$" . number_format($amount, 2); }?></td>
                </tr>
                  </tbody>
            </table>
            </div>   

       <!-- Inter-Company Transactions -->

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Inter-Company Transactions</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Transfer:</th>
                      <th>Description:</th>
                      <th>From:</th>
                      <th>To:</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <form action="actions/interCT.php" method="post">
                        <td><input type="number" step="any" placeholder="Insert Amount" name="amount"></td>
                        <td><textarea name="description" rows="2" cols="20" maxlength="40" ></textarea></td>
                        <td>
                          <select name="companyFrom" style="max-width: 100px">
                            <?php

                              for($i = 1; $i <= 8; $i++){
                                //GET Company Name:
                                  $companyRes = mysql_query("SELECT Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                                  $companyRow = mysql_fetch_row($companyRes);
                                  $company = $companyRow[0];?>
                                <option value=<?php echo $company; ?>><?php echo $company; ?></option><?php
                            }

                            ?>
                          </select>
                        </td>
                         <td id="Balance">
                          <select name="companyTo" style="max-width: 100px">
                            <?php

                              for($i = 1; $i <= 8; $i++){
                                //GET Company Name:
                                  $companyRes = mysql_query("SELECT Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                                  $companyRow = mysql_fetch_row($companyRes);
                                  $company = $companyRow[0];?>
                                <option value=<?php echo $company; ?>><?php echo $company; ?></option><?php
                            }

                            ?>
                          </select>
                        </td>
                        <td><button type="submit"style="float: right" class="btn btn-primary">Make Transaction</button></td>
                      </form>
                    </tr>
                  </tbody>
                </table>
                <?php

                      if(isset($_GET['ict'])){
                        if($_GET['ict'] == e1){?>
                          <div class="alert alert-success"><p>The transaction has been made.</p></div>
                        <?php }elseif ($_GET['ict'] == error) {?>
                          <div class="alert alert-danger"><p>Error. Please try again.</p></div>
                        <?php }
                      }

                    ?>
              </div>
            </div>

        <!-- Balances -->
           

          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Balances</h3>
            </div>
            <div style="height: 200px; overflow: scroll;" class="panel-body">

            <?php

            //For Balances 1-8

            for($i = 1; $i <= 8; $i++){
              //GET Name:
                $getCompNameRes = mysql_query("SELECT Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                $getCompNameRow = mysql_fetch_row($getCompNameRes);
                $compName = $getCompNameRow[0];

              //GET Balance:
                $getBalRes = mysql_query("SELECT Balance FROM u404044402_bank . companyAccounts WHERE ID = $i");
                $getBalRow = mysql_fetch_row($getBalRes);
                $Balance = $getBalRow[0];

              //GET Balance AT:
                $BalAT = $Balance - ($Balance * 0.08);

            ?>

              <!--Echo Comp Header-->

                <table class="table table-striped">
                  <thead>
                      <tr>
                        <th><?php echo $compName; ?>: Current Balance:</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>After Tax:</th>
                      </tr>
                  </thead>

              <!--Echo Comp Body-->

                  <tbody id="Stock">
                       <tr>
                          <td><?php echo "$" . number_format($Balance, 2); ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><?php echo "$" . number_format($BalAT, 2); ?></td>
                        </tr>
                  </tbody>
                </table>
            <?php

            }

            ?>
            
            </div>
          </div>        

        <!--Stocks-->

            <h2 id="bStock" class="page-header">Stocks</h2>

        <!-- Buy Stock -->
          <div id="sStock" class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Buy Stock</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
            <thead>
                <tr>
                  <th>Buy:</th>
                  </tr>
              </thead>
            <tbody>
              <tr>
                <td>
                  <form action="actions/calculateTotalP.php" method="post">
                  
                  <!--Drop Down Companies-->
                  <select name="company" style="max-width: 200px">
                    <option value="NULL">-Select Company-</option>
                    <?php

                      $countRes = mysql_query("SELECT * FROM u404044402_bank . companyAccounts");
                      $count = mysql_num_rows($countRes);

                      for($i = 1; $i <= $count; $i++){
                        $CompanyRes = mysql_query("SELECT ID, Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                        $Company = mysql_fetch_row($CompanyRes);
                        $companyID = $Company[0];
                        $Nombre =  $Company[1];?>

                        <option value=
                              <?php

                                echo $companyID;
                                
                                ?>>
                                <?php
                                echo $Nombre ;?>
                              </option><?php

                      }


                    ?>
                  </select>
                </td>
                <td>
                  <!--Drop Down Stock-->
                  <select name="stock" style="max-width: 200px">
                    <option value="NULL">-Select Stock-</option>
                    <?php

                      $countRes = mysql_query("SELECT * FROM u404044402_bank . stockMKT");
                      $count = mysql_num_rows($countRes);

                      for($i = 1; $i <= $count; $i++){
                        $CompanyRes = mysql_query("SELECT ID, Company FROM u404044402_bank . stockMKT WHERE ID = $i");
                        $Company = mysql_fetch_row($CompanyRes);
                        $companyID = $Company[0];
                        $Nombre =  $Company[1];?>

                        <option value=
                              <?php

                                echo $companyID;
                                
                                ?>>
                                <?php
                                echo $Nombre ;?>
                              </option><?php

                      }


                    ?>
                  </select>
                <td>
                  <select name="qty" style="max-width: 200px;" name="cantidad">

                            <option value="NULL">Select Quantity</option>
                            
                          <?php

                          for($i = 1; $i <= 10; $i++){

                            ?>
                            <option value=

                            <?php

                            echo $i;

                            ?>
                            >

                            <?php

                            echo $i;

                            ?>
                            </option>
                          <?php

                          }

                          ?>
                          </select>
                </td>
                <td><button type="submit" style="float: right" class="btn btn-primary">Calculate Total</button></td>
                </form>
                </td>
              </tr>
            </tbody>
            </table>
            <?php

                          if(isset($_GET['valor'])){

                             if($_GET['valor'] == "error"){ ?>
                              <p>Error. Favor de intentar de nuevo.</p>

                     <?php }elseif($_GET['valor'] == "ua1"){?>
                              
                        <div class="alert alert-danger"><p>The company lacks the resources to purchase the desired amount of stock.</p></div>

                     <?php }elseif($_GET['valor'] == "e1"){?>
                              <p>Total:
                              <?php
                              echo "$" . number_format($_SESSION['total'], 2);
                              ?>

                              <form action="actions/buystock.php" method="post">
                                <button type="submit" style="float: right" class="btn btn-primary">Buy Shares</button>
                              </form>
                              </p>
                              <p>Current Balance:

                              <?php

                              $saldoA = number_format($_SESSION['CurrentBalance'], 2);

                              echo "$" . $saldoA;

                              ?>

                              </p>

                              <p>Balance After Purchase:

                              <?php

                               $saldoDC = number_format($_SESSION['BalanceAP'], 2);

                              echo "$" . $saldoDC;

                              ?>

                              </p>

                             <p> 
                             <?php

                             $saldoA = number_format($_SESSION['CurrentBalance'], 2);

                             if($saldoA < 1){

                              echo "No hay fondos en la cuenta, desea continuar con la compra?";
                             }

                              ?>

                        <?php }elseif($_GET['valor'] == "ua2"){?>

                          <div class="alert alert-danger"><p>There aren't enough shares available for purchase.</p></div><?php

                        }

                          }

                          if(isset($_GET['purchase'])){
                            if($_GET['purchase'] == "error"){?>

                              <div class="alert alert-danger"><p>Error, please try again.</p></div>
                              <?php

                            }elseif($_GET['purchase'] == "e1"){?>

                            <div class="alert alert-success"><p>The desired stock has been purchased.</p></div>
                            <p>New Balance:

                              <?php

                              $NuevoSaldo = number_format($_SESSION['BalanceAP'], 2);

                              echo "$" . $NuevoSaldo;

                              ?>

                              </p>
                              <?php
                            }
                          }
                          ?>
                </div>
            </div>

        <!-- Sell Stock -->
            <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Sell Stock</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
            <thead>
                <tr>
                  <th>Sell:</th>
                  </tr>
              </thead>
            <tbody>
              <tr id="sInfo">
                <td>
                  <form action="actions/calculateTotalS.php" method="post">
                  
                  <!--Drop Down Companies-->
                  <select name="company" style="max-width: 200px">
                    <option value="NULL">-Select Company-</option>
                    <?php

                      $countRes = mysql_query("SELECT * FROM u404044402_bank . companyAccounts");
                      $count = mysql_num_rows($countRes);

                      for($i = 1; $i <= $count; $i++){
                        $CompanyRes = mysql_query("SELECT ID, Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                        $Company = mysql_fetch_row($CompanyRes);
                        $companyID = $Company[0];
                        $Nombre =  $Company[1];?>

                        <option value=
                              <?php

                                echo $companyID;
                                
                                ?>>
                                <?php
                                echo $Nombre ;?>
                              </option><?php

                      }


                    ?>
                  </select>
                </td>
                <td>
                  <!--Drop Down Stock-->
                  <select name="stock" style="max-width: 200px">
                    <option value="NULL">-Select Stock-</option>
                    <?php

                      $countRes = mysql_query("SELECT * FROM u404044402_bank . stockMKT");
                      $count = mysql_num_rows($countRes);

                      for($i = 1; $i <= $count; $i++){
                        $CompanyRes = mysql_query("SELECT ID, Company FROM u404044402_bank . stockMKT WHERE ID = $i");
                        $Company = mysql_fetch_row($CompanyRes);
                        $companyID = $Company[0];
                        $Nombre =  $Company[1];?>

                        <option value=
                              <?php

                                echo $companyID;
                                
                                ?>>
                                <?php
                                echo $Nombre ;?>
                              </option><?php

                      }


                    ?>
                  </select>
                <td>
                  <select name="qty" style="max-width: 200px;" name="cantidad">

                            <option value="NULL">-Select Quantity-</option>
                            
                          <?php

                          for($i = 1; $i <= 10; $i++){

                            ?>
                            <option value=

                            <?php

                            echo $i;

                            ?>
                            >

                            <?php

                            echo $i;

                            ?>
                            </option>
                          <?php

                          }

                          ?>
                          </select>
                </td>
                <td><button type="submit" style="float: right" class="btn btn-warning">Calculate Total</button></td>
                </form>
                </td>
              </tr>
            </tbody>
            </table>
            <?php

                          if(isset($_GET['vdv'])){

                             if($_GET['vdv'] == "error"){ ?>
                              <p>Error. Please Try Again</p>

                     <?php }elseif($_GET['vdv'] == "ua"){?>
                              
                        <div class="alert alert-danger"><p>The company lacks the necessary amount of stock to complete the sale.</p></div>

                     <?php }elseif($_GET['vdv'] == "e1"){?>
                              <p>Total:
                              <?php
                              echo "$" . number_format($_SESSION['total'], 2);
                              ?>

                              <form action="actions/sellstock.php" method="post">
                                <button type="submit" style="float: right" class="btn btn-warning">Sell Shares</button>
                              </form>
                              </p>
                              <p>Current Balance:

                              <?php

                              $saldoA = number_format($_SESSION['CurrentBalance'], 2);

                              echo "$" . $saldoA;

                              ?>

                              </p>

                              <p>Balance After Purchase:

                              <?php

                               $saldoDC = number_format($_SESSION['BalanceAS'], 2);

                              echo "$" . $saldoDC;

                              ?>

                              </p>

                             <p> 
                             <?php

                             $saldoA = number_format($_SESSION['CurrentBalance'], 2);

                           }
                         }

                          if(isset($_GET['sale'])){
                            if($_GET['sale'] == "error"){?>

                              <div class="alert alert-danger"><p>Error, please try again.</p></div>
                              <?php

                            }elseif($_GET['sale'] == "e1"){?>

                            <div class="alert alert-success"><p>The desired stock has been sold.</p></div>
                            <p>New Balance:

                              <?php

                              $NuevoSaldo = number_format($_SESSION['BalanceAS'], 2);

                              echo "$" . $NuevoSaldo;

                              ?>

                              </p>
                              <?php
                            }
                          }
                          ?>
              </div>
            </div>

        <!--Stock Info-->

            <?php

              $countRow = mysql_query("SELECT * FROM u404044402_bank . stockMKT");
              $count = mysql_num_rows($countRow);
              $countRows = $count/4;
              $counter = 0;
              $compID = 1;

            do{?>
                <!--New Row -->
                <div class="row placeholders">
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


         
        <!--Properties-->

          <div class="panel panel-danger">
            <div class="panel-heading">
            <a name="Property"></a>
              <h3 class="panel-title">Property:</h3>
            </div>
            <div style="height: 200px; overflow: scroll;" class="panel-body">
              <table class="table table-striped">
            <thead>
                <tr>
                  <th>Property Number</th>
                  <th>Name</th>
                  <th>Owner</th>
                  <th>Bought During</th>
                  <th>Original Value</th>
                  <th>Purchase Value</th>
                </tr>
              </thead>
            <tbody>
                     
                        <?php

                        $countRow = mysql_query("SELECT * FROM u404044402_bank . properties");
                        $count = mysql_num_rows($countRow);

                        for($i = 1; $i <= $count; $i++){
                          //GET P Name:
                            $getPropNameRes = mysql_query("SELECT Name FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropNameRow = mysql_fetch_row($getPropNameRes);
                            $PropName = $getPropNameRow[0];

                          //GET P Owner:
                            $getPropOwnerRes = mysql_query("SELECT Owner FROM u404044402_bank . properties WHERE ID = $i");
                            $getPropOwnerRow = mysql_fetch_row($getPropOwnerRes);
                            $PropOwner = $getPropOwnerRow[0]; 

                          //GET Bought During:
                            $getPropBDRes = mysql_query("SELECT `SoldBy` FROM u404044402_bank . properties WHERE ID = $i");
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
                        <?php }?>
                  </tbody>
            </table>
            </div>
          </div>
          <hr>
        <!-- Property Transactions -->
          <div id="propTrans" class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Property Transactions</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
            <thead>
                <tr>
                  <th>Select Property:</th>
                  </tr>
              </thead>
            <tbody>
              <tr>
                <td>
                  <form action="actions/getPDets.php" method="post">
                  
                  <!--Drop Down Properties-->
                  <select name="property" style="max-width: 400px">
                    <option value="NULL">-Select Property-</option>
                    <?php

                      $countRes = mysql_query("SELECT * FROM u404044402_bank . properties");
                      $count = mysql_num_rows($countRes);

                      for($i = 1; $i <= $count; $i++){
                        $PropertyRes = mysql_query("SELECT ID, Name FROM u404044402_bank . properties WHERE ID = $i");
                        $Property = mysql_fetch_array($PropertyRes);
                        $PropertyID = $Property[0];
                        $PropertyName =  $Property[1];?>

                        <option value=
                              <?php

                                echo $PropertyID;
                                
                                ?>>
                                <?php
                                echo $PropertyName ;?>
                              </option><?php

                      }


                    ?>
                  </select>
                </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td><button type="submit" style="float: right" class="btn btn-default">Get Details</button></td>
                </form>
                </td>
              </tr>
            <?php

                          if(isset($_GET['pd'])){

                             if($_GET['pd'] == "error"){ ?>
                              <p>Error. Please try again.</p>

                     <?php }elseif($_GET['pd'] == "e1"){?>
                              
                              <form action="actions/sellProp.php" method="post">
                                <tr>
                                  <th>Property ID:</th>
                                  <th>Name:</th>
                                  <th>Owner:</th>
                                  <th>Bought During:</th>
                                  <th>Original Value:</th>
                                  <th>Last Sale Value:</th>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo $_SESSION['pID'];?></td>
                                  <td align="center"><?php echo $_SESSION['pName'];?></td>
                                  <td align="center"><?php echo $_SESSION['pOwner'];?></td>
                                  <td align="center"><?php echo $_SESSION['BD'];?></td>
                                  <td align="center"><?php echo "$" . number_format($_SESSION['OV'], 2);?></td>
                                  <td align="center"><?php echo "$" . number_format($_SESSION['LSV'], 2);?></td>
                                </tr>
                                <tr>
                                  <td>
                                    <select name="buyer">
                                      <option value="NULL">-Buyer-</option>
                                      <?php

                                        for($i = 1; $i <= 8; $i++){
                                            //GET Company Name:
                                              $companyRes = mysql_query("SELECT Name FROM u404044402_bank . companyAccounts WHERE ID = $i");
                                              $companyRow = mysql_fetch_row($companyRes);
                                              $company = $companyRow[0];?>
                                            <option value=<?php echo $company; ?>><?php echo $company; ?></option><?php
                                        }

                                      ?>
                                    </select>
                                  <td><input type="text" placeholder="Bought During" name="BoughtD"></td>
                                  <td><input type="number" step="any" placeholder="Insert Amount" name="amount"></td>
                                  </td>
                                  <td></td>
                                  <td></td>
                                  <td><button type="submit" style="float: right" class="btn btn-default">Sell Property</button></td>
                                </tr>
                              </form>
                            </tbody>
                          </table>
                        <?php }
                           }

                          if(isset($_GET['propsale'])){
                            if($_GET['propsale'] == "error"){?>

                              <div class="alert alert-danger"><p>Error, please try again.</p></div>
                              <?php

                            }elseif($_GET['propsale'] == "e1"){?>

                            <div class="alert alert-success"><p>The desired property has been purchased.</p></div>
                            <?php
                            }
                          }
                          ?>
                </div>
            </div>
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