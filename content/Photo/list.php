<?php
ob_start("ob_gzhandler");
function showLink($typeFile)
{
    $links = '';
    foreach (glob($typeFile) as $filename) {
        echo $filename,'<br>';
        $links = $links . '<li><a href="' . $filename . '">' . $filename . '</a>';
    }
    return $links = '<ol>' . $links . '</ol>';
}

$ext = '*[.jpg|.jpeg]';
echo showLink($ext);

// Открываем файл в бинарном режиме
$fp = fopen('content/Photo/IMG_20200308_115201_EDIT_1-01.jpeg', 'rb');

if (!$fp) {
    echo 'Ошибка: Невозможно открыть файл для чтения';
    exit;
}

// Попытка прочитать заголовки exif
$headers = exif_read_data($fp);

if (!$headers) {
    echo 'Ошибка: невозможно прочитать заголовки exif';
    exit;
}

// Напечатать заголовки 'COMPUTED'
echo 'Заголовки EXIF:' . PHP_EOL;

foreach ($headers['COMPUTED'] as $header => $value) {
    printf(' %s => %s%s', $header, $value, PHP_EOL);
}