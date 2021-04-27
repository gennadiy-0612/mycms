<?php
//ob_start();
$ssl = $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost' : 'https://p.cx.ua/pf/mycms';
$direct = basename(__DIR__);
$folders = glob('../' . $direct . '/*', GLOB_ONLYDIR);
$counter = count($folders);
$counted = '';
$fold = '';
for ($i = 0; $i < $counter; $i++) {
    $fold = explode('/', $folders[$i]);
    $counted .= '<li><a href="' . $ssl . '/' . $fold[1] . '/' . $fold[2] . '/list.php">' . $fold[2] . '</a></li>';
    $foldgg = '<pre>' . $ssl . '/' . $fold[1] . '/' . $fold[2] . '/list.php' . '<br>';
}
//ob_end_clean();
echo $counted;