<?php include_once 'pdo.php'; ?>
<?php
if (!empty($_GET['email'])) {
    $new_user_email = htmlspecialchars($_GET['email'], ENT_QUOTES);
    $sql = "SELECT * FROM users WHERE email = :uem;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':uem' => $new_user_email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    header("Content-Type: application/json");
    if (!empty($row)) {
        echo json_encode(["vrij" => false]);
    } else {
        echo json_encode(["vrij" => true]);
    }
} else {
    header('Location: index.php');
}
