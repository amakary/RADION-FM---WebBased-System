<?php

$myfile = fopen("json_obj.txt", "r") or die("Unable to open file!");
$t = json_decode(file_get_contents('json_obj.txt', true));
fclose($myfile);

$sch = $t->{'Schedule'};

$hours = (int) date("H");
$minutes = (int) date("i");
$day = (int) date('N');


for ($i = 0; $i < count($sch); $i++) {
	if ($sch[$i]->{'Day'} === $day) {
		$daySch = $sch[$i]->{'Program'};
	}
}

$c = [];
for ($j = 0; $j < count($daySch); $j++) {
	$str = explode(':', $daySch[$j]->{'Time'});
	$h = (int) $str[0];
	$m = (int) $str[1];
	if ((($hours === $h) && ($minutes > $m)) || ($hours > $h)) {
		array_push($c, $daySch[$j]);
	} 
}

$currentProgram = $c[0];
$currentProgramTime = $c[0]->{'Time'};
$str = explode(':', $currentProgramTime);
$h = (int) $str[0];
$m = (int) $str[1];

for ($i = 0; $i < count($c); $i++) {
	$strc = explode(':', $c[$i]->{'Time'});
	$hc = (int) $strc[0];
	$mc = (int) $strc[1];
	if ((($hc === $h) && ($mc > $m)) || ($hc > $h)) {
		$currentProgram = $c[$i];
		$currentProgramTime = $c[$i]->{'Time'};
		$str = explode(':', $currentProgramTime);
		$h = (int) $str[0];
		$m = (int) $str[1];
	} 

}

$title = $currentProgram->{'Name'};	
$subtitle = $currentProgram->{'Subtitle'};	
$burl;
($currentProgram->{'Url'} === '') ? $burl = "img/radion.jpg" : $burl = $currentProgram->{'Url'};

echo json_encode([
		"title" => $title,
		"subtitle" => $subtitle,
		"url" => $burl
	]);

