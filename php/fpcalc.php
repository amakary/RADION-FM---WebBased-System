<?php

function fpcalc ($path) {
  $ds = DIRECTORY_SEPARATOR;
  $output = null;
  $code = 999;

  $fpcalc = realpath(__DIR__ . $ds . '..' . $ds . 'bin' . $ds . 'fpcalc.exe');
  exec("\"$fpcalc\" -json \"$path\"", $output, $code);

  if ($code !== 0) return false;
  return json_decode($output[0]);
}

?>
