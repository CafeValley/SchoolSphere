<?php
require_once("config.php");
require_once('sidebar.php');
$formtitle   = "Register (Delete)";
$formwhereto = "CopydeleteRegister.php";
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
      leftsiderbar(6, 24);
      ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <h2><?php echo $formtitle ?></h2>

      <div class="table-responsive">
+


        <?php
      //  print_r($_POST);
      if (isset($_POST['EditBut'])) {
        $theid = $_POST['theid'];
        $sqledit = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
        `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` where `id` =
        '$theid'";
        $editback = mysqli_query($link, $sqledit);
        $rowedit  = mysqli_fetch_array($editback);


         $SqlItemIn2 = "SELECT `id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`,
         `acadmicyear`, `whodidthis`, `whenwasit`, `receiptno` FROM `studentsregisteredfees` WHERE `relatedregisid` =
         '$theid'";

        $SqlItemIn3 = "SELECT `idfortable`, `regisid`, `discountamount` FROM `discountdata` WHERE `regisid` =
        '$theid'";

      ?>
        <table class="table table-striped table-sm">
          <form action="<?php echo $formwhereto; ?>" method="POST">
            <input type="hidden" name="theid" value="<?php echo $theid; ?>">
            <tr>
              <td>Index No</td>
              <td>
                <div class="col-md-6">
                  <input name="studentindex" disabled type="text" class="form-control"
                    value="<?php echo $rowedit['studentindex']; ?>">
                  <input name="studentindex" type="hidden" class="form-control"
                    value="<?php echo $rowedit['studentindex']; ?>">

                  <div>
              </td>
            </tr>
            <tr>
              <td>Student Name</td>
              <td>
                <div class="col-md-6">
                  <input name="Studentname" type="text" class="form-control" disabled
                    value="<?php echo studentname($rowedit['studentindex']); ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td>Class Year</td>
              <td>
                <div class="col-md-6">
                  <?php

                if (isset($_POST['yearforsubject'])) {
                  //listofgrades($_POST['yearforsubject']);
                  echo $_POST['yearforsubject'];
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
                  //listsubclass($_POST['subclassname']);
                  echo $_POST['subclassname'];
                } else {
                  listsubclass();
                }
                ?>
                  <div>
              </td>
            </tr>

            <tr>
              <td colspan='2'>
                <input name="copy" value="Move" class="btn btn-warning btn-sm" type="submit">
          </form>
          </td>
          </tr>
        </table>
        <?php

      }
      if (isset($_POST['copy']) )
      {
        $registerationid = $_POST['theid']; 
        $stduentindex = $_POST['studentindex'];
        $totalpaided = getamountpaied($stduentindex);
        $totalwanted = getamountwanted($stduentindex);

        $lastregisid = lastregisid() + 1;
        $nextyear = $_POST['yearforsubject'];
        $nextstream = $_POST['subclassname'];
        $newcash = regis_fees($_POST['yearforsubject']);
        $newregister = regis_fees("Registeration_Fees");
        $newtotal = $newcash+$newregister;


        if ($newtotal < $totalpaided )
        {
          ?>
        <div class="alert alert-danger" role="alert">
          Ops , The student paid more , please do it manually
        </div>
        <?php
        }  
          else 
          {
         //1
        $SqlCommandForCFe = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`,
        `active`, `2ndactive`,
        `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE id = $registerationid";
        $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
        $CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
    //    print_r($CheckIfReturnInF);

        $var1 = $CheckIfReturnInF['id'];
        $var2 = $CheckIfReturnInF['studentindex'];
        $var3 = $CheckIfReturnInF['yearselect'];
        $var4 = $CheckIfReturnInF['subclassname'];
        $var5 = $CheckIfReturnInF['feesregis'];
        $var6 = $CheckIfReturnInF['feesyear'];
        $var7 = $CheckIfReturnInF['active'];
        $var8 = $CheckIfReturnInF['2ndactive'];
        $var9 = $CheckIfReturnInF['acadmicyear'];
        $var10 = $CheckIfReturnInF['whodidthis'];
        $var11 = $CheckIfReturnInF['whenwasit'];

        $newsql1 = "INSERT INTO `studentsregistered`(`id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`,
        `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit`) VALUES
        ($lastregisid,'$var2','$nextyear','$nextstream','$newregister','$newcash','$var7','$var8','$var9','$var10','$var11')";
        mysqli_query($link, $newsql1);
//1
        $SqlCommandForCFe2 = "SELECT `idfortable`, `regisid`, `discountamount` FROM `discountdata` WHERE regisid =
        $registerationid";
        $CheckIfHereInF2 = mysqli_query($link, $SqlCommandForCFe2);
        $CheckIfReturnInF2 = mysqli_fetch_array($CheckIfHereInF2);
//$CheckIfReturnInF2['regisid'];
        $discountval = $CheckIfReturnInF2['discountamount'];
        $newsql2="INSERT INTO `discountdata`(`regisid`, `discountamount`) VALUES ('$lastregisid','$discountval')";
        mysqli_query($link, $newsql2);
  //can be as many as the student paided
        $SqlCommandForCFe3 = "SELECT `id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`,
    `acadmicyear`, `whodidthis`,
    `whenwasit`, `receiptno` FROM `studentsregisteredfees` WHERE `relatedregisid` =$registerationid ";
    $CheckIfHereInF3 = mysqli_query($link, $SqlCommandForCFe3);
    while ($CheckIfReturnInF3 = mysqli_fetch_array($CheckIfHereInF3))
    {
      $var11 = $CheckIfReturnInF3['relatedregisid'];
      $var12 = $CheckIfReturnInF3['studentindex'];
      $var13 = $CheckIfReturnInF3['totaloffees'];
      $var14 = $CheckIfReturnInF3['typeofpayment'];
      $var15 = $CheckIfReturnInF3['active1'];
      $var16 = $CheckIfReturnInF3['acadmicyear'];
      $var17 = $CheckIfReturnInF3['whodidthis'];
      $var18 = $CheckIfReturnInF3['whenwasit'];
      $var19 = $CheckIfReturnInF3['receiptno'];
      
      //catch wanted payment
      if ($var14 == '11')
        $var13 = $newcash + $newregister - $discountval;

      $newsql3="INSERT INTO `studentsregisteredfees`( `relatedregisid`, `studentindex`, `totaloffees`,
      `typeofpayment`, `active1`, `acadmicyear`, `whodidthis`, `whenwasit`, `receiptno`) VALUES
      ('$lastregisid','$var12','$var13','$var14','$var15','$var16','$var17','$var18','$var19')";
      mysqli_query($link, $newsql3);
    }

      //cleaning up the old data
    $newsql4remove = "DELETE FROM `discountdata` WHERE `regisid` = $registerationid";
    $newsql5remove = "DELETE FROM `studentsregistered` WHERE `id` = $registerationid";
    $newsql6remove = "DELETE FROM `studentsregisteredfees` WHERE `relatedregisid` = $registerationid";
    
    mysqli_query($link, $newsql4remove);
    mysqli_query($link, $newsql5remove);
    mysqli_query($link, $newsql6remove);

    $totalpaided = getamountpaied($stduentindex);
    $totalwanted = getamountwanted($stduentindex);
    if (($totalwanted-$totalpaided) == 0)
    {
      mysqli_query($link, "UPDATE `studentsregistered` SET`active` = 0 WHERE `id`=$registerationid");
      mysqli_query($link, "UPDATE `studentsregisteredfees` SET `active1` = 0 WHERE `relatedregisid` = $registerationid");
    }
    ?>
        <div class="alert alert-success" role="alert">
          Change Successfully
        </div>
        <?php
}
      }
      if (isset($_POST['RemoveBut'])) {
        $theid       = $_POST['theid'];
      ?>
        <form action="<?php echo $formwhereto; ?>" method="POST">
          <input type="hidden" name="theid" value="<?php echo $theid; ?>">
          <input value="Are you Sure !" name="realRemoveBut" type="submit" class="btn btn-danger btn-sm">
        </form>
        <?php
      }
      if (isset($_POST['realRemoveBut'])) {
        $theid             = $_POST['theid'];

        $regisfeessql = "DELETE FROM `studentsregisteredfees` WHERE `relatedregisid` = '$theid'";
        mysqli_query($link, $regisfeessql);

        $SqlCommandForCFe = "delete from `studentsregistered` WHERE `id`= '$theid' ";
        mysqli_query($link, $SqlCommandForCFe);
      ?>
        <div class="alert alert-success" role="alert">
          Removed Successfully
        </div>
        <?php
      }
      $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `feesregis`,`subclassname`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `active` = 1 ";
      $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

      ?>
        <table id="myTable" class="table table-striped table-sm">
          <thead>
            <tr>

              <th onclick="sortTable(0)"> Student Index</th>
              <th onclick="sortTable(1)"> Student Name</th>
              <th onclick="sortTable(2)"> Class-Stream</th>
              <th onclick="sortTable(3)">Fees Regis </th>
              <th onclick="sortTable(4)"> Fees year</th>
              <th> </th>


              <th></th>

            </tr>
          </thead>
          <tbody>
            <?php
          $rowcount = mysqli_num_rows($CheckIfHereInF);
          $i = 0;
          while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
            $i++;
            echo "<tr>";
            echo "<form action = '$formwhereto' method='POST'>";
            echo "<input type = 'hidden' value = '" . $CheckIfReturnInF['id'] . "' name = 'theid'>";
            echo "  <td>" . $CheckIfReturnInF['studentindex'] . "</td>";
            echo "  <td>" . studentname($CheckIfReturnInF['studentindex']) . "</td>";

            echo "  <td>" . $CheckIfReturnInF['yearselect'] . " - " . $CheckIfReturnInF['subclassname'] . "</td>";

            echo "  <td>" . mynumberformat($CheckIfReturnInF['feesregis'], 0) . "</td>";
            echo "  <td>" . mynumberformat($CheckIfReturnInF['feesyear'], 0) . "</td>";

            echo "<td>";

            echo "<input type='submit' name='EditBut' value='Change Class' class='btn btn-danger btn-sm'>";


            echo "</td>";
            echo "</tr>";
            echo "</form>";
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