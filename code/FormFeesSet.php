<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "Set Fees";
$formname  = "AddFees.php";
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
  upsiderbar(3);
  leftsiderbar(2, 31);
  ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <?php
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'Goodbar') {
      ?>
        <div class="alert alert-success" role="alert">
          Fees Set Successfully
        </div>
      <?php
        }
      ?>
      <table class="table table-striped table-sm">
        <form action="<?php echo  $formname; ?>" method="POST">
          <tr>
            <td>Class Year</td>
            <td>
              <div class="col-md-6">
                <?php listforfees(); ?>

                <div>
            </td>
          </tr>
          <tr>
            <td>Amount</td>
            <td>
              <div class="col-md-6">
                <input name="Amount" type="text" class="form-control">
              </div>
            </td>
          </tr>


          <tr>
            <td colspan='2'>
              <input name="Add" value="Set" class="btn btn-dark" type="submit">
        </form>
        </td>
        </tr>

      </table>
      <h2>
        Current Set
      </h2>
      <table class="table table-striped table-sm">
        <tr>
          <td><strong>Name</strong></td>
          <td><strong>Amount</strong></td>
        </tr>
        <?php
        $SqlCommandForCFe  = "SELECT `id`, `feesname`, `feesamount`, `feesdate`, `acadmicyear`, `active` FROM `fees_set` where `active` = 1";
        $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
        $row = mysqli_num_rows($CheckIfHereInF);
        if ($row > 0) {

          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {


            $feesname = $CheckIfReturnInF['feesname'];
            if (strlen($feesname) > 5)
              list($firstname, $secondname) = explode("_", $feesname);

            $feesamount = $CheckIfReturnInF['feesamount'];

            echo "<tr>";
            if (strlen($feesname) > 5)
              echo "<td>$firstname $secondname</td>";
            else
              echo "<td>$feesname</td>";
            echo "<td>".mynumberformat($feesamount, 0)."</td>";
            echo "</tr>";
          }
        }

        ?>
      </table>
    </div>
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
      ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php footer(); ?>