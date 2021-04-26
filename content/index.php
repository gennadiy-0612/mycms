<?php
ob_start();
$folders = array_map(function ($dir) {
    return basename($dir);
}, glob('../content/*', GLOB_ONLYDIR));
$counter = count($folders);
$counted = '';
for ($i = 0; $i < $counter; $i++) {
    $counted .= '<li> ' . $folders[$i] . '</li>';
}
$ol = '<ol>' . $counted . '</ol>';
ob_end_clean();
echo $ol;