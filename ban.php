<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email) && $warnings >= 5) : ?>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">You have been banned from the website.</span>
                        </h2>
                        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0 d-block m-auto" src="assets/img/ban.jpg" alt="..." />
                        <p class="mb-0">
                            <small><em>This is due to your <em>gruesome</em> behavior.</em></small>
                            <br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'includes/footer.php' ?>
    </body>

    </html>
    <?php session_destroy(); ?>
<?php endif; ?>
<?php if (empty($email) || $warnings < 5)
    header('Location: login.php');
?>