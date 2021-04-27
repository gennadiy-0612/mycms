<?php
ob_start();
$ssl = $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://' : 'https://';
$direct = explode("\\", __DIR__)[4];
$folders = glob('../' . $direct . '/*', GLOB_ONLYDIR);
$counter = count($folders);
$counted = '';
$fold = '';
for ($i = 0; $i < $counter; $i++) {
    $fold = explode('/', $folders[$i]);
    $counted .= '<li><a href="' . $ssl . $_SERVER['SERVER_NAME'] . '/' . $fold[1] . '/' . $fold[2] . '/list.php">' . $fold[2] . '</a></li>';
    echo '<pre>', $ssl . $_SERVER['SERVER_NAME'] . '/' . $fold[1] . '/' . $fold[2] . '/list.php', '<br>';
}
//ob_end_clean();
echo $counted;
echo __FILE__;