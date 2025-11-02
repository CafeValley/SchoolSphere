<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "Report Student Reminder fees";
$formnameheaderforprint = "Class list - Reminder";
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
  upsiderbar(6);
  leftsiderbar(5, 655);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php include('headerforprint.php'); ?></h2>

      <div class="table-responsive">
        <?php
        //
        //

        $SqlCommandForCFe = " SELECT DISTINCT(studentindex) as studentindex , `StudentName` FROM `studentsregisteredfees` , `student` where studentindex=IndexNo and `active1` = '1' and studentsregisteredfees.acadmicyear = '$Acadyear' order by `StudentName`";
        $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>

            <tr>
              <th onclick="sortTableNumber(0)">No.</th>
              <th onclick="sortTable(1)">Studnet Name</th>
              <th onclick="sortTable(2)">Studnet Index</th>
              <th onclick="sortTable(3)"> Class-Stream</th>
              <th onclick="sortTableNumber(4)">Due</th>
              <th onclick="sortTableNumber(5)">Paid</th>
              <th onclick="sortTableNumber(6)">Balance</th>
              <th onclick="sortTableNumber(7)">Receipt</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counthere = 1;
            $Rlist = array();
            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {

              $studnetindex = $CheckIfReturnInF['studentindex'];
              $SqlCommandForCFein = " SELECT yearselect,subclassname FROM `studentsregistered` where studentindex='$studnetindex' and `active` = '1' and studentsregistered.acadmicyear = '$Acadyear'
";
              $CheckIfHereInFin = mysqli_query($link, $SqlCommandForCFein);
              $CheckIfReturnInFin = mysqli_fetch_array($CheckIfHereInFin);

              if (isset($CheckIfReturnInFin['yearselect']))
              $getoutyear = $CheckIfReturnInFin['yearselect'];
            else
              $getoutyear = " ";
            if (isset($CheckIfReturnInFin['subclassname']))
              $getoutsubclass = $CheckIfReturnInFin['subclassname'];
            else
              $getoutsubclass = " ";

              $Rlist = getReceiptlist($studnetindex);
              echo "<tr>";
              echo "<td>";
              echo $counthere++;
              echo ".</td>";
              echo "<td>";
              echo studentname($studnetindex);
              echo "</td>";
              echo "<td>";
              echo ($studnetindex);
              echo "</td>";
              echo " <td>" . $getoutyear . " - " . $getoutsubclass . "</td>";
              echo "<td>" . mynumberformat(getamountwanted($studnetindex), 0) . "</td>";
              echo "<td>" . mynumberformat(getamountpaied($studnetindex), 0) . "</td>";
              echo "<td>";
              echo getamountwanted($studnetindex) - getamountpaied($studnetindex);
              echo "</td>";
              echo "<td>";
              foreach ($Rlist as $x => $x_value)
                echo $x_value . " ";

              echo "</td>";

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