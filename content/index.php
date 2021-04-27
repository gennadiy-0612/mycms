<?php
ob_start();
$direct = explode("\\", __DIR__)[4];
$folders = glob('../' . $direct . '/*', GLOB_ONLYDIR);
$counter = count($folders);
$counted = '';
$fold = '';
for ($i = 0; $i < $counter; $i++) {
    $fold = explode('/', $folders[$i]);
    $counted .= '<li><a href="' . $_SERVER['SERVER_NAME'] . '/' . $fold[1]  . $fold[2] . '/list.php">' . $fold[2] . '</a></li>';
    echo  $_SERVER['SERVER_NAME'] . '/' . $fold[1] . '/' . $fold[2] . '/list.php"<br>';
}
//ob_end_clean();
echo $counted;
echo '<pre>', var_dump($folders[1]);
echo '<pre>', var_dump(explode('/', $folders[1])[2]);