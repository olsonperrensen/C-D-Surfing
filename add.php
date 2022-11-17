<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/User.php' ?>
    <?php
    $sql = "SELECT can_advertise FROM USERS WHERE email = :em";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':em' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new User($row);
    if (empty($user->can_advertise)) {
        header('Location: account.php');
        die();
    }
    ?>
    <?php
    $errors = array(
        'emptypetname' => '',
        'invalidpetname' => '',
        'emptyDeliveryDate' => ''
    );
    $btnPressed = false;
    // Handles POST requests
    if (isset($_POST['submit'])) {
        if (empty($_POST['petname'])) {
            $errors['emptypetname'] = 'Pet name cannot be left empty.';
        }
        if (empty($_POST['deliveryDate'])) {
            $errors['emptyDeliveryDate'] = 'Delivery date cannot be left empty.';
        }

        if (!array_filter($errors)) {
            header('Location: thank-you.php');
        }
    }
    ?>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Transform someone's life</span>
                            <span class="section-heading-lower">Add a pet to our database</span>
                        </h2>
                        <form action=<?= $_SERVER['PHP_SELF']; ?> method="POST">
                            <div class="form-floating mb-3">
                                <input value="<?= htmlspecialchars($_POST['petname'] ?? '')  ?>" name="petname" type="petname" class="form-control">
                                <label for="floatingInput">Pet name</label>
                                <?php if ($errors['invalidpetname']) : ?>
                                    <h5 class="userwarn"><?= $errors['invalidpetname'] ?></h5>
                                <?php endif; ?>
                                <?php if ($errors['emptypetname']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptypetname'] ?></h5>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating">
                                <input value="<?= htmlspecialchars($_POST['deliveryDate'] ?? '')  ?>" name="deliveryDate" type="date" class="form-control">
                                <label for="floatingdeliveryDate">Drop-off by</label>
                                <?php if ($errors['emptyDeliveryDate']) : ?>
                                    <h5 class="userwarn"><?= $errors['emptyDeliveryDate'] ?></h5>
                                <?php endif; ?>
                                <br>
                                <input value="<?= htmlspecialchars($_POST['petPhoto'] ?? '')  ?>" name="petPhoto" type="file" class="form-control">
                                <label for="floatingdeliveryDate">Photo</label>
                                <br>
                                <button value="true" name="submit" class="btn btn-secondary btn-sm">Send</button>
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
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (empty($email)) {
    header('Location: login.php');
}
