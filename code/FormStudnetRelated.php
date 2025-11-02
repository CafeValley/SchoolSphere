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
	  <form action = "SearchResults.php" method ="POST">
      <input name = "SearchCont" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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

			<table class="table table-striped table-sm">

			 <form action = "AddStudnetRelated.php" method = "POST">
			 <tr><td>
			 Index Number</td>
			 <td>
			 <div class= "col-md-6">
			 <input type = "text" name = "IndexNo" class = "form-control">
			 <div></td>
			 </tr>
			 <tr><td>Type of Paper</td>
			 <td>
			 <div class= "col-md-6">
			 <select name = "TypeofPaper" class="custom-select d-block w-100">
			 <option value = "Report Card">Report Card</option>
			 <option value = "Registration form">Registration form</option>
			 <option value = "birth cirtificate">birth cirtificate</option>
			 <option value = "transfer leter">transfer leter</option>
			 </select>
			 <div></td>
			 </tr>

             <tr><td colspan = '2'>
			 <input name = "Add" value = "Add" class="btn btn-dark" type = "submit">
			 </td></tr>
            </table>
			</form>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php footer();?>
