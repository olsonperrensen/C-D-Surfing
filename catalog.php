<?php include_once 'includes/header.php'; ?>
<?php require_once 'pdo.php'; ?>
<div class="product-item-title d-flex">
    <div class="bg-faded p-5 d-flex ms-auto rounded">
        <h2 class="section-heading mb-0">
            <span class="section-heading-upper">Browse</span>
            <span class="section-heading-lower">Cats</span>
        </h2>
    </div>
</div>
<section class="py-4 my-5">
    <div class="container">
        <div class="row">
            <?php
            while ($row) {
                $id = $row['id'];
                $length = $row['length'];
                $origin = $row['origin'];
                $image_link = $row['image_link'];
                $family_friendly = $row['family_friendly'];
                $shedding = $row['shedding'];
                $general_health = $row['general_health'];
                $playfulness = $row['playfulness'];
                $meowing = $row['meowing'];
                $children_friendly = $row['children_friendly'];
                $stranger_friendly = $row['stranger_friendly'];
                $grooming = $row['grooming'];
                $intelligence = $row['intelligence'];
                $other_pets_friendly = $row['other_pets_friendly'];
                $min_weight = $row['min_weight'];
                $max_weight = $row['max_weight'];
                $min_life_expectancy = $row['min_life_expectancy'];
                $max_life_expectancy = $row['max_life_expectancy'];
                $name = $row['name'];
                echo <<<T
                    <div class="col-md-6 col-lg-4">
                    <div class="card my-3" style="width: 18rem;">
                    <img src="$image_link" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">$name</h5>
                    <p class="card-text">Learn more about $name ($origin).</p>
                    <a href="#" class="btn btn-primary">See details</a>
                    </div>
                    </div>
                    </div>
                T;
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
        </div>
    </div>
</section>
<div class="product-item-title d-flex">
    <div class="bg-faded p-5 d-flex ms-auto rounded">
        <h2 class="section-heading mb-0">
            <span class="section-heading-upper">Browse</span>
            <span class="section-heading-lower">Dogs</span>
        </h2>
    </div>
</div>
<section class="py-4 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card my-3" style="width: 18rem;">
                    <img src="./assets/img/products-01.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'includes/footer.php' ?>
</body>

</html>