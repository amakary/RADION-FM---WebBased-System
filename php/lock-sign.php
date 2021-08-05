<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $font = isset($_POST['font']) ? $_POST['font'] : null;
  $date = gmdate('Y-m-d H:i:s');
  if ($font === null) {
    http_response_code(400);
    die('Invalid font name');
  }

  $con->query("UPDATE `sitelok` SET `signature_font`='$font', `signature_date`='$date' WHERE `Username`='$slusername'");
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>