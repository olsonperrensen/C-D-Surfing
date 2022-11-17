<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email) && !empty($_SESSION['allowedToCheckout'])) : ?>
    <script>
        setTimeout(() => {
            document.getElementById('redirecting').innerHTML = 'Redirecting...';
            window.location.replace("index.php");
        }, 1500);
    </script>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Thank you for your order.</span>
                        </h2>
                        <svg class="justify-content text-center d-block m-auto checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <br><br>
                        <h6 id="redirecting"></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    unset($_SESSION['allowedToCheckout']);
    ?>
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (empty($email) || empty($_SESSION['allowedToCheckout'])) {
    header('Location: login.php');
}
?>