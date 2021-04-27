<?php
ob_start();
function showLink($dir, $typeFile)
{
    foreach (glob('./' . $dir . '/' . $typeFile) as $filename) {
        $setLinks = "$filename размер " . filesize($filename) . "<br>";
    }
}

$folders = array_map(function ($dir) {return basename($dir);}, glob('../'.basename(__DIR__).'/*', GLOB_ONLYDIR));
$counter = count($folders);
$counted = '';
for ($i = 0; $i < $counter; $i++) {
    $counted .= '<li><a href="./' . $folders[$i] . '/list.php">' . $folders[$i] . '</a></li>';
    showLink($folders[$i], '*.txt');
}
ob_end_clean();
echo $counted;