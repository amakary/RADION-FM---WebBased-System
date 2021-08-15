<?php

function fpcalc ($path) {
  $ds = DIRECTORY_SEPARATOR;
  $output_raw = null;
  $code_raw = 999;
  $output = null;
  $code = 999;

  $fpcalc = realpath(__DIR__ . $ds . '..' . $ds . 'bin' . $ds . 'fpcalc.exe');
  exec("\"$fpcalc\" -json -raw \"$path\"", $output_raw, $code_raw);
  exec("\"$fpcalc\" -json \"$path\"", $output, $code);

  if ($code !== 0 || $code_raw !== 0) return false;

  $result = json_decode($output[0], true);
  $result['fingerprint_raw'] = json_decode($output_raw[0])->fingerprint;
  return $result;
}

$popcnt_table = [
  0,1,1,2,1,2,2,3,1,2,2,3,2,3,3,4,1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,
  1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,
  1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,
  2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,3,4,4,5,4,5,5,6,4,5,5,6,5,6,6,7,
  1,2,2,3,2,3,3,4,2,3,3,4,3,4,4,5,2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,
  2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,3,4,4,5,4,5,5,6,4,5,5,6,5,6,6,7,
  2,3,3,4,3,4,4,5,3,4,4,5,4,5,5,6,3,4,4,5,4,5,5,6,4,5,5,6,5,6,6,7,
  3,4,4,5,4,5,5,6,4,5,5,6,5,6,6,7,4,5,5,6,5,6,6,7,5,6,6,7,6,7,7,8,
];

function fp_popcnt ($x) {
  global $popcnt_table;
  return $popcnt_table[($x >> 0) & 0xff] +
    $popcnt_table[($x >> 8) & 0xff] +
    $popcnt_table[($x >> 16) & 0xff] +
    $popcnt_table[($x >> 24) & 0xff];
}

function fp_compare ($fpa, $fpb) {
  global $popcnt_table;
  $error = 0;
  for ($k = 0; $k < sizeof($fpa); $k++) {
    $x = $fpa[$k];
    $y = $fpb[$k];
    $error += fp_popcnt($x ^ $y);
  }

  return 1 - $error / 32 / min([sizeof($fpa), sizeof($fpb)]);
}

?>
