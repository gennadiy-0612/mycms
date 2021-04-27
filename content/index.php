<?php
ob_start();
function showLink($dir, $typeFile)
{
    foreach (glob('./'.$dir.'/'.$typeFile) as $filename) {
        echo "$filename размер " . filesize($filename) . "<br>";
    }
}

$folders = array_map(function ($dir) {
    return basename($dir);
}, glob('../content/*', GLOB_ONLYDIR));
$counter = count($folders);
$counted = '';
for ($i = 0; $i < $counter; $i++) {
    echo $folders[$i], '<br>';
    $counted .= '<li><a href="index.php">' . $folders[$i] . '</a></li>';
    showLink($folders[$i],'*.txt');
    echo $folders[$i], '<br>';
}
//$ol = '<ol>' . $counted . '</ol>';
//ob_end_clean();
//echo $ol;