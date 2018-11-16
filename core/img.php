<?php
session_start();

$name = $_SESSION['login'];

if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")) {
    $name = $_SESSION['login'];
} 

$mark = $_GET['mark'];

if ($mark == 0) {
	$code = 2;
} elseif ($mark == 1) {
	$code = 3;
} elseif ($mark == 2) {
	$code = 4;
} elseif ($mark == 3) {
	$code = 5;	
}
//код генерации картинки

//echo $code;

$image = imagecreatetruecolor(410, 315);

//RGB
$backColor = imagecolorallocate($image, random_int(1, 255), random_int(1, 255), 221);
$textColor = imagecolorallocate($image, 0, random_int(1, 255), random_int(1, 255));

$boxFile = '../resourses/img/captcha.png';

if (!file_exists($boxFile)) {
 	echo 'Файл с картинкой не найден';
 	exit;
}
$imBox = imagecreatefrompng($boxFile);

imagefill($image, 0, 0, $backColor) ;
imagecopy($image, $imBox, -50, -100, 0, 0, 556, 556);

$fontFile = '../resourses/fonts/font.ttf';
if (!file_exists($fontFile)) {
	echo 'Файл со шрифтом не найден';
	exit;
}

imagettftext($image, 90, 25, 120, 180, $textColor, $fontFile, $name);
imagettftext($image, 90, 25, 220, 260, $textColor, $fontFile, $code);
header('Content-Type: image/png');

imagepng($image); //после этой строки в браузер уходит картинка
// не имеет никакого значения чо происходит тут
imagedestroy($image);
?>