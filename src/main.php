<?php

namespace App;

use GuzzleHttp\Client;
use Symfony\Component\Finder\Finder;

require 'vendor/autoload.php';

$url = 'https://api.apify.com/v2/key-value-stores/' . $_ENV['APIFY_DEFAULT_KEY_VALUE_STORE_ID'] . '/records/' . $_ENV['APIFY_INPUT_KEY'];
$client = new Client();
$response = $client->request('GET', $url);
$content = (string) $response->getBody();
$content = json_decode($content);
var_dump($content);


$url = 'https://api.github.com/repos/doctrine/instantiator/zipball/f350df0268e904597e3bd9c4685c53e0e333feea';
$file = 'tmp.zip';
$path = '/';

$client->request('GET', $content['repo'], ['sink' => $path . $file]);

//file_put_contents($file, file_get_contents($url));

$zip = new \ZipArchive;
$res = $zip->open($path . $file);
if ($res === TRUE) {
//    // extract it to the path we determined above
    $zip->extractTo('/tmp/code');
    $zip->close();
    var_dump(scandir('/tmp/code'));
    $finder = new Finder();
// find all files in the current directory
    $finder->files()->in('/tmp/code')->name('*.php');
    var_dump(count($finder));
} else {
    echo "Doh! I couldn't open $file";
}
