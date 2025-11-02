<?php
require_once("config.php");

print_r($_POST);

$Studentnamepure = $_POST['Studentname'];
$Studentname = ucwords(strtolower($Studentnamepure));

if (empty($_POST['dateofbirth']))
    $_POST['dateofbirth'] = '0000';

$dateofbirth = $_POST['dateofbirth'] . "-1-1";
$Religion    = $_POST['Religion'];
$Nationality = $_POST['Nationality'];
$IndexNo     = $_POST['IndexNo'];
$phone1      = $_POST['phone1'];
$phone2      = $_POST['phone2'];
$Email       = $_POST['Email'];
$Address     = $_POST['Address'];

$Sqlcheck = "select count(Id_Student) as x from student where IndexNo = '$IndexNo'";
$CheckIfHereInFbig2 = mysqli_query($link, $Sqlcheck);
$CheckIfReturnInFbig = mysqli_fetch_array($CheckIfHereInFbig2);
$checkbaby = $CheckIfReturnInFbig['x'];

if ($checkbaby == 0) {
    echo $SqlItemIn = "INSERT INTO `student`(`StudentName`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo`,`Address_area`, `phone1`, `phone2`,`Email`,`acadmicyear` )
    VALUES ('$Studentname','$dateofbirth','$Nationality','$Religion','$IndexNo','$Address','$phone1','$phone2','$Email','$Acadyear')";
    mysqli_query($link, $SqlItemIn);
    $StateofFun = "Goodbar";
} else {
    $StateofFun = "badbar";
}
header("location:FormStudent.php?StuOFun=" . $StateofFun . "&Jnumber=" . $JNumber . "");
die();
