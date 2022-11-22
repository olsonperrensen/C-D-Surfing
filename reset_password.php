<?php include_once 'pdo.php'; ?>
<?php
session_start();
$isAdmin = $_SESSION['isAdmin'];
if ($isAdmin) {
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
    $pw = password_hash('Lab2021', PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password=:pw WHERE user_id = :uid;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':uid' => $user_id, ':pw' => $pw));
    header("Content-Type: application/json");
    if ($stmt_u->rowCount()) {
        echo json_encode(["gewijzigd" => true]);
    } else {
        echo json_encode(["gewijzigd" => false]);
    }
} else {
    header('Location: index.php');
}
