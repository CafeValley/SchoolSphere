<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "Students Print All (not paid)";
$formname = "menuclassnotpaidstatic.php";
$formnameheaderforprint = "School Report";
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
  upsiderbar(5);
  leftsiderbar(4, 56);
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


      <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

        <h2><?php echo $formtitle ?></h2>

        <?php 
      if (isset($_POST['tree']))
        {
          
          $syear  = $_POST['yearforsubject'];
          $csyear = $_POST['subclassname'];
          $link = "<script>
          window.open('classnotpaidstatic.php?csyear=".$csyear."&syear=".$syear."','_blank',
          'toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=800')
          </script>";
          echo $link;
          
          header("refresh:1;url=menuclassnotpaidstatic.php");
          die();
        }
      ?>
        <form action="<?php echo $formname; ?>" method="POST">

          <table>

            <tr>
              <td>Class Year</td>
              <td>

                <?php

                if (isset($_POST['yearforsubject'])) {
                  listofgrades($_POST['yearforsubject']);
                } else {
                  listofgrades();
                }
                ?>

              </td>
            </tr>
            <tr>
              <td>Class-Stream</td>
              <td>

                <?php

                if (isset($_POST['subclassname'])) {
                  listsubclass($_POST['subclassname']);
                } else {
                  listsubclass();
                }
                ?>

              </td>
            </tr>
            <tr>
              <td colspan='2'>
                <input type="submit" value="Print All" name="tree" class="btn btn-dark">
              </td>
            </tr>

          </table>
        </form>

      </div>

    </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php footer(); ?>