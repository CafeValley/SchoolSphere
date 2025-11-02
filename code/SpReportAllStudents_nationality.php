<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formnameheaderforprint = "Class list - Nationality";

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
  upsiderbar(6);
  leftsiderbar(5, 63);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

  <form method = "GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Filter
<?php 
$mywhere = "";
?>
<select name = "part" onchange='this.form.submit()'>

<?php 
switch ($_GET['part'])
{
  case 'All':
    {
       $mywhere = ""; 
      ?>
      <option selected>All</option>
  <option>Sudanese</option>
  <option>non Sudanese</option>
      <?php
    }
break;
case 'Sudanese':
  {
     $mywhere = "and `Nationality` ='Sudanese'"; 
    ?>
    <option>All</option>
<option selected>Sudanese</option>
<option>non Sudanese</option>
    <?php
  }
break;
case 'non Sudanese':
  {
    $mywhere = "and `Nationality` ='non Sudanese'"; 
    ?>
    <option>All</option>
<option>Sudanese</option>
<option selected>non Sudanese</option>
    <?php
  }
break;
default:
{
  // $mywhere = "";where `Religion` = 
  ?>
<option>All</option>
<option>Sudanese</option>
<option>non Sudanese</option>
  <?php
  
}
}
?>
  


</select>
</form>
    <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php include('headerforprint.php'); ?></h2>

      <div class="table-responsive">
        <?php

        $SqlCommandForCFe = " SELECT `Id_Student`, `StudentName`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo` FROM `student` where `acadmicyear` = '$Acadyear' $mywhere order by StudentName  ";
        $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>
            <tr>
              <th onclick="sortTableNumber(0)">No</th>
              <th onclick="sortTable(1)">Student Name</th>

              <th onclick="sortTable(2)">Nationality</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $count = 1;
            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
              echo "<tr>";
              echo "  <td>" . $count . "</td>";
              $count++;
              echo "  <td>" . $CheckIfReturnInF['StudentName'] . "</td>";

              echo "  <td>" . $CheckIfReturnInF['Nationality'] . "</td>";
              echo "</tr>";
            }

            ?>
          </tbody>
        </table>
        <?php //new code here
        ?>




        <style>
          table {
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
          }

          th {
            cursor: pointer;
          }

          th,
          td {
            text-align: left;
            padding: 16px;
          }

          <tr><td></td></tr>tr:nth-child(even) {
            background-color: #f2f2f2
          }
        </style>
        </head>

</html>





<?php //end for the new code
?>
</div>
</div>
<button type="submit" onclick="printDiv('printableArea')" class="btn btn-default">Print</button>

</main>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php footer(); ?>