<?php
require_once("config.php"); ?>

<!doctype html>
<html lang="en">
<?php
$SqlCommandForCFe = "SELECT `StudentName` FROM `student`";
$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
$countd = 0;
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {

  $studentname = $CheckIfReturnInF['StudentName'];
  if ($countd == 0) {  ?>
    <datalist id="cars">
    <?php
    $countd++;
  } ?>
    <option><?php echo $studentname; ?></option>

  <?php

}

  ?>
    </datalist>

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
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">High School</a>
        <form action="SearchResults.php" method="POST">
          <input name="SearchCont" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
          </li>
        </ul>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <?php
          DisplaySideBar();
          ?>

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



            <h2>Student By Name</h2>

            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <form action="SearchResultsbyname.php" method="POST">
                  <tr>
                    <td>Student Name</td>
                    <td>
                      <div class="col-md-4">
                        <input name="StudentnameFSbyN" type="text" list="cars" class="form-control" />

                      </div>
                    </td>
                    <input value="Go!" class=" btn btn-dark" type="submit">
                  </tr>
                </form>
              </table>
            </div>

            <div class="table-responsive">
              <?php
              $Sname = $_POST['StudentnameFSbyN'];
              $SqlCommandForCFe = "SELECT `Id_Student`, `StudentName`, `Dateofentrytocomboni`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo`, `DateofleavingYear` FROM `student` WHERE StudentName = '$Sname'";
              $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);


              ?>
              <table class="table table-striped table-sm">
                <thead>
                  <tr>

                    <th>Student Name</th>
                    <th>Date of Entry To Comboni</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Religion</th>
                    <th>Index No</th>
                    <th>Date of Leaving Year</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
                    echo "<tr>";
                    echo "  <td>" . $CheckIfReturnInF['StudentName'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['Dateofentrytocomboni'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['Dateofbirth'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['Nationality'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['Religion'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['IndexNo'] . "</td>";
                    echo "  <td>" . $CheckIfReturnInF['DateofleavingYear'] . "</td>";
                    echo "</tr>";
                    $indexinhere = $CheckIfReturnInF['IndexNo'];
                  }

                  $SqlRelated = "SELECT `PaperType` FROM `relatedpaper` WHERE S_Index_no = '$indexinhere'";
                  $CheckIfRelated      = mysqli_query($link, $SqlRelated);
                  ?>

                </tbody>
              </table>
              <table class="table table-striped table-sm">
                <tbody>
                  <h5>Realted Papers:</h5>
                  <?php
                  $countRe = 1;
                  while ($CheckRelated   = mysqli_fetch_array($CheckIfRelated)) {
                    echo "<tr>";
                    echo "<td>$countRe->" . $CheckRelated['PaperType'] . "</td>";
                    echo "</tr>";
                    $countRe += 1;
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