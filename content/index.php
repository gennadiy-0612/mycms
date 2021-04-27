<?php
ob_start();
$direct = explode("\\", __DIR__)[4];
$folders = glob('../' . $direct . '/*', GLOB_ONLYDIR);
$counter = count($folders);
$counted = '';
$fold = '';
for ($i = 0; $i < $counter; $i++) {
    $fold = explode('/', $folders[$i])[2];
    $counted .= '<li><a href="./' . $folders[$i] . '/list.php">' . $fold . '</a></li>';
}
//ob_end_clean();
echo $counted;