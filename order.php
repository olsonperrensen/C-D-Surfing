<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once "models/Pet.php" ?>
    <?php
    $sql = "SELECT p.pet_id 'Pet Identification Number', 
    u.naam 'Ex-Owner', 
    b.name 'Breed Name', p.name 'Pet Name', p.age 'Pet Age', 
    p.size 'Pet Size', p.color 'Skin Color', h.healthcare_name 'Healthcare Plan (mandatory)',
    h.price 'Healthcare Price', s.dateAdded 'Added to basket on' from pet_details p
    join users u on p.owner_id=u.user_id
    join breeds b on p.breed_id=b.breed_id
    join healthcare h on p.healthcare_id=h.healthcare_id
    join shopping_cart s on p.pet_id=s.pet_id
    where s.userid = (select user_id from users where email = :em)
    order by p.pet_id asc;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':em' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $order_total = 0;
    ?>
    <section class="h-50 w-100 p-3 d-inline-block" style="background-color: #d69465;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Shopping Cart </span><span class="h4">(<?= $basketCounter ?? 0 ?> in your cart)</span></p>
                    <?php
                    $petid = 0;
                    while ($row) {
                        $petid = $row['Pet Identification Number'];
                        $pet = new Pet($row);
                        echo <<<AD
                        <div class="card mb-4">
                        <div class="card-body p-4">
                        <div class="row align-items-center">
                        <div class="col-md-2">
                        <img src="./assets/img/paw.jpg" class="img-fluid" alt="Generic placeholder image">
                        </div>
                        AD;
                        foreach ($pet as $key => $value) {
                            if ($key == 'Healthcare Price') {
                                $order_total += $value;
                            }
                            if (!empty($value)) {
                                echo <<<Q
                            <div class="col-md-2 d-flex justify-content-center">
                            <div>
                            <p class="small text-muted mb-4 pb-2">$key</p>
                            <p class="lead fw-normal mb-0">$value</p>
                            </div>
                            </div>
                            Q;
                            }
                        }
                        echo <<<AD
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>
                            <p class="small text-muted mb-4 pb-2"><strong>Remove</strong></p>
                            <p class="lead fw-normal mb-0"><a href='remove.php?pet_id=$petid'>❌</a></p>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        AD;
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-4">Regional fee:</span> <span class="lead fw-normal">2800 (pet) : 2580 (you) = $20</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal">€ <?= $order_total ?></span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light btn-lg me-2"> <a href="ads.php">Continue shopping</a> </button>
                        <button type="button" class="btn btn-primary btn-lg">Checkout</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php require_once 'includes/footer.php' ?>
    </body>

    </html>
<?php endif; ?>
<?php if (empty($email))
    header('Location: login.php');
?>