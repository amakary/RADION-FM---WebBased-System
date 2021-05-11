<?php

$groupswithaccess = 'ALL,PUBLIC,RADIONER,CEO,FOUNDER';

require_once '/slpw/sitelokpw.php';
require_once '/slpw/slconfig.php';

require_once '/php/music_info_get.php';

// Tab ID => Genre Name
$genres = [
  'first' => 'Rock',
  'second' => 'Pop',
  'third' => 'Country',
  'fourth' => 'Hip Hop / R&B',
  'fifth' => 'Latin',
  'six' => 'DJ Mix',
  'eight' => 'RAP',
  'seven' => 'Podcast',
  'ninth' => 'Deep Music',
  'tenth' => 'Classic Music',
  'eleventh' => 'Electronics',
  'twelfth' => 'Techo',
  'thirteenth' => 'Alternative Rock',
  'fourteenth' => 'House Music',
  'fifteenth' => 'Latin Music',
  'sixteenth' => 'Romantic',
  'seventeenth' => 'Relaxing',
  'eighteenth' => 'Kids',
  'nineteenth' => 'Jazz',
  'twentieth' => 'Blue',
  'twentyfirst' => 'Commercial'
];

foreach ($genres as $tab => $genre) {
?>
<div class="tab-pane active" id="tab-<?= $tab ?>">
  <div class="table-responsive">
    <table style="width:100%;" class="datatable_simple">
      <thead>
        <tr style="border-bottom: 2px solid #dddddd;">
          <th style="width:auto; padding-bottom:10px; padding-left:10px; padding-right:10px;"></th>
          <th style="width:30%; padding-bottom:10px;"> SONG</th>
          <th style="width:30%; padding-bottom:10px;"> SUBMITTED BY</th>

          <th style="width:auto; padding-bottom:10px; padding-left:10px; padding-right:10px;">LIKES</th>
          <th style="width:auto; padding-bottom:10px; padding-left:10px; padding-right:10px;">DISLIKES</th>
          <th style="width:auto; padding-bottom:10px; padding-left:10px; padding-right:10px;">LOVE</th>

          <th style="width:auto; padding-bottom:10px; padding-left:10px; padding-right:10px;">INVESTORS</th>

          <th style="width:40%; padding-bottom:10px; padding-left:10px; padding-right:10px;">POPULARITY</th>
          <th style="width:40%; padding-bottom:10px; padding-left:10px; padding-right:10px;">COUNTDOWN</th>
        </tr>
      </thead>
      <tbody>
<?php
  $song_get_query = "SELECT `SONG_ID`,`RDON_ID`,`SONG_GENRE`,`ARTIST_NAME`,`ALBUM_NAME`,`USER_NAME`,`SONG_NAME`,`WANT_INVESTOR`,`INVEST_RADIO`,(SELECT COUNT(*) FROM `song_like` WHERE `SONG_ID`=`song`.`SONG_ID` AND `SONG_LIKE_STATUS`=1) as prevote,(SELECT COUNT(*) FROM `song_like` WHERE `SONG_ID`=`song`.`SONG_ID` AND `SONG_LIKE_STATUS`=0) as unlike, (SELECT COUNT(`invest_on_song`.`ID`) FROM `invest_on_song` WHERE `SONG_ID`=`song`.`SONG_ID`) AS INVEST,(SELECT COUNT(`SONG_LOVE_ID`) FROM `song_love` WHERE `SONG_ID`=`song`.`SONG_ID`) AS LOVE,(SELECT COUNT(*) FROM `song_share` WHERE `SONG_ID`= `song`.`SONG_ID`) AS SHARE,TIMESTAMPDIFF(MINUTE,`SONG_SUBMIT_DATE`,UTC_TIMESTAMP()) AS total_min FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='$genre'";

  $result = $con->query($song_get_query);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $SONG_ID = $row['SONG_ID'];
      $RDON_ID = $row['RDON_ID'];
      $SONG_GENRE = $row['SONG_GENRE'];
      $USER_NAME = $row['USER_NAME'];
      $SONG_NAME = $row['SONG_NAME'];
      $ALBUM_NAME = $row['ALBUM_NAME'];
      $WANT_INVESTOR = $row['WANT_INVESTOR'];
      $INVEST_RADIO = $row['INVEST_RADIO'];
      $total_min = $row['total_min'];
      $prevote = $row['prevote'];
      $unlike = $row['unlike'];
      $INVEST = $row['INVEST'];
      $LOVE = $row['LOVE'];
      $SHARE = $row['SHARE'];
      $available_min = 1440 - $total_min;
      $m = $available_min;

      // It passed the 24 hours countdown
      if ($available_min <= 0) {
        // Gets the music and artwork path in slbackups_mlicqx83sq/Music
        $music_source = get_music_source($RDON_ID, 0);
        $art_work = get_art_work($RDON_ID, 0);

        $con->query("DELETE FROM `song_like` WHERE `SONG_ID`=$SONG_ID");
        $con->query("DELETE FROM `song_love` WHERE `SONG_ID`=$SONG_ID");
        $con->query("DELETE FROM `song_share` WHERE `SONG_ID`=$SONG_ID");

        if ($unlike > $prevote) {
          // Delete mp3 and artwork if there are more unlikes than likes
          $con->query("UPDATE `song` SET `SONG_STATUS`=2 WHERE `SONG_ID`=$SONG_ID");
        } else {
          // Music passed, move mp3 and artwork to music/$SONG_ID
          $con->query("UPDATE `song` SET `SONG_STATUS`=1 WHERE `SONG_ID`=$SONG_ID");
          mkdir("music/$RDON_ID");

          $music_basename = basename($music_source);
          $music_stream_path = "music/$RDON_ID/$music_basename";
          $img_ext = pathinfo($art_work, PATHINFO_EXTENSION);
          // Set artwork's filename to cover for SHOUTcast
          $img_stream_path = "music/$RDON_ID/cover.$img_ext";

          rename($music_source, $music_stream_path);
          rename($art_work, $img_stream_path);
        }

        continue;
      }

      $extraIntH = intval($m / 60);
      $extraIntHs = ($m / 60);          // float value
      $whole = floor($extraIntHs);      //  return int value 1
      $fraction = $extraIntHs - $whole; // Total - int = . decimal value
      $extraIntHss = ($fraction * 60);
      $TotalHoursAndMinutesString = sprintf('%02d', $extraIntH) . ':' . sprintf('%02d', round($extraIntHss)) . ' Hrs';

      $audio_link = get_music_source($RDON_ID, 0); // "slbackups_mlicqx83sq/Music/$SONG_ID.mp3";
      $img_link = get_art_work($RDON_ID, 0);       // "slbackups_mlicqx83sq/Music/$SONG_ID.jpg";

      $investor_section = '';
      $query_add = $con->query("SELECT COUNT(*) as `is_sp` FROM `invest_on_song` WHERE `USER_NAME`='$slusername' AND `SONG_ID`=$SONG_ID");

      $is_sp = $query_add->fetch_object()->is_sp;
      $want_inv = 1;

      if ($WANT_INVESTOR == 0) {
        $investor_section = 'hide';
        $want_inv = 0;
      }

      // if ($is_sp == 0) {
      // } else {
      //   $want_inv=0;
      // }

      $query_add = $con->query("SELECT COUNT(*) AS `songrow` FROM `song_purchase` WHERE `SONG_ID`=$SONG_ID AND `SONG_PURCHASE_USERNAME`='$slusername'");
      $isSongAvi = $query_add->fetch_object()->songrow;
      $purchase_btn = '';
      $have_download = 0;

      if ($isSongAvi < 1) {
        $purchase_btn='<button class="btn btn-default" onClick="notyConfirm()"><i class="fas fa-download"></i> BUY NOW</button>';
      } else {
        $have_download = 1;
  			$purchase_btn = '<button class="btn btn-default" onClick="purches_song()"><i class="fas fa-download"></i> DOWNLOAD</button>';
      }

      $total_ration_positive = $LOVE + $SHARE + $prevote;
      $signature_count_positive = (int) ($total_ration_positive / 5);
      $signature_count_positive = $signature_count_positive > 19 ? 20 : 1;

      $positive_Rating = '';
      for ($i=0; $i < $signature_count_positive; $i++) $positive_Rating .= '|';

      $unlike_tmp = (int) $unlike / 5;
      $unlike_tmp = $unlike > 19 ? 20 : 1;

      $unlike_txt = '';
      for ($j=0; $j < $unlike_tmp; $j++) $unlike_txt .= '|';

      $popularity='<font color="#dc5534">' . $positive_Rating . '</font>-<font color="#27ae60">' . $unlike_txt . '</font>';
      $rparcentage_query = "SELECT IFNULL(SUM(INVESTER_PERSENT),0) AS INVEST_PERCENTAGE FROM `invest_on_song` WHERE `SONG_ID`=$SONG_ID";
      $parcentage_count = $con->query($rparcentage_query);
      $total_percantage = $parcentage_count->fetch_object()->INVEST_PERCENTAGE;
      $potential_usd = 0;
      $sponsore_payable_usd = 0;

?>
        <tr>
          <td align="center" style="padding-top:5px; padding-left:10px; padding-right:10px; padding-bottom:5px; border-bottom:1px solid #dddddd; width:3%;"><a class="btn btn-default btn-condensed" onclick="information_pass('<?php echo $SONG_ID;?>','<?php echo $RDON_ID; ?>','<?php echo $USER_NAME;?>','<?php echo addslashes($SONG_NAME);?>','<?php echo addslashes($ALBUM_NAME);?>','<?php echo $INVEST;?>','<?php echo $potential_usd;?>','<?php echo $want_inv;?>','<?php echo $have_download;?>','<?php echo $total_percantage;?>','<?php echo $sponsore_payable_usd;?>','<?php echo $audio_link; ?>','<?php echo $img_link;?>')"><i class="fas fa-play-circle fa-lg" name="" id="play_icon_<?php echo $SONG_ID;?>"></i></a></td>
          <td style="padding-top:5px; width:30%; padding-left:10px; padding-right:10px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?php echo $SONG_NAME;?></td>
          <td style="padding-top:5px; width:30%; padding-left:10px; padding-right:10px; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?php echo $USER_NAME;?></td>
          <td style="padding-top:5px; padding-left:10px; padding-right:10px; width:15%; padding-bottom:5px; border-bottom: 1px solid #dddddd;"><?php echo $prevote;?></td>
          <td style="padding-top:5px; padding-left:10px; padding-right:10px;width:auto; padding-bottom:5px; border-bottom: 1px solid #dddddd; padding-left:10px; padding-right:10px;"><?php echo $unlike;?></td>
          <td style="padding-top:5px; padding-left:10px; padding-right:10px;width:auto; padding-bottom:5px; border-bottom: 1px solid #dddddd; padding-left:10px; padding-right:10px;"><?php echo $LOVE;?></td>
          <td style="padding-top:5px; padding-left:10px; padding-right:10px; width:auto; padding-bottom:5px; border-bottom: 1px solid #dddddd; padding-left:10px; padding-right:10px;"><?php echo $INVEST;?></td>

          <td style="padding-top:5px; padding-left:10px; padding-right:10px; width:40%; padding-bottom:5px; border-bottom: 1px solid #dddddd; padding-left:10px; padding-right:10px;"><?php echo $popularity;?></td>
          <td style="padding-top:5px; padding-left:10px; padding-right:10px; width:40%; padding-bottom:5px; border-bottom: 1px solid #dddddd; padding-left:10px; padding-right:10px;"><?php echo $TotalHoursAndMinutesString;?></td>
        </tr>
<?php
    }
  }
?>
      </tbody>
    </table>
  </div>
</div>
<?php
}
?>
