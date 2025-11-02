<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Subject (Edit - Delete)";
$formwhereto = "EditdeleteSubject.php";
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
      leftsiderbar(1, 16);
      ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <h2><?php echo $formtitle ?></h2>

      <div class="table-responsive">
        <?php
      //  print_r($_POST);
      if (isset($_POST['EditBut'])) {
        $theid = $_POST['theid'];
        $sqledit  = " SELECT `id`, `name`, `intotal`,`codename`, `priorityinr` FROM `subjects` where `id` =  '$theid'";
        $editback = mysqli_query($link, $sqledit);
        $rowedit  = mysqli_fetch_array($editback);

      ?>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <form action="<?php echo $formwhereto; ?>" method="POST">
              <input type="hidden" name="theid" value="<?php echo $theid; ?>">

              <tr>
                <td>Subject Name</td>
                <td>
                  <div class="col-md-6">
                    <input value="<?php echo $rowedit['name']; ?>" name="SubjectName" type="text" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Result Relation</td>
                <td>
                  <div class="col-md-6">
                    <select name='notin' class="form-control">
                      <?php if ($rowedit['intotal'] == 1)
                      {
                        echo "<option selected value='1'>Curricular</option>";
                        echo "<option value='0'>Extra Curricular</option>";
                      }
                      ?>
                      <?php if ($rowedit['intotal'] == 0)
                      {
                        echo "<option selected value='0'>Extra Curricular</option>";
                        echo "<option value='1'>Curricular</option>";
                      }
                      ?>

                    </select>
                    <div>
                </td>
              </tr>
              <tr>
                <td>Code Name</td>
                <td>
                  <div class="col-md-6">
                    <input name="codename" value="<?php echo $rowedit['codename']; ?>" type="text" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Priority in Result</td>
                <td>
                  <div class="col-md-6">

                    <select name="priorityinr" type="text" class="form-control">
                      <?php
                      if ($rowedit['priorityinr'] == 1)
                        echo "<option selected value = '1'>1</option>";
                      else
                        echo "<option value = '1'>1</option>";
                      if ($rowedit['priorityinr'] == 2)
                        echo "<option selected value = '2'>2</option>";
                      else
                        echo "<option value = '2'>2</option>";
                      if ($rowedit['priorityinr'] == 3)
                        echo "<option selected value = '3'>3</option>";
                      else
                        echo "<option value = '3'>3</option>";
                      if ($rowedit['priorityinr'] == 4)
                        echo "<option selected value = '4'>4</option>";
                      else
                        echo "<option value = '4'>4</option>";
                      if ($rowedit['priorityinr'] == 5)
                        echo "<option selected value = '5'>5</option>";
                      else
                        echo "<option value = '5'>5</option>";
                      if ($rowedit['priorityinr'] == 6)
                        echo "<option selected value = '6'>6</option>";
                      else
                        echo "<option value = '6'>6</option>";
                      if ($rowedit['priorityinr'] == 7)
                        echo "<option selected value = '7'>7</option>";
                      else
                        echo "<option value = '7'>7</option>";
                      if ($rowedit['priorityinr'] == 8)
                        echo "<option selected value = '8'>8</option>";
                      else
                        echo "<option value = '8'>8</option>";
                      if ($rowedit['priorityinr'] == 9)
                        echo "<option selected value = '9'>9</option>";
                      else
                        echo "<option value = '9'>9</option>";
                      if ($rowedit['priorityinr'] == 10)
                        echo "<option selected value = '10'>10</option>";
                      else
                        echo "<option value = '10'>10</option>";
                      if ($rowedit['priorityinr'] == 11)
                        echo "<option selected value = '11'>11</option>";
                      else
                        echo "<option value = '11'>11</option>";
                      if ($rowedit['priorityinr'] == 12)
                        echo "<option selected value = '12'>12</option>";
                      else
                        echo "<option value = '12'>12</option>";
                      if ($rowedit['priorityinr'] == 13)
                        echo "<option selected value = '13'>13</option>";
                      else
                        echo "<option value = '13'>13</option>";
                      if ($rowedit['priorityinr'] == 14)
                        echo "<option selected value = '14'>14</option>";
                      else
                        echo "<option value = '14'>14</option>";

                      ?>
                    </select>

                  </div>
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
      if (isset($_POST['RemoveBut'])) {
        $theid       = $_POST['theid'];
      ?>
        <form action="<?php echo $formwhereto; ?>" method="POST">

          <input type="hidden" name="theid" value="<?php echo $theid; ?>">
          <input value="Click here again if you are Sure " name="realRemoveBut" type="submit"
            class="btn btn-danger btn-sm">
        </form>
        <?php
      }
      if (isset($_POST['realRemoveBut'])) {
        $theid             = $_POST['theid'];
        $SqlCommandForCFe = "delete from `subjects` WHERE `id`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe);
        echo "->Date Removed";
      }
      ?>
        <tr>

        </tr>
        <?php
      if (isset($_POST['Editinin']))
        if ($_POST['Editinin']) {
          $theid = $_POST['theid'];
          $name  = $_POST['SubjectName'];
          $year  = $_POST['notin'];
          $codename  = $_POST['codename'];
          $priorityinr  = $_POST['priorityinr'];

$Sqlcheck = " SELECT `name` FROM `subjects` where `id` = $theid ";
$Checkif      = mysqli_query($link, $Sqlcheck);
$rowcheck   = mysqli_fetch_array($Checkif);
$oldname = $rowcheck['name'];
if ($name != $oldname)
{
  mysqli_query($link, "UPDATE `marks_first_term` SET `subjectid`='$name' WHERE `subjectid` = '$oldname'");
  mysqli_query($link, "UPDATE `marks_second_term` SET `subjectid`='$name' WHERE `subjectid` = '$oldname'");
  mysqli_query($link, "UPDATE `marks_third_term` SET `subjectid`='$name' WHERE `subjectid` = '$oldname'");
  mysqli_query($link, "UPDATE `marks_finalexams` SET `subjectid`='$name' WHERE `subjectid` = '$oldname'");
}

          $SqlCommandForCFe = "UPDATE `subjects` SET `name`='$name',`intotal`='$year' ,`codename`='$codename' , `priorityinr`='$priorityinr'  WHERE `id`= '$theid' ";
          mysqli_query($link, $SqlCommandForCFe);

      ?>
        <div class="alert alert-warning" role="alert">
          Record Edited Successfully
        </div>
        <?php
          //print_r($_POST);
        }

      $SqlCommandForCFe = " SELECT `id`, `name`, `intotal` , `codename`, `priorityinr` FROM `subjects` ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>
            <tr>

              <th onclick="sortTable(0)">Name</th>

              <th onclick="sortTable(1)">Grade</th>
              <th onclick="sortTable(2)">Code Name</th>
              <th onclick="sortTableNumber(3)">Priority</th>
              <th></th>

            </tr>
          </thead>
          <tbody>
            <?php

          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
            echo "<tr>";
            echo "<form action = '$formwhereto' method='POST'>";
            echo "<input name = 'theid' value = '" . $CheckIfReturnInF['id'] . "' type = 'hidden'>";

            echo "  <td>" . $CheckIfReturnInF['name'] . "</td>";

            if ($CheckIfReturnInF['intotal'] == 1)
              echo " <td> Curricular</td>";
            if ($CheckIfReturnInF['intotal'] == 0)
              echo " <td> Extra Curricular</td>";

            echo "  <td>" . $CheckIfReturnInF['codename'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['priorityinr'] . "</td>";


            echo "<td>";
            echo "<input type = 'submit' name = 'EditBut' value = 'Edit' class = 'btn btn-warning btn-sm'>";
            echo "<input type = 'submit' name = 'RemoveBut' value = 'Remove' class = 'btn btn-danger btn-sm'>";
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