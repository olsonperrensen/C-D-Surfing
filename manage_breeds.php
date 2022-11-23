<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once "models/Breed.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo ("<h1 class='lead bg-white text-danger text-xl-center'>TO-DO</h1>");
        die();
        // $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
        // $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        // $zipcode = htmlspecialchars($_POST['zipcode'], ENT_QUOTES);
        // $lookingFor = htmlspecialchars($_POST['looking_for'], ENT_QUOTES);
        // $canAdvertise = htmlspecialchars($_POST['can_advertise'], ENT_QUOTES);
        // $isAdmin_u = htmlspecialchars($_POST['isAdmin'], ENT_QUOTES);
        // $warnings = htmlspecialchars($_POST['warnings'], ENT_QUOTES);
        // try {
        //     $sql_u = "UPDATE USERS
        //     SET email = :em, zipcode = :z, looking_for = :l, can_advertise = :c,
        //     isAdmin = :ia, warnings = :w
        //     WHERE user_id = :uid";
        //     $stmt_u = $pdo->prepare($sql_u);
        //     $stmt_u->execute(array(
        //         ':em' => $email,
        //         ':uid' => $user_id,
        //         ':ia' => $isAdmin_u,
        //         ':z' => $zipcode,
        //         ':l' => $lookingFor,
        //         ':c' => $canAdvertise,
        //         ':w' => $warnings
        //     ));
        //     if ($stmt_u->rowCount()) {
        //         echo "<p class='lead bg-light text-success text-center'>User $email successfully updated!</p>";
        //     } else {
        //         echo "<p class='lead bg-light text-danger text-center'>Error: No users exist with that ID.</p>";
        //     }
        // } catch (PDOException $e) {
        //     echo "<p class='bg-light text-center'>Something went wrong ($e)</p>";
        // }
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
