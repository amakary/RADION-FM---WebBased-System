<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$bg_transparent = isset($_GET['transparent-bg']);
$font_size = isset($_GET['font-size']) ? (int) $_GET['font-size'] : 20;
$text = isset($_GET['text']) ? $_GET['text'] : 'RADION FM';

$img_width = 300;
$img_height = 100;
$img = imagecreatetruecolor($img_width, $img_height);
$bg_color = 0;
$font = __DIR__ . '/fonts/signature.otf';

if ($bg_transparent) {
  imagesavealpha($img, true);
  $bg_color = imagecolorexactalpha($img, 0, 0, 0, 127);
} else {
  $bg_color = imagecolorexact($img, 255, 255, 255);
}

imagefill($img, 0, 0, $bg_color);
$text_box = imagettfbbox($font_size, 0, $font, $text);
$text_width = $text_box[2] - $text_box[0];
$text_height = $text_box[7] - $text_box[1];
$text_x = ($img_width / 2) - ($text_width / 2);
$text_y = ($img_height / 2) - ($text_height / 2);
$text_color = imagecolorexact($img, 0, 0, 0);
imagettftext($img, $font_size, 0, $text_x, $text_y, $text_color, $font, $text);
// imagepng($img, $filename);

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);

?>
