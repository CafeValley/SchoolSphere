<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "Welcome Page";
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
  upsiderbar();
  leftsiderbar(1);
  ?>


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <tr>
          <td>
            School Management System
          <td>
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