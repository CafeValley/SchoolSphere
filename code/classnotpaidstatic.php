<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
$formtitle = "";
$formname  = "termsheetstudent.php";
$formnameheaderforprint = "School Report";

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
      html,
      body {
        margin: 0;
        padding: 0;
      }

      * {
        box-sizing: border-box;
      }

      table {
        cell-padding: 0;
        cell-spacing: 0;
        width: 100%;
        border: 2px solid black;
      }

      @page {
        size: A4;
        margin: 0;
      }

      @media print {

        html,
        body {
          height: auto;
          font-size: 22pt;
          /* changing to 10pt has no impact */
        }

        table {
          max-height: 100% !important;
          overflow: hidden !important;
          page-break-after: always;
        }
      }
    </style>
    <link rel="icon" href="favicon.ico">

    <title><?php echo $SYSTEM_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body onload="window.print();">


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


      <div class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

        <h2><?php echo $formtitle ?></h2>

        <?php
         $syear = $_GET['syear'];
         $csyear = $_GET['csyear'];
         $grade  = $syear;
         $subclassname = $csyear;
         $yearselect   = $grade;
         $subclass     = $subclassname;

       
       


$SqlCommandForCFe = " SELECT `id`,`StudentName`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`,
`active`, `2ndactive` FROM `studentsregistered` , `student` WHERE `IndexNo` = `studentindex` and `yearselect` =
'$yearselect' and `subclassname` = '$subclass' and `active` = 1 order by `StudentName` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);

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
          $firstinlist = 0;
          $studentlist = "";
          while ($row   = mysqli_fetch_array($CheckIfHereInF)) {
		  
            $studentindex = $row['studentindex'];
            if ($firstinlist == 0) {
              $firstinlist++;
              $studentlist = $studentlist . " '" . $studentindex . "' ";
            } else
              $studentlist = $studentlist . " ,'" . $studentindex . "' ";
          }

            $SqlCommandForCFe2 = "SELECT `StudentName`, studentindex,sum(totaloffees) as totaloffees,`typeofpayment`
            FROM `studentsregisteredfees` , `student` where `IndexNo` = studentindex and `studentindex` in
            ($studentlist) and `typeofpayment` = 11 and `active1` = 1 group by studentindex , StudentName order by
            `StudentName`";
            $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);
          if ($rowcounthere > 0) {
           
$countfor3perpage = 1;
            while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {
			  $studnetindex = $CheckIfReturnInF2['studentindex'];
               if ($countfor3perpage == 4)
               $countfor3perpage = 1;
               if ($countfor3perpage == 1)
               echo " <table id='myTable' class='table table-striped table-sm'>";

                 ?>

        <center><?php echo strtoupper($CLIENT_NAME); ?></center>
        <br>Date:
        <?php echo $today;?>
        <br>
        Dear parent/guardian of <strong><?php echo studentname($studnetindex);
        echo " (".$studnetindex.")";
        ?></strong> of class
        <?php echo $yearselect." - ".$subclass;?>,
        kindly be informed that
        your fee payment
        balance
        is currently at
        <strong><?php echo intval($CheckIfReturnInF2['totaloffees'] - getamountpaied($studnetindex));?></strong>
        SDG.
        Please come to pay your fees installment before end of this month.
        <br>
        <strong>Please , come with your previous receipts.</strong> thanks.
        <center>The Administration</center>
        <br><br><br>
        <br>
        <?php 
          $countfor3perpage++;
          if ($countfor3perpage == 4)
            echo "</table>";
            }
          }
              ?>



        <?php //new code here

        





         
          $countfor3perpage = 1;

          while ($CheckIfReturnInFbig = mysqli_fetch_array($CheckIfHereInFbig)) {
        
             $indexnobig = $CheckIfReturnInFbig['studentindex'];
             $_POST['IndexNo'] = $indexnobig;
         
          ?>
        <div id="printableArea" class="table-responsive">
          <?php
               
         
        /*  
          echo "For:";
          echo "<strong>".studentname($indexnobig)."</strong>";
          echo " in ".$grade;
          echo " - ".$subclassname ;
        */
        

        if ($countfor3perpage == 4)
          $countfor3perpage = 1;
        if ($countfor3perpage == 1)
          echo " <table id='myTable' class='table table-striped table-sm'>";

        ?>

          <center><?php echo strtoupper($CLIENT_NAME); ?></center>

          Dear parent/guardian of ______________ of class ___________, kindly be informed that your fee payment
          balance
          is currently at ____________ SDG. Please come to pay your fees installment before end of this month.
          <br>
          <strong>Please , come with your previous receipts.</strong> thanks.
          <center>The Administration</center>
          <br><br><br>
          <br><br><br>
          <br><br><br>
          <?php 
          $countfor3perpage++;
          if ($countfor3perpage == 4)
            echo "</table>";
          ?>


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

<?php } ?>
</main>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php footer(); ?>