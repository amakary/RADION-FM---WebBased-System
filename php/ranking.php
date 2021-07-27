<?php

require_once 'db.php';
require_once 'utils.php';

function get_rank ($sid) {
  global $con;

  $cache_path = __DIR__ . '/ranking_cache.json';
  $cached_data = null;
  $cached = null;
  $time = time();
  $last = 0;

  if (file_exists($cache_path)) {
    $cached_data = file_get_contents($cache_path);
    $cached = json_decode($cached_data, true);
    $last = $cached['timestamp'];
  }

  if ($time - $last > 86400) {
    $songs = array();
    $songs_res = $con->query("SELECT * FROM `song` WHERE `SONG_STATUS`=1 ORDER BY `SONG_ID` DESC");

    $contract_storage = get_json("$tzstats/explorer/contract/$fa2/storage");
    $market_storage = get_json("$tzstats/explorer/contract/$market/storage");
    $tokens_bigmap_id = $contract_storage->bigmaps->ledger;
    $tokens_bigmap = get_json("$tzstats/explorer/bigmap/$tokens_bigmap_id/values?meta=1");
    $editions_bigmap_id = $contract_storage->bigmaps->editions_metadata;
    $editions_bigmap = get_json("$tzstats/explorer/bigmap/$editions_bigmap_id/values");
    $sales_bigmap_id = $market_storage->bigmaps->sales;
    $sales_bigmap = get_json("$tzstats/explorer/bigmap/$sales_bigmap_id/values");
    $max_per_run = (int) $contract_storage->value->max_editions_per_run;

    while ($song = $songs_res->fetch_object()) {
      $song_id = $song->SONG_ID;
      $likes_res = $con->query("SELECT COUNT(*) AS `likes` FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=1");
      $likes = (int) $likes_res->fetch_object()->likes;
      $dislikes_res = $con->query("SELECT COUNT(*) AS `dislikes` FROM `song_like` WHERE `SONG_ID`=$song_id AND `SONG_LIKE_STATUS`=0");
      $dislikes = (int) $dislikes_res->fetch_object()->dislikes;
      $tweets_res = $con->query("SELECT COUNT(*) AS `tweets` FROM `song_tweet` WHERE `SONG_ID`=$song_id");
      $tweets = (int) $tweets_res->fetch_object()->tweets;
      $plays_res = $con->query("SELECT COUNT(*) AS `plays` FROM `song_fullplay` WHERE `SONG_ID`=$song_id");
      $plays = (int) $plays_res->fetch_object()->plays;
      $downloads_res = $con->query("SELECT COUNT(*) AS `downloads` FROM `song_downloads` WHERE `SONG_ID`=$song_id");
      $downloads = (int) $downloads_res->fetch_object()->downloads;
      $hearts_res = $con->query("SELECT COUNT(*) AS `hearts` FROM `song_love` WHERE `SONG_ID`=$song_id AND `SONG_LOVE_STATUS`=1");
      $hearts = (int) $hearts_res->fetch_object()->hearts;
      $sale_nft = 0;
      $score = 0;

      if ($song->EDITION_ID != -1) {
        $edition_details = $editions_bigmap[$row->EDITION_ID]->value;
        $quantity = (int) $edition_details->number_of_editions;
        $left = 0;

        foreach ($sales_bigmap as $sale) {
          $token_id = (int) $sale->key->sale_token->token_for_sale_token_id;
          $edition_id = floor($token_id / $max_per_run);
          if ($edition_id == $song->EDITION_ID) $left++;
        }

        $sale_nft = $quantity - $left;
        $score = (($likes - $dislikes) * 0.12) + ($hearts * 0.12) + ($tweets * 0.12) + ($plays * 0.12) + ($downloads * 0.26) + ($sale_nft * 0.26);
      } else {
        $score = (($likes - $dislikes) * 0.17) + ($hearts * 0.17) + ($tweets * 0.17) + ($plays * 0.17) + ($downloads * 0.32);
      }

      array_push($songs, [
        'id' => $song_id,
        'likes' => $likes,
        'dislikes' => $dislikes,
        'hearts' => $hearts,
        'tweets' => $tweets,
        'plays' => $plays,
        'downloads' => $downloads,
        'nft' => $sale_nft,
        'score' => $score
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

  return array_search($sid, array_column($cached['songs'], 'id')) + 1;
}

?>
