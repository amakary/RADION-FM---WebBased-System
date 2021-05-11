<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rdon_id = $_POST['id'];
  $edition_id = $_POST['edition_id'];
  $quantity = $_POST['editions_count'];
  $price = (float) $_POST['price'];
  $type = $_POST['terms'];
  $cid = $_POST['cid'];

  $con->query("UPDATE `song` SET `EDITION_ID`=$edition_id, `QUANTITY`=$quantity, `PRICE`=$price, `EDITION_LICENSE`='$type', `EDITION_CID`='$cid' WHERE `USER_NAME`='$slusername' AND `RDON_ID`='$rdon_id'");
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>
