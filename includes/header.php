<?php include_once __DIR__ . '/../log.php'; ?>
<?php include_once __DIR__ . '/../pdo.php'; ?>
<?php include_once __DIR__ . '/../models/Basket.php'; ?>
<?php
$isAdmin = false;
define('REGIONAL_FEE', 0.62);
$errors = array(
  'taken' => '',
);
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $isAdmin = $_SESSION['isAdmin'];
  $warnings = $_SESSION['warning'];
  if (!empty($_GET['adopted_pet']) && is_numeric($_GET['adopted_pet'])) {
    try {
      $adopting_pet = $_GET['adopted_pet'];
      // BUYER ZIP
      // Calculate regional fee (if any)
      // Buyer's ZIP
      $bsql = 'select zipcode, user_id
    from users
    where user_id = (select user_id
                     from users
                     where email = :bem);';
      $bstmt = $pdo->prepare($bsql);
      $bstmt->execute(array(':bem' => $email));
      $brow = $bstmt->fetch(PDO::FETCH_ASSOC);
      $user_id = $brow['user_id'];
      $buyer_zipcode = $brow['zipcode'];
      // SELLER ZIP
      // Seller's ZIP
      $ssql = 'select zipcode
      from users
      join pet_details
      on owner_id = user_id
      where pet_id = :pid;';
      $sstmt = $pdo->prepare($ssql);
      $sstmt->execute(array(':pid' => $adopting_pet));
      $srow = $sstmt->fetch(PDO::FETCH_ASSOC);
      $seller_zipcode = $srow['zipcode'];
      $is_regional = true;
      if ($seller_zipcode != $buyer_zipcode) {
        $is_regional = false;
      }
      $sql = "insert into shopping_cart(pet_id,userid,is_regional)
      values(:p,(select user_id from users where email = :em),:re);";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':p' => $adopting_pet, ':em' => $email, ':re' => $is_regional));
    } catch (PDOException $e) {
      if ((int)$e->getCode() === 23000) {
        $errors['taken'] = $adopting_pet;
      } else {
        $errors['unexpectedError'] = 'An unexpected error occured.';
      }
    }
  }
  $sql = "select count(*)
  from shopping_cart
  where userid = (select user_id from users where email = :em)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':em' => $email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $count = $row['count(*)'];
  $basketCounter =  $count;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>C&D Surfing</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <script defer src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
  <script defer src="./js/validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/login.css" rel="stylesheet" />
  <link href="css/breeds.css" rel="stylesheet" />
  <link href="css/checkout.css" rel="stylesheet" />
  <link href="css/header.css" rel="stylesheet" />
  <link href="css/admin.css" rel="stylesheet" />
</head>

<body>
  <header>
    <a class="text-decoration-none" href=<?= $_SERVER['PHP_SELF']; ?>>
      <h1 class="site-heading text-center text-faded d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">Find your new best friend</span>
        <span class="site-heading-lower">C&D Surfing</span>
      </h1>
    </a>
  </header>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">C&D Surfing (Mobile)</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase" href="index.php">Home</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase" href="about.php">About</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase" href="breeds.php">Breeds</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase" href="healthcare.php">Plans</a>
          </li>
          <?php if (!empty($email)) : ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase" href="ads.php">Ads</a>
            </li>
          <?php endif; ?>
        </ul>
        <ul class="float-end navbar-nav">
          <li class="float-end nav-item px-lg-4">
            <?php if (!empty($email)) : ?>
              <a class="btn btn-close-white text-decoration-none" href="order.php">🛒<samp class="text-decoration-none" id="basketCounter"><?= $basketCounter ?? 0 ?></samp></a>
            <?php endif; ?>
            <?php if (empty($email)) : ?>
              <a class="btn btn-success text-decoration-none text-white" href="login.php">Login</a>
            <?php endif; ?>
            <?php if (!empty($email)) : ?>
              <a class="text-decoration-none btn btn-outline-warning" href="account.php">Account</a>
              <a class="text-decoration-none text-white btn btn-outline-light" href="logout.php">Logout</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php if (
    $isAdmin && !strpos($_SERVER['REQUEST_URI'], "admin.php")
    && !strpos($_SERVER['REQUEST_URI'], "process_order.php")
  ) : ?>
    <nav class="navbar navbar-expand-lg" id="ADMIN">
      <div class="container">
        <div class="collapse navbar-collapse" id="admin2">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-white" href="admin.php">
                <strong>Admin Panel</strong>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>
  <?php if ($isAdmin && strpos($_SERVER['REQUEST_URI'], "manage_users.php")) : ?>
    <nav class="navbar navbar-expand-lg" id="ADDUSER">
      <div class="container">
        <div class="collapse navbar-collapse" id="adduser3">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a data-bs-toggle="modal" data-bs-target="#addUser" class="nav-link text-uppercase text-white" href="#">
                <strong>Add User</strong>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>
  <?php if ($isAdmin && strpos($_SERVER['REQUEST_URI'], "manage_breeds.php")) : ?>
    <nav class="navbar navbar-expand-lg" id="ADDBREED">
      <div class="container">
        <div class="collapse navbar-collapse" id="addbreed4">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a data-bs-toggle="modal" data-bs-target="#addBreed" class="nav-link text-uppercase text-white" href="#">
                <strong>Add Breed</strong>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>
  <?php if ($isAdmin && strpos($_SERVER['REQUEST_URI'], "manage_ads.php")) : ?>
    <nav class="navbar navbar-expand-lg" id="ADDAD">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a data-bs-toggle="modal" data-bs-target="#addAd" class="nav-link text-uppercase text-white" href="#">
                <strong>Add Ad</strong>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>