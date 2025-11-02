<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Register Fix Activision";
$formwhereto = "Registerfix.php";
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
      leftsiderbar(6, 25);
      ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">


      <?php
      //  print_r($_POST);


      if (isset($_POST['inactive'])) {
        $theid             = $_POST['theid'];

        $regisfeessql = "UPDATE `studentsregistered` SET `active`=0 WHERE `id` = '$theid'";
        mysqli_query($link, $regisfeessql);


      ?>
        <div class="alert alert-info" role="alert">
          Inactivision Changed Successfully
        </div>
      <?php
      }
      if (isset($_POST['active'])) {
        $theid             = $_POST['theid'];

        $regisfeessql = "UPDATE `studentsregistered` SET `active`=1 WHERE `id` = '$theid'";
        mysqli_query($link, $regisfeessql);


      ?>
        <div class="alert alert-info" role="alert">
          Activision Changed Successfully
        </div>
      <?php
      }
      ?>
      <form action='<?php echo $formwhereto; ?>' method='POST'>
        <?php

        $SqlCommandForCFe2 = " SELECT distinct(acadmicyear) as acadmicyear FROM `studentsregistered`   ";
        $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);
        echo "<select name = 'filterslect' class = 'custom-select d-block w-100'>";
        while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {

          $acadmicyearfilter =  $CheckIfReturnInF2['acadmicyear'];
        ?>

          <option value='<?php echo $acadmicyearfilter; ?>'><?php echo $acadmicyearfilter; ?></option>

        <?php
        }
        ?>
        </select>
        <br>
        <input type='submit' name='filter' value='Filter' class='btn btn-primary btn-sm'>
      </form>
      <?php
      if (isset($_POST['filterslect'])) {
        echo "For " . $filterselect = $_POST['filterslect'];
        $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `feesregis`,`subclassname`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit` FROM `studentsregistered` where acadmicyear='$filterselect'   ";
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

              if ($CheckIfReturnInF['active'] == 1)
                echo "<input type = 'submit' name = 'inactive' value = 'inactive' class = 'btn btn-warning btn-sm'>";
              else
                echo "<input type = 'submit' name = 'active' value = 'active' class = 'btn btn-info btn-sm'>";



              echo "</td>";
              echo "</tr>";
              echo "</form>";
            }
            ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
================================================== -->
  <?php footer(); ?>