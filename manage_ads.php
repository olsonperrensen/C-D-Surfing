<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once "models/Ad.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ad = new Ad($_POST);
        $breed_id = null;
        try {
            $sql_u = "SELECT breed_id FROM breeds where name = :n;";
            $stmt_u = $pdo->prepare($sql_u);
            $stmt_u->execute(array(':n' => $ad->bname));
            $row_u = $stmt_u->fetch(PDO::FETCH_ASSOC);
            $breed_id = $row_u['breed_id'];
        } catch (PDOException $e) {
            echo "<p class='bg-light text-center'>Something went wrong ($e)</p>";
        }
        try {
            $sql_u = "UPDATE pet_details 
            set pet_id = :p,
            gender = :g,
            age = :a,
            name = :n,
            breed_id = :b,
            story = :s,
            diet = :d
            where pet_id = :p;";
            $stmt_u = $pdo->prepare($sql_u);
            $stmt_u->execute(array(
                ':p' => $ad->pet_id,
                ':g' => $ad->gender,
                ':a' => $ad->age,
                ':n' => $ad->name,
                ':b' => $breed_id,
                ':s' => $ad->story,
                ':d' => $ad->diet,
            ));
            if ($stmt_u->rowCount()) {
                echo "<p class='lead bg-light text-success text-center'>Pet $ad->name (id $ad->pet_id) successfully updated!</p>";
            } else {
                echo "<p class='lead bg-light text-danger text-center'>Error: No pets exist with that ID.</p>";
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
                $sql = "SELECT p.pet_id,b.name as bname,b.isFeline,gender, age,p.name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                join ads a on p.pet_id=a.pet_id
                join users u on p.owner_id =u.user_id
                join breeds b on p.breed_id= b.breed_id
                order by days;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $table_attributes = array('breed_id', 'name');
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        // if (!in_array($key, $table_attributes)) {
                        //     continue;
                        // }
                        echo <<<Q
                <td>$key</td>
                Q;
                    }
                    echo "</tr></thead><tbody>";
                    while ($row) {
                        $ad = new Ad($row);
                        echo "<tr id='$ad->pet_id' class='text-black'>";
                        foreach ($row as $key => $value) {
                            // if (!in_array($key, $table_attributes)) {
                            //     continue;
                            // }
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo <<<T
                            <td>
                            <button id='btne$ad->pet_id' 
                            data-bs-toggle="modal" data-bs-target="#exampleModal$ad->pet_id" 
                            type="button" class="btn btn-warning">✏️</button>
                            <button id='btnd$ad->pet_id' class="btn btn-info"><a href="remove.php?ad_id=$ad->pet_id">❌</a></button>
                            </td></tr>
                            <div class="modal fade" id="exampleModal$ad->pet_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <form name="edit$ad->pet_id" id="edit$ad->pet_id" action="$self" method="POST">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit advertisement</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            T;
                        foreach ($ad as $key => $value) {
                            if ($key == 'pet_id') {
                                echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input readonly value="$value" name="$key" id="$key$ad->pet_id" type="text" class="form-control">
                                    <label for="floatingInput">$key</label>
                                    </div>
                                    Q;
                                continue;
                            }
                            echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input value="$value" name="$key" id="$key$ad->pet_id" type="text" class="form-control">
                                    <label for="floatingInput">$key</label>
                                    </div>
                                Q;
                        }
                        echo <<<T
                            </div>
                            <pre class='bg-black text-white text-center'>Tip: Avoid errors by typing known breeds we work with.</pre>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                    <p class='bg-light text-center'>You don't have advertisements in your database.</p>
                    P;
                }
                ?>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="addAd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add advertisement</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Please head to the <strong><a href="add.php">adding</a></strong> page.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
