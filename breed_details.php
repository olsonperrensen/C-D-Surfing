<?php include_once 'includes/header.php'; ?>
<?php if (!empty(htmlspecialchars($_GET['q'], ENT_QUOTES)) && is_numeric(htmlspecialchars($_GET['q'], ENT_QUOTES))) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/Breed.php'; ?>
    <?php
    $breed_id = htmlspecialchars($_GET['q'], ENT_QUOTES);
    $sql = "SELECT * FROM BREEDS WHERE breed_id = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $breed_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php
    if (!empty($row)) {
        $breed = new Breed($row);
    } else {
        header('Location: 404.php');
        exit();
    }
    ?>
    <section class="page-section about-heading">
        <div class="container">
            <img width="500" height="500" class="rounded-circle img-fluid rounded about-heading-img mb-3 mb-lg-0 d-block m-auto" src=<?= $breed->image_link ?> alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Understand breeds, Love your pet</span>
                                <span class="section-heading-lower">Learn more about <?= $breed->name ?></span>
                            </h2>
                            <p>The <strong><?= $breed->name ?></strong><?= $breed->isFeline ? " (cat) " : " (dog) " ?>
                                has the following common traits:
                            </p>
                            <section class="py-4 my-5">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        foreach ($breed as $key => $value) {
                                            if (
                                                $key == 'breed_id' || $key == 'isFeline' || $key == 'image_link'
                                                || $key == 'name'
                                            ) {
                                                continue;
                                            }
                                            $tint = '';
                                            echo <<<A
                                            <div class="col-md-6 col-lg-4">
                                            <p><strong>$key</strong></p>
                                           A;
                                            if (is_numeric($value)) {
                                                $og_value = $value;
                                                switch ($value) {
                                                    case 1:
                                                        $value = 20;
                                                        $tint = 'danger';
                                                        break;
                                                    case 2:
                                                        $value = 40;
                                                        $tint = 'warning';
                                                        break;
                                                    case 3:
                                                        $value = 60;
                                                        $tint = 'info';
                                                        break;
                                                    case 4:
                                                        $value = 80;
                                                        $tint = 'success';
                                                        break;
                                                    case 5:
                                                        $value = 100;
                                                        $tint = 'success';
                                                        break;
                                                    default:
                                                        $value = 100;
                                                        $tint = 'success';
                                                        # code...
                                                        break;
                                                }
                                                echo <<<B
                                                <div class="progress">
                                                    <div class="progress-bar bg-$tint" role="progressbar" style="width: $value%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">$og_value</div>
                                                </div>
                                            </div>
                                            B;
                                            } else {
                                                echo "<div><samp class='text-white bg-dark'>$value</samp></div></div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </section>
                            <?php
                            echo <<<QQ
                                    <div class="text-center">
                                    <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black"
                                    QQ;
                            if (empty($email)) {
                                echo 'href="login.php"';
                            } else {
                                echo <<<Z
                                    href="ads.php?q=$breed_id"
                                    Z;
                            }
                            echo <<<R
                                    >Check availability</a></button></div>
                                    R;
                            ?>
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