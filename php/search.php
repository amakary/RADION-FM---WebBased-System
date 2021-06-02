<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'PUBLIC,RADIONER,FOUNDER';
require_once '../slpw/sitelokpw.php';

header('Content-Type: application/json');

$q = !empty($_GET['q']) ? $_GET['q'] : null;
$result = [];
$response = [
  'success' => false,
  'message' => 'Unknown error',
  'result' => []
];

if ($q === null) {
  http_response_code(400);
  $response['message'] = 'Query is not defined';
  die(json_encode($response));
}

$q = $con->real_escape_string($q);
$user_res = $con->query("SELECT * FROM `sitelok` WHERE `Username` LIKE '%$q%'");
$song_res = $con->query("SELECT * FROM `song` WHERE `SONG_NAME` LIKE '%$q%'");

while ($song = $song_res->fetch_object()) {
  $song_id = $song->RDON_ID;
  $name = $song->SONG_NAME;
  $result[] = [
    'type' => 'song',
    'name' => $name,
    'id' => $song_id,
    'hash' => md5("asset-preview-$song_id"),
    'score' => levenshtein($name, $q)
  ];
}

while ($user = $user_res->fetch_object()) {
  $uid = $user->id;
  $name = $user->Username;
  $result[] = [
    'type' => 'user',
    'name' => $name,
    'id' => $uid,
    'hash' => md5("$uid$SiteKey"),
    'score' => levenshtein($name, $q)
  ];
}

$scores = array_column($result, 'score');
array_multisort($scores, SORT_DESC, $result);

$response['success'] = true;
$response['message'] = '';
$response['result'] = $result;
echo json_encode($response);

?>
