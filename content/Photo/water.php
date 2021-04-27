<?php
ob_start("ob_gzhandler");
$waterMark='vezha.png';
$waterMarked='church-in-fog.jpg';
// Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
$stamp = imagecreatefrompng($waterMark);
$im = imagecreatefromjpeg($waterMarked);

// Установка полей для штампа и получение высоты/ширины штампа
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Копирование изображения штампа на фотографию с помощью смещения края
// и ширины фотографии для расчёта позиционирования штампа.
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Вывод и освобождение памяти
header('Content-type: image/jpg');
imagepng($im);
imagedestroy($im);