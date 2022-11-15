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
    if (!empty($row)) {
        $_SESSION['hasBasket'] = 1;
        // Calculate regional fee (if any)
        // Buyer's ZIP
        $bsql = 'select distinct zipcode, user_id
    from users
    join shopping_cart sc on users.user_id = sc.userid
    where user_id = (select user_id
                     from users
                     where email = :bem);';
        $bstmt = $pdo->prepare($bsql);
        $bstmt->execute(array(':bem' => $email));
        $brow = $bstmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $brow['user_id'];
        $buyer_zipcode = $brow['zipcode'];
        $_SESSION['buyer_zipcode'] = $buyer_zipcode;
        // Seller's ZIP
        $ssql = 'select distinct zipcode
        from users
        join pet_details
        on owner_id = user_id
        join shopping_cart
        on pet_details.pet_id = shopping_cart.pet_id
        where shopping_cart.userid = (select user_id
                         from users
                         where email = :sem);';
        $sstmt = $pdo->prepare($ssql);
        $sstmt->execute(array(':sem' => $email));
        $srow = $sstmt->fetch(PDO::FETCH_ASSOC);
        $seller_zipcode = array();
        while ($srow) {
            array_push($seller_zipcode, $srow['zipcode']);
            $srow = $sstmt->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        unset($_SESSION['hasBasket']);
    }
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
                    <?php if ($order_total != 0) : ?>
                        <?php
                        $regional_cost = 0;
                        foreach ($seller_zipcode as $key => $value) {
                            $_SESSION['seller_zipcodes'][] = $value;
                            if ($value != $buyer_zipcode) {
                                $regional_cost += 0.62;
                            }
                        }
                        $order_total += $regional_cost;
                        ?>
                        <div class="card mb-5">
                            <div class="card-body p-4">

                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-4">Regional fee:</span>
                                        <span class="lead fw-normal">€ <?= $regional_cost ?? 0 ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>

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
                        <button type="button" class="btn btn-light btn-lg me-2"> <a class="text-decoration-none" href="ads.php">Continue shopping</a> </button>
                        <form action="process_order.php" method="POST">
                            <?php if (!empty($_SESSION['hasBasket'])) : ?>
                                <button name="user_id" value="<?= $user_id ?>" type="submit" class="btn btn-primary btn-lg">Checkout</button>
                            <?php endif; ?>
                        </form>
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