<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle = "First Term Report";
$formnameheaderforprint = "All Receipt No";
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
  upsiderbar(3);
  leftsiderbar(2, 33);
  ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">

      <h2><?php include('headerforprint.php'); ?></h2>

      <div class="table-responsive">
        <?php
        //
        if (isset($_POST['butremove']))
        {
          $theid     = $_POST['theid']; 
         $SqlCommandForCFe  = "SELECT `studentindex`,`typeofpayment` , `active1` , `acadmicyear`   FROM `studentsregisteredfees`  WHERE `id` = '$theid'";
      $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      
      $var =  $CheckIfReturnInF['typeofpayment'];
      
      
       if ($var=='12'){
        $var2 =  $CheckIfReturnInF['active1'];
        if ($var2 == '1')
        {
        //we own his nigga money still
        //so just remove the bloody record
        $SqlCommandForCFedel  = "delete FROM `studentsregisteredfees`  WHERE `id` = '$theid'";
       mysqli_query($link, $SqlCommandForCFedel);
        
      }
        if ($var2 == '0')
        {
          $var3 =  $CheckIfReturnInF['acadmicyear'];
          $studetindex =  $CheckIfReturnInF['studentindex'];

          $SqlCommandForCFe  = "UPDATE `studentsregisteredfees` set `active1` = '1'  WHERE `studentindex` = '$studetindex' and `active1` = '0' and `acadmicyear` = '$var3' ";
          mysqli_query($link, $SqlCommandForCFe);
           $registed = getregistedidfrompayment($studetindex);
          //UPDATE `studentsregistered` SET  `active`=[value-7],`2ndactive`=[value-8]  WHERE `id`= '$registed'
          $SqlCommandForCFe  = "UPDATE `studentsregistered` SET `2ndactive`='1'  WHERE `id`= '$registed' and `acadmicyear` ='$var3' ";
          mysqli_query($link, $SqlCommandForCFe);
  
          $SqlCommandForCFedel  = "delete FROM `studentsregisteredfees`  WHERE `id` = '$theid'";
          mysqli_query($link, $SqlCommandForCFedel);
        //this nigga complete his money
        
      }
//case that this studenet paied full
//check if the current active or not !

//case that this student didnt pay full which is ez !
       }
       if ($var=='11'){
        echo "Error will never happen" ;
          }
echo " x was pressed";
        }
        
if (isset($_POST['butedit']))
{
  $theid     = $_POST['theid']; 
  $receiptno = $_POST['receiptno'];
  $SqlCommandForCFe = "UPDATE `studentsregisteredfees` SET `receiptno`='$receiptno' WHERE `id` = '$theid'";
  mysqli_query($link, $SqlCommandForCFe);
  ?>
        <div class="alert alert-warning" role="alert">
          Edit success
        </div>
        <?php
}
         $SqlCommandForCFe = " SELECT `id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`, `acadmicyear`, `receiptno`, `whodidthis`, `whenwasit` FROM `studentsregisteredfees` WHERE receiptno is not NULL order by receiptno";
        $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

        ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>

            <tr>
              <th onclick="sortTable(0)">Studnet index</th>
              <th onclick="sortTable(1)">Amount</th>
              <th onclick="sortTableNumber(2)">Receipt no</th>
              <th onclick="sortTableNumber(3)">Acadmic Year</th>
            </tr>
          </thead>
          <tbody>
            <?php

            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
              echo "<form action = '' method = 'POST'>";
              $id = $CheckIfReturnInF['id'];
              echo "<input type = 'hidden' name = 'theid' value = '$id' ";
          
              $receiptno = $CheckIfReturnInF['receiptno'];
              $totaloffees = $CheckIfReturnInF['totaloffees'];
              $studnetindex = $CheckIfReturnInF['studentindex'];
              echo "<input type = 'hidden' name = 'studnetindex' value = '$studnetindex' ";
             
            
              $acadmicyear = $CheckIfReturnInF['acadmicyear'];

              echo "<tr>";
              echo "<td>";
              echo $studnetindex . " - " . studentname($studnetindex);
              echo "</td>";
              echo "<td>".mynumberformat($totaloffees, 0)."</td>";
              echo "<td>";
              echo "<input name = 'receiptno' value = '$receiptno' class = 'form-control'>";
              
             
              echo "</td>";
              echo "<td>$acadmicyear</td>";
              echo "<td><input type = 'submit' name = 'butedit' value = 'E' class = 'btn btn-warning btn-sm'>  ";
              echo "<input type = 'submit' name = 'butremove' value = 'X' class = 'btn btn-danger btn-sm'></td>";
              echo "</tr>";
              echo "</form>";
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>


  </main>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php footer(); ?>