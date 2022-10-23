<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=pets', 'root');
$sql = "SELECT * FROM CATS;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);