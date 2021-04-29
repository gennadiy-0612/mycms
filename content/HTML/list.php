<?php
header('Content-Type: text/html; charset=utf-8');
ob_start("ob_gzhandler");
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        echo '<br>', file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)[0], '<br>';
        $head = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)[0];
        $links = $links . '<li><a href="' . $filename . '">' . $head . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*.txt';
include_once '../home.php';
echo showLink($ext);
$lines = file('visualisation-json.txt');