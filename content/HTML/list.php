<?php
header('Content-Type: text/html; charset=utf-8');
ob_start("ob_gzhandler");
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*.html';
echo '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>';
include_once '../home.php';
echo showLink($ext);