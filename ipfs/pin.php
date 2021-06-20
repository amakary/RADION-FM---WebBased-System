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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $ipfs = new IPFS();
  $cid = !empty($_GET['cid']) ? $_GET['cid'] : null;

  if ($cid !== null) {
    $ipfs->pinAdd($cid);
    exit_result(200, '');
  } else exit_result(400, 'CID is empty');
} else exit_result(405, 'Method not allowed');

?>
