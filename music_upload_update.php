<?php

$groupswithaccess = 'RADIONER,CEO,FOUNDER';

require_once '/slpw/sitelokpw.php';
require_once '/getID3/getid3/getid3.php';
require_once '/getID3/getid3/write.php';
require_once '/php/music_info_get.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = isset($_POST['id']) ? $_POST['id'] : null;
  $token_id = isset($_POST['token_id']) ? $_POST['token_id'] : null;
  $cid = isset($_POST['cid']) ? $_POST['cid'] : null;
  $hash = isset($_POST['hash']) ? $_POST['hash'] : null;

  $verify = "SELECT * FROM `song` WHERE `USER_NAME`='$slusername' AND `RDON_ID`='$id'";
  $res = $con->query($verify);
  if ($res->num_rows === 0) {
    http_response_code(400);
    die('Song does not exist.');
  }

  $source = get_music_source($id, 0, true);
  $getid3 = new getID3;
  $mp3info = $getid3->analyze($source);
  $pic = $mp3info['comments']['picture'][0];
  $tag_data = $mp3info['tags']['id3v2'];
  $tag_data['text'] = array([
    'description' => 'mint hash',
    'data' => $hash
  ]);

  $tag_data['attached_picture'] = array([
    'data' => $pic['data'],
    'picturetypeid' => '3',
    'description' => 'artwork',
    'mime' => $pic['image_mime']
  ]);

  $tagwriter = new getid3_writetags;
  $tagwriter->filename = $source;
  $tagwriter->tagformats = ['id3v1', 'id3v2.3'];
  $tagwriter->tag_encoding = 'UTF-8';
  $tagwriter->remove_other_tags = true;
  $tagwriter->tag_data = $tag_data;

  echo $tagwriter->WriteTags() ? $hash : $tagwriter->errors;
  $con->query("UPDATE `song` SET `TOKEN_ID`=$token_id, `NFT`='$hash', `IPFS_CID`='$cid' WHERE `RDON_ID`='$id'");
} else {
  http_response_code(405);
  die('Unsupported method');
}

?>
