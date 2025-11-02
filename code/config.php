<?php
// Include constants first (before session/database dependencies)
require_once('constants.php');

//`acadmicyear` = '$Acadyear'
session_start();
if (session_id() == "") {
  echo "Nothing works!";
  exit();
}
ob_start();

date_default_timezone_set("Africa/Khartoum");

if (isset($_SESSION['suser_name']))
  $suser_name = $_SESSION['suser_name'];

include ('soloconnection.php');
//$dbpassword = 'root1234';                 // Your old database password. If your database has no password, leave it empty.
$dbname = 'highschool';                 // Your old database name.
$today = date("Y-m-d");

list($Tyear, $Tmonth, $Tday) = explode("-", $today);

$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
  die("MySQL connection failed: " . mysqli_connect_error());
}
mysqli_query($link, "SET NAMES 'utf8'");
//error_reporting(E_ALL);
$Acadyear = GetAcadmicyear();

if (!isset($_SESSION['suser_name'])) {
  header("location:login.php?skip=" . $SGIDUS . "");
  die();
}
function regis_fees($whichis)
{
  global $link;
  $SqlCommandForCFe = "SELECT  `feesamount`FROM `fees_set` where `feesname` = '$whichis' and  `active`  = 1";
  $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
  $CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF);
  return ($CheckIfReturnInF['feesamount']);
}

function studentname($studentindex)
{
  global $link;
  $SqlCommandForCFe  = "SELECT `Id_Student`,CONCAT(UCASE(LEFT(`StudentName`, 1)), SUBSTRING(`StudentName`, 2)) as `StudentName` , `Dateofbirth`, `Nationality`, `Religion`, `IndexNo` FROM `student` WHERE `IndexNo` = '$studentindex'";
  $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
  $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
if (isset($CheckIfReturnInF['StudentName']))
  return ($CheckIfReturnInF['StudentName']);
  else
  return ("");
}
function studentcurrentregisterid($studentindex)
{
global $link;
global $Acadyear;
//and active = 1
$SqlCommandForCFe = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `studentindex` =
'$studentindex' and `acadmicyear` = '$Acadyear' ";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
$CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
return ($CheckIfReturnInF['id']);
}
function studentindexcap($studentindex)
{
global $link;
$SqlCommandForCFe = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` = '$studentindex'";
$CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
$CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF);
return ($CheckIfReturnInF['IndexNo']);
}
function spacing($n)
{
  for ($i = 0; $i < $n; $i++)
    echo "&nbsp;";
}
?>

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<style>
  @import "css/bootstrap.min.css"print;
</style>

<?php
function numberofstudents($yearstarter)
{
  global $link;
  $datehere = "zero";
  $SqlCommandForCFe  = "SELECT count(*) as num FROM `student` WHERE `IndexNo` like '$yearstarter%'";
  $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
  if ($CheckIfHereInF) { // it return number of rows in the table.
    $row = mysqli_num_rows($CheckIfHereInF);
    if ($row) {
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      $datehere = $CheckIfReturnInF['num'];
    } // close the result.
    mysqli_free_result($CheckIfHereInF);
  }
  // Connection close
  //mysqli_close($link); if need to use a lot of connections
  return ($datehere);
}
function currentletter($yearstarter)
{
  $currentindexvar = currentindex($yearstarter);
  if ($currentindexvar == "zero")
    return ("zero");
  else {
    $CurrentLatter = substr($currentindexvar, 2, 1);    // returns last 2 slots
    return ($CurrentLatter);
  }
}
function currentindex($yearstarter)
{
  global $link;
  $datehere = "zero";
  $SqlCommandForCFe  = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` like '" . $yearstarter . "%' ORDER BY `IndexNo`  DESC";
  $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
  if ($CheckIfHereInF) { // it return number of rows in the table.
    $row = mysqli_num_rows($CheckIfHereInF);
    if ($row) {
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      $datehere = $CheckIfReturnInF['IndexNo'];
    } // close the result.
    mysqli_free_result($CheckIfHereInF);
  } // Connection close , //mysqli_close($link);
  return ($datehere);
}
function currentindexnumber($yearstarter, $latter)
{
  global $link;
  $datehere = "zero";
  $SqlCommandForCFe  = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` like '" . $yearstarter . $latter . "%' ORDER BY `IndexNo`  DESC";
  $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
  if ($CheckIfHereInF) { // it return number of rows in the table.
    $row = mysqli_num_rows($CheckIfHereInF);
    if ($row) {
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      $datehere = $CheckIfReturnInF['IndexNo'];
    } // close the result.
    mysqli_free_result($CheckIfHereInF);
  } // Connection close , //mysqli_close($link);
  $cutnumber = substr($datehere, 3, 2);
  return ($cutnumber);
}
function previousindex($yearstarter)
{
  global $link;
  $datehere = "zero";
  $SqlCommandForCFe  = "SELECT `IndexNo` FROM `student` WHERE `IndexNo` like '" . $yearstarter . "%' ORDER BY `IndexNo`  DESC";
  $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
  if ($CheckIfHereInF) { // it return number of rows in the table.
    $row = mysqli_num_rows($CheckIfHereInF);
    if ($row) {
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      $datehere = $CheckIfReturnInF['IndexNo'];
    } // close the result.
    mysqli_free_result($CheckIfHereInF);
  } // Connection close , //mysqli_close($link);
  return ($datehere);
}
function previousletter($yearstarter)
{
  $currentindexvar = previousindex($yearstarter);
  if ($currentindexvar == "zero") {
    return ("zero");
  } else {
    $CurrentLatter = substr($currentindexvar, 2, 1);    // returns last 2 slots
    return ($CurrentLatter);
  }
}
//know the current alpaticate
//-3 from student Indexno A,B,C and so
//deget -4 , -5 is the number
//intger in the form of 01

function makenumber()
{
  $currentyear = date("Y"); //Year!!!
  $rest = substr($currentyear, -2);    // returns last 2 slots
  //count for all students in this starting year
  $noofstudents = numberofstudents($rest); //current year current
  if ($noofstudents == "0") return ($rest . "A01"); //only happens first time !
  $lastindex = currentindex($rest);
  $currentvaluelatter = currentletter($rest);
  $indexintpart = substr(((string)$lastindex), -2);
  $currentvaluelatter = currentletter($rest);
  if ($indexintpart != '99')
    $nextintpart = intval($indexintpart) + 1;
  else {
    $nextintpart = 1;
    $currentvaluelatter++;
  }
  $value = str_pad($nextintpart, 2, "0", STR_PAD_LEFT);
  return ($rest . $currentvaluelatter . $value);
}

function listofgrades($Par = NULL)
{ ?>
<select name="yearforsubject" class="custom-select d-block w-100">
  <?php
    switch ($Par) {
      case 'P1': {
    ?>
  <option selected value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'P2': {
        ?>
  <option value="P1">P1</option>
  <option selected value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'P3': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option selected value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'P4': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option selected value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'P5': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option selected value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'P6': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option selected value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'J1': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option selected value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'J2': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option selected value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'J3': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option selected value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'S1': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option selected value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'S2': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option selected value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
      case 'S3': {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option selected value="S3">S3</option>
  <?php
        }
        break;
      default: {
        ?>
  <option value="P1">P1</option>
  <option value="P2">P2</option>
  <option value="P3">P3</option>
  <option value="P4">P4</option>
  <option value="P5">P5</option>
  <option value="P6">P6</option>
  <option value="J1">J1</option>
  <option value="J2">J2</option>
  <option value="J3">J3</option>
  <option value="S1">S1</option>
  <option value="S2">S2</option>
  <option value="S3">S3</option>
  <?php
        }
        break;
    }
    echo  "</select>";
  }
  function listforfees($Par = NULL)
  { ?>
  <select name="TypeofFees" class="custom-select d-block w-100">
    <?php
      switch ($Par) {
        case 'P1': {
      ?>
    <option selected value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'P2': {
          ?>
    <option value="P1">P1</option>
    <option selected value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'P3': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option selected value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'P4': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option selected value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'P5': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option selected value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'P6': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option selected value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'J1': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option selected value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'J2': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option selected value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'J3': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option selected value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'S1': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option selected value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'S2': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option selected value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        case 'S3': {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option selected value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
        default: {
          ?>
    <option value="P1">P1</option>
    <option value="P2">P2</option>
    <option value="P3">P3</option>
    <option value="P4">P4</option>
    <option value="P5">P5</option>
    <option value="P6">P6</option>
    <option value="J1">J1</option>
    <option value="J2">J2</option>
    <option value="J3">J3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    <option value="Registeration_Fees">Registeration Fees</option>
    <?php
          }
          break;
      }
      echo  "</select>";
    }
    function GetAcadmicyear()
    {
      global $link;
      $SqlCommandForCFe  = "SELECT `idoftable`, `name`, `active`, `dateoftthis` FROM `academicyear` where active='1'";
      $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      return ($CheckIfReturnInF['name']);
      //$var = "2017-2018";
    }

    function getamountwanted($studetindex)
    {
      global $link;
      $SqlCommandForCFe  = "SELECT ifnull(sum(`totaloffees`),0) as totaloffees FROM `studentsregisteredfees`  WHERE `studentindex` = '$studetindex' and  `typeofpayment` = '11' and `active1` = '1'";
      $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      return ($CheckIfReturnInF['totaloffees']);
    }
    function getamountpaied($studetindex)
    {
      global $link;
       $SqlCommandForCFe  = "SELECT ifnull(sum(`totaloffees`),0) as totaloffees FROM `studentsregisteredfees`  WHERE `studentindex` = '$studetindex' and  `typeofpayment` = '12' and `active1` = '1'";
      $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
      return ($CheckIfReturnInF['totaloffees']);
    }
    function getregistedidfrompayment($studetindex)
    {
      
      global $link;
       $SqlCommandForCFe  = "SELECT `relatedregisid` FROM `studentsregisteredfees`  WHERE `studentindex` = '$studetindex' and  `typeofpayment` = '11' and `active1` = '1'";
      $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
      $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
     
      $CheckIfReturnInF['relatedregisid'];
      return ($CheckIfReturnInF['relatedregisid']);
    }
    function checkifdone($studetindex)
    {
      global $link;
      $varW = getamountwanted($studetindex);
      $varP = getamountpaied($studetindex);
      if ($varP > $varW)
        return ("0");
      if ($varP == $varW) {
        $registed = getregistedidfrompayment($studetindex);
        $SqlCommandForCFe  = "UPDATE `studentsregisteredfees` set `active1` = '0'  WHERE `studentindex` = '$studetindex' and `active1` = '1'";
        mysqli_query($link, $SqlCommandForCFe);
        //UPDATE `studentsregistered` SET  `active`=[value-7],`2ndactive`=[value-8]  WHERE `id`= '$registed'
        $SqlCommandForCFe  = "UPDATE `studentsregistered` SET `2ndactive`='0'  WHERE `id`= '$registed'";
        mysqli_query($link, $SqlCommandForCFe);
        return ("1");
      }
    }

    function listsubclass($Par = NULL)
    { ?>
    <select name="subclassname" class="custom-select d-block w-100">
      <?php
        switch ($Par) {
          case 'A': {
        ?>
      <option selected value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>

      <?php
            }
            break;
          case 'B': {
            ?>
      <option value="A">A</option>
      <option selected value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <?php
            }
            break;
          case 'C': {
            ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option selected value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <?php
            }
            break;
          case 'C': {
            ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option selected value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <?php
            }
            break;
          case 'D': {
            ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option selected value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <?php
            }
            break;
            case 'E': {
              ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option selected value="E">E</option>
      <option value="F">F</option>
      <?php
              }
              break;
              case 'F': {
                ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option selected value="F">F</option>
      <?php
                }
                break;
          default: {
            ?>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <?php
            }
            break;
        }
        echo  "</select>";
      }
      function lastregisid()
      {
        global $link;
        $SqlCommandForCFe  = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `whodidthis`, `whenwasit` FROM `studentsregistered` order by id desc limit 1";
        $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
        $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
        return ($CheckIfReturnInF['id']);
      }
      function subnamechange($givenname)
      {
        switch ($givenname) {
          case "P1":
            return ("P1");
            break;
          case "P2":
            return ("P2");
            break;
          case "P3":
            return ("P3");
            break;
          case "P4":
            return ("P4");
            break;
          case "P5":
            return ("P5");
            break;
          case "P6":
            return ("P6");
            break;
          case "J1":
            return ("J1");
            break;
          case "J2":
            return ("J2");
            break;
          case "J3":
            return ("J3");
            break;

          case "S1":
            return ("S1");
            break;
          case "S2":
            return ("S2");
            break;
          case "S3":
            return ("S3");
            break;
            /*here is from big word to small*/
          case "S1":
            return ("S1");
            break;
          case "S2":
            return ("S2");
            break;
          case "S3":
            return ("S3");
            break;
        }
      }

      function subjectishere($subjectname)
      {
        global $link;
        $SqlCommandForCFe  = "SELECT `id`, `name`, `intotal` , `codename`, `priorityinr` FROM `subjects` WHERE `name` = '$subjectname'  ";
        $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
        if ($CheckIfHereInF->num_rows == 0)
          return ("NEW!");
        $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
        return ($CheckIfReturnInF['name']);
      }

      function getaverage($var1, $var2, $var3)
      {
        $numberdev = 0;
        $mainbumber = 0;
        if ($var1 != '**') {
          $numberdev++;
          $mainbumber += $var1;
        }
        if ($var2 != '**') {
          $numberdev++;
          $mainbumber += $var2;
        }
        if ($var3 != '**') {
          $numberdev++;
          $mainbumber += $var3;
        }
        if ($numberdev == 0)
          return (0);
        else
          return ((int)($mainbumber / $numberdev));
      }

      function mynumberformat($numberhere, $howmanytimeshow)
      {
        if ($numberhere == '**')
          return ('**');
        return (number_format($numberhere, $howmanytimeshow, '.', ''));
      }
      function getnextyear($current)
      {
        if ($current == 'P1')
          return ("P2");
        if ($current == 'P2')
          return ("P3");
        if ($current == 'P3')
          return ("P4");
        if ($current == 'P4')
          return ("P5");
        if ($current == 'P5')
          return ("P6");
        if ($current == 'P6')
          return ("J1");
        if ($current == 'J1')
          return ("J2");
        if ($current == 'J2')
          return ("J3");
        if ($current == 'J3')
          return ("S1");
        if ($current == 'S1')
          return ("S2");
        if ($current == 'S2')
          return ("S3");
        return ("OH WHAT!");
      }
      function getReceiptlist($studentindex)
      {
      global $link;
      $list = array();
      $SqlCommandForCFe = " SELECT `receiptno` FROM `studentsregisteredfees` WHERE `studentindex` LIKE '$studentindex'";
      $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
      if ($CheckIfHereInF->num_rows == 0)
        return (" ");
      while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) 
        $list[] = $CheckIfReturnInF['receiptno'];  
      // ASC
      asort($list);
      return ($list);
      }
      ?>