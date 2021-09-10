<?php

$groupswithaccess = 'ALL,PUBLIC,RADIONER,RADION,FOUNDER';
require_once '../slpw/sitelokpw.php';

$tops = $con->query("SELECT `song`.`USER_NAME`,COUNT(`song_downloads`.`SONG_ID`) AS `COUNT` FROM `song_downloads` JOIN `song` ON `song_downloads`.`SONG_ID`=`song`.`SONG_ID` AND `song`.`USER_NAME`<>'Oclasus' GROUP BY `song`.`USER_NAME` ORDER BY `COUNT` DESC LIMIT 8");
$tops_json = [];
$devs = ['Oclasus', 'eidoriantan'];

while ($top = $tops->fetch_object()) {
  $username = $top->USER_NAME;
  $songs_res = $con->query("SELECT * FROM `song` WHERE `USER_NAME`='$username'");
  $minted = false;

  while ($song = $songs_res->fetch_object()) {
    if ($song->NFT) {
      $minted = true;
      break;
    }
  }

  $user = $con->query("SELECT `id`,`Custom2` FROM `sitelok` WHERE `Username`='$username'")->fetch_object();
  $userid = $user->id;
  $hash = md5("$userid$SiteKey");
  $profile_link = "/user-profile.php?uid=$userid&hash=$hash";
  ob_start();
  siteloklink($user->Custom2, 0);
  $avatar_link = ob_get_contents();
  ob_end_clean();
  $tops_json[] = [
    'username' => $username,
    'total_downloads' => $top->COUNT,
    'image' => $avatar_link,
    'profile' => $profile_link,
    'total_songs' => $songs_res->num_rows,
    'minted' => $minted,
    'is_dev' => in_array($username, $devs)
  ];
}

$skips = ['admin', 'Oclasus'];
foreach ($tops_json as $top) $skips[] = $top['username'];
$condition = '';
foreach ($skips as $skip) {
  if ($condition === '') $condition .= "`sitelok`.`Username`<>'$skip'";
  else $condition .= " AND `sitelok`.`Username`<>'$skip'";
}

$defaults_length = 8 - $tops->num_rows;
$defaults = $con->query("SELECT `sitelok`.*,COUNT(`song`.`SONG_ID`) AS `COUNT` FROM `sitelok` JOIN `song` ON `song`.`USER_NAME`=`sitelok`.`Username` WHERE $condition GROUP BY `sitelok`.`Username` HAVING `COUNT`>0 ORDER BY `id` LIMIT $defaults_length");
echo $con->error;

while ($user = $defaults->fetch_object()) {
  $username = $user->Username;
  $songs_res = $con->query("SELECT * FROM `song` WHERE `USER_NAME`='$username'");
  $minted = false;

  while ($song = $songs_res->fetch_object()) {
    if ($song->NFT) {
      $minted = true;
      break;
    }
  }

  $userid = $user->id;
  $hash = md5("$userid$SiteKey");
  $profile_link = "/user-profile.php?uid=$userid&hash=$hash";
  ob_start();
  siteloklink($user->Custom2, 0);
  $avatar_link = ob_get_contents();
  ob_end_clean();
  $tops_json[] = [
    'username' => $username,
    'total_downloads' => 0,
    'image' => $avatar_link,
    'profile' => $profile_link,
    'total_songs' => $user->COUNT,
    'minted' => $minted,
    'is_dev' => in_array($username, $devs)
  ];
}

if (isset($tops_json[0])) {
  $tops_json[0]['top'] = true;
}

header('Content-Type: application/json');
echo json_encode($tops_json);

?>
