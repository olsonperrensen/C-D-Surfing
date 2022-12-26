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
    $errors = array();
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        $pid = htmlspecialchars($_GET['ad_id'], ENT_QUOTES);
        try {
            $sql = "DELETE FROM shopping_cart WHERE pet_id = :pid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':pid' => $pid));
        } catch (PDOException $e) {
            $errors['errorDelCart'] = 'Sth went wrong...';
        }
        try {
            $sql = "DELETE FROM ads WHERE pet_id = :pid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':pid' => $pid));
        } catch (PDOException $e) {
            $errors['errorDelAd'] = 'Sth went wrong...';
        }
        try {
            $sql = "DELETE FROM pet_details WHERE pet_id = :pid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':pid' => $pid));
        } catch (PDOException $e) {
            $errors['errorDelPet'] = 'Sth went wrong...';
        }
        if (empty($errors['errorDelPet']) && empty($errors['errorDelAd']
            && empty($errors['errorDelCart']))) {
            header("Location: manage_ads.php");
        } else {
            header("Location: 404.php");
        }
    }
    die();
}
// DELETE ORDER ORDER DETAILS and SHIPPING INFO FOR TESTING ONLY 
if (isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], '/admin.php')) {
    $errors = array();
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        try {
            $sql = "delete from order_details;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            $errors['errorDelOD'] = 'Sth went wrong...';
        }
        try {
            $sql = "delete from orders;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            $errors['errorDelO'] = 'Sth went wrong...';
        }
        try {
            $sql = "delete from shipping_info;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            $errors['errorDelShip'] = 'Sth went wrong...';
        }
        try {
            $sql = "update pet_details set online_purchased = 0;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            $errors['errorDelPD'] = 'Sth went wrong...';
        }
        header("Content-Type: application/json");
        if (!empty($errors)) {
            echo json_encode(["deleted" => false]);
        } else {
            echo json_encode(["deleted" => true]);
        }
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
if (!empty($_GET['ruser_id']) && is_numeric($_GET['ruser_id'])) {
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    if ($isAdmin) {
        try {
            $user_id_d = htmlspecialchars($_GET['ruser_id'], ENT_QUOTES);
            $sql = "DELETE FROM USERS WHERE user_id = :uid";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':uid' => $user_id_d));
        } catch (PDOException $e) {
        }
        header("Location: manage_users.php");
        die();
    } else {
        $sql = "UPDATE users set warnings = warnings+1 WHERE user_id = :uid;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':uid' => $_SESSION['user_id']));
        session_destroy();
        header("Location: account.php");
    }
}
header("Location: account.php");
