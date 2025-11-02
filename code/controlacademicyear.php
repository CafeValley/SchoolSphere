<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Academic Year";
$formwhereto = "controlacademicyear.php";
//2017-2018
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
      upsiderbar(1);
      leftsiderbar(1, 17);
      ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <?php
      //  print_r($_POST);
      if (isset($_POST['EditBut'])) {
      ?>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <form action="<?php echo $formwhereto; ?>" method="POST">
              <tr>
                <td>Start</td>
                <td>
                  <div class="col-md-6">
                    <select name="beginyear">
                      <option>Start-Year</option>
                      <?php

                      $icurrent = date('Y') + 1;
                      for (($iset = date('Y') - 10); $icurrent > $iset; $iset++)
                        echo "<option>$iset</option>";
                      ?>
                    </select>
                    <div>
                </td>
              </tr>

              <tr>
                <td colspan='2'>
                  <input name="Editinin" value="Save" class="btn btn-dark" type="submit">
            </form>
            </td>
            </tr>

          </table>
        </div>

      <?php
      }
      if (isset($_POST['setcurrent'])) {

        mysqli_query($link, "UPDATE `academicyear` SET `active`=0");
        mysqli_query($link, "UPDATE `academicyear` SET `active`=1 where `idoftable` = " . $_POST['theid']);

      ?>
        <div class="alert alert-success" role="alert">
          Current Set
        </div>
      <?php

      }
      if (isset($_POST['RemoveBut'])) {
        $theid       = $_POST['theid'];
      ?>
        <form action="<?php echo $formwhereto; ?>" method="POST">

          <input type="hidden" name="theid" value="<?php echo $theid; ?>">
          <input value="Are you Sure !" name="realRemoveBut" type="submit" class="btn btn-danger btn-sm">
        </form>
      <?php
      }
      if (isset($_POST['realRemoveBut'])) {
        $theid             = $_POST['theid'];
        $SqlCommandForCFe = "delete from `academicyear` WHERE `idoftable`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe);
      ?>
        <div class="alert alert-danger" role="alert">
          Removed Successfully
        </div>
      <?php
      }
      ?>
      <tr>

      </tr>
      <?php
      if (isset($_POST['Editinin']))
        if ($_POST['Editinin']) {

          $name  = $_POST['beginyear'];
          $namemade = $name . " - " . intval($name + 1);


          mysqli_query($link, "UPDATE `academicyear` SET `active`=0");
          $SqlCommandForCFe = "INSERT INTO `academicyear`( `name`, `active`) VALUES ('$namemade','1')";
          mysqli_query($link, $SqlCommandForCFe);
          //

      ?>
        <div class="alert alert-success" role="alert">
          Date Added Successfully
        </div>
      <?php
          //print_r($_POST);
        }

      $SqlCommandForCFe = " SELECT `idoftable`, `name`, `active`, `dateoftthis` FROM `academicyear`  ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      if ($CheckIfHereInF->num_rows == 0) {
      ?>
        <form action="<?php echo $formwhereto; ?>" method="POST">
          <input type='submit' name='EditBut' value='New' class='btn btn-warning btn-sm'>
        </form>
      <?php
      } else {

      ?>
        <form action="<?php echo $formwhereto; ?>" method="POST">
          <input type='submit' name='EditBut' value='New' class='btn btn-warning btn-sm'>
        </form>
        <table class="table table-striped table-sm">
          <thead>
            <tr>

              <th> Name</th>
              <th>Current</th>
              <th></th>

            </tr>
          </thead>
          <tbody>
            <?php

            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
              echo "<tr>";
              echo "<form action = '$formwhereto' method='POST'>";
              echo "<input name = 'theid' value = '" . $CheckIfReturnInF['idoftable'] . "' type = 'hidden'>";

              echo "  <td>" . $CheckIfReturnInF['name'] . "</td>";

              echo "  <td>";
              if ($CheckIfReturnInF['active'] == 1)
                echo "Current";
              else
                echo "Past";
              echo "</td>";

              echo "<td>";
              echo "<input type = 'submit' name = 'setcurrent' value = 'Current' class = 'btn btn-warning btn-sm'>";
              echo " ";
              echo "<input type = 'submit' name = 'RemoveBut' value = 'Remove' class = 'btn btn-danger btn-sm'>";
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