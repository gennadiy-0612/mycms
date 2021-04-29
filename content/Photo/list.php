<?php
header('Content-Type: text/html; charset=utf-8');
ob_start("ob_gzhandler");
function showLink($typeFile): string
{
    $links = '';
    foreach (glob ($typeFile, GLOB_BRACE) as $filename) {
        $links = $links . '<li><a class="listLinks" href="water.php?php-id=' . $filename . '"><strong>' . $filename . '</strong></a>';
    } 
    return $links = '<ol>' . $links . '</ol>';
}

$ext = "*.{[jJ][pP]{,[eE]}[gG],[tT][iI][fF]{,[fF]}}";
include_once '../home.php';
echo showLink($ext);