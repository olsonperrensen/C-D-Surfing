<?php include_once 'pdo.php'; ?>
<?php
session_start();
if (
    !empty($_SESSION['email']) && !empty($_GET['q'])
    && !is_numeric($_GET['q'])
) {
    $filtered_pets_by_breed = array();
    $breed_name = htmlspecialchars($_GET['q'], ENT_QUOTES);

    $sql = "SELECT p.pet_id,b.name as bname, b.isFeline, gender, age,p.name,story,diet,u.zipcode,datediff(now(),a.advertised_date) as days FROM pet_details p
                    join ads a on p.pet_id=a.pet_id
                    join users u on p.owner_id =u.user_id
                    join breeds b on p.breed_id= b.breed_id
                    where b.name = :b
                    order by days;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":b" => $breed_name));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    while ($row) {
        array_push($filtered_pets_by_breed, $row);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    header("Content-Type: application/json");
    echo json_encode($filtered_pets_by_breed);
} else {
    header('Location: index.php');
}
