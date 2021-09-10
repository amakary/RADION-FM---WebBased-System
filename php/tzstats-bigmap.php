<?php

require_once 'utils.php';

header('Content-Type: application/json');

$bigmap = isset($_GET['bigmap']) ? (int) $_GET['bigmap'] : null;
$key = isset($_GET['key']) ? $_GET['key'] : null;

echo get_text("https://api.tzstats.com/explorer/bigmap/$bigmap/$key");

?>
