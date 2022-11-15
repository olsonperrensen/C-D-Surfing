<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once 'models/Pet.php'; ?>
    <table class="bg-light table table-hover">
        <thead>
            <tr>
                <?php
                $sql = "SELECT p.name, gender, age, size, color, diet, h.healthcare_id, h.healthcare_name, register_date from pet_details p
                join users u on p.owner_id = u.user_id
                join healthcare h on h.healthcare_id = p.healthcare_id
                where email = :u
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
                    header('Location: 404.php');
                }
                ?>
    </table>
    <?php include_once 'includes/footer.php'; ?>
<?php endif; ?>
<?php if (empty($email))
    header('Location: login.php');
?>