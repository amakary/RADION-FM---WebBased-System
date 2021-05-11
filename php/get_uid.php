<?php

require_once './default.php';
require_once './db.php';

$username = isset($_GET['username']) ? $_GET['username'] : null;
if ($username === null) {
  http_response_code(400);
  die('Invalid username');
}

$result = $con->query("SELECT `id` FROM `sitelok` WHERE `Username`='$username'");
if ($result->num_rows > 0) {
  $user = $result->fetch_object();
  die($user->id);
} else {
  die("No user with username: $username");
}

?>
