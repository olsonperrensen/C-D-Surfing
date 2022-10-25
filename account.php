<?php include_once 'includes/header.php'; ?>
<?php include_once 'pdo.php'; ?>
<?php include_once 'models/User.php'; ?>
<?php
$sql = "SELECT naam, can_advertise FROM USERS WHERE email = :em";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':em' => $email));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user = new User($row);
$advertise_word = "can";
if (empty($user->can_advertise)) {
    $advertise_word = "can't";
}
?>
<section class="py-4 my-5">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <?php
            echo <<<Q
            <p class="lead text-white text-center">Logged in as <samp class="text-warning">$user->naam</samp>. You <strong class="text-info">$advertise_word</strong>
                place advertisements under this account.</p>
            Q;
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="avatar bg-faded p-5 d-flex ms-auto rounded">
                    <a href="user_pets.php">
                        <h2 class="section-heading mb-0">
                            <span class="section-heading-upper">My</span>
                            <p>
                                <span class="white">home pets</span>
                            </p>
                        </h2>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="avatar bg-faded p-5 d-flex ms-auto rounded">
                    <a href="ads.php">
                        <h2 class="section-heading mb-0">
                            <span class="section-heading-upper">My</span>
                            <p>
                                <span class="white">public ads</span>
                            </p>
                        </h2>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="avatar bg-faded p-5 d-flex ms-auto rounded">
                    <a href="order.php">
                        <h2 class="section-heading mb-0">
                            <span class="section-heading-upper">My</span>
                            <p>
                                <span class="white">shopping basket</span>
                            </p>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>
</body>

</html>