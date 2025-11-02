<?php

$hostname = 'localhost';
$dbusername = 'root';             // Your old database username.
$dbpassword = 'oracleoracle';                 // Your old database password. If your database has no password, leave it empty.
$dbname = 'highschool';                 // Your old database name.
$today = date("Y-m-d");

list($Tyear, $Tmonth, $Tday) = explode("-", $today);

$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
  die("MySQL connection failed: " . mysqli_connect_error());
}
mysqli_query($link, "SET NAMES 'utf8'");
function studentindexcap($studentindex)
{
  global $link;
  $SqlCommandForCFe = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` = '$studentindex'";
  $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
  $CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
  return ($CheckIfReturnInF['IndexNo']);
}
//

$SqlCommandForCFe = "SELECT `id`, `studentindex` FROM `studentsregistered` WHERE 
 `studentindex` like binary  '%a%'
 or `studentindex` like binary  '%b%'
 or `studentindex` like binary  '%c%'
 or `studentindex` like binary  '%d%'
 or `studentindex` like binary  '%e%'
 or `studentindex` like binary  '%f%'
 or `studentindex` like binary  '%g%'
 or `studentindex` like binary  '%h%'
 or `studentindex` like binary  '%i%'
 or `studentindex` like binary  '%j%'
 or `studentindex` like binary  '%k%'
 or `studentindex` like binary  '%l%'
 or `studentindex` like binary  '%m%'
 or `studentindex` like binary  '%n%'
 or `studentindex` like binary  '%o%'
 or `studentindex` like binary  '%p%'
 or `studentindex` like binary  '%q%'
 or `studentindex` like binary  '%r%'
 or `studentindex` like binary  '%s%'
 or `studentindex` like binary  '%t%'
 or `studentindex` like binary  '%u%'
 or `studentindex` like binary  '%v%'
 or `studentindex` like binary  '%w%'
 or `studentindex` like binary  '%x%'
 or `studentindex` like binary  '%y%'
 or `studentindex` like binary  '%z%'
 ";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `studentsregistered` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}

$SqlCommandForCFe = "SELECT `id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`, `acadmicyear`, `whodidthis`, `whenwasit`, `receiptno` FROM `studentsregisteredfees` WHERE 
`studentindex` like binary  '%a%'
or `studentindex` like binary  '%b%'
or `studentindex` like binary  '%c%'
or `studentindex` like binary  '%d%'
or `studentindex` like binary  '%e%'
or `studentindex` like binary  '%f%'
or `studentindex` like binary  '%g%'
or `studentindex` like binary  '%h%'
or `studentindex` like binary  '%i%'
or `studentindex` like binary  '%j%'
or `studentindex` like binary  '%k%'
or `studentindex` like binary  '%l%'
or `studentindex` like binary  '%m%'
or `studentindex` like binary  '%n%'
or `studentindex` like binary  '%o%'
or `studentindex` like binary  '%p%'
or `studentindex` like binary  '%q%'
or `studentindex` like binary  '%r%'
or `studentindex` like binary  '%s%'
or `studentindex` like binary  '%t%'
or `studentindex` like binary  '%u%'
or `studentindex` like binary  '%v%'
or `studentindex` like binary  '%w%'
or `studentindex` like binary  '%x%'
or `studentindex` like binary  '%y%'
or `studentindex` like binary  '%z%'
";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  echo $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `studentsregisteredfees` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}

$SqlCommandForCFe = "SELECT `id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date` FROM `marks_first_term`  WHERE 
`studentindex` like binary  '%a%'
or `studentindex` like binary  '%b%'
or `studentindex` like binary  '%c%'
or `studentindex` like binary  '%d%'
or `studentindex` like binary  '%e%'
or `studentindex` like binary  '%f%'
or `studentindex` like binary  '%g%'
or `studentindex` like binary  '%h%'
or `studentindex` like binary  '%i%'
or `studentindex` like binary  '%j%'
or `studentindex` like binary  '%k%'
or `studentindex` like binary  '%l%'
or `studentindex` like binary  '%m%'
or `studentindex` like binary  '%n%'
or `studentindex` like binary  '%o%'
or `studentindex` like binary  '%p%'
or `studentindex` like binary  '%q%'
or `studentindex` like binary  '%r%'
or `studentindex` like binary  '%s%'
or `studentindex` like binary  '%t%'
or `studentindex` like binary  '%u%'
or `studentindex` like binary  '%v%'
or `studentindex` like binary  '%w%'
or `studentindex` like binary  '%x%'
or `studentindex` like binary  '%y%'
or `studentindex` like binary  '%z%'
";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  echo $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `marks_first_term` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}

$SqlCommandForCFe = "SELECT `id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date` FROM `marks_second_term`   WHERE 
`studentindex` like binary  '%a%'
or `studentindex` like binary  '%b%'
or `studentindex` like binary  '%c%'
or `studentindex` like binary  '%d%'
or `studentindex` like binary  '%e%'
or `studentindex` like binary  '%f%'
or `studentindex` like binary  '%g%'
or `studentindex` like binary  '%h%'
or `studentindex` like binary  '%i%'
or `studentindex` like binary  '%j%'
or `studentindex` like binary  '%k%'
or `studentindex` like binary  '%l%'
or `studentindex` like binary  '%m%'
or `studentindex` like binary  '%n%'
or `studentindex` like binary  '%o%'
or `studentindex` like binary  '%p%'
or `studentindex` like binary  '%q%'
or `studentindex` like binary  '%r%'
or `studentindex` like binary  '%s%'
or `studentindex` like binary  '%t%'
or `studentindex` like binary  '%u%'
or `studentindex` like binary  '%v%'
or `studentindex` like binary  '%w%'
or `studentindex` like binary  '%x%'
or `studentindex` like binary  '%y%'
or `studentindex` like binary  '%z%'
";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  echo $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `marks_second_term` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}
//
$SqlCommandForCFe = "SELECT `id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date` FROM `marks_third_term`   WHERE 
`studentindex` like binary  '%a%'
or `studentindex` like binary  '%b%'
or `studentindex` like binary  '%c%'
or `studentindex` like binary  '%d%'
or `studentindex` like binary  '%e%'
or `studentindex` like binary  '%f%'
or `studentindex` like binary  '%g%'
or `studentindex` like binary  '%h%'
or `studentindex` like binary  '%i%'
or `studentindex` like binary  '%j%'
or `studentindex` like binary  '%k%'
or `studentindex` like binary  '%l%'
or `studentindex` like binary  '%m%'
or `studentindex` like binary  '%n%'
or `studentindex` like binary  '%o%'
or `studentindex` like binary  '%p%'
or `studentindex` like binary  '%q%'
or `studentindex` like binary  '%r%'
or `studentindex` like binary  '%s%'
or `studentindex` like binary  '%t%'
or `studentindex` like binary  '%u%'
or `studentindex` like binary  '%v%'
or `studentindex` like binary  '%w%'
or `studentindex` like binary  '%x%'
or `studentindex` like binary  '%y%'
or `studentindex` like binary  '%z%'
";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  echo $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `marks_third_term` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}
//
$SqlCommandForCFe = "SELECT `id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date` FROM `marks_finalexams`   WHERE 
`studentindex` like binary  '%a%'
or `studentindex` like binary  '%b%'
or `studentindex` like binary  '%c%'
or `studentindex` like binary  '%d%'
or `studentindex` like binary  '%e%'
or `studentindex` like binary  '%f%'
or `studentindex` like binary  '%g%'
or `studentindex` like binary  '%h%'
or `studentindex` like binary  '%i%'
or `studentindex` like binary  '%j%'
or `studentindex` like binary  '%k%'
or `studentindex` like binary  '%l%'
or `studentindex` like binary  '%m%'
or `studentindex` like binary  '%n%'
or `studentindex` like binary  '%o%'
or `studentindex` like binary  '%p%'
or `studentindex` like binary  '%q%'
or `studentindex` like binary  '%r%'
or `studentindex` like binary  '%s%'
or `studentindex` like binary  '%t%'
or `studentindex` like binary  '%u%'
or `studentindex` like binary  '%v%'
or `studentindex` like binary  '%w%'
or `studentindex` like binary  '%x%'
or `studentindex` like binary  '%y%'
or `studentindex` like binary  '%z%'
";

$CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//
while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
  $currentid = $CheckIfReturnInF['id'];
  echo $currentindex = $CheckIfReturnInF['studentindex'];
  $capindex = studentindexcap($currentindex);
  $Sqlhotfix2 = "UPDATE `marks_finalexams` SET `studentindex`='$capindex' WHERE `id`='$currentid'";
  mysqli_query($link, $Sqlhotfix2);
}
// 