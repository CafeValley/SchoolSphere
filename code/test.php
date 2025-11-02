<?php
require_once("config.php");
require_once("configmarks.php");
$a = getsubjectslist("S3","B");
print_r($a);
if(in_array("Engineering ",$a))
{   
    echo "hi";
}

if (in_array(array('p', 'h'), $a)) {
    echo "'ph' was found\n";
}
if (array_key_exists('subjectname', $a)) {
    echo "The 'first' element is in the array";
}else
{
    echo "no2";
}


echo "(";
echo $key = array_search('Engineering', $a);
//Array ( [prior] => 5 [codename] => ENGI [subjectname] => Engineering )
?>