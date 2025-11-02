<?php
require_once("config.php");

print_r($_POST);

$indexno    = $_POST['IndexNo'];
$yearselect = $_POST['yearforsubject'];
$subclassname   = $_POST['subclassname'];
//$Acadyear
$feesregis  = $_POST['Regisfees'];
$feesyear   = $_POST['Yearfees'];
//forthe discount

if (empty($_POST['discounthere']))
  $discounthere   = 0;
else 
  $discounthere   = $_POST['discounthere'];

$totalfees  = $feesyear + $feesregis - $discounthere;

$SqlCommandForCFe  = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `studentindex` = '$indexno' and `acadmicyear` = '$Acadyear'";
//and  `yearselect` = '$yearselect' and `subclassname` = '$subclassname' and
$CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);

$row = mysqli_num_rows($CheckIfHereInF);
if ($row > 0) {
    $StateofFun = "failbar";
    header("location:FormRegister.php?StuOFun=" . $StateofFun . "&Jnumber=" . $JNumber . "");
    die();
} else {

    $SqlItemIn = "INSERT INTO `studentsregistered`( `studentindex`, `yearselect`,`subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit`,`acadmicyear`) VALUES ('$indexno','$yearselect','$subclassname','$feesregis','$feesyear',1,1,'admin',now(),'$Acadyear')";

    mysqli_query($link, $SqlItemIn);

    $lastregisid = lastregisid();

    $SqlItemIn2 = "INSERT INTO `studentsregisteredfees`(`studentindex`,`relatedregisid`, `totaloffees`, `typeofpayment`, `whodidthis`,`active1`,`acadmicyear`) VALUES ('$indexno','$lastregisid','$totalfees','11','admin','1','$Acadyear')";

    mysqli_query($link, $SqlItemIn2);

    $SqlItemIn3 = "INSERT INTO `discountdata`(`regisid`, `discountamount`) VALUES ($lastregisid,'$discounthere')";

    mysqli_query($link, $SqlItemIn3);

//if there is new first installment
//if ($_POST['firstinstallment'] == 0)
//changed from value 0 to non
if (empty($_POST['firstinstallment']))
echo " ";
else 
{
    $pay   = $_POST['firstinstallment'];
    $receiptNo   = $_POST['receiptNo'];
    $varW = getamountwanted($indexno);
    $varP = getamountpaied($indexno);
    if ($varP == $varW)
      $vartogetifallgood = "1";
  
    if (($varW > $varP) && ($pay <= $varW)) {
      $receiptno = $_POST['receiptNo'];
     echo $SqlCommandForCFe = "INSERT INTO `studentsregisteredfees`(`relatedregisid`, `studentindex`, `totaloffees`,
     `typeofpayment`,
     `active1`,`receiptno`, `whodidthis`,`acadmicyear`) VALUES
     ('$lastregisid','$indexno','$pay','12','1','$receiptno','admin','$Acadyear')";
      mysqli_query($link, $SqlCommandForCFe);
      $vartogetifallgood = checkifdone($indexno);
    }
    if ($pay > $varW)
      $vartogetifallgood = "2";
}

    $StateofFun = "Goodbar";
    header("location:FormRegister.php?StuOFun=" . $StateofFun . "&Jnumber=" . $JNumber . "");
    die();
}