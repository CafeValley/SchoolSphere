<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "First Term Report";
$formnameheaderforprint = "All Register - Discount";
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $SYSTEM_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <?php
  upsiderbar(7);
  leftsiderbar(7, 77);
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


      <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

        <h2><?php include('headerforprint.php'); ?></h2>

        <div class="table-responsive">
          <?php
        //
        //

        $SqlCommandForCFe = " SELECT `idfortable`, discountdata.regisid, `discountamount` , `StudentName` FROM `discountdata` , `student`,`studentsregistered` where studentsregistered.id = discountdata.regisid and studentsregistered.acadmicyear = '$Acadyear' and `studentindex` = `IndexNo` order by StudentName ";
        $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>
          <table id="myTable" class="table table-striped table-sm">
            <thead>

              <tr>
                <th onclick="sortTable(0)">Studnet index</th>
                <th onclick="sortTable(1)">Class & Stream</th>
                <th onclick="sortTableNumber(2)">Discount</th>
                <th onclick="sortTableNumber(3)">Acadmic Year</th>
              </tr>
            </thead>
            <tbody>
              <?php

            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
              $regisid = $CheckIfReturnInF['regisid'];
              $discountamount = $CheckIfReturnInF['discountamount'];

              
               $sqlregis = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`,studentsregistered.acadmicyear as acadmicyear, `StudentName` FROM `studentsregistered` , `student` where `id` = '$regisid' and studentsregistered.acadmicyear = '$Acadyear' and `studentindex` = `IndexNo` order by StudentName ";
              $checkregis      = mysqli_query($link, $sqlregis);
              $rowregis   = mysqli_fetch_array($checkregis);

              $studnetindex = $rowregis['studentindex'];
              $yearselect = $rowregis['yearselect'];
              $subclassname = $rowregis['subclassname'];
              $acadmicyear = $rowregis['acadmicyear'];

              echo "<tr>";
              echo "<td>";
              echo $studnetindex . " - " . studentname($studnetindex);
              echo "</td>";
              echo "<td>$yearselect - $subclassname</td>";
              echo "<td>".mynumberformat($discountamount, 0)."</td>";
              echo "<td>$acadmicyear</td>";
              echo "</tr>";
            }

            ?>
            </tbody>
          </table>
        </div>
      </div>
      <button type="submit" onclick="printDiv('printableArea')" class="btn btn-default">Print</button>

    </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php footer(); ?>