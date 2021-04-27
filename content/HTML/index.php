<?php
ob_start();
function showLink($direct, $typeFile)
{
    foreach (glob($direct . $typeFile) as $filename) {
        echo "$filename размер " . filesize($filename) . "<br>";
    }
}

$dir = __DIR__;
echo $dir;
$ext = '*.txt';
showLink($dir, $ext);