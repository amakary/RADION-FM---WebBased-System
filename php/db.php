<?php

if (session_status() === PHP_SESSION_NONE) session_start();

$json_data = file_get_contents(__DIR__ . '/../credentials.json');
$mysql = json_decode($json_data);

$DbHost = $mysql->hostname;
$DbName = $mysql->database;
$DbUser = $mysql->username;
$DbPassword = $mysql->password;

$con = mysqli_connect($DbHost, $DbUser, $DbPassword, $DbName);
if (mysqli_connect_errno($con)) {
  die('Failed to connect to MySQL: ' . $con->connect_error);
}

?>
