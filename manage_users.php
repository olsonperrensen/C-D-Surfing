<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once "models/User.php" ?>
    <table class="bg-light table table-hover">
        <thead>
            <tr>
                <?php
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
                        echo '<tr class="text-black">';
                        foreach ($row as $key => $value) {
                            echo <<<T
                                <td>$value</td>
                            T;
                        }
                        echo <<<T
                            <td>
                            <button class="btn btn-warning">✏️</button>
                            <button class="btn btn-info">❌</button>
                            </td></tr>
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
