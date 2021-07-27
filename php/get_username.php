<?php

require_once 'default.php';
require_once 'db.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
if ($uid === null) {
  http_response_code(400);
  die('Invalid UID');
}

$result = $con->query("SELECT `Username` FROM `sitelok` WHERE `id`=$uid");
if ($result->num_rows > 0) {
  $user = $result->fetch_object();
  die($user->Username);
} else {
  die("No user with UID: $uid");
}

?>
