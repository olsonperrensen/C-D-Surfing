<?php include_once 'includes/header.php'; ?>
<?php if (empty($email)) : ?>
  <?php require_once 'pdo.php' ?>
  <?php
  $errors = array(
    'emptyemail' => '',
    'invalidemail' => '',
    'emptypwd' => '',
    'invalidlogin' => '',
  );
  $btnpressed = false;
  // handles post requests
  if ($_server['request_method'] === 'post') {
    if (empty($_post['email'])) {
      $errors['emptyemail'] = 'email cannot be left empty.';
    } else if (!filter_var($_post['email'], filter_validate_email)) {
      $errors['invalidemail'] = 'email must be of valid format (example@domain.com)';
    }
    if (empty($_post['password'])) {
      $errors['emptypwd'] = 'password cannot be left empty.';
    }

    if (!array_filter($errors)) {
      if (!isset($_cookie["phpsessid"])) {
        session_start();
      }
      $email = $_post['email'];
      $pwd = $_post['password'];
      $sql = "select * from users where email = :em";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':em' => $email));
      $row = $stmt->fetch(pdo::fetch_assoc);
      if (!empty($row)) {
        if (password_verify($pwd, $row['password'])) {
          unset($_session["invalidlogin"]);
          $_session['email'] = $email;
          $_session['isadmin'] = $row['isadmin'];
          $_session['user_id'] = $row['user_id'];
          $_session['buyer_zipcode'] = $row['zipcode'];
          $_session['warning'] = $row['warnings'];
          header('location: account.php');
        } else {
          $_session['invalidlogin'] = $errors['invalidlogin'] = 'you have entered invalid credentials.';
        }
      } else {
        $_session['invalidlogin'] = $errors['invalidlogin'] = 'you must register first.';
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
              <span class="section-heading-upper">come on in</span>
              <span class="section-heading-lower">log in</span>
            </h2>
            <form name="login" id="login" action=<?= $_server['php_self'] ?> method="post">
              <div class="form-floating mb-3">
                <input value="<?= htmlspecialchars($_post['email'] ?? '')  ?>" name="email" id="email" type="email" class="form-control">
                <label for="email">email address</label>
                <?php if ($errors['invalidemail']) : ?>
                  <h5 class="userwarn"><?= $errors['invalidemail'] ?></h5>
                <?php endif; ?>
                <?php if ($errors['emptyemail']) : ?>
                  <h5 class="userwarn"><?= $errors['emptyemail'] ?></h5>
                <?php endif; ?>
              </div>
              <div class="form-floating">
                <input value="<?= htmlspecialchars($_post['password'] ?? '')  ?>" name="password" type="password" id="password" class="form-control">
                <label for="password">password</label>
                <?php if ($errors['emptypwd']) : ?>
                  <h5 class="userwarn"><?= $errors['emptypwd'] ?></h5>
                <?php endif; ?>
                <?php if (isset($_session['invalidlogin'])) : ?>
                  <h5 class="userwarn"><?= $errors['invalidlogin'] ?></h5>
                <?php endif; ?>
                <br>
                <button value="true" name="msubmit" id="msubmit" class="btn btn-secondary btn-sm">log in</button>
              </div>
            </form>
            <br>
            <p class="lead">
              <a href="signup.php" class="text-secondary"><em>sign up instead</em></a>
            </p>
            <p class="mb-0">
              <small><em>issues?</em></small>
              <br />
              <a href="mailto:webmaster@c&d.be">webmaster@c&d.be</a>
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
                <span class="section-heading-upper">stay with us, stay logged</span>
                <span class="section-heading-lower">account benefits</span>
              </h2>
              <ul>
                <li>place an order</li>
                <li>keep track of your previous orders</li>
                <li>see healthcare plans (in detail)</li>
                <li>post advertisements if you found a pet</li>
              </ul>

            </div>
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
  if ($isadmin) {
    echo ("<p class='bg-light text-center'>you are already logged in! <a href='index.php'>go back</a> </p>");
    require_once 'includes/footer.php';
    echo ("</body>
    </html>");
    die();
  }
  header('location: account.php');
}
