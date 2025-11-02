<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "New Student";
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
  leftsiderbar(1, 11);
  ?>


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <h2><?php echo $formtitle ?></h2>

    <div class="table-responsive">
      <?php
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'Goodbar') {
      ?>
        <div class="alert alert-success" role="alert">
          Student Record Added Successfully.
        </div>
      <?php
        }
        if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'badbar') {
          ?>
            <div class="alert alert-danger" role="alert">
              Student Record Wasn't Added.
            </div>
          <?php
            }
      ?>
      <table class="table table-striped table-sm">
        <form action="AddStudent.php" method="POST">
          <tr>
            <td>Index No</td>
            <td>
              <div class="col-md-6">
                <input name="IndexNo" type="text" disabled class="form-control" value="<?php echo makenumber(); ?>">
                <input name="IndexNo" type="hidden" class="form-control" value="<?php echo makenumber(); ?>">
                <div>
            </td>
          </tr>
          <tr>
            <td>Student Name</td>
            <td>
              <div class="col-md-6">
                <input name="Studentname" type="text" class="form-control">
              </div>
            </td>
          </tr>
          <tr>
            <td>Date of birth</td>
            <td>
              <div class="col-md-6">

                <input type="text" name="dateofbirth" class="form-control">
                

              </div>
            </td>
          </tr>

          <tr>
            <td>Nationality</td>
            <td>
              <div class="col-md-6">
                <select name="Nationality" class="custom-select d-block w-100">
                  <option value="0">Nationality</option>
                  <option value="Sudanese">Sudanese</option>
                  <option value="non Sudanese">non Sudanese</option>
                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>Religion</td>
            <td>
              <div class="col-md-6">
                <select name="Religion" class="custom-select d-block w-100">
                  <option value="0">Religion</option>
                  <option value="Muslim">Muslim</option>
                  <option value="Catholic Christian">Catholic Christian</option>
                  <option value="Non-Catholic Christian">Non-Catholic Christian</option>
                  <option value="other">Other</option>

                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              Address(Area)</td>
            <td>
              <div class="col-md-6">
                <input type="text" name="Address" class="form-control">
                <div>
            </td>
          </tr>


          <tr>
            <td>
              Phone(s)</td>
            <td>
              <div class="col-md-6">
                <input type="text" name="phone1" class="form-control">
                <input type="text" name="phone2" class="form-control">
                <div>
            </td>
          </tr>
          <tr>
            <td>
              Email</td>
            <td>
              <div class="col-md-6">
                <input type="email" name="Email" class="form-control">
                <div>
            </td>
          </tr>

          <tr>
            <td colspan='2'>
              <input name="Add" value="Save" class="btn btn-dark" type="submit">
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