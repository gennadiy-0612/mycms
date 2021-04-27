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

echo "test1.jpg:<br />\n";
$exif = exif_read_data('content/Photo/IMG_20200308_115201_EDIT_1-01.jpeg', 'IFD0');
echo $exif === false ? "Не найдено данных заголовка.<br />\n" : "Изображение содержит заголовки<br />\n";

$exif = exif_read_data('ontent/Photo/IMG_20200308_115201_EDIT_1-01.jpeg', 0, true);
echo "test2.jpg:<br />\n";
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";
    }
}
