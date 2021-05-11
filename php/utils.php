<?php

function is_json ($str) {
  json_decode($str);
  return json_last_error() === JSON_ERROR_NONE;
}

?>
