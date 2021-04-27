<?php
ob_start();
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        echo $filename,'<br>';
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*.html';
echo showLink($ext);