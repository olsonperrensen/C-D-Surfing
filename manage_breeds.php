<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once "models/Breed.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $breed_id = htmlspecialchars($_POST['breed_id'], ENT_QUOTES);
        $isFeline = htmlspecialchars($_POST['isFeline'], ENT_QUOTES);
        $image_link = htmlspecialchars($_POST['image_link'], ENT_QUOTES);
        $length = htmlspecialchars($_POST['length'], ENT_QUOTES);
        $good_with_children = htmlspecialchars($_POST['good_with_children'], ENT_QUOTES);
        $good_with_dogs = htmlspecialchars($_POST['good_with_dogs'], ENT_QUOTES);
        $shedding = htmlspecialchars($_POST['shedding'], ENT_QUOTES);
        $grooming = htmlspecialchars($_POST['grooming'], ENT_QUOTES);
        $drooling = htmlspecialchars($_POST['drooling'], ENT_QUOTES);
        $coat_length = htmlspecialchars($_POST['coat_length'], ENT_QUOTES);
        $good_with_strangers = htmlspecialchars($_POST['good_with_strangers'], ENT_QUOTES);
        $playfulness = htmlspecialchars($_POST['playfulness'], ENT_QUOTES);
        $protectiveness = htmlspecialchars($_POST['protectiveness'], ENT_QUOTES);
        $trainability = htmlspecialchars($_POST['trainability'], ENT_QUOTES);
        $energy = htmlspecialchars($_POST['energy'], ENT_QUOTES);
        $vocal_communication = htmlspecialchars($_POST['vocal_communication'], ENT_QUOTES);
        $min_life_expectancy = htmlspecialchars($_POST['min_life_expectancy'], ENT_QUOTES);
        $max_life_expectancy = htmlspecialchars($_POST['max_life_expectancy'], ENT_QUOTES);
        $max_height_male = htmlspecialchars($_POST['max_height_male'], ENT_QUOTES);
        $max_height_female = htmlspecialchars($_POST['max_height_female'], ENT_QUOTES);
        $max_weight_male = htmlspecialchars($_POST['max_weight_male'], ENT_QUOTES);
        $max_weight_female = htmlspecialchars($_POST['max_weight_female'], ENT_QUOTES);
        $min_height_male = htmlspecialchars($_POST['min_height_male'], ENT_QUOTES);
        $min_height_female = htmlspecialchars($_POST['min_height_female'], ENT_QUOTES);
        $min_weight_male = htmlspecialchars($_POST['min_weight_male'], ENT_QUOTES);
        $min_weight_female = htmlspecialchars($_POST['min_weight_female'], ENT_QUOTES);
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $origin = htmlspecialchars($_POST['origin'], ENT_QUOTES);
        $intelligence = htmlspecialchars($_POST['intelligence'], ENT_QUOTES);
        $other_pets_friendly = htmlspecialchars($_POST['other_pets_friendly'], ENT_QUOTES);
        $family_friendly = htmlspecialchars($_POST['family_friendly'], ENT_QUOTES);
        $general_health = htmlspecialchars($_POST['general_health'], ENT_QUOTES);
        if (!empty($_POST['btnEdit'])) {
            $sql_u = "UPDATE BREEDS
            SET isFeline = :isFeline, image_link = :image_link, 
            length = :length, good_with_children = :good_with_children,
            good_with_dogs = :good_with_dogs, shedding = :shedding,
            grooming = :grooming, drooling = :drooling,coat_length = :coat_length,
            good_with_strangers = :good_with_strangers,playfulness = :playfulness,
            protectiveness = :protectiveness,trainability = :trainability,
            energy = :energy,vocal_communication = :vocal_communication,
            min_life_expectancy = :min_life_expectancy
            ,max_life_expectancy = :max_life_expectancy,
            max_height_male = :max_height_male,
            max_height_female = :max_height_female,
            max_weight_male = :max_weight_male,
            max_weight_female = :max_weight_female,
            min_height_male = :min_height_male,
            min_height_female = :min_height_female,
            min_weight_male = :min_weight_male,
            min_weight_female = :min_weight_female,
            name = :name,origin = :origin,intelligence = :intelligence,
            other_pets_friendly = :other_pets_friendly,
            family_friendly = :family_friendly
            ,general_health = :general_health 
            WHERE breed_id = :breed_id";
            $action = "updated";
        } else if (!empty($_POST['btnAdd'])) {
            $sql_u = "insert into breeds(breed_id,isFeline, image_link, length, good_with_children, 
            good_with_dogs, shedding, grooming, drooling, coat_length, good_with_strangers, 
            playfulness, protectiveness, trainability, energy, vocal_communication, 
            min_life_expectancy, max_life_expectancy, max_height_male, max_height_female, 
            max_weight_male, max_weight_female, min_height_male, min_height_female, min_weight_male, 
            min_weight_female, name, origin, intelligence, other_pets_friendly, family_friendly, 
            general_health) 
            VALUES(:breed_id,:isFeline,:image_link,:length,:good_with_children,:good_with_dogs,:shedding,:grooming,:drooling,:coat_length,:good_with_strangers,:playfulness,:protectiveness,:trainability,:energy,:vocal_communication,:min_life_expectancy,:max_life_expectancy,:max_height_male,:max_height_female,:max_weight_male,:max_weight_female,:min_height_male,:min_height_female,:min_weight_male,:min_weight_female,:name,:origin,:intelligence,:other_pets_friendly,:family_friendly,:general_health) ;";
            $action = "created";
        }
        try {
            $stmt_u = $pdo->prepare($sql_u);
            $stmt_u->execute(array(
                ':breed_id' => $breed_id,
                ':isFeline' => $isFeline,
                ':image_link' => $image_link,
                ':length' => $length,
                ':good_with_children' => $good_with_children,
                ':good_with_dogs' => $good_with_dogs,
                ':shedding' => $shedding,
                ':grooming' => $grooming,
                ':drooling' => $drooling,
                ':coat_length' => $coat_length,
                ':good_with_strangers' => $good_with_strangers,
                ':playfulness' => $playfulness,
                ':protectiveness' => $protectiveness,
                ':trainability' => $trainability,
                ':energy' => $energy,
                ':vocal_communication' => $vocal_communication,
                ':min_life_expectancy' => $min_life_expectancy,
                ':max_life_expectancy' => $max_life_expectancy,
                ':max_height_male' => $max_height_male,
                ':max_height_female' => $max_height_female,
                ':max_weight_male' => $max_weight_male,
                ':max_weight_female' => $max_weight_female,
                ':min_height_male' => $min_height_male,
                ':min_height_female' => $min_height_female,
                ':min_weight_male' => $min_weight_male,
                ':min_weight_female' => $min_weight_female,
                ':name' => $name,
                ':origin' => $origin,
                ':intelligence' => $intelligence,
                ':other_pets_friendly' => $other_pets_friendly,
                ':family_friendly' => $family_friendly,
                ':general_health' => $general_health
            ));
            if ($stmt_u->rowCount()) {
                echo "<p class='lead bg-light text-success text-center'>Breed $name successfully $action!</p>";
            } else {
                echo "<p class='lead bg-light text-danger text-center'>Error: No breeds exist with that ID.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='bg-light text-center'>Something went wrong ($e)</p>";
        }
    }
    ?>
    <table class="bg-light table table-hover">
        <thead>
            <tr>
                <?php
                $self = $_SERVER['PHP_SELF'];
                $sql = "SELECT * FROM breeds;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $table_attributes = array('breed_id', 'name', 'isFeline', 'origin', 'length');
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        if (!in_array($key, $table_attributes)) {
                            continue;
                        }
                        if ($key == 'isFeline') {
                            echo <<<Q
                            <td>Animal</td>
                            Q;
                            continue;
                        } else if ($key == 'name') {
                            echo <<<Q
                            <td>Breed</td>
                            Q;
                            continue;
                        }
                        echo <<<Q
                <td>$key</td>
                Q;
                    }
                    echo "</tr></thead><tbody>";
                    while ($row) {
                        $breed = new Breed($row);
                        echo "<tr id='$breed->breed_id' class='text-black'>";
                        foreach ($row as $key => $value) {
                            if (!in_array($key, $table_attributes)) {
                                continue;
                            }
                            if ($key == 'isFeline') {
                                if ($value == '1') {
                                    echo <<<T
                                <td>Cat</td>
                            T;
                                } else { {
                                        echo <<<T
                                    <td>Dog</td>
                                T;
                                    }
                                }
                                continue;
                            }
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo <<<T
                            <td>
                            <button id='btne$breed->breed_id' 
                            data-bs-toggle="modal" data-bs-target="#exampleModal$breed->breed_id" 
                            type="button" class="btn btn-warning">✏️</button>
                            <button id='btnd$breed->breed_id' class="btn btn-info"><a href="remove.php?breed_id=$breed->breed_id">❌</a></button>
                            </td></tr>
                            <div class="modal fade" id="exampleModal$breed->breed_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <form name="edit$breed->breed_id" id="edit$breed->breed_id" action="$self" method="POST">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit breed</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            T;
                        foreach ($breed as $key => $value) {
                            if ($key == 'breed_id') {
                                echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input readonly value="$value" name="$key" id="$key$breed->breed_id" type="text" class="form-control">
                                    <label for="floatingInput">$key</label>
                                    </div>
                                    Q;
                                continue;
                            }
                            echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input value="$value" name="$key" id="$key$breed->breed_id" type="text" class="form-control">
                                    <label for="floatingInput">$key</label>
                                    </div>
                                Q;
                        }
                        echo <<<T
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button name="btnEdit" id="btnEdit" value="btnEdit" type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            T;
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                } else {
                    echo <<<P
                    <p class='bg-light text-center'>You don't have breeds in your database.</p>
                    P;
                }
                ?>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="addBreed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add breed</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        foreach ($breed as $key => $value) {
                            echo <<< Q
                        <div class="form-floating mb-3">
                        <input name="$key" id="$key$breed->breed_id" type="text" class="form-control">
                        <label for="floatingInput">$key</label>
                        </div>
                    Q;
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button name="btnAdd" id="btnAdd" value="btnAdd" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (!$isAdmin) {
    header('Location: login.php');
}
