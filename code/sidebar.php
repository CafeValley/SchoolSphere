<?php
// Ensure constants are loaded for $SYSTEM_NAME and $CLIENT_NAME
if (!isset($SYSTEM_NAME)) {
  require_once('constants.php');
}
// Fallback if still not defined
if (!isset($SYSTEM_NAME)) {
  $SYSTEM_NAME = "SchoolSphere";
}

function leftsiderbar($whichlist, $iamactive = null)
{
  // Ensure SYSTEM_NAME is available in function scope
  global $SYSTEM_NAME;
  if (!isset($SYSTEM_NAME) || empty($SYSTEM_NAME)) {
    $constants_file = __DIR__ . '/constants.php';
    if (file_exists($constants_file)) {
      require_once($constants_file);
    }
    // Fallback if still not defined
    if (!isset($SYSTEM_NAME) || empty($SYSTEM_NAME)) {
      $SYSTEM_NAME = "SchoolSphere";
    }
  }
  
  $studentcontroladd = ' ';
  if ($iamactive == 11)
    $studentcontroladd = 'active';

  $studentcontrolnote = ' ';
  if ($iamactive == 12)
    $studentcontrolnote = 'active';

  $studentcontroleditdelete = ' ';
  if ($iamactive == 13)
    $studentcontroleditdelete = 'active';
  $registerstudent = ' ';
  if ($iamactive == 14)
    $registerstudent = 'active';
  $subjectadd = ' ';
  if ($iamactive == 15)
    $subjectadd = 'active';
  $subjecteditdelete = ' ';
  if ($iamactive == 16)
    $subjecteditdelete = 'active';
  $academicyear = ' ';
  if ($iamactive == 17)
    $academicyear = 'active';

  $registeredit = ' ';
  if ($iamactive == 21)
    $registeredit = 'active';
  $registerremove = ' ';
  if ($iamactive == 22)
    $registerremove = 'active';
  $registeracadyear = ' ';
  if ($iamactive == 23)
    $registeracadyear = 'active';
  $registeracadfixyear = ' ';
  if ($iamactive == 25)
    $registeracadfixyear = 'active';
  $registercopy = '';
  if ($iamactive == 24)
    $registercopy = 'active';
  $feesset = ' ';
  if ($iamactive == 31)
    $feesset = 'active';
  $studentpayment = ' ';
  if ($iamactive == 32)
    $studentpayment = 'active';
  $receiptnocontrol = ' ';
  if ($iamactive == 33)
    $receiptnocontrol = 'active';

  $marksfirstterm = ' ';
  if ($iamactive == 41)
    $marksfirstterm = 'active';
  $markssecondterm = ' ';
  if ($iamactive == 42)
    $markssecondterm = 'active';
  $marksthirdterm = ' ';
  if ($iamactive == 43)
    $marksthirdterm = 'active';
  $marksfinalterm = ' ';
  if ($iamactive == 44)
    $marksfinalterm = 'active';

  $markssingletotal = ' ';
  if ($iamactive == 45)
    $markssingletotal = 'active';
  $markssingleavg = ' ';
  if ($iamactive == 46)
    $markssingleavg = 'active';

  $markssingletotalpartial = ' ';
  if ($iamactive == 445)
    $markssingletotalpartial = 'active';
  $markssingleavgpartial = ' ';
  if ($iamactive == 446)
    $markssingleavgpartial = 'active';


  $marksallstudentsfirst = ' ';
  if ($iamactive == 47)
    $marksallstudentsfirst = 'active';
  $marksallstudentssecond = ' ';
  if ($iamactive == 48)
    $marksallstudentssecond = 'active';
  $marksallstudentsthird = ' ';
  if ($iamactive == 49)
    $marksallstudentsthird = 'active';
  $marksallstudentsfinal = ' ';
  if ($iamactive == 410)
    $marksallstudentsfinal = 'active';
  $marksallstudentsresultsfinal = ' ';
  if ($iamactive == 411)
    $marksallstudentsresultsfinal = 'active';

  $marksallstudentsfirsttotal = ' ';
  if ($iamactive == 447)
    $marksallstudentsfirsttotal = 'active';
  $marksallstudentssecondtotal = ' ';
  if ($iamactive == 448)
    $marksallstudentssecondtotal = 'active';
  $marksallstudentsthirdtotal = ' ';
  if ($iamactive == 449)
    $marksallstudentsthirdtotal = 'active';
  $marksallstudentsfinaltotal = ' ';
  if ($iamactive == 4410)
    $marksallstudentsfinaltotal = 'active';
  $marksallstudentsresultsfinaltotal = ' ';
  if ($iamactive == 4411)
    $marksallstudentsresultsfinaltotal = 'active';

  $printoutsstudentlist = ' ';
  if ($iamactive == 51)
    $printoutsstudentlist = 'active';
  $printoutsstudentlistbyclass = ' ';
  if ($iamactive == 52)
    $printoutsstudentlistbyclass = 'active';

  //here should be the new code the acd year
  $printoutsdiscount = ' ';
  if ($iamactive == 53)
    $printoutsdiscount = 'active';
  $printoutresult = ' ';
  if ($iamactive == 54)
    $printoutresult = 'active';
  $printoutreceiptno = "";
  if ($iamactive == 55)
    $printoutreceiptno = 'active';
  $printallnotpaided = "";
  if ($iamactive == 56)
    $printallnotpaided = 'active';

  $sprintindexno = ' ';
  if ($iamactive == 61)
    $sprintindexno = 'active';
  $sprintregligion = ' ';
  if ($iamactive == 62)
    $sprintregligion = 'active';
  $sprintnationality = ' ';
  if ($iamactive == 63)
    $sprintnationality = 'active';

  $sprintphone = ' ';
  if ($iamactive == 635)
    $sprintphone = 'active';

  $sprintpaid = ' ';
  if ($iamactive == 64)
    $sprintpaid = 'active';
  $sprintnotpaid = ' ';
  if ($iamactive == 65)
    $sprintnotpaid = 'active';
  $sprintnotpaidrecepit = ' ';
  if ($iamactive == 655)
    $sprintnotpaidrecepit = 'active';

  $sprintnotpaidwhole = ' ';
  if ($iamactive == 65555)
    $sprintnotpaidwhole = 'active';


  $sprintpayments = ' ';
  if ($iamactive == 6555)
    $sprintpayments = 'active';


  $sprintindexnolist = ' ';
  if ($iamactive == 66)
    $sprintindexnolist = 'active';
  $sprintregligionlist = ' ';
  if ($iamactive == 67)
    $sprintregligionlist = 'active';
  $sprintnationalitylist = ' ';
  if ($iamactive == 68)
    $sprintnationalitylist = 'active';
  $sprintphonelist = ' ';
  if ($iamactive == 685)
    $sprintphonelist = 'active';
  $sprintpaidlist = ' ';
  if ($iamactive == 69)
    $sprintpaidlist = 'active';
  $sprintnotpaidlist = ' ';
  if ($iamactive == 610)
    $sprintnotpaidlist = 'active';
  $sprintnotpaidlistrecepit = ' ';
  if ($iamactive == 611)
    $sprintnotpaidlistrecepit = 'active';

  $printindexno = ' ';
  if ($iamactive == 71)
    $printindexno = 'active';
  $printregligion = ' ';
  if ($iamactive == 72)
    $printregligion = 'active';
  $printnationality = ' ';
  if ($iamactive == 73)
    $printnationality = 'active';

  $printphone = ' ';
  if ($iamactive == 735)
    $printphone = 'active';

  $printpaid = ' ';
  if ($iamactive == 74)
    $printpaid = 'active';
  $printnotpaid = ' ';
  if ($iamactive == 75)
    $printnotpaid = 'active';

  $printindexnolist = ' ';
  if ($iamactive == 76)
    $printindexnolist = 'active';

  $printoutsdiscounthist = ' ';
  if ($iamactive == 77)
    $printoutsdiscounthist = 'active';
  $printoutreceiptnohist = "";
  if ($iamactive == 78)
    $printoutreceiptnohist = 'active';

  //if ($whichlist == 1)
  if ($whichlist == 1) {
?>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span>
                    <center><?php echo $SYSTEM_NAME; ?></center>
                  </span>
                  <span class="sr-only"></span>
                </a>
              </li>
              <!-- how to space in my nav bar -->
              <li class="nav-item "><a class="nav-link" href="#"></a></li>

              <span><span data-feather="plus-circle"></span>&nbsp;Student Control</span>

              <li class="nav-item">
                <a class="nav-link <?php echo $studentcontroladd; ?> " href="FormStudent.php">
                  <span data-feather="users"></span>
                  Add New Student
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $studentcontrolnote; ?>" href="FormStudentnote.php">
                  <span data-feather="users"></span>
                  Add New Notes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $studentcontroleditdelete; ?>" href="EditdeleteStudent.php">
                  <span data-feather="users"></span>
                  Edit-Delete Student
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $registerstudent; ?>" href="FormRegister.php">
                  <span data-feather="user-check"></span>
                  Assign Student to Class
                </a>
              </li>

              <span><span data-feather="plus-circle"></span>&nbsp;Subject Control</span>

              <li class="nav-item">
                <a class="nav-link <?php echo $subjectadd; ?>" href="FormSubject.php">
                  <span data-feather="book"></span>
                  Adding Subject
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $subjecteditdelete; ?>" href="EditdeleteSubject.php">
                  <span data-feather="book"></span>
                  Edit-Delete Subject
                </a>
              </li>
              <span><span data-feather="plus-circle"></span>&nbsp;Others</span>
              <li class="nav-item">
                <a class="nav-link <?php echo $academicyear; ?>" href="controlacademicyear.php">
                  <span data-feather="book"></span>
                  Academic Year
                </a>
              </li>
          </div>
        </nav>
      </div>
    <?php }
  if ($whichlist == 6) {
    ?>
      <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="#">
                    <span>
                      <center><?php echo $SYSTEM_NAME; ?></center>
                    </span>
                    <span class="sr-only"></span>
                  </a>
                </li>
                <!-- how to space in my nav bar -->
                <li class="nav-item"><a class="nav-link" href="#"></a></li>

                <span><span data-feather="plus-circle"></span>&nbsp;Register Control</span>
                <li class="nav-item">
                  <a class="nav-link <?php echo $registeredit; ?>" href="EditdeleteRegistersubclass.php">
                    <span data-feather="users"></span>
                    Edit Register Class-Stream
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $registerremove; ?>" href="EditdeleteRegister.php">
                    <span data-feather="users"></span>
                    Remove Register
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?php echo $registercopy; ?>" href="CopydeleteRegister.php">
                    <span data-feather="users"></span>
                    Change Registartion
                  </a>
                </li>
                <span><span data-feather="plus-circle"></span>&nbsp;Academic Year Control</span>
                <li class="nav-item">
                  <a class="nav-link <?php echo $registeracadfixyear; ?>" href="Registerfix.php">
                    <span data-feather="users"></span>
                    Active Register Control
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo $registeracadyear; ?>" href="closeregisteryear.php">
                    <span data-feather="users"></span>
                    End Year
                  </a>
                </li>
            </div>
          </nav>
        </div>
      <?php }
    if ($whichlist == 2) {
      ?>
        <div class="container-fluid">
          <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
              <div class="sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">
                      <span>
                        <center><?php echo $SYSTEM_NAME; ?></center>
                      </span>
                      <span class="sr-only"></span>
                    </a>
                  </li>
                  <!-- how to space in my nav bar -->
                  <li class="nav-item"><a class="nav-link" href="#"></a></li>

                  <span> <span data-feather="plus-circle"></span>&nbsp;Fees</span>

                  <li class="nav-item">
                    <a class="nav-link <?php echo $feesset; ?>" href="FormFeesSet.php">
                      <span data-feather="dollar-sign"></span>
                      Fees Set
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php echo $studentpayment; ?>" href="FormFeespayment.php">
                      <span data-feather="dollar-sign"></span>
                      Student Payment
                    </a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="#"></a></li>

                  <span> <span data-feather="plus-circle"></span>&nbsp;Control</span>


                  <li class="nav-item">
                    <a class="nav-link <?php echo $receiptnocontrol; ?>" href="Editdeletereceiptno.php">
                      <span data-feather="dollar-sign"></span>
                      Remove Payment
                    </a>
                  </li>
              </div>
            </nav>
          </div>
        <?php }

      if ($whichlist == 3) {
        ?>
          <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <span>
                          <center><?php echo $SYSTEM_NAME; ?></center>
                        </span>
                        <span class="sr-only"></span>
                      </a>
                    </li>
                    <!-- how to space in my nav bar -->
                    <li class="nav-item"><a class="nav-link" href="#"></a></li>
                    <ul class="nav flex-column mb-2">
                      <span><span data-feather="plus-circle"></span>&nbsp;Results Related</span>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksfirstterm; ?>" href="FormFirstTerm.php">
                          <span data-feather="sun"></span>
                          First Term Marks
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $markssecondterm; ?>" href="FormsecondTerm.php">
                          <span data-feather="sunrise"></span>
                          Second Term Marks
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksthirdterm; ?>" href="FormthirdTerm.php">
                          <span data-feather="sunset"></span>
                          Third Term Marks
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksfinalterm; ?>" href="FormFinalExams.php">
                          <span data-feather="sunset"></span>
                          Final Exams Marks
                        </a>
                      </li>
                    </ul>

                    <span><span data-feather="plus-circle"></span>&nbsp;Partial School Reports</span>
                    <ul class="nav flex-column mb-2">
                      <li class="nav-item">
                        <a class="nav-link <?php echo $markssingletotalpartial; ?>" href="termsheetstudentpartial.php">
                          <span data-feather="sun"></span>
                          Student's Transcripts - Partial(Total)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $markssingleavgpartial; ?>" href="termsheetstudent_avgpartial.php">
                          <span data-feather="sun"></span>
                          Student Transcripts - Partial(Avarage)
                        </a>
                      </li>
                    </ul>

                    <span><span data-feather="plus-circle"></span>&nbsp;Final School Reports</span>
                    <ul class="nav flex-column mb-2">
                      <li class="nav-item">
                        <a class="nav-link <?php echo $markssingletotal; ?>" href="termsheetstudent.php">
                          <span data-feather="sun"></span>
                          Student's Transcripts (Total)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $markssingleavg; ?>" href="termsheetstudent_avg.php">
                          <span data-feather="sun"></span>
                          Student Transcripts (Avarage)
                        </a>
                      </li>
                    </ul>
                    <span><span data-feather="plus-circle"></span>&nbsp;Results Reports All students(Avarage)</span>
                    <ul class="nav flex-column mb-2">
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsfirst; ?>" href="termsheetstudents.php">
                          <span data-feather="sun"></span>
                          All Students (First Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentssecond; ?>" href="termsheetstudents2.php">
                          <span data-feather="sun"></span>
                          All Students (Second Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsthird; ?>" href="termsheetstudents3.php">
                          <span data-feather="sun"></span>
                          All Students (Third Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsfinal; ?>" href="termsheetstudentsF.php">
                          <span data-feather="sun"></span>
                          All Students (Final Exam)
                        </a>
                      </li>

                    </ul>
                    <span><span data-feather="plus-circle"></span>&nbsp;Final Reports(Avarage)</span>
                    <ul class="nav flex-column mb-2">

                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsresultsfinal; ?>" href="termsheetstudentszresutls.php">
                          <span data-feather="sun"></span>
                          All Students (Final Results)
                        </a>
                      </li>

                    </ul>
                    <span><span data-feather="plus-circle"></span>&nbsp;Results Reports All students(Total)</span>
                    <ul class="nav flex-column mb-2">
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsfirsttotal; ?>" href="termsheetstudentstotal.php">
                          <span data-feather="sun"></span>
                          All Students (First Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentssecondtotal; ?>" href="termsheetstudents2total.php">
                          <span data-feather="sun"></span>
                          All Students (Second Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsthirdtotal; ?>" href="termsheetstudents3total.php">
                          <span data-feather="sun"></span>
                          All Students (Third Term)
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsfinaltotal; ?>" href="termsheetstudentsFtotal.php">
                          <span data-feather="sun"></span>
                          All Students (Final Exam)
                        </a>
                      </li>

                    </ul>
                    <span><span data-feather="plus-circle"></span>&nbsp;Final Reports(Total)</span>
                    <ul class="nav flex-column mb-2">



                      <li class="nav-item">
                        <a class="nav-link <?php echo $marksallstudentsresultsfinaltotal; ?>" href="termsheetstudentszresutlstotal.php">
                          <span data-feather="sun"></span>
                          All Students (Final Results)
                        </a>
                      </li>

                    </ul>
                </div>
              </nav>
            </div>
          <?php }

        if ($whichlist == 4) {
          ?>
            <div class="container-fluid">
              <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          <span>
                            <center><?php echo $SYSTEM_NAME; ?></center>
                          </span>
                          <span class="sr-only"></span>
                        </a>
                      </li>
                      <!-- how to space in my nav bar -->
                      <li class="nav-item"><a class="nav-link" href="#"></a></li>

                      <span><span data-feather="plus-circle"></span>&nbsp;Report Cards</span>


                      <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                          <a class="nav-link <?php echo $printoutsstudentlist; ?>" href="ReportAllStudents.php">
                            <span data-feather="file-text"></span>
                            Students List
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?php echo $printoutsstudentlistbyclass; ?>" href="ReportAllStudentsbyclass.php">
                            <span data-feather="file-text"></span>
                            Students List by Class
                          </a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link <?php echo $printoutsdiscount; ?>" href="Reportdiscountacyear.php">
                            <span data-feather="file-text"></span>
                            Discount
                          </a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link <?php echo $printoutreceiptno; ?>" href="Reportreceiptnoacyear.php">
                            <span data-feather="file-text"></span>
                            Receipt No
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?php echo $printallnotpaided; ?>" href="menuclassnotpaidstatic.php">
                            <span data-feather="file-text"></span>
                            Balance Notice
                          </a>
                        </li>

                      </ul>

                  </div>
                </nav>
              </div>
            <?php }
          if ($whichlist == 5) {
            ?>
              <div class="container-fluid">
                <div class="row">
                  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" href="#">
                            <span>
                              <center><?php echo $SYSTEM_NAME; ?></center>
                            </span>
                            <span class="sr-only"></span>
                          </a>
                        </li>
                        <!-- how to space in my nav bar -->
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>

                        <span><span data-feather="plus-circle"></span>&nbsp;Specific Student All</span>


                        <ul class="nav flex-column mb-2">
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintindexno; ?>" href="SpReportAllStudents_index.php">
                              <span data-feather="file-text"></span>
                              by Index No
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintregligion; ?>" href="SpReportAllStudents_religion.php">
                              <span data-feather="file-text"></span>
                              by Religion
                            </a>
                          </li>



                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnationality; ?>" href="SpReportAllStudents_nationality.php">
                              <span data-feather="file-text">
                              </span> by Nationality
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintphone; ?>" href="SpReportAllStudents_phone.php">
                              <span data-feather="file-text">
                              </span> by Telephone Number
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintpaid; ?>" href="SpReportAllStudents_paid.php">
                              <span data-feather="file-text">
                              </span>by Paid
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnotpaid; ?>" href="SpReportAllStudents_didntpaid.php">
                              <span data-feather="file-text">
                              </span>by Not Paid
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnotpaidrecepit; ?>" href="SpReportAllStudents_didntpaid_Receipt.php">
                              <span data-feather="file-text">
                              </span>by Not Paid (Receipt)
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnotpaidwhole; ?>" href="SpReportAllStudents_didntpaid_whole_system.php">
                              <span data-feather="file-text">
                              </span>by Not Paid (whole)
                            </a>
                          </li>
                        </ul>
                        <span><span data-feather="plus-circle"></span>&nbsp;Specific Student by Class</span>

                        <ul class="nav flex-column mb-2">
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintindexnolist; ?>" href="SpReportAllStudentsbyclass_index.php">
                              <span data-feather="file-text"></span>
                              by Index No
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintregligionlist; ?>" href="SpReportAllStudentsbyclass_religion.php">
                              <span data-feather="file-text"></span>
                              by Religion
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnationalitylist; ?>" href="SpReportAllStudentsbyclass_nationality.php">
                              <span data-feather="file-text"></span>
                              by Nationality
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintphonelist; ?>" href="SpReportAllStudentsbyclass_phone.php">
                              <span data-feather="file-text"></span>
                              by Telephone Number
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintpaidlist; ?>" href="SpReportAllStudentsbyclass_paid.php">
                              <span data-feather="file-text"></span>
                              by Paid
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnotpaidlist; ?>" href="SpReportAllStudentsbyclass_didntpay.php">
                              <span data-feather="file-text"></span>
                              by Not Paid
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintnotpaidlistrecepit; ?>" href="SpReportAllStudentsbyclass_didntpay_Receipt.php">
                              <span data-feather="file-text"></span>
                              by Not Paid (Receipt)
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link <?php echo $sprintpayments; ?>" href="SpReportAllStudentsbyclass_payments.php">
                              <span data-feather="file-text">
                              </span>Payments
                            </a>
                          </li>
                        </ul>
                    </div>
                  </nav>
                </div>
              <?php }
            if ($whichlist == 7) {
              ?>
                <div class="container-fluid">
                  <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                      <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">
                              <span>
                                <center><?php echo $SYSTEM_NAME; ?></center>
                              </span>
                              <span class="sr-only"></span>
                            </a>
                          </li>
                          <!-- how to space in my nav bar -->
                          <li class="nav-item"><a class="nav-link" href="#"></a></li>

                          <span><span data-feather="plus-circle"></span>&nbsp;Specific Student All</span>


                          <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                              <a class="nav-link <?php echo $printindexno; ?>" href="SReportAllStudents_index.php">
                                <span data-feather="file-text"></span>
                                by Index No
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link <?php echo $printregligion; ?>" href="SReportAllStudents_religion.php">
                                <span data-feather="file-text"></span>
                                by Religion
                              </a>
                            </li>



                            <li class="nav-item">
                              <a class="nav-link <?php echo $printnationality; ?>" href="SReportAllStudents_nationality.php">
                                <span data-feather="file-text">
                                </span> by Nationality
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link <?php echo $printphone; ?>" href="SReportAllStudents_phone.php">
                                <span data-feather="file-text">
                                </span> by Telephone Number
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link <?php echo $printoutsdiscounthist; ?>" href="Reportdiscount.php">
                                <span data-feather="file-text"></span>
                                Discount
                              </a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link <?php echo $printoutreceiptnohist; ?>" href="Reportreceiptno.php">
                                <span data-feather="file-text"></span>
                                Receipt No
                              </a>
                            </li>
                          </ul>


                      </div>
                    </nav>
                  </div>
                <?php }
            }

            function upsiderbar($iamactive = null)
            {
              // Ensure SYSTEM_NAME is available in function scope
              global $SYSTEM_NAME;
              if (!isset($SYSTEM_NAME) || empty($SYSTEM_NAME)) {
                $constants_file = __DIR__ . '/constants.php';
                if (file_exists($constants_file)) {
                  require_once($constants_file);
                }
                // Fallback if still not defined
                if (!isset($SYSTEM_NAME) || empty($SYSTEM_NAME)) {
                  $SYSTEM_NAME = "SchoolSphere";
                }
              }
              
              $var1 = " ";
              $var2 = " ";
              $var3 = " ";
              $var4 = " ";
              $var5 = " ";
              $var6 = " ";
              $var7 = " ";
              if ($iamactive == 1)
                $var1 = " active";
              if ($iamactive == 2)
                $var2 = " active";
              if ($iamactive == 3)
                $var3 = " active";
              if ($iamactive == 4)
                $var4 = " active";
              if ($iamactive == 5)
                $var5 = " active";
              if ($iamactive == 6)
                $var6 = " active";
              if ($iamactive == 7)
                $var7 = " active";
                ?>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top bg-dark flex-md-nowrap p-0">
                  <a class="navbar-brand" href="welcomepage.php"><?php echo $SYSTEM_NAME; ?></a>
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo $var1; ?>"><a class="nav-link" href="FormStudent.php">Basics</a></li>
                    <li class="nav-item <?php echo $var2; ?>"><a class="nav-link" href="EditdeleteRegistersubclass.php">Register Control</a></li>
                    <li class="nav-item <?php echo $var3; ?>"><a class="nav-link" href="FormFeesSet.php">Fees</a></li>
                    <li class="nav-item <?php echo $var4; ?>"><a class="nav-link" href="FormFirstTerm.php">Marks</a></li>
                    <li class="nav-item <?php echo $var5; ?>"><a class="nav-link" href="ReportAllStudents.php">Print-Out</a></li>
                    <li class="nav-item <?php echo $var6; ?>"><a class="nav-link" href="SpReportAllStudents_index.php">Specific Print-Out</a></li>
                    <li class="nav-item <?php echo $var7; ?>"><a class="nav-link" href="SReportAllStudents_index.php">
                        Print-Out - Hist</a></li>
                  </ul>
                  <ul class="navbar-nav justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
                  </ul>
                </nav>
              <?php }

            function footer()
            {

              ?>
                <script>
                  function sortTable(n) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("myTable");
                    switching = true;
                    //Set the sorting direction to ascending:
                    dir = "asc";
                    /*Make a loop that will continue until
                    no switching has been done:*/
                    while (switching) {
                      //start by saying: no switching is done:
                      switching = false;
                      rows = table.rows;
                      /*Loop through all table rows (except the
                      first, which contains table headers):*/
                      for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /*check if the two rows should switch place,
                        based on the direction, asc or desc:*/
                        if (dir == "asc") {

                          //if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {

                          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                          }
                        } else if (dir == "desc") {
                          //if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {

                          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                          }
                        }
                      }
                      if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount++;
                      } else {
                        /*If no switching has been done AND the direction is "asc",
                        set the direction to "desc" and run the while loop again.*/
                        if (switchcount == 0 && dir == "asc") {
                          dir = "desc";
                          switching = true;
                        }
                      }
                    }
                  }

                  function sortTableNumber(n) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("myTable");
                    switching = true;
                    //Set the sorting direction to ascending:
                    dir = "asc";
                    /*Make a loop that will continue until
                    no switching has been done:*/
                    while (switching) {
                      //start by saying: no switching is done:
                      switching = false;
                      rows = table.rows;
                      /*Loop through all table rows (except the
                      first, which contains table headers):*/
                      for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /*check if the two rows should switch place,
                        based on the direction, asc or desc:*/
                        if (dir == "asc") {
                          //here to check the **
                          //here to check the ?
                          if (x.innerHTML == '**')
                            x.innerHTML = 0;
                          if (y.innerHTML == '**')
                            y.innerHTML = 0;

                          if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {

                            //if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                          }
                        } else if (dir == "desc") {

                          if (x.innerHTML == '**')
                            x.innerHTML = 0;
                          if (y.innerHTML == '**')
                            y.innerHTML = 0;

                          if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {

                            //if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                          }
                        }
                      }
                      if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount++;
                      } else {
                        /*If no switching has been done AND the direction is "asc",
                        set the direction to "desc" and run the while loop again.*/
                        if (switchcount == 0 && dir == "asc") {
                          dir = "desc";
                          switching = true;
                        }
                      }
                    }
                  }
                </script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script>
                  window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')
                </script>
                <script src="js/vendor/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery-3.5.1.min.js"></script>

                <!-- Icons -->
                <script src="js/feather.min.js"></script>
                <script>
                  feather.replace()
                </script>
                <script>
                  $(document).ready(function() {
                    $('#dtBasicExample').DataTable();
                    $('.dataTables_length').addClass('bs-select');
                  });
                </script>
                <!-- Graphs -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

                </body>

                </html>

              <?php } ?>