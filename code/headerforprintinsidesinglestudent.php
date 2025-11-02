<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <font class="leftfont" size='3'>
                <?php echo strtoupper($CLIENT_NAME); ?> <br>


                P.O. Box 114 - Khartoum <br>


                Emails:cck.secondary@gmail.com <br>
                <?php spacing(11); ?>:cck.primary@gmail.com
                <br><br>
                <strong>School Year: <?php echo $Acadyear; ?></strong>
            </font>
        </div>
        <div class="col-4 text-center">
            <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <image href="logo.jpg" height="200" width="200" />
            </svg>
            <br><br>

            <h2><strong><?php echo $formnameheaderforprint; ?></strong></h2>
            <br>
        </div>
        <div class="col-4 d-flex justify-content-right  ;">



            <font class="rightfont" size='4'>
                <?php
                $studentindex = $_POST['IndexNo'];

                $SqlCommandForCFe  = "SELECT `Id_Student`, `StudentName`, `Dateofbirth`, `Nationality`, `Religion`, `Address_area`, `phone1`, `phone2`, `Email`, `IndexNo`, `acadmicyear`, `whodidit`, `whenwasit` FROM `student` WHERE `IndexNo` = '$studentindex'";
                $CheckIfHereInF    = mysqli_query($link, $SqlCommandForCFe);
                $CheckIfReturnInF  = mysqli_fetch_array($CheckIfHereInF);

                // echo $SqlCommandForCFe2  = "SELECT `id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit` FROM `studentsregistered` WHERE `studentindex` = '$studentindex' and `active`= '1'";
                // $CheckIfHereInF2    = mysqli_query($link, $SqlCommandForCFe2);
                // $CheckIfReturnInF2  = mysqli_fetch_array($CheckIfHereInF2);
                // $studentclass  = $CheckIfReturnInF2['yearselect'];
                // $studentsubclass = $CheckIfReturnInF2['subclassname'];
                
                if (isset($_POST['yearforsubject']))
                $studentclass  =   $_POST['yearforsubject'];
                if (isset($_GET['syear']))
                $studentclass  =   $_GET['syear'];

                if (isset($_POST['subclassname']))
                $studentsubclass = $_POST['subclassname'];
                if (isset($_GET['csyear']))
                $studentsubclass = $_GET['csyear'];



                $studentname = $CheckIfReturnInF['StudentName'];
                $Address = $CheckIfReturnInF['Address_area'];
                $phone1 = $CheckIfReturnInF['phone1'];
                $phone2 = $CheckIfReturnInF['phone2'];
                echo "<br>";

                echo "<strong>" . $studentname . "</strong>";
                echo "<br>";
                $studentindex = strtoupper($studentindex);
                echo "" . $studentindex;
                echo "<br>";
                echo "" . $phone1;
                if (empty($phone2))
                    echo " ";
                else
                    echo " - $phone2";

                echo "<br>";
                echo "" . $Address;
                echo "<br>";
                echo "" . $studentclass;
                echo " - " . $studentsubclass;
                echo "<br>";


                ?>


                <br>



            </font>

        </div>
    </div>
</header>