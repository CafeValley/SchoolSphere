<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Register (Delete)";
$formwhereto = "EditdeleteRegister.php";
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
      leftsiderbar(6, 22);
      ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <h2><?php echo $formtitle ?></h2>

      <div class="table-responsive">


        <?php
      //  print_r($_POST);

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

        $regisfeessql = "DELETE FROM `studentsregisteredfees` WHERE `relatedregisid` = '$theid'";
        mysqli_query($link, $regisfeessql);

        $SqlCommandForCFe = "delete from `studentsregistered` WHERE `id`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe);

        $SqlCommandForCFe23 = "DELETE FROM `discountdata` WHERE `regisid`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe23);
      ?>
        <div class="alert alert-danger" role="alert">
          Removed Successfully
        </div>
        <?php
      }
      $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `feesregis`,`subclassname`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `active` = 1 ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>
            <tr>

              <th onclick="sortTable(0)"> Student Index</th>
              <th onclick="sortTable(1)"> Student Name</th>
              <th onclick="sortTable(2)"> Class-Stream</th>
              <th onclick="sortTable(3)">Fees Regis </th>
              <th onclick="sortTable(4)"> Fees year</th>
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

            echo "  <td>" . mynumberformat($CheckIfReturnInF['feesregis'], 0) . "</td>";
            echo "  <td>" . mynumberformat($CheckIfReturnInF['feesyear'], 0) . "</td>";

            echo "<td>";

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