<?php include_once 'includes/header.php'; ?>
<?php if (
    !empty($_POST['petname'])
    &&
    !empty($_POST['deliveryDate'])
    &&
    !empty($_POST['petPhoto'])
    &&
    !empty($_POST['submit'])
) : ?>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Thank you</span>
                        </h2>
                        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0 d-block m-auto" src="assets/img/thank-you.png" alt="..." />
                        <p class="mb-0">
                            <small><em>We will make sure our staff personally takes care of the matter A.S.A.P.</em></small>
                            <br />
                        <p class="lead">In the meantime, you can check your new pets <a href="user_pets.php">here</a>!</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'includes/footer.php' ?>
    </body>

    </html>
<?php endif; ?>
<?php if (
    empty($_POST['petname'])
    &&
    empty($_POST['deliveryDate'])
    &&
    empty($_POST['petPhoto'])
    &&
    empty($_POST['submit'])
) {
    header('Location: login.php');
}
