<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formname  = "termsheetstudent_avg.php";
$formnameheaderforprint = "Final School Report";
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
  <link href="stylesforschoolreport.css" rel="stylesheet">
</head>

<body>
  <?php
  upsiderbar(4);
  leftsiderbar(3, 46);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php echo $formtitle ?></h2>
      <?php
      if (isset($_POST['IndexNo']))
        $_POST['IndexNo'] = studentindexcap($_POST['IndexNo']);
      if (isset($_POST['tree'])) {
        $syear  = $_POST['yearforsubject'];
        $csyear = $_POST['subclassname'];
        $link = "<script>
          window.open('termsheetstudent_avgprintall.php?csyear=" . $csyear . "&syear=" . $syear . "','_blank',
          'toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=800')
          </script>";
        echo $link;

        header("refresh:1;url=termsheetstudent_avg.php");
        die();
      }
      ?>
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
            <td colspan='2'><input type="submit" value="Display" name="Getit" class="btn btn-dark">
              <input type="submit" value="Print All" name="tree" class="btn btn-dark">
            </td>
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

          $stndlist = getstndavg($grade, $subclassname);
          $stndlist2 = getstnd2avg($grade, $subclassname);
          $stndlist3 = getstnd3avg($grade, $subclassname);
          $stndlistF = getstndFavg($grade, $subclassname);
          $stndlistFresults = getstndFresults($grade, $subclassname);
        ?>
          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTable(0)">Subjects</th>
                <th onclick="sortTable(1)">Term 1</th>
                <th onclick="sortTable(2)">Term 2</th>
                <th onclick="sortTable(3)">Term 3</th>

                <th onclick="sortTable(4)">Average</th>
                <th onclick="sortTable(5)">Final Exams</th>
                <th onclick="sortTable(6)">Final Result</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
              $totalforstudnet1st = 0;
              $totalforstudnet2nd = 0;
              $totalforstudnet3rd = 0;
              $totalforstudnet = 0;
              $numberofsubjects = 0;
              $numberofsubjectsfirst = 0;
              $numberofsubjectssecond = 0;
              $numberofsubjectsthird = 0;

              $AllowToGetMark = (getsubjectslistperstudent($grade, $subclassname, "all", $indexno));
              foreach ($AllowToGetMark as $list) {
                echo "<tr>";
                echo "  <td>" . $list['subjectname'] . "</td>";
                echo "<td>";
                $first = getmarkfirst($indexno, $list['subjectname'], $grade, $subclassname, "$Acadyear");
                if ($first != '**')
                  if ($list['intotal'] == 1) {
                    $totalforstudnet1st += $first;
                    $numberofsubjectsfirst++;
                  }
                echo mynumberformat($first, 0);
                echo "</td>";
                echo "<td>";
                $second = getmark2nd($indexno, $list['subjectname'], $grade, $subclassname, "$Acadyear");
                if ($second != '**')
                  if ($list['intotal'] == 1) {
                    $totalforstudnet2nd += $second;
                    $numberofsubjectssecond++;
                  }
                echo mynumberformat($second, 0);
                echo "</td>";
                echo "<td>";
                $third = getmark3rd($indexno, $list['subjectname'], $grade, $subclassname, "$Acadyear");
                if ($third != '**')
                  if ($list['intotal'] == 1) {
                    $totalforstudnet3rd += $third;
                    $numberofsubjectsthird++;
                  }
                echo mynumberformat($third, 0);
                echo "</td>";
                echo "<td>";
                $avggotten = getaverage($first, $second, $third);
                echo mynumberformat($avggotten, 0);
                echo "</td>";
                echo "<td>";
                $final = getfinalmark($indexno, $list['subjectname'], $grade, $subclassname, "$Acadyear");
                echo mynumberformat($final, 0);
                echo "</td>";
                $divnumber = 2;
                if ($final == "**") {
                  $final = 0;
                  $divnumber = 1;
                }
                if ($list['intotal'] == 1) {
                  $numberofsubjects++;
                  $finalresutls = ($final + $avggotten) / $divnumber;
                  $totalforstudnet += $finalresutls;
                  /*/  if ($finalresutls < 50)
                    $fontred = 'red';
                  else
                    $fontred = 'green';
/*/
                  echo "<td>";
                  echo mynumberformat($finalresutls, 0);
                  echo "</td>";
                } else
                  echo "<td></td>";
                echo "</tr>";
              }

              ?>
              <tr>
                <td>--</td>
              </tr>
              <tr>
                <td><strong>Average</strong></td>

                <?php
                if ($numberofsubjectsfirst == 0)
                  $za = "*";
                else {
                  $za = ($totalforstudnet1st / $numberofsubjectsfirst);
                  $za = number_format($za, 2, '.', '');
                }
                ?>
                <?php
                if ($numberofsubjectssecond == 0)
                  $zb = "*";
                else {
                  $zb = ($totalforstudnet2nd / $numberofsubjectssecond);
                  $zb = number_format($zb, 2, '.', '');
                }
                ?>

                <?php
                if ($numberofsubjectsthird == 0)
                  $zc = "*";
                else {
                  $zc = ($totalforstudnet3rd / $numberofsubjectsthird);
                  $zc = number_format($zc, 2, '.', '');
                }
                ?>

                <td><?php echo $za ?></td>
                <td><?php echo $zb ?></td>
                <td><?php echo $zc ?></td>
                <td></td>
                <td></td>
                <?php $zw = ($totalforstudnet / $numberofsubjects); ?>
                <td><strong><?php echo $zw;  ?></strong>
                </td>
              </tr>
              <tr>
                <td><strong>Standing</strong></td>
                <td><?php
                    echo $stndlist[$_POST['IndexNo']];
                    echo " / " . count($stndlist);
                    ?></td>
                <td><?php
                    echo $stndlist2[$_POST['IndexNo']];
                    echo " / " . count($stndlist2);
                    ?></td>
                <td><?php
                    echo $stndlist3[$_POST['IndexNo']];
                    echo " / " . count($stndlist3);
                    ?></td>
                <td></td>
                <td><?php
                    echo $stndlistF[$_POST['IndexNo']];
                    echo " / " . count($stndlistF);
                    ?></td>
                <td><?php
                    echo $stndlistFresults[$_POST['IndexNo']];
                    echo " / " . count($stndlistFresults);
                    ?></td>
              </tr>
              <tr>
                <td colspan="7"></td>
              </tr>
              <tr>
                <td colspan="7"> <br /></td>
              </tr>



              <tr>
                <td colspan="7">Parent's Signature </td>
              </tr>
              <tr>
                <td colspan="7"> <br /></td>
              </tr>
              <tr>
                <td colspan="7">1st term ____________________________________________________________</td>
              </tr>
              <tr>
                <td colspan="7"> <br /></td>
              </tr>
              <tr>
                <td colspan="7">2nd term ____________________________________________________________</td>
              </tr>
              <tr>
                <td colspan="7"> <br /></td>
              </tr>
              <tr>
                <td colspan="7">3rd term ____________________________________________________________</td>
              </tr>
              <tr>
                <td colspan="7"> <br /></td>
              </tr>
            </tbody>
          </table>
        <?php //new code here
        }
        ?>
        <?php //end for the new code
        if (isset($_POST['Getit'])) {
        ?>

          <footer class="text-center ">
            <!-- Grid container -->

            <!-- Section: Images -->
            <section class="">
              <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                  <strong class="d-inline-block mb-2">Headmaster's Signature </strong>
                  <br><br><br>
                  ------------------------------
                </div>

                <div class="col-6 d-flex justify-content-end align-items-center mt-2">
                  <div class="col-6 pt-1">
                    <strong class="d-inline-block mb-2">Final Remark</strong>
                    <br><br><br>
                    ------------------------------
                  </div>
                </div>
              </div>
            </section>
            <!-- Section: Images -->

            <!-- Grid container -->

            <!-- Copyright -->

            <!-- Copyright -->
          </footer>
        <?php } ?>



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