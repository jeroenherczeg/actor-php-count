<?php

require './vendor/autoload.php';

$url = 'https://api.apify.com/v2/key-value-stores/' . $_ENV['APIFY_DEFAULT_KEY_VALUE_STORE_ID'] . '/records/' . $_ENV['APIFY_INPUT_KEY'];

$client = new GuzzleHttp\Client();
$res = $client->request('GET', $url);
echo $res->getStatusCode();
// "200"
echo $res->getHeader('content-type')[0];
// 'application/json; charset=utf8'
echo $res->getBody();
//$url = 'https://api.github.com/repos/doctrine/instantiator/zipball/f350df0268e904597e3bd9c4685c53e0e333feea';
//$file = 'tmp.zip';
//$path = '/tmp/code';
//
//file_put_contents($file, file_get_contents($url));
//
//
//$zip = new ZipArchive;
//$res = $zip->open($file);
//if ($res === TRUE) {
//    // extract it to the path we determined above
//    $zip->extractTo($path);
//    $zip->close();
//    var_dump(scandir($path));
//} else {
//    echo "Doh! I couldn't open $file";
//}