<?php include_once 'pdo.php'; ?>
<?php include_once './models/Basket.php'; ?>
<?php
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
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
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/login.css" rel="stylesheet" />
  <link href="css/breeds.css" rel="stylesheet" />
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
        <?php if (!empty($email)) : ?>
          <button><a class="text-decoration-none" href="order.php">🛒<samp class="text-decoration-none" id="basketCounter"><?= $basketCounter ?? 0 ?></samp></a></button>
        <?php endif; ?>
        <li class="float-end nav-item px-lg-4">
          <?php if (empty($email)) : ?>
            <button class="btn btn-success"><a class="text-decoration-none text-white" href="login.php">Login</a></button>
          <?php endif; ?>
          <?php if (!empty($email)) : ?>
            <button class="btn btn-outline-warning"><a class="text-decoration-none" href="account.php">Account</a></button>
            <button class="btn btn-outline-light"><a class="text-decoration-none text-white" href="logout.php">Logout</a></button>
          <?php endif; ?>
        </li>
      </div>
    </div>
  </nav>