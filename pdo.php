<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=pets', 'Webuser', "Lab2021");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
