<?php include_once 'includes/header.php'; ?>
<?php if (
    !empty($email)
    &&
    !empty($_SESSION['hasBasket'])
    &&
    !empty($_POST['user_id']) // && !empty($_SESSION['user_id'])
    &&
    $_SESSION['user_id'] == $_POST['user_id']
) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once "models/Pet.php" ?>
    <?php
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
    $buyer_zipcode = $_SESSION['buyer_zipcode'];
    $shipping_cost = 0.00;
    $sql = "SELECT * FROM shopping_cart WHERE userid = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $user_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // Calculate total shipping cost for order
    while ($row) {
        // Shipping
        $is_regional = $row['is_regional'];
        if (!$is_regional) {
            $shipping_cost += REGIONAL_FEE;
        }
        // Get next pet on basket
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Insert shipping cost of 1 big order
    $sql_shipping = 'insert into shipping_info(shipping_cost, shipping_region_id) 
    VALUES (:sc,:rid)';
    $stmt_shipping = $pdo->prepare($sql_shipping);
    $stmt_shipping->execute(array(':sc' => $shipping_cost, ':rid' => $buyer_zipcode));
    $shipping_id = $pdo->lastInsertId();
    // Order
    $sql_order = 'INSERT INTO Orders(user_id,status,shipping_id)
    VALUES(:u,"Awaiting Delivery",:sid)';
    $stmt_order = $pdo->prepare($sql_order);
    $stmt_order->execute(array(
        ':u' => $user_id,
        'sid' => $shipping_id
    ));
    $order_id = $pdo->lastInsertId();
    // Get all pets again to link them to the 1 big order
    $sql = "SELECT * FROM shopping_cart WHERE userid = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $user_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    while ($row) {
        // OG price
        $pet_id = $row['pet_id'];
        $sql_unit_cost = 'select price from healthcare
                join pet_details pd on healthcare.healthcare_id = pd.healthcare_id
                join shopping_cart sc on pd.pet_id = sc.pet_id
                where sc.pet_id = :pid;';
        $stmt_unit_cost = $pdo->prepare($sql_unit_cost);
        $stmt_unit_cost->execute(array(':pid' => $pet_id));
        $row_uc = $stmt_unit_cost->fetch(PDO::FETCH_ASSOC);
        $unit_cost = (float)$row_uc['price'];
        // OD
        $sql_od = "INSERT INTO ORDER_DETAILS(order_id,pet_id,unit_cost)
                VALUES(:oid,:pid,:uc)";
        $stmt_od = $pdo->prepare($sql_od);
        $stmt_od->execute(array(
            ':oid' => $order_id,
            ':pid' => $pet_id,
            ':uc' => $unit_cost
        ));
        // Cleanups : Adjust new owner + take out pet from sale
        $sql_new_owner = "update pet_details set owner_id = :u, online_purchased = :op 
    where pet_id = :pid;";
        $stmt_new_owner = $pdo->prepare($sql_new_owner);
        $stmt_new_owner->execute(array(':u' => $user_id, ':pid' => $pet_id, ':op' => 1));
        $sql_ads = "delete from ads
    where pet_id = :pid;";
        $stmt_ads = $pdo->prepare($sql_ads);
        $stmt_ads->execute(array(':pid' => $pet_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Clean basket
    $sql = "DELETE FROM shopping_cart WHERE userid = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $user_id));
    // Redirect 
    header('Location: checkout.php');
    ?>
<?php endif; ?>
<?php if (
    empty($email)
    ||
    empty($_SESSION['hasBasket'])
    ||
    empty($_POST['user_id']) // || !empty($_SESSION['user_id'])
    ||
    $_SESSION['user_id'] != $_POST['user_id']
) {
    if (
        !empty($_SESSION['user_id']) && !empty($_POST['user_id'])
        && is_numeric($_POST['user_id'])
        && $_POST['user_id'] != $_SESSION['user_id']
    ) {
        $sql = "UPDATE users set warnings = warnings+1 WHERE user_id = :uid;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':uid' => $_SESSION['user_id']));
        $_SESSION['warning'] = true;
    }
    header('Location: login.php');
}
?>