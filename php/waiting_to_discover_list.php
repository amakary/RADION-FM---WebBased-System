<?php

session_start();
error_reporting(0);

require_once 'db.php';

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE` REGEXP '^(Rock|Pop|Country|Hip Hop / R&B|Latin|DJ Mix|RAP|Talk Shows)$'";
$result = $con->query($query);
$TOTAL_WAIT = $result->fetch_object()->TOTAL_WAIT;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_ROCK FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Rock'";
$result = $con->query($query);
$TOTAL_WAIT_ROCK = $result->fetch_object()->TOTAL_WAIT_ROCK;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_POP FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Pop'";
$result = $con->query($query);
$TOTAL_WAIT_POP = $result->fetch_object()->TOTAL_WAIT_POP;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_COUNTRY FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Country'";
$result = $con->query($query);
$TOTAL_WAIT_COUNTRY = $result->fetch_object()->TOTAL_WAIT_COUNTRY;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_HIPHOP FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Hip Hop / R&B'";
$result = $con->query($query);
$TOTAL_WAIT_HIPHOP = $result->fetch_object()->TOTAL_WAIT_HIPHOP;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_LATIN FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Latin'";
$result = $con->query($query);
$TOTAL_WAIT_LATIN = $result->fetch_object()->TOTAL_WAIT_LATIN;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_DJMIX FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='DJ Mix'";
$result = $con->query($query);
$TOTAL_WAIT_DJMIX = $result->fetch_object()->TOTAL_WAIT_DJMIX;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_RAP FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='RAP'";
$result = $con->query($query);
$TOTAL_WAIT_RAP = $result->fetch_object()->TOTAL_WAIT_RAP;

$query = "SELECT COUNT(`SONG_ID`) AS TOTAL_WAIT_TALK_SHOW FROM `song` WHERE `SONG_STATUS`=0 AND `SONG_GENRE`='Talk Shows'";
$result = $con->query($query);
$TOTAL_WAIT_TALK_SHOW = $result->fetch_object()->TOTAL_WAIT_TALK_SHOW;

$list = json_encode([
  'total' => $TOTAL_WAIT,
  'hiphop' => $TOTAL_WAIT_HIPHOP,
  'rock' => $TOTAL_WAIT_ROCK,
  'country' => $TOTAL_WAIT_COUNTRY,
  'pop' => $TOTAL_WAIT_POP,
  'rap' => $TOTAL_WAIT_RAP,
  'djmix' => $TOTAL_WAIT_DJMIX,
  'latin' => $TOTAL_WAIT_LATIN,
  'talkshow' => $TOTAL_WAIT_TALK_SHOW
]);

header('Content-Type: application/json');
echo $list;

?>
