<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formname  = "termsheetstudents2.php";
$formnameheaderforprint = "Second Term";

$whereadded = " ";
$activeacademic = ' ';
$activeregister = ' ';
if (isset($_POST['sourceofdata'])) {
  $souceofdata = $_POST['sourceofdata'];


  if ($souceofdata == 'academic') {
    $activeacademic = 'checked';
    $whereadded = " and studentsregistered.acadmicyear = '$Acadyear' ";
  }
  if ($souceofdata == 'register') {
    $activeregister = 'checked';
    $whereadded = " and `active` = 1 ";
  }
} else {
  $activeregister = 'checked';
}


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
  leftsiderbar(3, 48);
  ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">
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
            <td>Source of Data</td>
            <td>


              <div class="form-check">
                <input class="form-check-input" name='sourceofdata' value='register' type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?php echo $activeregister; ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                  Current Registration
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name='sourceofdata' value='academic' type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?php echo $activeacademic; ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  By Academic Year
                </label>
              </div>
            </td>
          </tr>

          <tr>
            <td><input type="submit" value="Display" name="Getit" class="btn btn-dark"></td>
          </tr>
        </table>
      </form>

      <div id="printableArea" class="table-responsive">
        <?php
        if (isset($_POST['Getit'])) {

          //and `active` = 1
          //in case header needs to be back
          //include('headerforprintinside.php');
          $grade = $_POST['yearforsubject'];
          $subclassname = $_POST['subclassname'];
          $SqlCommandForCFe = " SELECT `id`,StudentName, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, studentsregistered.acadmicyear as acadmicyear FROM `studentsregistered`,`student`  WHERE  studentindex = IndexNo and `yearselect` = '$grade' and `subclassname` = '$subclassname'  $whereadded order by StudentName";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
          echo "Class <strong>" . $grade . "</strong> Stream <strong>" . $subclassname . "</strong>";
        ?>
          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTableNumber(0)">No</th>
                <?php
                if ($souceofdata == 'register') {
                  $AllowToGetMark = (getsubjectslistregister2nd($grade, $subclassname));
                } else
                  $AllowToGetMark = (getsubjectslist2nd($grade, $subclassname));
                echo "<br>";
                $listofcodes = array();
                $listofsubjects = array();
                foreach ($AllowToGetMark as $list) {
                  $listofcodes[] = $list['codename'];
                  $listofsubjects[] = $list['subjectname'];
                }
                if ($souceofdata == 'register') {
                  $stndlist = getstnd2avg($grade, $subclassname, 'register');
                } else
                  $stndlist = getstnd2avg($grade, $subclassname);
                ?>
                <th onclick="sortTable(1)">Name</th>
                <?php
                $ordercount = 1;
                foreach ($listofcodes as $list) {
                  $ordercount++;
                  echo "<th onclick='sortTableNumber($ordercount)'>$list</th>";
                }
                ?>
                <th onclick="sortTableNumber(<?php echo $ordercount += 1; ?>)">Avg</th>
                <th onclick="sortTableNumber(<?php echo $ordercount += 1; ?>)">Stnd</th>
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
                $numberofsubjects = 0;
                foreach ($listofsubjects as $key => $listin) {
                  echo "<td>";

                  $first = getmark2nd($studentindex, $listin, $grade, $subclassname, "$Acadyear");
                  echo mynumberformat($first, 0);
                  if ($first != '**') {
                    $totaldisplayed += $first;
                    $numberofsubjects++;
                  }
                  /*/else
                  {
                    $totaldisplayed += 0;
                    $numberofsubjects++;
                  }/*/
                  echo "</td>";
                }
                echo "<td>";
                if ($numberofsubjects == 0)
                  $numberofsubjects = 1;
                $z = ($totaldisplayed / $numberofsubjects);
                $z = number_format($z, 2, '.', '');
                echo $z;
                echo "</td>";
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