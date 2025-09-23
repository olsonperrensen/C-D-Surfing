<?PHP INCLUDE_ONCE 'INCLUDES/HEADER.PHP'; ?>
<?PHP IF (EMPTY($EMAIL)) : ?>
  <?PHP REQUIRE_ONCE 'PDO.PHP' ?>
  <?PHP
  $ERRORS = ARRAY(
    'EMPTYEMAIL' => '',
    'INVALIDEMAIL' => '',
    'EMPTYPWD' => '',
    'INVALIDLOGIN' => '',
  );
  $BTNPRESSED = FALSE;
  // HANDLES POST REQUESTS
  IF ($_SERVER['REQUEST_METHOD'] === 'POST') {
    IF (EMPTY($_POST['EMAIL'])) {
      $ERRORS['EMPTYEMAIL'] = 'EMAIL CANNOT BE LEFT EMPTY.';
    } ELSE IF (!FILTER_VAR($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
      $ERRORS['INVALIDEMAIL'] = 'EMAIL MUST BE OF VALID FORMAT (EXAMPLE@DOMAIN.COM)';
    }
    IF (EMPTY($_POST['PASSWORD'])) {
      $ERRORS['EMPTYPWD'] = 'PASSWORD CANNOT BE LEFT EMPTY.';
    }

    IF (!ARRAY_FILTER($ERRORS)) {
      IF (!ISSET($_COOKIE["PHPSESSID"])) {
        SESSION_START();
      }
      $EMAIL = $_POST['EMAIL'];
      $PWD = $_POST['PASSWORD'];
      $SQL = "SELECT * FROM USERS WHERE EMAIL = :EM";
      $STMT = $PDO->PREPARE($SQL);
      $STMT->EXECUTE(ARRAY(':EM' => $EMAIL));
      $ROW = $STMT->FETCH(PDO::FETCH_ASSOC);
      IF (!EMPTY($ROW)) {
        IF (PASSWORD_VERIFY($PWD, $ROW['PASSWORD'])) {
          UNSET($_SESSION["INVALIDLOGIN"]);
          $_SESSION['EMAIL'] = $EMAIL;
          $_SESSION['ISADMIN'] = $ROW['ISADMIN'];
          $_SESSION['USER_ID'] = $ROW['USER_ID'];
          $_SESSION['BUYER_ZIPCODE'] = $ROW['ZIPCODE'];
          $_SESSION['WARNING'] = $ROW['WARNINGS'];
          HEADER('LOCATION: ACCOUNT.PHP');
        } ELSE {
          $_SESSION['INVALIDLOGIN'] = $ERRORS['INVALIDLOGIN'] = 'YOU HAVE ENTERED INVALID CREDENTIALS.';
        }
      } ELSE {
        $_SESSION['INVALIDLOGIN'] = $ERRORS['INVALIDLOGIN'] = 'YOU MUST REGISTER FIRST.';
      }
    }
  }
  ?>
  <SECTION CLASS="PAGE-SECTION CTA">
    <DIV CLASS="CONTAINER">
      <DIV CLASS="ROW">
        <DIV CLASS="COL-XL-9 MX-AUTO">
          <DIV CLASS="CTA-INNER BG-FADED TEXT-CENTER ROUNDED">
            <H2 CLASS="SECTION-HEADING MB-5">
              <SPAN CLASS="SECTION-HEADING-UPPER">COME ON IN</SPAN>
              <SPAN CLASS="SECTION-HEADING-LOWER">LOG IN</SPAN>
            </H2>
            <FORM NAME="LOGIN" ID="LOGIN" ACTION=<?= $_SERVER['PHP_SELF'] ?> METHOD="POST">
              <DIV CLASS="FORM-FLOATING MB-3">
                <INPUT VALUE="<?= HTMLSPECIALCHARS($_POST['EMAIL'] ?? '')  ?>" NAME="EMAIL" ID="EMAIL" TYPE="EMAIL" CLASS="FORM-CONTROL">
                <LABEL FOR="EMAIL">EMAIL ADDRESS</LABEL>
                <?PHP IF ($ERRORS['INVALIDEMAIL']) : ?>
                  <H5 CLASS="USERWARN"><?= $ERRORS['INVALIDEMAIL'] ?></H5>
                <?PHP ENDIF; ?>
                <?PHP IF ($ERRORS['EMPTYEMAIL']) : ?>
                  <H5 CLASS="USERWARN"><?= $ERRORS['EMPTYEMAIL'] ?></H5>
                <?PHP ENDIF; ?>
              </DIV>
              <DIV CLASS="FORM-FLOATING">
                <INPUT VALUE="<?= HTMLSPECIALCHARS($_POST['PASSWORD'] ?? '')  ?>" NAME="PASSWORD" TYPE="PASSWORD" ID="PASSWORD" CLASS="FORM-CONTROL">
                <LABEL FOR="PASSWORD">PASSWORD</LABEL>
                <?PHP IF ($ERRORS['EMPTYPWD']) : ?>
                  <H5 CLASS="USERWARN"><?= $ERRORS['EMPTYPWD'] ?></H5>
                <?PHP ENDIF; ?>
                <?PHP IF (ISSET($_SESSION['INVALIDLOGIN'])) : ?>
                  <H5 CLASS="USERWARN"><?= $ERRORS['INVALIDLOGIN'] ?></H5>
                <?PHP ENDIF; ?>
                <BR>
                <BUTTON VALUE="TRUE" NAME="MSUBMIT" ID="MSUBMIT" CLASS="BTN BTN-SECONDARY BTN-SM">LOG IN</BUTTON>
              </DIV>
            </FORM>
            <BR>
            <P CLASS="LEAD">
              <A HREF="SIGNUP.PHP" CLASS="TEXT-SECONDARY"><EM>SIGN UP INSTEAD</EM></A>
            </P>
            <P CLASS="MB-0">
              <SMALL><EM>ISSUES?</EM></SMALL>
              <BR />
              <A HREF="MAILTO:WEBMASTER@C&D.BE">WEBMASTER@C&D.BE</A>
            </P>
          </DIV>
        </DIV>
      </DIV>
    </DIV>
  </SECTION>
  <SECTION CLASS="PAGE-SECTION ABOUT-HEADING">
    <DIV CLASS="CONTAINER">
      <IMG CLASS="IMG-FLUID ROUNDED ABOUT-HEADING-IMG MB-3 MB-LG-0" SRC="ASSETS/IMG/ABOUT.JPG" ALT="..." />
      <DIV CLASS="ABOUT-HEADING-CONTENT">
        <DIV CLASS="ROW">
          <DIV CLASS="COL-XL-9 COL-LG-10 MX-AUTO">
            <DIV CLASS="BG-FADED ROUNDED P-5">
              <H2 CLASS="SECTION-HEADING MB-4">
                <SPAN CLASS="SECTION-HEADING-UPPER">STAY WITH US, STAY LOGGED</SPAN>
                <SPAN CLASS="SECTION-HEADING-LOWER">ACCOUNT BENEFITS</SPAN>
              </H2>
              <UL>
                <LI>PLACE AN ORDER</LI>
                <LI>KEEP TRACK OF YOUR PREVIOUS ORDERS</LI>
                <LI>SEE HEALTHCARE PLANS (IN DETAIL)</LI>
                <LI>POST ADVERTISEMENTS IF YOU FOUND A PET</LI>
              </UL>

            </DIV>
          </DIV>
        </DIV>
      </DIV>
    </DIV>
  </SECTION>
  <?PHP REQUIRE_ONCE 'INCLUDES/FOOTER.PHP' ?>
  </BODY>

  </HTML>
<?PHP ENDIF; ?>
<?PHP IF (!EMPTY($EMAIL)) {
  IF ($ISADMIN) {
    ECHO ("<P CLASS='BG-LIGHT TEXT-CENTER'>YOU ARE ALREADY LOGGED IN! <A HREF='INDEX.PHP'>GO BACK</A> </P>");
    REQUIRE_ONCE 'INCLUDES/FOOTER.PHP';
    ECHO ("</BODY>
    </HTML>");
    DIE();
  }
  HEADER('LOCATION: ACCOUNT.PHP');
}
