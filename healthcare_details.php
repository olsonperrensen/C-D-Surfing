<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php if (!empty($_GET['h']) && is_numeric($_GET['h'])) : ?>
        <?php include_once 'pdo.php'; ?>
        <?php include_once 'models/Healthcare.php'; ?>
        <?php
        $healthcare_id = htmlspecialchars($_GET['h'], ENT_QUOTES);
        $sql = "SELECT * FROM healthcare WHERE healthcare_id = :u;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':u' => $healthcare_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <?php
        if (!empty($row)) {
            $healthcare = new Healthcare($row);
        } else {
            header('Location: 404.php');
            exit();
        }
        ?>
        <section class="page-section about-heading">
            <div class="container">
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Understand healthcares, Love your pet</span>
                                    <span class="section-heading-lower">Learn more about <?= $healthcare->healthcare_name ?></span>
                                </h2>
                                <p>The <strong><?= $healthcare->healthcare_name ?></strong> plan
                                    includes:
                                </p>
                                <section class="py-4 my-5">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            foreach ($healthcare as $key => $value) {
                                                if ($key == 'healthcare_id') {
                                                    continue;
                                                }
                                                echo <<<A
                                            <div class="col-md-6 col-lg-4">
                                            <p><strong>$key</strong></p>
                                           A;
                                                echo "<div><samp class='text-white bg-dark'>";
                                                if ($key == 'price') {
                                                    echo "&#8364; $value</samp></div></div>";
                                                } else {
                                                    echo "$value</samp></div></div>";
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

                                echo <<<Z
                                    href="ads.php?h=$healthcare_id"
                                    Z;

                                echo <<<R
                                    >Check pets with this plan</a></button>
                                    <button type="button" class="btn btn-primary">
                                    <a class="text-decoration-none text-black" href="healthcare.php">
                                    Go back</button>
                                    </div>
                                    R;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (empty($_GET['h']) || !is_numeric($_GET['h'])) {
        header('Location: 404.php');
    } ?>
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (empty($email))
    header('Location: login.php');
?>