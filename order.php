<?php include_once 'includes/header.php'; ?>
<?php if (isset($POST['usr'])) : ?>
    <section class="h-50 w-100 p-3 d-inline-block" style="background-color: #d69465;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p>
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/1.webp" class="img-fluid" alt="Generic placeholder image">
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Name</p>
                                        <p class="lead fw-normal mb-0">iPad Air</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Color</p>
                                        <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2" style="color: #fdd8d2;"></i>
                                            pink rose</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Quantity</p>
                                        <p class="lead fw-normal mb-0">1</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Price</p>
                                        <p class="lead fw-normal mb-0">$799</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Total</p>
                                        <p class="lead fw-normal mb-0">$799</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal">$799</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light btn-lg me-2">Continue shopping</button>
                        <button type="button" class="btn btn-primary btn-lg">Add to cart</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!isset($POST['usr'])) : ?>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Come On In</span>
                            <span class="section-heading-lower">LOG IN</span>
                        </h2>
                        <?php require_once "login.php" ?>
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
<?php endif; ?>
<?php require_once 'includes/footer.php' ?>
</body>

</html>