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
if (!empty($_GET['breed_id']) && is_numeric($_GET['breed_id'])) {
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        try {
            $bid = htmlspecialchars($_GET['breed_id'], ENT_QUOTES);
            $sql = "DELETE FROM BREEDS WHERE breed_id = :bid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':bid' => $bid));
        } catch (PDOException $e) {
        }
        header("Location: manage_breeds.php");
    }
    die();
}
if (!empty($_GET['ad_id']) && is_numeric($_GET['ad_id'])) {
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        try {
            $pid = htmlspecialchars($_GET['ad_id'], ENT_QUOTES);
            $sql = "DELETE FROM ads WHERE pet_id = :pid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':pid' => $pid));
        } catch (PDOException $e) {
            var_dump($e);
        }
        header("Location: manage_ads.php");
    }
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
