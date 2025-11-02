<?php
require_once("config.php"); ?>
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
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FormStudent.php">
                <span data-feather="users"></span>
                Student Control
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FormStudnetRelated.php">
                <span data-feather="layers"></span>
                Realted Data Control
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="ReportAllStudents.php">
                <span data-feather="file-text"></span>
                Students List
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



        <h2>Section title</h2>

        <div class="table-responsive">
          <?php
          $WIndexNo = $_POST['SearchCont'];
          $SqlCommandForCFe = "SELECT `Id_Student`, `StudentName`, `Dateofentrytocomboni`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo`, `DateofleavingYear` FROM `Student` WHERE IndexNo = '$WIndexNo'";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

          $SqlRelated = "SELECT `PaperType` FROM `relatedpaper` WHERE S_Index_no = '$WIndexNo'";
          $CheckIfRelated      = mysqli_query($link, $SqlRelated);


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
                echo "  <td>" . $$CheckIfReturnInF['Nationality'] . "</td>";
                echo "  <td>" . $CheckIfReturnInF['Religion'] . "</td>";
                echo "  <td>" . $CheckIfReturnInF['IndexNo'] . "</td>";
                echo "  <td>" . $CheckIfReturnInF['DateofleavingYear'] . "</td>";
                echo "</tr>";
              }


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