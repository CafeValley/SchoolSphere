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
function studentindexcap($studentindex)
{
global $link;
$SqlCommandForCFe = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` = '$studentindex'";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
$CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
return ($CheckIfReturnInF['IndexNo']);
}

  $SqlCommandForCFe = "SELECT `studentindex`FROM `studentsregistered` ";
  $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
  while($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `studentsregistered` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}



$SqlCommandForCFe = "SELECT `studentindex`FROM `studentsregisteredfees` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
while($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `studentsregisteredfees` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}

$SqlCommandForCFe = "SELECT `studentindex`FROM `marks_third_term` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
while($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `marks_third_term` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}


$SqlCommandForCFe = "SELECT `studentindex`FROM `marks_second_term` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
while($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `marks_second_term` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}

$SqlCommandForCFe = "SELECT `studentindex`FROM `marks_first_term` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
while($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `marks_first_term` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}

$SqlCommandForCFe = "SELECT `studentindex`FROM `marks_finalexams` ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
while($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)){
$current = $CheckIfReturnInF['studentindex'];
$bigcap =studentindexcap($CheckIfReturnInF['studentindex']);
$sqlchange = "UPDATE `marks_finalexams` SET `studentindex`= '$bigcap' WHERE `studentindex` ='$current'";
mysqli_query($link, $sqlchange);
}
  ?>