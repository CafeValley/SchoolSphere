<?php
$rowData = array();
include ('soloconnection.php');
//$dbpassword = 'root1234';                 // Your old database password. If your database has no password, leave it empty.
$dbname = 'highschool'; // Your old database name.
$today = date("Y-m-d");

list($Tyear, $Tmonth, $Tday) = explode("-", $today);

$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
  die("MySQL connection failed: " . mysqli_connect_error());
}
mysqli_query($link, "SET NAMES 'utf8'");
//error_reporting(E_ALL);
function GetAcadmicyear()
{
  global $link;
  $SqlCommandForCFe = "SELECT `idoftable`, `name`, `active`, `dateoftthis` FROM `academicyear` where active='1'";
  $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
  $CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
  return ($CheckIfReturnInF['name']);
  //$var = "2017-2018";
}
$Acadyear = GetAcadmicyear();

$yearselect = $_POST['yearforsubject'];
$subclass = $_POST['subclassname'];

$SqlCommandForCFe = " SELECT `id`,`StudentName`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive` FROM `studentsregistered` , `student` WHERE  `IndexNo` = `studentindex`  and `yearselect` = '$yearselect' and `subclassname` = '$subclass'  and studentsregistered.acadmicyear = '$Acadyear' order by `StudentName`  ";

//  $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`,`StudentName`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `whodidthis` FROM `studentsregistered` , `student` WHERE `yearselect` = '$yearselect' and `subclassname` = '$subclass' and `active` = 1 order by StudentName ";


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

while ($row = mysqli_fetch_array($CheckIfHereInF)) {

  $studentindex = $row['studentindex'];

   $SqlCommandForCFe2 = " SELECT  `StudentName` as 'Student Name' , CONCAT('',Nationality ,'')  as 'Nationality'  FROM `student` where 
    `IndexNo` = '$studentindex' order by StudentName   ";
  $CheckIfHereInF2 = mysqli_query($link, $SqlCommandForCFe2);

  while ($CheckIfReturnInF2 = mysqli_fetch_array($CheckIfHereInF2, MYSQLI_ASSOC)) {

    $rowData[] = $CheckIfReturnInF2;
  }
}


$fileName = "Student Nationality" . date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");
$showColoumn = false;
if (!empty($rowData)) {
  foreach ($rowData as $developerInfo) {
    if (!$showColoumn) {
      echo implode("\t", array_keys($developerInfo)) . "\n";
      $showColoumn = true;
    }
    echo implode("\t", array_values($developerInfo)) . "\n";
  }
}
exit;