<?php

include ('soloconnection.php');
$dbname = 'highschool';                 // Your old database name.
$today = date("Y-m-d");

list($Tyear, $Tmonth, $Tday) = explode("-", $today);

$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
  die("MySQL connection failed: " . mysqli_connect_error());
}
mysqli_query($link, "SET NAMES 'utf8'");
//SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`,
//`acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE 1
function studentcurrentregisterid($studentindex)
{
global $link;
$SqlCommandForCFe = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `studentindex` =
'$studentindex' and active = 1";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
$CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
return ($CheckIfReturnInF['id']);
}

 $SqlCommandForCFe = "SELECT studentsregisteredfees.id as theid ,studentsregisteredfees.relatedregisid,
studentsregistered.studentindex, `totaloffees`,
`typeofpayment`,
`active1`, `receiptno` FROM `studentsregisteredfees` , `studentsregistered` where
  studentsregisteredfees.studentindex = studentsregistered.studentindex order by
  studentsregistered.studentindex ";
//and `typeofpayment` = '12'
$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

while($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF))
{
  $count++;
 $currentid = $CheckIfReturnInF['theid'];
  
  $currentindex = $CheckIfReturnInF['studentindex'];
  //$current = $CheckIfReturnInF['receiptno'];
  //$current = $CheckIfReturnInF['totaloffees'];
  //$current = $CheckIfReturnInF['typeofpayment'];
  $regisidmain = studentcurrentregisterid($currentindex);

$Sqlhotfix2 = "UPDATE `studentsregisteredfees` SET
`relatedregisid`='$regisidmain'
WHERE `id`='$currentid'";
mysqli_query($link, $Sqlhotfix2);
}



?>