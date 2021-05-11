<?php

require_once __DIR__ . '/../slpw/sitelokpw.php';

function get_rank ($sid) {
  global $con;

  $cache_path = __DIR__ . '/ranking_cache.json';
  $cached_data = file_get_contents($cache_path);
  $cached = json_decode($cached_data, true);
  $time = time();
  $last = $cached['timestamp'];

  if ($time - $last > 86400) {
    $songs = array();
    $songs_res = $con->query("SELECT * FROM `song` WHERE `SONG_STATUS`=1 ORDER BY `SONG_ID` DESC");

    while ($song = $songs_res->fetch_object()) {
      $song_id = $song->SONG_ID;
      $downloads_res = $con->query("SELECT COUNT(*) AS `downloads` FROM `song_downloads` WHERE `SONG_ID`=$song_id");
      $downloads = $downloads_res->fetch_object()->downloads;
      $hearts_res = $con->query("SELECT COUNT(*) AS `hearts` FROM `song_love` WHERE `SONG_ID`=$song_id AND `SONG_LOVE_STATUS`=1");
      $hearts = $hearts_res->fetch_object()->hearts;

      array_push($songs, [
        'id' => $song_id,
        'hearts' => $hearts,
        'downloads' => $downloads,
        'score' => ($downloads * 0.7) + ($hearts * 0.3)
      ]);
    }

    usort($songs, function($a, $b) {
      if ($a['score'] == $b['score']) return 0;
      else return $a['score'] < $b['score'] ? 1 : -1;
    });

    $cached = array('songs' => $songs, 'timestamp' => time());
    $cached_data = json_encode($cached);
    file_put_contents($cache_path, $cached_data);
  }

  return array_search($sid, array_column($cached['songs'], 'id'));
}

?>
