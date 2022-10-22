<?php include_once 'includes/header.php'; ?>
<?php
$errors = array(
  'emptyEmail' => ['status' => false, 'message' => ''],
  'invalidEmail' => ['status' => false, 'message' => ''],
  'emptyPwd' => ['status' => false, 'message' => '']
);
$btnPressed = false;
// Handles POST requests
if (isset($_POST['submit'])) {
  if (empty($_POST['email'])) {
    $errors['emptyEmail']['status'] = true;
    $errors['emptyEmail']['message'] = 'Email cannot be left empty.';
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['invalidEmail']['status'] = true;
    $errors['invalidEmail']['message'] = 'Email must be of valid format (example@domain.com)';
  }
  if (empty($_POST['password'])) {
    $errors['emptyPwd']['status'] = true;
    $errors['emptyPwd']['message'] = 'Password cannot be left empty.';
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
          <form action="login.php" method="POST">
            <div class="form-floating mb-3">
              <input value="<?= htmlspecialchars($_POST['email'] ?? '')  ?>" name="email" type="email" class="form-control">
              <label for="floatingInput">Email address</label>
              <?php if ($errors['invalidEmail']['status']) : ?>
                <h5 class="userwarn"><?= $errors['invalidEmail']['message'] ?></h5>
              <?php endif; ?>
              <?php if ($errors['emptyEmail']['status']) : ?>
                <h5 class="userwarn"><?= $errors['emptyEmail']['message'] ?></h5>
              <?php endif; ?>
            </div>
            <div class="form-floating">
              <input value="<?= htmlspecialchars($_POST['password'] ?? '')  ?>" name="password" type="password" class="form-control">
              <label for="floatingPassword">Password</label>
              <?php if ($errors['emptyPwd']['status']) : ?>
                <h5 class="userwarn"><?= $errors['emptyPwd']['message'] ?></h5>
              <?php endif; ?>
              <br>
              <button value="true" name="submit" class="btn btn-secondary btn-sm">Log In</button>
            </div>
          </form>
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
            </ul>

          </div>
        </div>
      </div>
    </div>
</section>
<?php require_once 'includes/footer.php' ?>
</body>

</html>