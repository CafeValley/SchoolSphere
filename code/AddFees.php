<?php
require_once("config.php");

print_r($_POST);

$TypeofFees = $_POST['TypeofFees'];
$Amount     = $_POST['Amount'];

$SqlCommandForCFe  = "SELECT `id` FROM `fees_set` WHERE `feesname` = '$TypeofFees' and `active`= 1  ";
$CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
if ($CheckIfHereInF) { // it return number of rows in the table.
  $row = mysqli_num_rows($CheckIfHereInF);
  if ($row) {
    $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
    $datehere = $CheckIfReturnInF['id'];
    $SqlCommandForCFe  = "UPDATE `fees_set` SET `active`= 0 WHERE `id`=$datehere";
    mysqli_query($link, $SqlCommandForCFe);
  } // close the result.
  mysqli_free_result($CheckIfHereInF);
}
$SqlItemIn = "INSERT INTO `fees_set`( `feesname`, `feesamount`, `feesdate`, `active`,`acadmicyear`) VALUES ('$TypeofFees','$Amount',now(),'1','$Acadyear')";

mysqli_query($link, $SqlItemIn);

$StateofFun = "Goodbar";
header("location:FormFeesSet.php?StuOFun=" . $StateofFun . "&Jnumber=" . $JNumber . "");