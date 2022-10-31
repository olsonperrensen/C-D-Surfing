<?php include_once 'includes/header.php'; ?>
<?php require_once 'pdo.php' ?>
<?php
$errors = array(
    'emptyName' => '',
    'shortName' => '',
    'emptyEmail' => '',
    'invalidEmail' => '',
    'emptyPwd' => '',
    'shortPwd' => '',
    'emptyPwdConfirmation' => '',
    'unmatch' => '',
    'invalidLogin' => '',
    'emptyZipcode' => '',
    'invalidZipcode' => '',
    'noNumPwd' => '',
    'noLetterPwd' => '',
    'invalidLookingFor' => '',
    'invalidCanAdvertise' => '',
    'unexpectedError' => ''
);
$btnPressed = false;
// Handles POST requests
if (isset($_POST['submit'])) {
    if (empty($_POST['fullName'])) {
        $errors['emptyName'] = 'Name cannot be left empty.';
    } else if (strlen($_POST['fullName']) < 3) {
        $errors['shortName'] = 'Name cannot be shorter than three characters.';
    }
    if (empty($_POST['email'])) {
        $errors['emptyEmail'] = 'Email cannot be left empty.';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['invalidEmail'] = 'Email must be of valid format (example@domain.com)';
    }
    if (empty($_POST['password'])) {
        $errors['emptyPwd'] = 'Password cannot be left empty.';
    }
    if (strlen($_POST['password']) < 8) {
        $errors['shortPwd'] = 'Password cannot be shorter than eight characters.';
    }
    if (!preg_match("/[0-9]/", $_POST['password'])) {
        $errors['noNumPwd'] = 'Password must contain at least one number.';
    }
    if (!preg_match("/[a-z]/i", $_POST['password'])) {
        $errors['noLetterPwd'] = 'Password must contain at least one letter.';
    }
    if ($_POST['password'] !== $_POST['passwordConfirmation']) {
        $errors['unmatch'] = 'Passwords must match.';
    }
    if (empty($_POST['zipcode'])) {
        $errors['emptyZipcode'] = 'Zipcode cannot be empty.';
    }

    if ((int)$_POST['zipcode'] < 1000 || (int)$_POST['zipcode'] > 10000) {
        $errors['invalidZipcode'] = 'Zipcode must be Belgian.';
    }
    if (empty($_POST['lookingFor'])) {
        $errors['invalidLookingFor'] = 'Please choose.';
    }

    if (!array_filter($errors)) {
        if (!isset($_COOKIE["PHPSESSID"])) {
            session_start();
        }
        $fullName = $_POST['fullName'];
        $zipcode = $_POST['zipcode'];
        $lookingFor = $_POST['lookingFor'];
        $canAdvertise = $_POST['canAdvertise'] ?? '0';
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        try {
            $sql = "INSERT INTO USERS(email,password,naam,zipcode,looking_for,can_advertise)
        VALUES(:em,:pw,:n,:z,:l,:c)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':em' => $email,
                ':pw' => $pwd,
                ':n' => $fullName,
                ':z' => $zipcode,
                ':l' => $lookingFor,
                ':c' => $canAdvertise
            ));
            echo "<script>alert('Sign up successfull!')</script>";
            header('Location: login.php');
        } catch (PDOException $e) {
            var_dump($e);
            $errors['unexpectedError'] = 'An unexpected error occured.';
        }
    }
}
?>
<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner bg-faded text-center rounded">
                    <h2 class="section-heading mb-5">
                        <span class="section-heading-upper">Be part of the group</span>
                        <span class="section-heading-lower">SIGN UP</span>
                    </h2>
                    <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
                        <div class="form-floating mb-3">
                            <input value="<?= htmlspecialchars($_POST['fullName'] ?? '')  ?>" id="fullName" name="fullName" type="text" class="form-control">
                            <label for="floatingInput">Full name</label>
                            <?php if ($errors['emptyName']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyName'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['shortName']) : ?>
                                <h5 class="userwarn"><?= $errors['shortName'] ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= htmlspecialchars($_POST['email'] ?? '')  ?>" name="email" type="email" class="form-control">
                            <label for="floatingInput">Email address</label>
                            <?php if ($errors['invalidEmail']) : ?>
                                <h5 class="userwarn"><?= $errors['invalidEmail'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['emptyEmail']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyEmail'] ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= htmlspecialchars($_POST['zipcode'] ?? '')  ?>" name="zipcode" type="number" class="form-control">
                            <label for="floatingInput">Zipcode</label>
                            <?php if ($errors['invalidZipcode']) : ?>
                                <h5 class="userwarn"><?= $errors['invalidZipcode'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['emptyZipcode']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyZipcode'] ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="lookingFor" id="lookingFor" class="form-select" aria-label="Default select example">
                                <option value="">I am looking for ...</option>
                                <option value="Cat">Cats</option>
                                <option value="Dog">Dogs</option>
                                <option value="Cant">Can't adopt</option>
                            </select>
                            <?php if ($errors['invalidLookingFor']) : ?>
                                <h5 class="userwarn"><?= $errors['invalidLookingFor'] ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= htmlspecialchars($_POST['password'] ?? '')  ?>" name="password" type="password" class="form-control">
                            <label for="floatingPassword">Password</label>
                            <?php if ($errors['emptyPwd']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyPwd'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['shortPwd']) : ?>
                                <h5 class="userwarn"><?= $errors['shortPwd'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['noLetterPwd']) : ?>
                                <h5 class="userwarn"><?= $errors['noLetterPwd'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['noNumPwd']) : ?>
                                <h5 class="userwarn"><?= $errors['noNumPwd'] ?></h5>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['invalidLogin'])) : ?>
                                <h5 class="userwarn"><?= $errors['invalidLogin'] ?></h5>
                            <?php endif; ?>

                        </div>
                        <div class="form-floating">
                            <input value="<?= htmlspecialchars($_POST['passwordConfirmation'] ?? '')  ?>" name="passwordConfirmation" type="password" class="form-control">
                            <label for="floatingPassword">Repeat Password</label>
                            <?php if ($errors['emptyPwdConfirmation']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyPwdConfirmation'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['unmatch']) : ?>
                                <h5 class="userwarn"><?= $errors['unmatch'] ?></h5>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['invalidLogin'])) : ?>
                                <h5 class="userwarn"><?= $errors['invalidLogin'] ?></h5>
                            <?php endif; ?>
                            <br>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="form-check">
                                <input name="canAdvertise" id="canAdvertise" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I want to post my pet for adoption
                                </label>
                                <?php if ($errors['invalidCanAdvertise']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidCanAdvertise'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['unexpectedError']) : ?>
                                    <h5 class="userwarn"><?= $errors['unexpectedError'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <br>
                            <button value="true" name="submit" class="btn btn-secondary btn-sm">Sign Up</button>

                        </div>
                    </form>
                    <br>
                    <p class="lead">
                        <a href="login.php" class="text-secondary"><em>Log in instead</em></a>
                    </p>
                    <p class="mb-0">
                        <small><em>Issues?</em></small>
                        <br />
                        <a href="mailto:webmaster@C&D.be">webmaster@C&D.be</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>