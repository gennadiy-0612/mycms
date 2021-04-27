<?php
echo "test1.jpg:<br />\n";
$exif = exif_read_data('IMG_20200308_115201_EDIT_1-01.jpeg');
echo $exif===false ? "Не найдено данных заголовка.<br />\n" : "Изображение содержит заголовки<br />\n";

$exif = exif_read_data('IMG_20200308_115201_EDIT_1-01.jpeg', 0, true);
$exifAll = '';
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        $exifAll = $exifAll. "<p><strong>$key.$name</strong>: $val</p>";
    }
}
echo $exifAll;