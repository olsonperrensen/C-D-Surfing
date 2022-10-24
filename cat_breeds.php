<?php include_once 'includes/header.php'; ?>
<?php require_once 'pdo.php'; ?>
<?php include_once 'models/Breed.php'; ?>
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
            $sql = "SELECT breed_id, image_link,name,origin FROM BREEDS WHERE isFeline = 1;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $breed = new Breed($row);
                echo <<<T
                    <div class="col-md-6 col-lg-4">
                    <div class="card my-3" style="width: 18rem;">
                    <img src="$breed->image_link" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">$breed->name</h5>
                    <p class="card-text">Learn more about $breed->name ($breed->origin).</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal$breed->breed_id">
                    See details</button>
                    <div class="modal fade" id="exampleModal$breed->breed_id" tabindex="-1" aria-labelledby="exampleModalLabel$breed->breed_id" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel$breed->breed_id">Learn more about $breed->name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <ul>
                T;
                foreach ($row as $key => $value) {
                    if ($key == 'image_link' || $key == 'breed_id') {
                        continue;
                    }
                    echo <<<P
                    <li><strong>$key</strong> : <em>$value</em></li>
                    P;
                }
                echo <<<Q
                <li><em><a href="breed_details.php?q=$breed->breed_id">Learn more</a></em></li>
                </ul>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black"
                Q;
                if (empty($email)) {
                    echo 'href="login.php"';
                } else {
                    echo <<<G
                    href="ads.php?q=$breed->breed_id"
                    G;
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
<?php require_once 'includes/footer.php' ?>
</body>

</html>