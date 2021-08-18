<?php

require_once 'fpcalc.php';

header('Content-Type: application/json');
$result = [
  'success' => false,
  'message' => 'Unknown error'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fpcalc = fpcalc($_FILES['data']['tmp_name']);
  $result['success'] = true;
  $result['message'] = $fpcalc['fingerprint'];
} else {
  http_response_code(405);
  $result['message'] = 'Unsupported method';
}

echo json_encode($result);

?>
