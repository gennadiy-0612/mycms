<?php
ob_start();
$folders = array_map(function ($dir) {
    return basename($dir);
}, glob('../content/*', GLOB_ONLYDIR));
echo json_encode($folders);
$counter = count($folders);
$counted = '';
for ($i = 0; $i < $counter; $i++) {
    $counted = $folders[$i];
}
$out = ob_get_contents();
ob_end_clean();
echo $out;