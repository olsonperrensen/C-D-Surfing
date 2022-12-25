<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/Pet.php'; ?>
    <?php
    $sql = "SELECT p.name, gender, age, size, color, diet, h.healthcare_id, h.healthcare_name, 
    register_date from pet_details p
    join users u on p.owner_id = u.user_id
    join healthcare h on h.healthcare_id = p.healthcare_id
    where email = :u
    order by pet_id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($row)) {
        header('Location: 404.php');
    }
    ?>
    <div class="product-item-title d-flex">
        <div class="bg-faded p-5 d-flex ms-auto rounded">
            <h2 class="section-heading mb-0">
                <span class="section-heading-upper">Bought</span>
                <span class="section-heading-lower">Pets</span>
            </h2>
        </div>
    </div>
    <table class="bg-light table table-hover">
        <thead>
            <tr>
                <?php
                $total_paid = 0.00;
                // Purchased on MUST be alliged with the order table... otherwise it will duplicate.
                $sql = "SELECT p.name, b.name as breed,
                gender, age, size, color, diet, h.healthcare_id, h.healthcare_name, register_date,
                h.price from pet_details p
                join breeds b on b.breed_id = p.breed_id
                join users u on p.owner_id = u.user_id
                join healthcare h on h.healthcare_id = p.healthcare_id
                where email = :u
                and p.online_purchased = 1
                order by pet_id;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(':u' => $email));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        if ($key == 'healthcare_id' || $key == 'price') continue;
                        echo <<<Q
                <td>$key</td>
                Q;
                    }
                    echo "</tr></thead><tbody>";
                    while ($row) {
                        $pet = new Pet($row);
                        echo '<tr class="text-';
                        switch (strlen($pet->name)) {
                            case 3:
                                echo 'gray';
                                break;
                            case 4:
                                echo 'secondary';
                                break;
                            case 5:
                                echo 'success';
                                break;
                            case 6:
                                echo 'danger';
                                break;
                            case 7:
                                echo 'warning';
                                break;
                            case 8:
                                echo 'info';
                                break;
                            case 9:
                                echo 'light';
                                break;
                            default:
                                echo 'primary';
                                break;
                        }
                        echo '">';
                        foreach ($row as $key => $value) {
                            if ($key == 'healthcare_id' || $key == 'price') continue;
                            else if ($key == 'healthcare_name') {
                                echo <<<H
                                <td><a href="healthcare_details.php?h=$pet->healthcare_id">$value</a></td>
                            H;
                                continue;
                            }
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo '</tr>';
                        $total_paid += $row['price'];
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                } else {
                    echo <<<P
                    <p class='bg-light text-center'>You haven't bought any pets</p>
                    P;
                }
                ?>
    </table>
    <div>
        <?php
        $sql = "select shipping_cost from shipping_info
            join orders o on shipping_info.shipping_id = o.shipping_id
            where user_id = :u;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':u' => $_SESSION['user_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($row) {
            $total_paid += $row['shipping_cost'];
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo <<<Q
        <p class='bg-light text-center'>Total money spent: €$total_paid</p>
        Q;
        ?>
    </div>
    <div class="product-item-title d-flex">
        <div class="bg-faded p-5 d-flex ms-auto rounded">
            <h2 class="section-heading mb-0">
                <span class="section-heading-upper">Home</span>
                <span class="section-heading-lower">Pets</span>
            </h2>
        </div>
    </div>
    <table class="bg-light table table-hover">
        <thead>
            <tr>
                <?php
                $sql = "SELECT p.name, gender, age, size, color, diet, h.healthcare_id, h.healthcare_name, register_date from pet_details p
                join users u on p.owner_id = u.user_id
                join healthcare h on h.healthcare_id = p.healthcare_id
                where email = :u
                and p.online_purchased = 0
                order by pet_id;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(':u' => $email));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        if ($key == 'healthcare_id') continue;
                        echo <<<Q
                <td>$key</td>
                Q;
                    }
                    echo "</tr></thead><tbody>";
                    while ($row) {
                        $pet = new Pet($row);
                        echo '<tr class="text-';
                        switch (strlen($pet->name)) {
                            case 3:
                                echo 'gray';
                                break;
                            case 4:
                                echo 'secondary';
                                break;
                            case 5:
                                echo 'success';
                                break;
                            case 6:
                                echo 'danger';
                                break;
                            case 7:
                                echo 'warning';
                                break;
                            case 8:
                                echo 'info';
                                break;
                            case 9:
                                echo 'light';
                                break;
                            default:
                                echo 'primary';
                                break;
                        }
                        echo '">';
                        foreach ($row as $key => $value) {
                            if ($key == 'healthcare_id') continue;
                            else if ($key == 'healthcare_name') {
                                echo <<<H
                                <td><a href="healthcare_details.php?h=$pet->healthcare_id">$value</a></td>
                            H;
                                continue;
                            }
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo '</tr>';
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                } else {
                    echo <<<P
                    <p class='bg-light text-center'>You haven't registed any local pets under your name.</p>
                    P;
                }
                ?>
    </table>
    <?php include_once 'includes/footer.php'; ?>
<?php endif; ?>
<?php if (empty($email))
    header('Location: login.php');
?>