<?php

$url = 'https://api.github.com/repos/doctrine/instantiator/zipball/f350df0268e904597e3bd9c4685c53e0e333feea';
$file = 'tmp.zip';
$path = '/tmp/code';

file_put_contents($file, file_get_contents($url));


$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
    // extract it to the path we determined above
    $zip->extractTo($path);
    $zip->close();
    var_dump(scandir($path));
} else {
    echo "Doh! I couldn't open $file";
}