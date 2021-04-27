<?php
ob_start("ob_gzhandler");
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*[.jpg|.jpeg]';
echo showLink($ext);