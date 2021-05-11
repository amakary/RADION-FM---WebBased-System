<?php

require_once '/slpw/sitelokpw.php';

$title = $con->real_escape_string($_POST['title']);
$website = $con->real_escape_string($_POST['website']);
$message = $con->real_escape_string($_POST['message']);
$dashboard = $_POST['dashboard'];
$home = $_POST['home'];
$home_image = $_POST['home-image'];
$audio = $_POST['audio'];
$audio_val = $_POST['audio-value'];
$radio_cost = $_POST['total-cost'];
$impressions = $_POST['impressions'];

$date1 = $_POST['date1'];
$date = new DateTime($date1);
$date1 = $date->format('Y-m-d');

$date2 = $_POST['date2'];
$date = new DateTime($date2);
$date2 = $date->format('Y-m-d');

$time_begin = $_POST['time-begin'];
$date = new DateTime($time_begin);
$time_begin = $date->format('H:i:s');

$time_ends = $_POST['time-ends'];
$date = new DateTime($time_ends);
$time_ends = $date->format('H:i:s');

$sql = "INSERT INTO `express_ads` (`Username`,`express_ads_title`,`express_ads_website`,`express_ads_message`,`express_ads_dashboard`,`express_ads_home_page`,`express_ads_main_home_page`,`express_ads_audio_commercial`,`express_ads_audio_commercial_val`,`express_ads_date1`,`express_ads_date2`,`express_ads_time_begin`,`express_ads_time_ends`,`express_ads_p_impress`) VALUES ('$slusername','$title','$website','$message',$dashboard,$home,$home_image,$audio,1,'$date1','$date2','$time_begin','$time_ends',$impressions)";

$result = $con->query($sql);
$last_inserted_id = $con->insert_id;

if (isset($_FILES['image-file'])) {
  $target_dir = "ad_images/$last_inserted_id";

  if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
  else array_map('unlink', glob("$target_dir/*"));

  $filename = $_FILES['image-file']['name'];
  $tmpname = $_FILES['image-file']['tmp_name'];
  $target_file = "$target_dir/$filename";

  if (move_uploaded_file($tmpname, $target_file)) {}
}

if ($result) echo 'Complete';
else echo 'Not complete: ' . $con->error;

?>
