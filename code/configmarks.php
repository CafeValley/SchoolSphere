<?php
function getsubjectslistregister($grade, $subclassname)
{
    global $link;
    $listofregis = '';
    $Sql = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and `subclassname` = '$subclassname' and `active` = 1";
    $check      = mysqli_query($link, $Sql);
    $first = 1;
    while ($row   = mysqli_fetch_array($check)) {
        if ($first == 1) {
            $listofregis = $listofregis . "'" . $row['studentindex'] . "'";
            $first++;
        } else
            $listofregis = $listofregis . " , '" . $row['studentindex'] . "'";
    }
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_first_term` , `subjects` WHERE subjects.name = marks_first_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and marks_first_term.studentindex in ($listofregis) order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }

    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistregister2nd($grade, $subclassname)
{
    global $link;
    $listofregis = '';
    $Sql = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and `subclassname` = '$subclassname' and `active` = 1";
    $check      = mysqli_query($link, $Sql);
    $first = 1;
    while ($row   = mysqli_fetch_array($check)) {
        if ($first == 1) {
            $listofregis = $listofregis . "'" . $row['studentindex'] . "'";
            $first++;
        } else
            $listofregis = $listofregis . " , '" . $row['studentindex'] . "'";
    }
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_second_term` , `subjects` WHERE subjects.name = marks_second_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and marks_second_term.studentindex in ($listofregis) order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistregister3rd($grade, $subclassname)
{
    global $link;
    $listofregis = '';
    $Sql = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and `subclassname` = '$subclassname' and `active` = 1";
    $check      = mysqli_query($link, $Sql);
    $first = 1;
    while ($row   = mysqli_fetch_array($check)) {
        if ($first == 1) {
            $listofregis = $listofregis . "'" . $row['studentindex'] . "'";
            $first++;
        } else
            $listofregis = $listofregis . " , '" . $row['studentindex'] . "'";
    }
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_third_term` , `subjects` WHERE subjects.name = marks_third_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and marks_third_term.studentindex in ($listofregis) order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistregisterFinal($grade, $subclassname)
{
    global $link;
    $listofregis = '';
    $Sql = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and `subclassname` = '$subclassname' and `active` = 1";
    $check      = mysqli_query($link, $Sql);
    $first = 1;
    while ($row   = mysqli_fetch_array($check)) {
        if ($first == 1) {
            $listofregis = $listofregis . "'" . $row['studentindex'] . "'";
            $first++;
        } else
            $listofregis = $listofregis . " , '" . $row['studentindex'] . "'";
    }
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_finalexams` , `subjects` WHERE subjects.name = marks_finalexams.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and marks_finalexams.studentindex in ($listofregis) order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslist($grade, $subclassname, $coffeeMaker = NULL)
{
    global $link;
    global $Acadyear;
    if (is_null($coffeeMaker))
        $whereintoltao = " and intotal = 1";
    else
        $whereintoltao = " ";
    $listsubjectpri = array();

    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_first_term` , `subjects` WHERE subjects.name = marks_first_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' $whereintoltao and `acadmicyear` = '$Acadyear' order by subjectid";

    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
            $intotal = $returnpricode['intotal'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname, 'intotal' => $intotal];
        //$list[] = $codenamesub;
    }

    //get the subjects from the 2nd term
    $SqlCommandForCFe2 = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_second_term` , `subjects` WHERE subjects.name = marks_second_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' $whereintoltao and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);
    while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {
        $subjectname2 = $CheckIfReturnInF2['subjectid'];
        //check if there is new subjects
        $found = 0;
        foreach ($listsubjectpri as $key => $value) {
            foreach ($value as $key2 => $value2)
                if ($key2 == 'subjectname')
                    if ($value2 == $subjectname2)
                        $found = 1;
        }
        if ($found == 0) {
            $sqlgetpricode2 = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname2'  ORDER BY `subjects`.`priorityinr` DESC";
            $checkpricode2      = mysqli_query($link, $sqlgetpricode2);
            while ($returnpricode2   = mysqli_fetch_array($checkpricode2)) {
                $codenamesub2 = $returnpricode2['codename'];
                $priorsub2 = $returnpricode2['priorityinr'];
                $intotal2 = $returnpricode2['intotal'];
            }
            $listsubjectpri[] = ['prior' => $priorsub2, 'codename' => $codenamesub2, 'subjectname' => $subjectname2, 'intotal' => $intotal2];
        }
        // ASC
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistperstudent($grade, $subclassname, $coffeeMaker = NULL, $studentindex = NULL)
{
    global $link;
    global $Acadyear;
    if (is_null($coffeeMaker))
        $whereintoltao = " and intotal = 1";
    else
        $whereintoltao = " ";
    if (is_null($studentindex))
        $wherestudent = " ";
    else
        $wherestudent = " and `studentindex` LIKE '$studentindex'";

    $listsubjectpri = array();

    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_first_term` , `subjects` WHERE subjects.name = marks_first_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' $whereintoltao $wherestudent and `acadmicyear` = '$Acadyear' order by subjectid";

    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
            $intotal = $returnpricode['intotal'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname, 'intotal' => $intotal];
        //$list[] = $codenamesub;
    }

    //get the subjects from the 2nd term
    $SqlCommandForCFe2 = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_second_term` , `subjects` WHERE subjects.name = marks_second_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' $whereintoltao $wherestudent and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF2      = mysqli_query($link, $SqlCommandForCFe2);
    while ($CheckIfReturnInF2   = mysqli_fetch_array($CheckIfHereInF2)) {
        $subjectname2 = $CheckIfReturnInF2['subjectid'];
        //check if there is new subjects
        $found = 0;
        foreach ($listsubjectpri as $key => $value) {
            foreach ($value as $key2 => $value2)
                if ($key2 == 'subjectname')
                    if ($value2 == $subjectname2)
                        $found = 1;
        }
        if ($found == 0) {
            $sqlgetpricode2 = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname2'  ORDER BY `subjects`.`priorityinr` DESC";
            $checkpricode2      = mysqli_query($link, $sqlgetpricode2);
            while ($returnpricode2   = mysqli_fetch_array($checkpricode2)) {
                $codenamesub2 = $returnpricode2['codename'];
                $priorsub2 = $returnpricode2['priorityinr'];
                $intotal2 = $returnpricode2['intotal'];
            }
            $listsubjectpri[] = ['prior' => $priorsub2, 'codename' => $codenamesub2, 'subjectname' => $subjectname2, 'intotal' => $intotal2];
        }
        // ASC
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistold($grade, $subclassname)
{
    global $link;
    global $Acadyear;
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_first_term` , `subjects` WHERE subjects.name = marks_first_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslist2nd($grade, $subclassname)
{
    global $link;
    global $Acadyear;
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_second_term` , `subjects` WHERE subjects.name = marks_second_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslist3rd($grade, $subclassname)
{
    global $link;
    global $Acadyear;
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_third_term` , `subjects` WHERE subjects.name = marks_third_term.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
function getsubjectslistfinal($grade, $subclassname)
{
    global $link;
    global $Acadyear;
    $list = array();
    $listsubjectpri = array();
    $SqlCommandForCFe = " SELECT distinct(`subjectid`) as `subjectid` FROM `marks_finalexams` , `subjects` WHERE subjects.name = marks_finalexams.subjectid and `class` = '$grade' and `subclassname` = '$subclassname' and intotal = 1 and `acadmicyear` = '$Acadyear' order by subjectid";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $subjectname = $CheckIfReturnInF['subjectid'];
        // ASC
        $sqlgetpricode = " SELECT `id`, `name`, `intotal`, `codename`, `priorityinr` FROM `subjects` where `name` = '$subjectname'  ORDER BY `subjects`.`priorityinr` DESC";
        $checkpricode      = mysqli_query($link, $sqlgetpricode);
        while ($returnpricode   = mysqli_fetch_array($checkpricode)) {
            $codenamesub = $returnpricode['codename'];
            $priorsub = $returnpricode['priorityinr'];
        }
        $listsubjectpri[] = ['prior' => $priorsub, 'codename' => $codenamesub, 'subjectname' => $subjectname];
        $list[] = $codenamesub;
    }
    asort($listsubjectpri);
    return ($listsubjectpri);
}
// function getstnd($grade, $subclassname, $souceofdata = 1)
// {
//     global $link;
//     global $Acadyear;
//     $whereadded = " ";
//     //if ($souceofdata == 'academic') {
//     if ($souceofdata == 'register')

//         $whereadded = " and `active` = 1 ";
//     else
//         $whereadded = " and `acadmicyear` = '$Acadyear' ";


//     $liststnd = array();
//     $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' $whereadded ";
//     $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
//     $AllowToGetMark = (getsubjectslist($grade, $subclassname));
//     while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
//         $studentindex = $CheckIfReturnInF['studentindex'];
//         $totaldisplayed = 0;
//         foreach ($AllowToGetMark as $list) {
//             //$subjectcount = count($list);
//             $first = getmarkfirst($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
//             if ($first != '**')
//                 $totaldisplayed += intval($first);
//         }
//         $liststnd[$studentindex] = $totaldisplayed;
//         //$liststnd[$studentindex] = $totaldisplayed/$subjectcount;
//     }
//     arsort($liststnd);

//     $first = 0;
//     $loc = 1;
//     $spacefiler = 0;
//     $oldval = 0;

//     foreach ($liststnd as $x => $x_value) {
//         if ($first != 1) {
//             if ($x_value == $oldval) {
//                 $spacefiler++;
//                 $loc--;

//                 $liststnd[$x] = $loc;
//                 $loc++;
//                 $oldval = $x_value;
//             } else {
//                 $loc = $loc + $spacefiler;
//                 $liststnd[$x] = $loc;
//                 $loc++;
//                 $oldval = $x_value;
//                 $spacefiler = 0;
//             }
//         } else //when its first loc
//         {
//             $first = 1;
//             $liststnd[$x] = $loc;
//             $loc++;
//             $oldval = $x_value;
//             $spacefiler = 0;
//         }
//     }


//     return ($liststnd);
// }
function getstnd($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";

    if ($souceofdata == 'register') {
        $whereadded = " and `active` = 1 ";
    } else {
        $whereadded = " and `acadmicyear` = ? ";
    }

    $liststnd = array();
    $sql = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit`
            FROM `studentsregistered`
            WHERE `yearselect` = ? and `subclassname` = ? $whereadded";
    $stmt = mysqli_prepare($link, $sql);

    if ($souceofdata != 'register') {
        mysqli_stmt_bind_param($stmt, 'sss', $grade, $subclassname, $Acadyear);
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $grade, $subclassname);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $AllowToGetMark = getsubjectslist($grade, $subclassname);

    while ($CheckIfReturnInF = mysqli_fetch_array($result)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;

        foreach ($AllowToGetMark as $list) {
            $subjectname = $list['subjectname'];
            $first = getmarkfirst($studentindex, $subjectname, $grade, $subclassname, $Acadyear);

            if ($first != '**') {
                $totaldisplayed += intval($first);
            }
        }

        $liststnd[$studentindex] = $totaldisplayed;
    }

    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }

    return $liststnd;
}

function getstnd2($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')
        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getmark2nd($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**')
                $totaldisplayed += intval($first);
            else
                $totaldisplayed += 0;
        }
        $liststnd[$studentindex] = $totaldisplayed;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstnd3($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getmark3rd($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**')
                $totaldisplayed += intval($first);
        }
        $liststnd[$studentindex] = $totaldisplayed;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstndF($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getfinalmark($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**')
                $totaldisplayed += intval($first);
        }
        $liststnd[$studentindex] = $totaldisplayed;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }
    
    return ($liststnd);
}
function getstndFresults($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = '';
    if ($souceofdata == 'register')
        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `acadmicyear` ='$Acadyear' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);

    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];

        if ($souceofdata == 'register') {
            $tfirst = getfirsttermavg($grade, $subclassname, $studentindex, 'register');
            $t2nd = get2ndtermavg($grade, $subclassname, $studentindex, 'register');
            $t3rd = get3rdtermavg($grade, $subclassname, $studentindex, 'register');
            $avghere = getaverage($tfirst, $t2nd, $t3rd);
            $final = getfinaltermavg($grade, $subclassname, $studentindex, 'register');
        } else {
            $tfirst = getfirsttermavg($grade, $subclassname, $studentindex);
            $t2nd = get2ndtermavg($grade, $subclassname, $studentindex);
            $t3rd = get3rdtermavg($grade, $subclassname, $studentindex);
            $avghere = getaverage($tfirst, $t2nd, $t3rd);
            $final = getfinaltermavg($grade, $subclassname, $studentindex);
        }
        $Fregus = getaverage($avghere, $final, '**');;

        $liststnd[$studentindex] = (int)$Fregus;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstndavg($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')
        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and
`subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];

        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($AllowToGetMark as $list) {
            //$subjectcount = count($list);
            $first = getmarkfirst($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += intval($first);
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        $z = ($totaldisplayed / $numberofsubjects);
        $liststnd[$studentindex] = $z;
        //$liststnd[$studentindex] = $totaldisplayed/$subjectcount;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstnd2avg($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')
        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and
`subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getmark2nd($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += intval($first);
                $numberofsubjects++;
            }
            //else
            //$totaldisplayed += 0;
        }

        //stop here
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        $z = $totaldisplayed / $numberofsubjects;
        $liststnd[$studentindex] = $z;
    }
    arsort($liststnd);
    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }

    return ($liststnd);
}
function getstnd3avg($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and
`subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getmark3rd($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += intval($first);
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        $z = $totaldisplayed / $numberofsubjects;
        $liststnd[$studentindex] = $z;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstndFavg($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";

    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and
`subclassname` = '$subclassname' $whereadded ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($AllowToGetMark as $list) {
            $first = getfinalmark($studentindex, $list['subjectname'], $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += intval($first);
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        $z = $totaldisplayed / $numberofsubjects;
        $liststnd[$studentindex] = $z;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
function getstndFresultsavg($grade, $subclassname, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = '';
    if ($souceofdata == 'register')
        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $liststnd = array();
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`,
`2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `yearselect` = '$grade' and
`subclassname` = '$subclassname' and `acadmicyear` ='$Acadyear' $whereadded ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);

    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];

        if ($souceofdata == 'register') {
            $tfirst = getfirsttermavg($grade, $subclassname, $studentindex, 'register');
            $t2nd = get2ndtermavg($grade, $subclassname, $studentindex, 'register');
            $t3rd = get3rdtermavg($grade, $subclassname, $studentindex, 'register');
            $avghere = getaverage($tfirst, $t2nd, $t3rd);
            $final = getfinaltermavg($grade, $subclassname, $studentindex, 'register');
        } else {
            $tfirst = getfirsttermavg($grade, $subclassname, $studentindex);
            $t2nd = get2ndtermavg($grade, $subclassname, $studentindex);
            $t3rd = get3rdtermavg($grade, $subclassname, $studentindex);
            $avghere = getaverage($tfirst, $t2nd, $t3rd);
            $final = getfinaltermavg($grade, $subclassname, $studentindex);
        }
        $Fregus = getaverage($avghere, $final, '**');;

        $liststnd[$studentindex] = $Fregus;
    }
    arsort($liststnd);

    $first = 0;
    $loc = 1;
    $spacefiler = 0;
    $oldval = 0;

    foreach ($liststnd as $x => $x_value) {
        if ($first != 1) {
            if ($x_value == $oldval) {
                $spacefiler++;
                $loc--;

                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
            } else {
                $loc = $loc + $spacefiler;
                $liststnd[$x] = $loc;
                $loc++;
                $oldval = $x_value;
                $spacefiler = 0;
            }
        } else //when its first loc
        {
            $first = 1;
            $liststnd[$x] = $loc;
            $loc++;
            $oldval = $x_value;
            $spacefiler = 0;
        }
    }


    return ($liststnd);
}
// function getmarkfirst($studentindex, $subjectname, $class, $classid, $acadmicyear)
// {
//     if (is_array($subjectname))
//         return ("");
//     //, $inornot='null'
//     global $link;
//     $SqlCommandForCFe  = "SELECT  `mark` FROM `marks_first_term` where `studentindex` = '$studentindex' and `subjectid` = '$subjectname' and `class` = '$class' and `subclassname` = '$classid' and `acadmicyear` = '$acadmicyear' ";
//     //and `intotal` =  '$inornot'
//     $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
//     if ($CheckIfHereInF->num_rows == 0)
//         return ("**");
//     $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
//     return ($CheckIfReturnInF['mark']);
// }
function getmarkfirst($studentindex, $subjectname, $class, $classid, $acadmicyear) {
    if (is_array($subjectname)) {
        return "";
    }

    global $link;

    $stmt = $link->prepare("SELECT `mark` FROM `marks_first_term` WHERE `studentindex` = ? AND `subjectid` = ? AND `class` = ? AND `subclassname` = ? AND `acadmicyear` = ?");
    $stmt->bind_param("sssss", $studentindex, $subjectname, $class, $classid, $acadmicyear);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return "**";
    }

    $row = $result->fetch_assoc();
    return $row["mark"];
}
function getmark2nd($studentindex, $subjectname, $class, $classid, $acadmicyear)
{
    if (is_array($subjectname))
        return ("");
    //, $inornot='null'
    global $link;
    $SqlCommandForCFe  = "SELECT  `mark` FROM `marks_second_term` where `studentindex` = '$studentindex' and `subjectid` = '$subjectname' and `class` = '$class' and `subclassname` = '$classid' and `acadmicyear` = '$acadmicyear' ";
    //and `intotal` =  '$inornot'
    $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
    if ($CheckIfHereInF->num_rows == 0)
        return ("**");
    $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
    return ($CheckIfReturnInF['mark']);
}
function getmark3rd($studentindex, $subjectname, $class, $classid, $acadmicyear)
{
    if (is_array($subjectname))
        return ("");
    //, $inornot='null'
    global $link;
    $SqlCommandForCFe  = "SELECT  `mark` FROM `marks_third_term` where `studentindex` = '$studentindex' and `subjectid` = '$subjectname' and `class` = '$class' and `subclassname` = '$classid' and `acadmicyear` = '$acadmicyear' ";
    //and `intotal` =  '$inornot'
    $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
    if ($CheckIfHereInF->num_rows == 0)
        return ("**");
    $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
    return ($CheckIfReturnInF['mark']);
}
function getfinalmark($studentindex, $subjectname, $class, $classid, $acadmicyear)
{
    if (is_array($subjectname))
        return ("");
    //, $inornot='null'
    global $link;
    $SqlCommandForCFe  = "SELECT  `mark` FROM `marks_finalexams` where `studentindex` = '$studentindex' and `subjectid` = '$subjectname' and `class` = '$class' and `subclassname` = '$classid' and `acadmicyear` = '$acadmicyear' ";
    //and `intotal` =  '$inornot'
    $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
    if ($CheckIfHereInF->num_rows == 0)
        return ("**");
    $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);
    return ($CheckIfReturnInF['mark']);
}
function getfirsttermavg($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmarkfirst($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function get2ndtermavg($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmark2nd($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function get3rdtermavg($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmark3rd($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function getfinaltermavg($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getfinalmark($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }
        if ($numberofsubjects == 0)
            $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}

//total here
function getfirstterm($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmarkfirst($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }

        $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function get2ndterm($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmark2nd($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }

        $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function get3rdterm($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded ";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getmark3rd($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }

        $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
function getfinalterm($grade, $subclassname, $student1, $souceofdata = 1)
{
    global $link;
    global $Acadyear;
    $whereadded = " ";
    //if ($souceofdata == 'academic') {
    if ($souceofdata == 'register')

        $whereadded = " and `active` = 1 ";
    else
        $whereadded = " and `acadmicyear` = '$Acadyear' ";
    $SqlCommandForCFe = " SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered`  WHERE  `yearselect` = '$grade' and `subclassname` = '$subclassname' and `studentindex` = '$student1' $whereadded";
    $CheckIfHereInF      = mysqli_query($link, $SqlCommandForCFe);
    $AllowToGetMark = (getsubjectslist($grade, $subclassname));
    $listofcodes = array();
    $listofsubjects = array();
    foreach ($AllowToGetMark as $list) {
        $listofcodes[] = $list['codename'];
        $listofsubjects[] = $list['subjectname'];
    }
    $count = 1;
    while ($CheckIfReturnInF   = mysqli_fetch_array($CheckIfHereInF)) {
        $studentindex = $CheckIfReturnInF['studentindex'];
        $count++;
        $totaldisplayed = 0;
        $numberofsubjects = 0;
        foreach ($listofsubjects as $key => $listin) {
            $first = getfinalmark($studentindex, $listin, $grade, $subclassname, "$Acadyear");
            if ($first != '**') {
                $totaldisplayed += $first;
                $numberofsubjects++;
            }
        }

        $numberofsubjects = 1;
        return (mynumberformat($totaldisplayed / $numberofsubjects, 0));
    }
    return (0);
}
