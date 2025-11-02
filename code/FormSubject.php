<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "New Subject";
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
  leftsiderbar(1, 15);
  ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <h2><?php echo $formtitle ?></h2>

      <div class="table-responsive">
        <?php
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'Goodbar') {
      ?>
        <div class="alert alert-success" role="alert">
          Subject Added Successfully
        </div>
        <?php
        }
      if (isset($_GET['StuOFun']))
        if ($_GET['StuOFun'] == 'failbar') {
      ?>
        <div class="alert alert-danger" role="alert">
          Subject duplication
        </div>
        <?php
        }
      ?>
        <table class="table table-striped table-sm">
          <form action="AddSubject.php" method="POST">
            <tr>
              <td>Subject Name</td>
              <td>
                <div class="col-md-6">
                  <input name="SubjectName" type="text" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td>Result Relation</td>
              <td>
                <div class="col-md-6">
                  <select name='notin' class="form-control">
                    <option value='1'>Curricular</option>
                    <option value='0'>Extra Curricular</option>
                  </select>
                  <div>
              </td>
            </tr>
            <tr>
              <td>Code Name</td>
              <td>
                <div class="col-md-6">
                  <input name="codename" type="text" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td>Priority in Result</td>
              <td>
                <div class="col-md-6">

                  <select name="priorityinr" type="text" class="form-control">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                    <option value='11'>11</option>
                    <option value='12'>12</option>
                    <option value='13'>13</option>
                    <option value='14'>14</option>

                  </select>

                </div>
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