<?php include_once 'pdo.php'; ?>
<?php
session_start();
$isAdmin = $_SESSION['isAdmin'] ?? '';
$_POST = json_decode(file_get_contents("php://input"), true);
if (
    !empty($isAdmin) && !empty(htmlspecialchars($_POST['user_id'], ENT_QUOTES))
    &&
    is_numeric(htmlspecialchars($_POST['user_id'], ENT_QUOTES))
) {
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
    $pw = password_hash('Lab2021', PASSWORD_DEFAULT);
    $sql_p = "UPDATE users SET password=:pw WHERE user_id = :uid;";
    $stmt_p = $pdo->prepare($sql_p);
    $stmt_p->execute(array(':uid' => $user_id, ':pw' => $pw));
    header("Content-Type: application/json");
    if ($stmt_p->rowCount()) {
        echo json_encode(["gewijzigd" => true]);
    } else {
        echo json_encode(["gewijzigd" => false]);
    }
} else {
    header('Location: index.php');
}
