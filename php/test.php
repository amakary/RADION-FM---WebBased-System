<?php

require_once './db.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain');

$res = $con->query("SELECT `song`.`USER_NAME`,COUNT(`song_downloads`.`SONG_ID`) AS `count` FROM `song_downloads` JOIN `song` ON `song_downloads`.`SONG_ID`=`song`.`SONG_ID` GROUP BY `song`.`USER_NAME` ORDER BY `count` DESC");
if ($con->error) {
  http_response_code(500);
  print_r($con->error);
  exit();
}

while ($row = $res->fetch_assoc()) {
  foreach ($row as $key => $value) {
    echo "$key: $value\n";
  }
}

?>
