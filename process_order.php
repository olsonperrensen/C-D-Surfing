<?php include_once 'includes/header.php'; ?>
<?php if (!empty($email)) : ?>
    <?php include_once 'pdo.php'; ?>
    <?php include_once "models/Pet.php" ?>
    <?php
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
    $sql = "SELECT * FROM shopping_cart WHERE userid = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $user_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    while ($row) {
        $pet_id = $row['pet_id'];
        $sql_unit_cost = 'select price from healthcare
        join pet_details pd on healthcare.healthcare_id = pd.healthcare_id
        join shopping_cart sc on pd.pet_id = sc.pet_id
        where sc.pet_id = :pid;';
        $stmt_unit_cost = $pdo->prepare($sql_unit_cost);
        $stmt_unit_cost->execute(array(':pid' => $pet_id));
        $row_uc = $stmt_unit_cost->fetch(PDO::FETCH_ASSOC);
        $unit_cost = $row_uc['price'];
        // OD
        $sql_od = "INSERT INTO ORDER_DETAILS(pet_id,unit_cost)
        VALUES(:pid,:uc)";
        $stmt_od = $pdo->prepare($sql_od);
        $stmt_od->execute(array(':pid' => $pet_id, ':uc' => $unit_cost));
        // Shipping
        $order_id = $pdo->lastInsertId();
        $seller_zipcode = $_SESSION['seller_zipcodes'];
        $buyer_zipcode = $_SESSION['buyer_zipcode'];
        $regional_cost = 0.00;
        foreach ($seller_zipcode as $key => $value) {
            if ($value != $buyer_zipcode) {
                $regional_cost = 0.62;
            }
        }
        $sql_shipping = 'insert into shipping_info(shipping_cost, shipping_region_id) 
        VALUES (:sc,:rid)';
        $stmt_shipping = $pdo->prepare($sql_shipping);
        $stmt_shipping->execute(array(':sc' => $regional_cost, ':rid' => $buyer_zipcode));
        $shipping_id = $pdo->lastInsertId();
        // Order
        $sql_order = 'INSERT INTO Orders(order_id,user_id,status,shipping_id)
        VALUES(:oid,:u,"Awaiting Delivery",:sid)';
        $stmt_order = $pdo->prepare($sql_order);
        $stmt_order->execute(array(
            ':oid' => $order_id, ':u' => $user_id,
            'sid' => $shipping_id
        ));
        // Get next pet on basket
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Clean basket
    $sql = "DELETE FROM shopping_cart WHERE userid = :u;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $user_id));
    header('Location: thank-you.php');
    ?>
<?php endif; ?>
<?php if (empty($email))
    header('Location: login.php');
?>