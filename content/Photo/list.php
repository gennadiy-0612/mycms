<?php
ob_start("ob_gzhandler");
function showLink($typeFile): string
{
    $links = '';
    foreach (glob($typeFile, GLOB_BRACE) as $filename) {
        $links = $links . '<li><a href="water.php?php-id=' . $filename . '"><strong>' . $filename . '</strong></a>';
    } 
    return $links = '<ol>' . $links . '</ol>';
}

$ext = "*.{[jJ][pP]{,[eE]}[gG],[tT][iI][fF]{,[fF]}}";
echo '<a href="/">Home</a>';
echo showLink($ext);