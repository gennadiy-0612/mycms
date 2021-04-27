<?php
ob_start("ob_gzhandler");
$src = 'IMG_20200308_115201_EDIT_1-01.jpeg';
echo '<img src="',$src,'">';
$exif = exif_read_data($src);
echo $exif===false ? "Не найдено данных заголовка.<br />\n" : "Изображение содержит заголовки<br />\n";

$exif = exif_read_data($src, 0, true);
$exifAll = '';
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
//        '<pre>'.var_dump($key.$name).'</pre><br>';
        $exifAll = $exifAll. "<p><strong>$key.$name</strong>: $val</p>";
    }
}
echo $exifAll;
