<?php
echo 1;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$auth = base64_encode('ipg_2014087:gPjMCPv6');//For authentication proxy*/
$aContext = array(
    'http' => array(
        'proxy' => 'tcp://192.168.1.107:3128',
        'request_fulluri' => true,
        'header' => "Proxy-Authorization: Basic $auth",
    ),
);


$cxContext = stream_context_create($aContext);

$n = "test.jpg";
//$st = file_get_contents("http://scontent.xx.fbcdn.net/v/t1.0-1/15193513_1873452049553640_4999736022788902829_n.jpg?oh=4f75b2ceb2c07da455cc4b5c03b12997&oe=58FE2E88");

//file_put_contents($n, $st);	
//$bg = imagecreatefromjpeg($n);

$bg = imagecreatefromjpeg($n);
$img = imagecreatefrompng('img1.png');
header('Content-Type: image/jpeg');
//imagejpeg($img);

//imagepng($img);
$size=getimagesize($n);
//imagecopymerge( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img), 100);
imagecopy( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img));

imagejpeg($bg, "final.jpg");


?>