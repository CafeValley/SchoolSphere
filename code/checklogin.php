<?php
session_start();

////$today = date("d/m/y",$today); in this convert !
include ('soloconnection.php');
$dbname = 'highschool';                 // Your old database name.
$today = date("Y-m-d");

list($Tyear, $Tmonth, $Tday) = explode("-", $today);

$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
  die("MySQL connection failed: " . mysqli_connect_error());
}
mysqli_query($link, "SET NAMES 'utf8'");
//print_r($_POST);
$username = $_POST['formusername'];
$password = $_POST['formpassword'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link,$username);
$password = mysqli_real_escape_string($link,$password);
//$password = md5($password);

 $sqlcount = "SELECT count(*) as checkcount FROM `members` WHERE `username` = '$username' and `password` = '$password'  ";
$sql = mysqli_query($link,$sqlcount) or die(mysqli_error());

// If result matched $username and $password.
$countarray = mysqli_fetch_array($sql);
$count = $countarray['checkcount'];

if ($count > 0) {
    $_SESSION['suser_name'] = $username;
    ##delete last temp orders for this user
	
    $sql = mysqli_query($link, "SELECT user_type FROM `members` WHERE `username` = '$username' and `password` = '$password' ") or die(mysqli_error());
    $rowtogetextra = mysqli_fetch_array($sql);

    switch ($rowtogetextra['user_type'])
    {
        case "SprAdmin":
            $_SESSION['utype'] = "SprAdmin";
             break;
        case "Admin":
            $_SESSION['utype'] = "Admin";
            break;
    }

  
		header("location:welcomepage.php");
		die();
} else {
		$SGIDUS = 0;
		header("location:login.php?TT=" . $SGIDUS . "");
		die();
}

?>
