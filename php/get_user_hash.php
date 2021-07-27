<?php

$groupswithaccess = 'ALL,PUBLIC,RADIONER,CEO,FOUNDER';

require_once 'default.php';
require_once '../slpw/sitelokpw.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : '';
$hash = md5("$uid$SiteKey");

die($hash);

?>
