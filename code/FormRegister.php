<?php
require_once("config.php");
require_once('sidebar.php');
?>
<?php
$formtitle = "Registration";
$formname  = "FormRegister.php";
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
  leftsiderbar(1, 14);
  ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <h2><?php echo $formtitle ?></h2>

      <div class="table-responsive">
        <?php
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'Goodbar') {
      ?>
        <div class="alert alert-success" role="alert">
          Registration success
        </div>
        <?php
        }
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'failbar') {
      ?>
        <div class="alert alert-danger" role="alert">
          Registration didnt happen , Student Registered Data Found In This Academic Year.
        </div>
        <?php
        }
      ?>
        <table class="table table-striped table-sm">
          <form action="<?php echo $formname; ?>" method="POST">
            <tr>
              <td>Index No</td>
              <td>
                <div class="col-md-6">
                  <input name="IndexNo" type="text" class="form-control" <?php if (isset($_POST['IndexNo']))
                                                                          echo "disabled";
                                                                        ?> value="<?php
                                                                                  if (isset($_POST['IndexNo']))
                                                                                    echo
                                                                                    studentindexcap($_POST['IndexNo']);
                                                                                  ?>">
                  <div>
              </td>
            </tr>

            <?php if (isset($_POST['IndexNo'])) { ?>
            <tr>
              <td>Index No</td>

              <td>
                <div class="col-md-6">
                  <?php echo studentname($_POST['IndexNo']); ?>
                  <div>
              </td>
            </tr>
            <?php } ?>

            <tr>
              <td>Class Year</td>
              <td>
                <div class="col-md-6">
                  <?php

                if (isset($_POST['yearforsubject'])) {
                  //listofgrades($_POST['yearforsubject']);
                  echo $_POST['yearforsubject'];
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
                  //listsubclass($_POST['subclassname']);
                  echo $_POST['subclassname'];
                } else {
                  listsubclass();
                }
                ?>
                  <div>
              </td>
            </tr>

            <?php

          if (!isset($_POST['firstdatabut'])) {
          ?>
            <tr>
              <td colspan='2'>
                <input name="firstdatabut" value="Calculate" class="btn btn-dark" type="submit">
              </td>
            </tr>
            <?php
          } ?>
          </form>

          <?php

        if (isset($_POST['firstdatabut'])) {
        ?>
          <form action="AddRegis.php" method="POST">

            <input type="hidden" name="IndexNo" value="<?php echo $_POST['IndexNo']; ?>">
            <input type="hidden" name="yearforsubject" value="<?php echo $_POST['yearforsubject']; ?>">
            <input type="hidden" name="subclassname" value="<?php echo $_POST['subclassname']; ?>">

            <tr>
              <td>Fees</td>
              <td>
                <div class="col-md-6">

                  <input class="form-control" value="<?php
                                echo $var1 = regis_fees($_POST['yearforsubject']);
                                echo " + ";
                                echo $var2 = regis_fees("Registeration_Fees");
                                echo " = ";
                                echo $var1 + $var2;
                                ?>" disabled>
                  <input type="hidden" name="Regisfees" value="<?php echo $var2; ?>">
                  <input type="hidden" name="Yearfees" value="<?php echo $var1; ?>">

                </div>
              </td>
            </tr>
            <tr>
              <td>Discount</td>
              <td>
                <div class="col-md-6">
                  <input type="text" name="discounthere" placeholder="0.0" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td>First installment</td>
              <td>
                <div class="col-md-6">
                  <input type="text" name="firstinstallment" placeholder="0" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td>Receipt No</td>
              <td>
                <div class="col-md-6">
                  <input type="text" name="receiptNo" placeholder="0" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan='2'>
                <input name="regisbut" value="Register" class="btn btn-warning" type="submit">
              </td>
            </tr>
          </form>

          <?php
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