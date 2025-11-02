<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Academic Year Closing";
$formwhereto = "closeregisteryear.php";
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
      leftsiderbar(6, 23);
      ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h2>

      <?php echo $formtitle ?>
    </h2>

    <div class="table-responsive">

      <?php
      if (isset($_POST['butClosesure']))
      {
        ?>
<form action='<?php echo $formwhereto; ?>' method='POST'>

<input type='submit' name='butClose' class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark" value='Click here again if you are sure !'>
</form>
        <?php
      }
      if (isset($_POST['butClose'])) {

        mysqli_query($link, "UPDATE `studentsregistered` SET `active` = 0");
      ?>
        <div class="alert alert-success" role="alert">
          Year Close for <?php echo $Acadyear; ?> Successfully
        </div>
      <?php
      }
      
       if ((isset($_POST['butClosesure'])) || (isset($_POST['butClose'])))
       {
         echo " ";
        }
        else 
        {
 ?>      
      <form action='<?php echo $formwhereto; ?>' method='POST'>

        <input type='submit' name='butClosesure' class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark" value='CLOSE!'>
    </form>
    <?php } ?>
    </div>
  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
================================================== -->
  <?php footer(); ?>