<?php

$name = !empty($_POST['name']) ? $_POST['name'] : null;
$bytes = !empty($_FILES['bytes']) ? $_FILES['bytes'] : null;
$type = !empty($_POST['type']) ? $_POST['type'] : null;

header('Content-Type: application/json');
$response = [
  'success' => false,
  'message' => 'Unknown error'
];

function random_id () {
  $dir = __DIR__ . '/../stored/';
  $keys = array_merge(range(0, 9), range('a', 'z'));

  do {
    $id = '';
    for ($i = 0; $i < 30; $i++) $id .= $keys[array_rand($keys)];
  } while (file_exists("$dir/$id"));

  return $id;
}

if ($name === null && $bytes === null) {
  http_response_code(400);
  $response['message'] = 'Name or bytes should be defined';
  die(json_encode($response));
}

if ($type === null) {
  http_response_code(400);
  $response['message'] = 'Type should be defined';
  die(json_encode($response));
}

if (!preg_match('/^[-\w.]+\/[-\w.]+$/', $type)) {
  http_response_code(400);
  $response['message'] = 'Invalid MIME type';
  die(json_encode($response));
}

$id = random_id();
$path = __DIR__ . "/../stored/$id";
$success = false;
file_put_contents(__DIR__ . "/../stored/$id-type", $type);

if ($name !== null) $success = rename(__DIR__ . "/../uploads/$name", $path);
else if ($bytes !== null) $success = boolval(move_uploaded_file($bytes['tmp_name'], $path));

$response['success'] = $success;
if ($success) {
  $response['message'] = 'Success';
  $response['url'] = "https://radion.fm/stored/index.php?id=$id";
} else {
  http_response_code(500);
  $response['message'] = 'Unable to store file';
}

echo json_encode($response);

?>
