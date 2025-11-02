<?php
    
// your config
$filename = '2019_04_14_15_03hellfadb.sql';
//from a form -> input -|.|-
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'oracle';
$dbName = 'hellfadb';

$maxRuntime = 8; // less then your max script execution limit


$link = mysqli_connect($dbHost, $dbUser, $dbPass);
if (!$link) {
  die('Not connected : ' . mysql_error());
}

// make hellfadb the current database
$db_selected = mysqli_select_db('$dbName', $link);
if (!$db_selected) {
    mysqli_query ($link , "CREATE DATABASE IF NOT EXISTS $dbName DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci");
    mysqli_query ($link , "USE $dbName");
}

$deadline = time()+$maxRuntime; 
$progressFilename = $filename.'_filepointer'; // tmp file for progress
$errorFilename = $filename.'_error'; // tmp file for erro

mysql_connect($dbHost, $dbUser, $dbPass) OR die('connecting to host: '.$dbHost.' failed: '.mysql_error());
mysql_select_db($dbName) OR die('select db: '.$dbName.' failed: '.mysql_error());

($fp = fopen($filename, 'r')) OR die('failed to open file:'.$filename);

// check for previous error
if( file_exists($errorFilename) ){
    die('<pre> previous error: '.file_get_contents($errorFilename));
}

// activate automatic reload in browser
echo '<html><head> <meta http-equiv="refresh" content="'.($maxRuntime+2).'"><pre>';

// go to previous file position
$filePosition = 0;
if( file_exists($progressFilename) ){
    $filePosition = file_get_contents($progressFilename);
    fseek($fp, $filePosition);
}

$queryCount = 0;
$query = '';
while( $deadline>time() AND ($line=fgets($fp, 1024000)) ){
    if(substr($line,0,2)=='--' OR trim($line)=='' ){
        continue;
    }

    $query .= $line;
    if( substr(trim($query),-1)==';' ){
        if( !mysql_query($query) ){
            $error = 'Error performing query \'<strong>' . $query . '\': ' . mysql_error();
            file_put_contents($errorFilename, $error."\n");
            exit;
        }
        $query = '';
        file_put_contents($progressFilename, ftell($fp)); // save the current file position for 
        $queryCount++;
    }
}

if( feof($fp) ){
    echo 'dump successfully restored!';
}else{
    echo ftell($fp).'/'.filesize($filename).' '.(round(ftell($fp)/filesize($filename), 2)*100).'%'."\n";
    echo $queryCount.' queries processed! please reload or wait for automatic browser refresh!';
}
?>