<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '../slpw/sitelokpw.php';
require_once '../slpw/slconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rdon_id = $_POST['id'];
  $edition_id = $_POST['edition_id'];
  $cid = $_POST['cid'];
  $hash = $_POST['hash'];

  $con->query("UPDATE `song` SET `EDITION_ID`=$edition_id, `EDITION_CID`='$cid', `EDITION_HASH`='$hash' WHERE `USER_NAME`='$slusername' AND `RDON_ID`='$rdon_id'");
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>
