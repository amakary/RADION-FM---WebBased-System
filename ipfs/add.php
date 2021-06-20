<?php

require_once 'includes/IPFS.php';

use Cloutier\PhpIpfsApi\IPFS;

function exit_result ($code = 200, $message = '') {
  $result = [
    'success' => $code === 200,
    'message' => $message
  ];

  http_response_code($code);
  header('Content-Type: application/json');
  $result_json = json_encode($result);
  die($result_json);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ipfs = new IPFS();
  $file = !empty($_FILES['file']) ? $_FILES['file'] : null;
  $text = !empty($_POST['text']) ? $_POST['text'] : null;
  $cid = '';

  if ($file === null && $text === null) exit_result(400, 'File/text is empty');

  if ($file !== null) {
    $data = file_get_contents($file['tmp_name']);
    $cid = $ipfs->add($data);
  } else if ($text !== null) {
    $cid = $ipfs->add($text);
  }

  if ($cid === null) exit_result(500, 'Unable to get IPFS CID');
  $ipfs->pinAdd($cid);
  exit_result(200, $cid);
} else exit_result(405, 'Method not allowed');

?>
