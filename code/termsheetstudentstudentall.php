<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formname  = "termsheetstudentstudentall.php";
$formnameheaderforprint = "School Report";
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
  upsiderbar(4);
  leftsiderbar(3, 45);
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


      <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

        <h2><?php echo $formtitle ?></h2>

        <form action="<?php echo $formname; ?>" method="POST">
          <table>
            <tr>
              <td>Index No</td>
              <td>
                <div class="col-md-6">
                  <input name="IndexNo" type="text" class="form-control" value="<?php
                                                                              if (isset($_POST['IndexNo']))
                                                                                echo $_POST['IndexNo'];
                                                                              ?>">
                  <div>
              </td>
            </tr>

            <?php if (isset($_POST['IndexNo'])) { ?>
            <tr>
              <td>Index No</td>

              <td>
                <div class="col-md-6">
                  <?php echo studentname($_POST['IndexNo']); ?>
                  <div>
              </td>
            </tr>
            <?php } ?>



            <tr>
              <td><input type="submit" value="Display" name="Getit" class="btn btn-dark"></td>
            </tr>

          </table>
        </form>
        <div id="printableArea" class="table-responsive">

          <?php
        if (isset($_POST['Getit'])) {
          include('headerforprintinsidesinglestudent.php');
          $indexno = $_POST['IndexNo'];
          $grade = $_POST['yearforsubject'];
          $subclassname = $_POST['subclassname'];
          $SqlCommandForCFe = " SELECT  `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date` , `intotal` FROM `marks_first_term` , `subjects` WHERE subjects.name = marks_first_term.subjectid and `studentindex` = '$indexno' order by intotal , class , subclassname,acadmicyear ";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>

          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTable(0)">Subjects</th>
                <th onclick="sortTable(1)">1st Report</th>
                <th onclick="sortTable(2)">2nd Report</th>
                <th onclick="sortTable(3)">3rd Report</th>

                <th onclick="sortTable(4)">Average 1,2 & 3</th>
                <th onclick="sortTable(5)">Final Exams</th>
                <th onclick="sortTable(6)">Final Result</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
              $totalforstudnet = 0;
              while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
                echo "<tr>";
                echo "  <td>" . $CheckIfReturnInF['subjectid'] . "</td>";
                echo "<td>";
                $first = getmarkfirst($indexno, $CheckIfReturnInF['subjectid'], $grade, $subclassname, "$Acadyear");
                echo mynumberformat($first, 0);
                echo "</td>";
                echo "<td>";
                $second = getmark2nd($indexno, $CheckIfReturnInF['subjectid'], $grade, $subclassname, "$Acadyear");
                echo mynumberformat($second, 0);
                echo "</td>";
                echo "<td>";
                $third = getmark3rd($indexno, $CheckIfReturnInF['subjectid'], $grade, $subclassname, "$Acadyear");
                echo mynumberformat($third, 0);
                echo "</td>";
                echo "<td>";
                echo $avggotten = getaverage($first, $second, $third);
                echo "</td>";
                echo "<td>";
                echo $final = getfinalmark($indexno, $CheckIfReturnInF['subjectid'], $grade, $subclassname, "$Acadyear");
                echo "</td>";
                if ($final == "**")
                  $final = 0;
                if ($CheckIfReturnInF['intotal'] == 1) {
                  $finalresutls = (int)($final + $avggotten) / 2;
                  $totalforstudnet += $finalresutls;
                  if ($finalresutls < 50)
                    $fontred = 'red';
                  else
                    $fontred = 'green';
                  echo "<td><font color = '$fontred'>";
                  echo $finalresutls;
                  
                  echo "</font></td>";
                } else
                  echo "<td></td>";
                echo "</tr>";
              }

              ?>
              <tr>
                <td>--</td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong><?php echo $totalforstudnet; ?></strong></td>
              </tr>
              <tr>
                <td><strong>Standing</strong></td>
                <td><?php $stndlist = getstnd($grade, $subclassname);
                    echo $stndlist[$_POST['IndexNo']];
                    ?></td>
                <td><?php $stndlist = getstnd2($grade, $subclassname);
                    echo $stndlist[$_POST['IndexNo']];
                    ?></td>
                <td><?php $stndlist = getstnd3($grade, $subclassname);
                    echo $stndlist[$_POST['IndexNo']];
                    ?></td>
                <td></td>
                <td><?php $stndlist = getstndF($grade, $subclassname);
                    echo $stndlist[$_POST['IndexNo']];
                    ?></td>
                <td></td>
              </tr>
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