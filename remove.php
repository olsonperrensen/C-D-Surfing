<?php
include_once 'pdo.php';
if (!empty($_GET['pet_id']) && is_numeric($_GET['pet_id'])) {
    try {
        $pid = htmlspecialchars($_GET['pet_id'], ENT_QUOTES);
        $sql = "DELETE FROM shopping_cart WHERE pet_id = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':pid' => $pid));
    } catch (PDOException $e) {
    }
    header("Location: order.php");
    die();
}
if (!empty($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    try {
        $uid = htmlspecialchars($_GET['user_id'], ENT_QUOTES);
        $sql = "DELETE FROM shopping_cart WHERE userid = :uid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':uid' => $uid));
    } catch (PDOException $e) {
    }
    header("Location: order.php");
    die();
}
if (!empty($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        try {
            $user_id_d = htmlspecialchars($_GET['user_id'], ENT_QUOTES);
            $sql = "DELETE FROM USERS WHERE user_id = :uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':uid' => $user_id_d));
        } catch (PDOException $e) {
        }
        header("Location: manage_users.php");
    }
}
header("Location: account.php");
