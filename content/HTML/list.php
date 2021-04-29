<?php
ob_start();
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*.html';
include_once '../home.php';
echo showLink($ext);