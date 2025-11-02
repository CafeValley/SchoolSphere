<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Register (Edit Class-Stream)";
$formwhereto = "EditdeleteRegistersubclass.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title><?php echo $SYSTEM_NAME; ?></title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body><?php
      upsiderbar(2);
      leftsiderbar(6, 21);
      ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h2>
      <?php
      //  print_r($_POST);

      if (isset($_POST['changedtoA'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='A' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed A Stream Successfully
        </div>
      <?php
      }

      if (isset($_POST['changedtoB'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='B' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed B Stream Successfully
        </div>
      <?php
      }
      if (isset($_POST['changedtoC'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='C' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed C Stream Successfully
        </div>
      <?php
      }
      if (isset($_POST['changedtoD'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='D' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed D Stream Successfully
        </div>
      <?php
      }
      if (isset($_POST['changedtoE'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='E' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed E Stream Successfully
        </div>
      <?php
      }
      if (isset($_POST['changedtoF'])) {
        $theid       = $_POST['theid'];

        $SqlCa = " UPDATE `studentsregistered` SET `subclassname`='F' where `id`='$theid'";
        mysqli_query($link, $SqlCa);
      ?>
        <div class="alert alert-success" role="alert">
          Changed F Stream Successfully
        </div>
      <?php
      }
      ?>
      <?php echo $formtitle ?>
    </h2>

    <div class="table-responsive">

      <?php
      $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `feesregis`,`subclassname`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `active` = 1 ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      ?>
      <table id="myTable" class="table table-striped table-sm">
        <thead>
          <tr>

            <th onclick="sortTable(0)"> Student Index</th>
            <th onclick="sortTable(1)"> Student Name</th>
            <th onclick="sortTable(2)"> Class-Stream</th>
            <th> </th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          <?php
          $rowcount = mysqli_num_rows($CheckIfHereInF);
          $i = 0;
          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
            $i++;
            echo "<tr>";
            echo "<form action = '$formwhereto' method='POST'>";
            echo "<input type = 'hidden' value = '" . $CheckIfReturnInF['id'] . "' name = 'theid'>";
            echo "  <td>" . $CheckIfReturnInF['studentindex'] . "</td>";
            echo "  <td>" . studentname($CheckIfReturnInF['studentindex']) . "</td>";

            echo "  <td>" . $CheckIfReturnInF['yearselect'] . " - " . $CheckIfReturnInF['subclassname'] . "</td>";

            echo "<td>";

            echo "<input type = 'submit' name = 'changedtoA' value = 'A' class = 'btn btn-warning btn-sm'>";
            echo " ";
            echo "<input type = 'submit' name = 'changedtoB' value = 'B' class = 'btn btn-info btn-sm'>";
            echo " ";
            echo "<input type = 'submit' name = 'changedtoC' value = 'C' class = 'btn btn-light btn-sm'>";
            echo " ";
            echo "<input type = 'submit' name = 'changedtoD' value = 'D' class = 'btn btn-dark btn-sm'>";
            echo " ";
            echo "<input type = 'submit' name = 'changedtoE' value = 'E' class = 'btn btn-secondary btn-sm'>";
            echo " ";
            echo "<input type = 'submit' name = 'changedtoF' value = 'F' class = 'btn btn-primary btn-sm'>";
            echo "</td>";
            echo "</tr>";
            echo "</form>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
================================================== -->
  <?php footer(); ?>