<?php

require_once './default.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$hash = md5("asset-preview-$id");

die($hash);

?>
