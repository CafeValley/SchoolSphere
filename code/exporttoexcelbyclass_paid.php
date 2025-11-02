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
function mynumberformat($numberhere, $howmanytimeshow)
{
  if ($numberhere == '**')
    return ('**');
  return (number_format($numberhere, $howmanytimeshow, '.', ''));
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
  $firstinlist = 0;
          $studentlist = "";
while ($row = mysqli_fetch_array($CheckIfHereInF)) {

  $studentindex = $row['studentindex'];
            if ($firstinlist == 0) {
              $firstinlist++;
              $studentlist = $studentlist . " '" . $studentindex . "' ";
            } else
              $studentlist = $studentlist . " ,'" . $studentindex . "' ";
          }

  //  $SqlCommandForCFe2 = "SELECT `id`,`relatedregisid`,`studentindex`,`totaloffees`,`typeofpayment`,`active1`,`whodidthis`,`whenwasit` FROM `studentsregisteredfees` where `studentindex` in ($studentlist) and `typeofpayment` = '11' and studentsregisteredfees.acadmicyear = '$Acadyear' ";

   $SqlCommandForCFe2 = "SELECT `StudentName`, studentindex,sum(totaloffees) as totaloffees
   FROM `studentsregisteredfees` , `student` where `IndexNo` = studentindex and `studentindex` in
   ($studentlist) and `typeofpayment` = 11  and studentsregisteredfees.acadmicyear = '$Acadyear' group by studentindex , StudentName order by
   `StudentName`";

  // $SqlCommandForCFe2 = " SELECT `StudentName` as 'Student Name' , CONCAT('',phone1 ,' ',phone2,'')  as 'Telephone Number'   FROM `student` where 
  //   `IndexNo` = '$studentindex' order by StudentName   ";
  $CheckIfHereInF2 = mysqli_query($link, $SqlCommandForCFe2);

  while ($CheckIfReturnInF2 = mysqli_fetch_array($CheckIfHereInF2, MYSQLI_ASSOC)) {
    $newarry['No'] = $count;
    $count++;
    $newarry['Student Name'] =$CheckIfReturnInF2['StudentName'];
    $newarry['Studnet Index'] ='|'.$CheckIfReturnInF2['studentindex'].'|';
    $newarry['Paid'] =mynumberformat($CheckIfReturnInF2['totaloffees'], 0);

    $rowData[] = $newarry;
  }



$fileName = "Student Paid" . date('Ymd') . ".xls";
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
