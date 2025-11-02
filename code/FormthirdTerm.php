<?php
require_once("config.php");
require_once("configmarks.php");
require_once('sidebar.php');
?>
<?php
$formtitle = "Third Term";
$formname  = "FormthirdTerm.php";
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
  upsiderbar(4);
  leftsiderbar(3, 43);
  ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <h2><?php echo $formtitle ?>

        <?php 
      if (isset($_POST['Subjectselect']))
        //echo " - ".$_POST['Subjectselect'];
        echo " - ".$_POST['yearforsubject']."(".$_POST['subclassname'].") "."{".$_POST['Subjectselect']."}";
        //print_r($_POST);
      ?>

      </h2>
      <?php
    //print_r($_POST);
    ?>
      <div class="table-responsive" id="printableArea">
        <?php
      ////////////////////////
      ///////////////////////
      //Marks are in
      if (isset($_POST['removemark'])) {
        // print_r($_POST);
        $var1 = $_POST['yearforsubject'];
        $var2 = $_POST['Subjectselect'];
        $var3 = $_POST['subclassname'];

        echo  $changedSQL = "DELETE FROM `marks_third_term` where  `subjectid` = '$var2' and `class` = '$var1' and `subclassname` = '$var3' and `acadmicyear` = '$Acadyear'";
        mysqli_query($link, $changedSQL);
      }
      if (isset($_POST['Addmark']))
        if ($_POST['Addmark']) {
          //      print_r($_POST);

          //post as it is [yearforsubject] => P1
          //post as it is  [Subjectselect] => Arabic

          //  [termmark20A01] => 89


          //1 	150 	English 	1styearfees 	20.00 	2017-2018 	2020-11-01 23:00:57

          //$rest = substr($currentyear, -2);

          $countin = 0;
          foreach ($_POST as $key => $value) {
            $indexpart = substr($key, -5);
            $filedpart = substr($key, 0, 8);

            $key1 = preg_replace('/[0-9]+/', '', $key);
            $key2 = preg_replace("/[^0-9]/", "", $key);

            //termmark
            if ($filedpart == "termmark") {
              $idarray[$countin] = $indexpart;
              $marksarray[$countin] = $value;
              $countin++;
            }
          }

          $max = sizeof($idarray);

          for ($z = 0; $z < $max; $z++) {

            $studentidfromarray   = $idarray[$z];
            $studentmarkfromarray = $marksarray[$z];

            $subjectid = $_POST['Subjectselect'];
            $classid   = $_POST['yearforsubject'];
            $subclassname   = $_POST['subclassname'];

            //$Acadyear = "2017-2018";
               if ($studentmarkfromarray == '-1')
               {
               $changedSQL = "delete from `marks_third_term` where `studentindex` = '$studentidfromarray' and
               `subclassname` = '$subclassname' and `subjectid` = '$subjectid' and `class` = '$classid' and
               `acadmicyear` =
               '$Acadyear'";
               mysqli_query($link, $changedSQL);
               }
else
{
            $mark =            getmark3rd($studentidfromarray, $subjectid, $classid, $subclassname, $Acadyear);
            if ($mark == "**") {
              $changedSQL = "INSERT INTO `marks_third_term`( `studentindex`,`subclassname`, `subjectid`, `class`, `mark`, `acadmicyear`, `date`) VALUES ('$studentidfromarray','$subclassname','$subjectid','$classid','$studentmarkfromarray','$Acadyear',now())";
              mysqli_query($link, $changedSQL);
            } else {
              $changedSQL = "UPDATE `marks_third_term` set `mark` = '$studentmarkfromarray' where `studentindex` = '$studentidfromarray' and `subclassname` = '$subclassname' and `subjectid` = '$subjectid' and `class` = '$classid' and `acadmicyear` = '$Acadyear'";
              mysqli_query($link, $changedSQL);
            }
          }
          }
      ?>
        <div class="alert alert-success" role="alert">
          Marks Recorded Successfully
          <hr>
          <p class="mb-0">
            Last entry was<strong> <?php echo $_POST['Subjectselect'];?> </strong>
            <strong> - <?php echo $_POST['yearforsubject'];?> </strong>
            <strong>(<?php echo $_POST['subclassname'];?>)</strong>
            .</p>
        </div>
        <?php
        }

      ?>
        <table class="table table-striped table-sm">
          <form action="<?php echo $formname; ?>" method="POST">

          <input type="hidden" name="yearforsubject" value="<?php if (isset($_POST['yearforsubject'])) echo $_POST['yearforsubject']; ?>">
            <input type="hidden" name="Subjectselect" value="<?php if (isset($_POST['Subjectselect'])) echo $_POST['Subjectselect']; ?>">
            <input type="hidden" name="subclassname" value="<?php if (isset($_POST['subclassname'])) echo $_POST['subclassname']; ?>">

            <?php

          if (!isset($_POST['firstdatabut'])) {

          ?>
            <tr>
              <td>Class Year</td>
              <td>
                <div class="col-md-6">
                  <?php listofgrades(); ?>

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
              <td>Subject Name</td>
              <td>
                <div class="col-md-6">
                  <select name="Subjectselect" class="custom-select d-block w-100">
                    <option value="non">Subject Name</option>
                    <?php
                    //`feesname` = '$whichis' and

                    $SqlCommandForCFe = " SELECT  distinct(`name`) as name2 FROM `subjects` order by `name2`";
                    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
                    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
                      $subjectname = $CheckIfReturnInF['name'];
                      $name2 = $CheckIfReturnInF['name2'];

                      echo "<option value = '$name2'>$name2 </option>";
                    }

                    ?>

                  </select>

                  <div>
              </td>
            </tr>

            <tr>
              <td colspan='2'>
                <input name="firstdatabut" value="Display" class="btn btn-dark" type="submit">
              </td>
            </tr>
            <?php
          } ?>
          </form>

          <?php

        if (isset($_POST['firstdatabut'])) {
        ?>

          <form action="<?php echo $formname; ?>" method="POST" autocomplete="off">
            <?php

            echo "List of 3rd Term for ";
            if ($_POST['yearforsubject'] == "1styearfees")
              echo " 1st Year ";
            echo " -> ";
            echo $_POST['Subjectselect'];
            ?>
            <tr>
              <td>No.</td>
              <td>Name</td>
              <td>
                <div class="col-md-6">Mark
                </div>
              </td>
            </tr>
            <input type="hidden" name="yearforsubject" value="<?php echo $_POST['yearforsubject']; ?>">
            <input type="hidden" name="Subjectselect" value="<?php echo $_POST['Subjectselect']; ?>">
            <input type="hidden" name="subclassname" value="<?php echo $_POST['subclassname']; ?>">
            <?php
//and  `active`  = 1
$SqlCommandForCFe = "SELECT `studentindex` , `StudentName` from `studentsregistered` , `student`  WHERE `subclassname` = '" . $_POST['subclassname'] . "' and `yearselect` = '" . $_POST['yearforsubject'] . "'  and `IndexNo` = `studentindex` and studentsregistered.acadmicyear = '$Acadyear' order by `StudentName`";

            $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
             $counthere2 = 1;
            while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
              $studentindex = $CheckIfReturnInF['studentindex'];
            ?>
            <tr>
              <td>
                <?php echo $counthere2.".";
                $counthere2++;
                ?>
              </td>
              <td>
                <?php echo studentname($studentindex); ?>
              </td>
              <td>
                <div class="col-md-6">
                  <input name="termmark<?php echo $studentindex; ?>" value="<?php
                                                                              //$acadmicyear
                                                                              $var1 = $_POST['yearforsubject'];
                                                                              $var2 = $_POST['Subjectselect'];
                                                                              $var3 = $_POST['subclassname'];

                                                                              $first = getmark3rd($studentindex, $var2, $var1, $var3, "$Acadyear");
                                                                              if ($first != '**')
                                                                                echo intval($first);

                                                                              ?>" type="text" class="form-control">
                </div>
              </td>
            </tr>
            <?php
            }

            ?>

            <tr>
              <td colspan='2'>
                <input name="Addmark" value="Save Mark" class="btn btn-warning" type="submit">
                <?php spacing(10); ?>
                <input name="removemark" value="Remove Marks" class="btn btn-danger" type="submit">
              </td>
            </tr>
          </form>

          <?php
        }

        ?>
        </table>

      </div>
    </main>

    </div>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php footer(); ?>