<?php include_once 'includes/header.php'; ?>
<?php require_once 'pdo.php'; ?>
<?php
function checkLogin()
{
    if (empty($email)) {
        return "login.php";
    } else {
        return "ads.php";
    }
}
?>
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
            $sql = "SELECT * FROM CATS;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
                <li><em><a href="https://duckduckgo.com/?q=$name">Learn more</a></em></li>
                </ul>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black"
                Q;
                if (empty($email)) {
                    echo 'href="login.php"';
                } else {
                    echo 'href="ads.php"';
                }
                echo <<<R
                >Check availability</a></button>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                R;
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
            <?php
            $sql = "SELECT * FROM DOGS;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $i = 0;
            while ($row) {
                $i++;
                $origin = $row['origin'];
                $id = $row['id'];
                $good_with_children = $row['good_with_children'];
                $good_with_other_dogs = $row['good_with_other_dogs'];
                $image_link = $row['image_link'];
                $shedding = $row['shedding'];
                $drooling = $row['drooling'];
                $coat_length = $row['coat_length'];
                $good_with_strangers = $row['good_with_strangers'];
                $playfulness = $row['playfulness'];
                $protectiveness = $row['protectiveness'];
                $trainability = $row['trainability'];
                $energy = $row['energy'];
                $barking = $row['barking'];
                $min_life_expectancy = $row['min_life_expectancy'];
                $max_life_expectancy = $row['max_life_expectancy'];
                $max_height_male = $row['max_height_male'];
                $max_height_female = $row['max_height_female'];
                $max_weight_male = $row['max_weight_male'];
                $max_weight_female = $row['max_weight_female'];
                $min_height_male = $row['min_height_male'];
                $min_height_female = $row['min_height_female'];
                $min_weight_male = $row['min_weight_male'];
                $min_weight_female = $row['min_weight_female'];
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
                <li><em><a href="https://duckduckgo.com/?q=$name">Learn more</a></em></li>
                </ul>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black" href="login.php">Check availability</a></button>
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
<?php require_once 'includes/footer.php' ?>
</body>

</html>