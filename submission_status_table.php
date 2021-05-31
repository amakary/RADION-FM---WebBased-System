<?php

$groupswithaccess="RADIONER,CEO,FOUNDER";

require_once 'slpw/sitelokpw.php';
require_once 'slpw/slconfig.php';

require_once 'php/music_info_get.php';

date_default_timezone_set('US/Eastern');
function formatDateAgo($value) {
  $time = strtotime($value);
  $d = new \DateTime($value);

  $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  $months = ['January', 'February', 'March', 'April',' May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  if ($time > strtotime('-2 minutes')) {
    return 'few second ago';
  } elseif ($time > strtotime('-30 minutes')) {
    return  floor((strtotime('now') - $time)/60) . ' min, '.'Today ';
  } elseif ($time > strtotime('today')) {
    return $d->format('G:i');
  } elseif ($time > strtotime('yesterday')) {
    return $d->format('G:i').', Yesterday';
  } elseif ($time > strtotime('this week')) {
    return $d->format('G:i').', '.$weekDays[$d->format('N') - 1];
  } else {
    return $d->format('G:i').', '.$d->format('j') . ' ' . $months[$d->format('n') - 1];
  }
}

$song_query = "SELECT `SONG_ID` AS ID,`RDON_ID`,`SONG_NAME`,`SONG_SUBMIT_DATE`,`SONG_STATUS` FROM `song` WHERE `EDITION_ID`=-1 AND `USER_NAME`='$slusername' AND TIMESTAMPDIFF(MINUTE,`SONG_SUBMIT_DATE`,UTC_TIMESTAMP()) < 4320 GROUP BY `SONG_ID` DESC";
$result = mysqli_query($con,$song_query);

if ($result->num_rows > 0) {
  while ($row1 = $result->fetch_assoc()) {
    $img_src = '';
    $SONG_ID = $row1['ID'];
    $RDON_ID = $row1['RDON_ID'];
    $SONG_NAME = $row1['SONG_NAME'];
    $SONG_SUBMIT_DATE = $row1['SONG_SUBMIT_DATE'];
    $SONG_STATUS = $row1['SONG_STATUS'];

    $status_color="";
    $status_icon="";
    $status_online="";

    if ($SONG_STATUS == 0) {
      $status_color = '#F39C12';
      $status_icon = 'fa-exclamation-circle';
      $status_online = 'away';
      $img_src = get_art_work($RDON_ID, 0);
    } else if ($SONG_STATUS == 1) {
      $status_color = '#229954';
      $status_icon = 'fa-check-circle';
      $img_src = get_art_work($RDON_ID, 1);
      $status_online = 'online';
    } else {
      $img_src = get_art_work($RDON_ID, 0);
      $status_color = '#C0392B';
      $status_icon = 'fa-times-circle';
      $status_online = 'offline';
    }
?>

<a href="#" class="list-group-item">
  <div class="list-group-status status-<?php echo $status_online;?>"></div>
  <img src="<?php echo $img_src;?>" class="pull-left" alt=""/>
  <span class="contacts-title"><?php echo $SONG_NAME;?></span>
  <p><span class="text-muted"><i class="fas fa-clock"></i> <?php print formatDateAgo($SONG_SUBMIT_DATE);?></span></p>
  <div class="list-group-controls">
    <div><span class="far <?php echo $status_icon;?> fa-lg" style="margin-top:5px; color:<?php echo $status_color;?>"></span></div>
  </div>
</a>

<?php
  }
}

?>
