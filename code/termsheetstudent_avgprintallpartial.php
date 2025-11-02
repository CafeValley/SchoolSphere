<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "";
$formname  = "termsheetstudent.php";
$formnameheaderforprint = "Partial School Report";

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <link href="stylesforschoolreport.css" rel="stylesheet">
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    table {
      cell-padding: 0;
      cell-spacing: 0;
      width: 100%;
      border: 2px solid black;
    }

    @page {
      size: A4;
      margin: 0;
    }

      @media print {
      table {
        max-height: 100% !important;
        overflow: hidden !important;
        page-break-after: always;
      }
    }
  </style>
  <link rel="icon" href="favicon.ico">

  <title><?php echo $SYSTEM_NAME; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body onload="window.print();">


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php echo $formtitle ?></h2>

      <?php
      $syear = $_GET['syear'];
      $csyear = $_GET['csyear'];
      $grade = $syear;
      $subclassname = $csyear;
      $SqlCommandForCFebig2 = " SELECT distinct(studentindex) as studentindex , StudentName FROM `marks_first_term` ,
         `subjects` , `student` WHERE subjects.name =
         marks_first_term.subjectid and
         `class` = '$grade' and `subclassname` = '$subclassname' and marks_first_term.acadmicyear = '$Acadyear' and
         IndexNo = `studentindex` order by StudentName";
      $CheckIfHereInFbig2 = mysqli_query($link, $SqlCommandForCFebig2);

      $stndlist = getstndavg($grade, $subclassname);
      $stndlist2 = getstnd2avg($grade, $subclassname);
     
      while ($CheckIfReturnInFbig = mysqli_fetch_array($CheckIfHereInFbig2)) {
        $indexnobig = $CheckIfReturnInFbig['studentindex'];
        $_POST['IndexNo'] = $indexnobig;

      ?>
        <div id="printableArea" class="table-responsive">
          <?php
          include('headerforprintinsidesinglestudent.php');
          ?>

          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTable(0)">Subjects</th>
                <th onclick="sortTable(1)">Term 1</th>
                <th onclick="sortTable(2)">Term 2</th>
               
               
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;

              $totalforstudnet1st = 0;
              $totalforstudnet2nd = 0;
              $totalforstudnet3rd = 0;
              $numberofsubjects = 0;
              $numberofsubjectsfirst = 0;
              $numberofsubjectssecond = 0;
              $numberofsubjectsthird = 0;
              $totalforstudnet = 0;

              $AllowToGetMark = (getsubjectslistperstudent($grade, $subclassname,"all",$indexnobig));
              foreach ($AllowToGetMark as $list) {
                $indexno = $indexnobig;
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


                <td><?php echo $za ?></td>
                <td><?php echo $zb ?></td>
             
             
               
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
              
                <td></td>
              
                </tr>
              <tr><td colspan="3"></td></tr>
              <tr><td colspan="3"> <br /></td></tr>
              <tr><td colspan="3"> <br /></td></tr>
              <tr><td colspan="3"> <br /></td></tr>

              <tr><td colspan="3">Parent's Signature </td></tr>
              <tr><td colspan="3"> <br /></td></tr>
              <tr><td colspan="3">1st term ____________________________________________________________</td></tr>
              <tr><td colspan="3"> <br /></td></tr>
              <tr><td colspan="3">2nd term ____________________________________________________________</td></tr>
              <tr><td colspan="3"> <br /></td></tr>
              <tr><td colspan="3">3rd term ____________________________________________________________</td></tr>
              <tr><td colspan="3"> <br /></td></tr>

            </tbody>
            </tbody>
          </table>
          <?php //new code here

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

<?php } ?>
</main>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php footer(); ?>