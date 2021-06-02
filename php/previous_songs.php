<?php

require_once 'db.php';

$sid = isset($_GET['sid']) ? $_GET['sid'] : '1';
$json = file_get_contents("https://www.radion.fm:8002/played?sid=$sid&type=json");
$json = json_decode($json);
$response = [];

for ($i = 1; $i <= 5; $i++) $response[] = $json[$i];

header('Content-Type: application/json');
echo json_encode($response);

?>
