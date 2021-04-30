<?php
ob_start("ob_gzhandler");
$src = 'IMG_20151024_082205.jpg';
echo '<img src="', $src, '">';
$exif = exif_read_data($src);
$exif = exif_read_data($src, 0, true);
$exifAll = '';
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        if (is_array($val)) {
            $exifAll = $exifAll . '<p><strong>' . $key . $name . '</strong>:' . $val[0] . '</p>';
            $exifAll = $exifAll . '<p><strong>' . $key . $name . '</strong>:' . $val[1] . '</p>';
            $exifAll = $exifAll . '<p><strong>' . $key . $name . '</strong>:' . $val[2] . '</p>';
        } else $exifAll = $exifAll . "<p><strong>$key.$name</strong>: $val</p>";
    }
}
echo $exifAll;
