<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Student (Edit - Delete)";
$formwhereto = "EditdeleteStudent.php";
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
      leftsiderbar(1, 13);
      ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <?php
      //  print_r($_POST);
      if (isset($_POST['EditBut'])) {
        $theid = $_POST['theid'];
        $sqledit  = " SELECT `Id_Student`, `StudentName`, year(Dateofbirth) as Dateofbirth, `Nationality`, `Religion`, `Address_area`, `phone1`, `phone2`, `Email`, `IndexNo` FROM `student` where `Id_Student` =  '$theid'";
        $editback = mysqli_query($link, $sqledit);
        $rowedit  = mysqli_fetch_array($editback);

      ?>
      <table class="table table-striped table-sm">
        <form action="<?php echo $formwhereto; ?>" method="POST">
          <input type="hidden" name="theid" value="<?php echo $theid; ?>">
          <tr>
            <td>Index No</td>
            <td>
              <div class="col-md-6">
                <input name="IndexNo" disabled type="text" class="form-control"
                  value="<?php echo $rowedit['IndexNo']; ?>">
                <input name="IndexNo" type="hidden" class="form-control" value="<?php echo $rowedit['IndexNo']; ?>">

                <div>
            </td>
          </tr>
          <tr>
            <td>Student Name</td>
            <td>
              <div class="col-md-6">
                <input name="Studentname" type="text" class="form-control"
                  value="<?php echo $rowedit['StudentName']; ?>">
              </div>
            </td>
          </tr>
          <tr>
            <td>Date of birth</td>
            <td>
              <div class="col-md-6">

                <input type="text" name="dateofbirth" class="form-control"
                  value="<?php echo $rowedit['Dateofbirth']; ?>">
              </div>
            </td>
          </tr>

          <tr>
            <td>Nationality</td>
            <td>
              <div class="col-md-6">

                <select name="Nationality" class="custom-select d-block w-100">

                  <?php
                    switch ($rowedit['Nationality']) {
                      case '0': { ?>
                  <option selected value="0">Nationality</option>
                  <option value="Sudanese">Sudanese</option>
                  <option value="non Sudanese">non Sudanese</option>
                  <?php break;
                        }
                      case 'non Sudanese': { ?>
                  <option value="0">Nationality</option>
                  <option value="Sudanese">Sudanese</option>
                  <option selected value="non Sudanese">non Sudanese</option>
                  <?php break;
                        }
                      case 'Sudanese': { ?>
                  <option value="0">Nationality</option>
                  <option selected value="Sudanese">Sudanese</option>
                  <option value="non Sudanese">non Sudanese</option>
                  <?php break;
                        }
                    }
                    ?>

                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>Religion</td>
            <td>
              <div class="col-md-6">
                <select name="Religion" class="custom-select d-block w-100">

                  <?php
                    switch ($rowedit['Religion']) {
                      case '0': { ?>
                <option selected value="0">Religion</option>
                  <option value="Muslim">Muslim</option>
                  <option value="Catholic Christian">Catholic Christian</option>
                  <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                  <option value="other">Other</option>
                  <?php break;
                        }
                      case 'Muslim': { ?>
                <option value="0">Religion</option>
                  <option selected value="Muslim">Muslim</option>
                  <option value="Catholic Christian">Catholic Christian</option>
                  <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                  <option value="other">Other</option>
                  <?php break;
                        }
                      case 'Catholic Christian': { ?>
                <option value="0">Religion</option>
                  <option value="Muslim">Muslim</option>
                  <option selected value="Catholic Christian">Catholic Christian</option>
                  <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                  <option value="other">Other</option>
                  <?php break;
                        }
                        case 'Non-Catholic Christian': { ?>
                          <option value="0">Religion</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Catholic Christian">Catholic Christian</option>
                            <option selected value="Non-Catholic Christian">Non-Catholic Christian</option>
                            <option value="other">Other</option>
                            <?php break;
                                  }
                      case 'other': { ?>
                  <option value="0">Religion</option>
                  <option value="Muslim">Muslim</option>
                  <option value="Catholic Christian">Catholic Christian</option>
                  <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                  <option selected value="other">Other</option>
                  <?php break;
                        }
                        default:
                        {
                          ?>
                          <option selected value="0">Religion</option>
                          <option value="Muslim">Muslim</option>
                          <option value="Catholic Christian">Catholic Christian</option>
                          <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                          <option  value="other">Other</option>
                          <?php break;
                                }
                    }
                    ?>
                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              Address(Area)</td>
            <td>
              <div class="col-md-6">
                <input type="text" name="Address" class="form-control" value="<?php echo $rowedit['Address_area']; ?>">
                <div>
            </td>
          </tr>


          <tr>
            <td>
              phone</td>
            <td>
              <div class="col-md-6">
                <input type="text" name="phone1" class="form-control" value="<?php echo $rowedit['phone1']; ?>">
                <input type="text" name="phone2" class="form-control" value="<?php echo $rowedit['phone2']; ?>">
                <div>
            </td>
          </tr>
          <tr>
            <td>
              Email</td>
            <td>
              <div class="col-md-6">
                <input type="email" name="Email" class="form-control" value="<?php echo $rowedit['Email']; ?>">
                <div>
            </td>
          </tr>

          <tr>
            <td colspan='2'>
              <input name="Editinin" value="Edit" class="btn btn-warning btn-sm" type="submit">
        </form>
        </td>
        </tr>
      </table>
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
        $SqlCommandForCFe = "delete from `student` WHERE `Id_Student`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe);
        echo "->Date Removed";
      }
      ?>
      <tr>

      </tr>
      <?php
      if (isset($_POST['Editinin']))
        if ($_POST['Editinin']) {
          $theid       = $_POST['theid'];
          $IndexNo     = $_POST['IndexNo'];
          $Studentname = $_POST['Studentname'];
          if (empty($_POST['dateofbirth']))
            $_POST['dateofbirth']='0000';
          $dateofbirth = $_POST['dateofbirth']."-1-1";
          
          $Nationality = $_POST['Nationality'];
          $Religion    = $_POST['Religion'];
          $Address     = $_POST['Address'];
          $phone1      = $_POST['phone1'];
          $phone2      = $_POST['phone2'];
          $Email       = $_POST['Email'];

          $SqlCommandForCFe = "UPDATE `student` SET `StudentName`= '$Studentname',`Dateofbirth`= '$dateofbirth',`Nationality`= '$Nationality',`Religion`= '$Religion',`Address_area`= '$Address',`phone1`='$phone1',`phone2`='$phone2',`Email`='$Email',`IndexNo`= '$IndexNo' WHERE `Id_Student`= '$theid' ";
          mysqli_query($link, $SqlCommandForCFe);

      ?>
      <div class="alert alert-warning" role="alert">
        Record Edited Successfully
      </div>
      <?php
          //print_r($_POST);
        }

      $SqlCommandForCFe = " SELECT `Id_Student`, `StudentName`, Year(Dateofbirth) as Dateofbirth , `Nationality`, `Religion`, `Address_area`, `phone1`, `phone2`, `Email`, `IndexNo` FROM `student` order by `Id_Student` desc ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      ?>
      <table id="myTable" class="table table-striped table-sm">

        <thead>
          <tr>

            <th onclick="sortTable(0)">Student Name</th>
            <th onclick="sortTable(1)">Year of Birth</th>
            <th onclick="sortTable(2)">Nationality</th>
            <th onclick="sortTable(3)">Religion</th>
            <th onclick="sortTable(4)">Address Area</th>
            <th onclick="sortTable(5)">Phone1 - Phone2</th>
            <th onclick="sortTable(6)">Email</th>
            <th onclick="sortTable(7)">Index No</th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          <?php
          //if you want to remove the last one
          //$rowcount = mysqli_num_rows($CheckIfHereInF);
          $rowcount=1;
          $i = 0;
          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
            $i++;
            echo "<tr>";
            echo "<form action = '$formwhereto' method='POST'>";
            echo "<input type = 'hidden' value = '" . $CheckIfReturnInF['Id_Student'] . "' name = 'theid'>";
            echo "  <td>" . $CheckIfReturnInF['StudentName'] . "</td>";

            echo "  <td>" . $CheckIfReturnInF['Dateofbirth'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['Nationality'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['Religion'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['Address_area'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['phone1'] . " - ";
            echo "   " . $CheckIfReturnInF['phone2'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['Email'] . "</td>";
            echo "  <td>" . $CheckIfReturnInF['IndexNo'] . "</td>";
            echo "<td>";
            echo "<input type = 'submit' name = 'EditBut' value = 'Edit' class = 'btn btn-warning btn-sm'>";

            if ($i == $rowcount)
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