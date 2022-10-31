<?php include_once 'includes/header.php'; ?>
<?php require_once 'pdo.php' ?>
<?php
$errors = array(
    'emptyName' => '',
    'invalidName' => '',
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
);
$btnPressed = false;
// Handles POST requests
if (isset($_POST['submit'])) {
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
    if (preg_match("/[0-9]/", $_POST['password']) < 8) {
        $errors['noNumPwd'] = 'Password must contain at least one number.';
    }
    if (preg_match("/[a-z]/i", $_POST['password']) < 8) {
        $errors['noLetterPwd'] = 'Password must contain at least one letter.';
    }
    if ($_POST['password'] !== $_POST['passwordConfirmation']) {
        $errors['unmatch'] = 'Passwords must match.';
    }

    if (!array_filter($errors)) {
        if (!isset($_COOKIE["PHPSESSID"])) {
            session_start();
        }
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        // $sql = "";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute(array(':em' => $email, ':pwd' => $pwd));
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($row)) {
            unset($_SESSION["invalidLogin"]);
            $_SESSION['email'] = $email;
            header('Location: account.php');
        } else {
            $_SESSION['invalidLogin'] = $errors['invalidLogin'] = 'You have used invalid credentials.';
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
                            <input value="<?= htmlspecialchars($_POST['name'] ?? '')  ?>" name="name" type="text" class="form-control">
                            <label for="floatingInput">Full name</label>
                            <?php if ($errors['invalidName']) : ?>
                                <h5 class="userwarn"><?= $errors['invalidName'] ?></h5>
                            <?php endif; ?>
                            <?php if ($errors['emptyName']) : ?>
                                <h5 class="userwarn"><?= $errors['emptyName'] ?></h5>
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
                                <option selected>I am looking for ...</option>
                                <option value="1">Cats</option>
                                <option value="2">Dogs</option>
                                <option value="3">Can't adopt</option>
                            </select>
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
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I want to post my pet for adoption
                                </label>
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