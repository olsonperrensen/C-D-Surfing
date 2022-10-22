<?php
if (isset($_POST['usr']) && isset($_POST['pwd'])) {
  $usr = $_POST['usr'];
  $pwd = $_POST['pwd'];
  if ($usr == 'w@w.w' & $pwd = 'w@w.w') {
    header("Location: products.php");
  }
}
?>
<form action="login.php" method="POST">
  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="usr" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="pwd" placeholder="Password">
    <label for="floatingPassword">Password</label>
    <br>
    <button class="btn btn-secondary btn-sm">Log In</button>
  </div>
</form>