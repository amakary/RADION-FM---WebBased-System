<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$groupswithaccess = 'RADIONER,CEO,FOUNDER';
require_once '../slpw/sitelokpw.php';
require_once '../TCPDF/radion_config.php';
require_once '../TCPDF/tcpdf.php';
require_once './utils.php';

$hash = isset($_GET['hash']) ? $_GET['hash'] : null;
if ($hash === null) {
  http_response_code(400);
  header('Content-Type: text/plain');
  die('Hash is not defined');
}

class RADIONPDF extends TCPDF {
  public function Footer () {
    global $hash;

    $this->SetFont('arial', 'I', 8);
    $this->SetY(-15);

    $page = $this->getAliasNumPage();
    $all_pages = $this->getAliasNbPages();
    $this->MultiCell(102.5, 0, $hash, 0, 'L', 0, 0, '', '', true);
    $this->MultiCell(0, 0, "Page $page/$all_pages", 0, 'R', 0, 1, '', '', true);
  }
}

$tzstats = 'https://api.tzstats.com';
$hash_details = get_json("$tzstats/explorer/op/$hash");
$buy_details = null;
$token_details = null;
$contract_details = null;

foreach ($hash_details as $detail) {
  if ($detail->data === 'buy') {
    $buy_details = $detail;
    break;
  }
}

$token_id = (int) $buy_details->parameters->value->buy->sale_token->token_for_sale_token_id;
$contract_address = $buy_details->parameters->value->buy->sale_token->token_for_sale_address;
$producer_address = $buy_details->parameters->value->buy->seller;
$artist_address = $buy_details->sender;
$contract_details = get_json("$tzstats/explorer/contract/$contract_address/storage");
$max_per_run = (int) $contract_details->value->max_editions_per_run;
$bigmap_editions_id = $contract_details->bigmaps->editions_metadata;
$bigmap_editions = get_json("$tzstats/explorer/bigmap/$bigmap_editions_id/values");
$edition_id = floor($token_id / $max_per_run);
$token_details = $bigmap_editions[$edition_id]->value->edition_info;
$license = hex2bin($token_details->legal_contract_type);
$asset_id = hex2bin($token_details->asset_id);
$date_time = strtotime($buy_details->time);
$mint_time = strtotime(hex2bin($token_details->date));
$asset_id = $con->real_escape_string($asset_id);
$asset_res = $con->query("SELECT * FROM `song` WHERE `RDON_ID`='$asset_id'");
$asset = $asset_res->fetch_object();
$song_name = $asset->SONG_NAME;
$producer_username = $asset->USER_NAME;
$producer_res = $con->query("SELECT * FROM `sitelok` WHERE `Username`='$producer_username'");
$producer = $producer_res->fetch_object()->Name;
$buyer_res = $con->query("SELECT * FROM `contracts` WHERE `hash`='$hash'");
$artist = $buyer_res->num_rows > 0 ? $buyer_res->fetch_object()->buyer : $slname;
$date_bought = gmdate('Y-m-d H:i:s', $date_time);
$mint_date = gmdate('Y-m-d H:i:s', $mint_time);
$licensee_ip = $_SERVER['REMOTE_ADDR'];

$codes = file_get_contents("../contracts/$license.html");
$codes = preg_replace(
  ['/ {2,}/', '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'],
  [' ', ''],
  $codes
);

$temp_names = [
  '/%TRANSACTION_HASH%/',
  '/%TOKEN_ID%/',
  '/%KT1_ADDRESS%/',
  '/%PRODUCER%/',
  '/%ARTIST%/',
  '/%PRODUCER_SIGN%/',
  '/%ARTIST_SIGN%/',
  '/%PRODUCER_TZ1%/',
  '/%ARTIST_TZ1%/',
  '/%DATE_BOUGHT%/',
  '/%DATE_SOLD%/',
  '/%SONG_NAME%/',
  '/%ARTIST_IP%/'
];

$replace_names = [
  $hash,
  $token_id,
  $contract_address,
  $producer,
  $artist,
  urlencode($producer),
  urlencode($artist),
  $producer_address,
  $artist_address,
  $date_bought,
  $mint_date,
  $song_name,
  $licensee_ip
];

$codes = preg_replace($temp_names, $replace_names, $codes);
$pdf = new RADIONPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$title = '';

switch ($license) {
  case 'basic':
    $title = 'Basic Lease License Agreement';
    break;

  case 'youtube':
    $title = 'YouTube Lease License Agreement';
    break;

  case 'trackout':
    $title = 'Trackout Lease License Agreement';
    break;

  case 'premium':
    $title = 'Premium Lease License Agreement';
    break;

  case 'exclusive':
    $title = 'Exclusive Rights License Agreement';
    break;
}

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(PDF_AUTHOR);
$pdf->SetTitle($title);
$pdf->SetSubject('License Agreement');

$pdf->setPrintHeader(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('arial', '', 10);
$pdf->AddPage();
$pdf->writeHTML($codes, true, false, true, false, '');

header('Content-Type: application/pdf');
$pdf->Output('contract.pdf', 'I');

$hash_exists = $con->query("SELECT * FROM `contracts` WHERE `hash`='$hash'")->num_rows === 0;
if ($hash_exists) {
  $con->query("INSERT INTO `contracts` (`edition_id`, `hash`, `license`, `producer`, `buyer`, `date`) VALUES ($edition_id, '$hash', '$license', '$producer_username', '$artist', '$date_bought')");
}

?>
