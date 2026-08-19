<?php
$targetWidth = 1024;
$targetHeight = 571;

$srcFile = __DIR__ . '/../public/assets/images/banners/home-slide-2.jpg';
$dstFile = __DIR__ . '/../public/assets/images/banners/home-slide-2.jpg';

$srcImg = imagecreatefromjpeg($srcFile);
$origW = imagesx($srcImg);
$origH = imagesy($srcImg);

// Create canvas matching Slide 1 (1024x571) with the soft cream background color #F7F3ED
$canvas = imagecreatetruecolor($targetWidth, $targetHeight);
$bgColor = imagecolorallocate($canvas, 247, 243, 237); // #F7F3ED
imagefill($canvas, 0, 0, $bgColor);

// Calculate aspect ratio scaling to fit nicely on 1024x571
$scale = min($targetWidth / $origW, $targetHeight / $origH);
$newW = (int)round($origW * $scale);
$newH = (int)round($origH * $scale);

$dstX = (int)round(($targetWidth - $newW) / 2);
$dstY = (int)round(($targetHeight - $newH) / 2);

imagecopyresampled($canvas, $srcImg, $dstX, $dstY, 0, 0, $newW, $newH, $origW, $origH);

imagejpeg($canvas, $dstFile, 95);

imagedestroy($srcImg);
imagedestroy($canvas);

echo "Successfully resized home-slide-2.jpg to " . $targetWidth . "x" . $targetHeight . " matching Slide 1!\n";
