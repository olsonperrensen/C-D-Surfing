<?php include_once 'includes/header.php'; ?>
<?php if (empty($email)) : ?>
  <?php require_once 'pdo.php' ?>
  <?php
  $errors = array(
    'emptyEmail' => '',
    'invalidEmail' => '',
    'emptyPwd' => '',
    'invalidLogin' => '',
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

    if (!array_filter($errors)) {
      if (!isset($_COOKIE["PHPSESSID"])) {
        session_start();
      }
      $email = $_POST['email'];
      $pwd = $_POST['password'];
      $sql = "SELECT * FROM USERS WHERE email = :em";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':em' => $email));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!empty($row)) {
        if (password_verify($pwd, $row['password'])) {
          unset($_SESSION["invalidLogin"]);
          $_SESSION['email'] = $email;
          $_SESSION['isAdmin'] = $row['isAdmin'];
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['buyer_zipcode'] = $row['zipcode'];

          header('Location: account.php');
        } else {
          $_SESSION['invalidLogin'] = $errors['invalidLogin'] = 'You have entered invalid credentials.';
        }
      } else {
        $_SESSION['invalidLogin'] = $errors['invalidLogin'] = 'You must register first.';
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
              <span class="section-heading-upper">Come On In</span>
              <span class="section-heading-lower">LOG IN</span>
            </h2>
            <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
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
              <div class="form-floating">
                <input value="<?= htmlspecialchars($_POST['password'] ?? '')  ?>" name="password" type="password" class="form-control">
                <label for="floatingPassword">Password</label>
                <?php if ($errors['emptyPwd']) : ?>
                  <h5 class="userwarn"><?= $errors['emptyPwd'] ?></h5>
                <?php endif; ?>
                <?php if (isset($_SESSION['invalidLogin'])) : ?>
                  <h5 class="userwarn"><?= $errors['invalidLogin'] ?></h5>
                <?php endif; ?>
                <br>
                <button value="true" name="submit" class="btn btn-secondary btn-sm">Log In</button>
              </div>
            </form>
            <br>
            <p class="lead">
              <a href="signup.php" class="text-secondary"><em>Sign up instead</em></a>
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
  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Stay with us, Stay Logged</span>
                <span class="section-heading-lower">Account benefits</span>
              </h2>
              <ul>
                <li>Place an order</li>
                <li>Keep track of your previous orders</li>
                <li>Post advertisements if you found a pet</li>
              </ul>

            </div>
          </div>
        </div>
      </div>
  </section>
  <?php require_once 'includes/footer.php' ?>
  </body>

  </html>
<?php endif; ?>
<?php if (!empty($email)) {
  header('Location: account.php');
}
