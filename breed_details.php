<?php include_once 'includes/header.php'; ?>
<?php if (!empty($_GET['q']) && is_numeric($_GET['q'])) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/Breed.php'; ?>
    <?php
    $breed_id = htmlspecialchars($_GET['q'], ENT_QUOTES);
    $sql = "SELECT * FROM BREEDS WHERE breed_id = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $breed_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $breed = new Breed($row);
    ?>
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0 d-block m-auto" src="assets/img/breed_details.jpg" alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Understand breeds, Love your pet</span>
                                <span class="section-heading-lower">Learn more about <?= $breed->name ?></span>
                            </h2>
                            <p>Founded in 1997 by two Flemish brothers,
                                our establishment has been an online,
                                searchable database of animals who need homes for quite a while.
                                It is also a directory of additional adoption services
                                across our latest capabilities, all held in Mechelen.
                                Approved users maintain their own pet pages and available-pet information.</p>
                            <p class="mb-0">
                                We guarantee that you will fall in
                                <em>love</em>
                                with our loyal little-fellows the moment you walk inside until you finish your last shared moment with them. We aim bringing you back to the best companion you can have on earth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (empty($_GET['q']) || !is_numeric($_GET['q'])) {
    header('Location: 404.php');
} ?>
<?php include_once 'includes/footer.php'; ?>
</body>

</html>