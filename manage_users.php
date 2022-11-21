<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once "models/User.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $zipcode = htmlspecialchars($_POST['zipcode'], ENT_QUOTES);
        $lookingFor = htmlspecialchars($_POST['looking_for'], ENT_QUOTES);
        $canAdvertise = htmlspecialchars($_POST['can_advertise'], ENT_QUOTES);
        $isAdmin_u = htmlspecialchars($_POST['isAdmin'], ENT_QUOTES);
        $warnings = htmlspecialchars($_POST['warnings'], ENT_QUOTES);
        try {
            $sql_u = "UPDATE USERS
            SET email = :em, zipcode = :z, looking_for = :l, can_advertise = :c,
            isAdmin = :ia, warnings = :w
            WHERE user_id = :uid";
            $stmt_u = $pdo->prepare($sql_u);
            $stmt_u->execute(array(
                ':em' => $email,
                ':uid' => $user_id,
                ':ia' => $isAdmin_u,
                ':z' => $zipcode,
                ':l' => $lookingFor,
                ':c' => $canAdvertise,
                ':w' => $warnings
            ));
            if ($stmt_u->rowCount()) {
                echo "<p class='lead bg-light text-success text-center'>User $email successfully updated!</p>";
            } else {
                echo "<p class='lead bg-light text-danger text-center'>Error: No users exist with that ID.</p>";
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
                $sql = "SELECT user_id,email,zipcode,looking_for,can_advertise,isAdmin,warnings FROM USERS;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        echo <<<Q
                <td>$key</td>
                Q;
                    }
                    echo "</tr></thead><tbody>";
                    while ($row) {
                        $user = new User($row);
                        echo "<tr id='$user->user_id' class='text-black'>";
                        foreach ($row as $key => $value) {
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo <<<T
                            <td>
                            <button id='btne$user->user_id' 
                            data-bs-toggle="modal" data-bs-target="#exampleModal$user->user_id" 
                            type="button" class="btn btn-warning">✏️</button>
                            <button id='btnd$user->user_id' class="btn btn-info"><a href="remove.php?user_id=$user->user_id">❌</a></button>
                            </td></tr>
                            <div class="modal fade" id="exampleModal$user->user_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <form name="edit$user->user_id" id="edit$user->user_id" action="$self" method="POST">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            T;
                        foreach ($user as $key => $value) {
                            if ($key == 'user_id') {
                                echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input readonly value="$value" name="$key" id="$key$user->user_id" type="text" class="form-control">
                                    <label for="floatingInput">$key</label>
                                    </div>
                                    Q;
                                continue;
                            }
                            echo <<< Q
                                    <div class="form-floating mb-3">
                                    <input value="$value" name="$key" id="$key$user->user_id" type="text" class="form-control">
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
                    <p class='bg-light text-center'>You don't have users in your database.</p>
                    P;
                }
                ?>
    </table>
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (!$isAdmin) {
    header('Location: login.php');
}
