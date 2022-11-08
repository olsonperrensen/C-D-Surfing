<?php
include_once 'pdo.php';
if (!empty($_GET['pet_id'])) {
    try {
        $pid = htmlspecialchars($_GET['pet_id'], ENT_QUOTES);
        $sql = "DELETE FROM shopping_cart WHERE pet_id = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':pid' => $pid));
    } catch (PDOException $e) {
    }
}
header("Location: order.php");
