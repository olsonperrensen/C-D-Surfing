<?php
$rootFolder = dirname(__DIR__);
require_once $rootFolder . '/private/lib/vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$response = $client->request(
    'GET',
    'https://api.api-ninjas.com/v1/cats?family_friendly=5',
    ['headers' => ['X-Api-Key' => ['6FwktKruucr28cfTfxZMzg==TPesjgCH6fDiiESl']]]
);

$res = json_decode($response->getBody(), true);
$sql = 'INSERT INTO cats(';
for ($i = 0; $i < count($res); $i++) {
    foreach ($res[$i] as $key => $value) {
        $sql .= $key . ',';
    }
    $sql .= ") VALUES(";
    foreach ($res[$i] as $key => $value) {
        $sql .= <<<S
        "$value",
        S;
    }
    $sql .= ");";
    echo $sql . "<br><br><hr>";
    $sql = 'INSERT INTO cats(';
}
