<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "New Note";
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
  upsiderbar(1);
  leftsiderbar(1, 12);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <?php
    if (isset($_POST['Add2nd'])) {

      $IndexNo = $_POST['IndexNo'];
      $note    = $_POST['note'];

      $SqlItemIn = "INSERT INTO `extranotes`( `studentindex`, `note`,`acadmicyear`) VALUES ('$IndexNo','$note','$Acadyear')";
      $_GET['StuOFun'] = 'Goodbar';
      mysqli_query($link, $SqlItemIn);
    }
    ?>
    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <?php
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'Goodbar') {
      ?>
        <div class="alert alert-success" role="alert">
          Student Note Added Successfully
        </div>
      <?php
        }
      ?>
      <table class="table table-striped table-sm">
        <form action="FormStudentnote.php" method="POST">
          <tr>
            <td>Index No</td>
            <td>
              <div class="col-md-6">
                <input name="IndexNo" type="text" class="form-control" value="<?php if (isset($_POST['IndexNo'])) echo $_POST['IndexNo']; ?>">
                <div>
            </td>
          </tr>

          <tr>
            <?php if (isset($_POST['IndexNo'])) { ?>
              <td>
                <div class="col-md-6">
                  <?php echo studentname($_POST['IndexNo']); ?>
                  <div>
              </td>
            <?php } ?>
            <td><input name="Add" value="check" class="btn btn-blue" type="submit"></td>
          </tr>

          <?php
          if (isset($_POST['Add'])) {
          ?>
            <tr>
              <td>Note </td>
              <td>
                <div class="col-md-6">

                  <textarea name="note" type="text" class="form-control"></textarea>
                </div>
              </td>
            </tr>

            <tr>
              <td colspan='2'>

                <input name="Add2nd" value="Add a Note" class="btn btn-dark" type="submit">
              <?php } ?>
        </form>
        </td>
        </tr>
      </table>
      <?php
      if (isset($_POST['Add']) || isset($_POST['Add2nd'])) {
      ?>
        <table class="table table-striped table-sm">
          <tr>
            <td>#</td>
            <td>Note</td>
            <td>Date Added</td>
          </tr>
          <?php
          $SqlCommandForCFe = "SELECT `tableid`, `studentindex`, `note`, date(whenwasit) as whenwasit FROM `extranotes` where  `studentindex` = '" . $_POST['IndexNo'] . "' order by note ";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
          $count = 1;
          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
            echo "<tr>";
            echo "<td>$count</td>";
            $count++;
            echo "<td>" . $CheckIfReturnInF['note'] . "</td>";
            echo "<td>" . $CheckIfReturnInF['whenwasit'] . "</td>";
            echo "</tr>";
          }

          ?>
        </table>
      <?php } ?>
    </div>
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php footer(); ?>