<?php
require_once("config.php");

print_r($_POST);

$Subjectname = $_POST['SubjectName'];
$notin       = $_POST['notin'];
$codename       = $_POST['codename'];
$priorityinr       = $_POST['priorityinr'];
//if (is_numeric($element)) {

echo $SqlItemIn = "INSERT INTO `subjects`( `name`, `intotal`,`codename`, `priorityinr`) VALUES ('$Subjectname','$notin','$codename','$priorityinr')";



if (subjectishere($Subjectname) == "NEW!") {
    mysqli_query($link, $SqlItemIn);
    $StateofFun = "Goodbar";
} else
    $StateofFun = "errorbar";


header("location:FormSubject.php?StuOFun=" . $StateofFun . "&Jnumber=" . $JNumber . "");
