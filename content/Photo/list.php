<?php
ob_start("ob_gzhandler");
function showLink($typeFile): string
{
    $links = '';
    foreach (glob($typeFile, GLOB_BRACE) as $filename) {
        $links = $links . '<li><a href="water.php?php-id=' . $filename . '"><strong>' . $filename . '</strong><br><img width="100" src="water.php?php-id=' . $filename .'"</a>';
    } 
    return $links = '<ol>' . $links . '</ol>';
}

$ext = "*.{[jJ][pP]{,[eE]}[gG],[tT][iI][fF]{,[fF]}}";
echo showLink($ext);