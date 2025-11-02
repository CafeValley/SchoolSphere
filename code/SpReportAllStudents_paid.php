<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "Report Student Reminder fees";
$formnameheaderforprint = "Class list - Paid";

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
  leftsiderbar(5, 64);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php include('headerforprint.php'); ?></h2>

      <div class="table-responsive">
        <?php
        //
        //
        //SELECT `id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`, `whodidthis`, `whenwasit` FROM `studentsregisteredfees` WHERE 1



        $SqlCommandForCFe = " SELECT  studentindex,`StudentName`, sum(totaloffees) as totaloffees FROM `studentsregisteredfees` , `student` where `IndexNo` = studentindex and `active1` = '0' and `typeofpayment` = '11' and studentsregisteredfees.acadmicyear = '$Acadyear' group by studentindex , `StudentName` order by `StudentName`";
        $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>

            <tr>
              <th onclick="sortTableNumber(0)">No.</th>
              <th onclick="sortTable(1)">Studnet Name</th>
              <th onclick="sortTable(2)">Studnet Index</th>
              <th onclick="sortTableNumber(3)">Paid</th>


            </tr>
          </thead>
          <tbody>
            <?php
            $counthere = 1;
            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {

              $studnetindex = $CheckIfReturnInF['studentindex'];

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
              echo "<td>" . mynumberformat($CheckIfReturnInF['totaloffees'], 0) . "</td>";


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