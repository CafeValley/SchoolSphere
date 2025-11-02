<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "All Students";
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
  leftsiderbar(5, 611);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <table>
      <form method="POST" action="SpReportAllStudentsbyclass_didntpay_Receipt.php">

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
          <td></td>
          <td><input type="submit" name="butseek" class="btn btn-info" value="Seek"></td>

        </tr>
      </form>
    </table> <?php if (isset($_POST['yearforsubject'])) { ?>
      <button type="submit" onclick="printDiv('printableArea')" class="btn btn-default">Print</button>
      <form action="exporttoexcelbyclass_didntpay_Receipt.php" method="post">
        <button type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-info">Copy To Excel</button>
        <input type="hidden" name="yearforsubject" value="<?php echo $_POST['yearforsubject']; ?>">
        <input type="hidden" name="subclassname" value="<?php echo $_POST['subclassname']; ?>">

      </form>
    <?php } ?>
    <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">



      <div class="table-responsive">
        <?php
        if (isset($_POST['yearforsubject'])) {
          echo "  <h2>";
          include('headerforprint.php');
          echo "</h2>";
          $yearselect = $_POST['yearforsubject'];
          $subclass   = $_POST['subclassname'];
          echo "<h4>$yearselect - $subclass</h4>";
          $SqlCommandForCFe = " SELECT `id`,`StudentName`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive` FROM `studentsregistered` , `student` WHERE  `IndexNo` = `studentindex`  and `yearselect` = '$yearselect' and `subclassname` = '$subclass' and studentsregistered.acadmicyear = '$Acadyear' order by `StudentName`  ";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

          $count = 1;
          $rowcounthere = $CheckIfHereInF->num_rows;
          if ($rowcounthere == 0) {
        ?>
            <div class="alert alert-info" role="alert">
              No students are registered in the class
            </div>
            <?php

          } else
            $count = 1;
          $firstinlist = 0;
          $studentlist = "";
          while ($row   = mysqli_fetch_array($CheckIfHereInF)) {

            $studentindex = $row['studentindex'];
            if ($firstinlist == 0) {
              $firstinlist++;
              $studentlist = $studentlist . " '" . $studentindex . "' ";
            } else
              $studentlist = $studentlist . " ,'" . $studentindex . "' ";
          }

          $SqlCommandForCFe2 = "SELECT `StudentName`, studentindex,sum(totaloffees) as totaloffees,`typeofpayment`
            FROM `studentsregisteredfees` , `student` where `IndexNo` = studentindex and `studentindex` in
            ($studentlist) and `typeofpayment` = 11 and `active1` = 1 and studentsregisteredfees.acadmicyear = '$Acadyear' group by studentindex , StudentName order by
            `StudentName`";
          $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);
          if ($rowcounthere > 0) {
            if ($count == 1) {
            ?>
              <table id="myTable" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th onclick="sortTableNumber(0)">NO</th>
                    <th onclick="sortTable(1)">Student Name</th>
                    <th onclick="sortTable(2)">Studnet Index</th>
                    <th onclick="sortTableNumber(3)">Due</th>
                    <th onclick="sortTableNumber(4)">Paid</th>
                    <th onclick="sortTableNumber(5)">Balance</th>
                    <th onclick="sortTableNumber(6)">Receipt</th>
                  </tr>
                </thead>
                <tbody>
              <?php
            }
            $Rlist = array();
            while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {

              echo "<tr>";
              echo "  <td>" . $count . "</td>";
              $studnetindex = $CheckIfReturnInF2['studentindex'];
              $Rlist = getReceiptlist($studnetindex);
              $count++;
              echo "  <td>" .  studentname($studnetindex) . "</td>";
              echo "  <td>" .  ($studnetindex) . "</td>";
              echo "  <td>" . mynumberformat($CheckIfReturnInF2['totaloffees'], 0) . "</td>";
              echo "  <td>" . mynumberformat(getamountpaied($studnetindex), 0) . "</td>";
              echo "  <td>" . intval($CheckIfReturnInF2['totaloffees'] - getamountpaied($studnetindex)) . "</td>";
              echo "<td>";
              foreach ($Rlist as $x => $x_value)
                echo $x_value . " ";
              echo "</td>";
              echo "</tr>";
            }
          }
              ?>
                </tbody>
                <?php

                if ($count > $rowcounthere + 2) {
                ?>
              </table>
            <?php
                }
            ?>

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

            tr:nth-child(even) {
              background-color: #f2f2f2
            }
          </style>

          <?php //end for the new code

          ?>
      </div>

    </div>




  </main>
  </div>

  </div>

  <!-- Bootstrap core JavaScript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php footer(); ?>