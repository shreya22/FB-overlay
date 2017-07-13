<?php
	
	// $f = array_keys($_POST) ;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// reconstructing the image url
	$url = $_POST['url'];
	$oh=$_POST['oe'];
	$s = $s.$url."&oe=".$oh;
	
// extracting image id and assign to $n
	$name = $_POST['id'];
	$n = $name.'.jpg';

	$st = file_get_contents($s);  //read file contents and save in $st

	file_put_contents($n, $st);  //$st will be written to $n
	list($width, $height) = getimagesize($n);

	$source = imagecreatefromjpeg($n); //image identifier from given url
	$n1=imagecreatetruecolor(320, 320); //create new blank image
	imagecopyresized($n1,$source,0,0,0,0,320,320,$width,$height); 
	imagejpeg($n1,$n);
	$bg = imagecreatefromjpeg($n);
	$img = imagecreatefrompng('iswi-badge.png');
	header('Content-Type: image/jpeg');
	imagejpeg($img);

	imagepng($img);
	$size=getimagesize($n);
	imagecopy( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img));

	imagejpeg($bg, $n);
	echo $s;

?>

