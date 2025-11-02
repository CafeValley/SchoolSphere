<?php
//data buff in test

/*/
if ($noofstudents > 100)
{
$charhunderinif = substr(((string)$noofstudents),0, -2);

$missingnumbers = intval($charhunderinif)*2; //00 , 100

$noofstudents += $missingnumbers;
}
else
$noofstudents++;


$lengthofthesize = strlen((string)$noofstudents);

if ($lengthofthesize == 3)
{
$charhunder = substr(((string)$noofstudents),0, -2);
$sizetoalp = Array (
'0' => 'A',
'1' => 'B',
'2' => 'C',
'3' => 'D',
'4' => 'E',
'5' => 'F',
'6' => 'G',
'7' => 'H',
'8' => 'I',
'9' => 'J',
'10' => 'K',
'11' => 'L',
'12' => 'M',
'13' => 'N',
'14' => 'O',
'15' => 'P',
'16' => 'Q',
'17' => 'R',
'18' => 'S',
'19' => 'T',
'20' => 'U',
'21' => 'V',
'22' => 'W',
'23' => 'X',
'24' => 'Y',
'25' => 'Z'
);

$minussize = Array (
'A' => '0',
'B' => '100',
'C' => '200',
'D' => '300',
'E' => '400',
'F' => '500',
'G' => '600',
'H' => '700',
'I' => '800',
'J' => '900',
'K' => '1000',
'L' => '1100',
'M' => '1200',
'N' => '1300',
'O' => '1400',
'P' => '1500',
'Q' => '1600',
'R' => '1700',
'S' => '1800',
'T' => '1900',
'U' => '2000',
'V' => '2100',
'W' => '2200',
'X' => '2300',
'Y' => '2400',
'Z' => '2500'
);

$latterover100 = $sizetoalp[$charhunder];
$min100        = $minussize[$latterover100];

$currentvaluelatter = currentletter($rest);

//$returnvalue        = previousletter($rest);


$noofstudents = $noofstudents - $min100;

if ($noofstudents == 0)
$noofstudents++;

$value = str_pad($noofstudents,2,"0",STR_PAD_LEFT);
return($rest.$latterover100.$value);


}

//make sure that there is no 00 in the number place
/*/

// echo " ".++$currentvaluelatter; how to get the next latter
//need to check its not z
//$currentvaluelatter = currentletter($rest);

//$value = str_pad($noofstudents,2,"0",STR_PAD_LEFT);

?>
