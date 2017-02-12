
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "fs";
$auth = base64_encode('ipg_2014087:gPjMCPv6');//For authentication proxy*/
$aContext = array(
    'http' => array(
        'proxy' => 'tcp://192.168.1.107:3128',
        'request_fulluri' => true,
        'header' => "Proxy-Authorization: Basic $auth",
    ),
);


$f = array_keys($_POST) ;$url = $_POST['url'];
$oh=$_POST['oe'];
//$gda=$_POST['__gda__'];
$s = $s.$url."&oe=".$oh;//"&__gda__=".$gda;
$name = $_POST['id'];


$s =  substr($s,8);



if (file_exists("upload.jpg"))
{unlink("upload.jpg");}
$n = $name.'3.jpg';
$s = "http://".$s;
echo $s;
$st = file_get_contents($s);

file_put_contents($n, $st);
$bg = imagecreatefromjpeg($n);
$img = imagecreatefrompng('img3.png');
header('Content-Type: image/jpeg');
imagejpeg($img);

imagepng($img);
$size=getimagesize($n);
//imagecopymerge( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img), 100);
imagecopy( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img));

imagejpeg($bg, $n);
echo $s;

?>

