<?php
header('Content-Type: text/html; charset=utf-8');
ob_start("ob_gzhandler");
function showLink($typeFile)
{
    $links = '';
    foreach (glob(iconv("UTF-8", "ISO-8859-1", $typeFile)) as $filename) {
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*.html';
include_once '../home.php';
echo showLink($ext);