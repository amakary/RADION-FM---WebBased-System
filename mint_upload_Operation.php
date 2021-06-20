<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '/slpw/sitelokpw.php';
require_once '/slpw/slconfig.php';

require_once '/getID3/getid3/getid3.php';
require_once '/getID3/getid3/write.php';

date_default_timezone_set('US/Eastern');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $in_title = isset($_POST['title']) ? $_POST['title'] : '';
  $in_artist = isset($_POST['artist']) ? $_POST['artist'] : '';
  $in_genre = isset($_POST['genre']) ? $_POST['genre'] : '';
  $in_copyright = isset($_POST['copyright']) ? $_POST['copyright'] : '';
  $edition_id = isset($_POST['edition_id']) ? $_POST['edition_id'] : '';

  $title = $con->real_escape_string($in_title);
  $artist = $con->real_escape_string($in_artist);
  $genre = $con->real_escape_string($in_genre);
  $copyright = $con->real_escape_string($in_copyright);

  // Validation
  preg_match('/^tz[1-3]([a-z0-9]{33})$/i', $slcustom6, $matches);
  if (!isset($matches[1])) {
    http_response_code(400);
    die('Invalid tz address');
  }

  if (isset($_SESSION) && isset($_SESSION['ses_sluserid'])) {
    // uses gmdate() (timezone+00:00) when inserting a song to the database
    $date = gmdate('Y-m-d H:i:s');
    $year = gmdate('Y');
    $nid_res = $con->query("SELECT `NUMBER_ID` FROM `song` WHERE `YEAR`=$year AND `COUNTRY_CODE`='$slcustom1' ORDER BY `SONG_ID` DESC");
    $number_id = $nid_res->num_rows > 0 ? (int) $nid_res->fetch_object()->NUMBER_ID : -1;
    $number_id = (string) $number_id + 1;
    while (strlen($number_id) < 5) $number_id = "0$number_id";
    $rdon_id = $slcustom1 . 'RADION' . substr($year, -2) . $number_id;
    $insert_query = "INSERT INTO `song` (`COUNTRY_CODE`,`RDON_ID`,`NUMBER_ID`,`USER_NAME`,`SONG_NAME`,`SONG_GENRE`,`ARTIST_NAME`,`ALBUM_NAME`,`YEAR`,`RECORD_LABEL`,`COPYRIGHT`,`SONG_SUBMIT_DATE`,`EDITION_ID`) VALUES ('$slcustom1','$rdon_id','$number_id','$slusername','$title','$genre','$artist','',$year,'','$copyright','$date',$edition_id)";

    if ($con->query($insert_query)) {
      $last_inserted_id = $con->insert_id;
      $mp3moved = false;
      $imgmoved = false;
      $imgpath = '';
      $imgext = '';

      $folderpath = 'NFTMusic';
      $mp3ext = pathinfo($_POST['mp3'], PATHINFO_EXTENSION);

      if (isset($_FILES['artwork'])) {
        // Move uploaded artwork file if it was set
        $imginfo = pathinfo($_FILES['artwork']['name']);
        $imgext = $imginfo['extension'];
        $imgpath = "$folderpath/$rdon_id.$imgext";
        $imgmoved = move_uploaded_file($_FILES['artwork']['tmp_name'], $imgpath);
      } else $imgmoved = true;

      // Move uploaded mp3 file to slbackups_mlicqx83sq/Music and wait for votes
      $mp3path = "$folderpath/$rdon_id.$mp3ext";
      $mp3moved = rename('uploads/' . $_POST['mp3'], $mp3path);

      // make sure MP3 and artwork was moved
      if ($mp3moved && $imgmoved) {
        header('Content-Type: application/json');
        $result = json_encode([
          'id' => $rdon_id,
          'hash' => md5("asset-preview-$rdon_id")
        ]);

        die($result);
      } else {
        $con->query("DELETE FROM `song` WHERE `SONG_ID`=$last_inserted_id");
        echo 'error5';
      }
    } else echo 'error2: ' . $con->error;
  } else echo 'error3';
} else echo 'error4';

?>
