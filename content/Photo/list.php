<?php
header('Content-Type: text/html; charset=utf-8');
ob_start("ob_gzhandler");
function showLink($typeFile): string
{
    $links = '';
    foreach (glob($typeFile, GLOB_BRACE) as $filename) {
        $filename = iconv("UTF-8", "ISO-8859-1", $filename);
        $links = $links . '<li><a href="water.php?php-id=' . $filename . '"><strong>' . $filename . '</strong></a>';
    } 
    return $links = '<ol>' . $links . '</ol>';
}

$ext = "*.{[jJ][pP]{,[eE]}[gG],[tT][iI][fF]{,[fF]}}";
include_once '../home.php';
echo showLink($ext);