<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formname  = "termsheetstudents2.php";
$formnameheaderforprint = "Second Term";
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
  upsiderbar();
  leftsiderbar(3, 48);
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


      <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

        <h2><?php echo $formtitle ?></h2>

        <form action="<?php echo $formname; ?>" method="POST">
          <table>



            <tr>
              <td>Class Year</td>
              <td>
                <div class="col-md-6">
                  <?php

                if (isset($_POST['yearforsubject'])) {
                  listofgrades($_POST['yearforsubject']);
                } else {
                  listofgrades();
                }
                ?>
                  <div>
              </td>
            </tr>
            <tr>
              <td>Class-Stream</td>
              <td>
                <div class="col-md-6">
                  <?php

                if (isset($_POST['subclassname'])) {
                  listsubclass($_POST['subclassname']);
                } else {
                  listsubclass();
                }
                ?>
                  <div>
              </td>
            </tr>
            <tr>
              <td><input type="submit" value="Display" name="Getit" class="btn btn-dark"></td>
            </tr>

          </table>
        </form>
        <div class="table-responsive">
          <?php
        if (isset($_POST['Getit'])) {
          include('headerforprintinside.php');

          $grade = $_POST['yearforsubject'];
          $subclassname = $_POST['subclassname'];
          $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' ";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
          echo "Class <strong>" . $grade . "</strong> Stream <strong>" . $subclassname . "</strong>";
        ?>

          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTableNumber(0)">No</th>
                <?php

                $AllowToGetMark = (getsubjectslist2nd($grade, $subclassname));
                $stndlist = getstnd2($grade, $subclassname);

                ?>
                <th onclick="sortTable(1)">Name</th>
                <?php
                $ordercount = 1;
                foreach ($AllowToGetMark as $list) {
                  $ordercount++;
                  echo "<th onclick='sortTableNumber($ordercount)'>$list</th>";
                }
                ?>
                <th onclick="sortTableNumber(<?php echo $ordercount; ?>)">Total</th>
                <th onclick="sortTableNumber(<?php echo $ordercount++; ?>)">Stnd</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
              $totalforstudnet = 0;
              while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
                $studentindex = $CheckIfReturnInF['studentindex'];
                echo "<tr>";
                echo "<td>$count</td>";
                $count++;
                echo "  <td>" . studentname($studentindex) . "</td>";
                $totaldisplayed = 0;
                foreach ($AllowToGetMark as $list) {
                  echo "<td>";
                  echo $first = getmark2nd($studentindex, $list, $grade, $subclassname, "$Acadyear");
                  $totaldisplayed += $first;
                  echo "</td>";
                }
                echo "<td>$totaldisplayed</td>";

                echo "<td>";
                echo $stndlist[$studentindex];
                echo "</td>";
                echo "</tr>";
              }

              ?>

            </tbody>
          </table>
          <?php //new code here
        }
        ?>



          <style>
            table {
              border-spacing: 0;
              width: 100%;
              border: 1px solid #ddd;
            }

            th {
              cursor: pointer;
            }

            th,
            td {
              text-align: left;
              padding: 16px;
            }

            <tr><td></td></tr>tr:nth-child(even) {
              background-color: #f2f2f2
            }
          </style>
          </head>

</html>





<?php //end for the new code
?>
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