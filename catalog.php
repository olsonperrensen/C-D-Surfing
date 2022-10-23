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
            $i = 0;
            while ($row) {
                $i++;
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal$i">
                    See details</button>
                    <div class="modal fade" id="exampleModal$i" tabindex="-1" aria-labelledby="exampleModalLabel$i" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel$i">Learn more about $name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <ul>
                T;
                foreach ($row as $key => $value) {
                    if ($key == 'image_link' || $key == 'id') {
                        continue;
                    }
                    echo <<<P
                    <li><strong>$key</strong> : <em>$value</em></li>
                    P;
                }
                echo <<<Q
                </ul>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add to basket</button>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                Q;
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