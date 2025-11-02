<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "Student Payment";
$formname  = "FormFeespayment.php";
$val = "";
//print_r($_POST);
if (isset($_POST['firstcheck']) && isset($_POST['amountin'])) {

  $studentindext = $_POST['Studentindex'];
  $pay           = $_POST['amountin'];
  $varW = getamountwanted($studentindext);
  $varP = getamountpaied($studentindext);
  
  if ($varP == $varW)
    $vartogetifallgood = "1";

  if (($varW > $varP) && ($pay <= $varW)) {
    $receiptno = $_POST['receiptno'];
    $registerid = studentcurrentregisterid($studentindext);
    $SqlCommandForCFe = "INSERT INTO `studentsregisteredfees`(`relatedregisid`,`studentindex`, `totaloffees`,
    `typeofpayment`, `active1`,`receiptno`, `whodidthis`,`acadmicyear`) VALUES
    ('$registerid','$studentindext','$pay','12','1','$receiptno','admin','$Acadyear')";
    mysqli_query($link, $SqlCommandForCFe);
    $vartogetifallgood = checkifdone($studentindext);
  }
  if ($pay > $varW)
    $vartogetifallgood = "2";
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
    <title><?php echo $SYSTEM_NAME; ?></title><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <?php
  upsiderbar(3);
  leftsiderbar(2, 32);
  ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <h2><?php echo $formtitle ?></h2>
      <?php if (isset($vartogetifallgood)) {
      if ($vartogetifallgood == "1") {
    ?>
      <div class="alert alert-info" role="alert">
        All payment fulfilled.
      </div>
      <?php
      }
      if ($vartogetifallgood == "0") {
      ?>
      <div class="alert alert-secondary" role="alert">
        There is more to be paid.
      </div>
      <?php
      }
      if ($vartogetifallgood == "2") {
      ?>
      <div class="alert alert-dark" role="alert">
        Please Check The Payment Details Again.
      </div>
      <?php
      }
    }
    ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <form action="<?php echo  $formname; ?>" method="POST">

            <tr>
              <td>Student index</td>
              <td>
                <div class="col-md-6">
                  <?php if (isset($_POST['firstcheck'])) {
                  $val = "disabled";
                ?>
                  <input name="Studentindex"
                    value="<?php if (isset($_POST['Studentindex'])) echo $_POST['Studentindex']; ?>" type="hidden"
                    class="form-control">
                  <?php
                }
                ?>
                  <input name="Studentindex"
                    value="<?php if (isset($_POST['Studentindex'])) echo $_POST['Studentindex']; ?>" type="text"
                    class="form-control" <?php echo $val; ?>>

                </div>
                <?php if (isset($_POST['firstcheck'])) { ?>
                <div class="col-md-1"><a class="nav-link" href="FormFeespayment.php">X</a></div>
                <?php } ?>
              </td>
            </tr>
            <?php if (isset($_POST['firstcheck'])) {
            $index = $_POST['Studentindex'];
          ?>
            <tr>
              <td>Student's Name</td>
              <td>
                <div class="col-md-6">
                  <?php echo studentname($index); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>Balance-><?php echo getamountwanted($index); ?></td>
              <td>
                <div class="col-md-6">
                  Due-><?php
                      echo getamountwanted($index) - getamountpaied($index);
                      ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>Amount</td>
              <td>
                <div class="col-md-6">
                  <input type="text" name="amountin" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td>Receipt No</td>
              <td>
                <div class="col-md-6">
                  <input type="text" name="receiptno" class="form-control">
                </div>
              </td>
            </tr>
            <?php
          }
          ?>
            <tr>
              <td colspan='2'>
                <input name="firstcheck" value="<?php if (isset($_POST['firstcheck'])) echo "Pay";
                                              else echo "check"; ?>" class="btn btn-dark" type="submit">
          </form>
          </td>
          </tr>
        </table>
      </div>
    </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php footer(); ?>