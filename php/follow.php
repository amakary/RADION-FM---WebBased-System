<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once '../slpw/sitelokpw.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $target_user = isset($_POST['username']) ? $_POST['username'] : null;
  if ($target_user === null) {
    http_response_code(400);
    die('No target user');
  }

  $target_user = $con->real_escape_string($target_user);
  $target_res = $con->query("SELECT `Custom20` FROM `sitelok` WHERE `Username`='$target_user'");
  if ($target_res->num_rows === 0) {
    http_response_code(400);
    die('Not existing user');
  }

  $target_user_data = $target_res->fetch_object();
  $followers = $target_user_data->Custom20 !== '' ? explode(',', $target_user_data->Custom20) : [];
  if (in_array($slusername, $followers)) {
    $index = array_search($slusername, $followers);
    unset($followers[$index]);
    $followers = array_values($followers);
    echo '0';
  } else {
    $followers[] = $slusername;
    echo '1';
  }

  $followers = implode(',', $followers);
  $con->query("UPDATE `sitelok` SET `Custom20`='$followers' WHERE `Username`='$target_user'");
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>
