<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "All Students";
$formnameheaderforprint = "Class list - Telephone";
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
  leftsiderbar(5, 685);
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <table>
        <form method="POST" action="SpReportAllStudentsbyclass_phone.php">

          <tr>
            <td>Class Year</td>
            <td>
              <div class="col-md-6">
                <?php

              if (isset($_POST['yearforsubject'])) {
                listofgrades($_POST['yearforsubject']);
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
                listsubclass($_POST['subclassname']);
              } else {
                listsubclass();
              }
              ?>
                <div>
            </td>
          </tr>

          <tr>
            <td></td>
            <td><input type="submit" name="butseek" class="btn btn-info" value="Seek"></td>
          </tr>
        </form>
      </table>
      <?php if (isset($_POST['yearforsubject'])) { ?>
<button type="submit" onclick="printDiv('printableArea')" class="btn btn-default">Print</button>
<form action="exporttoexcelbytelephone.php" method="post">					
				<button type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-info">Copy To Excel</button>
        <input type = "hidden" name = "yearforsubject" value ="<?php echo $_POST['yearforsubject'];?>">
        <input type = "hidden" name = "subclassname" value ="<?php echo $_POST['subclassname'];?>">
        
			</form>
      <?php } ?>
      <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">


        <div class="table-responsive">
          <?php
        if (isset($_POST['yearforsubject'])) {
          echo "  <h2>";
          include('headerforprint.php');
          echo "</h2>";
          $yearselect = $_POST['yearforsubject'];
          $subclass   = $_POST['subclassname'];
          echo "<h4>$yearselect - $subclass</h4>";
          $SqlCommandForCFe = " SELECT `id`,`StudentName`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive` FROM `studentsregistered` , `student` WHERE  `IndexNo` = `studentindex`  and `yearselect` = '$yearselect' and `subclassname` = '$subclass'  and studentsregistered.acadmicyear = '$Acadyear' order by `StudentName`  ";
          $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);


          $count = 1;
          $rowcounthere = $CheckIfHereInF->num_rows;
          if ($rowcounthere == 0) {
        ?>
          <div class="alert alert-info" role="alert">
            No students are registered in the class
          </div>
          <?php

          } else
            $count = 1;
          while ($row   = mysqli_fetch_array($CheckIfHereInF)) {
            $studentindex = $row['studentindex'];
            $SqlCommandForCFe2 = " SELECT `Id_Student`, `StudentName`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo` , `phone1`, `phone2` FROM `student` where `IndexNo` = '$studentindex' order by StudentName   ";
            $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);

            if ($count == 1) {
            ?>
          <table id="myTable" class="table table-striped table-sm">
            <thead>
              <tr>
                <th onclick="sortTableNumber(0)">No.</th>
                <th onclick="sortTable(1)">Student Name</th>

                <th onclick="sortTable(2)">Telephone</th>


              </tr>
            </thead>
            <tbody>
              <?php
              }
              while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {
                echo "<tr>";
                echo "  <td>" . $count . "</td>";
                $count++;
                echo "  <td>" . $CheckIfReturnInF2['StudentName'] . "</td>";

                echo "  <td>" ;
                echo "".$CheckIfReturnInF2['phone1'];
if (empty($CheckIfReturnInF2['phone2']))
    echo " ";
    else 
    echo " - ".$CheckIfReturnInF2['phone2'];

                  
                 echo "</td>";

                
              

                echo "</tr>";
              }

                ?>
            </tbody>
            <?php

               if ($count > $rowcounthere+2) {
                ?>
          </table>
          <?php
                }
            ?>

          <?php //new code here
          }
        }
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

            tr:nth-child(even) {
              background-color: #f2f2f2
            }
          </style>
          </head>

</html>





<?php //end for the new code

?>
</div>
</div>


</main>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php footer(); ?>